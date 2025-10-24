<?php

namespace App\Http\Controllers;

use App\Models\UserMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserMessageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        Validator::make($request->all(),[
            'name'=>'required|min:3|max:225',
            'email'=> 'required|email|max:225',
            'phone'=>'required|size:11',
            'subject' => 'required|max:225',
            'message'=>'required|max:65535'
        ]);
        UserMessage::query()->create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'subject'=>$request->subject,
            'message'=>$request->message
        ]);
        return response()->json([
            'message'=>'The Message saved successfully'
        ]);
    }
}
