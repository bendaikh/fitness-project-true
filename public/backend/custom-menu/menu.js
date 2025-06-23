(function ($) {
    "use strict";
    $(document).ready(function () {
        $("#default-item-select").change(function () {
            var selectedOption = $(this).find("option:selected");
            var label = selectedOption.data("label") || "";
            var url = selectedOption.data("url") || "";
            $("#add_item_url").val(url);
            $("#add_item_name").val(label);

            if (url) {
                $("#custom_item").val(0);
                $("#add_item_url").prop("disabled", true);
            } else {
                $("#custom_item").val(1);
                $("#add_item_url").prop("disabled", false);
            }
        });

        // activate Nestable for list
        $("#nestable").nestable({ group: 1, maxDepth: 4 });
    });
})(jQuery);

function addMenuItem(e) {
    const button = e.target;
    const spinner = $(".item-spinner");
    $.ajax({
        data: {
            custom_item: $("#custom_item").val(),
            label: $("#add_item_name").val(),
            link: $("#add_item_url").val(),
            menu_id: $("#menu_id").val(),
            open_new_tab: $("#open_new_tab").is(":checked") ? 1 : 0,
        },

        url: addItemUrl,
        type: "POST",
        headers: {
            "X-CSRF-TOKEN": csrfToken,
        },
        beforeSend: function (xhr) {
            spinner.toggleClass("d-none");
            $(button).prop("disabled", true);
        },
        success: function (response) {
            if (response.success) {
                toastr.success(menus.addItem);
                window.location.reload();
            } else {
                toastr.error(menus.itemAddFailed);
            }
        },
        error: function (xhr, status, error) {
            handleFetchError(xhr);
        },
        complete: function () {
            spinner.toggleClass("d-none");
            $(button).prop("disabled", false);
        },
    });
}

function updateMenuName(e) {
    const button = e.target;
    $.ajax({
        data: {
            id: $("#menu_id").val(),
            name: $("#menu_name").val(),
            code: $("#language_code").val(),
        },

        url: menuNameUpdate,
        type: "POST",
        headers: {
            "X-CSRF-TOKEN": csrfToken,
        },
        beforeSend: function (xhr) {
            $(button).find("i").toggleClass("update-icon-rotate");
            $(button).prop("disabled", true);
        },
        success: function (response) {
            if (response.success) {
                toastr.success(menus.updated);
                window.location.reload();
            } else {
                toastr.error(menus.updateFailed);
            }
        },
        error: function (xhr, status, error) {
            handleFetchError(xhr);
        },
        complete: function () {
            $(button).find("i").toggleClass("update-icon-rotate");
            $(button).prop("disabled", false);
        },
    });
}
function updateMenu(e) {
    var data = $("#nestable").nestable("serialize");

    const button = e.target;
    const spinner = $(".menu-update-spinner");
    $.ajax({
        data: { data },

        url: menuUpdate,
        type: "POST",
        headers: {
            "X-CSRF-TOKEN": csrfToken,
        },
        beforeSend: function (xhr) {
            spinner.toggleClass("d-none");
            $(button).prop("disabled", true);
        },
        success: function (response) {
            if (response.success) {
                toastr.success(menus.updated);
            } else {
                toastr.error(menus.updateFailed);
            }
        },
        error: function (xhr, status, error) {
            handleFetchError(xhr);
        },
        complete: function () {
            spinner.toggleClass("d-none");
            $(button).prop("disabled", false);
        },
    });
}
function editMenuItem(id, label, link, custom_item, open_new_tab) {
    $("#update_item_name").val(label);
    $("#update_item_url").val(link).prop("readonly", !parseInt(custom_item));
    $("#update_item_id").val(id);
    $("#update_open_new_tab").prop("checked", Boolean(parseInt(open_new_tab)));
    $("#editModal").modal("show");
}
