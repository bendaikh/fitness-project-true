@extends('admin.master_layout')
@section('title')
    <title>{{ __('Edit Product Variation') }}</title>
@endsection

@push('css')
    <style>
        .tagify.form-control.tags {
            height: auto;
        }

        .tag {
            padding-top: 5px;
        }
    </style>
@endpush
@section('admin-content')
    <div class="main-content">
        <section class="section">

            <x-admin.breadcrumb title="{{ __('Edit Product Variation') }}" :list="[
                __('Dashboard') => route('admin.dashboard'),
                __('Product List') => route('admin.product.index'),
                __('Product Variant List') => route('admin.product-variant', $product->id),
                __('Edit Product Variation') => '#',
            ]" />

            <div class="section-body">
                <div class="mt-4 row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>{{ __('Edit Product Variation') }}</h4>
                                <div>
                                    <a href="{{ route('admin.product-variant', $product->id) }}" class="btn btn-primary"><i
                                            class="fa fa-arrow-left"></i> {{ __('Back') }}</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.product-variant.update', $variant->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-8 row offset-2">
                                            <div class="col-md-12">

                                                <div class="attributes_variations row">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Selling Price</th>
                                                                <th>SKU</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div
                                                                        class="d-flex justify-content-between align-items-center">
                                                                        <input type="text"
                                                                            class="form-control selling-price"
                                                                            name="selling_price"
                                                                            value="{{ $variant->price }}"
                                                                            placeholder="Enter Selling Price">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control sku"
                                                                        name="sku" value="{{ $variant->sku }}"
                                                                        placeholder="Enter SKU">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="text-center offset-md-2 col-md-8">
                                            <x-admin.update-button :text="__('Update')">
                                            </x-admin.update-button>
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
