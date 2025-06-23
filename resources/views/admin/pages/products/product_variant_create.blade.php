@extends('admin.master_layout')
@section('title')
    <title>{{ __('Create Product Variation') }}</title>
@endsection

@section('admin-content')
    <div class="main-content">
        <section class="section">
            <x-admin.breadcrumb title="{{ __('Create Product Variation') }}" :list="[
                __('Dashboard') => route('admin.dashboard'),
                __('Product List') => route('admin.product.index'),
                __('Product Variant List') => route('admin.product-variant', $product->id),
                __('Create Product Variation') => '#',
            ]" />
            <div class="section-body">
                <div class="mt-4 row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>{{ __('Create Product Variation') }}</h4>
                                <div>
                                    <a href="{{ route('admin.product-variant', $product->id) }}" class="btn btn-primary"><i
                                            class="fa fa-arrow-left"></i> {{ __('Back') }}</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.product-variant.store', $product->id) }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-8 row offset-2">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">{{ __('Attribute') }}<span
                                                            class="text-danger">*</span></label>
                                                    <select name="attribute" id="attribute" class="form-select select2"
                                                        multiple>
                                                        <option value="">{{ __('Select Attribute') }}</option>
                                                        @foreach ($attributes as $attribute)
                                                            <option value="{{ $attribute->id }}">{{ $attribute->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                    @error('attribute')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="attributes_values row">

                                                </div>

                                                <div class="attributes_variations row">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="text-center offset-md-2 col-md-8">
                                            <x-admin.save-button :text="__('Save')">
                                            </x-admin.save-button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @include('components.admin.preloader')
@endsection

@push('js')
    <script>
        (function($) {
            "use strict";
            $(document).ready(function() {
                $('[name="attribute"]').on('change', function() {

                    var attribute = $(this).val();
                    if (attribute) {
                        $('.preloader_area').removeClass('d-none');
                        $.ajax({
                            url: "{{ route('admin.attribute.get.value') }}",
                            type: 'POST',
                            data: {
                                _token: "{{ csrf_token() }}",
                                attribute: attribute,
                                product_id: "{{ $product->id }}"
                            },
                            success: function(response) {
                                $('.attributes_values').html('');
                                $.each(response.data, function(index, attribute) {
                                    let html = `
                                    <div class="col-4 mb-2">
                                        <input type="text" name='choice[]' value="${attribute.name}" class="form-control" readonly>
                                    </div>
                                    <div class="col-8 mb-2">
                                        <select name="choice_options_${attribute.id}[]" class="form-select select2 attr-multi-value" multiple>
                                `;
                                    $.each(attribute.values, function(index,
                                        value) {
                                        html +=
                                            `<option value="${value.name}">${value.name}</option>`;
                                    });

                                    html += `
                                        </select>
                                    </div>
                                `;

                                    // Append the generated HTML to a container
                                    $('.attributes_values').append(html);
                                    $('.attributes_variations').html('');
                                });

                                // After appending all select elements, initialize Select2
                                $('.select2').select2();
                                $('.preloader_area').addClass('d-none')
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                console.log(xhr);
                                $('.preloader_area').addClass('d-none')
                            }
                        });

                    }

                })
                $(document).on('change', '.attr-multi-value', function() {
                    // Initialize an empty array to store selected values
                    var selectedValues = [];

                    // Loop through each select element
                    $('.attr-multi-value').each(function(index, select) {
                        // Get the selected options for the current select element
                        var selectedOptions = $(select).val();

                        // If options are selected, add them to the selectedValues array
                        if (selectedOptions && selectedOptions.length > 0) {
                            selectedValues.push(selectedOptions);
                        }
                    });

                    if (selectedValues.length == 0) {
                        $('.attributes_variations').html('');
                        return;
                    }
                    // Create a variation table HTML
                    var variationTableHTML =
                        '<table class="table"><thead><tr><th>Variant</th><th>Selling Price</th><th>SKU</th></tr></thead><tbody>';
                    // Generate rows for each combination of selected values
                    selectedValues = cartesian(selectedValues);
                    $.each(selectedValues, function(index, combination) {
                        // Create a row for the combination
                        variationTableHTML += '<tr>';
                        variationTableHTML += '<td>' + combination.join('-') +
                            `<input type="hidden" name="variant[]" value="${combination.join('-')}">` +
                            '</td>'; // Variant column (joined if there are multiple)
                        variationTableHTML +=
                            `<td>
                                <input type="text" class="form-control selling-price" name="selling_price[]" placeholder="Enter Selling Price">
                        </td>

                    `;
                        const sku = "{{ $product->sku }}";
                        // Selling Price column with input
                        variationTableHTML +=
                            `<td><input type="text" class="form-control sku" name="sku[]" placeholder="Enter SKU" value="${combination.join('-').toUpperCase()}-${sku.toUpperCase()}"></td>`; // SKU column with input
                        variationTableHTML += '</tr>';
                    });

                    variationTableHTML += '</tbody></table>';

                    // Append the variation table HTML to a container
                    $('.attributes_variations').html(variationTableHTML);
                });
                // reset table if no attribute selected
                $(document).on('change', '#attribute', function() {
                    if ($(this).val() == '') {
                        $('.attributes_variations').html('');
                        $('.attributes_values').html('');
                    }
                });

                $('form').on('submit', function(e) {
                    var sellingPrice = $('.selling-price');
                    var sku = $('.sku');
                    var error = false;
                    sellingPrice.each(function(index, element) {
                        if ($(element).val() == '') {
                            error = true;
                            $(element).addClass('is-invalid');
                        } else {
                            $(element).removeClass('is-invalid');
                        }
                    });
                    sku.each(function(index, element) {
                        if ($(element).val() == '') {
                            error = true;
                            $(element).addClass('is-invalid');
                        } else {
                            $(element).removeClass('is-invalid');
                        }
                    });
                    if (error) {
                        e.preventDefault();
                        return false;
                    } else {
                        $(this).submit();
                    }
                });
            });

            function cartesian(arrays) {
                var result = [];
                var max = arrays.length - 1;

                function helper(arr, i) {
                    for (var j = 0, l = arrays[i].length; j < l; j++) {
                        var a = arr.slice(0); // clone arr
                        a.push(arrays[i][j]);
                        if (i == max)
                            result.push(a);
                        else
                            helper(a, i + 1);
                    }
                }
                helper([], 0);
                return result;
            }


        })(jQuery);
    </script>
@endpush
