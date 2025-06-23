"use strict";
/** On DOM load */
$(document).ready(function () {
    //place order
    $(document).on("click", ".place-order-btn", function (e) {
        e.preventDefault();
        const method = $(this).data("method");
        $.ajax({
            url: `${base_url}/place-order/${method}`,
            type: "POST",
            dataType: "json",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
            },
            beforeSend: function () {
                $("#show_currency_notifications .alert-warning").addClass(
                    "d-none"
                );
                $('.preloader_area').removeClass('d-none')
            },
            success: (response) => {
                if (response.success) {
                    window.location.href = `${base_url}/payment?invoice_id=${response.invoice_id}`;
                } else {
                    if (response.supportCurrency) {
                        $("#show_currency_notifications .alert-warning")
                            .html(response.supportCurrency)
                            .removeClass("d-none");
                    }
                    toastr.warning(response.message);
                    $('.preloader_area').addClass("d-none");
                }
            },
            error: (error) => {
                const errorMessage = error.responseJSON?.message;
                toastr.error(errorMessage);
                $('.preloader_area').addClass("d-none");
            },
        });
    });
});
