<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use LaravelFCM\Facades\FCM;

class PushController extends Controller
{
    public function index()
    {
        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60*20);

        $notificationBuilder = new PayloadNotificationBuilder('Laravel');
        $notificationBuilder->setBody('Automatizado')
            ->setSound('default');

        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData(['a_data' => 'my_data']);

        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();

        $token = "eTv6otrlhRM:APA91bHEZkv-BTwYEmo76iheFRjiO_R3qqg2ctJP5jgGkKhqJQFK0OoELGzTYdoDk20KAuxjMzwcWpZaFi7rt65_NGR2TC4MTGMp3UN_y69Hi3L_81uBNPHRchWT64e2JVjk0HfcShyo";

        $downstreamResponse = FCM::sendTo($token, $option, $notification, $data);
        /*
        $downstreamResponse->numberSuccess();
        $downstreamResponse->numberFailure();
        $downstreamResponse->numberModification();

//return Array - you must remove all this tokens in your database
        $downstreamResponse->tokensToDelete();

//return Array (key : oldToken, value : new token - you must change the token in your database )
        $downstreamResponse->tokensToModify();

//return Array - you should try to resend the message to the tokens in the array
        $downstreamResponse->tokensToRetry();
        */

    }


    public function multiple_device()
    {
        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60*20);

        $notificationBuilder = new PayloadNotificationBuilder('Múltiple Device');
        $notificationBuilder->setBody('Hello world')
            ->setSound('default');

        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData(['a_data1' => 'my_data1']);

        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();

// You must change it to get your tokens
        //$tokens = MYDATABASE::pluck('fcm_token')->toArray();

        $tokens = ['eTv6otrlhRM:APA91bHEZkv-BTwYEmo76iheFRjiO_R3qqg2ctJP5jgGkKhqJQFK0OoELGzTYdoDk20KAuxjMzwcWpZaFi7rt65_NGR2TC4MTGMp3UN_y69Hi3L_81uBNPHRchWT64e2JVjk0HfcShyo'];

        $downstreamResponse = FCM::sendTo($tokens, $option, $notification);
    }


    public function notificacion()
    {
        $notificationBuilder = new PayloadNotificationBuilder();
        $notificationBuilder->setTitle('title')
            ->setBody('body')
            ->setSound('sound')
            ->setBadge('badge');

        $notification = $notificationBuilder->build();

        dd($notification);
    }

}
