@extends('admin.master_layout')
@section('title')
    <title>{{ __('Assign Plan') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Assign Plan') }}</h1>
            </div>

            <div class="section-body">
                <div class="alert alert-warning alert-has-icon">
                    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                    <div class="alert-body">
                        <div class="alert-title">{{ __('Warning') }}</div>
                        {{ __('When a new plan will be assign to user, previous plan feature will be destroy') }}
                    </div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.store-assign-plan') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label for="">{{ __('Select Plan') }} <span
                                                    class="text-danger">*</span></label>
                                            <select name="plan_id" id="" class="form-select">
                                                @foreach ($plans as $plan)
                                                    <option value="{{ $plan->id }}">{{ $plan->plan_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-12">
                                            <label for="">{{ __('Select User') }} <span
                                                    class="text-danger">*</span></label>
                                            <select name="user_id" id="" class="form-select select2 ">
                                                <option value="" disabled>{{ __('Select User') }}</option>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->name }} -
                                                        {{ $user->email }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <button type="submit" class="btn btn-primary">{{ __('Assign Plan') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
