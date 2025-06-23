@extends('admin.master_layout')
@section('title')
    <title>{{ __('Attribute List') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <x-admin.breadcrumb title="{{ __('Attribute List') }}" :list="[
                __('Dashboard') => route('admin.dashboard'),
                __('Attribute List') => '#',
            ]" />
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <x-admin.form-title :text="__('Attribute List')" />
                                @adminCan('product.attribute.create')
                                    <div>
                                        <x-admin.add-button :href="route('admin.attribute.create')" text="{{ __('Add Attribute') }}" />
                                    </div>
                                @endadminCan
                            </div>
                            <div class="card-body text-center">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>{{ __('SL.') }}</th>
                                                <th>{{ __('Name') }}</th>
                                                <th>{{ __('Values') }}</th>
                                                <th>{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($attributes as $attribute)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $attribute->name }}</td>
                                                    <td>
                                                        @foreach ($attribute->values as $val)
                                                            {{ $val->name }}@if (!$loop->last)
                                                                ,
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            @adminCan('product.attribute.edit')
                                                                <a href="{{ route('admin.attribute.edit', $attribute->id) }}"
                                                                    class="btn btn-primary btn-sm me-2" data-toggle="tooltip"
                                                                    title="{{ __('Edit') }}"><i class="fas fa-edit"></i></a>
                                                                @adminCan('product.attribute.delete')
                                                                @endadminCan
                                                                <a href="javascript:void(0)"
                                                                    class="btn btn-danger btn-sm trigger--fire-modal-1 deleteForm"
                                                                    data-bs-toggle="modal" title="{{ __('Delete') }}"
                                                                    data-url="{{ route('admin.attribute.destroy', $attribute->id) }}"
                                                                    data-form="deleteForm" data-id="{{ $attribute->id }}"><i
                                                                        class="fas fa-trash"></i></a>
                                                            @endadminCan
                                                        </div>
                                                    </td>
                                                </tr>
                                                @empty
                                                    <x-empty-table :name="__('attribute')" route="admin.attribute.create"
                                                        create="yes" :message="__('No data found!')" colspan="5"></x-empty-table>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="float-right">
                                        {{ $attributes->onEachSide(3)->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div class="modal fade" tabindex="-1" role="dialog" id="confirm-availibility">
            <div class="modal-dialog" role="document">
                <form action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="attribute_id">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{ __('Confirm Delete') }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="text-danger">
                                {{ __('Attribute has values. Sure to Delete?') }}
                            </p>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-bs-dismiss="modal">{{ __('Close') }}</button>
                            <button type="submit" class="btn btn-danger">{{ __('Yes, Delete') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        @include('components.admin.preloader')
    @endsection


    @push('js')
        <script>
            $(document).ready(function() {
                'use strict';
                $('.deleteForm').on('click', function() {
                    $('.preloader_area').removeClass('d-none')

                    const id = $(this).data('id');

                    const route = "{{ route('admin.attribute.destroy', '') }}/" + id;
                    $.ajax({
                        url: "{{ route('admin.attribute.has-value') }}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            attribute_id: id
                        },
                        success: function(response) {
                            console.log(response);
                            if (response.status) {
                                $('#confirm-availibility').modal('show');
                                $('#confirm-availibility').find('form').attr('action', route);

                                $('[name="attribute_id"]').val(id);
                            } else {
                                $('#deleteForm').attr('action', route);
                            }

                            $('.preloader_area').addClass('d-none')
                        }
                    });
                });
            });
        </script>
    @endpush
