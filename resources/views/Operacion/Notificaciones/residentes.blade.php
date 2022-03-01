@extends('adminlte::page')

@section('title', 'GoodLock | Principal')

@section('plugins.Sweetalert2', true)
@section('plugins.Select2', true)
@section('plugins.Datatables', true)

@section('content_header')
    <h1 style="color: rgb(0, 174, 174);">Panel <strong>notificacion</strong></h1>

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

                            <table id="example" class="table table-sm table-secondary table-striped table-bordered "
                                class="display">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Direccion</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($idr as $p)
                                        <tr>
                                            <td >{{ $p->nombre }}</td>
                                            <td>{{ $p->direccion }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-primary" href="{{route('index-notificacion2', $p->id)}}">Seleccionar</a>
                                            </td>
                                        </tr>
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
