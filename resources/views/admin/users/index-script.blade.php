<script>
    $(document).ready(function(){
        $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('admin.users.datatable.getData') !!}',
            columns: [
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
            ]
        });
    });
</script>