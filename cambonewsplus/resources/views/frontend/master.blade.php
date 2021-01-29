<!DOCTYPE html>
<html >
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        @yield('title')
        <title>CAMBO_NEWS</title>
        <link rel="stylesheet" href="{{asset('https://pro.fontawesome.com/releases/v5.10.0/css/all.css')}}" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/bootstrap-theme.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />
        <link href='{{asset('https://fonts.googleapis.com/css?family=Nokora|Francois+One')}}' rel='stylesheet'>
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    </head>
    <body>
        <div class="col-md-12 top" id="top" style="background: rgba(0,0,0,0.8);">
            <div class="col-md-9 top-left">
                <div class="col-md-3">
                    <span class="day" style="color: white;">{{ date('D, d, M, Y ') }}</span>
                </div>
                <div class="col-md-9">
                    <span class="latest" style="color: white;">Latest: </span> <a href="{{ asset('article') }}/{{ $lastnews->slug }}">{!! substr($lastnews->title,0,200) !!} &raquo;</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="col-md-9 " >
                    <div style="margin-top: 15px;">
                        <a class="icon" href="#"> <i class="fab fa-google"></i> </a>
                        <a class="icon" href="#"> <i class="fab fa-youtube"></i> </a>
                        <a class="icon" href="#"> <i class="fab fa-twitter"></i> </a>
                        <a class="icon" href="#"> <i class="fab fa-instagram"></i> </a>
                        <a class="icon" href="#"> <i class="fab fa-facebook"></i> </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 brand">
            <div class="col-md-2 ">
                    <img src="{{ asset('images/'.$setting->image) }}" width="100%" height="90px;"  >
            </div>
            <div class="col-md-2"> </div>
            <div class="col-md-8 ">
                <img src="{{ asset('images/'.$advertising->image) }}" width="100%" height="90px" style="border-radius: 10px;"/>
            </div>
        </div>
        <div class="col-md-12 main-menu">
            <div class="col-md-10 menu">
                <nav class="navbar">
                    <div class="collapse navbar-collapse" id="mynavbar">
                        <ul class="nav nav-justified">
                            <li><a href="{{ asset('/frontend/index') }}" class="active"><i class="fas fa-home"></i></a></li>
                            @foreach ($categories as $cat)
                                <li><a href="{{ asset('category') }}/{{ $cat->slug }}" class="text-uppercase">{{ $cat->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="col-md-2 ">
                <div class="search">
                    <input type="search" id="search_content" class="form-control" />
                    <span class=" search-btn"> <i class="fas fa-search"></i></span>
                    <div id="search-output"></div>
                </div>
            </div>
        </div>
        {{-- end header --}}

            @yield('container');

        {{-- start footer --}}
        <div class="col-md-12 bottom">
            <div class="col-md-4">
                <div class="col-md-12">
                    <h3 style="border-bottom:2px solid #ccc;"><span style="border-bottom:2px solid #f00;">About Us</span></h3>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <ul class="nav">
                            <li ><a href="#"> <i class="fab fa-google"></i> infor@cambonewsplus.com </a></li>
                            <li ><a href="#"> <i class="fab fa-youtube"></i> Cambonewsplus </a></li>
                            <li > <a href="#"> <i class="fab fa-twitter"></i> Cambonewsplus </a></li>
                            <li ><a href="#"> <i class="fab fa-instagram"></i> Cambonewsplus </a></li>
                            <li ><a href="#"> <i class="fab fa-facebook"></i> Cambonewsplus</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="col-md-12">
                    <h3 style="border-bottom:2px solid #ccc;"><span style="border-bottom:2px solid #f00;">Quick Links</span></h3>
                </div>
                <div class="col-md-6">
                    <div class="row">
                    <ul class="nav">
                        @foreach ($categories as $key=>$cat)
                        @if ($key < 5)
                        <li><a href="{{ asset('category') }}/{{ $cat->slug }}" class="text-uppercase">{{ $cat->title }}</a></li>
                        @endif
                        @endforeach
                    </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                    <ul class="nav">
                        @foreach ($categories as $key=>$cat)
                        @if ($key > 4)
                        <li ><a href="{{ asset('category') }}/{{ $cat->slug }}" class="text-uppercase">{{ $cat->title }}</a></li>
                        @endif
                        @endforeach
                    </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <h3 style="border-bottom:2px solid #ccc;"><span style="border-bottom:2px solid #f00;">Contact Us</span></h3>
               <ul class="nav">
                @foreach ($page as $p)
                    <li ><a href="{{ asset('page') }}/{{ $p->slug }}" class="text-uppercase">{{ $p->title }}</a></li>
                @endforeach
                <li ><a href="{{ asset('/admin/message/create') }}" class="text-uppercase">Contact Us</a></li>
                   <li><img src="{{asset('images/appstore.png')}}" alt=""> <img src="{{asset('images/playstore.png')}}" alt=""></li>
            </ul>
            </div>
        </div>
        <div class="col-md-12 text-center copyright">
        Copyright &copy; {{ date('Y') }} <a href="{{ asset('/frontend/index') }}">Cambo News Plus</a>
        </div>
        <script>
            $(document).ready(function() {
                var duration = 500;
                $(window).scroll(function() {
                    if ($(this).scrollTop() > 500) {
                        $('.goto').fadeIn(duration);
                    } else {
                        $('.goto').fadeOut(duration);
                    }
                });

                $('.goto').click(function(event) {
                    event.preventDefault();
                    $('html').animate({scrollTop: 0}, duration);
                    return false;
                })
                $('#search_content').keyup(function(){
                    var text = $('#search_content').val();
                    if(text.length < 1) {
                        $('#search-output').hide(res);
                        return false;
                    }else {
                        $.ajax({
                            type : "get",
                            url: "{{ asset('search_content') }}",
                            data : {text:text},
                            success:function(res) {
                                $('#search-output').show();
                                $('#search-output').html(res);
                            }
                        })
                    }
                })
            });
        </script>
    </body>
</html>
