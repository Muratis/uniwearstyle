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
            'gender': $('span[id="gender"]').text(),

        },
        url: "/cart",

        success: function () {
            location.reload();
            $(".successShop").show();
            $(".successShop").hide(4000);
        },
        error: function () {
            $("h2").append('<p>Провал</p>')
        },
        complete: function () {
            // location.reload();
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



    $('.ship_to_addres').hide();
    
    $('#method').change(function () {

        var method_id = $(this).val();

        if (method_id == 'address') {
            // $('form').trigger('reset');
            $('.ship_to_addres input').val('');
            $('.ship_to_nv').hide();
            $('.ship_to_addres').show();

        }
        if (method_id == 'new-post') {
            // $('form').trigger('reset');
            $('.ship_to_nv input').val('');
            $('.ship_to_addres').hide();
            $('.ship_to_nv').show();
        }

    })

    $("#city").on('keyup',function(){

        var $this = $(this);
        var $delay = 700;

        clearTimeout($this.data('timer'));

        $this.data('timer', setTimeout(function () {
            $this.removeData('timer');

            $.ajax({
                type: "GET",
                data: {
                    'city': $("#city").val(),
                },
                url: "/checkout/chandeotd",
                success: function (data) {
                    var npData = JSON.parse(data);
                    $("#warehouses").html('<select id="npCities" name="warehouse"></select>');
                    var $npCities = $("#warehouses").find("select#npCities");
                    $npCities.empty();
                    var cities = npData['data'];

                    for (var city in cities) {
                        var description = cities[city]["Description"];
                        $npCities.append("<option value='" + description + "'>" + description + "</option>");
                    }
                },
            });
        }, $delay));


    });


})