<table id="tabla-cuentas" class="table table-bordered table-striped table-hover table-head-bg-primary" style="width:100%;" >
    <thead>
    <tr>
        <th>Razón Social</th>
        <th>Email</th>
        <th>Teléfono</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody></tbody>
</table>

@push('scripts')
    <script>
        jQuery(document).ready(function($){
            $('#tabla-cuentas').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route ('admin.cuentas.list') }}',
                    method: 'POST',
                },
                columns:[
                    { data: 'razon_social', sortable: true, searchable: true },
                    { data: 'email', sortable: false, searchable: true },
                    { data: 'telefono', sortable: false, searchable: true },
                    { data: 'actions', sortable: false, searchable: false }
                ],
                order: [1, 'asc']
            });
        });
    </script>
@endpush
