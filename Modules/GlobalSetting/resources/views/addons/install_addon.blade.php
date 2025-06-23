@extends('admin.master_layout')
@section('title')
    <title>{{ __('Install Addon') }}</title>
@endsection
@section('admin-content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('admin.settings') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>{{ __('Install Addon') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item active"><a href="{{ route('admin.settings') }}">{{ __('Settings') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __('Install Addon') }}</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ __('Install Addon') }}</h4>
                                <div class="card-header-action">
                                    @adminCan('addon.view')
                                        <a href="{{ route('admin.addons.view') }}" class="btn btn-success"><i
                                                class="fas fa-plug"></i>
                                            {{ __('Manage Addons') }}</a>
                                    @endadminCan
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="box">
                                            <form id="updateForm" method="POST" enctype="multipart/form-data"
                                                class="d-flex justify-content-center">
                                                <input class="drag-input" type="file" data_btn_text="Browse"
                                                    placeholder="drag and drop file here" accept="application/zip"
                                                    name="zip_file" />
                                                <button type="submit" class="btn btn-primary upload-btn"><i
                                                        class="fa fa-upload"></i>
                                                    {{ __('Upload') }}</button>
                                            </form>
                                            <div class="progress mt-3 d-none">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                    role="progressbar" aria-valuenow="5" aria-valuemin="0"
                                                    aria-valuemax="100">0%</div>
                                            </div>
                                        </div>
                                    </div>

                                    @if ($addonFiles)
                                        <div class="mt-3 col-12">
                                            <hr>
                                            @foreach ($addonFiles as $fileName => $jsonInfo)
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                @if (is_object($jsonInfo))
                                                                    <p>{{ __('Name') }}: {{ $jsonInfo->name }}</p>
                                                                    <p>{{ __('Description') }}:
                                                                        {{ $jsonInfo->description }}
                                                                    </p>
                                                                    <p>{{ __('Author') }}:
                                                                        {{ $jsonInfo?->author?->name }}
                                                                    </p>
                                                                    <p>{{ __('Email') }}:
                                                                        {{ $jsonInfo?->author?->email }}
                                                                    </p>
                                                                    <p>{{ __('version') }}: {{ $jsonInfo->version }}</p>
                                                                    <p>{{ __('Last Update') }}:
                                                                        {{ $jsonInfo->last_update }}
                                                                    </p>
                                                                @endif
                                                            </div>

                                                            <div class="col-12">
                                                                <div
                                                                    class="d-flex justify-items-center justify-content-between ">
                                                                    <form
                                                                        action="{{ route('admin.addons.install.start') }}"
                                                                        method="post" id="installForm" class="installForm">
                                                                        @csrf
                                                                        <button class="btn btn-primary">
                                                                            {{ __('Start Install Process') }}
                                                                        </button>
                                                                    </form>

                                                                    <a href="javascript:;" data-bs-toggle="modal"
                                                                        data-bs-target="#deleteModal" onclick="deleteData()"
                                                                        class="btn btn-danger">{{ __('Delete Update File') }}</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
    <x-admin.delete-modal />

    <div tabindex="-1" role="dialog" id="verificationModal" class='modal fade'>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Addon Purchase Key') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="purchase_key" class="form-control">
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <x-admin.button variant="success" type="button" text="{{ __('Install') }}" id="verifyButton" />
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .kwt-file__drop-area {
            position: relative;
            display: flex;
            align-items: center;
            width: 280px;
            padding: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.07);
            transition: 0.3s;
        }

        .kwt-file__drop-area.is-active {
            background-color: #d1def0;
        }

        .kwt-file__choose-file {
            flex-shrink: 0;
            background-color: #1d3557;
            margin-right: 10px;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .kwt-file__choose-file.kwt-file_btn-text {
            border-radius: 4px;
            width: auto;
            height: auto;
            padding: 10px 20px;
            font-size: 14px;
        }

        .kwt-file__msg {
            color: #1d3557;
            font-size: 16px;
            font-weight: 400;
            line-height: 1.4;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .kwt-file__input {
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            cursor: pointer;
            opacity: 0;
        }

        .kwt-file__input:focus {
            outline: none;
        }

        .kwt-file__delete {
            display: none;
            position: absolute;
            right: 10px;
            width: 18px;
            height: 18px;
            cursor: pointer;
        }

        .kwt-file__delete:before {
            content: "";
            position: absolute;
            left: 0;
            transition: 0.3s;
            top: 0;
            z-index: 1;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg fill='%231d3557' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 438.5 438.5'%3e%3cpath d='M417.7 75.7A8.9 8.9 0 00411 73H323l-20-47.7c-2.8-7-8-13-15.4-18S272.5 0 264.9 0h-91.3C166 0 158.5 2.5 151 7.4c-7.4 5-12.5 11-15.4 18l-20 47.7H27.4a9 9 0 00-6.6 2.6 9 9 0 00-2.5 6.5v18.3c0 2.7.8 4.8 2.5 6.6a8.9 8.9 0 006.6 2.5h27.4v271.8c0 15.8 4.5 29.3 13.4 40.4a40.2 40.2 0 0032.3 16.7H338c12.6 0 23.4-5.7 32.3-17.2a64.8 64.8 0 0013.4-41V109.6h27.4c2.7 0 4.9-.8 6.6-2.5a8.9 8.9 0 002.6-6.6V82.2a9 9 0 00-2.6-6.5zm-248.4-36a8 8 0 014.9-3.2h90.5a8 8 0 014.8 3.2L283.2 73H155.3l14-33.4zm177.9 340.6a32.4 32.4 0 01-6.2 19.3c-1.4 1.6-2.4 2.4-3 2.4H100.5c-.6 0-1.6-.8-3-2.4a32.5 32.5 0 01-6.1-19.3V109.6h255.8v270.7z'/%3e%3cpath d='M137 347.2h18.3c2.7 0 4.9-.9 6.6-2.6a9 9 0 002.5-6.6V173.6a9 9 0 00-2.5-6.6 8.9 8.9 0 00-6.6-2.6H137c-2.6 0-4.8.9-6.5 2.6a8.9 8.9 0 00-2.6 6.6V338c0 2.7.9 4.9 2.6 6.6a8.9 8.9 0 006.5 2.6zM210.1 347.2h18.3a8.9 8.9 0 009.1-9.1V173.5c0-2.7-.8-4.9-2.5-6.6a8.9 8.9 0 00-6.6-2.6h-18.3a8.9 8.9 0 00-9.1 9.1V338a8.9 8.9 0 009.1 9.1zM283.2 347.2h18.3c2.7 0 4.8-.9 6.6-2.6a8.9 8.9 0 002.5-6.6V173.6c0-2.7-.8-4.9-2.5-6.6a8.9 8.9 0 00-6.6-2.6h-18.3a9 9 0 00-6.6 2.6 8.9 8.9 0 00-2.5 6.6V338a9 9 0 002.5 6.6 9 9 0 006.6 2.6z'/%3e%3c/svg%3e");
        }

        .kwt-file__delete:after {
            content: "";
            position: absolute;
            opacity: 0;
            left: 50%;
            top: 50%;
            width: 100%;
            height: 100%;
            transform: translate(-50%, -50%) scale(0);
            background-color: #1d3557;
            border-radius: 50%;
            transition: 0.3s;
        }

        .kwt-file__delete:hover:after {
            transform: translate(-50%, -50%) scale(2.2);
            opacity: 0.1;
        }
    </style>
@endpush

@push('js')
    <script>
        "use strict";

        function deleteData() {
            $("#deleteForm").attr("action", "{{ url('admin/settings/addons/delete') }}")
        }


        //drag and drop script
        (function($) {
            /**
             * Create drag and drop element.
             */
            var customDragandDrop = function(element) {
                $(element).addClass("kwt-file__input");
                var element = $(element).wrap(
                    `<div class="kwt-file"><div class="kwt-file__drop-area"><span class='kwt-file__choose-file ${
				element.attributes.data_btn_text
					? "" === element.attributes.data_btn_text.textContent
						? ""
						: "kwt-file_btn-text"
					: ""
			}'>Browse</span>${element.outerHTML}</span><span class="kwt-file__msg">${
				"" === element.placeholder ? "or drop files here" : `${element.placeholder}`
			}</span><div class="kwt-file__delete"></div></div></div>`
                );
                var element = element.parents(".kwt-file");

                // Add class on focus and drage enter event.
                element.on("dragenter focus click", ".kwt-file__input", function(e) {
                    $(this).parents(".kwt-file__drop-area").addClass("is-active");
                });

                // Remove class on blur and drage leave event.
                element.on("dragleave blur drop", ".kwt-file__input", function(e) {
                    $(this).parents(".kwt-file__drop-area").removeClass("is-active");
                });

                // Show filename when change file.
                element.on("change", ".kwt-file__input", function(e) {
                    let filesCount = $(this)[0].files.length;
                    let textContainer = $(this).next(".kwt-file__msg");
                    if (1 === filesCount) {
                        let fileName = $(this).val().split("\\").pop();
                        textContainer
                            .text(fileName)
                            .next(".kwt-file__delete")
                            .css("display", "block");
                    } else {
                        textContainer.text(
                            `${
						"" === this[0].placeholder
							? "or drop files here"
							: `${this[0].placeholder}`
					}`
                        );
                        $(this)
                            .parents(".kwt-file")
                            .find(".kwt-file__delete")
                            .css("display", "none");
                    }
                });

                // Delete selected file.
                element.on("click", ".kwt-file__delete", function(e) {
                    let deleteElement = $(this);
                    deleteElement.parents(".kwt-file").find(`.kwt-file__input`).val(null);
                    deleteElement
                        .css("display", "none")
                        .prev(`.kwt-file__msg`)
                        .text(
                            `${
						"" ===
						$(this).parents(".kwt-file").find(".kwt-file__input")[0].placeholder
							? "or drop files here"
							: `${ $(this).parents(".kwt-file").find(".kwt-file__input")[0].placeholder }`
					}`
                        );
                });
            };

            $.fn.kwtFileUpload = function(e) {
                var _this = $(this);
                $.each(_this, function(index, element) {
                    customDragandDrop(element);
                });
                return this;
            };
        })(jQuery);
        // Plugin initialize
        jQuery(document).ready(function($) {
            $(".drag-input").kwtFileUpload();


            $(document).on('submit', '#installForm', function(e) {
                e.preventDefault()
                $('#verificationModal').modal('show')
            })

            $(document).on('click', '#verifyButton', function(e) {
                e.preventDefault()
                const key = $('[name="purchase_key"]').val()
                $.ajax({
                    url: "{{ route('admin.addons.verify') }}",
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        key: key
                    },
                    beforeSend: function() {
                        $('#verifyButton').attr('disabled', 'disabled')
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#installForm').removeAttr('id', 'installForm').submit()
                        } else {
                            $('#verificationModal').modal('hide')
                            toastr.error(response.message)
                        }

                        $('#verifyButton').removeAttr('disabled')
                    },
                    error: function(data) {
                        handleFetchError(data);
                        $('#verifyButton').removeAttr('disabled')
                    }
                })
            })
        });

        let max_upload_size = "{{ $max_upload_size }}";
        let chunk_upload_size = 1 * 1024 * 1024;

        let resumable = new Resumable({
            target: '{{ route('admin.addons.store') }}',
            query: {
                _token: '{{ csrf_token() }}'
            },
            fileType: ['zip'],
            chunkSize: Math.min(max_upload_size, chunk_upload_size),
            headers: {
                'Accept': 'application/json'
            },
            testChunks: false,
            throttleProgressCallbacks: 1,
        });

        $('#updateForm').on('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const files = formData.getAll('zip_file');

            if (files.length > 0 && files[1]?.name) {
                resumable.addFile(files[1]);
            } else {
                toastr.error("{{ __('Invalid Update File Structure') }}");
            }
        });
        resumable.on('fileAdded', function(file) {
            showProgress();
            resumable.upload();
        });

        resumable.on('fileProgress', function(file) {
            updateProgress(Math.floor(file.progress() * 100));
        });

        resumable.on('fileSuccess', function(file, response) {
            toastr.success("{{ __('Uploaded successfully.') }}");
            window.location.href = "{{ route('admin.addons.install') }}"
        });

        resumable.on('fileError', function(file, response) {
            toastr.error("{{ __('Upload failed') }}");
        });

        let progress = $('.progress');
        let upload_btn = $('.upload-btn');

        function showProgress() {
            progress.find('.progress-bar').css('width', '0%');
            progress.find('.progress-bar').html('0%');
            progress.find('.progress-bar').removeClass('bg-success');
            progress.removeClass('d-none');
            upload_btn.attr('disabled', true).toggleClass('disabled');
        }

        function updateProgress(value) {
            progress.find('.progress-bar').css('width', `${value}%`)
            progress.find('.progress-bar').html(`${value}%`)

            if (value === 100) {
                progress.find('.progress-bar').addClass('bg-success');
            }
        }

        function hideProgress() {
            progress.addClass('d-none');
            upload_btn.attr('disabled', false).toggleClass('disabled');
        }
    </script>
@endpush
