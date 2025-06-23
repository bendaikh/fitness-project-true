@extends('website.layout.master')


@section('title')
    {{ seoSetting()->where('page_name', 'Wishlist Page')->first()->seo_title ?? '' }}
@endsection
@section('meta')
    <meta name="description"
        content="{{ seoSetting()->where('page_name', 'Wishlist Page')->first()->seo_description ?? '' }}">
@endsection

@section('content')
    @include('components.website.breadcrum', ['title' => __('Wishlist')])



    {{-- <!--============================
        CART START
    =============================--> --}}
    <section class="wsus__cart mt_120 xs_mt_100 mb_120 xs_mb_100">
        <div class="container">
            <div class="row justify-content-center">
                @if (!$wishlists->isEmpty())
                    <div class="col-xl-10 wow fadeInUp">
                        <div class="wsus__cart_list mb-0">
                            <div class="table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="pro_img">{{ __('Item') }}</th>

                                            <th class="pro_name">{{ __('Name') }}</th>

                                            <th class="pro_tk">{{ __('Price') }}</th>

                                            <th class="pro_icon">{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($wishlists as $wishlist)
                                            <tr id="wishlist-item-{{ $wishlist->id }}">
                                                <td class="pro_img">
                                                    <a
                                                        href="{{ route('website.product-details', $wishlist?->product?->slug) }}">
                                                        <img src="{{ asset($wishlist->product->image_url) }}" alt="img"
                                                            class="img-fluid w-100">
                                                    </a>
                                                </td>

                                                <td class="pro_name">
                                                    <a
                                                        href="{{ route('website.product-details', $wishlist->product->slug) }}">
                                                        <h5>{{ $wishlist->product->name }}</h5>
                                                    </a>
                                                </td>

                                                <td class="pro_tk">
                                                    <h6>{{ currency($wishlist->product->actual_price) }}</h6>
                                                </td>

                                                <td class="pro_icon">
                                                    <a href="javascript:;" data-id="{{ $wishlist->id }}"
                                                        class="remove-wishlist">
                                                        <i class="fal fa-times"></i>
                                                    </a>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @else
                    @include('components.no-data-found', ['message' => __('No data found')])
                @endif
            </div>
            @if ($wishlists->count() > 1)
                <div class="row">
                    <div class="col-12 wow fadeInUp vis-animation">
                        <div class="wsus__pagination mt_60">
                            {{ $wishlists->links('vendor.pagination.frontend') }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

    {{-- <!--============================
        CART END
    =============================--> --}}
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
                type: 'post',
                data: {
                    __token: '{{ csrf_token() }}'
                },
                success: function(response) {

                    if (response.success) {
                        toastr.success(response.message);
                        $(`#wishlist-item-${wishlistId}`).remove();
                    } else {
                        toastr.error(response.message);
                    }
                    if (response.wishlist.length == 0) {
                        const no_data = `
                        <div class="row">
                            @include('components.no-data-found', ['message' => __('No data found')])
                        </div class="row">
                        `
                        $('.wsus__cart .container').html(no_data)
                    }
                    $('.wishlist_count').text(response.wishlist.length)
                    $('.preloader_area').addClass('d-none')
                }
            });
        });
    </script>
@endpush
