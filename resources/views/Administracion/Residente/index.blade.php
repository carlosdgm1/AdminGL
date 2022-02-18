@extends('adminlte::page')

@section('title', 'GoodLock | Principal')

@section('plugins.Sweetalert2', true)
@section('plugins.Select2', true)
@section('plugins.Datatables', true)

@section('content_header')
    <h1 style="color: orange"><i class="fas fa-user-plus"></i> Crear <strong>residente</strong></h1>
@stop

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <h5 class="card-header"><strong>FORMULARIO DE ALTA RESIDENTE</strong></h5>
                        <div class="card-body">

                            @if (session('info'))
                                <div class="alert alert-success">
                                    <strong>{{ session('info') }}</strong>
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#NuevoServicio">
                                <i class="fa fa-plus" aria-hidden="true"></i> Dar de alta nuevo servicio
                            </button>
                            @include('Administracion.Residente.components.crear-servicio')
                            <br><br>
                            <form action="{{ route('createR') }}" method="POST">
                                @csrf
                                <h5 class="card-title"><strong>Informacion general del personal</strong>
                                </h5>
                                <p class="card-text">Las opciones marcadas con un <span class="text-danger">*</span>
                                    son obligatorios</p>

                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Nombre completo <span
                                            class="text-danger">*</span></label>
                                    <input value="{{ old('nombre') }}" required name="nombre" type="text"
                                        class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Telefono <span
                                            class="text-danger">*</span></label>
                                    <input value="{{ old('telefono') }}" required name="telefono" type="number"
                                        class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Direccion <span
                                            class="text-danger">*</span></label>
                                    <input value="{{ old('direccion') }}" required name="direccion" type="text"
                                        class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Correo <span
                                            class="text-danger">*</span></label>
                                    <input value="{{ old('correo') }}" required name="correo" type="email"
                                        class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Tipo de residente <span
                                            class="text-danger">*</span></label>
                                    <select value="{{ old('tipo') }}" required name="tipo" class="form-control"
                                        id="exampleFormControlSelect1">
                                        <option value="">Tipos activos ..</option>
                                        @foreach ($tipo as $t)
                                            <option value="{{ $t->tipo }}">{{ $t->tipo }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <button class="btn btn-primary" type="submit">Guardar registro</button>
                            </form>

                            
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
