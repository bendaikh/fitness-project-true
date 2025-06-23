<div class="wsus__blog_item">
    <a href="{{ route('website.blog-details', $blog->slug) }}" class="wsus__blog_img">
        <img src="{{ asset($blog->image) }}" alt="img" class="img-fluid w-100">
    </a>
    <div class="wsus__blog_text">
        <ul class="d-flex flex-wrap">
            <li><span><img src="{{ asset('website') }}/images/clock.png" alt="icon" class="img-fluid w-100"></span>
                {{ $blog->created_at->format('d F, Y') }}
            </li>
            <li><span><img src="{{ asset('website') }}/images/massage.png" alt="icon"
                        class="img-fluid w-100"></span>{{ $blog->comments->count() }}
                {{ __('Comment') }}</li>
        </ul>
        <a href="{{ route('website.blog-details', $blog->slug) }}" class="title">{{ $blog->title }}</a>
        <a href="{{ route('website.blog-details', $blog->slug) }}"
            class="common_btn white_btn common_btn_2">{{ __('Read More') }}<i class="far fa-long-arrow-right"></i></a>
    </div>
</div>

