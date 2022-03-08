@extends('adminlte::page')

@section('title', 'GoodLock | Principal')

@section('plugins.Sweetalert2', true)
@section('plugins.Select2', true)
@section('plugins.Datatables', true)

@section('content_header')
    <h1 style="color: rgb(0, 174, 174);">Operacion <strong>Visitas abiertas</strong></h1>
@stop

@section('content')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="http://hongru.github.io/proj/canvas2image/canvas2image.js"></script>
    <script src="{{ asset('js/Unreal Media Server WebRTC player_files/unrealwebrtcplayer.js.descarga') }}"></script>
    <script src="{{ asset('js/Unreal Media Server WebRTC player_files/webrtcadapter.js.descarga') }}"></script>

    <script type="text/javascript">
        var webrtcPlayer = null;
    </script>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">


                        <h5 class="card-header">Visitas abiertas</h5>
                        <div class="card-body">
                            <h5 class="modal-title" id="exampleModalLabel">Visitas pendientes
                                de salida
                            </h5>

                            <div style="margin-top: 20px">

                                <p><strong>Instrucciones de cerrado de visitas</strong> <br>
                               1. Captura la imagend e la placa del visitante que saldra <br>
                               2. Selecciona el visitante que salfra en la tabla <br>
                               3. Gurada los datos de salida y abre la pluma</p>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="card text-center" id="salida">
                                            <div class="card-body">
                                                
                                                <video
                                                    style="background: black url(loader.gif) center no-repeat; margin:auto;"
                                                    id="remoteVideo3" width="300" height="300" autoplay="" playsinline=""
                                                    muted=""></video>

                                                <div class="card-body" style="text-align:center">
                                                    <h5 class="card-title ">Camara Placas</h5><br>
                                                    <div class="d-flex justify-content-center">

                                                        <a href="#pluma" id="snap4" class="btn btn-dark"
                                                            onclick="document.getElementById('pluma').disabled=false;"
                                                            disabled>CAPTURAR</a>
                                                    </div>
                                                    <br>
                                                    <label for="brightnesslicense2" class="form-label">Brillo</label>
                                                    <input onchange="brightl2(this)" min="0" max="200" type="range"
                                                        class="form-range" id="brightnesslicense2" step="5">
                                                    <label for="contrastlicense2" class="form-label">Contraste</label>
                                                    <input onchange="contrastl2(this)" min="0" max="200" type="range"
                                                        class="form-range" id="contrastlicense2" step="5">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <canvas id="canvas4" width="400" height="400"></canvas>
                                                <br>
                                                <br>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <p class="fs-2">Visitas abiertas</p>
                                <table id="example" class="table table-sm table-secondary table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Folio</th>
                                            <th>Nombre</th>
                                            <th>Calle</th>
                                            <th>Placa</th>
                                            <th>Residente</th>
                                            <th>Salida</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($BV as $itemR)
                                            <tr>
                                                <td>{{ $itemR->id }}</td>
                                                <td>{{ $itemR->nombre }}</td>
                                                <td>{{ $itemR->ine }}</td>
                                                <td>{{ $itemR->placa }}</td>

                                                @foreach ($idr as $item)
                                                    @if ($itemR->idr == $item->id)
                                                        <td>{{ $item->nombre }}</td>
                                                    @endif
                                                @endforeach

                                                <td>
                                                    <button onclick="exitBtn({{ $itemR->id }})"
                                                        class="btn btn-warning">Registrar
                                                        salida</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <input type="hidden" name="" id="hiddenid">

                                {{-- <div class="card" id="salida">

                                    <video style="background: black url(loader.gif) center no-repeat; margin:auto;"
                                        id="remoteVideo3" width="400" height="400" autoplay="" playsinline=""
                                        muted=""></video>

                                    <div class="card-body" style="text-align:center">
                                        <h5 class="card-title ">Camara Placas</h5>
                                        <div class="d-flex justify-content-center">
                                            <a href="#pluma" id="snap4" class="btn btn-dark"
                                                onclick="document.getElementById('pluma').disabled=false;"
                                                disabled>CAPTURAR</a>
                                        </div>
                                        <br>
                                        <label for="brightnesslicense2" class="form-label">Brillo</label>
                                        <input onchange="brightl2(this)" min="0" max="200" type="range"
                                            class="form-range" id="brightnesslicense2" step="5">
                                        <label for="contrastlicense2" class="form-label">Contraste</label>
                                        <input onchange="contrastl2(this)" min="0" max="200" type="range"
                                            class="form-range" id="contrastlicense2" step="5">
                                    </div>
                                </div>
                                <div class="card">
                                    <canvas id="canvas4" width="400" height="400"></canvas>
                                </div> --}}
                            </div>
                            <br>
                            <div>
                                <div class="d-flex justify-content-center">
                                    <input type="submit" onclick="postexit()" value="GUARDAR DATOS" name="guardar"
                                        class="btn btn-primary">
                                </div>
                            </div>
                            <select name="arduino" class="custom-select mt-3 mb-3" id="puerto" >
                                @foreach ($arduino as $port)
                                    @if ($port->nombre !== null)
                                        <option value="{{ $port->id }}">{{ $port->nombre }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <div class="d-flex justify-content-center">

                                <button type="button" class="btn btn-dark ml-1" data-toggle="modal" id="pluma"
                                    data-target="#exampleModal" onclick='open1()' disabled>
                                    Abrir pluma
                                </button>

                                {{-- <button class="btn btn-dark ml-1" data-bs-toggle="modal" id="pluma"
                                    data-bs-target="#modalPluma" onclick="fetch('api/open')
                                                    .then(response => response)
                                                    .then(json => console.log(json))
                                                    .catch(err => console.log(err))" disabled>ABRIR PLUMA</button> --}}

                                {{-- @include('Operacion.components.modalCerrarPluma') --}}
                                @include('Operacion.components.cerrarpluma')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    @include('Operacion.components.js')
    <!-- /.content -->
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
