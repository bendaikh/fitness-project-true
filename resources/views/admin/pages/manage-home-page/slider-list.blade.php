@extends('admin.master_layout')
@section('title')
    <title>{{ __('Slider List') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">

            <x-admin.breadcrumb title="{{ __('Slider List') }}" :list="[
                __('Dashboard') => route('admin.dashboard'),
                __('Slider List') => '#',
            ]" />


            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class="table-responsive">
                                    <table class="table">
                                        @php
                                            $homepage1 = [
                                                'Home Page 1 / 4' => '1',
                                                'Home Page 2' => '2',
                                                'Home Page 3' => '3',
                                            ];
                                        @endphp
                                        <thead>
                                            <tr>
                                                <th width="5%">{{ __('SN') }}</th>
                                                <th width="20%">{{ __('Home Page') }}</th>
                                                <th width="15%">{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($homepage1 as $key => $value)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $key }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="{{ route('admin.slider.edit', ['home' => $value, 'code' => getSessionLanguage()]) }}"
                                                                class="btn btn-primary">{{ __('Edit') }}</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
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
