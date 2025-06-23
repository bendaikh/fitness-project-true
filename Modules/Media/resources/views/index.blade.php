@extends('admin.master_layout')
@section('title')
    <title>{{ __('Media') }}</title>
@endsection
@section('admin-content')
    <!-- Main Content -->
    <div class="main-content">
        <div id="loader" class="LoadingOverlay d-none">
            <div class="Line-Progress">
                <div class="indeterminate"></div>
            </div>
        </div>
        <section class="section">
            <x-admin.breadcrumb title="{{ __('Media') }}" :list="[
                __('Dashboard') => route('admin.dashboard'),
                __('Media') => '#',
            ]" />

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <button class="btn btn-primary collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            {{ __('Upload new image') }}
                        </button>
                        <div class="collapse mt-3" id="collapseExample">
                            <form id="upload_form">
                                <fieldset class="upload_dropZone text-center mb-3 p-4">
                                    <svg class="upload_svg" width="60" height="60" aria-hidden="true">
                                        <use href="#icon-imageUpload"></use>
                                    </svg>
                                    <p class="small my-2">
                                        {{ __('Drag & Drop background image(s) inside dashed region') }}
                                        <br>
                                        <i>{{ __('OR') }}</i>
                                    </p>

                                    <input id="upload_image_background" class="position-absolute invisible" type="file"
                                        name="images" multiple accept="image/jpeg, image/png, image/svg+xml" />

                                    <label class="btn btn-primary mb-3"
                                        for="upload_image_background">{{ __('Choose file(s)') }} </label>
                                    <label id="clear_data" class="btn btn-danger mb-3"><i class="fa fa-sync"></i></label>
                                    <div
                                        class="upload_gallery d-flex flex-wrap justify-content-center gap-2 align-items-center mb-0">
                                    </div>
                                </fieldset>
                            </form>
                            <svg class="d-none">
                                <defs>
                                    <symbol id="icon-imageUpload" clip-rule="evenodd" viewBox="0 0 96 96">
                                        <path
                                            d="M47 6a21 21 0 0 0-12.3 3.8c-2.7 2.1-4.4 5-4.7 7.1-5.8 1.2-10.3 5.6-10.3 10.6 0 6 5.8 11 13 11h12.6V22.7l-7.1 6.8c-.4.3-.9.5-1.4.5-1 0-2-.8-2-1.7 0-.4.3-.9.6-1.2l10.3-8.8c.3-.4.8-.6 1.3-.6.6 0 1 .2 1.4.6l10.2 8.8c.4.3.6.8.6 1.2 0 1-.9 1.7-2 1.7-.5 0-1-.2-1.3-.5l-7.2-6.8v15.6h14.4c6.1 0 11.2-4.1 11.2-9.4 0-5-4-8.8-9.5-9.4C63.8 11.8 56 5.8 47 6Zm-1.7 42.7V38.4h3.4v10.3c0 .8-.7 1.5-1.7 1.5s-1.7-.7-1.7-1.5Z M27 49c-4 0-7 2-7 6v29c0 3 3 6 6 6h42c3 0 6-3 6-6V55c0-4-3-6-7-6H28Zm41 3c1 0 3 1 3 3v19l-13-6a2 2 0 0 0-2 0L44 79l-10-5a2 2 0 0 0-2 0l-9 7V55c0-2 2-3 4-3h41Z M40 62c0 2-2 4-5 4s-5-2-5-4 2-4 5-4 5 2 5 4Z" />
                                    </symbol>
                                </defs>
                            </svg>
                        </div>
                    </div>

                    <div class="col-12 mt-3">
                        <div class="card">
                            <form action="{{ route('admin.media.index') }}" method="GET" onchange="this.submit()"
                                class="card-body">
                                <div class="row">
                                    <div class="col-md-6 form-group mb-0">
                                        <input type="text" name="keyword" value="{{ request()->get('keyword') }}"
                                            class="form-control" placeholder="{{ __('Search') }}">
                                    </div>
                                    <div class="col-md-6 form-group mb-0">
                                        <select name="par-page" id="par-page" class="form-select">
                                            <option value="">{{ __('Per Page') }}</option>
                                            <option value="10" {{ '10' == request('par-page') ? 'selected' : '' }}>
                                                {{ __('10') }}
                                            </option>
                                            <option value="50" {{ '50' == request('par-page') ? 'selected' : '' }}>
                                                {{ __('50') }}
                                            </option>
                                            <option value="100" {{ '100' == request('par-page') ? 'selected' : '' }}>
                                                {{ __('100') }}
                                            </option>
                                            <option value="all" {{ 'all' == request('par-page') ? 'selected' : '' }}>
                                                {{ __('All') }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="card">
                            <div class="card-body pt-0">
                                <div class="row align-items-center flex-wrap">
                                    @forelse ($media_list as $media)
                                        <div class="col-md-6 col-lg-4 col-xxl-3">
                                            <div class="media_item position-relative" data-id="{{ $media->id }}">
                                                <img class="rounded select-media-for-delete"
                                                    src="{{ asset($media->path) }}" alt="{{ $media->atl_text }}">
                                                <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                    onclick="deleteData({{ $media->id }})"
                                                    class="destroy rounded-circle p-2 position-absolute"><i
                                                        class="fas fa-trash"></i>
                                                </a>
                                                <a href="javascript:;" onclick="viewModal({{ $media->id }})"
                                                    class="preview rounded-circle p-2 position-absolute"><i
                                                        class="fas fa-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-12 d-flex justify-content-center flex-column align-items-center">
                                            <img src="{{ asset('backend/img/empty-box.png') }}"
                                                alt="{{ __('No data found!') }}" width="200px">
                                            <h4 class="py-2">{{ __('No data found!') }}</h4>
                                        </div>
                                    @endforelse
                                </div>
                                @if (request()->get('par-page') !== 'all')
                                    <div class="float-start mt-5">
                                        {{ $media_list->onEachSide(3)->links() }}
                                    </div>
                                @endif
                                <button type="button" class="btn btn-danger delete-multiple my-3"
                                    disabled>{{ __('Delete Selected Image') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    {{-- View modal --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="viewModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body" id="viewData">

                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <a id="mediaEditBtn" href="" type="submit" class="btn btn-primary">{{ __('Edit') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .select-media-for-delete {
            border-width: 3px;
        }

        .upload_dropZone {
            color: #0f3c4b;
            outline: 2px dashed #2046da;
            /* outline-offset: -12px; */
            transition:
                outline-offset 0.2s ease-out,
                outline-color 0.3s ease-in-out,
                background-color 0.2s ease-out;
        }

        .upload_dropZone.highlight {
            outline-offset: -4px;
            outline-color: #2046da;
            background-color: #acb5f6;
        }

        .upload_svg {
            fill: var(#2046da, #acb5f6);
        }

        .upload_img {
            width: 100px;
            height: 100px;
            object-fit: cover;
        }

        .media_item {
            height: 230px;
            z-index: 1;
            overflow: hidden;
            border-radius: 5px;
            margin-top: 25px;
            cursor: pointer;
        }



        .media_item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: relative;
        }

        .media_item::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0);
            z-index: 2;
            transition: all .3s ease-in-out;
        }

        .media_item:hover::after {
            background: rgba(0, 0, 0, 0.4);
        }

        .preview,
        .destroy {
            right: 15px;
            width: 35px;
            height: 35px;
            line-height: 35px;
            background: #fff;
            padding: 0px !important;
            text-align: center;
            color: #0d6efd;
            top: 6px;
            right: 6px;
            z-index: 999;
            cursor: pointer;
            opacity: 0;
            transition: .3s ease-in-out;
        }


        .preview i,
        .destroy i {
            margin: 0px !important;
        }


        .destroy {
            left: 6px;
            color: red;
        }

        .preview:hover {
            background: #0d6efd;
            color: #fff;
        }

        .destroy:hover {
            background: red;
            color: #fff;
        }

        .media_item:hover .preview,
        .media_item:hover .destroy {
            opacity: 1;
        }

        .border-primary::before {
            border-color: #2046da !important;
            content: '\f00c';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100px;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            font-size: 25px;
            color: #000;
            background: #EEFB13 !important;
            border-radius: 50%;
            z-index: 9;
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
@push('js')
    <script>
        "use strict";

        function showLoader() {
            $("#loader").removeClass("d-none");
        }

        function hideLoader() {
            $("#loader").addClass("d-none");
        }

        function deleteData(id) {
            $("#deleteForm").attr("action", '{{ url('/admin/media/') }}' + "/" + id)
        }

        function viewModal(id) {
            showLoader();
            let link = '{{ url('/admin/media/') }}' + "/" + id;
            $.ajax({
                url: link,
                type: 'GET',
                success: function(response) {
                    if (response.success === true) {
                        let item = response.data;
                        $('#viewData').empty(); // Clear existing content before adding new content

                        $('#viewData').append(`
                        <img class="img-thumbnail w-100 mb-3"  src="{{ asset('') }}${item.path}" alt="${item.alt_text}">
                        <p class="mb-1"><b>{{ __('Title') }}: </b>${item.title}</p>
                        <p class="mb-1"><b>{{ __('Image Path') }}: </b><span class="text-primary">{{ asset('') }}${item.path}</span></p>
                        <p class="mb-1"><b>{{ __('Mime type') }}: </b>${item.mime_type}</p>`);

                        $("#mediaEditBtn").attr('href', link + '/edit');
                        $("#viewModal").modal('show');
                    }
                    hideLoader();
                },
                error: function(error) {
                    hideLoader();
                }
            });
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {

            const preventDefaults = (event) => {
                event.preventDefault();
                event.stopPropagation();
            };

            const clearHistory = () => {
                $('#upload_image_background').val(''); // Clear input value
                $('.upload_gallery').html(''); // Clear gallery
                $('#upload_form')[0].reset(); // Reset the form
            };

            $('#clear_data').on('click', () => {
                clearHistory();
            });

            const highlight = (event) => {
                $(event.target).addClass('highlight');
            };

            const unhighlight = (event) => {
                $(event.target).removeClass('highlight');
            };

            const getInputAndGalleryRefs = (element) => {
                const zone = $(element).closest('.upload_dropZone') || false;
                const gallery = zone.find('.upload_gallery') || false;
                const input = zone.find('input[type="file"]') || false;
                return {
                    input: input,
                    gallery: gallery
                };
            };

            const handleDrop = (event) => {
                const dataRefs = getInputAndGalleryRefs(event.target);
                dataRefs.files = event.originalEvent.dataTransfer.files;
                handleFiles(dataRefs);
            };

            const eventHandlers = (zone) => {
                const dataRefs = getInputAndGalleryRefs(zone);
                if (!dataRefs.input) return;

                // Prevent default drag behaviors
                ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(event => {
                    $(zone).on(event, preventDefaults);
                    $('body').on(event, preventDefaults);
                });

                // Highlighting drop area when item is dragged over it
                ['dragenter', 'dragover'].forEach(event => {
                    $(zone).on(event, highlight);
                });
                ['dragleave', 'drop'].forEach(event => {
                    $(zone).on(event, unhighlight);
                });

                // Handle dropped files
                $(zone).on('drop', handleDrop);

                // Handle browse selected files
                $(dataRefs.input).on('change', (event) => {
                    dataRefs.files = event.target.files;
                    handleFiles(dataRefs);
                });
            };

            // Initialise ALL dropzones
            const dropZones = $('.upload_dropZone');
            dropZones.each(function() {
                eventHandlers(this);
            });

            // No 'image/gif' or PDF or webp allowed here, but it's up to your use case.
            // Double checks the input "accept" attribute
            const isImageFile = (file) => ['image/jpeg', 'image/png', 'image/svg+xml'].includes(file.type);

            let imgId = 1;
            const previewFiles = (dataRefs) => {
                if (!dataRefs.gallery) return;
                for (const file of dataRefs.files) {
                    const reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onloadend = function() {
                        const img = $('<img>').addClass('upload_img mt-2 mx-2').attr('alt', file.name).attr(
                            'src', reader.result);
                        dataRefs.gallery.append(img);
                    };
                }
            };

            const imageUpload = (dataRefs) => {
                showLoader();
                // Multiple source routes, so double-check validity
                if (!dataRefs.files || !dataRefs.input) return;

                const formData = new FormData();
                for (const file of dataRefs.files) {
                    formData.append('images[]', file);
                }

                $.ajax({
                    url: "{{ route('admin.media.store') }}",
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.success === true) {
                            clearHistory();
                            toastr.success(response.message)
                            location.reload();
                        }
                        hideLoader();
                    },
                    error: function(error) {
                        let messages = error.responseJSON;
                        console.log(messages)
                        $.each(messages.errors, function(index, value) {
                            toastr.error(value)
                        })
                        hideLoader();
                    }
                });
            };

            const handleFiles = (dataRefs) => {
                let files = [...dataRefs.files];
                // Remove unaccepted file types
                files = files.filter(item => {
                    if (!isImageFile(item)) {
                        console.log('Not an image, ', item.type);
                    }
                    return isImageFile(item) ? item : null;
                });

                if (!files.length) return;
                dataRefs.files = files;

                previewFiles(dataRefs);
                imageUpload(dataRefs);
            };
        });

        let deleteImageList = [];
        //select media image for delete
        $(document).on('click', '.media_item', function() {
            let id = $(this).attr('data-id');



            let existingSelectImageId = deleteImageList.findIndex(item => item === id);

            if (existingSelectImageId !== -1) {
                deleteImageList.splice(existingSelectImageId, 1);

                $(this).removeClass('border-primary');
            } else {
                deleteImageList.push(id);
                $(this).addClass('border-primary');

            }

            $('.delete-multiple').prop('disabled', deleteImageList.length > 0 ? false : true);
        });

        //select media image for delete
        $(document).on('click', '.delete-multiple', function() {
            $('.delete-multiple').prop('disabled', true);
            showLoader();
            $.ajax({
                url: "{{ route('admin.media.multi.delete') }}",
                type: 'DELETE',
                data: {
                    id_list: deleteImageList
                },
                success: function(response) {
                    if (response.success === true) {
                        toastr.success(response.message)
                        location.reload();
                    }
                    hideLoader();
                },
                error: function(error) {
                    let messages = error.responseJSON;
                    $.each(messages.errors, function(index, value) {
                        //
                    });
                    hideLoader();
                    $('.delete-multiple').prop('disabled', true);
                }
            });
        });
    </script>
@endpush
