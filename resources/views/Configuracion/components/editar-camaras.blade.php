<div class="modal fade" id="exampleModal{{ $cam->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar camaras</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route('modificar-cam', $cam->id) }}">
                    @csrf @method('put')
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Frente de calle</label>
                        <input type="text" name="frente" class="form-control" id="frente"
                            value="{{ $cam->frente }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Camara Placas</label>
                        <input type="text" name="placa" class="form-control" id="placa" value="{{ $cam->placa }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Camara Ine</label>
                        <input type="text" name="ine" class="form-control" id="ine" value="{{ $cam->ine }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Camara Salida</label>
                        <input type="text" name="salida" class="form-control" id="salida"
                            value="{{ $cam->salida }}">
                    </div>

                

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </form>
            </div>
        </div>
    </div>
</div>
