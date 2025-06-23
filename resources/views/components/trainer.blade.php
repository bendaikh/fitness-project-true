<div class="wsus__single_trainer">
    <img src="{{ asset($trainer->image_url) }}" alt="Trainer" class="img-fluid w-100">
    <div class="text">
        <a href="{{ route('website.trainer.details', $trainer->slug) }}" class="title">{{ $trainer?->user?->name }}</a>
        <p>{{ $trainer->specialty?->name }}</p>
    </div>
    <ul>
        @if ($trainer->facebook_icon)
            <li><a href="{{ $trainer->facebook_link }}">
                    <i class="{{ $trainer->facebook_icon }}"></i>
                </a></li>
        @endif
        @if ($trainer->twitter_icon)
            <li><a href="{{ $trainer->twitter_link }}">
                    <i class="{{ $trainer->twitter_icon }}"></i>
                </a></li>
        @endif
        @if ($trainer->instagram_icon)
            <li><a href="{{ $trainer->instagram_link }}">
                    <i class="{{ $trainer->instagram_icon }}"></i>
                </a></li>
        @endif
    </ul>
</div>
