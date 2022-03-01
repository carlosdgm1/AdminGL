@extends('adminlte::page')

@section('title', 'GoodLock | Principal')

@section('plugins.Sweetalert2', true)
@section('plugins.Select2', true)
@section('plugins.Datatables', true)

@section('content_header')
    <h1 style="color: rgb(182, 182, 10)"><i class="fas fa-user-plus"></i> Configuracion <strong>general</strong></h1>
@stop

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            Configuracion generales
                        </div>
                        <div class="card-body">

                            <div class="card-group">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><strong>CORREO ADMINISTRADOR</strong></h5>
                                        <p class="card-text">

                                            @foreach ($correo as $c)
                                                <form action="{{ route('editarcorreo', $c->id) }}" method="post">
                                                    @csrf @method('put')

                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1">Correo del
                                                            administrador</label>
                                                        <input value="{{ $c->correo }}" required name="correo"
                                                            type="email" class="form-control">
                                                    </div>

                                                    <center><button class="btn btn-primary">Actualizar correo</button>
                                                    </center>
                                                </form>
                                            @endforeach
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><strong>INFORMACION FRACCIONAMIENTO</strong></h5>
                                        <p class="card-text">

                                        @foreach ($frac as $f)
                                            <form action="{{ route('editarfracc', $f->id) }}" method="post">
                                                @csrf @method('put')

                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Fraccionamiento</label>
                                                    <input readonly value="{{ $f->nombre }}" required name="nombre" type="text"
                                                        class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Direccion</label>
                                                    <input value="{{ $f->direccion }}" required name="direccion" type="text"
                                                        class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Rfc</label>
                                                    <input value="{{ $f->rfc }}" required name="rfc" type="text"
                                                        class="form-control">
                                                </div>

                                                <center><button class="btn btn-primary">Actualizar informacion</button>
                                                </center>
                                            </form>
                                        @endforeach

                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><strong>DESCARGAR PDF DETALLES DEL PC</strong></h5>

                                    </div>
                                </div>
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
