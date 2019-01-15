<div class="modal fade" id="eliminarMovimientoActivoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
    <div class="modal-content text-center">
      <div class="modal-header d-flex justify-content-center">
        <p class="heading">¿Seguro(a) que desea borrar este movimiento?</p>
      </div>
      <div class="modal-body">
        <i class="fa fa-times fa-4x animated rotateIn"></i>
        <form>
            <input type="hidden" name="_tokenEliminar" value="{{ csrf_token() }}" id="tokenEliminar">
      </div>
      <div class="modal-footer flex-center">
        <a class="btn  btn-outline-danger" id="borrarMovimientoActivo" data-dismiss="modal">Sí</a>
        <a class="btn  btn-danger waves-effect" data-dismiss="modal">No</a>
      </div>
    </div>
  </div>
</div>