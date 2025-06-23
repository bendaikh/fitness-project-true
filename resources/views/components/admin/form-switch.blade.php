@props([
    'name' => '',
    'label' => '',
    'active_value' => '1',
    'inactive_value' => '0',
    'checked' => false,
])

<label class="d-flex align-items-center mb-0">
    <input type="hidden" name="{{ $name }}" class="custom-switch-input" value="{{$inactive_value}}">
    <input type="checkbox" name="{{ $name }}" class="custom-switch-input" value="{{$active_value}}" {{ $checked ? 'checked' : '' }}>
    <span class="custom-switch-indicator"></span>
    <span class="custom-switch-description">{{ $label }}</span>
</label>