
<div id="notificationContent">
	<div class="noti-panel-inner">
			
		<h1>Notifications</h1>

		@if($user->notifs->count() > 0)

			@foreach($user->notifs as $notification)

				<div class="row-1 notification-clickable @if($notification->unread) unread @endif" style="border-top:1px solid #e5e5e5" callback="{{{ $notification->callback }}}" target="{{{ $notification->target }}}">
			        <div class="row-1-text">
			        	<h3><span class="a1">{{{ $notification->content }}}</span></h3>
			            <h4>{{{ substr($notification->created_at,0,-3) }}} </h4>
			        </div>
			        <div class="clearfix"></div>
			    </div>
			    <?php
			    $notification->unread = 0;
			    $notification->save();  ?>
	    	@endforeach


	    @else
	    <h5>You have no Notifications</h5>

	    @endif

	</div>
    <h2><a href="#.">See All</a></h2>

</div>







