<div class="modal fade" id="editarRolModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
    <div class="modal-dialog modal-notify modal-info" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="heading lead">Editar rol</p>

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
                            <label for="nuevoNombre" required>Nombre</label>
                            <input type="text" class="form-control" id="nuevoNombre">
                        </div>
                        <div class="mb-3">
                            <label for="nuevoSlug" required>Slug</label>
                            <input type="text" class="form-control" id="nuevoSlug">
                        </div>
                        <div class="mb-3">
                            <label for="nuevaDescripcion" required>Descripcion</label>
                            <textarea class="form-control" id="nuevaDescripcion"></textarea>
                        </div>
                        <div class="mb-3">
                            <h6>Permiso especial</h6>
                            <select class="browser-default custom-select" name="nuevoEspecial" id="nuevoEspecial">
                                <option value=" ">Ninguno</option>
                                <option value="all-access">Acceso total</option>
                                <option value="no-access">Ningún acceso</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <button data-dismiss="modal" class="btn btn-primary" id="actualizarRol">Guardar</button>
            </div>
        </div>
    </div>
</div>