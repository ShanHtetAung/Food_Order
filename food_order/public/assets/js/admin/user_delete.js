function deleteUser(id) {
    if (confirm("Are you sure to delete this?")) {
        $.ajaxSetup({
            headers:
            {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/food/admin/user/delete/" + id,
            type: 'DELETE',
            success: function (result) {
                $("#" + result['tr']).remove();

                $('#user').DataTable().row("#" + result['tr']).remove().draw(false);
            }
        });
    }
}
