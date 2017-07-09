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
        $notificationBuilder = new PayloadNotificationBuilder();
        $notificationBuilder->setTitle('title')
            ->setBody('body')
            ->setSound('sound')
            ->setBadge('badge');

        $notification = $notificationBuilder->build();

        dd($notification);
    }

}
