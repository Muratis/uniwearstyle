function l_image (a) {
    document.main_img.src = a;
    document.zoom_img.src = a;
}

$(document).ready(function() {

    l_image;

    $("#zoom").loupe({
        width: 300, // width of magnifier
        height: 300, // height of magnifier
        loupe: 'loupe' // css class for magnifier
    });

});