<div class="modal fade" id="Carro-{{ $p->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit    "></i> Listado de vehiculos de
                    {{ $p->nombre }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ route('updateR', $p->id) }}" method="POST">
                    @csrf @method('put')

                    <input type="hidden" value="{{ $p->id }}" name="idr">

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Placas</label>
                        <input required name="placas" type="text" class="form-control"
                            onkeyup="javascript:this.value=this.value.toUpperCase();">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">No. de tarjeta</label>
                        <input required name="tarjeta" type="text" class="form-control"
                            onkeyup="javascript:this.value=this.value.toUpperCase();">
                    </div>

                    <button type="submit" class="btn btn-primary">Guardar vehiculo</button>

                </form>

                <hr>

                <h5>Listado de vehiculos</h5>

                <div class="row align-items-start">
                    @foreach ($vehiculo as $v)
                        @if ($v->idr == $p->id)
                            <div class="col">
                               Placa: {{ $v->placa}}
                            </div>
                            <div class="col">
                               Tarjeta: {{$v->tarjeta}}
                            </div>
                            <div class="col">
                                One of three columns
                            </div>
                        @endif
                    @endforeach

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
