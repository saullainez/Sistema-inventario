<div class="modal fade top show" id="agregarMovimientoProductoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
    <div class="modal-dialog modal-notify modal-info modal-dialog modal-full-height modal-top" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="heading lead">Agregar movimiento</p>

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
                                <div class="mb-3">
                                    <h6>Presentacion</h6>
                                    <select class="browser-default custom-select" name="presentacionId" id="presentacionId">

                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="descripcion" required>Descripcion</label>
                                    <input type="text" class="form-control" id="descripcion">
                                </div>
                                <div class="mb-3">
                                    <label for="fecha" required>Fecha</label>
                                    <input type="date" class="form-control" id="fecha">
                                </div>
                                <div class="mb-3">
                                    <label for="anioCosecha" required>Año de cosecha</label>
                                    <input type="number" class="form-control" id="anioCosecha">
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-sm-12 col-xs-12 col-lg-6 col-xl-6">
                                <div class="mb-3">
                                    <label for="cantidad" required>Cantidad</label>
                                    <input type="number" class="form-control" id="cantidad">
                                </div>
                                <div class="mb-3">
                                    <label for="monto" required>Monto</label>
                                    <input type="number" class="form-control" id="monto">
                                </div>
                                <div class="mb-3">
                                    <h6>Cliente</h6>
                                    <select class="browser-default custom-select" name="cliente" id="cliente">

                                    </select>
                                </div>
                                <div class="mb-3">
                                    <h6>Concepto</h6>
                                    <select class="browser-default custom-select" name="movimientoConceptoId" id="movimientoConceptoId">

                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <button data-dismiss="modal" class="btn btn-primary" onclick="crearMovimientoProducto()">Guardar</button>
            </div>
        </div>
    </div>
</div>