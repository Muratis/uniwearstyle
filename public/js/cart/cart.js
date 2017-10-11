$(document).ready(function(){

    $("#add_cart").on('click', function () {
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name="_token"]').val(),
                'id' : $('input[id="ajax-id"]').val(),
                'image' : $('input[id="ajax-image"]').val(),
                'size' : $('select[name="size"]').val(),
                'name': $('h2[id="tshirt_name"]').text(),
                'price': $('span[id="price"]').text(),
               
            },
            url: "/cart",
    
            success: function () {
                // $("h2").append('<p>Товар успешно добавлен в корзину</p>')
                $(".successShop").show();
                $(".successShop").hide(3000);
                // location.reload();
                // $("h2").hide(3000)
            },
            error: function () {
                $("h2").append('<p>Провал</p>')
            },
            complete: function () {
                $("h2").append('<p></p>');
                // console.log(data)
            }
        })
    })

    



    $(".delete").on('click', function () {
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name="_token"]').val(),
                'rowId' : $(this).val(),
            },
            url: "/cart/remove",

            success: function () {
                location.reload();
            },
            error: function () {
                $("h2").append('<p>Провал</p>');
            },
            complete: function () {
                $("h2").append('<p></p>');
                // console.log(data)
            }
        })
    })


    // if($('select[name="shipping"]').val() == 'new') {
    //     $("h4").append('<p>Провал</p>')
    // }

})