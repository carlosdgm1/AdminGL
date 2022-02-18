<div class="modal fade" id="NuevoServicio" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><i class="fa fa-plus" aria-hidden="true"></i>
                    Crear tipo de residente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <h4>Crear nuevo tipo de residente</h4>

                <form action="{{ route('crearTR') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Tipo de residente</label>
                        <input required name="tipo" type="text" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();">
                    </div>

                    <div class="btn-group btn-group-sm" role="group">
                        <button type="submit" class="btn btn-primary">Guardar servicio</button>
                    </div>

                </form>

                <h4 class="mt-4">Listado de servicios activos</h4>

                <table class="table table-secondary table-striped table-bordered ">
                    <thead>
                        <tr>
                            <th scope="col">Nombre de servicio</th>
                            <th scope="col">Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tipo as $s)
                            <tr>
                                <th scope="row">{{ $s->tipo }}</th>
                                <td>
                                    <form method="POST" action="{{ route('eliminarTR', $s->id) }}">
                                        @csrf @method('delete')
                                        <div class="btn-group btn-group-sm" role="group">
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
