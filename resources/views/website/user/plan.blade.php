@extends('website.user.layout.layout')

@section('title', 'Plans')

@section('user-content')
    <div class="wsus__dashboard_main_contant wsus__dashboard_pricing">
        <div class="row">
            @foreach ($plans as $plan)
                <div class="col-md-6 col-xl-6 wow fadeInUp">
                    @include('components.price-plan', [
                        'plan' => $plan,
                        'type' => 'monthly',
                        'currentPlan' => $currentPlan,
                    ])
                </div>
            @endforeach
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        'use strict';

        $(document).ready(function() {
            $('.join-now').on('click', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                var plan = $(this).data('plan');
                var plan_id = $(this).data('plan_id');
                var type = 'plan';

                const route = "{{ route('website.payment') }}?plan=" + plan + "&plan_id=" + plan_id +
                    "&type=" + type;


                // check if user is logged in
                const user = "{{ auth()->user() }}";


                if (user == '') {
                    window.location.href = "{{ route('login') }}";
                    return;
                }

                window.location.href = route;

            });
        })
    </script>
@endpush
