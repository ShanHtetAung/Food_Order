function deleteContactList(id) {
    if (confirm("Are you sure to delete this?")) {
        $.ajaxSetup({
            headers:
            {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/food/admin/user/contact_list_delete/" + id,
            type: 'DELETE',
            success: function (result) {
                $("#" + result['tr']).remove();

                $('#contact_list').DataTable().row("#" + result['tr']).remove().draw(false);
            }
        });
    }
}
