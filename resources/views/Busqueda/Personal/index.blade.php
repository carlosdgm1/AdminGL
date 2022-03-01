@extends('adminlte::page')

@section('title', 'GoodLock | Principal')

@section('plugins.Sweetalert2', true)
@section('plugins.Select2', true)
@section('plugins.Datatables', true)

@section('content_header')
    <h1 style="color: green"><i class="fas fa-search"></i> Buscar <strong>personal</strong></h1>

@stop

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Listado del personal</strong>
                        </div>

                        <div class="card-body">

                            @if (session('info'))
                                <div class="alert alert-success">
                                    <strong>{{ session('info') }}</strong>
                                </div>
                                <br>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <br>
                            @endif

                            <a class="btn btn-primary" href="{{ route('exportP') }}">Exportar Excel</a><br><br>

                            <div class="table-responsive">
                                <table id="example" class="table table-secondary table-sm table-striped table-bordered"
                                    striped hoverable with-buttons>
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Telefono</th>
                                            <th>Direccion</th>
                                            <th>Tipo</th>
                                            <th>Servicio</th>
                                            <th>Trabaja para</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($BP as $p)
                                            <tr>
                                                <td>{{ $p->nombre }}</td>
                                                <td>{{ $p->telefono }}</td>
                                                <td>{{ $p->direccion }}</td>
                                                <td>{{ $p->tipo }}</td>
                                                <td>{{ $p->servicio }}</td>

                                                @if ($p->idr == null)
                                                    <td>FRACCIONAMIENTO</td>
                                                @endif

                                                @if ($p->idr != null)
                                                    <td>{{ $p->idr }}</td>
                                                @endif

                                                <td>

                                                    <div class="row align-items-start">
                                                        <div class="col">
                                                            <button class="btn btn-primary " type="button"
                                                                data-toggle="modal"
                                                                data-target="#exampleModal-{{ $p->id }}"><i class="fas fa-edit    "></i></button>
                                                        </div>
                                                        <div class="col">
                                                            <form style="margin: 0px;" action="{{ route('deleteP', $p->id) }}" method="post">
                                                                @csrf @method('delete')
                                                                <button class="btn btn-danger  mr-1" type="submit"> <i
                                                                        class="fa fa-trash"></i></button>
                                                            </form>
                                                        </div>
                                                    </div>

                                                    {{-- <div class="dropdown">
                                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                                            id="dropdownMenuButton" data-toggle="dropdown"
                                                            aria-expanded="false">
                                                            Opciones
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <button type="button" class="dropdown-item" data-toggle="modal"
                                                                data-target="#exampleModal-{{ $p->id }}">
                                                                <i class="fas fa-edit    "></i> Editar
                                                            </button>
                                                            <form action="{{ route('deleteP', $p->id) }}" method="post">
                                                                @csrf @method('delete')
                                                                <button class="dropdown-item" type="submit"><i
                                                                        class="fa fa-trash text-danger"></i>
                                                                    Eliminar</button>
                                                            </form>
                                                        </div>
                                                    </div> --}}
                                                </td>
                                            </tr>
                                            @include('Busqueda.Personal.components.editar')
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- /.content -->
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

<script src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            responsive: true,
            autoWidth: false,
            dom: 'Bfrtip',
            buttons: [
                'excel'
            ],

            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por pagina",
                "zeroRecords": "No se encontro el resultado",
                "info": "Pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No se encontro el resultado",
                "infoFiltered": "(Filtrado de _MAX_ registros totales)",
                'search': "Buscar:"
            }
        });
    });
</script>

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>


{{-- <script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por pagina",
                "zeroRecords": "No se encontro el resultado",
                "info": "Pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No se encontro el resultado",
                "infoFiltered": "(Filtrado de _MAX_ registros totales)",
                'search': "Buscar:"
            }
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script> --}}
