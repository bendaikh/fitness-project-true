    <!--jquery library js-->
    <script src="{{ asset('global/js/jquery-3.7.1.min.js') }}"></script>
    <!--bootstrap js-->
    <script src="{{ asset('global/js/bootstrap.bundle.min.js') }}"></script>
    <!--font-awesome js-->
    <script src="{{ asset('website/js/Font-Awesome.js') }}"></script>
    <script src="{{ asset('website/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('website/js/slick.min.js') }}"></script>
    <script src="{{ asset('website/js/venobox.min.js') }}"></script>
    <script src="{{ asset('website/js/wow.min.js') }}"></script>
    <script src="{{ asset('website/js/scroll_button.js') }}"></script>
    <script src="{{ asset('website/js/animated_barfiller.js') }}"></script>
    <script src="{{ asset('website/js/jquery.countup.min.js') }}"></script>
    <script src="{{ asset('website/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('website/js/range_slider.js') }}"></script>
    <script src="{{ asset('website/js/sticky_sidebar.js') }}"></script>
    <script src="{{ asset('website/js/select2.min.js') }}"></script>
    <script src="{{ asset('global/js/bootstrap-datepicker.min.js') }}"></script>
    <!--main/custom js-->
    <script src="{{ asset('website/js/main.js') }}?v={{ $setting->version }}"></script>


    <script src="{{ asset('global/toastr/toastr.min.js') }}"></script>

    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        @endif
    </script>



    <script>
        var base_url = "{{ url('/') }}";
        (function($) {
            "use strict";
            $(document).ready(function() {
                $("#select_js3").on('change', function(e) {
                    $('#setLanguage').submit();
                });
                $('[name="currency"]').on('change', function(e) {
                    $('#setCurrency').submit();
                });
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                });
                $('.datepicker').datepicker();
            })


        })(jQuery);

        // remove currency symbol
        function removeCurrency(value) {
            return value.replace(/[^0-9.]/g, '');
        }
    </script>


    {{-- remove from cart --}}

    <script>
        "use strict";
        $(document).ready(function() {
            @if (isShopActive())
                $(document).on("click", ".remove-from-cart", function() {

                    // add loader to this button and remove the class name
                    $(this).html('<i class="fas fa-spinner fa-spin"></i>');
                    $(this).removeClass('remove-from-cart');

                    // get the row id
                    let rowid = $(this).data('id');
                    let parernt_li = $(this).parent('li');

                    $.ajax({
                        type: 'get',
                        url: `{{ route('website.remove.from.cart', '') }}/${rowid}`,
                        success: function(response) {
                            toastr.success(response.message);
                            $(".wsus__droap_cart_list").html(response.view);
                            $(".cart_total").html(response.subtotal);
                            $(".cart_count").html(response.cartCount);

                            // hide checkout_btn
                            const checkout_btn = $('.checkout_btn')
                            if (checkout_btn && response.cartCount == 0) {
                                checkout_btn.addClass('invisible');
                            }
                            parernt_li.remove();

                            if (response.subtotal == '{{ currency() }}') {
                                const navCart = `@include('components.website.cart.no-item-cart')`;
                                $(navCart).insertAfter('.wsus__droap_cart > h5')
                                $('.wsus__droap_cart_list').html('')
                                $('.wsus__droap_total_price').html('')
                            }
                        },
                        error: function(response) {
                            if (response.status == 500) {
                                toastr.error("{{ __('Server error occurred') }}")
                            }

                            if (response.status == 403) {
                                toastr.error("{{ __('Server error occurred') }}")
                            }
                        }
                    });
                });
            @endif
        })
    </script>


    <script>
        (function($) {
            "use strict";
            $(document).ready(function() {
                $('[name="code"]').on('change', function(e) {
                    $('#setLanguage').submit();
                });

                // for removing target-densitydpi warning
                var viewPortScale = 1 / window.devicePixelRatio;

                $('#viewport').attr('content', 'user-scalable=no, initial-scale=' + viewPortScale +
                    ', width=device-width');
            })
        })(jQuery);
    </script>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                toastr.error('{{ $error }}');
            </script>
        @endforeach
    @endif


    <!-- Google reCAPTCHA -->
    @if (Cache::get('setting')->recaptcha_status === 'active')
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    @endif


    @if ($setting->tawk_status == 'active')
        <script type="text/javascript">
            var Tawk_API = Tawk_API || {},
                Tawk_LoadStart = new Date();
            (function() {
                var s1 = document.createElement("script"),
                    s0 = document.getElementsByTagName("script")[0];
                s1.async = true;
                s1.src = "{{ $setting->tawk_chat_link }}";
                s1.charset = 'UTF-8';
                s1.setAttribute('crossorigin', '*');
                s0.parentNode.insertBefore(s1, s0);
            })();
        </script>


        <style>
            .progress-wrap {
                right: 35px !important;
                bottom: 100px !important;
            }
        </style>
    @endif

    <!-- Cookie Consent -->
    @if ($setting->cookie_status == 'active')
        <script src="{{ asset('website/js/cookieconsent.min.js') }}"></script>

        <script>
            "use strict";
            window.addEventListener("load", function() {
                window.wpcc.init({
                    "border": "{{ $setting->border }}",
                    "corners": "{{ $setting->corners }}",
                    "colors": {
                        "popup": {
                            "background": "{{ $setting->background_color }}",
                            "text": "{{ $setting->text_color }} !important",
                            "border": "{{ $setting->border_color }}"
                        },
                        "button": {
                            "background": "{{ $setting->btn_bg_color }}",
                            "text": "{{ $setting->btn_text_color }}"
                        }
                    },
                    "content": {
                        "href": "{{ url($setting->link) }}",
                        "message": "{{ $setting->message }}",
                        "link": "{{ $setting->link_text }}",
                        "button": "{{ $setting->btn_text }}"
                    }
                })
            });
        </script>
    @endif

    <script>
        $(document).on("click", '.wpcc-btn', function() {
            $('.wpcc-container').fadeOut(1000);
        })
    </script>
    @stack('scripts')
    @if (customCode()?->javascript)
        <script>
            "use strict";
            {!! customCode()->javascript !!}
        </script>
    @endif
