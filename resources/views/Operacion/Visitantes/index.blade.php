@extends('adminlte::page')

@section('title', 'GoodLock | Principal')

@section('plugins.Sweetalert2', true)
@section('plugins.Select2', true)
@section('plugins.Datatables', true)

@section('content_header')

    <h1 style="color: rgb(0, 174, 174);">Buscar <strong>visitantes</strong></h1>

@stop

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Listado de residentes</strong>
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

                            <table id="example" class="table table-secondary table-striped table-bordered "
                                class="display">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Telefono</th>
                                        <th>Calle</th>
                                        <th>Placa</th>
                                        <th>Motivo</th>
                                        <th>Detalle</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($BV as $p)
                                        <tr>
                                            <td>{{ $p->nombre }}</td>
                                            <td>{{ $p->telefono }}</td>
                                            <td>{{ $p->ine }}</td>
                                            <td>{{ $p->placa }}</td>
                                            <td>{{ $p->motivo }}</td>
                                            <td>

                                                <button class="btn btn-primary " type="button" data-toggle="modal"
                                                    data-target="#exampleModal-{{ $p->id }}"> <i
                                                        class="fa fa-info" aria-hidden="true"></i></button>
                                            </td>
                                        </tr>
                                        @include('Operacion.Visitantes.components.editar')
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
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

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
