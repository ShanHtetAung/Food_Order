$(document).ready(function () {
    if (parseInt(parseInt($("#qty").val())) == 1) {
        $(".btn-minus").prop("disabled", true);
    } else if (parseInt(parseInt($("#qty").val())) != 1) {
        $(".btn-minus").show();
    }
    $(".btn-plus").click(function () {
        $parentNode = $(this).parents("tr");
        $productPrice = $parentNode.find("#product_price").text().replace("kyats", "") * 1;
        $quantity = parseInt($parentNode.find("#qty").val()) + 1;
        $qty = parseInt($parentNode.find("#qty").val($quantity));
        if (parseInt(parseInt($parentNode.find("#qty").val())) == 1) {
            $parentNode.find(".btn-minus").prop("disabled", true);
        } else if (parseInt(parseInt($parentNode.find("#qty").val())) != 1) {
            $parentNode.find(".btn-minus").prop("disabled", false);
        }
        $total = parseInt($parentNode.find("#total").text().replace("kyats", ""));
        $total = $productPrice * $quantity;
        $total = parseInt($parentNode.find("#total").text($total + " kyats"));
        summaryCalculation();
    });

    $(".btn-minus").click(function () {
        $parentNode = $(this).parents("tr");
        $productPrice = $parentNode.find("#product_price").text().replace("kyats", "") * 1;
        $quantity = parseInt($parentNode.find("#qty").val()) - 1;
        $qty = parseInt($parentNode.find("#qty").val($quantity));
        if (parseInt(parseInt($parentNode.find("#qty").val())) == 1) {
            $parentNode.find(".btn-minus").prop("disabled", true);
        } else if (parseInt(parseInt($parentNode.find("#qty").val())) != 1) {
            $parentNode.find(".btn-minus").prop("disabled", false);
        }
        $total = parseInt($parentNode.find("#total").text().replace("kyats", ""));
        $total = $productPrice * $quantity;
        $total = parseInt($parentNode.find("#total").text($total + " kyats"));
        summaryCalculation();
    });

    function summaryCalculation() {
        $totalPrice = 0;
        $(".cart tbody tr").each(function (index, row) {
            $totalPrice += parseInt(
                $(row).find("#total").text().replace("kyats", "")
            );
        });
        $(".totalPrice").html($totalPrice + "kyats");
    }
});
