    
    <!-- Start Fun Factor 
    ============================================= -->
    <div class="fun-factor-area default-padding bottom-less text-center bg-fixed shadow dark-hard" style="background-image: url(assets/img/banner/2.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 item">
                    <div class="fun-fact">
                        <div class="icon">
                            <i class="flaticon-contract"></i>
                        </div>
                        <div class="info">
                            <span class="timer" data-to="212" data-speed="5000"></span>
                            <span class="medium">National Awards</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 item">
                    <div class="fun-fact">
                        <div class="icon">
                            <i class="flaticon-professor"></i>
                        </div>
                        <div class="info">
                            @php
                                $teachers = App\Models\Admin::where('username','teacher')->get();
                                $total_teacher = count($teachers);
                            @endphp
                            <span class="timer" data-to="{{ $total_teacher }}" data-speed="5000"></span>
                            <span class="medium">Best Teachers</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 item">
                    <div class="fun-fact">
                        <div class="icon">
                            <i class="flaticon-online"></i>
                        </div>
                        <div class="info">
                            @php
                                $students = App\Models\Order::select('user_id')->get();
                                $total_enroll_student = count($students);
                            @endphp
                            <span class="timer" data-to="{{ $total_enroll_student }}" data-speed="5000"></span>
                            <span class="medium">Students Enrolled</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 item">
                    <div class="fun-fact">
                        <div class="icon">
                            <i class="flaticon-reading"></i>
                        </div>
                        <div class="info">
                            @php
                                $courses = App\Models\Course::select('id')->get();
                                $total_courses = count($courses);
                            @endphp
                            <span class="timer" data-to="{{ $total_courses }}" data-speed="5000"></span>
                            <span class="medium">Cources</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Fun Factor -->