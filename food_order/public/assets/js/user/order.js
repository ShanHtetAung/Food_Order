$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    // Handle click on delete button
    $("#orderList").on("click", ".btnOrder", function () {
        console.log("order");
        $orderList = [];
        $random = Math.floor(Math.random() * 1000000 + 1);
        $(".cart tbody tr").each(function (index, row) {
            $orderList.push({
                user_id: $(row).find("#userId").val(),
                product_id: $(row).find("#productId").val(),
                quantity: $(row).find("#qty").val(),
                price: parseInt(
                    $(row).find("#total").text().replace("kyats", "")
                ),
                order_code: "POS" + $random,
            });
        });
        console.log($orderList);
        $data = Object.assign({}, $orderList);
        console.log($data);
        $.ajax({
            method: "GET",
            url: `order/list/`,
            data: { data: $data },
            dataType: "json",
            success: function (response) {
                if (response.success) {
                    window.location.href = "http://127.0.0.1:8000/thank-u";
                }
            },
        });
    });

    $("#orderList").on("click", ".btnClear", function () {
        $(".cart tbody tr").remove();
        $(".totalPrice").html(0 + "kyats");
        $.ajax({
            method: "GET",
            url: `list/clear`,
            success: function (response) {
                if (response.success) {
                    window.location.href = "http://127.0.0.1:8000/";
                }
            },
        });
    });
});
