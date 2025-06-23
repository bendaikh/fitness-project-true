<div class="wsus__single_pricing">
    <h3>{{ $plan->plan_name }}</h3>

    <div class="ms-5">
        <p>Billing : {{ ucfirst($type) }}</p>
        <p>
            Total : {{ $type == 'monthly' ? currency($plan->plan_price) : currency($plan->yearly_price) }}
        </p>
    </div>
    <ul>
        @foreach ($plan->options as $option)
            <li>{{ $option->name }}</li>
        @endforeach
    </ul>

</div>
