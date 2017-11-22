@extends('layout')

@section('menu')
    acá va el menú

@section('content')
    <h1>Hola Mesa de Entradas</h1>
    <table class="table table-bordered" id="users-ttable">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Create At</th>
                <th>Update At</th>
            </tr>
        </thead>
    </table>
@stop

@push('scripts')
    <script>
        $(function () {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{route(datatable.anyData)}}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'create_at', name: 'create_at'},
                    {data: 'updated_at', name: 'updated_at'}
                ]
            });

        });
    </script>
@endpush
@endsection

