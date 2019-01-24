<div class="modal fade" id="actualizarPresentacionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
    <div class="modal-dialog modal-notify modal-info" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="heading lead">Editar producto final</p>

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
                            <h6>Producto</h6>
                            <select class="browser-default custom-select" name="nuevoProductoP" id="nuevoProductoP">

                            </select>
                        </div>
                        <div class="mb-3">
                            <h6>Envase</h6>
                            <select class="browser-default custom-select" name="nuevoEnvase" id="nuevoEnvase">

                            </select>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <button data-dismiss="modal" class="btn btn-primary" id="actualizarPresentacion">Guardar</button>
            </div>
        </div>
    </div>
</div>