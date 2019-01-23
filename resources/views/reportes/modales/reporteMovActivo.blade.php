<div class="modal fade" id="agregarPresentacionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
    <div class="modal-dialog modal-notify modal-info" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="heading lead">Movimientos de activo</p>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
           <form method="GET" action="">
                <div class="modal-body">
                    <div class="text-center">
                        <i class="fa fa-plus-circle fa-4x mb-3 animated rotateIn"></i>
                        <form>
                            <input type="hidden" name="_tokenAgregar" value="{{ csrf_token() }}" id="tokenAgregar">
                            <div class="mb-3">
                                <label for="fechaInicio" required>Fecha Inicio</label>
                                <input type="date" class="form-control" id="fechaInicio">
                            </div>
                            <div class="mb-3">
                                <label for="fechaFin" required>Fecha Fin</label>
                                <input type="date" class="form-control" id="fechaFin">
                            </div>
                            <div class="mb-3">
                                <label for="impuesto" required>Impuesto</label>
                                <input type="text" class="form-control" id="impuesto">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button data-dismiss="modal" class="btn btn-primary" type="submit">mostrar</button>
                </div>
            </form>
           
        </div>
    </div>
</div>