<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="">Nombre</label>
            <input value="{{ $contacto->name ?? '' }}"
                   class="form-control"
                   type="text"
                   name="name"
                   placeholder="Nombres ..."
                   required>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="">Apellido</label>
            <input value="{{ $contacto->lastname ?? '' }}"
                   class="form-control"
                   type="text"
                   name="lastname"
                   placeholder="Apellidos ..."
                   required>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for=""><i class="icon-envelope"></i> Correo</label>
            <input value="{{ $contacto->email ?? '' }}"
                   class="form-control"
                   type="email"
                   name="email"
                   placeholder="Correo electrónico ..."
                   required>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for=""><i class="icon-phone"></i> Teléfono</label>
            <input value="{{ $contacto->phone ?? '' }}"
                   class="form-control"
                   type="text"
                   name="phone"
                   placeholder="Teléfono ..."
                   required>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
          <label for="">Observaciones</label>
          <textarea class="form-control" name="notes" id="" rows="3" required>{{ $contacto->notes ?? '' }}</textarea>
        </div>
    </div>
</div>
