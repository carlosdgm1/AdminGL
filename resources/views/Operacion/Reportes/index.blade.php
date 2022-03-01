@extends('adminlte::page')

@section('title', 'GoodLock | Principal')

@section('plugins.Sweetalert2', true)
@section('plugins.Select2', true)
@section('plugins.Datatables', true)

@section('content_header')
    <h1 style="color: rgb(0, 174, 174);"><i class="fas fa-user-plus"></i> Panel <strong>reporte</strong></h1>
@stop

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">



                    <div class="card">
                        <h5 class="card-header"><strong>PANEL DE REPORTES</strong></h5>
                        <div class="card-body">

                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa fa-plus" aria-hidden="true"></i> Generar nuevo reporte
                            </button>
                            @include('Operacion.Reportes.components.crear')
                            <br><br>

                          
                            
                            <table id="example" class="table table-sm table-secondary table-striped table-bordered "
                                class="display">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Titulo</th>
                                        <th>Reporte</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reporte as $p)
                                        <tr>
                                            <th scope="row">{{ $p->id }}</th>
                                            <td>{{ $p->titulo }}</td>
                                            <td>{{ $p->razon }}</td>
                                            <td>

                                                <div class="row">
                                                    <div class="col">
                                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                            data-target="#exampleModal-{{ $p->id }}">
                                                            <i class="fas fa-edit    "></i>
                                                        </button>
                                                    </div>
                                                    <div class="col">
                                                        <form style="margin: 0px" method="POST"
                                                            action="{{ route('eliminar-reportes', $p->id) }}">
                                                            @csrf @method('delete')
                                                            <button type="submit" class="btn btn-danger"><i
                                                                    class="fa fa-trash" aria-hidden="true"></i></button>
                                                        </form>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                        @include('Operacion.Reportes.components.edit')
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
