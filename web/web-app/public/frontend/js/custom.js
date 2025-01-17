$(document).ready(function() {

    loadCart();
    loadWishlist();

    function loadCart() {
        $.ajax({
            url: "/load-cart-data",
            method: "GET",
            success: function(response) {
                $('.cart-count').html('');
                $('.cart-count').html(response.count);
            }
        });
    }

    function loadWishlist() {
        $.ajax({
            url: "/load-wishlist-data",
            method: "GET",
            success: function(response) {
                $('.wishlist-count').html('');
                $('.wishlist-count').html(response.count);
            }
        });
    }

    $('.addToCartBtn').click(function(e) {
        e.preventDefault();

        var product_id = $(this).closest('.product_data').find('.prod_id').val();
        var product_qty = $(this).closest('.product_data').find('.qty-input').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "/add-to-cart",
            method: "POST",
            data: {
                'product_id': product_id,
                'product_qty': product_qty,
            },
            success: function(response) {
                Swal.fire(response.status);
                loadCart();
            }
        });
    });

    $('.addToWishlist').click(function(e) {
        e.preventDefault();

        var product_id = $(this).closest('.product_data').find('.prod_id').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "/add-to-wishlist",
            method: "POST",
            data: {
                'product_id': product_id,
            },
            success: function(response) {
                Swal.fire(response.status);
                loadWishlist();
            }
        });
    });

    $('.increment-btn').click(function(e) {
        e.preventDefault();

        var inc_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 10) {
            value++;
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });

    $('.decrement-btn').click(function(e) {
        e.preventDefault();

        var dec_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(dec_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });

    $('.delete-cart-item').click(function(e) {
        e.preventDefault();

        var product_id = $(this).closest('.product_data').find('.prod_id').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "delete-cart-item",
            method: "POST",
            data: {
                'product_id': product_id,
            },
            success: function(response) {
                window.location.reload();
                Swal.fire("", response.status, "success");
            }
        });
    });

    $('.remove-wishlist-item').click(function(e) {
        e.preventDefault();

        var product_id = $(this).closest('.product_data').find('.prod_id').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "delete-wishlist-item",
            method: "POST",
            data: {
                'product_id': product_id,
            },
            success: function(response) {
                window.location.reload();
                Swal.fire("", response.status, "success");
            }
        });
    });

    $('.changeQuantity').click(function(e) {
        e.preventDefault();

        var product_id = $(this).closest('.product_data').find('.prod_id').val();
        var product_qty = $(this).closest('.product_data').find('.qty-input').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        data = {
            'product_id': product_id,
            'product_qty': product_qty,
        }

        $.ajax({
            method: 'POST',
            url: "update-cart",
            data: data,
            success: function(response) {
                window.location.reload();
            }
        });
    });
});
