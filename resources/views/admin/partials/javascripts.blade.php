<script src="{{ asset('global/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('backend/js/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('backend/js/moment.min.js') }}"></script>
<script src="{{ asset('backend/js/stisla.js') }}?v={{ $setting->version }}"></script>
<script src="{{ asset('backend/js/scripts.js') }}?v={{ $setting->version }}"></script>
<script src="{{ asset('backend/js/select2.min.js') }}"></script>
<script src="{{ asset('backend/js/tagify.js') }}"></script>
<script src="{{ asset('global/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('backend/js/bootstrap-toggle.jquery.min.js') }}"></script>
<script src="{{ asset('backend/js/fontawesome-iconpicker.min.js') }}"></script>
<script src="{{ asset('global/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('backend/clockpicker/dist/bootstrap-clockpicker.js') }}"></script>
<script src="{{ asset('backend/datetimepicker/jquery.datetimepicker.js') }}"></script>
<script src="{{ asset('backend/js/iziToast.min.js') }}"></script>
<script src="{{ asset('backend/js/modules-toastr.js') }}"></script>
<script src="{{ asset('backend/tinymce/js/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('website/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('backend/js/jquery.uploadPreview.min.js') }}"></script>
<script src="{{ asset('backend/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ asset('backend/js/resumable.min.js') }}"></script>
<script src="{{ asset('backend/js/custom.js') }}?v={{ $setting->version }}"></script>


<script>
    @session('message')
    var type = "{{ Session::get('alert-type', 'info') }}"
    switch (type) {
        case 'info':
            toastr.info("{{ $value }}");
            break;
        case 'success':
            toastr.success("{{ $value }}");
            break;
        case 'warning':
            toastr.warning("{{ $value }}");
            break;
        case 'error':
            toastr.error("{{ $value }}");
            break;
    }
    @endsession
</script>

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            toastr.error('{{ $error }}');
        </script>
    @endforeach
@endif

<script>
    $(document).ready(function() {
        'use strict'
        $('.select2').select2({
            placeholder: {
                id: '-1',
                text: 'Select an option'
            },
            searchInputPlaceholder: 'Search options',
        });
        $('.icp-auto').iconpicker();
    })


    function convertToSlug(Text) {
        return Text
            .toLowerCase()
            .replace(/[^\w ]+/g, '')
            .replace(/ +/g, '-');
    }

    // remove currency symbol
    function removeCurrency(value) {
        return value.replace(/[^0-9.]/g, '');
    }

    function setupImagePreview(input, previewId) {
        $.uploadPreview({
            input_field: `#${input}`,
            preview_box: `#${previewId}`,
            label_default: "{{ __('Image') }}",
            label_selected: "{{ __('Image') }}",
            no_label: false,
            success_callback: null
        });
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        }
    })
</script>







{{-- sidebar scroll to previous position --}}
<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        var sidebarScrollPos = localStorage.getItem('sidebarScrollPos');
        if (sidebarScrollPos) {
            document.querySelector('.main-sidebar').style.overflow = 'auto';
            document.querySelector('.main-sidebar').scrollTop = sidebarScrollPos;
        }
    });

    window.onbeforeunload = function(e) {
        var sidebar = document.querySelector('.main-sidebar');
        localStorage.setItem('sidebarScrollPos', sidebar.scrollTop);
    };
</script>

{{-- reset sidebar scroll position --}}
<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        var currentRoute = "{{ Route::currentRouteName() }}";
        if (currentRoute == 'admin.dashboard') {
            localStorage.setItem('sidebarScrollPos', 0);
            document.querySelector('.main-sidebar').scrollTop = 0;
        }
    });
</script>

<script>
    function handleFetchError(err) {
        if (err.status == 500) {
            toastr.error('Something went wrong!')
        } else {
            toastr.error(err.responseJSON.message)
        }
    }

    function prevImage(inputId, previewId, labelId) {
        $.uploadPreview({
            input_field: "#" + inputId,
            preview_box: "#" + previewId,
            label_field: "#" + labelId,
            label_default: "{{ __('Choose Image') }}",
            label_selected: "{{ __('Change Image') }}",
            no_label: false,
            success_callback: null
        });
    }
</script>
