@extends('admin.master_layout')
@section('title')
    <title>{{ __('Locker History') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <x-admin.breadcrumb title="{{ __('Locker History') }}" :list="[
                __('Dashboard') => route('admin.dashboard'),
                __('Locker List') => route('admin.lockers.index'),
                __('Locker History') => '#',
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
                                                <th>{{ __('SL.') }}</th>
                                                <th>{{ __('Member') }}</th>
                                                <th>{{ __('Assign Date') }}</th>
                                                <th>{{ __('Return Date') }}</th>
                                                <th>{{ __('Created By') }}</th>
                                                <th>{{ __('Updated By') }}</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @forelse ($lockerHistories as $index => $locker)
                                                <tr>
                                                    <td>{{ $lockerHistories->firstItem() + $index }}</td>
                                                    <td>{{ $locker->member?->user?->name }}</td>
                                                    <td>{{ now()->parse($locker->assign_date)->format('d M, Y') }}</td>
                                                    <td>{{ $locker->return_date? now()->parse($locker->return_date)->format('d M, Y'): '' }}
                                                    </td>
                                                    <td>
                                                        {{ $locker->createdBy?->name }}
                                                    </td>
                                                    <td>
                                                        {{ $locker->updatedBy?->name }}
                                                    </td>
                                                </tr>
                                            @empty
                                                <x-empty-table :name="__('Locker')" route='#add-locker' create="no"
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
@endsection
