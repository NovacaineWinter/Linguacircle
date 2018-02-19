

$(document).ready(function() {



    $(document).on('click','.notification-clickable',function() {

        if($(this).attr('target')){
            target = $(this).attr('target');
        }else{
            target = '';
        }

        $.ajax({
            url: "{{url('/ajaxContent')}}",
            method: 'GET',
            data: {
                ajaxmethod: $(this).attr('callback'),    
                target : target,                    
            },
            success: function(response) {
                $('#ajax-container').html(response);  
                $('.notipanel').slideUp(600);                 
            },
            error: function(response) {
                console.log('There was an error - it was:  '+response);
            }
        });


    });





});