<!DOCTYPE html>
<html class="no-js">
    <head>
        <!-- Basic Page Needs
        ================================================== -->
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="icon" href="favicon.ico">
        <title>Documentación</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">
        <!-- Mobile Specific Metas
        ================================================== -->
        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        
        <!-- Template CSS Files
        ================================================== -->
        <!-- Select2 -->
      <link rel="stylesheet" href="<?php echo base_url() ?>bower_components/select2/dist/css/select2.min.css">
        <!-- Theme style -->
      <link rel="stylesheet" href="<?php echo base_url() ?>css/AdminLTE.css">
        <!-- Twitter Bootstrs CSS -->
        <link rel="stylesheet" href="<?php echo base_url() ?>plugins/bootstrap/bootstrap.min.css">
        <!-- Ionicons Fonts Css -->
        <link rel="stylesheet" href="<?php echo base_url() ?>plugins/ionicons/ionicons.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url() ?>bower_components/font-awesome/css/font-awesome.min.css">
        <!-- animate css -->
        <link rel="stylesheet" href="<?php echo base_url() ?>plugins/animate-css/animate.css">
        <!-- Hero area slider css-->
        <link rel="stylesheet" href="<?php echo base_url() ?>plugins/slider/slider.css">
        <!-- owl craousel css -->
        <link rel="stylesheet" href="<?php echo base_url() ?>plugins/owl-carousel/owl.carousel.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>plugins/owl-carousel/owl.theme.css">
        <!-- Fancybox -->
        <link rel="stylesheet" href="<?php echo base_url() ?>plugins/facncybox/jquery.fancybox.css">
        <!-- template main css file -->
        <link rel="stylesheet" href="<?php echo base_url() ?>css/style.css">
        <!-- HIGHTLIGHT CODE CKEDITOR -->
        <link href="<?php echo base_url() ?>bower_components/ckeditor/plugins/codesnippet/lib/highlight/styles/default.css" rel="stylesheet">
        <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.8.0/highlight.min.js"></script>
        <script>hljs.initHighlightingOnLoad();</script>

    <!-- Template Javascript Files
    ================================================== -->
    <!-- jquery -->
    <script src="<?php echo base_url() ?>plugins/jQurey/jquery.min.js"></script>
    <!-- Form Validation -->
    <script src="<?php echo base_url() ?>plugins/form-validation/jquery.form.js"></script> 
    <script src="<?php echo base_url() ?>plugins/form-validation/jquery.validate.min.js"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url() ?>bower_components/select2/dist/js/select2.js"></script>
    <!-- owl carouserl js -->
    <script src="<?php echo base_url() ?>plugins/owl-carousel/owl.carousel.min.js"></script>
    <!-- bootstrap js -->
    <script src="<?php echo base_url() ?>plugins/bootstrap/bootstrap.min.js"></script>
    <!-- wow js -->
    <script src="<?php echo base_url() ?>plugins/wow-js/wow.min.js"></script>
    <!-- slider js -->
    <script src="<?php echo base_url() ?>plugins/slider/slider.js"></script>
    <!-- Fancybox -->
    <script src="<?php echo base_url() ?>plugins/facncybox/jquery.fancybox.js"></script>
    <!-- template main js -->
    <script src="<?php echo base_url() ?>js/main.js"></script>
    <!-- CK Editor -->
    <script src="<?php echo base_url() ?>bower_components/ckeditor/ckeditor.js"></script>
        <link href='<?php echo base_url() ?>/bower_components/css/fullcalendar-4.1.0/packages/core/main.css' rel='stylesheet' />
    <link href='<?php echo base_url() ?>/bower_components/css/fullcalendar-4.1.0/packages/daygrid/main.css' rel='stylesheet' />
    <link href='<?php echo base_url() ?>/bower_components/css/fullcalendar-4.1.0/packages/timegrid/main.css' rel='stylesheet' />
    <link href='<?php echo base_url() ?>/bower_components/css/fullcalendar-4.1.0/packages/list/main.css' rel='stylesheet' />
    <script src='<?php echo base_url() ?>/bower_components/fullcalendar-4.1.0/packages/core/main.js'></script>
    <script src='<?php echo base_url() ?>/bower_components/fullcalendar-4.1.0/packages/core/locales-all.js'></script>
    <script src='<?php echo base_url() ?>/bower_components/fullcalendar-4.1.0/packages/interaction/main.js'></script>
    <script src='<?php echo base_url() ?>/bower_components/fullcalendar-4.1.0/packages/daygrid/main.js'></script>
    <script src='<?php echo base_url() ?>/bower_components/fullcalendar-4.1.0/packages/timegrid/main.js'></script>
    <script src='<?php echo base_url() ?>/bower_components/fullcalendar-4.1.0/packages/list/main.js'></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var initialTimeZone = 'local';
        var timeZoneSelectorEl = document.getElementById('time-zone-selector');
        var loadingEl = document.getElementById('loading');
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
          plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
          // timeZone: initialTimeZone,
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
          },
          defaultDate: '2019-04-12',
          locale: 'es',
          navLinks: true, // can click day/week names to navigate views
          editable: true,
          selectable: true,
          eventLimit: true, // allow "more" link when too many events
          events: {
            url: '<?php echo base_url() ?>/bower_components/fullcalendar-4.1.0/php/get-events.php',
            failure: function() {
              document.getElementById('script-warning').style.display = 'inline'; // show
            }
          },
          loading: function(bool) {
            if (bool) {
              loadingEl.style.display = 'inline'; // show
            } else {
              loadingEl.style.display = 'none'; // hide
            }
          },

          dateClick: function(arg) {
            console.log('dateClick', calendar.formatIso(arg.date));
          },
          select: function(arg) {
            console.log('select', calendar.formatIso(arg.start), calendar.formatIso(arg.end));
          }
        });
        
        var timeout = setTimeout(function() {
          console.log('calendar', calendar)
          // calendar.gotoDate(new Date(2018, 8, 1))
        }, 1200)
     
        calendar.render();

        // when the timezone selector changes, dynamically change the calendar option
        // timeZoneSelectorEl.addEventListener('change', function() {
        //   calendar.setOption('timeZone', this.value);
        // });

      });


    </script>
    </head>