<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Document</title>
</head>

<body>

    <table id="example" class="table table-striped">
        <thead>
            <tr>
                <th>Frente de calle</th>
                <th>Camara de placas</th>
                <th>Ine</th>
                <th>Camara de salida</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($camaras as $cam)
                <tr>
                    <td>{{ $cam->frente }}</td>
                    <td>{{ $cam->placa }}</td>
                    <td>{{ $cam->ine }}</td>
                    <td>{{ $cam->salida }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

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
                                                <input type="text" disabled class="form-control"
                                                    name="port1panel{{ $i }}name" id=""
                                                    value="{{ $port->nombre }}">
                                            </td>
                                            @if ($port->puerto === 1 && $port->nonc === 'no')
                                                <td>
                                                    <input type="checkbox" name="port1nopanel{{ $i }}" id=""
                                                        checked>
                                                </td>
                                            @elseif ($port->puerto === 1 && $port->nonc === 'nc')
                                                <td>
                                                    <input type="checkbox" name="port1nopanel{{ $i }}"
                                                        id="">
                                                </td>
                                            @endif
                                            @if ($port->puerto === 1 && $port->nonc === 'no')
                                                <td><input type="checkbox" name="port1ncpanel{{ $i }}"
                                                        id="">
                                                </td>
                                            @elseif ($port->puerto === 1 && $port->nonc === 'nc')
                                                <td><input type="checkbox" name="port1ncpanel{{ $i }}" id=""
                                                        checked>
                                                </td>
                                            @endif
                                            @if ($port->puerto === 1 && $port->nonc === '-')
                                                <td><input type="checkbox" name="port1nopanel{{ $i }}"
                                                        id="">
                                                </td>
                                                <td><input type="checkbox" name="port1ncpanel{{ $i }}"
                                                        id="">
                                                </td>
                                            @endif
                                        </tr>
                                    @endif
                                    @if ($port->puerto === 2)
                                        <tr>
                                            <td>2</td>
                                            <td>
                                                <input type="text" disabled class="form-control"
                                                    name="port2panel{{ $i }}name" id=""
                                                    value="{{ $port->nombre }}">
                                            </td>
                                            @if ($port->puerto === 2 && $port->nonc === 'no')
                                                <td>
                                                    <input type="checkbox" name="port2nopanel{{ $i }}" id=""
                                                        checked>
                                                </td>
                                            @elseif ($port->puerto === 2 && $port->nonc === 'nc')
                                                <td>
                                                    <input type="checkbox" name="port2nopanel{{ $i }}"
                                                        id="">
                                                </td>
                                            @endif
                                            @if ($port->puerto === 2 && $port->nonc === 'no')
                                                <td><input type="checkbox" name="port2ncpanel{{ $i }}"
                                                        id="">
                                                </td>
                                            @elseif ($port->puerto === 2 && $port->nonc === 'nc')
                                                <td><input type="checkbox" name="port2ncpanel{{ $i }}" id=""
                                                        checked>
                                                </td>
                                            @endif

                                            @if ($port->puerto === 2 && $port->nonc === '-')
                                                <td><input type="checkbox" name="port2nopanel{{ $i }}"
                                                        id="">
                                                </td>
                                                <td><input type="checkbox" name="port2ncpanel{{ $i }}"
                                                        id="">
                                                </td>
                                            @endif
                                        </tr>
                                    @endif
                                    @if ($port->puerto === 3)
                                        <tr>
                                            <td>3</td>
                                            <td>
                                                <input type="text" disabled class="form-control"
                                                    name="port3panel{{ $i }}name" id=""
                                                    value="{{ $port->nombre }}">
                                            </td>
                                            @if ($port->puerto === 3 && $port->nonc === 'no')
                                                <td>
                                                    <input type="checkbox" name="port3nopanel{{ $i }}" id=""
                                                        checked>
                                                </td>
                                            @elseif ($port->puerto === 3 && $port->nonc === 'nc')
                                                <td>
                                                    <input type="checkbox" name="port3nopanel{{ $i }}"
                                                        id="">
                                                </td>
                                            @endif
                                            @if ($port->puerto === 3 && $port->nonc === 'no')
                                                <td><input type="checkbox" name="port3ncpanel{{ $i }}"
                                                        id="">
                                                </td>
                                            @elseif ($port->puerto === 3 && $port->nonc === 'nc')
                                                <td><input type="checkbox" name="port3ncpanel{{ $i }}" id=""
                                                        checked>
                                                </td>
                                            @endif

                                            @if ($port->puerto === 3 && $port->nonc === '-')
                                                <td><input type="checkbox" name="port3nopanel{{ $i }}"
                                                        id="">
                                                </td>
                                                <td><input type="checkbox" name="port3ncpanel{{ $i }}"
                                                        id="">
                                                </td>
                                            @endif
                                        </tr>
                                    @endif

                                    @if ($port->puerto === 4)
                                        <tr>
                                            <td>4</td>
                                            <td>
                                                <input type="text" disabled class="form-control"
                                                    name="port4panel{{ $i }}name" id=""
                                                    value="{{ $port->nombre }}">
                                            </td>
                                            @if ($port->puerto === 4 && $port->nonc === 'no')
                                                <td>
                                                    <input type="checkbox" name="port4nopanel{{ $i }}" id=""
                                                        checked>
                                                </td>
                                            @elseif ($port->puerto === 4 && $port->nonc === 'nc')
                                                <td>
                                                    <input type="checkbox" name="port4nopanel{{ $i }}"
                                                        id="">
                                                </td>
                                            @endif
                                            @if ($port->puerto === 4 && $port->nonc === 'no')
                                                <td><input type="checkbox" name="port4ncpanel{{ $i }}"
                                                        id="">
                                                </td>
                                            @elseif ($port->puerto === 4 && $port->nonc === 'nc')
                                                <td><input type="checkbox" name="port4ncpanel{{ $i }}" id=""
                                                        checked>
                                                </td>
                                            @endif

                                            @if ($port->puerto === 4 && $port->nonc === '-')
                                                <td><input type="checkbox" name="port4nopanel{{ $i }}"
                                                        id="">
                                                </td>
                                                <td><input type="checkbox" name="port4ncpanel{{ $i }}"
                                                        id="">
                                                </td>
                                            @endif
                                        </tr>
                                    @endif

                                    @if ($port->puerto === 5)
                                        <tr>
                                            <td>5</td>
                                            <td>
                                                <input type="text" disabled class="form-control"
                                                    name="port5panel{{ $i }}name" id=""
                                                    value="{{ $port->nombre }}">
                                            </td>
                                            @if ($port->puerto === 5 && $port->nonc === 'no')
                                                <td>
                                                    <input type="checkbox" name="port5nopanel{{ $i }}" id=""
                                                        checked>
                                                </td>
                                            @elseif ($port->puerto === 5 && $port->nonc === 'nc')
                                                <td>
                                                    <input type="checkbox" name="port5nopanel{{ $i }}"
                                                        id="">
                                                </td>
                                            @endif
                                            @if ($port->puerto === 5 && $port->nonc === 'no')
                                                <td><input type="checkbox" name="port5ncpanel{{ $i }}"
                                                        id="">
                                                </td>
                                            @elseif ($port->puerto === 5 && $port->nonc === 'nc')
                                                <td><input type="checkbox" name="port5ncpanel{{ $i }}" id=""
                                                        checked>
                                                </td>
                                            @endif

                                            @if ($port->puerto === 5 && $port->nonc === '-')
                                                <td><input type="checkbox" name="port5nopanel{{ $i }}"
                                                        id="">
                                                </td>
                                                <td><input type="checkbox" name="port5ncpanel{{ $i }}"
                                                        id="">
                                                </td>
                                            @endif
                                        </tr>
                                    @endif

                                    @if ($port->puerto === 6)
                                        <tr>
                                            <td>6</td>
                                            <td>
                                                <input type="text" disabled class="form-control"
                                                    name="port6panel{{ $i }}name" id=""
                                                    value="{{ $port->nombre }}">
                                            </td>
                                            @if ($port->puerto === 6 && $port->nonc === 'no')
                                                <td>
                                                    <input type="checkbox" name="port6nopanel{{ $i }}" id=""
                                                        checked>
                                                </td>
                                            @elseif ($port->puerto === 6 && $port->nonc === 'nc')
                                                <td>
                                                    <input type="checkbox" name="port6nopanel{{ $i }}"
                                                        id="">
                                                </td>
                                            @endif
                                            @if ($port->puerto === 6 && $port->nonc === 'no')
                                                <td><input type="checkbox" name="port6ncpanel{{ $i }}"
                                                        id="">
                                                </td>
                                            @elseif ($port->puerto === 6 && $port->nonc === 'nc')
                                                <td><input type="checkbox" name="port6ncpanel{{ $i }}" id=""
                                                        checked>
                                                </td>
                                            @endif
                                            @if ($port->puerto === 6 && $port->nonc === '-')
                                                <td><input type="checkbox" name="port6nopanel{{ $i }}"
                                                        id="">
                                                </td>
                                                <td><input type="checkbox" name="port6ncpanel{{ $i }}"
                                                        id="">
                                                </td>
                                            @endif
                                        </tr>
                                    @endif

                                    @if ($port->puerto === 7)
                                        <tr>
                                            <td>7</td>
                                            <td>
                                                <input type="text" disabled class="form-control"
                                                    name="port7panel{{ $i }}name" id=""
                                                    value="{{ $port->nombre }}">
                                            </td>
                                            @if ($port->puerto === 7 && $port->nonc === 'no')
                                                <td>
                                                    <input type="checkbox" name="port7nopanel{{ $i }}" id=""
                                                        checked>
                                                </td>
                                            @elseif ($port->puerto === 7 && $port->nonc === 'nc')
                                                <td>
                                                    <input type="checkbox" name="port7nopanel{{ $i }}"
                                                        id="">
                                                </td>
                                            @endif
                                            @if ($port->puerto === 7 && $port->nonc === 'no')
                                                <td><input type="checkbox" name="port7ncpanel{{ $i }}"
                                                        id="">
                                                </td>
                                            @elseif ($port->puerto === 7 && $port->nonc === 'nc')
                                                <td><input type="checkbox" name="port7ncpanel{{ $i }}" id=""
                                                        checked>
                                                </td>
                                            @endif
                                            @if ($port->puerto === 7 && $port->nonc === '-')
                                                <td><input type="checkbox" name="port7nopanel{{ $i }}"
                                                        id="">
                                                </td>
                                                <td><input type="checkbox" name="port7ncpanel{{ $i }}"
                                                        id="">
                                                </td>
                                            @endif
                                        </tr>
                                    @endif

                                    @if ($port->puerto === 8)
                                        <tr>
                                            <td>8</td>
                                            <td>
                                                <input type="text" disabled class="form-control"
                                                    name="port8panel{{ $i }}name" id=""
                                                    value="{{ $port->nombre }}">
                                            </td>
                                            @if ($port->puerto === 8 && $port->nonc === 'no')
                                                <td>
                                                    <input type="checkbox" name="port8nopanel{{ $i }}" id=""
                                                        checked>
                                                </td>
                                            @elseif ($port->puerto === 8 && $port->nonc === 'nc')
                                                <td>
                                                    <input type="checkbox" name="port8nopanel{{ $i }}"
                                                        id="">
                                                </td>
                                            @endif
                                            @if ($port->puerto === 8 && $port->nonc === 'no')
                                                <td><input type="checkbox" name="port8ncpanel{{ $i }}"
                                                        id="">
                                                </td>
                                            @elseif ($port->puerto === 8 && $port->nonc === 'nc')
                                                <td><input type="checkbox" name="port8ncpanel{{ $i }}" id=""
                                                        checked>
                                                </td>
                                            @endif
                                            @if ($port->puerto === 8 && $port->nonc === '-')
                                                <td><input type="checkbox" name="port8nopanel{{ $i }}"
                                                        id="">
                                                </td>
                                                <td><input type="checkbox" name="port8ncpanel{{ $i }}"
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
    Informacion de la red
    <ul>
        @foreach ($host as $key => $info)
            <li>{{ $key }}: {{ $info }}</li>
        @endforeach
    </ul>
    Informacion del cliente
    <ul>
        @foreach ($client as $key => $info)
            <li>{{ $key }}: {{ $info }}</li>
        @endforeach
    </ul>
    Informacion del software
    <ul>
        @foreach ($sw as $key => $info)
            <li>{{ $key }}: {{ $info }}</li>
        @endforeach
    </ul>
    Informacion del hardware
    <ul>
        @foreach ($hw as $key => $info)
            <li>{{ $key }}: {{ $info }}</li>
        @endforeach
        <li>Información del disco</li>
        <ul>
            @foreach ($disk as $key => $info)
                <li>{{ $key }}: {{ $info }}</li>
            @endforeach
        </ul>
        <li>Información de la ram</li>
        <ul>
            @foreach ($ram as $key => $info)
                <li>{{ $key }}: {{ $info }}</li>
            @endforeach
        </ul>


    </ul>


</body>

<script src="{{ asset('js/bootstrap.min.js') }}" defer></script>

</html>
