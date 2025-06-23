@extends('admin.master_layout')
@section('title')
    <title>{{ __('Contact Message') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <x-admin.breadcrumb title="{{ __('Contact Message') }}" :list="[
                __('Dashboard') => route('admin.dashboard'),
                __('Contact Message') => '#',
            ]" />

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive table-invoice">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>{{ __('SN') }}</th>
                                                <th>{{ __('Name') }}</th>
                                                <th>{{ __('Email') }}</th>
                                                <th>{{ __('Created at') }}</th>
                                                <th>{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($messages as $index => $message)
                                                <tr>
                                                    <td>{{ ++$index }}</td>
                                                    <td>{{ html_decode($message->name) }}</td>
                                                    <td><a
                                                            href="mailto:{{ html_decode($message->email) }}">{{ html_decode($message->email) }}</a>
                                                    </td>
                                                    <td>{{ $message->created_at->format('h:iA, d M Y') }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                        <a href="{{ route('admin.contact-message', $message->id) }}"
                                                            class="btn btn-success btn-sm me-2"><i class="fa fa-eye"
                                                                aria-hidden="true"></i></a>
                                                        <a onclick="deleteData({{ $message->id }})" href="javascript:;"
                                                            data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                            class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <x-empty-table :name="__('')" route="" create="no"
                                                    :message="__('No data found!')" colspan="5"></x-empty-table>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>

    @push('js')
        <script>
            "use strict";

            function deleteData(id) {
                $("#deleteForm").attr("action", '{{ url('/admin/contact-message-delete/') }}' + "/" + id)
            }
        </script>
    @endpush
@endsection
