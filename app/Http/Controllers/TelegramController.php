<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramController extends Controller
{
    public function getUpdates()
    {
        $updates = Telegram::getUpdates();
        dd($updates);
    }

    public function postSendMessage(Request $request)
    {
        $rules = [
            'message' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails())
        {
            return redirect()->back()
                ->with('status', 'danger')
                ->with('message', 'Message is required');
        }

        Telegram::sendMessage([
//            'chat_id' => '-195185573',
            'chat_id' => '367182051', // YO
//            'chat_id' => '783599', // PICHI
            'text' => $request->get('message')
        ]);

        //https://telegram.me/jandro935_bot?start

//        Telegram::sendPhoto([
//            'chat_id' => '367182051',
//            'photo' => 'http://mascotafiel.com/wp-content/uploads/2014/04/perros-graciosos.jpg'
//        ]);

        return redirect()->back()
            ->with('status', 'success')
            ->with('message', 'Message sent');
    }
}
