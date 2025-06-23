<script>
    var menus = {
        "deleteFailed" : '{{__("Delete Failed")}}',
        "updateFailed" : '{{__("Update Failed")}}',
        "addItem" : '{{__("Item Added Successfully")}}',
        "itemAddFailed" : '{{__("Item failed to add")}}',
        "updateItem" : '{{__("Item Updated Successfully")}}',
        "deleteItem" : '{{__("Item deleted successfully")}}',
        "deleteItemAlert" : '{{__("Do you want to delete this item ?")}}',
        "updated" : '{{__("Updated Successfully")}}',
        "failed" : '{{__("Operation Failed")}}',
    };
    var menuNameUpdate = '{{ route("admin.menu-name.update") }}';
    var menuUpdate = '{{ route("admin.custom-menu.update") }}';
    var addItemUrl = '{{ route("admin.custom-menu.items.create") }}';
    
    var csrfToken = "{{ csrf_token() }}";
</script>