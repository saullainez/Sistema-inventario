<div class="modal fade" id="editarActivoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
    <div class="modal-dialog modal-notify modal-info" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="heading lead">Editar materia prima</p>

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
                        <div class="mb-3">
                            <label for="descripcionNueva" required>Descripcion</label>
                            <input type="text" class="form-control input-editar" id="descripcionNueva">
                        </div>
                        <div class="mb-3">
                            <h6>Tipo de materia prima</h6>
                            <select class="browser-default custom-select" name="nuevo" id="nuevo">
                                <option value="Consumible">Consumible</option>
                                <option value="Equipo">Equipo</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <button data-dismiss="modal" class="btn btn-primary" id="actualizarActivo">Guardar</button>
            </div>
        </div>
    </div>
</div>