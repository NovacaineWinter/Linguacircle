<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class insideAjaxPageload extends Controller
{
    public function index(Request $request){

    	$user = Auth::user();


    	if($request->has('ajaxmethod')){

    		switch($request->get('ajaxmethod')){
    			case 'getNotifications':
    				return view('inside.interactionComponents.renderNotifications')->with('user',$user);
    				break;

    			case'getMessages':
    				return view('inside.interactionComponents.renderMessages')->with('user',$user);
    				break;
    		
                case 'viewConversationStream':

                    if($request->has('target')){

                        return view('inside.interactionComponents.conversationStream')->with('user',$user)->with('target',$request->get('target'));

                    }else{

                        $this->goHome();
                    }
            }
    		
    	}
    }

    private function goHome(){
        view('inside.student.pages.studentHomeContent');
    }

}
