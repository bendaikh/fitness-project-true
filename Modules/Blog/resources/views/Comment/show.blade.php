@extends('admin.master_layout')
@section('title')
    <title>{{ __('Post Comments') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Post Comments') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item active"><a
                            href="{{ route('admin.blog-comment.index') }}">{{ __('Post Comments') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __('All Comments') }}</div>
                </div>
            </div>
            <div class="section-body">
                <div class="mt-4 row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>{{ __('Post Comments') }}</h4>
                                <div>
                                    <a href="{{ route('admin.blog-comment.index') }}" class="btn btn-primary"><i
                                            class="fa fa-arrow-left"></i> {{ __('Back') }}</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card-body">
                                    <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
                                        @foreach ($comments as $comment)
                                            <li class="media">
                                                <div class="media-body">
                                                    <div class="media-right">
                                                        @if ($comment->status == 1)
                                                            <div class="text-primary">{{ __('Approved') }}</div>
                                                        @else
                                                            <div class="text-warning">{{ __('Pending') }}</div>
                                                        @endif
                                                    </div>
                                                    <div class="mb-1 media-title">{{ $comment->name }}</div>
                                                    <div class="text-time">{{ $comment?->created_at?->diffForHumans() }}
                                                    </div>
                                                    <div class="media-description text-muted">
                                                        {!! $comment->comment !!}
                                                    </div>
                                                    <div class="media-links">
                                                        <a href="javascript:;" title="Reply" data-id="{{ $comment->id }}"
                                                            data-bs-toggle="modal" data-bs-target="#post-reply"
                                                            class="post-reply"><i class="fas fa-reply"></i></a>
                                                        <div class="bullet"></div>
                                                        <a href="javascript:;" data-bs-toggle="modal"
                                                            data-bs-target="#deleteModal"
                                                            onclick="deleteData({{ $comment->id }})"
                                                            class="text-danger">{{ __('Trash') }}</a>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="float-right">
                                    {{ $comments->onEachSide(3)->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- post-reply modal --}}

    <div class="modal fade" tabindex="-1" role="dialog" id="post-reply">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.blog-comment.reply') }}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Reply to Comment') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="comment_id" id="comment_id">
                        <div class="form-group">
                            <label for="reply">{{ __('Reply') }}</label>
                            <textarea name="reply" id="reply" class="form-control height_50" rows="5" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Reply') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        "use strict";

        function deleteData(id) {
            $("#deleteForm").attr("action", '{{ url('/admin/blog-comment/') }}' + "/" + id)
        }

        $(document).ready(function() {
            $('.post-reply').on('click', function() {
                var id = $(this).data('id');
                $('#comment_id').val(id);
            });
        });
    </script>
@endpush
