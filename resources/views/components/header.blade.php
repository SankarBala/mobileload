   <!-- Header-->
        <header id="header">
            <div class="container">
                <div class="header-row">
                    <div class="header-column justify-content-start">

                        <!-- Logo -->
                        <div class="logo"> <a href="{{ route('home') }}" class="d-flex"
                                title="{{ env('APP_NAME') }}"><img src="{{ asset('frontend/images/logo.png') }}"
                                    alt="Quickai" /></a> </div>
                        <!-- Logo end -->

                    </div>
                    <div class="header-column justify-content-end">

                        <!-- Primary Navigation-->
                        <nav class="primary-menu navbar navbar-expand-lg d-none d-sm-block">
                            <div id="header-nav" class="collapse navbar-collapse">
                                <ul class="navbar-nav">
                                    <li class=""> <a class="text-white" href="{{ route('home') }}">Home</a></li>
                                    <li class=""> <a class="text-white" href="{{ route('home') }}">Mobile
                                            Recharge</a></li>
                                    <li class=""> <a class="text-white" href="{{ route('home') }}">Bulk SMS</a></li>
                                    <li class=""> <a class="text-white" href="{{ route('home') }}">Shop Online</a>
                                    </li>
                                    <li class=""> <a class="text-white" href="{{ route('home') }}">Our Tutorial</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                        <nav class="primary-menu navbar">
                            <div id="header-nav" class="collapse navbar-collapse">
                                <ul class="navbar-nav">
                                    <li class=""> <a class="text-dark" href="{{ route('home') }}">Home</a></li>
                                    <li class=""> <a class="text-dark" href="{{ route('home') }}">Mobile Recharge</a>
                                    </li>
                                    <li class=""> <a class="text-dark" href="{{ route('home') }}">Bulk SMS</a></li>
                                    <li class=""> <a class="text-dark" href="{{ route('home') }}">Shop Online</a>
                                    </li>
                                    <li class=""> <a class="text-dark" href="{{ route('home') }}">Our Tutorial</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>

                        <!-- Primary Navigation end -->

                        <!-- Login Signup -->
                        <nav class="login-signup navbar navbar-expand ml-sm-2 pl-sm-2">
                            <ul class="navbar-nav">
                                <li class="profile"><a class="text-white pr-0" data-toggle="modal"
                                        data-target="#login-modal" href="#" title="Login"><span
                                            class="d-sm-inline-block">Login</span></a></li>
                            </ul>
                        </nav>
                        <nav class="login-signup navbar navbar-expand ml-sm-2 pl-sm-2">
                            <ul class="navbar-nav">
                                <li class="profile"><a class="text-white pr-2" data-toggle="modal"
                                        data-target="#signup-modal" href="#" title="Register"><span
                                            class="d-sm-inline-block">Register</span></a>
                                </li>
                            </ul>
                        </nav>

                        <!-- Collapse Button -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header-nav">
                            <span class="bg-white"></span> <span class="bg-white"></span> <span
                                class="bg-white"></span></button>


                    </div>
                </div>
            </div>
        </header>
        <!-- Header end -->