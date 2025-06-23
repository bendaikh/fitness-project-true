<section class="wsus__breadcrumb wow fadeInUp" style="background:url({{ asset($setting->breadcrumb_image) }})">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="wsus___breadcrumb_text">
                    <h1>{{ $title }}</h1>
                    <ul>
                        <li>
                            <a href="{{ route('website.home') }}"><i
                                    class="fas fa-home-lg-alt"></i>{{ __('Home') }}</a>
                        </li>
                        <li>{{ $title }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
