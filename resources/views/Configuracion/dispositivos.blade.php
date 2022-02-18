@extends('adminlte::page')

@section('title', 'GoodLock | Principal')

@section('plugins.Sweetalert2', true)
@section('plugins.Select2', true)
@section('plugins.Datatables', true)

@section('content_header')
    <h1 style="color: rgb(182, 182, 10)"><i class="fas fa-user-plus"></i> Configuracion <strong>dispositivos</strong></h1>
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

                            <table id="example" class="table table-secondary table-striped table-bordered ">
                                <thead>
                                    <tr>
                                        <th>Frente de calle</th>
                                        <th>Camara de placas</th>
                                        <th>Ine</th>
                                        <th>Camara de salida</th>
                                        <th>Edicion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($camara as $cam)
                                        <tr>
                                            <td>{{ $cam->frente }}</td>
                                            <td>{{ $cam->placa }}</td>
                                            <td>{{ $cam->ine }}</td>
                                            <td>{{ $cam->salida }}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#exampleModal{{ $cam->id }}">
                                                    Modificar
                                                </button>
                                            </td>
                                        </tr>
                                        @include('Configuracion.components.editar-camaras')
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
