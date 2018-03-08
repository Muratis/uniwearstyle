



$(document).ready(function(){

  
    // $("#zoom").imageLens();

    // $(".product").hide();
    $(".off-product").hide();

    //
    $(".off-product").click(function() {
        $(".on-product").show();
        $(".off-product").hide();
        $(".product").show('blind',600);
    });
    //

    $(".on-product").click(function() {
        $(".off-product").show();
        $(".product").hide('blind',600);
        $(".on-product").hide();
    });

    /**
     *
     */

    // $(".sizes_product").hide();
    $(".off-sizes").hide();

    $(".off-sizes").click(function() {
        $(".on-sizes").show();
        $(".off-sizes").hide();
        $(".sizes_product").show('blind',600);
    });

    $(".on-sizes").click(function() {
        $(".off-sizes").show();
        $(".sizes_product").hide('blind',600);
        $(".on-sizes").hide();
    });

    /**
     *
     */
 
    
    $(".polo").click(function(){

        $.ajax({
            type: "GET",
            success: function () {
                    history.pushState(null, null, location.hash +'polo');

            },
            complete: function () {
                location.reload();
            }
        })


    })

    $(".tshirts").click(function(){

        $.ajax({
            type: "GET",
            success: function () {
                history.pushState(null, null, location.hash +'tshirt');
            },
            complete: function () {
                location.reload();
            }
        })

    })

    $(".hoodie").click(function(){

        $.ajax({
            type: "GET",
            success: function () {
                history.pushState(null, null, location.hash +'hoodie');
            },
            complete: function () {
                location.reload();
            }
        })

    })

    $(".sweatshirts").click(function(){

        $.ajax({
            type: "GET",
            success: function () {
                history.pushState(null, null, location.hash +'sweatshirt');
            },
            complete: function () {
                location.reload();
            }
        })

    })



    $(".bombers").click(function(){

        $.ajax({
            type: "GET",
            success: function () {
                history.pushState(null, null, location.hash +'bomber');
            },
            complete: function () {
                location.reload();
            }
        })

    })

    $(".all").click(function(){

        $.ajax({
            type: "GET",
            success: function () {
                history.pushState(null, null, location.hash +'all');
            },
            complete: function () {
                location.reload();
            }
        })

    })





    $(".filter_btn").on('click',function () {
        
        $.ajax({
            type: "GET",
            data: {
                'size_id': $(this).val(),
            },
            url: location,


            success: function (data) {
                $('.content').html(data);
                $(this).addClass('activeFilter ');
            },

        })
    })
    
})
