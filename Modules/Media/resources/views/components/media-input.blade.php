@props(['label_text' => __('Thumbnail Image'), ' multiple' => 'no', 'dataImages' => false, 'required' => false])

{{-- get the name from attributes --}}
@php
    $name = $attributes->get('name');
@endphp

{{-- Media preview area --}}
<div class="select-media-preview d-flex" data-name="{{ $name }}"></div>


<label>{{ $label_text }} @if ($required)
        <span class="text-danger">*</span>
    @endif
</label>
<div class="input-group">
    <input {!! $attributes->merge(['class' => 'form-control']) !!} type="hidden" id="mediaInputId">
    <div class="input-group-append mediaLibraryIcon">
        <button class="btn btn-secondary mediaLibaryOpen" type="button">{{ $slot ?? __('Media') }} <i
                class="fas fa-photo-video"></i></button>
    </div>
</div>

@push('media_list_html')
    {{-- progress bar loader --}}
    <div id="loader" class="LoadingOverlay d-none">
        <div class="Line-Progress">
            <div class="indeterminate"></div>
        </div>
    </div>
    {{-- media moal --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="mediaModal">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body" id="mediaList">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="upload-tab" data-bs-toggle="tab" href="#uploadImage"
                                role="tab" aria-controls="upload" aria-selected="false">{{ __('Upload image') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="media-tab" data-bs-toggle="tab" href="#mediaLibary" role="tab"
                                aria-controls="media" aria-selected="false">{{ __('Media Libary') }}</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="uploadImage" role="tabpanel"
                            aria-labelledby="upload-tab">
                            <form id="upload_new_media_form" class="form-group col-md-12">
                                <div class="upload__box">
                                    <div id="image_preview" class="image-preview w-100" for="image_upload">
                                        <label class="upload__btn border-0 bg-white">
                                            <label for="image_upload" id="image_label">{{ __('Image') }}</label>
                                            <input type="file" name="image" id="image_upload" accept="image/*"
                                                {{ $multiple ?? 'no' == 'yes' ? 'multiple' : '' }} data-max_length="20"
                                                class="upload__inputfile w-100">
                                        </label>
                                    </div>
                                    <div class="upload__img-wrap mt-2"></div>
                                </div>


                                <x-admin.save-button :text="__('Upload')"></x-admin.save-button>
                            </form>

                        </div>
                        <div class="tab-pane fade" id="mediaLibary" role="tabpanel" aria-labelledby="media-tab">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="keyword" class="form-control media-search-box"
                                        placeholder="{{ __('Search') }}">
                                </div>
                            </div>
                            <div class="row" id="mediaLibaryList"></div>
                            <div class="row" id="mediaPagination"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <button type="button" class="btn btn-primary add-media-button">{{ __('Add Media') }}</button>
                </div>
            </div>
        </div>
    </div>
@endpush

@push('media_libary_js')
    <script>
        "use strict";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let selecteImages = [];
        let inputVal = [];

        //fetch media list
        const fetchMedia = (url, modalShow = false) => {
            $("#loader").removeClass("d-none");
            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    if (response.success === true) {
                        $('#mediaLibaryList').empty();
                        $('#mediaPagination').empty();
                        if (response.data.data.length > 0) {
                            $.each(response.data.data, function(index, item) {
                                let selectClass = selecteImages.find(image => image.id == item.id) ?
                                    'border-primary' : '';
                                $('#mediaLibaryList').append(
                                    `<div class="col-md-3 image-item">
                                        <div style="position: relative;">
                                            <img class="rounded img-thumbnail media-libary-item w-100 ${selectClass}"  src="{{ asset('') }}${item.path}" alt="${item.alt_text}" data-path="${item.path}" data-id="${item.id}">

                                            <span class="item-delete text-danger" data-id="${item.id}"><i class="fas fa-trash"></i></span>
                                            </div>
                                        <h6 class="text-small text-primary text-capitalize text-truncate">${item.title}</h6>
                                    </div>`
                                );
                            })
                            let pageLinks = '';
                            $.each(response.data.links, function(index, item) {
                                pageLinks +=
                                    `<li class="page-item ${item.active? 'active': ''}"><a class="page-link" href="${item.url}">${item.label}</a></li>`;

                            })
                            $('#mediaPagination').append(
                                `<div class="buttons">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination">
                                            ${pageLinks}
                                        </ul>
                                    </nav>
                                </div>`
                            );
                        } else {
                            $('#mediaLibaryList').html(`
                            <div class="col-12 d-flex justify-content-center flex-column align-items-center">
                                <img src="{{ asset('backend/img/empty-box.png') }}" alt="{{ __('No data found!') }}" width="200px">
                                <h4 class="py-2">{{ __('No data found!') }}</h4>
                            </div>
                        `);
                        }
                    }
                    $("#loader").addClass("d-none");
                    if (modalShow) $("#mediaModal").modal('show');
                },
                error: function(error) {
                    $("#loader").addClass("d-none");
                }
            });
        }

        //open media libary
        $(document).on('click', '.mediaLibaryOpen', function() {
            fetchMedia("{{ route('admin.media.index') }}", true);
        });

        //Pagination
        $(document).on('click', '.page-item a', function(e) {
            e.preventDefault();
            let pageUrl = $(this).attr('href');
            fetchMedia(pageUrl);
        })

        //search media
        $(document).on('change', '.media-search-box', function(e) {
            let keyword = $(this).val();
            if (keyword) {
                fetchMedia("{{ url('admin/media/search/') }}/" + keyword);
            } else {
                fetchMedia("{{ route('admin.media.index') }}");
            }
        })

        // delete image
        $(document).on('click', '.item-delete', function(e) {
            $("#loader").removeClass("d-none");
            e.preventDefault();
            let id = $(this).attr('data-id');

            $.ajax({
                url: "{{ route('admin.media.destroy', '') }}/" + id,
                type: 'DELETE',
                success: function(response) {
                    if (response.success === true) {
                        toastr.success(response.message);
                        fetchMedia("{{ route('admin.media.index') }}");
                    }
                },
                error: function(error) {
                    let messages = error.responseJSON;
                    $.each(messages.errors, function(index, value) {

                    });
                }
            })
        })

        //selected images preview
        const imagePreview = (name) => {

            inputVal = [];
            $('.select-media-preview').empty();
            selecteImages.forEach(item => {
                $('.select-media-preview').append(
                    `<div class="preview-item">
                        <img src="{{ asset('') }}${item['path']}">
                        <span class="preview-item-remove" data-id="${item['id']}"><i class="fas fa-times"></i></span>
                    </div>`
                );
                inputVal.push(item['id']);
            });
            console.log(inputVal.join(','));
            $("#mediaInputId").val(inputVal.join(','));
            $("#mediaModal").modal('hide');
        }

        //select media image
        $(document).on('click', '.media-libary-item', function() {
            if ("{{ $multiple ?? 'no' }}" == 'no') {
                selecteImages = [];
                $(".media-libary-item").removeClass('border-primary');
            }

            let id = $(this).attr('data-id');
            let path = $(this).attr('data-path');

            let existingSelectImageId = selecteImages.findIndex(item => item.id === id);

            if (existingSelectImageId !== -1) {
                selecteImages.splice(existingSelectImageId, 1);
                $(this).removeClass('border-primary');
            } else {
                selecteImages.push({
                    id: id,
                    path: path
                });
                $(this).addClass('border-primary');
            }
        });

        //remove selected item
        $(document).on('click', '.preview-item-remove', function() {
            let id = $(this).attr('data-id');

            selecteImages = selecteImages.filter(x => {
                return x.id != id;
            })

            $("#mediaInputId").val(inputVal);
            $(this).parent().remove();
            imagePreview();
        });

        //add media button
        $(document).on('click', '.add-media-button', function() {
            imagePreview();
        });


        //upload image preview
        let imgArray = [];
        $(document).ready(function() {
            var imgWrap = "";

            $('.upload__inputfile').each(function() {
                $(this).on('change', function(e) {
                    imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
                    var maxLength = $(this).attr('data-max_length');

                    var files = e.target.files;
                    var filesArr = Array.prototype.slice.call(files);

                    filesArr.forEach(function(f, index) {
                        if (!f.type.match('image.*')) {
                            return;
                        }

                        if (imgArray.length > maxLength) {
                            return false;
                        } else {
                            var len = imgArray.filter(Boolean).length;

                            if (len >= maxLength) {
                                return false;
                            } else {
                                imgArray.push(f);

                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    var html =
                                        "<div class='upload__img-box'><div style='background-image: url(" +
                                        e.target.result + ")' data-number='" + $(
                                            ".upload__img-close").length +
                                        "' data-file='" + f
                                        .name +
                                        "' class='img-bg'><div class='upload__img-close'></div></div></div>";
                                    imgWrap.append(html);
                                };

                                reader.readAsDataURL(f);
                            }
                        }
                    });
                });
            });

            $('body').on('click', ".upload__img-close", function(e) {
                var file = $(this).parent().data("file");
                imgArray = imgArray.filter(function(img) {
                    return img.name !== file;
                });

                $(this).parent().parent().remove();
            });
        });

        //submit upload form
        $(document).on('submit', '#upload_new_media_form', function(e) {
            e.preventDefault();
            $("#loader").removeClass("d-none");

            var formData = new FormData();

            imgArray.forEach(function(file, index) {
                formData.append('images[]', file);
            });
            $.ajax({
                url: "{{ route('admin.media.index') }}",
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success === true) {
                        toastr.success(response.message);
                        imgArray = [];
                        $('.upload__inputfile').val('');
                        $('.upload__img-wrap').empty();
                        selecteImages = [...selecteImages, ...response.data];
                        imagePreview("{{ $name }}");
                    }
                    $("#loader").addClass("d-none");
                },
                error: function(error) {
                    let messages = error.responseJSON;
                    $.each(messages.errors, function(index, value) {
                        toastr.error(value);
                    });
                    $("#loader").addClass("d-none");
                }
            });
        });

        //existing image preview
        (() => {
            if (@json($dataImages) !== false) {
                $("#loader").removeClass("d-none");
                $.ajax({
                    url: "{{ route('admin.media.select') }}",
                    type: 'POST',
                    data: {
                        id_list: @json($dataImages)
                    },
                    success: function(response) {
                        if (response.success === true) {
                            selecteImages = [...selecteImages, ...response.data];
                            imagePreview("{{ $name }}");
                        }
                        $("#loader").addClass("d-none");
                    },
                    error: function(error) {
                        let messages = error.responseJSON;
                        $.each(messages.errors, function(index, value) {
                            //
                        });
                        $("#loader").addClass("d-none");
                    }
                });
            }
        })();
    </script>
@endpush

@push('media_libary_css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .preview-item {
            position: relative;
            height: 90px;
            width: 90px;
            margin: 0 4px 16px;
        }

        .preview-item img {
            height: 100%;
            width: 100%;
            object-fit: cover;
        }

        .preview-item span {
            cursor: pointer;
            position: absolute;
            top: 5px;
            right: 5px;
            background: rgba(0, 0, 0, 0.3);
            padding: 4px 8px;
            border-radius: 15px;
            color: #fff;
        }



        .media-libary-item {
            height: 150px;
            cursor: pointer;
            border-width: 3px;
            object-fit: contain;
        }

        .upload__img-wrap {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -10px;
        }

        .upload__img-box {
            width: 200px;
            padding: 0 10px;
            margin-bottom: 12px;
        }

        .upload__img-close {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background-color: rgba(0, 0, 0, 0.5);
            position: absolute;
            top: 10px;
            right: 10px;
            text-align: center;
            line-height: 24px;
            z-index: 1;
            cursor: pointer;
        }

        .upload__img-close:after {
            content: '\2716';
            font-size: 14px;
            color: white;
        }

        .img-bg {
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            position: relative;
            padding-bottom: 100%;
        }
    </style>
    {{-- loader css --}}
    <style>
        /*Line Progress*/
        .LoadingOverlay {
            position: absolute;
            display: block;
            height: 100%;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            cursor: pointer;
            z-index: 500000 !important;
            background-color: rgba(255, 255, 255, 0.2);
        }

        .Line-Progress .indeterminate {
            background-color: #2046da;
        }

        .Line-Progress .indeterminate:before {
            z-index: -100 !important;
            height: 3px;
            content: "";
            position: fixed;
            background-color: inherit;
            top: 0;
            left: 0;
            bottom: 0;
            will-change: left, right;
            -webkit-animation: indeterminate 2.1s cubic-bezier(0.65, 0.815, 0.735, 0.395) infinite;
            animation: indeterminate 2.1s cubic-bezier(0.65, 0.815, 0.735, 0.395) infinite;
        }

        .Line-Progress .indeterminate:after {
            z-index: -100 !important;
            height: 3px;
            content: "";
            position: fixed;
            background-color: inherit;
            top: 0;
            left: 0;
            bottom: 0;
            will-change: left, right;
            -webkit-animation: indeterminate-short 2.1s cubic-bezier(0.165, 0.84, 0.44, 1) infinite;
            animation: indeterminate-short 2.1s cubic-bezier(0.165, 0.84, 0.44, 1) infinite;
            -webkit-animation-delay: 1.15s;
            animation-delay: 1.15s;
        }

        @-webkit-keyframes indeterminate {
            0% {
                left: -35%;
                right: 100%;
            }

            60% {
                left: 100%;
                right: -90%;
            }

            100% {
                left: 100%;
                right: -90%;
            }
        }

        @keyframes indeterminate {
            0% {
                left: -35%;
                right: 100%;
            }

            60% {
                left: 100%;
                right: -90%;
            }

            100% {
                left: 100%;
                right: -90%;
            }
        }

        @-webkit-keyframes indeterminate-short {
            0% {
                left: -200%;
                right: 100%;
            }

            60% {
                left: 107%;
                right: -8%;
            }

            100% {
                left: 107%;
                right: -8%;
            }
        }

        @keyframes indeterminate-short {
            0% {
                left: -200%;
                right: 100%;
            }

            60% {
                left: 107%;
                right: -8%;
            }

            100% {
                left: 107%;
                right: -8%;
            }
        }
    </style>
@endpush
