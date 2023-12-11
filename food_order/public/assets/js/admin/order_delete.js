$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // Handle click on delete button
    $('#ordersList').on('click', '.deleteOrder', function () {
        const orderId = $(this).data('id');
        $.ajax({
            url: `/food/admin/order/delete/${orderId}`,
            method: 'DELETE',
            data: { id: orderId, _token: $('meta[name="csrf-token"]').attr('content') },
            success: function (response) {
                if (response.success) {
                    alert('Are you sure to delete this?');

                    $('#order').DataTable().row($(`[data-id="${orderId}"]`).closest('tr')).remove().draw(false);
                }
            },
        });
    });
});
