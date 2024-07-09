<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Website Title</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .content {
            flex: 1;
        }

        .footer-area {
            background-color: #355E3B;
            color: #fff;
            padding: 20px 0;
        }

        .footer-area .container {
            width: 90%;
            margin: auto;
        }

        .footer-heading {
            color: #fff;
            font-size: 18px;
            margin-bottom: 15px;
        }

        .footer-underline {
            width: 50px;
            height: 3px;
            background-color: #fff;
            margin-bottom: 10px;
        }

        .mb-2 {
            margin-bottom: 10px;
        }

        .text-white {
            color: #fff;
        }

       
    /* Adjust container width and margin */
    .container {
        max-width: 90%; /* Set the maximum width of the container */
        margin-left: auto; /* Auto left margin to center the container */
        margin-right: auto; /* Auto right margin to center the container */
    }


    </style>
</head>
<body>
    <div class="content">
        <!-- Your page content here -->
    </div>
    <div class="footer-area py-2">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <a class="navbar-brand" href="{{url ('/')}}">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="Your Logo" height="40">
                    </a>
                    <div class="footer-underline"></div>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                    </p>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Quick Links</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2"><a href="{{url('/')}}" class="text-white">Home</a></div>
                    <div class="mb-2"><a href="{{url('/')}}" class="text-white">About Us</a></div>
                    <div class="mb-2"><a href="{{url('/')}}" class="text-white">Contact Us</a></div>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Shop Now</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2"><a href="" class="text-white">Category</a></div>
                    <div class="mb-2"><a href="" class="text-white">Trending Products</a></div>
                    <div class="mb-2"><a href="" class="text-white">Cart</a></div>  
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Reach Us</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2">
                        <p>
                        <i class="fa fa-map-marker" style="margin-right: 5px;"></i>Kamburupitiya Road, Matara, Sri Lanka
                        </p>
                    </div>
                    <div class="mb-2">
                        <a href="" class="text-white">
                            <i class="fa fa-phone"  style="margin-right: 5px;"></i>+94 11 275 3496
                        </a>
                    </div>
                    <div class="mb-2">
                        <a href="" class="text-white">
                            <i class="fa fa-envelope"  style="margin-right: 5px;"></i>wasthraceyloan@gmail.com
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
