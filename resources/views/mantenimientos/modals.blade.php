
<!-- Modal de eliminar -->
    @foreach ($mantenimientos as $mantenimiento)
        <div class="modal fade" id="confirmDeleteModal{{ $mantenimiento->id_mantenimiento }}" tabindex="-1"
            aria-labelledby="confirmDeleteModalLabel{{ $mantenimiento->id_mantenimiento }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark"
                            id="confirmDeleteModalLabel{{ $mantenimiento->id_mantenimiento }}">Eliminar mantenimiento</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-dark">
                        ¿Estás seguro de que deseas eliminar este mantenimiento?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancelar</button>
                        <!-- Form for deletion -->
                        <form action="{{ route('mantenimientos.destroy', $mantenimiento->id_mantenimiento) }}"
                            method="post" id="deleteForm{{ $mantenimiento->id_equipo }}" class="frmDelete">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach







    @foreach ($mantenimientos as $mantenimiento)
    <div class="modal fade" id="confirmSaveModal{{ $mantenimiento->id_mantenimiento }}" tabindex="-1"
        aria-labelledby="confirmSaveModalLabel{{ $mantenimiento->id_mantenimiento }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="confirmSaveModalLabel{{ $mantenimiento->id_mantenimiento }}">Guardar firma</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('mantenimientos.firma_usuario', $mantenimiento->id_mantenimiento) }}" method="POST" id="saveForm{{ $mantenimiento->id_mantenimiento }}" class="frmSave">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="codigo_empleado" class="form-label">Código de Empleado</label>
                            <input type="text" class="form-control" id="codigo_empleado" name="codigo_empleado" required>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Usuario</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <!-- Agrega aquí tus validaciones -->
                        <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
