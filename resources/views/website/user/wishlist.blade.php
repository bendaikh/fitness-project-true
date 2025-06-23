@extends('website.user.layout.layout')

@section('title', 'Wishlist')

@section('user-content')
    <div class="wsus__dashboard_main_contant wow fadeInUp">
        <h4>{{ __('Wishlist') }}</h4>
        <div class="wsus__dashboard_wishlist wow fadeInUp">
            <div class="row">

                @if ($wishlists->count() > 0)
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="image">{{ __('Image') }}</th>
                                        <th class="details">{{ __('Details') }}</th>
                                        <th class="actions">{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($wishlists as $wishlist)
                                        <tr id="wishlist-item-{{ $wishlist->id }}">
                                            <td class="image">
                                                <a
                                                    href="{{ route('website.product-details', $wishlist?->product?->slug) }}">
                                                    <img src="{{ asset($wishlist->product->image_url) }}" alt="img"
                                                        class="img-fluid w-100">
                                                </a>
                                            </td>
                                            <td class="details">
                                                <h5>
                                                    <a
                                                        href="{{ route('website.product-details', $wishlist?->product?->slug) }}">
                                                        {{ $wishlist->product->name }}
                                                    </a>
                                                </h5>
                                                <p class="rating">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        @if ($i <= $wishlist?->product?->avgReview)
                                                            <i class="fas fa-star" aria-hidden="true"></i>
                                                        @elseif($i - $wishlist?->product?->avgReview == 0.5)
                                                            <i class="fas fa-star-half-alt" aria-hidden="true"></i>
                                                        @else
                                                            <i class="far fa-star" aria-hidden="true"></i>
                                                        @endif
                                                    @endfor
                                                    <span>({{ $wishlist->product->totalReviews() }}
                                                        {{ __('Reviews') }})</span>
                                                </p>
                                                <h6>{{ currency($wishlist->product->actual_price) }}</h6>
                                            </td>
                                            <td class="actions">
                                                <ul class="d-flex">
                                                    <li>
                                                        <a href="javascript:;" data-id="{{ $wishlist->id }}"
                                                            class="remove-wishlist"><i class="far fa-trash-alt"
                                                                aria-hidden="true"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    @include('components.no-data-found', ['message' => __('No wishlist found.')])
                @endif
            </div>
            @if ($wishlists->lastPage() > 1)
                <div class="row">
                    <div class="col-12 wow fadeInUp vis-animation">
                        <div class="wsus__pagination mt_60">
                            {{ $wishlists->links('vendor.pagination.frontend') }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    @include('components.preloader')
@endsection


@push('scripts')
    <script>
        // remove wishlist
        $(document).on('click', '.remove-wishlist', function() {
            $('.preloader_area').removeClass('d-none')
            var wishlistId = $(this).data('id');
            var url = "{{ route('website.user.wishlist.remove', ':id') }}";
            url = url.replace(':id', wishlistId);
            $.ajax({
                url: url,
                type: 'POST',
                success: function(response) {
                    if (response.success) {
                        toastr.success(response.message);
                        $(`#wishlist-item-${wishlistId}`).remove();
                    } else {
                        toastr.error(response.message);
                    }
                    $('.preloader_area').addClass('d-none')
                }
            });
        });
    </script>
@endpush
