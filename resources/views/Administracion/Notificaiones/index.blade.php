@extends('adminlte::page')

@section('title', 'GoodLock | Notificationes')

@section('plugins.Sweetalert2', true)
@section('plugins.Select2', true)
@section('plugins.Datatables', true)

@section('content_header')
    <h1 style="color: orange"><i class="fas fa-user-plus"></i> Notificaciones <strong>residentes</strong></h1>
@stop

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Mensaje a residentes:</label>
                            <textarea name="mensaje" class="form-control" rows="3"></textarea>
                            <br>
                            <div class="justify-content-center">
                                <center><button type="submit" class="btn btn-primary"> ENVIAR</button></center>
                            </div>
                        </div>
                    </form>
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
