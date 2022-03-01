<div class="modal fade" id="exampleModal-{{ $p->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-info" aria-hidden="true"></i>
                    Informacion
                    {{ $p->nombre }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <h5 class="card-title"><strong>Informacion general del personal</strong>
                </h5>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Nombre completo </label>
                    <input readonly value="{{ $p->nombre }}" required name="nombre" type="text"
                        class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Telefono </label>
                    <input readonly value="{{ $p->telefono }}" required name="telefono" type="number"
                        class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Residente </label>
                    @foreach ($R as $item)
                        @if ($item->id == $p->idr)
                            <input readonly value="{{ $item->nombre }}" required name="direccion" type="text"
                                class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();">
                        @endif
                    @endforeach
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Calle de reisdente </label>
                    <input readonly value="{{ $p->ine }}" required name="direccion" type="text"
                        class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Placa</label>
                    <input readonly value="{{ $p->placa }}" required name="tipo" type="text" class="form-control"
                        onkeyup="javascript:this.value=this.value.toUpperCase();">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Motivo </label>
                    <textarea readonly value="" required name="correo" type="text" class="form-control"
                        onkeyup="javascript:this.value=this.value.toUpperCase();">{{ $p->motivo }}</textarea>
                </div>


                <center>
                    
                    <h4 class="fs-3">Imagenes guardadas</h4>
                    <h5 class="fs-5">Placas</h5>
                    <div class="text-center">
                        <img src="{{ asset('storage/ine/' . $p->ine_foto) }}" class="rounded" width="300px"
                            height="300px">
                    </div>
                    <br>
                    <h5 class="fs-5">Placas</h5>
                    <div class="text-center">
                        <img src="{{ asset('storage/placa/' . $p->placa_foto) }}" class="rounded" width="300px"
                            height="300px">
                    </div>
                    <br>
                    <h5 class="fs-5">Cara</h5>
                    <div class="text-center">
                        <img src="{{ asset('storage/cara/' . $p->cara_foto) }}" class="rounded" width="300px"
                            height="300px">
                    </div>


                </center>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>
