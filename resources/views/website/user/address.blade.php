@extends('website.user.layout.layout')

@section('title', 'Address')
@section('user-content')
    <div class="wsus__dashboard_main_contant wow fadeInUp">
        <div class="wsus_dashboard_body address_body">
            <h4 class="d-flex flex-wrap justify-content-between">{{ __('Address') }}<a
                    href="{{ route('website.user.new.address') }}" class="dash_add_new_address"><i class="far fa-plus"></i>
                    {{ __('Add New') }}</a>
            </h4>
            <div class="wsus_dashboard_address">
                <div class="wsus_dashboard_existing_address">
                    <div class="row">
                        @forelse ($addresses as $address)
                            <div class="col-md-6">
                                <div class="wsus__checkout_single_address">
                                    <div class="form-check">
                                        <label class="form-check-label" for="{{ $address->type }}">
                                            @if ($address->type == 'home')
                                                <span class="icon"><i class="fas fa-home"></i>{{ __('Home') }}</span>
                                            @else
                                                <span class="icon"><i
                                                        class="far fa-car-building"></i>{{ __('Office') }}</span>
                                            @endif
                                            @if ($address->default_address == 'yes')
                                                <span class="icon">{{ __('Default') }}</span>
                                            @endif

                                            <span class="address">{{ $address->address . ' ' . $address->address_2 }}</span>
                                        </label>
                                    </div>
                                    <ul>
                                        <li><a href="{{ route('website.user.edit.address', $address->id) }}"
                                                class="dash_edit_btn"><i class="far fa-edit"></i></a>
                                        </li>
                                        <li><a class="dash_del_icon" href="javascript:;"
                                                onclick="deleteAddress({{ $address->id }})"><i
                                                    class="fas fa-trash-alt"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @empty
                            @include('components.no-data-found', [
                                'message' => __('No Address Found'),
                            ])
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- confirmation modal  --}}

    <div class="wsus__payment">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal_payment_popup">
                        <p>
                            {{ __('Want to delete this address') }} ?
                        </p>

                        <form class="modal_form" action="" id="modal_form">

                        </form>

                        <div class="modal-footer">
                            <button type="button" class="modal_closs_btn common_btn common_btn_2"
                                data-bs-dismiss="modal">{{ __('Close') }}</button>
                            <button type="submit" class="common_btn common_btn_2"
                                form="modal_form">{{ __('Confirm') }}</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection



@push('scripts')
    <script>
        function deleteAddress(id) {
            var url = "{{ route('website.user.delete.address', ':id') }}";
            url = url.replace(':id', id);

            $('.modal_form').attr('action', url);
            $('#exampleModal').modal('show');

        }
    </script>
@endpush
