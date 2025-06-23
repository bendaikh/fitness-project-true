@extends('website.user.layout.layout')

@section('title', 'Class Time')

@section('user-content')
    <div class="wsus__dashboard_main_contant wow fadeInUp">
        <h4>{{ __('Class Time') }}</h4>
        <div class="wsus__dashboard_order">
            <div class="row">
                @if ($classes->count() > 0)
                    <div class="col-12 wow fadeInUp">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="serial">{{ __('Serial') }}</th>
                                        <th class="e_date">{{ __('Date') }}</th>
                                        <th class="p_date">{{ __('Class Name') }}</th>
                                        <th class="package">{{ __('Activities') }}</th>
                                        <th class="price">{{ __('Class Time') }}</th>
                                        <th class="action">{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($classes as $index => $class)
                                        <tr>
                                            <td class="serial">{{ $classes->firstItem() + $index }}</td>
                                            <td class="e_date">{{ $class->date }}</td>
                                            <td class="p_date">{{ $class->name }}</td>
                                            <td class="package">
                                                <ul>
                                                    @foreach ($class->activities()->get() as $activity)
                                                        <li>{{ $activity->name }}</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td class="price">{{ $class->start_at }} - {{ $class->end_at }}</td>
                                            <td class="action"><a class="edit" href="javascript:;"
                                                    data-id="{{ $class->id }}"><i class="far fa-edit"></i></a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    @include('components.no-data-found', [
                        'message' => __('No Class Found'),
                    ])
                @endif
            </div>
            @if ($classes->lastPage() > 1)
                <div class="row">
                    <div class="col-12 wow fadeInUp vis-animation">
                        <div class="wsus__pagination mt_60">
                            {{ $classes->links('vendor.pagination.frontend') }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="wsus__product_modal">
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body productModalDetails">

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('components.preloader')
@endsection



@push('scripts')
    <script>
        "use strict";

        $(document).ready(function() {

            $(document).on('click', '.edit', function() {
                $('.preloader_area').removeClass('d-none');
                var classId = $(this).data('id');
                var url = "{{ route('website.user.class.edit', ':id') }}";
                url = url.replace(':id', classId);
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(response) {
                        if (response.success) {
                            console.log(response.data);
                            $('.productModalDetails').html(response.data);
                            $('#staticBackdrop').modal('show');
                        } else {
                            toastr.error(response.message);
                        }
                    },
                    complete: function() {
                        $('.preloader_area').addClass('d-none');
                    }
                });
            });
        })
    </script>
@endpush
