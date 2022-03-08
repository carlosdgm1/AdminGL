@extends('adminlte::page')

@section('title', 'GoodLock | Principal')

@section('plugins.Sweetalert2', true)
@section('plugins.Select2', true)
@section('plugins.Datatables', true)

@section('content_header')
    <h1 style="color: rgb(0, 174, 174);">Operacion <strong>Nueva visita</strong></h1>
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
                        <h5 class="card-header">Nueva visita</h5>
                        <div class="card-body">
                            @include('Operacion.components.modalCerrarPluma')

                            <h5>Notificaciones del residente</h5>
                            @foreach ($reporte as $item)
                                <ul>
                                    <li class="text-danger">{{ $item->titulo }}: <span
                                            class="font-weight-bold">{{ $item->razon }}</span></li>
                                </ul>
                            @endforeach
                            {{-- CAMARAS -------------------------------- --}}
                            <div class="card-group">

                                <div class="card">
                                    <div class="video-wrap">
                                        <video class="card-img-top" id="video" autoplay>
                                            <source src=".mp4" />
                                        </video>
                                    </div>

                                    <div class="card-body">
                                        <center>
                                            <h5 class="card-title"><strong>Camara Ine</strong></h5> <br>

                                            <button id="snap" class="btn btn-sm btn-dark">CAPTURAR</button>

                                            <br><br>
                                            <label for="brightnesswebcam" class="form-label">Brillo</label>
                                            <input onchange="brightw(this)" min="0" max="200" type="range"
                                                class="form-range" id="brightnesswebcam" step="5">
                                            <br>
                                            <label for="contrastwebcam" class="form-label">Contraste</label>
                                            <input onchange="contrastw(this)" min="0" max="200" type="range"
                                                class="form-range" id="contrastwebcam" step="5">
                                        </center>
                                    </div>
                                </div>

                                <div class="card">

                                    <video class="card-img-top"
                                        style="background: black url(loader.gif) center no-repeat;" id="remoteVideo"
                                        autoplay="" playsinline="" muted=""></video>

                                    <div class="card-body">
                                        <center>
                                            <h5 class="card-title"><strong>Camara Placas</strong></h5> <br>

                                            <button id="snap2" class="btn btn-sm btn-dark">CAPTURAR</button>

                                            <br><br>
                                            <label for="brightnesslicense" class="form-label">Brillo</label>
                                            <input onchange="brightl(this)" min="0" max="200" type="range"
                                                class="form-range" id="brightnesslicense" step="5">
                                            <br>
                                            <label for="contrastlicense" class="form-label">Contraste</label>
                                            <input onchange="contrastl(this)" min="0" max="200" type="range"
                                                class="form-range" id="contrastlicense" step="5">
                                        </center>
                                    </div>
                                </div>

                                <div class="card">

                                    <video class="card-img-top"
                                        style="background: black url(loader.gif) center no-repeat;" id="remoteVideo2"
                                        autoplay="" playsinline="" muted=""></video>

                                    <div class="card-body">
                                        <center>
                                            <h5 class="card-title"><strong>Frente de calle</strong></h5> <br>

                                            <button id="snap3" class="btn btn-sm btn-dark">CAPTURAR</button>

                                            <br><br>
                                            <label for="brightnesslicense" class="form-label">Brillo</label>
                                            <input onchange="brights(this)" min="0" max="200" type="range"
                                                class="form-range" id="brightnessstreet" step="5">
                                            <br>
                                            <label for="contraststreet" class="form-label">Contraste</label>
                                            <input onchange="contrasts(this)" min="0" max="200" type="range"
                                                class="form-range" id="contraststreet" step="5">
                                        </center>
                                    </div>
                                </div>
                            </div>

                            {{-- IMAGENES CAPTURADAS -------------------------------- --}}

                            <div class="card-group">
                                <div class="card">
                                    <div class="row">
                                        <canvas id="canvas" width="640" height="480"></canvas>
                                    </div>
                                    <div class="row" style="
                                            display: flex;
                                            justify-content: center;">
                                        <input type="checkbox" class="form-check-input" id="IN">

                                    </div>
                                </div>
                                <div class="card">
                                    <div class="row">
                                        <canvas id="canvas2" width="640" height="480"></canvas>
                                    </div>
                                    <div class="row" style="
                                            display: flex;
                                            justify-content: center;">
                                        <input type="checkbox" class="form-check-input" id="PL">
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="row">
                                        <canvas id="canvas3" width="640" height="480"></canvas>
                                    </div>
                                    <div class="row" style="
                                                display: flex;
                                                justify-content: center;">
                                        <input type="checkbox" class="form-check-input" id="FC">
                                    </div>
                                </div>
                            </div>

                            {{-- FORMULARIO DE CREACION -------------------------------- --}}
                            <br>

                            <div class="container">

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nombre completo</label>
                                    <input value="{{ old('nombre') }}"
                                        onkeyup="javascript:this.value=this.value.toUpperCase();" style="margin: 2px"
                                        required placeholder="Nombre completo" name="nombre" type="text"
                                        class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                </div>


                                <div class="row align-items-start">

                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Telefono</label>
                                            <input value="{{ old('telefono') }}"
                                                onkeyup="javascript:this.value=this.value.toUpperCase();"
                                                style="margin: 2px" required placeholder="Telefono" name="telefono"
                                                type="number" class="form-control" id="basic-url"
                                                aria-describedby="basic-addon3">
                                        </div>
                                    </div>

                                    <div class="col">
                                        @foreach ($idr as $item)
                                            <label for="exampleFormControlInput1" class="form-label">Calle de
                                                residente</label>
                                            <input readonly value="{{ $item->direccion }}"
                                                onkeyup="javascript:this.value=this.value.toUpperCase();"
                                                style="margin: 2px" required placeholder="INE" name="ine" type="text"
                                                class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                        @endforeach
                                    </div>

                                </div>

                                <div class="row align-items-start">

                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Placa</label>
                                            <input value="{{ old('placa') }}"
                                                onkeyup="javascript:this.value=this.value.toUpperCase();"
                                                style="margin: 2px" required placeholder="Placa" name="placa" type="text"
                                                class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                        </div>
                                    </div>

                                    <div class="col">
                                        <label for="exampleFormControlInput1" class="form-label">Fechas</label>
                                        <input readonly value="<?php echo date('Y-m-d'); ?>" style="margin: 2px" placeholder="Fecha"
                                            name="fecha" type="text" class="form-control" id="basic-url"
                                            aria-describedby="basic-addon3">
                                    </div>

                                </div>

                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Residente al que
                                            visita</label>
                                        <input readonly value="{{ $item->nombre }}" style="margin: 2px" required
                                            type="text" class="form-control">
                                        <input value="{{ $item->id }}" type="hidden" name="idr">
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Motivo</label>

                                        <textarea onkeyup="javascript:this.value=this.value.toUpperCase();" required
                                            name="motivo" class="form-control" id="floatingTextarea2"
                                            style="height: 100px">{{ old('motivo') }}</textarea>

                                    </div>
                                </div>

                                <center><input type="submit" onclick="post()" value="GUARDAR DATOS" name="guardar"
                                        class="btn btn-primary">
                                </center>

                            </div>

                            <br>
                            <select name="arduino" class="form-select" id="puerto">
                                @foreach ($arduino as $port)
                                    @if ($port->nombre !== null)
                                        <option value="{{ $port->id }}">{{ $port->nombre }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <br>
                            <center>
                                {{-- <button type="button" class="btn btn-dark ml-1" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    onclick="open1()">ABRIR PLUMA</button> --}}

                                <button type="button" class="btn btn-dark ml-1" onclick='open1()'>
                                    ABRIR PLUMA
                                </button>

                                @include('Operacion.components.cerrarpluma')
                            </center>


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
