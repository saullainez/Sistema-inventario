<div class="modal fade" id="agregarProductoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
    <div class="modal-dialog modal-notify modal-info" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="heading lead">Agregar producto</p>

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
                            <label for="nombre" required>Nombre</label>
                            <input type="text" class="form-control" id="nombre">
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" required>Descripcion</label>
                            <input type="text" class="form-control" id="descripcion">
                        </div>
                        <div class="mb-3">
                            <h6>Tipo de bebida</h6>
                            <select class="browser-default custom-select" name="tipo" id="tipo">
                                <option value="consumible">Consumible</option>
                                <option value="equipo">Equipo</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <button data-dismiss="modal" class="btn btn-primary" onclick="crearProducto()">Guardar</button>
            </div>
        </div>
    </div>
</div>