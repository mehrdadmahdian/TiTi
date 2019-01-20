<script>
    $(document).ready(function(){
        $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('admin.roles.datatable.getData') !!}',
            columns: [
                { data: 'name', name: 'name' },
            ]
        });
    });
</script>