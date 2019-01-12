<div class="modal fade top show" id="editarEmpresaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
    <div class="modal-dialog modal-notify modal-info modal-dialog modal-full-height modal-top" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="heading lead">Editar empresa</p>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <i class="fa fa-edit fa-4x mb-3 animated rotateIn"></i>
                    <form>
                        <div class="row">
                            <div class="col-12 col-md-12 col-sm-12 col-xs-12 col-lg-6 col-xl-6">
                                <input type="hidden" name="_tokenEditar" value="{{ csrf_token() }}" id="tokenEditar">
                                <h4>Datos de la empresa</h4>
                                <hr>
                                <div class="mb-3">
                                    <label for="nuevoNombre" required>Nombre</label>
                                    <input type="text" class="form-control" id="nuevoNombre">
                                </div>
                                <div class="mb-3">
                                    <label for="nuevaDireccion" required>Dirección</label>
                                    <input type="text" class="form-control" id="nuevaDireccion">
                                </div>
                                <div class="mb-3">
                                    <label for="nuevoTelefono" required>Teléfono</label>
                                    <input type="text" class="form-control" id="nuevoTelefono">
                                </div>
                                <div class="mb-3">
                                    <label for="nuevoCorreo" required>Correo</label>
                                    <input type="text" class="form-control" id="nuevoCorreo">
                                </div>
                                <div class="mb-3">
                                    <label for="nuevaFechaPago" required>Fecha de pago</label>
                                    <input type="text" class="form-control" id="nuevaFechaPago">
                                </div>
                                <div class="mb-3">
                                    <h6>Tipo de empresa</h6>
                                    <select class="browser-default custom-select" name="nuevoTipo" id="nuevoTipo">
                                        <option value="Cliente">Cliente</option>
                                        <option value="Proveedor">Proveedor</option>
                                        <option value="Cliente-Proveedor">Cliente-Proveedor</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-sm-12 col-xs-12 col-lg-6 col-xl-6">
                                <h4>Datos del contacto</h4>
                                <hr>
                                <div class="mb-3">
                                    <label for="nuevoNombreContacto" required>Nombre del contacto</label>
                                    <input type="text" class="form-control" id="nuevoNombreContacto">
                                </div>
                                <div class="mb-3">
                                    <label for="nuevoTelefonoContacto" required>Teléfono del contacto</label>
                                    <input type="text" class="form-control" id="nuevoTelefonoContacto">
                                </div>
                                <div class="mb-3">
                                    <label for="nuevoCorreoContacto" required>Correo del contacto</label>
                                    <input type="text" class="form-control" id="nuevoCorreoContacto">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <button data-dismiss="modal" class="btn btn-primary" id="actualizarEmpresa">Guardar</button>
            </div>
        </div>
    </div>
</div>