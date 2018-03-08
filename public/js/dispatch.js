$(document).ready(function(){

    $(function(){
        $('#change_dispatch').on('change', function(){
            if($('#change_dispatch').prop('checked')){
                $('.chande_university').show();
            }else{
                $('.chande_university').hide();
            }
        });
    });
    
})
