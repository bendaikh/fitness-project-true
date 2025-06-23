@extends('admin.master_layout')
@section('title')
    <title>{{ __('Subscription Plan List') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">

            <x-admin.breadcrumb title="{{ __('Subscription Plan List') }}" :list="[
                __('Dashboard') => route('admin.dashboard'),
                __('Subscription Plan List') => '#',
            ]" />

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <x-admin.form-title :text="__('Subscription Plan List')" />
                                @adminCan('subscription.create')
                                    <div>
                                        <x-admin.add-button :href="route('admin.subscription-plan.create')" text="{{ __('Add subscription Plan') }}" />
                                    </div>
                                @endadminCan
                            </div>
                            <div class="card-body text-center">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>{{ __('Serial') }}</th>
                                                <th>{{ __('Name') }}</th>
                                                <th>{{ __('Price') }}</th>
                                                <th>{{ __('Expiration') }}</th>
                                                <th>{{ __('Options') }}</th>
                                                <th>{{ __('Status') }}</th>
                                                <th>{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($plans as $index => $plan)
                                                <tr>
                                                    <td>{{ $plan->serial }}</td>
                                                    <td>{{ $plan->plan_name }}</td>
                                                    <td>{{ currency($plan->plan_price) }}</td>
                                                    <td>{{ ucfirst($plan->expiration_date) }}</td>
                                                    <td>
                                                        @adminCan('subscription.option.view')
                                                            <a
                                                                href="{{ route('admin.plan-option', $plan->id) }}">{{ __('Option') }}</a>
                                                        @endadminCan
                                                    </td>
                                                    <td>
                                                        <input onchange="changeStatus({{ $plan->id }})"
                                                            id="status_toggle" type="checkbox"
                                                            {{ $plan->status ? 'checked' : '' }} data-toggle="toggle"
                                                            data-on="{{ __('Active') }}" data-off="{{ __('Inactive') }}"
                                                            data-onstyle="success" data-offstyle="danger">
                                                    </td>

                                                    <td>
                                                        <div class="btn-group">
                                                            @adminCan('subscription.edit')
                                                                <a href="{{ route('admin.subscription-plan.edit', $plan->id) }}"
                                                                    class="btn btn-primary btn-sm me-2"><i
                                                                        class="fa fa-edit"></i></a>
                                                            @endadminCan
                                                            @adminCan('subscription.delete')
                                                                <a href="javascript:;"
                                                                    data-url="{{ route('admin.subscription-plan.destroy', $plan->id) }}"
                                                                    class="btn btn-danger btn-sm delete"><i
                                                                        class="fa fa-trash"></i></a>
                                                            @endadminCan
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <x-empty-table :name="__('Subscription')" route="admin.subscription-plan.create"
                                                    create="yes" :message="__('No data found!')" colspan="6"></x-empty-table>
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
                        <h5 class="modal-title">{{ __('Delete Plan') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-danger">{{ __('Are You Sure to Delete this Plan ?') }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="btn btn-danger">{{ __('Yes, Delete') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    @push('js')
        <script>
            'use strict'

            $('.delete').on('click', function(e) {
                e.preventDefault();
                const modal = $('#delete');
                modal.find('form').attr('action', $(this).data('url'));
                modal.modal('show');
            })


            function changeStatus(id) {
                $.ajax({
                    type: "put",
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    url: "{{ route('admin.subscription-plan.status', '') }}" + "/" + id,
                    success: function(response) {
                        if (response.success) {
                            toastr.success(response.message);
                        }
                    },
                    error: function(err) {
                        handleFetchError(err);
                    }
                });
            }
        </script>
    @endpush
@endsection
