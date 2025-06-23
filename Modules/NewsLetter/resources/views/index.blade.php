@extends('admin.master_layout')
@section('title')
    <title>{{ __('Subscriber List') }}</title>
@endsection
@section('admin-content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">

            <x-admin.breadcrumb title="{{ __('Subscriber List') }}" :list="[
                __('Dashboard') => route('admin.dashboard'),
                __('Subscriber List') => '#',
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
                                                <th>{{ __('Email') }}</th>
                                                <th>{{ __('Subscribed at') }}</th>
                                                <th>{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($newsletters as $index => $item)
                                                <tr>
                                                    <td>{{ $newsletters->firstItem() + $index }}</td>
                                                    <td>{{ html_decode($item->email) }}</td>
                                                    <td>{{ $item->created_at->format('h:iA, d M Y') }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a onclick="deleteData({{ $item->id }})" href="javascript:;"
                                                                data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                                class="btn btn-danger btn-sm"><i
                                                                    class="fas fa-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <x-empty-table :name="__('')" route="" create="no"
                                                    :message="__('No data found!')" colspan="4"></x-empty-table>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                {{ $newsletters->onEachSide(3)->links() }}
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
                $("#deleteForm").attr("action", '{{ url('/admin/subscriber-delete/') }}' + "/" + id)
            }
        </script>
    @endpush
@endsection
