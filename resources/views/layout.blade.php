<!--To put this html into an existing HTML document, you must copy the JavaScript and-->
<!--paste it in a specific location within the destination HTML document. You must then copy-->
<!--and paste the table in a different location.-->

<html>

<head>

    <title>Inter-Com - Gesti�n de Municipios</title>

    <!--<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="description" content="Fireworks Splice HTML">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">

    <!--Importo librerias DataTable -->
    {{--<link rel="stylesheet" href="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js">--}}
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
            integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
            integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
            crossorigin="anonymous"></script>

    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>



</head>

<body bgcolor="#cccccc" onload="" topmargin="0" leftmargin="0" >

    <div class="flex-center position-ref full-height">
        @section('portal')
        <div class="top-right links">
            {{--<a href="{{ route('home') }}">Home</a>--}}
            {{--<a href="{{ route('section.index') }}">Sections</a>--}}
            {{--<a href="{{ route('tag.index') }}">Tags</a>--}}
            @auth
                <a href="{{ url('/admin/posts') }}">Edit Posts</a>
                <a href="{{ url('/admin/sections') }}">Edit Sections</a>
                <a href="{{ url('/admin/tags') }}">Edit Tags</a>
                <a href="">Logout</a>
                @else
                    <a href="">Login</a>@endauth
        </div>

        <div class="row" background="#cccccc">
            <div class="col-md-3">
                @section('menu')
            </div>
            <div class="col-md-5">
                @section('content')
                    @show
            </div>
            <div class="col-md-4"></div>

        </div>


    </div>

</body>
<script src="{{asset('js/app.js')}}"></script>
</html>
