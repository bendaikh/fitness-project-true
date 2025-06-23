@php
    $language_code = !empty(request('code')) ? request('code') : getSessionLanguage();
@endphp
<li class="dd-item dd3-item" data-id="{{ $menu->id }}">
    <div class="dd-handle dd3-handle"></div><div class="dd3-content">
        <div class="d-flex justify-content-between align-items-center">
            <span>{{ $menu->getTranslation($language_code)?->label }}</span>
            <div class="dd-item-actions">
               <a href="javascript:;" class="m-1 text-white btn btn-sm btn-warning" title="{{ __('Edit') }}"
                onclick="editMenuItem('{{ $menu->id }}','{{ $menu->getTranslation($language_code)?->label }}','{{ $menu->link }}')"><i
                    class="fa fa-edit"></i></a>
        
            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger btn-sm"
                title="{{ __('Delete') }}" onclick="deleteData({{ $menu->id }})"><i class="fa fa-trash"></i></a> 
            </div>
            
        </div>
    </div>
    @if (!empty($menu->child) && count($menu->child) > 0)
    <ol class="dd-list">
        @foreach ($menu->child as $child)
            <x-custommenu::menu-item :menu="$child" />
        @endforeach
    </ol>
    @endif
</li>