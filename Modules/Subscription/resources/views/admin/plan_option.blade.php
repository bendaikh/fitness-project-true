@extends('admin.master_layout')
@section('title')
    <title>{{ __('Subscription Plan') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <x-admin.breadcrumb title="{{ $plan->plan_name }} {{ __('Plan Option') }}" :list="[
                __('Dashboard') => route('admin.dashboard'),
                __('Plan Option') => '#',
            ]" />

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <x-admin.form-title :text="__('Option List')" />
                                @adminCan('subscription.option.create')
                                    <div>
                                        <x-admin.add-button href="javascript:;" data-bs-toggle="modal"
                                            data-bs-target="#add-option" text="Add Option" />
                                    </div>
                                @endadminCan
                            </div>
                            <div class="card-body text-center">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>{{ __('SN') }}</th>
                                                <th>{{ __('Name') }}</th>
                                                <th>{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @forelse ($planOption as $index => $option)
                                                <tr>
                                                    <td>{{ ++$index }}</td>
                                                    <td>{{ $option->name }}</td>
                                                    <td>
                                                        @adminCan('subscription.option.edit')
                                                            <a href="javascript:;" data-bs-toggle="modal"
                                                                data-bs-target="#edit-option-{{ $option->id }}"
                                                                class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                                        @endadminCan
                                                        @adminCan('subscription.option.delete')
                                                            <a href="javascript:;"
                                                                data-url="{{ route('admin.delete-plan-option', $option->id) }}"
                                                                class="btn btn-danger btn-sm delete"><i
                                                                    class="fa fa-trash"></i></a>
                                                        @endadminCan
                                                    </td>
                                                </tr>
                                            @empty
                                                <x-empty-table :name="__('Subscription Option')" route='#add-option'
                                                    create="{{ checkAdminHasPermission('subscription.option.create') ? 'modal' : '' }}"
                                                    :message="__('No data found!')" colspan="6">
                                                </x-empty-table>
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


    <div class="modal fade" tabindex="-1" role="dialog" id="delete">
        <div class="modal-dialog" role="document">
            <form action="" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Delete Plan Option') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-danger">{{ __('Are You Sure to Delete this Plan Option?') }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="btn btn-danger">{{ __('Yes, Delete') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @adminCan('subscription.option.create')
        <div>
            <div class="modal fade" tabindex="-1" role="dialog" id="add-option">
                <div class="modal-dialog" role="document">
                    <form action="{{ route('admin.store-plan-option') }}" method="POST">
                        @csrf
                        <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{ __('Create Plan Option') }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="name">{{ __('Option Name') }}</label>
                                            <input type="text" name="name" class="form-control" id="name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger"
                                        data-bs-dismiss="modal">{{ __('Close') }}</button>
                                    <x-admin.save-button :text="__('Save')"></x-admin.save-button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    @endadminCan
    @foreach ($planOption as $option)
        <div>
            <div class="modal fade" tabindex="-1" role="dialog" id="edit-option-{{ $option->id }}">
                <div class="modal-dialog" role="document">
                    <form action="{{ route('admin.update-plan-option', $option->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{ __('Edit Plan Option') }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="name">{{ __('Option Name') }}</label>
                                            <input type="text" name="name" class="form-control" id="name"
                                                required value="{{ $option->name }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger"
                                        data-bs-dismiss="modal">{{ __('Close') }}</button>
                                    <x-admin.save-button :text="__('Save')"></x-admin.save-button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach


    @push('js')
        <script>
            $(function() {
                'use strict'

                $('.delete').on('click', function(e) {
                    e.preventDefault();
                    const modal = $('#delete');
                    modal.find('form').attr('action', $(this).data('url'));
                    modal.modal('show');
                })
            })
        </script>
    @endpush
@endsection
