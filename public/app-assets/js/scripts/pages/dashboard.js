// $('.tr_change').on("mouseover", function (e){
//     var img_name = $(this).data("over");
//     $("#loaded_img").attr("src", img_name);
// });
// $(".tr_change").on('mouseleave', function() {
//     var img_name = $('#loaded_img').data("over");
//     $("#loaded_img").attr("src", img_name);
// });

$('.item_favourite').on('click', function(e){
    var id = $(this).data('id');
    var url = '/favourite/' + id;
    var favourite_num = $('.item__favourite_on').length;

    if (favourite_num < 6){
        $(this).hasClass('item__favourite_off') ? $('.item_favourite' + id).removeClass( "item__favourite_off" ).addClass( "item__favourite_on" ) : $('.item_favourite' + id).removeClass( "item__favourite_on" ).addClass( "item__favourite_off" );
        $('.favourite__link' + id).hasClass('d-block') ? $('.favourite__link' + id).removeClass('d-block').addClass('d-none') : $('.favourite__link' + id).removeClass('d-none').addClass('d-block');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: url,
            data: {favourite: 'on' }
        });
    }
    else if(favourite_num = 6 && $(this).hasClass('item__favourite_on')){
        $('.item_favourite' + id).removeClass( "item__favourite_on" ).addClass( "item__favourite_off" );
        $('.favourite__link' + id).hasClass('d-block') ? $('.favourite__link' + id).removeClass('d-block').addClass('d-none') : $('.favourite__link' + id).removeClass('d-none').addClass('d-block');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: url,
            data: {favourite: 'on' }
        });
    }
    else{
        alert('favourite"s max 3');
    }
});

$('.btn-columns').on('click', function(e){
    $('.btn-menu').removeClass('btn__default__page');
    $('.schema_table').hide();
    $('.btn-columns').addClass('btn__default__page');
    $('.column__table').show();
});

$('.btn-menu').on('click', function(e){            
    $('.btn-columns').removeClass('btn__default__page');
    $('.column__table').hide();
    $('.btn-menu').addClass('btn__default__page');
    $('.schema_table').show();
});


$('.btn-heart').on('click', function(e){          
      
    $(this).hasClass('btn_heart_off') ? $(this).removeClass( "btn_heart_off" ).addClass( "btn_heart_on" ) : $(this).removeClass( "btn_heart_on" ).addClass( "btn_heart_off");
    
    // $(this).hasClass('btn_heart_on') ? $('.item__favourite_off').parent().parent().hide() : $('.item__favourite_off').parent().parent().show();
    var default_price = Number($('.noUi-tooltip').text());
    var i = 0;

    if($(this).hasClass('btn_heart_on')){
        $('.item__favourite_off').parent().parent().hide()
    }
    else{
        for(i; i <= $('.item__favourite_off > .price__filter').length; i++){
            console.log($('.item__favourite_off > .price__filter:eq('+i+')').text());
            if(Number($('.item__favourite_off > .price__filter:eq('+i+')').text()) > default_price){
                $('.item__favourite_off > .price__filter:eq('+i+')').parent().parent().parent().hide();
            }
            else{
                $('.item__favourite_off > .price__filter:eq('+i+')').parent().parent().parent().show();

            }
        }
    }

});

$('#pips-range').on('click mouseover', function(e){
    var default_price = Number($('.noUi-tooltip').text());
    
    var i = 0;
    for(i; i <= $('.price__filter').length; i++){
        
        if(Number($('.price__filter:eq('+i+')').text()) > default_price){
            $('.price__filter:eq('+i+')').parent().parent().parent().hide()
        }
        else{
            if($('.btn-heart').hasClass('btn_heart_off')){
                $('.price__filter:eq('+i+')').parent().parent().parent().show()
            }
            else{
                $('.item__favourite_on > .price__filter:eq('+i+')').parent().parent().parent().show()
            }
            
        }
    }
    
})

$('#basicSelect').on('change', function(e){
    var val = $(this).val();
    window.location.href = '/category/' + val;            
});

$('.filter__room__one').on('click', function(e){
    var i = 0
    for(i; i< $('.item__room').length; i++){
        if($('.item__room:eq('+i+')').text() == '1.5'){
            $('.item__room:eq('+i+')').parent().parent().show();
        }
        else{
            $('.item__room:eq('+i+')').parent().parent().hide(); 
        }
    }
});
$('.filter__room__two').on('click', function(e){
    var i = 0
    for(i; i< $('.item__room').length; i++){
        if($('.item__room:eq('+i+')').text() == '2.5'){
            $('.item__room:eq('+i+')').parent().parent().show();
        }
        else{
            $('.item__room:eq('+i+')').parent().parent().hide(); 
        }
    }
});
$('.filter__room__three').on('click', function(e){
    var i = 0
    for(i; i< $('.item__room').length; i++){
        if($('.item__room:eq('+i+')').text() == '3.5'){
            $('.item__room:eq('+i+')').parent().parent().show();
        }
        else{
            $('.item__room:eq('+i+')').parent().parent().hide(); 
        }
    }
});
$('.filter__name__birke').on('click', function(e){
    var i = 0;
    for(i; i< $('.item__name').length; i++){
        if($('.item__name:eq('+i+')').text() == 'BIRKE'){
            $('.item__name:eq('+i+')').parent().parent().show();
        }
        else{
            $('.item__name:eq('+i+')').parent().parent().hide();
        }
    }
});
$('.filter__name__carolina').on('click', function(e){
    var i = 0;
    for(i; i< $('.item__name').length; i++){
        if($('.item__name:eq('+i+')').text() == 'CAROLINA'){
            $('.item__name:eq('+i+')').parent().parent().show();
        }
        else{
            $('.item__name:eq('+i+')').parent().parent().hide();
        }
    }
})