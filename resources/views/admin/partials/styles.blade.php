<link rel="stylesheet" href="{{ asset('global/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/fontawesome/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/css/style.css') }}?v={{ $setting->version }}">
<link rel="stylesheet" href="{{ asset('backend/css/bootstrap-social.css') }}">
<link rel="stylesheet" href="{{ asset('backend/css/components.css') }}?v={{ $setting->version }}">
@if (session()->has('text_direction') && session()->get('text_direction') !== 'ltr')
    <link rel="stylesheet" href="{{ asset('backend/css/rtl.css') }}?v={{ $setting->version }}">
    <link rel="stylesheet" href="{{ asset('backend/css/dev_rtl.css') }}?v={{ $setting->version }}">
@endif
<link rel="stylesheet" href="{{ asset('global/toastr/toastr.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/css/bootstrap-toggle.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/css/dev.css') }}?v={{ $setting->version }}">
<link rel="stylesheet" href="{{ asset('backend/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/css/tagify.css') }}">
<link rel="stylesheet" href="{{ asset('backend/css/bootstrap-tagsinput.css') }}">
<link rel="stylesheet" href="{{ asset('backend/css/fontawesome-iconpicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('global/css/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/clockpicker/dist/bootstrap-clockpicker.css') }}">
<link rel="stylesheet" href="{{ asset('backend/datetimepicker/jquery.datetimepicker.css') }}">
<link rel="stylesheet" href="{{ asset('backend/css/iziToast.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/css/bootstrap-colorpicker.css') }}">
<link rel="stylesheet" href="{{ asset('website/css/nice-select.css') }}">

<script src="{{ asset('global/js/jquery-3.7.1.min.js') }}"></script>


<style>
    .select2-container .select2-selection--single .select2-selection__rendered {
        padding-left: 0px;
    }

    .select2-container .select2-selection--single {
        padding: 7px 15px !important;
    }

    .address-label {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .address-label input {
        margin-top: 0px;
    }

    .nav-link-user .rounded-circle {
        margin-right: 2px;
    }

    .pos_sidebar_button .create_new_user_button {
        width: 100%;
    }
</style>




@if (session()->has('text_direction') && session()->get('text_direction') !== 'ltr')
    <style>
        .main-sidebar .sidebar-menu li a.has-dropdown:after {
            content: "\f104" !important;
        }

        .main-sidebar .sidebar-menu li.active a.has-dropdown:after {
            transform: translate(0, -50%) rotate(270deg);
        }
    </style>


    <style>
        .me-2.btn-sm {
            margin-left: .5rem !important;
        }
    </style>
@endif
