{{-- <script src="{{ asset('assets/frontend/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script> --}}

<!-- JS here -->
<!-- All JS Custom Plugins Link Here here -->
<script src="{{ asset('assets/frontend/js/vendor/modernizr-3.5.0.min.js') }}"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="{{ asset('assets/frontend/js/vendor/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
<!-- Jquery Mobile Menu -->
<script src="{{ asset('assets/frontend/js/jquery.slicknav.min.js') }}"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="{{ asset('assets/frontend/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/slick.min.js') }}"></script>
<!-- One Page, Animated-HeadLin -->
<script src="{{ asset('assets/frontend/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/animated.headline.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.magnific-popup.js') }}"></script>

<!-- Nice-select, sticky -->
<script src="{{ asset('assets/frontend/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.sticky.js') }}"></script>

<!-- contact js -->
<script src="{{ asset('assets/frontend/js/contact.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.form.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/mail-script.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.ajaxchimp.min.js') }}"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="{{ asset('assets/frontend/js/plugins.js') }}"></script>
<script src="{{ asset('assets/frontend/js/main.js') }}"></script>
<script>
    function navCat() {
        var html = "";
        jQuery.ajax({
            url: '{{ url("/ParentNav") }}',
            type: 'GET',
            dataType: 'JSON',
            success: function(data) {
                $.each(data, function(index, value) {
                    html += '<li><a href="/category/'+value['slug']+'">'+value['name']+'</a></li>';
                });
                $("#category").html(html);
            }
        });
    }
    navCat();
</script>
