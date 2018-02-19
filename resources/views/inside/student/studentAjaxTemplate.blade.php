<?php
    if (Auth::check())
    {
        $user = App\User::find(Auth::id());
    }

    // should tackle this with the following gist
    	// $user->nextSession->countdownTimer();
?>        


	@if($user->hasUpcomingSession())
    <section id="alart">
            <div class="alart-main">
                <div class="row clearfix">
                    <div class="col-xs-9">
                        <div class="alart-img">
                            <img src="images/alart.png" alt="alart" />
                        </div>
                        <div class="alart-text">
                            <p>Your Session is going to start in 60 mins</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-xs-3">

                    </div>
                </div>
            </div>

    </section>
    @endif
	@yield('page')
