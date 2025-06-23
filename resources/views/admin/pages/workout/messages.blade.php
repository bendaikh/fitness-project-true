@extends('admin.master_layout')
@section('title')
    <title>{{ __('Workout Messages') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <x-admin.breadcrumb title="{{ __('Workout Messages') }}" :list="[
                __('Dashboard') => route('admin.dashboard'),
                __('Workout Messages') => '#',
            ]" />
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th width="5%">{{ __('SN') }}</th>
                                                <th width="10%">{{ __('Workout') }}</th>
                                                <th width="10%">{{ __('Name') }}</th>
                                                <th width="10%">{{ __('Email') }}</th>
                                                <th width="10%">{{ __('Phone') }}</th>
                                                <th width="10%">{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($messages as $index => $msg)
                                                <tr>
                                                    <td>{{ $index + $messages->firstItem() }}</td>
                                                    <td>{{ $msg->workout->name }}</td>
                                                    <td>{{ $msg->name }}</td>
                                                    <td>{{ $msg->email }}</td>
                                                    <td>{{ $msg->phone }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="javascript:;" data-bs-target="#deleteModal"
                                                                data-bs-toggle="modal" class="btn btn-danger btn-sm me-2"
                                                                onclick="deleteData({{ $msg->id }})"><i
                                                                    class="fas fa-trash"></i></a>
                                                            <a href="javascript:;" class="btn btn-primary btn-sm"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#message-{{ $msg->id }}">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <x-empty-table :name="__('Message')" route='' create="no"
                                                    :message="__('No data found!')" colspan="6" />
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $messages->onEachSide(3)->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- modal  --}}
    @foreach ($messages as $msg)
        <div class="modal" id="message-{{ $msg->id }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Message Details') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                        </button>
                    </div>
                    <div class="modal-body">
                        <p>
                            {{ $msg->message }}
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger trigger--fire-modal-7"
                            data-bs-dismiss="modal">{{ __('Close') }}</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection


@push('js')
    <script>
        'use strict';
        const deleteData = (id) => {
            $("#deleteForm").attr('action', "{{ route('admin.workout.message.delete', ':id') }}".replace(':id', id));
        }
    </script>
@endpush
