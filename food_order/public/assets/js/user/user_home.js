$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$(".filter-category").on("click", function () {
    var categoryId = $(this).data("id");
    $.ajax({
        url: "/user/filter/" + categoryId,
        type: "GET",
        success: function (response) {
            // Handle the response and update the content
            updateProductsContainer(response.products);
        },
        error: function (error) {
            console.error("Error:", error);
        },
    });
});

// search function
$("#searchBtn").on("click", function () {
    var query = $("#searchInput").val();
    searchProducts(query);
});

function searchProducts(query) {
    $.ajax({
        url: "/search",
        type: "GET",
        data: {
            query: query,
        },
        success: function (response) {
            updateProductsContainer(response.products);
        },
        error: function (error) {
            console.error("Error:", error);
        },
    });
}

// for show all button
$('.filter-category[data-id="all"]').on("click", function () {
    showAllProducts();
});

function showAllProducts() {
    $.ajax({
        url: "/show-all-products",
        type: "GET",
        success: function (response) {
            updateProductsContainer(response.products);
        },
        error: function (error) {
            console.error("Error:", error);
        },
    });
}

// add to cart event
$("#productsContainer, .order-now-form").on("click", ".add-to-cart, .order-now-btn", function () {
    var productId = $(this).data("product-id");
    var quantity = 1;

    if (isAuthenticated === true) {
        $.ajax({
            url: "/add-to-cart",
            type: "POST",
            data: {
                product_id: productId,
                quantity: quantity,
            },
            success: function (response) {
                alert(response.message);
                $('#cartCount').html(response.cartCount);
            },
            error: function (error) {
                console.error("Error:", error);
            },
        });
    } else {
        window.location.href = "http://127.0.0.1:8000/login";
    }
});

// to update the content when using ajax
function updateProductsContainer(data) {
    var productsContainer = $("#productsContainer");
    productsContainer.empty(); // Clear existing content

    if (data.length === 0) {
        productsContainer.append(
            '<p class="text-danger text-center fs-3">Coming soon.....</p>'
        );
    } else {
        $.each(data, function (index, product) {
            var imagePath = "storage/product/" + product.image;
            var productCard = $("<div>").addClass(
                "col-lg-4 col-md-4 col-sm-12"
            );
            var cardContainer = $("<div>").addClass(
                "card mb-4 rounded-4 shadow-lg bg-color border-0"
            );
            var cardBody = $("<div>").addClass("card-body text-center");

            // Image
            var img = $("<img>").attr({
                src: imagePath,
                alt: product.name,
                width: 200,
                height: 200,
            });

            // Card Header
            var cardHeader = $("<div>").addClass("card-header pt-2 pb-0 bg-0");
            var productName = $("<h5>").addClass("").text(product.name);

            // Price
            var price = $("<span>")
                .addClass("font-monospace")
                .text(product.price + " kyats");

            // Add to Cart Button
            var addToCartBtn = $("<a>")
                .attr("href", "javascript:void(0);")
                .addClass("add-to-cart btn btn-danger col-12 float-end mt-2")
                .data("product-id", product.id)
                .text("Add to Cart")
                .append($("<i>").addClass("fa-solid fa-cart-plus"));

            // Appending elements
            cardHeader.append(productName);
            cardBody.append(img, cardHeader, price, addToCartBtn);
            cardContainer.append(cardBody);
            productCard.append(cardContainer);

            productsContainer.append(productCard);
        });
    }
}
