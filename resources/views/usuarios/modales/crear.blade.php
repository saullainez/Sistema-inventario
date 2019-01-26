<div class="modal fade" id="agregarUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
    <div class="modal-dialog modal-notify modal-info" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="heading lead">Agregar usuario</p>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <i class="fa fa-plus-circle fa-4x mb-3 animated rotateIn"></i>
                    <form>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                        <div class="mb-3">
                            <label for="nombre" >Nombre</label>
                            <input type="text" class="form-control input-crear" id="nombre">
                        </div>
                        <div class="mb-3">
                            <label for="email" >Correo electrónico</label>
                            <input type="text" class="form-control input-crear" id="email">
                        </div>
                        <div class="mb-3">
                            <label for="pass" >Contraseña</label>
                            <input type="password" class="form-control input-crear" id="pass">
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <button disabled data-dismiss="modal" class="btn btn-primary btn-crear" onclick="crearUsuario()">Guardar</button>
            </div>
        </div>
    </div>
</div>