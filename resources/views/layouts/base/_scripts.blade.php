<!--   Core JS Files   -->
<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/moment/moment-with-locales.js') }}"></script>

{{-- El notify lo uso siempre para avisarles que se le vencio la sesion con one drive--}}
<script src="{{ asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

@isset($components)

    @if(in_array('chartjs', $components))
        <script src="{{ asset('assets/js/plugin/chart.js/chart.min.js') }}"></script>
    @endif

    @if(in_array('sparkline', $components))
        <script src="{{ asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>
    @endif

    @if(in_array('chart_circles', $components))
        <script src="{{ asset('assets/js/plugin/chart-circle/circles.min.js') }}"></script>
    @endif

    @if(in_array('datatables', $components))
        <script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugin/datatables/datatables.defaults.js') }}"></script>
        <script src="{{ asset('assets/js/plugin/datatables/datatables.responsive.min.js') }}"></script>
    @endif

    @if(in_array('bootstrap_notify', $components))
        <script src="{{ asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
    @endif

    @if(in_array('bootstrap_toggle', $components))
        <script src="{{ asset('assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script>
    @endif

    @if(in_array('vmap', $components))
        <script src="{{ asset('assets/js/plugin/jqvmap/jquery.vmap.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugin/jqvmap/maps/jquery.vmap.world.js') }}"></script>
    @endif

    @if(in_array('gmap', $components))
        <script src="{{ asset('assets/js/plugin/gmaps/gmaps.js') }}"></script>
    @endif

    @if(in_array('dropzone', $components))
        <script src="{{ asset('assets/js/plugin/dropzone/dropzone.min.js') }}"></script>
        <script>
            Dropzone.prototype.defaultOptions.dictDefaultMessage = "Arrastre los archivos o presione click aquí.";
            Dropzone.prototype.defaultOptions.dictFallbackMessage = "Su navegador no es compatible.";
            Dropzone.prototype.defaultOptions.dictFallbackText = "Please use the fallback form below to upload your files like in the olden days.";
            Dropzone.prototype.defaultOptions.dictFileTooBig = 'El archivo es demasiado grande ({' + '{filesize}}MiB). Máximo permitido: {' + '{maxFilesize}}MiB.';
            Dropzone.prototype.defaultOptions.dictInvalidFileType = "No es posible subir este tipo de archivo.";
            Dropzone.prototype.defaultOptions.dictResponseError = "Hubo un error en el servidor. {' + '{statusCode}} code.";
            Dropzone.prototype.defaultOptions.dictCancelUpload = "Cancelar subida";
            Dropzone.prototype.defaultOptions.dictCancelUploadConfirmation = "¿Está seguro que quiere cancelar este archivo?";
            Dropzone.prototype.defaultOptions.dictRemoveFile = "Descartar archivo";
            Dropzone.prototype.defaultOptions.dictMaxFilesExceeded = "No es posible subir tantos archivos a la vez.";
        </script>
    @endif

    @if(in_array('dropify', $components))
        <script src="{{ asset('assets/js/plugin/dropify/dist/js/dropify.js') }}"></script>
    @endif

    @if(in_array('full_calendar', $components))
        <script src="{{ asset('assets/js/plugin/fullcalendar/fullcalendar.min.js') }}"></script>
    @endif

    @if(in_array('datetimepicker', $components))
        <script src="{{ asset('assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugin/datepicker/bootstrap-datetimepicker.defaults.js') }}"></script>
    @endif

    @if(in_array('tagsinput', $components))
        <script src="{{ asset('assets/js/plugin/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>
    @endif

    @if(in_array('bootstrap_wizard', $components))
        <script src="{{ asset('assets/js/plugin/bootstrap-wizard/bootstrapwizard.js') }}"></script>
    @endif

    @if(in_array('jquery_validate', $components))
        <script src="{{ asset('assets/js/plugin/jquery.validate/jquery.validate.min.js') }}"></script>
    @endif

    @if(in_array('summernote', $components))
        <script src="{{ asset('assets/js/plugin/summernote/summernote-bs4.min.js') }}"></script>
    @endif

    @if(in_array('select2', $components))
        <script src="{{ asset('assets/js/plugin/select2/select2.full.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugin/select2/select2.defaults.js') }}"></script>
        <script src="{{ asset('assets/js/plugin/select2/lang/es.js') }}"></script>
    @endif

    @if(in_array('owl_carousel', $components))
        <script src="{{ asset('assets/js/plugin/owl-carousel/owl.carousel.min.js') }}"></script>
    @endif

    @if(in_array('magnific_popup', $components))
        <script src="{{ asset('assets/js/plugin/jquery.magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    @endif

    @if(in_array('sweetalert', $components))
        <script src="{{ asset('assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>
    @endif

    @if(in_array('fileupload', $components))
        <!-- The basic File Upload plugin -->
        <script src="{{ asset('assets/js/fileupload/jquery.fileupload.js') }}"></script>
        <!-- The File Upload processing plugin -->
        <script src="{{ asset('assets/js/fileupload/jquery.fileupload-process.js') }}"></script>
        <!-- The File Upload image preview & resize plugin -->
        <script src="{{ asset('assets/js/fileupload/jquery.fileupload-image.js') }}"></script>
        <!-- The File Upload validation plugin -->
        <script src="{{ asset('assets/js/fileupload/jquery.fileupload-validate.js') }}"></script>
        <!-- The File Upload user interface plugin -->
        <script src="{{ asset('assets/js/fileupload/jquery.fileupload-ui.js') }}"></script>

    @endif

@endisset

<script src="{{ asset('assets/js/atlantis.min.js') }}"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    jQuery(document).ready(function($) {
        $('a[data-toggle="pill"]').on('shown.bs.tab', function (event) {
            localStorage.setItem('ultimoTab', $(this).attr('href'));
        });

        var ultimoTab = localStorage.getItem('ultimoTab');

        if (ultimoTab) {
            $('[href="' + ultimoTab + '"]').tab('show');
        }
    });
</script>
