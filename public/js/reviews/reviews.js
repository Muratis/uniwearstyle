$(document).ready(function(){
    $("#submit_review").on('click', function () {

        // if ($('.user_name').val() == '') {
        //     $('.sd').append('dsfsdf');
        //     return false;
        // } else {
        //     return true;
        // }

        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name="_token"]').val(),
                'name' : $('input[name="name"]').val(),
                'text' : $('textarea[name="text"]').val(),
            },
            url: "/review/add",

            success: function () {
                $("#succes_review").show(1000);
            },

    })
  })

})
