@extends('frontend.layouts.master')
@section('title')
    Content Quiz | Real Pro Training Solutions
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
                                                <a href="{{ route('user.course.contant',$content->id) }}" class="content">
                                                    @if($content->view_status == 1)
                                                        <i class="fas fa-eye"></i>
                                                    @else
                                                        <i class="fas fa-eye-slash"></i>
                                                    @endif
                                                    
                                                    <p>{{ $key+1 }}. {{ $content->title }}</p>
                                                </a>
                                            </li>

                                            @foreach ($quizzies as $quiz)
                                                @if($quiz->content_id == $content->id)
                                                @php
                                                    $quiz_id = request()->quiz_id;
                                                    // $quiz = App\Models\Quiz::where('id',$quiz_id)->first();
                                                @endphp
                                                    <li>
                                                        <a href="{{ route('user.course.contant.quiz',['course_id'=>$course->id, 'content_id' =>$content->id, 'quiz_id'=>$quiz->id]) }}" class="quiz {{ ($quiz->id == $quiz_id)? 'active':'' }}">
                                                            <i class="fas fa-clock"></i>
                                                            <p>{{ $quiz->quiz_name }}</p>
                                                        </a>
                                                    </li>  
                                                @else

                                                @endif 
                                            @endforeach
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!-- End Sidebar Item -->
                        </aside>
                    </div>
                </div>
                <!-- End Sidebar -->
                <!--start-course-content-->
                    <div class="col-md-8 faq-content">
                        <div class="wizard-v10-content">
                            <div class="wizard-form">
                                <div class="wizard-header">
                                    @php
                                        $quiz_id = request()->quiz_id;
                                        $quiz = App\Models\Quiz::where('id',$quiz_id)->first();
                                    @endphp
                                    <h3>{{ $quiz->quiz_name }}</h3>
                                </div>
                                <form class="form-register" action="#" method="post">
                                    <div id="form-total">
                                        @foreach ($questions as $key => $question)
                                        <!-- SECTION 1 -->
                                        <h2>{{ $key+1 }}</h2>
                                        <section>
                                            <div class="inner">
                                                <div class="question-header">
                                                    <h4>{{ $question->question }}</h4>
                                                </div>
                                                @php
                                                    $answers = App\Models\Answer::where('question_id',$question->id)->get();
                                                @endphp
                                                @foreach ($answers as $answer)
                                                <div class="form-row">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="options[]" id="flexRadioDefault1" value="{{ $answer->id }}">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            {{ $answer->answer }}
                                                        </label>
                                                    </div>
                                                </div>
                                                @endforeach

                                                <div class="questuion-answer">
                                                    <div id="answerShow" type="button" class="btn btn-outline-info">Answer Show</div>
                                                    <div id="contentAnswer{{ $question->id }}" class="btn btn-outline-danger">{{ $question->right_answer }}</div>
                                                </div>
                                            </div>
                                        </section>
                                        <!-- SECTION 1 -->
                                            {{-- @section('scripts') --}}
                                            <script>
                                               
                                                $(document).ready(function(){
                                                    // $("#answerHide").click(function(){
                                                        $("#contentAnswer{{ $question->id }}").hide();
                                                    // });
                                                    $("#answerShow").click(function(){
                                                        $("#contentAnswer{{ $question->id }}").show();
                                                    });
                                                });
                                            </script>
                                            {{-- @endsection --}}
                                        @endforeach
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <!--end-course-content-->
            </div>
        </div>
    </div>
    <!-- End Content  -->


        <!-- Start Footer
    ============================================= -->
    @include('frontend.partials.footer')
        <!-- End Footer
    ============================================= -->

@endsection

@section('scripts')
    <script>
        $(function(){
            $("#form-total").steps({
                headerTag: "h2",
                bodyTag: "section",
                transitionEffect: "fade",
                enableAllSteps: true,
                autoFocus: true,
                transitionEffectSpeed: 500,
                titleTemplate : '<span class="title">#title#</span>',
                labels: {
                    previous : 'Previous',
                    next : 'Next Step',
                    finish : 'Confirm',
                    current : ''
                }
            }); 
        });
    </script>
@endsection
