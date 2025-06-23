@forelse ($sliders as $key => $value)
    <div class="card">
        <div class="card-header">
            <h1>{{ __('Slider') }} {{ $key + 1 }}</h1>
        </div>
        <div class="card-body">
            <div class="row">
                @if ($loop->iteration > 1)
                    <div class="col-12 d-flex justify-content-end mb-3">
                        <button class="btn btn-danger btn-link remove_slider ms-2" type="button">
                            <i class="fas fa-times"></i>
                    </div>
                @endif
                <div class="col-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="slider_title[{{ $value->id }}]"
                            value="{{ $value->getTranslation($code)?->title }}" placeholder="Slider Title"
                            data-translate="true">
                    </div>
                </div>
                @if ($code == $languages->first()->code)
                    <div class="col-6">
                        <div class="form-group">
                            <input type="file" name="slider_image[{{ $value->id }}]" class="form-control ms-2"
                                placeholder="Slider Image" accept="image/*">
                        </div>
                    </div>
                @endif
                <div class="col-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="slider_subtitle_1[{{ $value->id }}]"
                            value="{{ $value->getTranslation($code)?->subtitle_1 }}" placeholder="Slider Sub Title 1"
                            data-translate="true">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="slider_subtitle_2[{{ $value->id }}]"
                            value="{{ $value->getTranslation($code)?->subtitle_2 }}" placeholder="Slider Sub Title 2"
                            data-translate="true">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <input type="text" class="form-control" name="button_text[{{ $value->id }}]"
                            value="{{ $value->getTranslation($code)?->button_text }}" placeholder="Button Text"
                            data-translate="true">
                    </div>
                </div>
                @if ($code == $languages->first()->code)
                    <div class="col-4">
                        <div class="form-group">
                            <input type="text" class="form-control" name="button_link[{{ $value->id }}]"
                                value="{{ $value->button_link }}" placeholder="Button Link">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <input type="text" class="form-control icp icp-auto"
                                name="button_icon[{{ $value->id }}]" value="{{ $value->button_icon }}"
                                placeholder="Button Icon">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <select name="home_page" id="" class="form-select">
                                <option value="{{ $value->home_page }}">
                                    {{ __('Home Page ') }}{{ $value->home_page }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <input type="text" class="form-control" name="order[{{ $value->id }}]"
                                value="{{ $value->order }}" placeholder="Order">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <select name="status[{{ $value->id }}]" id="" class="form-select">
                                <option value="1" @if ($value->status == 1) selected @endif>
                                    {{ __('Active') }}</option>
                                <option value="0" @if ($value->status == 0) selected @endif>
                                    {{ __('Inactive') }}</option>
                            </select>
                        </div>
                    </div>
                @else
                    <input type="hidden" name="status[{{ $value->id }}]" value="{{ $value->id }}">
                    <input type="hidden" name="home_page" value="{{ $value->home_page }}">
                @endif
            </div>
        </div>
    </div>
@empty
    <div class="card">
        <div class="card-header">
            <h1>{{ __('Slider') }} 1</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 d-flex justify-content-end mb-3">
                    <button class="btn btn-danger btn-link remove_slider ms-2" type="button">
                        <i class="fas fa-times"></i>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="slider_title[1]"
                            value="{{ old('slider_title[1]') }}" placeholder="Slider Title">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <input type="file" name="slider_image[1]" class="form-control ms-2"
                            placeholder="Slider Image" accept="image/*">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="slider_subtitle_1[1]"
                            value="{{ old('slider_subtitle_1[1]') }}" placeholder="Slider Sub Title 1">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="slider_subtitle_2[1]"
                            value="{{ old('slider_subtitle_2[1]') }}" placeholder="Slider Sub Title 2">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <input type="text" class="form-control" name="button_text[1]"
                            value="{{ old('button_text[1]') }}" placeholder="Button Text">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <input type="text" class="form-control" name="button_link[1]"
                            value="{{ old('button_link[1]') }}" placeholder="Button Link">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <input type="text" class="form-control icp icp-auto" name="button_button_icon[1]"
                            value="{{ old('button_button_icon[1]', 'fab fa-whatsapp') }}" placeholder="Button Icon">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <select name="home_page" id="" class="form-select">
                            <option value="{{ $home }}">
                                {{ __('Home Page ') }}{{ $home }}</option>
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <input type="text" class="form-control" name="order[1]" value=""
                            placeholder="Order">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <select name="status[1]" id="" class="form-select">
                            <option value="1" @if (old('status[1]') == 1) selected @endif>
                                {{ __('Active') }}</option>
                            <option value="0" @if (old('status[1]') == 0) selected @endif>
                                {{ __('Inactive') }}</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforelse
