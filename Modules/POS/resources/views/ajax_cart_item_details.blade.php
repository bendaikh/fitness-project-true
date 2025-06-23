<div class="shopping-card-body">
    <h5 class="p-4">{{ __('Item Details') }}</h5>
    <table class="table">
        <thead>
            <th>{{ __('Item') }}</th>
            <th>{{ __('Item Extras') }}</th>
        </thead>
        <tbody>
        <tr>
            <td>
                <p>{{ $cart_content['name'] }}</p>
                <small>{{ __('size') }}: {{ ucwords($cart_content['options']['size']) }}</small>

            </td>
            <td>
                @foreach ($cart_content['options']['optional_items'] as $option)
                    <small>{{ ucwords($option['optional_name']) }} :
                        ${{ $option['optional_price'] }} <br></small>
                @endforeach
            </td>
        </tr>
        </tbody>
    </table>
</div>
