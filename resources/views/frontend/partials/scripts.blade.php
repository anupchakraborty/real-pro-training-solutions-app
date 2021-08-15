<!-- jQuery Frameworks
    ============================================= -->
    <!-- Jquery -->
    {{-- <script src="{{asset('frontend/assets/js/jquery.min.js')}}"></script> --}}
    <script src="{{ asset('frontend/assets/js/jquery-1.12.4.min.js') }}"></script>
    {{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> --}}
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/equal-height.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.appear.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/modernizr.custom.13711.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/count-to.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/loopcounter.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootsnav.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
    <!-- toster JavaScript -->
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <!-- alertify JavaScript -->
    <script src="{{asset('frontend/assets/js/alertify.min.js')}}"></script>
    <!-- JQurey Step js -->
    <script src="{{asset('frontend/jquery.steps.js')}}"></script>

    @yield('scripts')

    <script>
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    function addTocart(course_id, user_id){

        // alert(course_id);
            $.post( "http://127.0.0.1:8000/api/carts/store",
                {
                user_id: user_id,
                course_id: course_id
                })
                .done(function( data ) {
                    //alert("Data Loaded:" + data);
                 data = JSON.parse(data);

                //console.log(data);
                if(data.status == 'success'){
                    //toast
                    alertify.set('notifier','position', 'top-center');
                    alertify.success('Item added to cart successfully !! Total Items: '+data.totalItems+ '<br />To checkout <a href="{{ route('carts') }}">go to checkout page</a>');
                    // header-middele cart count
                    $("#total_items").html(data.totalItems);
                }
            });
        }
    </script>
