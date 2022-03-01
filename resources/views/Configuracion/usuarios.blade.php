@extends('adminlte::page')

@section('title', 'GoodLock | Principal')

@section('plugins.Sweetalert2', true)
@section('plugins.Select2', true)
@section('plugins.Datatables', true)

@section('content_header')
    <h1 style="color: rgb(182, 182, 10)"><i class="fas fa-user-plus"></i> Configuracion <strong>usuarios</strong></h1>
@stop

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            Configuracion de dispositivos
                        </div>
                        <div class="card-body">


                            @if (session('info'))
                                <div class="alert alert-success">
                                    <strong>{{ session('info') }}</strong>
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif


                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#CrearU">
                                <i class="fa fa-plus" aria-hidden="true"></i> Crear usuario
                            </button>
                            @include('Configuracion.components.crear-usuario')

                            <table id="example" class="table table-secondary table-striped table-bordered ">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Username</th>
                                        <th>Correo</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $cam)
                                        <tr>
                                            <td>{{ $cam->name }}</td>
                                            <td>{{ $cam->username }}</td>
                                            <td>{{ $cam->email }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary dropdown-toggle" type="button"
                                                        id="dropdownMenuButton" data-toggle="dropdown"
                                                        aria-expanded="false">
                                                        Acciones
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <button type="button" class="dropdown-item" data-toggle="modal"
                                                            data-target="#exampleModal{{ $cam->id }}">
                                                            <i class="fas fa-user-tag    "></i> Asignar Roles
                                                        </button>

                                                        <form method="POST" action="{{ route('usuariosE', $cam->id) }}">
                                                            @csrf @method('delete')
                                                            <button class="dropdown-item text-danger" type="submit"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</button>
                                                        </form>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                        @include('Configuracion.components.editar-roles')
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- /.content -->

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                responsive: true,
                autoWidth: false,
                dom: 'Bfrtip',
                buttons: [
                    "copy", "csv", "excel", "pdf", "print", "colvis"
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

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
