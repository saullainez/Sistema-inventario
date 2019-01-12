<div class="modal fade" id="agregarPresentacionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
    <div class="modal-dialog modal-notify modal-info" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="heading lead">Agregar presentacion</p>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <i class="fa fa-plus-circle fa-4x mb-3 animated rotateIn"></i>
                    <form>
                        <input type="hidden" name="_tokenAgregar" value="{{ csrf_token() }}" id="tokenAgregar">
                        <div class="mb-3">
                            <h6>Producto</h6>
                            <select class="browser-default custom-select" name="productoP" id="productoP">

                            </select>
                        </div>
                        <div class="mb-3">
                            <h6>Envase</h6>
                            <select class="browser-default custom-select" name="envase" id="envase">

                            </select>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <button data-dismiss="modal" class="btn btn-primary" onclick="crearPresentacion()">Guardar</button>
            </div>
        </div>
    </div>
</div>