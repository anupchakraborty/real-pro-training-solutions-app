    <!-- Header
    ============================================= -->
    <header id="home">
        @include('backend.partials.message')
        <!-- Start Navigation -->
        <nav class="navbar navbar-default navbar-sticky bootsnav">

            <!-- Start Top Search -->
            <div class="container">
                <div class="row">
                    <div class="top-search">
                        <div class="input-group">
                            <form action="#">
                                <input type="text" name="text" class="form-control" placeholder="Search">
                                <button type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Top Search -->

            <div class="container">

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->

                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="index.html">
                            <img src="{{ asset('backend/img/'.$companyinfo->logo) }}" class="logo" alt="Logo">
                    </a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right" data-in="#" data-out="#">
                        <li>
                            @if(!empty(Auth::guard('web')->user()->id))
                                <a href="{{ route('dashboard') }}" class="dropdown-toggle active" data-toggle="dropdown" >Dashboard</a>
                            @else
                                <a href="{{ route('index') }}" class="dropdown-toggle active" data-toggle="dropdown" >Home</a>
                            @endif
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle active" data-toggle="dropdown" >Courses</a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('courses') }}">Popular Courses</a></li>
                                <li><a href="courses-2.html">Feature Courses</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="{{ route('teacher') }}" >Teachers</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle active" data-toggle="dropdown" >Event</a>
                            <ul class="dropdown-menu">
                                <li><a href="event.html">Event Mixed Colum</a></li>
                                <li><a href="event-2.html">Event Grid Colum</a></li>
                                <li><a href="event-3.html">Event Carousel</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}">contact</a>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>

        </nav>
        <!-- End Navigation -->

    </header>
    <!-- End Header -->
