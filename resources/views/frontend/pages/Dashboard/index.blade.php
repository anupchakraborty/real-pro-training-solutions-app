@extends('frontend.layouts.master')
@section('title')
    Dashboard | Real Pro Training Solutions
@endsection

@section('user_content')
        <!-- Start Header Top
    ============================================= -->
    @include('frontend.partials.header-top')
        <!-- End Header Top
    ============================================= -->

        <!-- Start Header
    ============================================= -->
    @include('frontend.partials.header')
        <!-- End Header
    ============================================= -->


    <!-- Start Content With Unregistered User
    ============================================= -->
    @php
        $id = Auth::guard('web')->user()->id;
        $carts = App\Models\Cart::where('user_id',$id)->get();
    @endphp
    @if(count($carts) > 0)
    <div class="faq-area left-sidebar course-details-area default-padding">
        <div class="container">
            <div class="row">
                <div class="site-heading text-center">
                    <div class="col-md-8 col-md-offset-2">
                        <h2>Your Courses</h2>
                    </div>
                </div>
            </div>
            <div class="popular-courses-items">
                <div class="row">
                    @foreach($carts as $cart)
                        @if($cart->order_id == NULL))

                            @include('frontend.partials.popular-course')

                        @else
                            @php
                                $order = App\Models\Order::where('id',$cart->order_id)->first();
                                $complete_order = App\Models\Cart::where('order_id',$order->id)->first();
                                $courses = App\Models\Course::where('id',$complete_order->course_id)->get();
                            @endphp
                            
                            @foreach($courses as $course)
                                @php
                                    $slug = \Illuminate\Support\Str::slug($course->title);
                                @endphp
                                <!-- Single Item -->
                                <div class="col-md-4 col-sm-6 equal-height">
                                    <div class="item">
                                        <div class="thumb">
                                            <a href="{{ route('course.details', ['id' => $course->id,'slug' => $slug]) }}">
                                                <img src="{{ asset('backend/img/courses/'.$course->image) }}" alt="Thumb" id="popular_image">
                                            </a>
                                            <div class="price">Price: ${{ $course->price }}</div>
                                        </div>
                                        <div class="info">
                                            <div class="author-info">
                                                <div class="thumb">
                                                    <a href="#"><img src="{{ asset('backend/img/admin/'.$course->admin->image) }}" alt="Thumb"></a>
                                                </div>
                                                <div class="others">
                                                    <a href="#">{{ $course->admin->name }}</a>
                                                    <div class="rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star-half-alt"></i>
                                                        <span>4.5 (23,890)</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <h4><a href="{{ route('course.details', ['id' => $course->id,'slug' => $slug]) }}">{{ $course->title }}</a></h4>
                                            <p>
                                                {{ $course->desctription }}
                                            </p>
                                            @php
                                                $current_date = \Carbon\Carbon::today();
                                            @endphp
                                            
                                            @if($current_date >= $course->started_date)
                                                <div class="bottom-info">
                                                    <a class="start-course" href="{{ route('user.contant',$course->id) }}">Start Now</a>
                                                </div>
                                            @else
                                                <p class="start-course">Course will be started- {{ $course->started_date }} </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Item -->
                            @endforeach
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @else
        @include('frontend.partials.popular-course')
    @endif
        <!-- End Content With Unregistered User
    ============================================= -->

        <!-- Start Footer
    ============================================= -->
    @include('frontend.partials.footer')
        <!-- End Footer
    ============================================= -->

@endsection
