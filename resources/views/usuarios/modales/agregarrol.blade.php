<div class="modal fade" id="agregarRolUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
    <div class="modal-dialog modal-notify modal-info" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="heading lead">Agregar rol a usuario</p>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <i class="fa fa-plus-circle fa-4x mb-3 animated rotateIn"></i>
                    <form>
                        <h3>Lista de roles</h3>
                        <hr>
                        <div id="listaRoles" class="control-group">

                        </div>

                        <input type="hidden" name="_tokenAR" value="{{ csrf_token() }}" id="tokenAR">

                    </form>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <button disabled data-dismiss="modal" class="btn btn-primary" id="agregarRol">Guardar</button>
            </div>
        </div>
    </div>
</div>