<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <form method="POST" action="{{ route('crear-reportes') }}"> 
                @csrf

                <div class="form-group">
                    <label for="exampleFormControlInput1">Titulo <span
                            class="text-danger">*</span></label>
                    <input value="{{old ('titulo')}}" required name="titulo" type="text" class="form-control"
                        onkeyup="javascript:this.value=this.value.toUpperCase();">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Razon <span
                            class="text-danger">*</span></label>
                    <textarea value="{{old ('razon')}}" required name="razon" type="text" class="form-control"
                        onkeyup="javascript:this.value=this.value.toUpperCase();"></textarea>
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