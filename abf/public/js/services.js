$( document ).ready(function() {
    $('.remove').click(function(){
        console.log('current_count');
        var current_count = $(this).attr('countt');
        var new_count = parseInt(current_count);
        
        $('.removee'+new_count).remove();
        
    });
});