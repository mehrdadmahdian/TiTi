<?php

namespace App\DataTables;

use App\Models\Milestone;
use App\Models\Project;
use App\Models\ProjectRequest;
use App\Models\Task;
use App\Utils\ProjectControlHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Morilog\Jalali\Facades\jDateTime;
use Yajra\DataTables\Services\DataTable;

class ProjectRequestDatatable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {

        return datatables($query)

            ->editColumn('status' , function($row){
                return $row->status ? trans('project.status.completed') : trans('project.status.in_progress');
            })
            ->editColumn('last_step' , function($row){
                $currentTasks = Task::where('tasks.taskable_type', 'App\Models\ProjectRequestMilestoneStep')
                    ->whereIn('tasks.task_status' , [0])
                    ->join('project_request_milestone_steps' , 'tasks.taskable_id' , 'project_request_milestone_steps.id')
                    ->join('project_request_milestones' , 'project_request_milestone_steps.pr_milestone_id' , 'project_request_milestones.id')
                    ->join('project_requests' , 'project_request_milestones.project_request_id' , 'project_requests.id')
                    ->where('project_requests.id' , $row->id)
                    ->join('project_milestones' , 'project_request_milestones.project_milestone_id' , 'project_milestones.id')
                    ->join('milestones' , 'project_milestones.milestone_id' , 'milestones.id')
                    ->join('project_milestone_steps' , 'project_request_milestone_steps.pm_step_id' , 'project_milestone_steps.id')
                    ->join('milestone_steps' , 'project_milestone_steps.step_id' , 'milestone_steps.id')
                    ->select(
                        'tasks.id as id',
                        'tasks.task_status as status',
                        'milestones.name as milestone_name',
                        'milestone_steps.name as milestone_step_name'
                    )->orderBy('tasks.created_at' , 'desc')->get();
                $milestone_step = '';

                foreach ($currentTasks as $task) {
                    $milestone_step .= '<span class="label label-primary">'.$task->milestone_name.'</span> <span class="label label-warning">'.$task->milestone_step_name.'</span> <span><b>('.implode(',', $task->groups()->pluck('name')->toArray()).')'.'</b></span><br><br>';
                }
                return $milestone_step;

            })->editColumn('last_action' , function($row) {

                $last_action =  $row->milestones()->join('project_request_milestone_steps' , 'project_request_milestone_steps.pr_milestone_id' , 'project_request_milestones.id')
                    ->join('tasks' , 'tasks.taskable_id' , 'project_request_milestone_steps.id')
                    ->join('task_action' , 'task_action.task_id' , 'tasks.id')
                    ->orderBy('task_action.created_at', 'desc')
                    ->first();
                ;
                return $last_action ? $last_action->jalali_created_at : '';
            })->editColumn('progress' , function($row) {

                $percent = $row->progress_percent;
                return '<div class="progress">
                             <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" 
                                        style="width: '.$percent.'%; color:black ;background-color: '.($percent == 100 ?  "#2aff00":  "#ffd827").'" 
                                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                '.$percent.'%
                             </div>
                       </div>';

            })
            ->addColumn('action', function($row){
                return '<a class="fa fa-eye text-navy dt-btn " href='.route('backend.project_requests.show' , ['project_request' => $row->id]).'></a>';
            })
            ->editColumn('node_name', function($row){
                return '<span class="label label-info">'.$row->node_name.'</span>';
            })
            ->rawColumns(['last_step', 'progress', 'action', 'node_name']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param Milestone $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ProjectRequest $model)
    {
        $userProvinces = Auth::user()->provincesIds();

        $query  = $model->join('projects' , 'projects.id' , 'project_requests.project_id')
            ->join('bts_nodes' , 'bts_nodes.id' , 'project_requests.node_id')
            ->join('provinces' , 'bts_nodes.province' , 'provinces.id')
            ->join('province_info' , 'province_info.province_id' , 'provinces.id')
            ->join('cities' , 'bts_nodes.city' , 'cities.id')
            ->whereIn('bts_nodes.province' , $userProvinces)
            ->select(
                'bts_nodes.node_code as node_name',
                'projects.node_type',
                'project_requests.id as id',
                'projects.id as project_id','projects.name as p_name',
                'project_requests.completed as status',
                'project_requests.created_at',
                'provinces.name as province_name',
                'cities.name as city_name',
                'province_info.region as region',
                'project_requests.cloned_milestones'
            )

            ->orderBy('project_requests.created_at', 'desc');
        if (request()->get('search')) {
            if (array_key_exists('value', request()->get('search')) and request()->get('search')['value'] != null) {
                return $query->where('bts_nodes.node_code','like' , '%'.request()->get('search')['value'].'%')
                    ->orWhere('projects.name' , 'like' , '%'.request()->get('search')['value'].'%')
                    ->orWhere('provinces.name' , 'like' , '%'.request()->get('search')['value'].'%')
                    ->orWhere('cities.name' , 'like' , '%'.request()->get('search')['value'].'%');
            }
        }

        return $query;

    }

    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->addAction(['title' => trans('columns.action')])
            ->parameters($this->getBuilderParameters());
    }

    protected function getBuilderParameters()
    {
        return [
            'scrollX' => false,
            //'buttons' => [],
            'pageLength' => 10,
            //'order' => [[5, 'desc']],
            //'responsive' => true,
            'language' => [
                "sProcessing" => "درحال پردازش...",
                "sLengthMenu" => "نمایش محتویات _MENU_",
                "sZeroRecords" => "موردی یافت نشد",
                "sInfo" => "نمایش _START_ تا _END_ از مجموع _TOTAL_ مورد",
                "sInfoEmpty" => "تهی",
                "sInfoFiltered" => "(فیلتر شده از مجموع _MAX_ مورد)",
                "sInfoPostFix" => "",
                "sSearch" => "جستجو:",
                "sUrl" => "",
                "oPaginate" => [
                    "sFirst" => "ابتدا",
                    "sPrevious" => "قبلی",
                    "sNext" => "بعدی",
                    "sLast" => "انتها"
                ],
                'dom' => 'Bfrtip',
                'buttons' => ['excel'],
            ]
        ];
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            //'id'        => ['title' => trans('columns.item'), 'orderable' => false, 'searchable' => false],
            'p_name'    => ['title' => trans('columns.project_name'), 'orderable' => false, 'searchable' => false] ,
            'node_name' => ['title' => trans('columns.node_name'), 'orderable' => false, 'searchable' => false] ,
            //'node_type' => ['title' => trans('columns.node_type'), 'orderable' => false, 'searchable' => false] ,
            'last_step'    => ['title' => trans('columns.last_step'), 'orderable' => false, 'searchable' => false] ,
            'region'    => ['title' => trans('columns.region'), 'orderable' => false, 'searchable' => false] ,
            'province_name'    => ['title' => trans('columns.province_name'), 'orderable' => false, 'searchable' => false] ,
            'city_name'    => ['title' => trans('columns.city_name'), 'orderable' => false, 'searchable' => false] ,
            'last_action'    => ['title' => trans('columns.last_action'), 'orderable' => false, 'searchable' => false] ,
            'status'    => ['title' => trans('columns.project_status'), 'orderable' => false, 'searchable' => false] ,
            'progress'    => ['title' => trans('columns.progress'), 'orderable' => false, 'searchable' => false] ,
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'ProjectRequests_' . date('YmdHis');
    }
}
