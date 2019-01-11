<div class="modal fade" id="contactoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
    <div class="modal-dialog modal-notify modal-info" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="heading lead">Información de Contacto</p>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <i class="fas fa-info fa-4x mb-3 animated rotateIn"></i>
                    <form>
                        <input type="hidden" name="_tokenContacto" value="{{ csrf_token() }}" id="tokenContacto">
                        <div class="mb-3">
                            <label for="contacto" required>Contacto</label>
                            <input type="text" class="form-control" id="contacto">
                        </div>
                        <div class="mb-3">
                            <label for="telefono" required>Telefono</label>
                            <input type="text" class="form-control" id="telefono">
                        </div>
                        <div class="mb-3">
                            <label for="correo" required>Correo</label>
                            <input type="text" class="form-control" id="correo">
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <button data-dismiss="modal" class="btn btn-primary" id="editarContacto">Editar</button>
            </div>
        </div>
    </div>
</div>