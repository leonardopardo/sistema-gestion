<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

<link rel="stylesheet" href="{{ asset('assets/css/atlantis.min.css') }}">

<link rel="stylesheet" href="{{ asset('assets/css/glyphicon.css') }}">

@isset($components)
    @if(in_array('datetimepicker', $components))
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.css') }}">
    @endif

    @if(in_array('fileupload', $components))
        <link rel="stylesheet" href="{{ asset('assets/css/fileupload/jquery.fileupload.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/fileupload/jquery.fileupload-ui.css') }}">
    @endif

@endisset

{{-- Custom CSS --}}
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
{{--<link rel="stylesheet" href="{{ asset('assets/css/ate.css') }}">--}}


