@extends('default')

@section('menu')
    acá va el menú
@endsection

@section('content')
    <h1>Hola Mesa de Entradas</h1>
    <table class="table table-bordered" id="users-table">
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



    <script type="text/javascript">
        $(document).ready(function () {
            aTable = $('#users-table').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{route('datatable.getIndex')}}",

                "columns": [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'}
                ]
            });

        });
    </script>

@endsection

