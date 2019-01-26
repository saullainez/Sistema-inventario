<div class="modal fade top show" id="actualizarMovimientoActivoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
    <div class="modal-dialog modal-notify modal-info modal-dialog modal-full-height modal-top" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="heading lead">Editar movimiento</p>

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
                                <div class="mb-3">
                                    <h6>Materia prima</h6>
                                    <select class="browser-default custom-select" name="NuevoActivoId" id="NuevoActivoId">

                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="NuevaDescripcion" required>Descripcion</label>
                                    <input type="text" class="form-control input-editar" id="NuevaDescripcion">
                                </div>
                                <div class="mb-3">
                                    <label for="NuevaFecha" required>Fecha</label>
                                    <input type="date" class="form-control input-editar" id="NuevaFecha">
                                </div>
                                <div class="mb-3">
                                    <label for="NuevaCantidad" required>Cantidad</label>
                                    <input type="number" class="form-control input-editar" id="NuevaCantidad">
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-sm-12 col-xs-12 col-lg-6 col-xl-6">
                            <div class="mb-3">
                                    <label for="NuevoMonto" required>Monto</label>
                                    <input type="number" class="form-control input-editar" id="NuevoMonto">
                                </div>
                                <div class="mb-3">
                                    <h6>Proveedor</h6>
                                    <select class="browser-default custom-select" name="NuevoProveedor" id="NuevoProveedor">
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <h6>Concepto</h6>
                                    <select class="browser-default custom-select" name="NuevoConcepto" id="NuevoConcepto">

                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <button data-dismiss="modal" class="btn btn-primary" id="actualizarMovimientoActivo">Guardar</button>
            </div>
        </div>
    </div>
</div>