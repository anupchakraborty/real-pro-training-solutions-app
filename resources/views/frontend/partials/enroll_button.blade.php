<form class="form-inline" action="{{ route('carts.store') }}" method="POST">
    @csrf

    @if(!empty(Auth::guard('web')->user()->id))
        <input type="hidden" name="user_id" value="{{ Auth::guard('web')->user()->id }}">

        <input type="hidden" name="course_id" value="{{ $course->id }}">
        <a type="button" title="Enroll Now" onclick="addTocart({{ $course->id }},{{ Auth::user()->id }})">Enroll Now</a>
    @else
        <a type="button" title="Enroll Now" onclick="addTocart({{ $course->id }})">Enroll Now</a>
    @endif
</form>
