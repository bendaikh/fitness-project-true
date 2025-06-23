@php
    if (auth('web')->check() && auth('web')->user()?->member) {
        $currentPlan = auth('web')->user()?->member?->subscription;
    }
@endphp

<div
    class="wsus__single_pricing {{ isset($currentPlan) && $currentPlan->subscription_plan_id == $plan->id ? 'active-border' : '' }}">
    <h3>{{ $plan->plan_name }}</h3>
    <ul>
        @foreach ($plan->options as $option)
            <li>{{ $option->name }}</li>
        @endforeach
    </ul>

    <div class="bottom">
        @if ($type == 'monthly')
            <h2>
                @if ($plan->plan_price == 0)
                    {{ __('Free') }}
                @else
                    {{ currency($plan->plan_price) }}
                @endif
            </h2>
        @else
            <h2>{{ currency($plan->yearly_price) }}</h2>
        @endif
        @if (isset($currentPlan) &&
                $currentPlan->subscription_plan_id == $plan->id &&
                $currentPlan->renewal_date >= now()->format('Y-m-d'))
            <a href="javascript:;" class="common_btn white_btn common_btn_2 btn disabled">
                {{ $currentPlan->status == 0 && $currentPlan->payment_status == 'pending' ? __('Pending') : __('Activated') }}
            </a>
        @else
            <a href="javascript:;" class="common_btn white_btn common_btn_2 join-now" data-plan="{{ $type }}"
                data-plan_id="{{ $plan->id }}"> {{ __('Join Now') }} <i class="far fa-long-arrow-right"></i></a>
        @endif

    </div>

</div>
