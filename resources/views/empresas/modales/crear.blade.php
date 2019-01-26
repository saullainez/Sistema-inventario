<div class="modal fade top show" id="agregarEmpresaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
    <div class="modal-dialog modal-notify modal-info modal-dialog modal-full-height modal-top" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="heading lead">Agregar empresa</p>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <i class="fa fa-plus-circle fa-4x mb-3 animated rotateIn"></i>
                    <form>
                        <div class="row">
                            <div class="col-12 col-md-12 col-sm-12 col-xs-12 col-lg-6 col-xl-6">
                                <input type="hidden" name="_tokenAgregar" value="{{ csrf_token() }}" id="tokenAgregar">
                                <h4>Datos de la empresa</h4>
                                <hr>
                                <div class="mb-3">
                                    <label for="nombre" required>Nombre</label>
                                    <input type="text" class="form-control input-crear" id="nombre">
                                </div>
                                <div class="mb-3">
                                    <label for="direccion" required>Dirección</label>
                                    <input type="text" class="form-control input-crear" id="direccion">
                                </div>
                                <div class="mb-3">
                                    <label for="telefono" required>Teléfono</label>
                                    <input type="text" class="form-control input-crear" id="telefono">
                                </div>
                                <div class="mb-3">
                                    <label for="correo" required>Correo</label>
                                    <input type="text" class="form-control input-crear" id="correo">
                                </div>
                                <div class="mb-3">
                                    <label for="fechapago" required>Fecha de pago</label>
                                    <input type="text" class="form-control input-crear" id="fechapago">
                                </div>
                                <div class="mb-3">
                                    <h6>Tipo de empresa</h6>
                                    <select class="browser-default custom-select" name="tipo" id="tipo">
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
                                    <label for="nombreContacto" required>Nombre del contacto</label>
                                    <input type="text" class="form-control input-crear" id="nombreContacto">
                                </div>
                                <div class="mb-3">
                                    <label for="telefonoContacto" required>Teléfono del contacto</label>
                                    <input type="text" class="form-control input-crear" id="telefonoContacto">
                                </div>
                                <div class="mb-3">
                                    <label for="correoContacto" required>Correo del contacto</label>
                                    <input type="text" class="form-control input-crear" id="correoContacto">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <button disabled id="btn-crear" data-dismiss="modal" class="btn btn-primary" onclick="crearEmpresa()">Guardar</button>
            </div>
        </div>
    </div>
</div>