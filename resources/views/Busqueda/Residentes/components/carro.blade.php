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

                <form action="{{ route('crearVehiculo') }}" method="POST">
                    @csrf

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

                @foreach ($vehiculo as $v)
                    @if ($v->idr == $p->id)
                        <div class="row align-items-start">

                            <div class="col">
                                <p> <strong><i class="fas fa-angle-right    "></i></strong> Placa: {{ $v->placa }}
                                </p>
                            </div>
                            <div class="col">
                                Tarjeta: {{ $v->tarjeta }}
                            </div>
                            <div class="col">
                                <form style="margin: 0" action="{{ route('deleteVisita', $v->id) }}" method="POST">
                                    @csrf @method('delete')
                                    <button class="btn btn-danger"><i class="fa fa-trash"
                                            aria-hidden="true"></i></button>
                                </form>
                            </div>
                        </div>
                        <hr>
                    @endif
                @endforeach


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
