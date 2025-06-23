<tr>
    <td colspan="{{ $colspan }}" class="py-5 text-center">
        <img src="{{ asset('backend/img/empty-box.png') }}" alt="" width="200px">
        <h4 class="py-2">{{ $message }}</h4>
        @if ($create == 'yes')
            <a href="{{ isset($route) ? route($route) : '' }}" class="btn btn-success">{{ __('Add New') }}
                {{ $name }}</a>
        @elseif ($create == 'modal')
            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                data-bs-target="{{ isset($route) ? $route : '' }}"> {{ __('Add New') }} {{ $name }}</button>
        @endif
    </td>
</tr>
