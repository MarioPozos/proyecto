<div class="modal fade " id="nuevaUniversidadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Añadir una nueva universidad</h5>
        <button type="button" class="close btnCerrar" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="nuevaUniverdidad">
        <div class="modal-body">
          @csrf
          <div id="avisos"></div>
          <div class="form-group row">
          <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
          <div class="col-md-6">
            <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ old('nombre') }}" required autofocus>
              @if ($errors->has('nombre'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('nombre') }}</strong>
              </span>
              @endif
          </div>
          </div>
          <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
              <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
