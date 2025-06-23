<div class="tab-pane fade show active" id="about_tab" role="tabpanel">
    <form action="{{ route('admin.update-about-content') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="hidden" name="code" value="{{ $code }}">
        <input type="hidden" name="home" value="1">
        <input type="hidden" name="tab" value="about_section">
        <div class="form-group">
            <label for="">{{ __('About Section Title') }}<span class="text-danger">*</span></label>
            <div>
                <input type="text" name="about_us_title" class="form-control"
                    value="{{ $home?->getTranslation($code)?->about_us_title }}" data-translate="true">
            </div>
        </div>
        <div class="form-group">
            <label for="">{{ __('About Section Sub Title') }}<span class="text-danger">*</span></label>
            <div>
                <input type="text" name="about_us_sub_title" class="form-control"
                    value="{{ $home?->getTranslation($code)?->about_us_sub_title }}" data-translate="true">
            </div>
        </div>

        <div class="form-group">
            <label for="">{{ __('About Button Text') }}<span class="text-danger">*</span></label>
            <div>
                <input type="text" name="about_us_button_text" class="form-control"
                    value="{{ $home?->getTranslation($code)?->about_us_button_text }}" data-translate="true">
            </div>
        </div>
        @if ($code == $languages->first()->code)
            <div class="form-group">
                <label for="">{{ __('About Button Link') }}</label>
                <div>
                    <input type="text" name="about_us_button_link" class="form-control"
                        value="{{ $home?->about_us_button_link }}">
                </div>
            </div>
        @endif
        <div class="form-group">
            <label for="">{{ __('About Content Title') }}<span class="text-danger">*</span></label>
            <div>
                <input type="text" name="about_us_inner_title" class="form-control"
                    value="{{ $home?->getTranslation($code)?->about_us_inner_title }}" data-translate="true">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="mb-3">{{ __('About us Content') }}
                <button class="btn btn-primary btn-sm content_btn" type="button"><i class="fas fa-plus"></i></button>
            </label>
            <div class="content_container">
                @if ($home?->getTranslation($code)?->about_us_description_list)
                    @forelse ($home?->getTranslation($code)?->about_us_description_list as $list)
                        <div class="list-container d-flex justify-content-between align-items-center gap-2">
                            <input type="text" class="form-control mb-2" name="about_us_description_list[]"
                                value="{{ $list }}" data-translate="true">
                            <button class="btn btn-danger btn-sm remove_list" type="button"><i
                                    class="fas fa-times"></i></button>
                        </div>
                    @empty
                        <div class="list-container d-flex justify-content-between align-items-center gap-2">
                            <input type="text" class="form-control mb-2" name="about_us_description_list[]">
                            <button class="btn btn-danger btn-sm remove_list" type="button">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    @endforelse
                @endif
            </div>
        </div>
        @if ($code == $languages->first()->code)
            <div class="form-group">
                <label>{{ __('Background Shapes') }}<span class="text-danger">*</span>
                </label>
                <div class="row">
                    <div class="col-6 mb-2">
                        <div id="image-preview-bg_1" class="image-preview"
                            @if ($home?->about_us_bg_shape_1 ?? false) style="background-image: url({{ asset($home?->about_us_bg_shape_1) }}); background-size: cover; background-position: center center;background-color:#ddd" @endif>
                            <label for="image-upload" id="image-label">{{ __('Image') }}
                            </label>
                            <input type="file" name="about_us_bg_shape_1" id="about_us_bg_shape_1" data-id="bg_1">
                        </div>
                    </div>
                    <div class="col-6 mb-2">
                        <div id="image-preview-bg_2" class="image-preview"
                            @if ($home?->about_us_bg_shape_2 ?? false) style="background-image: url({{ asset($home?->about_us_bg_shape_2) }}); background-size: cover; background-position: center center; background-color:#ddd" @endif>
                            <label for="image-upload" id="image-label">{{ __('Image') }}
                            </label>
                            <input type="file" name="about_us_bg_shape_2" id="about_us_bg_shape_2" data-id="bg_2">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="mb-3">{{ __('Slider Images') }}<span class="text-danger">*</span>
                    <button class="btn btn-primary btn-sm add_image" type="button">
                        <i class="fas fa-plus"></i>
                    </button>
                </label>
                <div class="row image_container">
                    @php
                        $images = $home?->about_us_images ?? [];
                    @endphp
                    @forelse($images as $index => $image)
                        <div class="col-6 mb-2">
                            <div id="image-preview-{{ $index }}" class="image-preview"
                                style="background-image: url({{ asset($image) }}); background-size: cover; background-position: center center;background-color:#ddd">
                                <a href="javascript:;" class="text-danger text-end item-remove"
                                    data-id="{{ $index }}"><i class="fas fa-trash"></i></a>
                                <label for="image-upload-{{ $index }}"
                                    id="image-label-{{ $index }}">{{ __('Image') }}
                                </label>
                                <input type="file" name="image[{{ $index }}]"
                                    id="image-upload-{{ $index }}" data-id="{{ $index }}">
                            </div>
                        </div>
                    @empty
                        <div class="col-6 mb-2">
                            <div id="image-preview" class="image-preview">
                                <label for="image-upload" id="image-label">{{ __('Image') }}
                                </label>
                                <input type="file" name="image[]" id="image-upload">
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        @endif
        <x-admin.update-button :text="__('Update')"></x-admin.update-button>
    </form>
</div>



<script>
    $(document).ready(function() {
        "use strict";
        //input image preview
        function readURL(input, selector = null) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    const item = selector ? $(`#image-preview-${selector}`) : $('#image-preview')
                    item.css('background-image', 'url(' + e.target.result + ')');
                    item.hide();
                    item.fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(document).on('change', 'input[type="file"]', function() {
            var id = $(this).data('id');
            readURL(this, id);
        });

        //add image
        $(document).on('click', '.add_image', function() {
            // get total images
            var total_images = $('.image_container').children().length + 1;
            var html = `<div class="col-6 mb-2">
            <div id="image-preview-${total_images}" class="image-preview">
            <label for="image-upload-${total_images}" id="image-label-${total_images}">{{ __('Image') }}</label>
            <input type="file" name="image[]" id="image-upload-${total_images}" data-id="${total_images}">
            </div>
            </div>`;
            $('.image_container').append(html);
        });
        $(document).on('click', '.remove_list', function() {
            $(this).closest('.list-container').remove();
        })

        $('.content_btn').on('click', function() {
            var html =
                `
                <div class="list-container d-flex justify-content-between align-items-center gap-2">
                            <input type="text" class="form-control mb-2" name="about_us_description_list[]">
                            <button class="btn btn-danger btn-sm remove_list" type="button">
                                <i class="fas fa-times"></i>
                                </button>
                        </div>
                `;
            $('.content_container').append(html);
        })

        $('.item-remove').on('click', function() {
            const id = $(this).data('id');


            $.ajax({
                type: "POST",
                url: "{{ route('admin.update-about-image') }}",
                data: {
                    id,
                    home: "{{ $home->home }}"
                },
                success: function(response) {
                    if (response.status == 404) {
                        toastr.error(response.message);
                        window.location.reload();
                    } else {
                        toastr.success(response.message);
                        $(`#image-preview-${id}`).remove();
                    }
                }
            })
        })
    });
</script>
