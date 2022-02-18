@extends('adminlte::page')

@section('title', 'GoodLock | Principal')

@section('plugins.Sweetalert2', true)
@section('plugins.Select2', true)
@section('plugins.Datatables', true)

@section('content_header')
    <h1 style="color: orange"><i class="fas fa-user-plus"></i> Crear <strong>personal</strong></h1>
@stop

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">



                    <div class="card">
                        <h5 class="card-header"><strong>FORMULARIO DE ALTA PERSONAL</strong></h5>
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
                            @include('Administracion.Personal.components.crear-servicio')

                            <form action="{{ route('createP') }}" method="POST">
                                @csrf
                                <div class="row mt-3">
                                    <div class="col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title"><strong>Informacion general del personal</strong>
                                                </h5>
                                                <p class="card-text">Las opciones marcadas con un <span
                                                        class="text-danger">*</span> son obligatorios</p>

                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Nombre completo <span
                                                            class="text-danger">*</span></label>
                                                    <input value="{{old ('nombre')}}" required name="nombre" type="text" class="form-control"
                                                        onkeyup="javascript:this.value=this.value.toUpperCase();">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Telefono <span
                                                            class="text-danger">*</span></label>
                                                    <input value="{{old ('telefono')}}" required name="telefono" type="number" class="form-control"
                                                        onkeyup="javascript:this.value=this.value.toUpperCase();">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Direccion <span
                                                            class="text-danger">*</span></label>
                                                    <input value="{{old ('direccion')}}" required name="direccion" type="text" class="form-control"
                                                        onkeyup="javascript:this.value=this.value.toUpperCase();">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Tipo de empleado <span
                                                            class="text-danger">*</span></label>
                                                    <input value="{{old ('tipo')}}" required name="tipo" type="text" class="form-control"
                                                        onkeyup="javascript:this.value=this.value.toUpperCase();">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Ine <span
                                                            class="text-danger">*</span></label>
                                                    <input value="{{old ('ine')}}" required name="ine" type="text" class="form-control"
                                                        onkeyup="javascript:this.value=this.value.toUpperCase();">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Servicio <span
                                                            class="text-danger">*</span></label>
                                                    <select value="{{old ('servicio')}}" required name="servicio" class="form-control"
                                                        id="exampleFormControlSelect1">
                                                        <option value="">Servicio activos ..</option>
                                                        @foreach ($servicio as $s)
                                                            <option value="{{ $s->servicio }}">{{ $s->servicio }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">En caso de que el personal trabaje para un
                                                    residente llenar el siguiente formulario</h5>
                                                <br><br>

                                                <div class="form-group mt-3">
                                                    <label for="exampleFormControlInput1">Nombre del residente para el que
                                                        trabaja</label>
                                                    <select value="{{old ('idr')}}" name="idr" class="form-control"
                                                        id="exampleFormControlSelect1">
                                                        <option value="">Residentes activos ..</option>
                                                        @foreach ($idr as $r)
                                                            <option value="{{ $r->id }}">{{ $r->nombre }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">Descripcion de
                                                        actividades</label>
                                                    <textarea name="nota" class="form-control"
                                                        id="exampleFormControlTextarea1" rows="3">{{old ('nota')}}</textarea>
                                                </div>

                                                <br>
                                                <button type="submit" class="btn btn-primary">Guardar registros</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
