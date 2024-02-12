{{--<h3>Hi, {{$name}}, </h3>--}}
{{--Username -> Email Provided in organization <br>--}}
{{--Password -> {{$password}}<br>--}}

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
    <meta name="author" content="vecuro">
    <meta name="description" content="TechBiz - IT Solution & Service HTML Template">
    <meta name="keywords" content="TechBiz - IT Solution & Service HTML Template">
    <meta name="robots" content="INDEX,FOLLOW">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">

</head>
<style>

    .emailaera{
        display: flex;
    }
    .emailimagarea{
        background-color: #fff;
        box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
        max-width: 485px;
        padding: 15px;
    }
    .emailcontent{
        margin-left: 29px;
        margin-top: 17px;
    }
    .emailcontent h2{
        font-size: 16px;
    }
</style>
<body>



<section class="emailimagarea">
    <div class="container">
        <div class="emailaera">
            <div class="emailimg">
                <img src="{{asset('user_image/no_image.jpg')}}" alt="icon">
{{--                <img src="{{asset()}}" alt="icon">--}}
            </div>
            <div class="emailcontent">
                <h2>Hi..., {{$name}}</h2>
                <p><b>Name:</b> {{$name}}</p>
                <p><b>Phone No:</b> {{$phone_no}}</p>
                <p><b>User Name:</b> Email Provided in organization </p>
                <p><b>Password:</b> {{$password}}</p>
            </div>
        </div>
    </div>
</section>
</body>

</html>

