<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .email-form {
            background: #f0eded;
        }

        .header {
            padding: 10px 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h2 {
            font-size: 28px;
            color: #257c3d;
        }

        .header .logo img {
            width: 150px;
        }

        .body {
            padding: 30px 20px;
        }

        .body h5 span {
            width: 100px;
            display: inline-block;
        }

        .body p {
            text-indent: 100px;
            font-size: 14px;
            color: #333;
        }

    </style>
</head>
<body>
    <div class="email-form">
        <div class="header">
            <div class="name">
                <h2>Green IT</h2>
            </div>
            <div class="logo">
                <img src="{{ url('images/logo.png') }}" alt="">
            </div>
        </div>

        <div class="body">
            <h5><span>Subject</span>: &nbsp;{{ $mailData['subject'] }}</h5>
            <h5><span>From</span>: &nbsp; {{$mailData['firstName']}} {{$mailData['lastName']}}</h5>
            <h5><span>Company</span>: &nbsp; {{$mailData['company']}}</h5>
            <h5><span>Email</span>: &nbsp; {{$mailData['email']}}</h5>
            <h5><span>Phone</span>: &nbsp; {{$mailData['phone']}}</h5>
            <h5><span>Message</span>:</h5>
            <p>{{ $mailData['message'] }}</p>
        </div>
    </div>
</body>
</html>
