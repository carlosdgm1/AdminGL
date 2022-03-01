<div class="modal fade" id="exampleModal-{{ $p->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit    "></i> Editar personal
                    {{ $p->nombre }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ route('update.personalB', $p->id) }}" method="POST">
                    @csrf @method('put')

                    <h5 class="card-title"><strong>Informacion general del personal</strong>
                    </h5>
                    <p class="card-text">Las opciones marcadas con un <span class="text-danger">*</span> son
                        obligatorios y no pueden quedar en blanco</p>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nombre completo <span
                                class="text-danger">*</span></label>
                        <input value="{{ $p->nombre }}" required name="nombre" type="text" class="form-control"
                            onkeyup="javascript:this.value=this.value.toUpperCase();">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Telefono <span class="text-danger">*</span></label>
                        <input value="{{ $p->telefono }}" required name="telefono" type="number"
                            class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Direccion <span class="text-danger">*</span></label>
                        <input value="{{ $p->direccion }}" required name="direccion" type="text"
                            class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Tipo de empleado <span
                                class="text-danger">*</span></label>
                        <input value="{{ $p->tipo }}" required name="tipo" type="text" class="form-control"
                            onkeyup="javascript:this.value=this.value.toUpperCase();">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Ine <span class="text-danger">*</span></label>
                        <input value="{{ $p->ine }}" required name="ine" type="text" class="form-control"
                            onkeyup="javascript:this.value=this.value.toUpperCase();">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Servicio <span class="text-danger">*</span></label>
                        <select required name="servicio" class="form-control" id="exampleFormControlSelect1">
                            <option value="{{ $p->servicio }}">{{ $p->servicio }}</option>
                            @foreach ($servicio as $s)
                                <option value="{{ $s->servicio }}">{{ $s->servicio }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Descripcion de
                            actividades</label>
                        <textarea name="nota" class="form-control" id="exampleFormControlTextarea1"
                            rows="3">{{ $p->nota }}</textarea>
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
