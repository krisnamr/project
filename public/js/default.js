$(document).ready(function(){
    $('[data-toggle="offcanvas"]').click(function(){
        $('#side-menu').toggleClass('hidden-xs');
    });
});

// Summernote
$('.summernote').summernote({
    height:200
})

