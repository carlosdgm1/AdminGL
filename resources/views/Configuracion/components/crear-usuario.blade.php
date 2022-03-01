<div class="modal fade" id="CrearU" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus" aria-hidden="true"></i> Crear usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route('usuariosC') }}">
                @csrf
                    <input name="idf" type="hidden" value="{{$idf}}">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nombre del nuevo usuario</label>
                    <input required name="name" type="text" class="form-control">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Username</label>
                    <input required name="username" type="text" class="form-control">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Correo</label>
                    <input required name="email" type="email" class="form-control">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Contraseña</label>
                    <input required name="password" type="password" class="form-control">
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
