



$(document).ready(function(){

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
 
    
    $(".srt").click(function(){

        $.ajax({
            type: "GET",
            data: $("sr"),
            url: "/sort",

            success: function () {
                $("#sye").append('<p>Успех</p>')
            },
            error: function () {
                $("#sye").append('<p>Провал</p>')
            },
            complete: function () {
                $("#sye").append('<p>Выполнено</p>')
            }
        })

    })
    
    
})
