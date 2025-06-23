@extends('admin.master_layout')
@section('title')
    <title>{{ __('Manage Addons') }}</title>
@endsection
@section('admin-content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('admin.settings') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>{{ __('Manage Addons') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item active"><a href="{{ route('admin.settings') }}">{{ __('Settings') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __('Manage Addons') }}</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ __('Manage Addons') }}</h4>
                                <div class="card-header-action">
                                    @adminCan('addon.install')
                                        <a class="btn btn-success" href="{{ route('admin.addons.install') }}"><i
                                                class="fas fa-plus"></i>
                                            {{ __('Install New') }}</a>
                                    @endadminCan
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @forelse ($addons as $addon)
                                        @php
                                            $options = json_decode($addon->options, true);
                                            $route =
                                                isset($options['setting_route']) && count($options) > 0
                                                    ? $options['setting_route']
                                                    : false;
                                        @endphp
                                        <div class="text-center col-lg-3 col-md-6 col-sm-12">
                                            <div class="p-1 border card">
                                                <div class="card-body">
                                                    @if ($addon->icon)
                                                        <img src="{{ $addon->icon }}" alt="">
                                                    @endif
                                                    <h4>{{ $addon->name }}</h4>
                                                    <p class="card-text">{{ $addon->description }}</p>
                                                    <p class="card-text">{{ __('version') }}: {{ $addon->version }}</p>
                                                    <p class="card-text">{{ __('Update') }}: {{ $addon->last_update }}
                                                    </p>

                                                    @if ($addon->is_default)
                                                        <button class="btn btn-success" type="button"
                                                            disabled>{{ __('Installed') }}</button>
                                                    @else
                                                        @if ($route && $addon->status && Route::has($route))
                                                            <a class="btn btn-primary" href="{{ route($route) }}"
                                                                target="_blank" rel="noopener noreferrer">
                                                                <i class="fas fa-cogs"></i>
                                                            </a>
                                                        @endif
                                                        @if ($addon->status)
                                                            <a class="btn btn-warning changeStatus"
                                                                href="{{ route('admin.addons.update.status', $addon->slug) }}">{{ __('Disable') }}</a>
                                                        @else
                                                            <a class="btn btn-success changeStatus"
                                                                href="{{ route('admin.addons.update.status', $addon->slug) }}">{{ __('Enable') }}</a>
                                                        @endif
                                                        <a class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#deleteModal" href="javascript:;"
                                                            onclick="deleteData('{{ route('admin.addons.uninstall', $addon->slug) }}')">{{ __('Uninstall') }}</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <table class="table table-striped">
                                            <tbody>
                                                <x-empty-table :name="__('Addons')" route="" create="no"
                                                    :message="__('No data found!')" colspan="1" />
                                            </tbody>
                                        </table>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>

    <x-admin.delete-modal />
@endsection

@push('js')
    <script>
        "use strict";

        $('.changeStatus').on('click', function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            $.ajax({
                type: "POST",
                url: url,
                success: function(data) {

                    if (data['alert-type'] == 'success') {
                        toastr.success(data['message']);
                        location.reload();
                    }
                },
                error: function(data) {
                    handleFetchError(data);
                }
            });
        })

        function deleteData(url) {
            $("#deleteForm").attr("action", url)
        }
    </script>
@endpush
