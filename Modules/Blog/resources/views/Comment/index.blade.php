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
                    <div class="breadcrumb-item">{{ __('Post Comments') }}</div>
                </div>
            </div>
            <div class="section-body">
                <div class="mt-4 row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>{{ __('Post Comments') }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive max-h-400">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th width="5%">{{ __('SN') }}</th>
                                                <th width="30%">{{ __('Comment') }}</th>
                                                <th width="30%">{{ __('Parent Comment') }}</th>
                                                <th width="15%">{{ __('Post') }}</th>
                                                <th width="10%">{{ __('Author') }}</th>
                                                <th width="10%">{{ __('Email') }}</th>
                                                <th width="15%">{{ __('Status') }}</th>
                                                <th width="15%">{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($comments as $comment)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>
                                                        {{ $comment->comment }}
                                                    </td>
                                                    <td>
                                                        {{ $comment?->parent?->comment }}
                                                    </td>
                                                    <td>{{ $comment?->post?->title }}</td>

                                                    <td>
                                                        {{ $comment->name }}
                                                    </td>
                                                    <td>
                                                        {{ $comment->email }}
                                                    </td>

                                                    <td>
                                                        @if ($comment->status == 1)
                                                            <a href="javascript:;"
                                                                onclick="changeStatus({{ $comment->id }})">
                                                                <input id="status_toggle" type="checkbox" checked
                                                                    data-toggle="toggle" data-on="{{ __('Active') }}"
                                                                    data-off="{{ __('Inactive') }}" data-onstyle="success"
                                                                    data-offstyle="danger">
                                                            </a>
                                                        @else
                                                            <a href="javascript:;"
                                                                onclick="changeStatus({{ $comment->id }})">
                                                                <input id="status_toggle" type="checkbox"
                                                                    data-toggle="toggle" data-on="{{ __('Active') }}"
                                                                    data-off="{{ __('Inactive') }}" data-onstyle="success"
                                                                    data-offstyle="danger">
                                                            </a>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="{{ route('admin.blog-comment.show', $comment?->post?->id) }}"
                                                                class="btn btn-success btn-sm me-2"><i class="fa fa-eye"
                                                                    aria-hidden="true"></i></a>

                                                            <a href="javascript:;" data-bs-toggle="modal"
                                                                data-bs-target="#deleteModal"
                                                                class="btn btn-danger btn-sm me-2"
                                                                onclick="deleteData({{ $comment->id }})"><i
                                                                    class="fa fa-trash" aria-hidden="true"></i></a>
                                                            <a href="javascript:;" title="Reply"
                                                                data-id="{{ $comment->id }}" data-bs-toggle="modal"
                                                                data-bs-target="#post-reply"
                                                                class="post-reply btn btn-info btn-sm"><i
                                                                    class="fas fa-reply"></i></a>
                                                        </div>
                                                </tr>
                                            @empty
                                                <x-empty-table :name="__('Post Comments')" route="admin.blog-comment.index"
                                                    create="no" :message="__('No data found!')" colspan="8"></x-empty-table>
                                            @endforelse
                                        </tbody>
                                    </table>
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
        'use strict';
        $(document).ready(function() {
            $('.post-reply').on('click', function() {
                var id = $(this).data('id');
                $('#comment_id').val(id);
            });
        });

        function deleteData(id) {
            $("#deleteForm").attr("action", '{{ url('/admin/blog-comment/') }}' + "/" + id)
        }

        function changeStatus(id) {
            $.ajax({
                type: "put",
                data: {
                    _token: '{{ csrf_token() }}',
                },
                url: "{{ url('/admin/blog-comment/status-update') }}" + "/" + id,
                success: function(response) {
                    if (response.success) {
                        toastr.success(response.message);
                    } else {
                        toastr.warning(response.message);
                    }
                },
                error: function(err) {
                    handleFetchError(err);

                }
            });
        }
    </script>
@endpush

@push('css')
    <style>
        .dd-custom-css {
            position: absolute;
            will-change: transform;
            top: 0px;
            left: 0px;
            transform: translate3d(0px, -131px, 0px);
        }

        .max-h-400 {
            min-height: 400px;
        }
    </style>
@endpush
