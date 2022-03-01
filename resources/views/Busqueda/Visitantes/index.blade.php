@extends('adminlte::page')

@section('title', 'GoodLock | Principal')

@section('plugins.Sweetalert2', true)
@section('plugins.Select2', true)
@section('plugins.Datatables', true)

@section('content_header')
    <h1 style="color: green"><i class="fas fa-search"></i> Buscar <strong>visitantes</strong></h1>

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
                            <a class="btn btn-primary" href="{{ route('exportV') }}">Exportar Excel</a><br><br>
                            <div class="table-responsive">
                                <table id="example" class="table table-secondary table-sm table-striped table-bordered"
                                    class="display">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Telefono</th>
                                            <th>Calle</th>
                                            <th>Placa</th>
                                            <th>Residente</th>
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
                                                @foreach ($R as $item)
                                                    @if ($item->id == $p->idr)
                                                        <td>{{ $item->nombre }}</td>
                                                    @endif
                                                @endforeach
                                                <td>{{ $p->motivo }}</td>
                                                <td>

                                                    <div class="row align-items-start">
                                                        <div class="col">
                                                            <button class="btn btn-primary " type="button"
                                                                data-toggle="modal"
                                                                data-target="#exampleModal-{{ $p->id }}"> <i
                                                                    class="fa fa-info" aria-hidden="true"></i></button>
                                                        </div>
                                                        <div class="col">
                                                            <form style="margin: 0px;"
                                                                action="{{ route('deleteV', $p->id) }}" method="post">
                                                                @csrf @method('delete')
                                                                <button class="btn btn-danger  mr-1" type="submit">
                                                                    <i class="fa fa-trash"></i></button>
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
                                                            <i class="fa fa-info" aria-hidden="true"></i> Detalle
                                                        </button>
                                                        <form action="{{ route('deleteV', $p->id) }}" method="post">
                                                            @csrf @method('delete')
                                                            <button class="dropdown-item" type="submit"><i
                                                                    class="fa fa-trash text-danger"></i> Eliminar</button>
                                                        </form>
                                                    </div>
                                                </div> --}}
                                                </td>
                                            </tr>
                                            @include('Busqueda.Visitantes.components.editar')
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
