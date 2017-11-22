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


    // $('#method').on('change', function () {
    //     $.ajax({
    //         type: "POST",
    //         data: {
    //             '_token': $('input[name="_token"]').val(),
    //             'address' : $('select[name="address"]').val(),
    //         },
    //         url: "/cart/method",
    //
    //         success: function (data) {
    //             // $("h4").append(data);
    //             console.log(data);
    //         },
    //         error: function () {
    //             $("h4").append('<p>Провал</p>');
    //         },
    //         complete: function () {
    //
    //         }
    //     })
    // })


    $('#method').change(function () {

        var method_id = $(this).val();

        if (method_id == 'address') {
            $('#content').html(
                '<div class="col-xs-5"><input type="text" name="city" class="form-control" placeholder="Город"></div>' +
                '<div class="col-xs-5"><input type="text" name="address_ship" class="form-control" placeholder="Адресс"></div>' +
                '<div class=""><input type="text" name="phone" class="form-control" placeholder="Введите номер телефона"></div>'
            );

        }
        if (method_id == 'new-post') {
            $('#content').html(
                '<div class="col-xs-5"><input type="text" name="city" class="form-control" placeholder="Город"></div>' +
                '<div class="col-xs-5"><input type="text" name="address_ship" class="form-control" placeholder="Номер Отделения"></div>' +
                '<div class=""><input type="text" name="phone" class="form-control" placeholder="Введите номер телефона"></div>'
            );

        }



    })


})