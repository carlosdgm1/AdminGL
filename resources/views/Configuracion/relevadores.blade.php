@extends('adminlte::page')

@section('title', 'GoodLock | Principal')

@section('plugins.Sweetalert2', true)
@section('plugins.Select2', true)
@section('plugins.Datatables', true)

@section('content_header')
    <h1 style="color: rgb(182, 182, 10)"><i class="fas fa-user-plus"></i> Configuracion <strong>relevadores</strong></h1>
@stop

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            Configuracion de relevadores
                        </div>
                        <div class="card-body">

                            <button class="btn btn-success" onclick="addpanel({{ $frac->paneles }})">Agregar
                                panel</button>
                            <button class="btn btn-danger" onclick="deletepanel({{ $frac->paneles }})">Eliminar
                                panel</button>
                            <br><br>

                            <form action="{{ route('updateArduino') }}" method="post">
                                <input type="text" class="form-control" hidden name="paneles"
                                    value="{{ $frac->paneles }}">
                                <div class="row">
                                    @for ($i = 0; $i < $frac->paneles; $i++)
                                        <div class="card col-4">
                                            <div class="card-body">
                                                <h5 class="card-title">Panel {{ $i + 1 }}</h5>
                                                <p class="card-text">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Puerto</th>
                                                            <th>Nombre</th>
                                                            <th>n/o</th>
                                                            <th>n/c</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($arduino as $port)
                                                            @if ($port->panel === $i)
                                                                @if ($port->puerto === 1)
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td>
                                                                            <input type="text" class="form-control"
                                                                                name="port1panel{{ $i }}name"
                                                                                id="" value="{{ $port->nombre }}">
                                                                        </td>
                                                                        @if ($port->puerto === 1 && $port->nonc === 'no')
                                                                            <td>
                                                                                <input type="checkbox"
                                                                                    name="port1nopanel{{ $i }}"
                                                                                    id="" checked>
                                                                            </td>
                                                                        @elseif ($port->puerto === 1 && $port->nonc === 'nc')
                                                                            <td>
                                                                                <input type="checkbox"
                                                                                    name="port1nopanel{{ $i }}"
                                                                                    id="">
                                                                            </td>
                                                                        @endif
                                                                        @if ($port->puerto === 1 && $port->nonc === 'no')
                                                                            <td><input type="checkbox"
                                                                                    name="port1ncpanel{{ $i }}"
                                                                                    id="">
                                                                            </td>
                                                                        @elseif ($port->puerto === 1 && $port->nonc === 'nc')
                                                                            <td><input type="checkbox"
                                                                                    name="port1ncpanel{{ $i }}"
                                                                                    id="" checked>
                                                                            </td>
                                                                        @endif
                                                                        @if ($port->puerto === 1 && $port->nonc === '-')
                                                                            <td><input type="checkbox"
                                                                                    name="port1nopanel{{ $i }}"
                                                                                    id="">
                                                                            </td>
                                                                            <td><input type="checkbox"
                                                                                    name="port1ncpanel{{ $i }}"
                                                                                    id="">
                                                                            </td>
                                                                        @endif
                                                                    </tr>
                                                                @endif
                                                                @if ($port->puerto === 2)
                                                                    <tr>
                                                                        <td>2</td>
                                                                        <td>
                                                                            <input type="text" class="form-control"
                                                                                name="port2panel{{ $i }}name"
                                                                                id="" value="{{ $port->nombre }}">
                                                                        </td>
                                                                        @if ($port->puerto === 2 && $port->nonc === 'no')
                                                                            <td>
                                                                                <input type="checkbox"
                                                                                    name="port2nopanel{{ $i }}"
                                                                                    id="" checked>
                                                                            </td>
                                                                        @elseif ($port->puerto === 2 && $port->nonc === 'nc')
                                                                            <td>
                                                                                <input type="checkbox"
                                                                                    name="port2nopanel{{ $i }}"
                                                                                    id="">
                                                                            </td>
                                                                        @endif
                                                                        @if ($port->puerto === 2 && $port->nonc === 'no')
                                                                            <td><input type="checkbox"
                                                                                    name="port2ncpanel{{ $i }}"
                                                                                    id="">
                                                                            </td>
                                                                        @elseif ($port->puerto === 2 && $port->nonc === 'nc')
                                                                            <td><input type="checkbox"
                                                                                    name="port2ncpanel{{ $i }}"
                                                                                    id="" checked>
                                                                            </td>
                                                                        @endif

                                                                        @if ($port->puerto === 2 && $port->nonc === '-')
                                                                            <td><input type="checkbox"
                                                                                    name="port2nopanel{{ $i }}"
                                                                                    id="">
                                                                            </td>
                                                                            <td><input type="checkbox"
                                                                                    name="port2ncpanel{{ $i }}"
                                                                                    id="">
                                                                            </td>
                                                                        @endif
                                                                    </tr>
                                                                @endif
                                                                @if ($port->puerto === 3)
                                                                    <tr>
                                                                        <td>3</td>
                                                                        <td>
                                                                            <input type="text" class="form-control"
                                                                                name="port3panel{{ $i }}name"
                                                                                id="" value="{{ $port->nombre }}">
                                                                        </td>
                                                                        @if ($port->puerto === 3 && $port->nonc === 'no')
                                                                            <td>
                                                                                <input type="checkbox"
                                                                                    name="port3nopanel{{ $i }}"
                                                                                    id="" checked>
                                                                            </td>
                                                                        @elseif ($port->puerto === 3 && $port->nonc === 'nc')
                                                                            <td>
                                                                                <input type="checkbox"
                                                                                    name="port3nopanel{{ $i }}"
                                                                                    id="">
                                                                            </td>
                                                                        @endif
                                                                        @if ($port->puerto === 3 && $port->nonc === 'no')
                                                                            <td><input type="checkbox"
                                                                                    name="port3ncpanel{{ $i }}"
                                                                                    id="">
                                                                            </td>
                                                                        @elseif ($port->puerto === 3 && $port->nonc === 'nc')
                                                                            <td><input type="checkbox"
                                                                                    name="port3ncpanel{{ $i }}"
                                                                                    id="" checked>
                                                                            </td>
                                                                        @endif

                                                                        @if ($port->puerto === 3 && $port->nonc === '-')
                                                                            <td><input type="checkbox"
                                                                                    name="port3nopanel{{ $i }}"
                                                                                    id="">
                                                                            </td>
                                                                            <td><input type="checkbox"
                                                                                    name="port3ncpanel{{ $i }}"
                                                                                    id="">
                                                                            </td>
                                                                        @endif
                                                                    </tr>
                                                                @endif

                                                                @if ($port->puerto === 4)
                                                                    <tr>
                                                                        <td>4</td>
                                                                        <td>
                                                                            <input type="text" class="form-control"
                                                                                name="port4panel{{ $i }}name"
                                                                                id="" value="{{ $port->nombre }}">
                                                                        </td>
                                                                        @if ($port->puerto === 4 && $port->nonc === 'no')
                                                                            <td>
                                                                                <input type="checkbox"
                                                                                    name="port4nopanel{{ $i }}"
                                                                                    id="" checked>
                                                                            </td>
                                                                        @elseif ($port->puerto === 4 && $port->nonc === 'nc')
                                                                            <td>
                                                                                <input type="checkbox"
                                                                                    name="port4nopanel{{ $i }}"
                                                                                    id="">
                                                                            </td>
                                                                        @endif
                                                                        @if ($port->puerto === 4 && $port->nonc === 'no')
                                                                            <td><input type="checkbox"
                                                                                    name="port4ncpanel{{ $i }}"
                                                                                    id="">
                                                                            </td>
                                                                        @elseif ($port->puerto === 4 && $port->nonc === 'nc')
                                                                            <td><input type="checkbox"
                                                                                    name="port4ncpanel{{ $i }}"
                                                                                    id="" checked>
                                                                            </td>
                                                                        @endif

                                                                        @if ($port->puerto === 4 && $port->nonc === '-')
                                                                            <td><input type="checkbox"
                                                                                    name="port4nopanel{{ $i }}"
                                                                                    id="">
                                                                            </td>
                                                                            <td><input type="checkbox"
                                                                                    name="port4ncpanel{{ $i }}"
                                                                                    id="">
                                                                            </td>
                                                                        @endif
                                                                    </tr>

                                                                @endif

                                                                @if ($port->puerto === 5)
                                                                    <tr>
                                                                        <td>5</td>
                                                                        <td>
                                                                            <input type="text" class="form-control"
                                                                                name="port5panel{{ $i }}name"
                                                                                id="" value="{{ $port->nombre }}">
                                                                        </td>
                                                                        @if ($port->puerto === 5 && $port->nonc === 'no')
                                                                            <td>
                                                                                <input type="checkbox"
                                                                                    name="port5nopanel{{ $i }}"
                                                                                    id="" checked>
                                                                            </td>
                                                                        @elseif ($port->puerto === 5 && $port->nonc === 'nc')
                                                                            <td>
                                                                                <input type="checkbox"
                                                                                    name="port5nopanel{{ $i }}"
                                                                                    id="">
                                                                            </td>
                                                                        @endif
                                                                        @if ($port->puerto === 5 && $port->nonc === 'no')
                                                                            <td><input type="checkbox"
                                                                                    name="port5ncpanel{{ $i }}"
                                                                                    id="">
                                                                            </td>
                                                                        @elseif ($port->puerto === 5 && $port->nonc === 'nc')
                                                                            <td><input type="checkbox"
                                                                                    name="port5ncpanel{{ $i }}"
                                                                                    id="" checked>
                                                                            </td>
                                                                        @endif

                                                                        @if ($port->puerto === 5 && $port->nonc === '-')
                                                                            <td><input type="checkbox"
                                                                                    name="port5nopanel{{ $i }}"
                                                                                    id="">
                                                                            </td>
                                                                            <td><input type="checkbox"
                                                                                    name="port5ncpanel{{ $i }}"
                                                                                    id="">
                                                                            </td>
                                                                        @endif
                                                                    </tr>

                                                                @endif

                                                                @if ($port->puerto === 6)
                                                                    <tr>
                                                                        <td>6</td>
                                                                        <td>
                                                                            <input type="text" class="form-control"
                                                                                name="port6panel{{ $i }}name"
                                                                                id="" value="{{ $port->nombre }}">
                                                                        </td>
                                                                        @if ($port->puerto === 6 && $port->nonc === 'no')
                                                                            <td>
                                                                                <input type="checkbox"
                                                                                    name="port6nopanel{{ $i }}"
                                                                                    id="" checked>
                                                                            </td>
                                                                        @elseif ($port->puerto === 6 && $port->nonc === 'nc')
                                                                            <td>
                                                                                <input type="checkbox"
                                                                                    name="port6nopanel{{ $i }}"
                                                                                    id="">
                                                                            </td>
                                                                        @endif
                                                                        @if ($port->puerto === 6 && $port->nonc === 'no')
                                                                            <td><input type="checkbox"
                                                                                    name="port6ncpanel{{ $i }}"
                                                                                    id="">
                                                                            </td>
                                                                        @elseif ($port->puerto === 6 && $port->nonc === 'nc')
                                                                            <td><input type="checkbox"
                                                                                    name="port6ncpanel{{ $i }}"
                                                                                    id="" checked>
                                                                            </td>
                                                                        @endif
                                                                        @if ($port->puerto === 6 && $port->nonc === '-')
                                                                            <td><input type="checkbox"
                                                                                    name="port6nopanel{{ $i }}"
                                                                                    id="">
                                                                            </td>
                                                                            <td><input type="checkbox"
                                                                                    name="port6ncpanel{{ $i }}"
                                                                                    id="">
                                                                            </td>
                                                                        @endif
                                                                    </tr>
                                                                @endif

                                                                @if ($port->puerto === 7)
                                                                    <tr>
                                                                        <td>7</td>
                                                                        <td>
                                                                            <input type="text" class="form-control"
                                                                                name="port7panel{{ $i }}name"
                                                                                id="" value="{{ $port->nombre }}">
                                                                        </td>
                                                                        @if ($port->puerto === 7 && $port->nonc === 'no')
                                                                            <td>
                                                                                <input type="checkbox"
                                                                                    name="port7nopanel{{ $i }}"
                                                                                    id="" checked>
                                                                            </td>
                                                                        @elseif ($port->puerto === 7 && $port->nonc === 'nc')
                                                                            <td>
                                                                                <input type="checkbox"
                                                                                    name="port7nopanel{{ $i }}"
                                                                                    id="">
                                                                            </td>
                                                                        @endif
                                                                        @if ($port->puerto === 7 && $port->nonc === 'no')
                                                                            <td><input type="checkbox"
                                                                                    name="port7ncpanel{{ $i }}"
                                                                                    id="">
                                                                            </td>
                                                                        @elseif ($port->puerto === 7 && $port->nonc === 'nc')
                                                                            <td><input type="checkbox"
                                                                                    name="port7ncpanel{{ $i }}"
                                                                                    id="" checked>
                                                                            </td>
                                                                        @endif
                                                                        @if ($port->puerto === 7 && $port->nonc === '-')
                                                                            <td><input type="checkbox"
                                                                                    name="port7nopanel{{ $i }}"
                                                                                    id="">
                                                                            </td>
                                                                            <td><input type="checkbox"
                                                                                    name="port7ncpanel{{ $i }}"
                                                                                    id="">
                                                                            </td>
                                                                        @endif
                                                                    </tr>

                                                                @endif

                                                                @if ($port->puerto === 8)
                                                                    <tr>
                                                                        <td>8</td>
                                                                        <td>
                                                                            <input type="text" class="form-control"
                                                                                name="port8panel{{ $i }}name"
                                                                                id="" value="{{ $port->nombre }}">
                                                                        </td>
                                                                        @if ($port->puerto === 8 && $port->nonc === 'no')
                                                                            <td>
                                                                                <input type="checkbox"
                                                                                    name="port8nopanel{{ $i }}"
                                                                                    id="" checked>
                                                                            </td>
                                                                        @elseif ($port->puerto === 8 && $port->nonc === 'nc')
                                                                            <td>
                                                                                <input type="checkbox"
                                                                                    name="port8nopanel{{ $i }}"
                                                                                    id="">
                                                                            </td>
                                                                        @endif
                                                                        @if ($port->puerto === 8 && $port->nonc === 'no')
                                                                            <td><input type="checkbox"
                                                                                    name="port8ncpanel{{ $i }}"
                                                                                    id="">
                                                                            </td>
                                                                        @elseif ($port->puerto === 8 && $port->nonc === 'nc')
                                                                            <td><input type="checkbox"
                                                                                    name="port8ncpanel{{ $i }}"
                                                                                    id="" checked>
                                                                            </td>
                                                                        @endif
                                                                        @if ($port->puerto === 8 && $port->nonc === '-')
                                                                            <td><input type="checkbox"
                                                                                    name="port8nopanel{{ $i }}"
                                                                                    id="">
                                                                            </td>
                                                                            <td><input type="checkbox"
                                                                                    name="port8ncpanel{{ $i }}"
                                                                                    id="">
                                                                            </td>
                                                                        @endif
                                                                    </tr>
                                                                @endif
                                                            @endif

                                                        @endforeach

                                                    </tbody>
                                                </table>
                                                </p>
                                            </div>
                                        </div>

                                    @endfor
                                </div>
                                <br>
                                <input type="submit" class="btn btn-success">
                            </form>


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
    function addpanel(paneles) {
        let data = new FormData();
        data.append('paneles', paneles);
        fetch('addpanel/' + paneles, {
                method: "PUT",
                body: 'data'
            })
            .then(response => response)
            .then(json => console.log(json))
            .catch(err => console.log(err));
    }

    function deletepanel(paneles) {
        let data = new FormData();
        data.append('paneles', paneles);
        fetch('deletepanel/' + paneles, {
                method: "PUT",
                body: 'data'
            })
            .then(response => response)
            .then(json => console.log(json))
            .catch(err => console.log(err));
    }
</script>

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
