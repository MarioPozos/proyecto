<div class="modal fade " id="editarUniversidadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EDITAR UNIVERSIDAD</h5>
        <button type="button" class="close btnCerrar" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="editarUniverdidadId">
        <div class="modal-body">
          @csrf
          <div id="avisosEditar"></div>
          <div class="form-group row">
          <label for="universidad" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
          <div class="col-md-6">
            <input id="universidad" type="text" class="form-control{{ $errors->has('universidad') ? ' is-invalid' : '' }}" name="universidad" value="{{ old('universidad') }}" required autofocus>
              @if ($errors->has('universidad'))
              <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('universidad') }}</strong>
              </span>
              @endif
          </div>
          </div>
          <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
            <input type="hidden" name="uni_id" id="uni_id" value=""/>
            <button type="submit" class="btn btn-primary">{{ __('Editar') }}</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
