$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    // Handle click on delete button
    $("#cartList").on("click", ".btnRemove", function () {
        const cartId = $(this).data("id");
        console.log(cartId);
        $.ajax({
            url: `delete/${cartId}`,
            method: "DELETE",
            data: {
                id: cartId,
                _token: $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                if (response.success) {
                    alert("Are you sure to delete this?");
                    $(".cart")
                        .DataTable()
                        .row($(`[data-id="${cartId}"]`).closest("tr"))
                        .remove()
                        .draw(false);
                    summaryCalculation();
                }
            },
        });
    });

    function summaryCalculation() {
        $totalPrice = 0;
        $(".cart tbody tr").each(function (index, row) {
            console.log(index + "///" + row);
            $totalPrice += parseInt(
                $(row).find("#total").text().replace("kyats", "")
            );
            console.log($totalPrice);
        });
        $(".totalPrice").html($totalPrice + "kyats");
    }
});
