<div class="modal fade" id="exampleModal-{{ $p->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit    "></i> Editar Reporte</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <form method="POST" action="{{ route('edit-reportes', $p->id) }}">
                    @csrf @method('put')

                    @foreach ($correo as $item)
                        <input name="correo" type="hidden" value="{{ $item->correo }}">
                    @endforeach

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Titulo <span class="text-danger">*</span></label>
                        <input value="{{ $p->titulo }}" required name="titulo" type="text" class="form-control"
                            onkeyup="javascript:this.value=this.value.toUpperCase();">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Razon <span class="text-danger">*</span></label>
                        <textarea required name="razon" type="text" class="form-control"
                            onkeyup="javascript:this.value=this.value.toUpperCase();">{{ $p->razon }}</textarea>
                    </div>




            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
