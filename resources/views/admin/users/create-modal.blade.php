<div id="modal-create" class="modal fade" style="display: none" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12"><h3 class="m-t-none m-b">ایجاد نقش کاربری جدید</h3>
                        <form role="form" method="post" action="{{route('admin.roles.store')}}">
                            @csrf
                            <div class="form-group"><label>نام نقش کاربری</label> <input name="name" type="text" placeholder="مثال: کاربر عادی" class="form-control"></div>
                            <div class="form-group"><label>انتخاب مجوزها</label>
                                <select name="permissions[]" class="form-control select2" multiple style="z-index:1">
                                    @foreach(\Spatie\Permission\Models\Permission::all() as $permission)
                                        <option value="{{$permission->id}}">{{$permission->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <div class="form-group">
                                    <button class="btn btn-sm btn-primary float-right m-t-n-xs" type="submit"><strong>ثبت</strong></button>
                                </div>
                            </div>
                        </form>
                    </div>«
                </div>
            </div>
        </div>
    </div>
</div>