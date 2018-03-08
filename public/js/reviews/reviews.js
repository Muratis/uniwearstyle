$(document).ready(function(){
    $("#submit_review").on('click', function () {
        
        $.ajax({
            type: "POST",
            data: {
                '_token': $('input[name="_token"]').val(),
                'name' : $('input[name="name"]').val(),
                'text' : $('textarea[name="text"]').val(),
            },
            url: "/review/add",

            success: function () {
                $('input[name="name"]').val('');
                $('textarea[name="text"]').val('');
                $("#succes_review").show(1000);
            },

    })
  })

})
