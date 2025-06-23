@extends('admin.master_layout')
@section('title')
    <title>{{ __('Menu Builder') }}</title>
@endsection
@section('admin-content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <x-admin.breadcrumb title="{{ __('Menu Builder') }}" :list="[
                __('Dashboard') => route('admin.dashboard'),
                __('Menu Builder') => '#',
            ]" />

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @php
                            $currentUrl = url()->current();
                            $language_code = !empty(request('code')) ? request('code') : getSessionLanguage();
                        @endphp
                        <div class="lang_list_top">
                            <ul class="lang_list">
                                @foreach ($languages as $language)
                                    <li><a id="{{ request('code') == $language->code ? 'selected-language' : '' }}"
                                            href="{{ currectUrlWithQuery($language->code) }}"><i
                                                class="fas {{ request('code') == $language->code || ($language->code == config('app.locale') && empty(request('code'))) ? 'fa-eye' : 'fa-edit' }}"></i>
                                            {{ $language->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="mt-2 alert alert-danger" role="alert">
                            @php
                                $current_language = $languages->where('code', $language_code)->first();
                            @endphp
                            <p>{{ __('Your editing mode') }} :
                                <b>{{ $current_language?->name }}</b>
                            </p>
                        </div>
                        <x-admin.form-input type="hidden" id="language_code" value="{{ $language_code }}" />
                    </div>
                    {{-- Choose menu --}}
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="get" action="{{ $currentUrl }}">
                                    <div class="row">
                                        <div class="col-md-4 text-center">
                                            <div class="input-group">
                                                <x-admin.form-select name="menu" id="menu" class="form-select">
                                                    <x-admin.select-option :selected="request()->input('menu') == '0'" value="0"
                                                        text="{{ __('Select menu') }}" />
                                                    @foreach ($menus as $val)
                                                        <x-admin.select-option :selected="request()->input('menu') == $val->id"
                                                            value="{{ $val->id }}"
                                                            text="{{ $val->getTranslation($language_code)?->name }}" />
                                                    @endforeach
                                                </x-admin.form-select>
                                                <x-admin.button type="submit" :text="__('Choose')" />
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @if (request()->has('menu') && !empty(request()->input('menu')) && checkAdminHasPermission('menu.create'))
                            <div class="col-md-12">
                                <x-admin.form-input type="hidden" id="menu_id" value="{{ $select_menu->id }}" />
                            </div>
                            <div class="col-md-4">
                                <div class="accordion">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header bg-transparent" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                {{ __('Add Menu Item') }}
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show"
                                            aria-labelledby="headingOne">
                                            <div class="accordion-body">
                                                <x-admin.form-select id="default-item-select" class="select2">
                                                    <x-admin.select-option text="{{ __('Default Pages') }}" />
                                                    @foreach ($defaultMenuItemList as $menu)
                                                        <x-admin.select-option value="1"
                                                            data-label="{{ $menu->name }}"
                                                            data-url="{{ $menu->url }}" text="{{ $menu->name }}" />
                                                    @endforeach
                                                </x-admin.form-select>

                                                <div class="form-group mt-3">
                                                    <x-admin.form-input id="add_item_url" label="{{ __('URL') }}"
                                                        placeholder="{{ __('Enter URL') }}" value="{{ old('url') }}"
                                                        required="true" />
                                                </div>
                                                <div class="form-group">
                                                    <x-admin.form-input id="add_item_name" label="{{ __('Name') }}"
                                                        placeholder="{{ __('Enter Name') }}" value="{{ old('name') }}"
                                                        required="true" />
                                                </div>
                                                <div class="d-flex align-items-center gap-2">
                                                    <x-admin.button :text="__('Add Item')" onclick="addMenuItem(event)" />
                                                    <div class="spinner-border text-primary  spinner-border-sm item-spinner d-none"
                                                        role="status"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 text-end pb-3 d-flex align-items-center gap-2">
                                                <div class="input-group">
                                                    <x-admin.form-input id="menu_name"
                                                        value="{{ $select_menu->getTranslation($language_code)?->name }}"
                                                        required="true" />
                                                    <x-admin.update-button :text="__('Update Menu')"
                                                        onclick="updateMenuName(event)" />
                                                </div>
                                                <div class="spinner-border text-success spinner-border-sm menu-name-spinner d-none"
                                                    role="status"></div>
                                            </div>
                                            <div class="col-12 my-3">
                                                <div class="dd" id="nestable">
                                                    <ol class="dd-list" id="menu_item_list">
                                                        @if ($menuItems)
                                                            @foreach ($menuItems as $menu)
                                                                <x-custommenu::menu-item :menu="$menu" />
                                                            @endforeach
                                                        @else
                                                            <h4 class="text-danger mb-0" id="no_item_found">
                                                                {{ __('No Item Found') }}</h4>
                                                        @endif
                                                    </ol>
                                                </div>
                                            </div>
                                            <div class="col-12 pt-3 d-flex align-items-center gap-2">
                                                <x-admin.button :text="__('Save Menu')" onclick="updateMenu(event)" />
                                                <div class="spinner-border text-primary spinner-border-sm menu-update-spinner d-none"
                                                    role="status"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <h1 class="text-danger text-center">{{ __('Please Select a menu') }}</h1>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
    <x-admin.delete-modal />
    <div tabindex="-1" role="dialog" id="editModal" class="modal fade">
        <div class="modal-dialog" role="document">
            <form class="modal-content" action="{{ route('admin.custom-menu.items.update') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Edit Menu') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mt-3">
                        <x-admin.form-input id="update_item_url" name="link" label="{{ __('URL') }}"
                            placeholder="{{ __('Enter URL') }}" required="true" />
                    </div>
                    <div class="form-group">
                        <x-admin.form-input id="update_item_name" name="label" label="{{ __('Name') }}"
                            placeholder="{{ __('Enter Name') }}" required="true" />
                    </div>
                    <x-admin.form-input type="hidden" id="update_item_id" name="id" />
                    <x-admin.form-input type="hidden" name="code" value="{{ $language_code }}" />
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <x-admin.button variant="danger" data-bs-dismiss="modal" text="{{ __('Close') }}" />
                    <x-admin.update-button :text="__('Update')">
                                            </x-admin.update-button>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('backend/custom-menu/menu.css') }}">
@endpush
@push('js')
    @include('custommenu::script')
    <script src="{{ asset('backend/custom-menu/nestable.js') }}"></script>
    <script src="{{ asset('backend/custom-menu/menu.js') }}"></script>
    <script>
        function deleteData(id) {
            $("#deleteForm").attr("action", '{{ url('/admin/menu/items/destroy/') }}' + "/" + id)
        }
    </script>
@endpush
