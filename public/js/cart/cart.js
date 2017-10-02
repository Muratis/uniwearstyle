$(document).ready(function(){

    $("#add_cart").on('click', function () {
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name="_token"]').val(),
                'tshirt_id' : $('input[id="ajax-tshirt-id"]').val(),
               
            },
            url: "/cart",
    
            success: function () {
                $("h2").append('<p>Товар успешно добавлен в корзину</p>')
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



    // $(".delete").on('click', function () {
    //     $.ajax({
    //         type: "GET",
    //         // data: {
    //         //     '_token': $('input[name="_token"]').val(),
    //         //     'tshirt_id' : $('input[id="ajax-tshirt-id"]').val(),
    //         //
    //         // },
    //         url: "/cart",
    //
    //         success: function () {
    //             $(".cl").append('<a href="{{Cart::remove($cart->rowId)}}">Убрать из корзины</a>')
    //         },
    //         error: function () {
    //             $(".cl").append('<p>Провал</p>')
    //         },
    //         complete: function () {
    //             $(".cl").append('<p>gfgfg</p>');
    //             // console.log(data)
    //         }
    //     })
    // })



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
                $("h2").append('<p>Провал</p>')
            },
            complete: function () {
                $("h2").append('<p></p>');
                // console.log(data)
            }
        })
    })
    
    
    

})