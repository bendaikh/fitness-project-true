@foreach ($replies as $reply)
    <div class="wsus__blog_single_comment wsus__blog_comment_reply wow fadeInUp">
        <div class="img">
            <img src="{{ asset($setting->default_avatar) }}" alt="comment" class="img-fluid w-100">
        </div>
        <div class="text">
            <h5>{{ $reply->name }}</h5>
            <span class="date">{{ $comment->created_at->format('M d, Y') }} {{__('at')}} {{ $comment->created_at->format('i:h') }}</span>
            <p>{{ $reply->comment }}
            </p>
            <a href="#blogCommentForm" data-id="{{ $reply->id }}" class="reply">
                <span><img src="{{ asset('website') }}/images/reply.png" alt="reply" class="img-fluid w-100"></span>
                {{__('Reply')}}</a>
        </div>
        @if ($reply->children->count() > 0)
            @include('components.comment-reply', ['replies' => $reply->children])
        @endif
    </div>
@endforeach
