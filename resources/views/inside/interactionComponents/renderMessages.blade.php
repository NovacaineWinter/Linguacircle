 <div id="messagesContent">
	<div class="noti-panel-inner">
		
		<h1>Messages</h1>
		<div class="col-xs-6 interaction-header-button active-button">All</div>
		<div class="col-xs-6 interaction-header-button">Unread</div>	
		<div style="height:35px;"></div>
		@foreach($user->conversations as $conv)
			@if($conv->messages->count()>0)

				<div class="row-1 notification-clickable @if($conv->pivot->unread) unread @endif " callback="viewConversationStream" target="{{{$conv->id}}}">
			    	<div class="row-1-img">
			        	<img src="{{{$conv->messages->first()->user->profileThumbUrl()}}}" alt="user" />
			        </div>
			        <div class="row-1-text">
			        	<h3>{{{$conv->messages->first()->user->name}}} <span class="a1">{{{substr($conv->messages->first()->message,0,75)}}}</span></h3>
			            <h4>{{{ $conv->messages->first()->created_at }}}</h4>
			        </div>
			        <div class="clearfix"></div>
			    </div>			
		    @endif

	   	@endforeach



	</div>
    <h2><a href="#.">See All</a></h2>
</div>



<script>
	


    $('.notification-clickable').click(function() {

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

</script>