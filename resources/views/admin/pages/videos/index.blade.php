@extends('admin.master_layout')
@section('title')
    <title>{{ __('Video Gallery List') }}</title>
@endsection
@section('admin-content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Video Gallery List') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __('Video Gallery List') }}</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row mt-4">
                    <div class="col">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <x-admin.form-title :text="__('Video Gallery List')" />
                                @adminCan('gallery.video.create')
                                    <div>
                                        <x-admin.add-button :href="route('admin.galleryVideo.create')" text="{{ __('Add Video Gallery') }}" />
                                    </div>
                                @endadminCan
                            </div>
                            <div class="card-body">
                                <div class="table-responsive table-invoice">
                                    <table class="table" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>{{ __('SN') }}</th>
                                                <th>{{ __('Group Name') }}</th>
                                                <th>{{ __('Status') }}</th>
                                                <th>{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($videoGalleries as $video)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $video?->group?->name }}</td>
                                                    <td>
                                                        <input onchange="changeStatus({{ $video->id }})"
                                                            id="status_toggle" type="checkbox"
                                                            {{ $video->status ? 'checked' : '' }} data-toggle="toggle"
                                                            data-on="{{ __('Active') }}" data-off="{{ __('Inactive') }}"
                                                            data-onstyle="success" data-offstyle="danger">
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            @adminCan('gallery.video.edit')
                                                                <a href="{{ route('admin.galleryVideo.edit', $video->id) }}"
                                                                    class="btn btn-primary btn-sm me-2">
                                                                    <i class="fa fa-edit" aria-hidden="true"></i></a>
                                                            @endadminCan
                                                            @adminCan('gallery.video.delete')
                                                                <a href="javascript:void(0)" class="btn btn-danger btn-sm"
                                                                    onclick="deleteData({{ $video->id }})"
                                                                    data-bs-toggle="modal" data-bs-target="#deleteModal">
                                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                                </a>
                                                            @endadminCan
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <x-empty-table :name="__('Video Gallery')" route='admin.galleryVideo.create'
                                                    create="yes" :message="__('No data found!')" colspan="4" />
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $videoGalleries->onEachSide(3)->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        function deleteData(id) {
            $("#deleteForm").attr("action", '{{ url('admin/galleryVideo/') }}' + "/" + id)
        }

        function changeStatus(id) {
            $.ajax({
                type: "put",
                data: {
                    _token: '{{ csrf_token() }}'
                },
                url: "{{ route('admin.galleryVideo.status', '') }}" + "/" + id,
                success: function(response) {
                    console.log(response);
                    toastr.success(response.message)
                },
                error: function(err) {
                    handleFetchError(err);
                }
            })
        }
    </script>
@endsection
