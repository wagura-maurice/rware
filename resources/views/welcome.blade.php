
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>{!! config('app.name') !!} - Home</title>
        <meta content="Official Digital payments platform that enables Nyeri Business Owners, and visitors access and pay for government services online." name="description">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <!-- bootstrap -->
        <link href="{!! asset('css/front/bootstrap.min.css') !!}" rel="stylesheet">
        <link href="{!! asset('css/front/doc.min.css') !!}" rel="stylesheet">
        <!-- custom -->
        <link href="{!! asset('css/front/styles.css') !!}" rel="stylesheet">
        <!-- flexislider -->
        <link rel="stylesheet" href="{!! asset('css/front/nguvu.css') !!}" type="text/css" media="screen">
    </head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top ecitizen" id="subnav">
        <div class="container header-nav">
            <a href="{!! route('register') !!}" class="btn btn-default btn-ecitizen navbar-btn navbar-right" type="button">Create an account</a>
            <a href="{!! config('app.url') !!}" class="ecitizen-logo"><img src="{!! asset('images/front/ecitizen-logo.png') !!}"></a>
            <a href="{!! route('login') !!}" class="pull-right link-button ecitizen">Sign In</a>
        </div>
        <div class="container bg-ecitizen portal-trio">
            <div class="row">
                <a class="col-sm-4 col-xs-4 ecitizen" title="{!! config('app.name') !!}" href="{!! config('app.url') !!}">{!! config('app.name') !!}</a>
            </div>
            <!--/.nav-collapse -->
        </div>
        <div class="container bg">
            <div class="navbar-header">
                <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="{!! config('app.url') !!}" class="navbar-brand hidden-lg hidden-md hidden-sm">MENU</a>
            </div>
        </div>
    </nav>

    <!--main-->
    <div class="container" id="main">
        <div class="row">
            <div class="ecitizen-about">
                <div class="ecitizen-hero ecitizen-hero-carousel ecitizen-js-carousel">
                    <div class="nguvu-scroll-carousel" id=":1">
                        <ul class="nguvu-scroll-carousel-content" style="left: 0px; top: 0px;">
                            <li class="nguvu-scroll-carousel-item ecitizen-about-carousel-item-1" id=":0">
                                <div class="maia-aux">
                                    <div class="maia-cols">
                                        <div class="maia-col-5">
                                            <div class="ecitizen-vertical-center">
                                                <div class="ecitizen-content">
                                                    <h1>
                                                        Apply for County Government services ChapChap!
                                                    </h1>
                                                    <h6>Now available across all devices!</h6>
                                                    <a class="btn btn-ecitizen btn-lg" data-g-label="Create an account button" href="register/">Create an account</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nguvu-scroll-carousel-item ecitizen-about-carousel-item-2">
                                <div class="maia-aux">
                                    <div class="maia-cols">
                                        <div class="maia-col-5">
                                            <div class="ecitizen-vertical-center">
                                                <div class="ecitizen-content">
                                                    <h1>Receive email and sms notification every time your application has progressed.</h1>
                                                    <a class="btn btn-primary btn-lg" data-g-label="Learn more" href="">Create an account</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nguvu-scroll-carousel-item ecitizen-about-carousel-item-3">
                                <div class="maia-aux">
                                    <div class="maia-cols">
                                        <div class="maia-col-5">
                                            <div class="ecitizen-vertical-center">
                                                <div class="ecitizen-content">
                                                    <h1>Need help? Have a question about eCitizen? Visit the help center for FAQs and suggestions.</h1>
                                                    <a class="btn btn-primary btn-lg" data-g-label="Learn more" href="">Learn more</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="ecitizen-carousel-selector nguvu-selector" id=":3">
                        <div class="nguvu-selector-content">
                            <a class="nguvu-selector-control-item nguvu-selector-control-item-selected" id=":2"></a>
                            <!--<a class="nguvu-selector-control-item"></a> 
                <a class="nguvu-selector-control-item"></a>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="st-content-noborder">
                <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 mb20 p20 text-center" style="background: #f7f9f9;">
                    <h3 class="mt0 pt20 pb0">Welcome to <strong>{!! config('app.name') !!}</strong></h3>
                    <p class="lead pl20 pr20 pt0">
                        Nyeri Business owners can now apply for County Government to Business owners services and pay via mobile money, debit Cards.
                    </p>
                    <br />
                    <h6>
                        <blockquote>
                            <strong><font color="26e90c">M-Pesa No:123 456</font></strong>
                        </blockquote>
                        <em>ChapChap!</em>
                    </h6>
                </div>
                <!--About-us top-content-->
                <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 mb20 text-center">
                    <h3 class="mb0">WHY <strong>{!! config('app.name') !!}?</strong></h3>
                    <h6 class="mt0">Get County Government Services <em>ChapChap!</em></h6>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 mb20">
                    <div class="media pl20">
                        <div class="media-left pr20">
                            <img class="noborder" src="{!! asset('images/front/padlock.png') !!}" />
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Single Sign-on</h4>
                            One account is all you need, a single username and password gets you into County government Permits.
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 mb20">
                    <div class="media pl20">
                        <div class="media-left pr20">
                            <img class="noborder" src="{!! asset('images/front/check.png') !!}" data-pin-nopin="true" />
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Convenience</h4>
                            <p>Pay using mobile money, Debit Cards and online banking from local banks.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 mb20">
                    <div class="media pl20">
                        <div class="media-left pr20">
                            <img class="noborder" src="{!! asset('images/front/notification.png') !!}" />
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Notifications</h4>
                            <p>Receive email and sms notification every time your application has progressed.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 mb20">
                    <div class="media pl20">
                        <div class="media-left pr20">
                            <img class="noborder" src="{!! asset('images/front/download.png') !!}" data-pin-nopin="true" />
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Online Services</h4>
                            <p>Fill online application forms, submit then receive your permit in PDF format from wherever you are.</p>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <section data-stellar-background-ratio="0.5" style="background-image: url(&quot;{!! asset('images/front/bg.jpg') !!}&quot;); font-size: 20px; background-position: 50% 68.8px;" class="sc-parallax">
                <div class="row">
                    <div class="containerCentered">
                        <h3>Get your account NOW</h3>
                    </div>
                    <div class="sc-mask"></div>
                    <div class="container">
                        <div class="aq-block aq-block-pg_heading_block col-md-12 col-xs-12 clearfix" id="aq-block-12-5">
                            <div class="containerCentered">
                                <p class="lead">A single account for all County Government to clients services</p>
                            </div>
                        </div>
                        <div class="aq-block aq-block-pg_button_block col-md-12 col-xs-12 clearfix" id="aq-block-12-6">
                            <a target="" href="{!! route('register') !!}">
                                <button class="btn btn-lg hollow">Create an account</button>
                            </a>
                        </div>
                    </div>
                </div>
            </section>	
        </div>
    </div>
    <!--/main-->
    <div id="cicerone" class="container">
        <div class="misc">
            <div class="row">
                <div class="col-sm-9 legal">
                    <p class="small">© {!! \Carbon\Carbon::now()->format('Y') !!} {!! config('app.name') !!} / Design by <a href="{!! config('app.url') !!}">{!! config('app.author') !!}</a></p>
                </div>
                <div class="col-sm-3 social">
                    <div class="row">
                        <a title="facebook" target="_blank" class="col-sm-3 fb" href="#"><img title="facebook" src="{!! asset('images/front/fb.png') !!}" /></a>
                        <a title="twitter" target="_blank" class="col-sm-3 tw" href="#"><img title="twitter" src="{!! asset('images/front/tw.png') !!}" /></a>
                        <a title="linkedin" target="_blank" class="col-sm-3 in" href="#"><img title="linkedin" src="{!! asset('images/front/in.png') !!}" /></a>
                        <a title="youtube" target="_blank" class="col-sm-3 yt" href="#"><img title="youtube" src="{!! asset('images/front/yt.png') !!}" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- script references -->
    <script type="text/javascript" src="{!! asset('js/front/tracking.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/front/jquery.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/front/bootstrap.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/front/scripts.js') !!}"></script>
    <!-- FlexSlider -->
    <script type="text/javascript" src="{!! asset('js/front/jquery.nguvu.js') !!}"></script>
</body>
</html>