<?php
    if (Auth::check())
    {
        $user = App\User::find(Auth::id());
        $unreadNotificationCount = $user->unreadNotificationCount();
        $unreadMessageCount = $user->unreadMessageCount();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="LMV">
    <link rel="icon" href="images/favicon.png" type="image/x-icon"/>
	<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon"/>
    <title>LinguaCircle</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel='stylesheet' id='bootstrap-css'  href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' type='text/css' media='all' />
    <!-- End of head section HTML codes -->
    <link href="{{{ url('css/dashboard.css') }}}" rel="stylesheet">
    <link href="{{{ url('css/interactionComponents.css') }}}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="{{{ url('js/ajax.js') }}}"></script>
	    
	    
    <!--[if lt IE 9]> 
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body> 
  
<section id="navi-wrep">
	<div class="container">
    	<div class="row clearfix">
        	<div class="col-sm-3">
            	<div class="d-logo">
                	<a href="{{{ url('home')}}}"><img src="images/logo.png" alt="logo" /></a>
                </div>
            </div>
            <div class="col-sm-9">
            	<ul class="dash-navi">


                    <!-- User Icon -->
                	<li>                    	
                        <div class="navbaricons">
                        	<img class="user" src="{{{ $user->profileThumbUrl() }}}" alt="user" />
                            <span class="user-name">{{{$user->name}}} </span>
                        </div>                        
                    </li>


                    <!-- Message Container -->
                    <li>                    	
                        <div class="navbaricons expandNavBarPanel" target="message-panel" method="getMessages" targetContainer="message-panel">
                        	<i class="fa fa-envelope" aria-hidden="true"></i>
                            @if($unreadMessageCount > 0)
                                <span class="noti">{{{ $unreadMessageCount }}}</span>
                            @endif
                        </div>                        

                        <div class="notipanel" id="message-panel">
                            
                        </div>
                    </li>




                    <!-- Notification Container -->

                    <li>                    	
                        <div class="navbaricons expandNavBarPanel" target="notification-panel" method="getNotifications" targetContainer="notification-panel">
                        	<i class="fa fa-bell" aria-hidden="true"></i>
                            @if($unreadNotificationCount > 0)
                                <span class="noti" id="notif-count-bubble">{{{ $unreadNotificationCount }}}</span>
                            @endif                            
                        </div>                       

                        <div class="notipanel" id="notification-panel">
                        	
                        </div>
                    </li>


                    <!-- Settings Container -->
                    <li>

                    	<div class="navbaricons expandNavBarPanel" target="settings-panel">
                            <button id="dLabel" type="button" >
                                <i class="fa fa-cog" aria-hidden="true"></i>
                                <span class="caret"></span>
                            </button>
                        </div>

                        <div class="notipanel" id="settings-panel">
                            <ul class="notifdropdown">
                                <li><a href="#.">Settings</a></li>
                                <li><a href="#.">Profile Settings</a></li>
                                <li><a href="#.">My Credits</a></li>
                                <li><a href="#.">Help</a></li>
                                <li><a href="#.">Logout</a></li>
                            </ul>
                        </div>
                        
                    </li>
                    <!-- End of Settings Container -->


                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

</section>

    <div class="containter" id="insideContentHolder">
        <section id="profile-wrepper">
            <div class="container">
                <div class="row clearfix">
                    <div class="col-sm-4">
                        <div class="profile-col1">
                            <div class="profile-pic">
                                <a href="#."><img src="{{{ $user->profilePicLarge() }}}" alt="profile" /></a>
                            </div>
                            <h1>Kirsten Mckellar</h1>
                            <p>Status Online</p>
                            <div class="profile-row1">
                                <div class="row clearfix">
                                    <div class="col-xs-6">
                                        <h2>French <img src="images/flag1.png" alt="flag" /></h2>
                                    </div>
                                    <div class="col-xs-6">
                                        <h3>Advanced</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="profile-row1">
                                <div class="row clearfix">
                                    <div class="col-xs-6">
                                        <h2>Account Level </h2>
                                    </div>
                                    <div class="col-xs-6">
                                        <h3>Student</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="profile-row1">
                                <div class="row clearfix">
                                    <div class="col-xs-12">
                                        <h2>3 sessions per week</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="profile-row1">
                                <div class="row clearfix">
                                    <div class="col-xs-12">
                                        <h2>Change Account Level</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="profile-col2">
                            <h1>You have session credits <br />to spend</h1>
                            <h2>$150</h2>
                            <div class="a-center">
                                <a href="#."><img src="images/viesw.png" alt="image" /></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="profile-col3">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#mylikes" aria-controls="mylikes" role="tab" data-toggle="tab">My Bookings</a></li>
                                <li role="presentation"><a href="#instructors" aria-controls="instructors" role="tab" data-toggle="tab">My Instructors</a></li>
                                <li role="presentation"><a href="#groups" aria-controls="groups" role="tab" data-toggle="tab">My History</a></li>
                                <li role="presentation"><a href="#sessions" aria-controls="sessions" role="tab" data-toggle="tab">Payment Details</a></li>
                                <li role="presentation"><a href="#members" aria-controls="members" role="tab" data-toggle="tab">Members</a></li>
                            </ul>
                        
                        <!-- Tab panes -->
                            <div class="tab-content" id="ajax-container"> 
                                @yield('content')
                            </div>

                        </div>
                    </div>
                </div>
            </div> 
        </section>
    </div>


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>        
        $( document ).ready(function() {

            $('.expandNavBarPanel').click(function(event) {  

                event.stopPropagation();

                target = $(this).attr('target');
                ajaxmethod = $(this).attr('method');
                targetContainer = $(this).attr('targetContainer');


                $.ajax({
                    url: "{{url('/ajaxContent')}}",
                    method: 'GET',
                    data: {
                        ajaxmethod: ajaxmethod,                        
                    },
                    success: function(response) {
                        $('#'+targetContainer).html(response);
                        if(ajaxmethod =='getNotifications'){
                            setTimeout(function() {
                                $('#notif-count-bubble').hide();
                            },1000);
                            
                        }

                    },
                    error: function(response) {
                        console.log('There was an error - it was:  '+response);
                    }
                });



                if($('#'+target).is(':visible')){
                    $('#'+target).hide(400);  
                }else{
                    $('.notipanel').hide();
                    $('#'+target).show(400);
                }                   
            });

            $(document).click( function(){
                $('.notipanel').hide();
            });

            $('.notipanel').click(function(event) {
                event.stopPropagation();
            });

            baseheight = $('#navi-wrep').height();
            paddingAmt = baseheight+20;
            $('#insideContentHolder').css('padding-top',paddingAmt+'px');

            $( window ).resize(function() {
                baseheight = $('#navi-wrep').height();
                paddingAmt = baseheight+20;
                $('#insideContentHolder').css('padding-top',paddingAmt+'px');
            });
        });        
    </script>

</body>
</html>
