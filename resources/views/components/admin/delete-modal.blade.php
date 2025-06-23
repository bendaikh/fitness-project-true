@props(['id' =>"deleteModal" ])
<div tabindex="-1" role="dialog" id="{{$id}}" {{ $attributes->merge(['class' => 'modal fade']) }}>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Item Delete Confirmation') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>{{ __('Are You sure want to delete this item ?') }}</p>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <form id="deleteForm" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-admin.button variant="success" data-bs-dismiss="modal" text="{{__('Close')}}"/>
                    <x-admin.button variant="danger" type="submit" text="{{__('Yes, Delete')}}"/>
                </form>
            </div>
        </div>
    </div>
</div>
