@extends('admin.master_layout')
@section('title')
    <title>{{ __('Edit Shipping') }}</title>
@endsection
@section('admin-content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <x-admin.breadcrumb title="{{ __('Edit Shipping') }}" :list="[
                __('Dashboard') => route('admin.dashboard'),
                __('Shipping List') => route('admin.shipping.index'),
                __('Edit Shipping') => '#',
            ]" />
            <div class="section-body">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>{{ __('Edit Shipping') }}</h4>
                                <div>
                                    <a href="{{ route('admin.shipping.index') }}" class="btn btn-primary"><i
                                            class="fa fa-arrow-left"></i> {{ __('Back') }}</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.shipping.update', $shipping->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>{{ __('Title') }} <span class="text-danger">*</span></label>
                                            <input type="text" id="name" class="form-control" name="name"
                                                value="{{ $shipping->name }}">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-12">
                                            <label>{{ __('Shipping Cost') }} <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <span class="input-group-text"> {{ currency_icon() }}</span>
                                                <input type="text" class="form-control" name="fee"
                                                    placeholder="0 For Free" value="{{ $shipping->fee }}">

                                            </div>
                                            @error('fee')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-12">
                                            <label>{{ __('Minimum Order') }} </label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"> {{ currency_icon() }}</span>
                                                <input type="text" class="form-control" name="minimum_order"
                                                    value="{{ $shipping->minimum_order }}">
                                                @error('minimum_order')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-12">
                                            <label>{{ __('Status') }} </label>
                                            <div class="input-group mb-3">
                                                <select name="status" id="" class="form-select">
                                                    <option value="1"
                                                        @if ($shipping->status == 1) selected @endif>
                                                        {{ __('Active') }}</option>
                                                    <option value="0"
                                                        @if ($shipping->status == 0) selected @endif>
                                                        {{ __('InActive') }}</option>
                                                </select>
                                                @error('status')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-12">
                                            <label>{{ __('Description') }}</label>
                                            <textarea name="description" class="form-control text-area-5" id="" cols="30" rows="10">{{ $shipping->description }}</textarea>
                                            @error('description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <x-admin.update-button :text="__('Update')"></x-admin.update-button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
@endsection
