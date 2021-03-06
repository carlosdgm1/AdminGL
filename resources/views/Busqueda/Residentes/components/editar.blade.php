<div class="modal fade" id="exampleModal-{{ $p->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit    "></i> Editar residente
                    {{ $p->nombre }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ route('updateR', $p->id) }}" method="POST">
                    @csrf @method('put')

                    <h5 class="card-title"><strong>Informacion general del personal</strong>
                    </h5>
                    <p class="card-text">Las opciones marcadas con un <span class="text-danger">*</span> son
                        obligatorios y no pueden quedar en blanco</p>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nombre completo <span
                                class="text-danger">*</span></label>
                        <input value="{{  $p->nombre }}" required name="nombre" type="text" class="form-control"
                            onkeyup="javascript:this.value=this.value.toUpperCase();">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Telefono <span class="text-danger">*</span></label>
                        <input value="{{  $p->telefono }}" required name="telefono" type="number"
                            class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Direccion <span class="text-danger">*</span></label>
                        <input value="{{  $p->direccion }}" required name="direccion" type="text"
                            class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Tipo de residente <span
                                class="text-danger">*</span></label>
                        <input value="{{  $p->tipo }}" required name="tipo" type="text" class="form-control"
                            onkeyup="javascript:this.value=this.value.toUpperCase();">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Correo <span class="text-danger">*</span></label>
                        <input value="{{  $p->correo }}" required name="correo" type="text" class="form-control"
                            onkeyup="javascript:this.value=this.value.toUpperCase();">
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
