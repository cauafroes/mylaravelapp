<?php

namespace App\Http\Controllers;

use App\Models\ExpoUser;
use Illuminate\Http\Request;
use ExpoSDK\Expo;
use ExpoSDK\ExpoMessage;

class ExpoUserController extends Controller
{
    public function index()
    {
        return response()->json([
            'index' => 'a'
        ]);
    }

    public function store(Request $request)
    {
        $token = $request->token;
        $push_token = $this->setPushToken($token);

        return response()->json([
            'token' => $push_token
        ]);
    }

    public function show(ExpoUser $expoUser)
    {
        //
    }

    public function setPushToken($token){
        $result = (new ExpoUser)->setPushToken($token);
        return ($result->original);
    }

    public function notify(Request $request){
        $token = $request->token;

        $message = (new ExpoMessage([
            'to' => $token,
            'title' => 'initial title',
            'body' => 'initial body',
        ]))
            ->setData(['id' => 1])
            ->setChannelId('default')
            ->playSound();
        
        (new Expo)->send($message)->push();
    }
}
