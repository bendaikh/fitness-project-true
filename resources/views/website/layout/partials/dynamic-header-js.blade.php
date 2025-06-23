@if ($setting->google_analytic_status == 'active')
    <!-- Start Google Tag Manager -->
    <script>
        window.dataLayer = window.dataLayer || [];
    </script>
    <!-- End Google Tag Manager -->

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', '{{ $setting->google_analytic_id }}');
    </script>
    <!-- End Google Tag Manager -->
@endif
@if (customCode()?->header_javascript)
    <script>
        "use strict";
        {!! customCode()->header_javascript !!}
    </script>
@endif
