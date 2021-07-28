    <!-- Start Registration 
    ============================================= -->
    <div class="reg-area default-padding-top bg-gray">
        <div class="container">
            <div class="row">
                <div class="reg-items">
                    <div class="col-md-6 reg-form default-padding-bottom">
                        <div class="site-heading text-left">
                            <h2>Get a Free online Registration</h2>
                            <p>
                                written on charmed justice is amiable farther besides. Law insensible middletons unsatiable for apartments boy delightful unreserved. 
                            </p>
                        </div>
                        <form action="{{ route('student.registation') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control @error('fname') is-invalid @enderror" name="fname" placeholder="Enter First name*" type="text">
                                    </div>
                                    @error('fname')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control @error('lname') is-invalid @enderror" name="lname" placeholder="Enter Last name*" type="text">
                                    </div>
                                    @error('lname')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter Your Email*" type="email">
                                    </div>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        @php
                                            $courses = App\Models\Course::all();
                                        @endphp
                                        <select name="course_id" required>
                                            <option value="1">Chose Your Course</option>
                                            @foreach($courses as $course)
                                                <option value="{{ $course->id }}">{{ $course->title }}</option>                                             
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Enter Your Phone No*" type="text">
                                    </div>
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <button type="submit">
                                        Rigister Now
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 thumb">
                        <img src="{{ asset('frontend/assets/img/contact.png') }}" alt="Thumb">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Registration -->