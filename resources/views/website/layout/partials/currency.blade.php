@if (count(allCurrencies()?->where('status', 'active')) > 1)
    <li>
        <form id="setCurrency" action="{{ route('set-currency') }}">
            <select class="select_js" name="currency">
                @forelse (allCurrencies()?->where('status', 'active') as $currency)
                    <option class="text-dark" value="{{ $currency->currency_code }}"
                        {{ getSessionCurrency() == $currency->currency_code ? 'selected' : '' }}>
                        {{ $currency->currency_name }}
                    </option>
                @empty
                    <option value="USD" {{ getSessionCurrency() == 'USD' ? 'selected' : '' }}>
                        {{ __('USD') }}
                    </option>
                @endforelse
            </select>
        </form>
    </li>
@endif
