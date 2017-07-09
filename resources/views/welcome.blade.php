<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="http://localhost:8888/php/laravel-firebase-FCM/public/manifest.json">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>

        <script src="https://www.gstatic.com/firebasejs/4.1.3/firebase.js"></script>
        <script src="https://www.gstatic.com/firebasejs/3.8.0/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/3.8.0/firebase-auth.js"></script>
        <script src="https://www.gstatic.com/firebasejs/3.8.0/firebase-database.js"></script>
        <script src="https://www.gstatic.com/firebasejs/3.8.0/firebase-messaging.js"></script>
        <script>
            // Initialize Firebase
            var config = {
                apiKey: "AIzaSyBb1O_ROm6bjc5DLj_K69WAdSOZIy9Ez7Y",
                authDomain: "medssocial-web.firebaseapp.com",
                databaseURL: "https://medssocial-web.firebaseio.com",
                projectId: "medssocial-web",
                storageBucket: "medssocial-web.appspot.com",
                messagingSenderId: "610391124341"
            };
            firebase.initializeApp(config);
            const messaging = firebase.messaging();

            messaging.requestPermission()
                .then(function() {
                    console.log('Notification permission granted.');
                    // TODO(developer): Retrieve an Instance ID token for use with FCM.
                    // ...
                })
                .catch(function(err) {
                    console.log('Unable to get permission to notify.', err);
                });

            messaging.getToken()
                .then(function(currentToken) {
                    if (currentToken) {
                        sendTokenToServer(currentToken);
                        updateUIForPushEnabled(currentToken);
                    } else {
                        // Show permission request.
                        console.log('No Instance ID token available. Request permission to generate one.');
                        // Show permission UI.
                        updateUIForPushPermissionRequired();
                        setTokenSentToServer(false);
                    }
                })
                .catch(function(err) {
                    console.log('An error occurred while retrieving token. ', err);
                    showToken('Error retrieving Instance ID token. ', err);
                    setTokenSentToServer(false);
                });

        </script>
    </body>
</html>
