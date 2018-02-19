<?php

$messages = App\message::where('conversation_id','=',$target)->latest()->paginate(15)->sortBy('id');

?>



<div class="message-col1" style="background:#f4f5f8; border-right:1px solid #dbdcdf;">
	<div class="system-main">



        @foreach($messages as $message)

            @if($message->sender_id == $user->id)

                <div class="message-system-row2">
                    <div class="text-row3">
                        {{{ $message->message }}}
                    </div>
                    <div class="img-row3">
                        <img src="{{{ $message->user->profileThumbUrl() }}}" alt="image" /><br />
                        <p>{{{ substr($message->created_at,11, 5) }}}</p>
                    </div>
                    <div class="clearfix"></div>
                </div>

            @else
           
                <div class="message-system-row2">
                	<div class="img-row2">
                        <img src="{{{ $message->user->profileThumbUrl() }}}" alt="image" /><br />
                        <p>{{{ substr($message->created_at,11, 5) }}}</p>
                    </div>
                    <div class="text-row2">
                    	{{{ $message->message }}}
                    </div>
                    <div class="clearfix"></div>
                </div>

            @endif

        @endforeach





    <div class="send-row">
        <!--
        <div class="attached-b">
            <input type="file" />
        </div>
    -->
        <div class="testarea">
            <textarea placeholder="Type your message..."></textarea>
        </div>
        <!--
        <div class="emojis">
            <a href="#."><img src="images/emoji.png" alt="emoji" /></a>
        </div>
        -->
        <div class="send-b">
            <input type="submit" />
        </div>
        <div class="clr"></div>
    </div>
</div>