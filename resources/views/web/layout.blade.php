<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>SkillsHub - @yield('title')</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Lato:700%7CMontserrat:400,600" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href={{asset("web/css/bootstrap.min.css") }} />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href={{asset("web/css/font-awesome.min.css") }}>

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href={{asset("web/css/style.css") }} />

    {{-- toastr css link --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    {{-- To add more style links --}}
    @yield("styles")


</head>

<body>

    <!-- Header -->
    <header id="header">
        <div class="container">

            <div class="navbar-header">
                <!-- Logo -->
                <div class="navbar-brand">
                    <a class="logo" href="index.html">
                        <img src={{asset("web/img/logo.png")}} alt="logo">
                    </a>
                </div>
                <!-- /Logo -->

                <!-- Mobile toggle -->
                <button class="navbar-toggle">
                    <span></span>
                </button>
                <!-- /Mobile toggle -->
            </div>

            <!-- Navigation Links -->
            <x-navbar></x-navbar>
            <!-- /Navigation Links-->

        </div>
    </header>
    <!-- /Header -->

    @yield("main")

    <!-- Footer -->
    <footer id="footer" class="section">

        <!-- container -->
        <div class="container">

            <!-- row -->
            <div id="bottom-footer" class="row">

                <!-- social -->
                <x-social-links></x-social-links>
                <!-- /social -->

                <!-- copyright -->
                <div class="col-md-8 col-md-pull-4">
                    <div class="footer-copyright">
                        <span>&copy; Copyright 2021. All Rights Reserved. | Made with <i class="fa fa-heart-o"
                                aria-hidden="true"></i> by <a href="#">SkillsHub</a></span>
                    </div>
                </div>
                <!-- /copyright -->

            </div>
            <!-- row -->

        </div>
        <!-- /container -->

    </footer>
    <!-- /Footer -->

    <!-- preloader -->
    <div id='preloader'>
        <div class='preloader'></div>
    </div>
    <!-- /preloader -->


    <!-- jQuery Plugins -->
    <script type="text/javascript" src={{asset("web/js/jquery.min.js") }}></script>
    <script type="text/javascript" src={{asset("web/js/bootstrap.min.js") }}></script>
    <script type="text/javascript" src={{asset("web/js/main.js") }}></script>

    {{-- toastr js link --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>



    <script>
        $('#logout-link').click(function(e){
            e.preventDefault();
            $('#logout-form').submit()
        });
    </script>

    <script src="https://js.pusher.com/7.1/pusher.min.js"></script>
    <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        //make oject of pusher
        //deed8b28ea8d8ac24bb1 is pusher app key
        var pusher = new Pusher('deed8b28ea8d8ac24bb1', {
        cluster: 'mt1'
        });


        //subscribe/listens  to a chanel
        var channel = pusher.subscribe('notifications-channel');

        //when event exam-added is triggered , execute this function
        channel.bind('exam-added', function(data) {
            // alert(JSON.stringify(data));
            toastr.success('New Exam Added')
        });
    </script>


    @yield("scripts")

</body>

</html>
