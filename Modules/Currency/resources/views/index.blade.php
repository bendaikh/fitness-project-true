@extends('admin.master_layout')
@section('title')
    <title>{{ __('Currency List') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <x-admin.breadcrumb title="{{ __('Edit Currency') }}" :list="[
                __('Dashboard') => route('admin.dashboard'),
                __('Settings') => route('admin.settings'),
                __('Currency List') => '#',
            ]" />
            <div class="section-body">
                <div class="row mt-4">
                    <div class="col">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <x-admin.form-title :text="__('Currency List')" />
                                <div>
                                    <x-admin.add-button :href="route('admin.currency.create')" />
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive table-invoice">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>{{ __('SN') }}</th>
                                                <th>{{ __('Currency') }}</th>
                                                <th>{{ __('Country Code') }}</th>
                                                <th>{{ __('Currency Code') }}</th>
                                                <th>{{ __('Currency Icon') }}</th>
                                                <th>{{ __('Currency Rate') }}</th>
                                                <th>{{ __('Default') }}</th>
                                                <th>{{ __('Status') }}</th>
                                                <th>{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($currencies as $index => $currency)
                                                <tr>
                                                    <td>{{ ++$index }}</td>
                                                    <td>{{ $currency->currency_name }}</td>
                                                    <td>{{ $currency->country_code }}</td>
                                                    <td>{{ $currency->currency_code }}</td>
                                                    <td>{{ $currency->currency_icon }}</td>
                                                    <td>{{ $currency->currency_rate }}</td>

                                                    <td>
                                                        @if ($currency->is_default == 'yes')
                                                            <span class="badge bg-success">{{ __('Default') }}</span>
                                                        @else
                                                            <span class="badge bg-danger">{{ __('No') }}</span>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        @if ($currency->status == 'active')
                                                            <span class="badge bg-success">{{ __('Active') }}</span>
                                                        @else
                                                            <span class="badge bg-danger">{{ __('Inactive') }}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            @adminCan('currency.edit')
                                                                <a href="{{ route('admin.currency.edit', $currency->id) }}"
                                                                    class="btn btn-primary btn-sm me-2"><i class="fa fa-edit"
                                                                        aria-hidden="true"></i></a>
                                                            @endadminCan
                                                            @adminCan('currency.delete')
                                                                @if ($currency->id != 1)
                                                                    <x-admin.delete-button :id="$currency->id"
                                                                        onclick="deleteData" class="align-items-center" />
                                                                @endif
                                                            @endadminCan
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <x-empty-table :name="__('Currency')" route="admin.currency.create"
                                                    create="yes" :message="__('No data found!')" colspan="9" />
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>

    <x-admin.delete-modal />
    <script>
        "use strict";

        function deleteData(id) {
            $("#deleteForm").attr("action", '{{ url('admin/currency/') }}' + "/" + id)
        }
    </script>
@endsection
