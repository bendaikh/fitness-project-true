@php
    $languages = allLanguages()->where('status', '1');
@endphp
@if (Module::isEnabled('Language') && Route::has('website.web.set-language') && $languages->count() > 1)
    <li>
        <form id="setLanguage" action="{{ route('website.web.set-language') }}">
            <select class="select_js" name="code">
                @forelse ($languages as $language)
                    <option value="{{ $language->code }}"
                        {{ getSessionLanguage() == $language->code ? 'selected' : '' }}>
                        {{ $language->name }}
                    </option>
                @empty
                    <option value="en" {{ getSessionLanguage() == 'en' ? 'selected' : '' }}>
                        English
                    </option>
                @endforelse
            </select>
        </form>
    </li>
@endif
