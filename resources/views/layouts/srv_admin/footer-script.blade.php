<!-- begin::Global Config(global config for global JS sciprts) -->
<script>
    var KTAppOptions = {
        "colors": {
            "state": {
                "brand": "#5d78ff",
                "light": "#ffffff",
                "dark": "#282a3c",
                "primary": "#5867dd",
                "success": "#34bfa3",
                "info": "#36a3f7",
                "warning": "#ffb822",
                "danger": "#fd3995"
            },
            "base": {
                "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
            }
        }
    };
</script>

<!-- end::Global Config -->

<!--begin::Global Theme Bundle(used by all pages) -->
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('/') }}admin_res/plugins/global/plugins.bundle.js" type="text/javascript"></script>
<script src="{{ asset('/') }}admin_res/js/scripts.bundle.js" type="text/javascript"></script>

<!--end::Global Theme Bundle -->

<script>
    var is_click = true;
    var pd = 0;
    var mg = '-315px';
    $('#kt_aside_toggler_desktop').click(function() {
        // alert('dw');
        // $('#kt_content').toggleClass('kt_aside_p0 kt_aside_p1',1000);

        if (is_click) {
            pd = '0px';
            mg = '-315px';
        } else {
            pd = '255px';
            mg = '0';
        }
        is_click = !is_click;

        // $('#kt_aside').fadeToggle('fast',function(){

        // });

        $('#kt_aside').animate({
            marginLeft: mg
        }, 1000);

        $('#kt_content').animate({
            paddingLeft: pd
        }, 1000);


    });

    $(window).resize(function() {

        if ($(window).width() <= 1025) {

            is_click = true;

            $('#kt_aside').animate({
                marginLeft: '0px'
            }, 1000);

            $('#kt_content').animate({
                paddingLeft: '0px'
            }, 1000);

        } else {
            // $('#kt_aside').animate({
            //     marginLeft: mg
            // }, 1000);

            // $('#kt_content').animate({
            //     paddingLeft: pd
            // }, 1000);
        }

    });

    // $('#kt_aside_toggler_desktop').click(function() {
    //     // alert('dw');
    //     // $('#body_page').toggleClass('kt-aside--enabled kt-aside--disabled');
    //     $('#kt_aside').toggle('fast',
    //     function() {
    //         $('#kt_content').animate(
    //             {paddingLeft: '0px'},1000
    //         );
    //     },
    //     function() {
    //         $('#kt_content').animate(
    //             {paddingLeft: '255px'},1000
    //         );
    //     });

    // });
</script>
@yield('script-bottom')

<script>
    let listen = Echo.join('channel-active');
</script>
