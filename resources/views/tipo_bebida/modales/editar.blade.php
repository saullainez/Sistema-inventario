<div class="modal fade" id="editarTipoBebidaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
    <div class="modal-dialog modal-notify modal-info" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="heading lead">Editar tipo de bebida</p>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                <i class="fa fa-edit fa-4x mb-3 animated rotateIn"></i>
                    <form>
                        <input type="hidden" name="_tokenEditar" value="{{ csrf_token() }}" id="tokenEditar">
                        <div class="mb-3">
                            <label for="nombreNuevo" required>Nombre</label>
                            <input type="text" class="form-control input-editar" id="nombreNuevo">
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <button data-dismiss="modal" class="btn btn-primary" id="actualizarTipoBebida">Guardar</button>
            </div>
        </div>
    </div>
</div>