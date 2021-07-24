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


    <!-- Start Content With Left Sidebar
    ============================================= -->
    @php
        $id = Auth::guard('web')->user()->id;
        $orders = App\Models\Order::where('user_id',$id)->get();
        foreach ($orders as $order) {
            $complete_order = App\Models\Cart::where('order_id',$order->id)
                                ->first();
        }
    @endphp
    @if(!empty($complete_order))

        @php
            $course = App\Models\Course::where('id',$complete_order->course_id)->first();
            $contents = App\Models\Coursecontent::where('course_id',$course->id)->get();
        @endphp
        <div class="faq-area left-sidebar course-details-area default-padding">
            <div class="container">
                <div class="row">
                    <div class="site-heading text-center">
                        <div class="col-md-8 col-md-offset-2">
                            @php
                                $teacher = App\Models\Admin::where('id',$course->admin_id)->first();
                            @endphp
                            <h2>{{ $course->title }} by {{ $teacher->name }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Start Sidebar -->
                    <div class="left-sidebar col-md-4">
                        <div class="sidebar">
                            <aside>
                                <!-- Sidebar Item -->
                                <div class="sidebar-item search">
                                    <div class="sidebar-info">
                                        <form>
                                            <input type="text" placeholder="Course name" class="form-control">
                                            <input type="submit" value="search">
                                        </form>
                                    </div>
                                </div>
                                <!-- End Sidebar Item -->

                                <!-- Sidebar Item -->
                                <div class="sidebar-item category">
                                    <div class="title">
                                        <h4>Your Course</h4>
                                    </div>
                                    <div class="sidebar-info">
                                        <ul>
                                            @foreach($contents as $key => $content)
                                                <li>
                                                    <a href="{{ route('user.contant',$content->id) }}">{{ $key+1 }}. {{ $content->title }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <!-- End Sidebar Item -->
                            </aside>
                        </div>
                    </div>
                    <!-- End Sidebar -->

                </div>
            </div>
        </div>
    @else

    @endif
    <!-- End Content -->

            <!-- Start popular course
    ============================================= -->
    @if(!empty($order))

    @else
        @include('frontend.partials.popular-course')
    @endif
        <!-- End popular course
    ============================================= -->


        <!-- Start Footer
    ============================================= -->
    @include('frontend.partials.footer')
        <!-- End Footer
    ============================================= -->

@endsection
