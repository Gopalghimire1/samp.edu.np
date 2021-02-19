<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="description" content="Azukation - A complete School Erp" />
    <meta name="keywords" content="keyword1,keyword2,keyword3,keyword4,keyword5" />
    <meta name="author" content="Chhatraman Shrestha" />

    <!-- Page Title -->
    <title><?php echo $__env->yieldContent('title'); ?></title>

    <!-- Favicon and Touch Icons -->
    <link href="/assettheme1/images/favicon.png" rel="shortcut icon" type="image/png">
    <link href="/assettheme1/images/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="/assettheme1/images/apple-touch-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
    <link href="/assettheme1/images/apple-touch-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">
    <link href="/assettheme1/images/apple-touch-icon-144x144.png" rel="apple-touch-icon" sizes="144x144">

    <!-- Stylesheet -->
    <link href="/assettheme1/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/assettheme1/css/jquery-ui.min.css" rel="stylesheet" type="text/css">
    <link href="/assettheme1/css/animate.css" rel="stylesheet" type="text/css">
    <link href="/assettheme1/css/css-plugin-collections.css" rel="stylesheet" />
    <!-- CSS | menuzord megamenu skins -->
    <link href="/assettheme1/css/menuzord-megamenu.css" rel="stylesheet" />
    <link id="menuzord-menu-skins" href="/assettheme1/css/menuzord-skins/menuzord-boxed.css" rel="stylesheet" />
    <!-- CSS | Main style file -->
    <link href="/assettheme1/css/style-main.css" rel="stylesheet" type="text/css">
    <!-- CSS | Preloader Styles -->
    <link href="/assettheme1/css/preloader.css" rel="stylesheet" type="text/css">
    <!-- CSS | Custom Margin Padding Collection -->
    <link href="/assettheme1/css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">
    <!-- CSS | Responsive media queries -->
    <link href="/assettheme1/css/responsive.css" rel="stylesheet" type="text/css">
    <!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
    <!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->

    <!-- Revolution Slider 5.x CSS settings -->
    <link href="/assettheme1/js/revolution-slider/css/settings.css" rel="stylesheet" type="text/css" />
    <link href="/assettheme1/js/revolution-slider/css/layers.css" rel="stylesheet" type="text/css" />
    <link href="/assettheme1/js/revolution-slider/css/navigation.css" rel="stylesheet" type="text/css" />

    <!-- CSS | Theme Color -->
    <link href="/assettheme1/css/colors/theme-skin-color-set1.css" rel="stylesheet" type="text/css">
    <link href="/asset/css/toastem.css" rel="stylesheet">


    <?php echo $__env->yieldContent('style'); ?>

    <script src="/assettheme1/js/jquery-2.2.4.min.js"></script>
    <script src="/assettheme1/js/jquery-ui.min.js"></script>
    <?php echo $__env->yieldContent('script1'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script src="https://www.chartjs.org/samples/latest/utils.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>


<body>

    <?php echo $__env->make('front.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="main-content">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <?php echo $__env->make('front.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div id="toastem"></div>

    <!-- external javascripts -->
    <script src="/assettheme1/js/bootstrap.min.js"></script>
    <!-- JS | jquery plugin collection for this theme -->
    <script src="/assettheme1/js/jquery-plugin-collection.js"></script>
    <!-- JS | Custom script for all pages -->
    <script src="/assettheme1/js/custom.js"></script>
    <script src="/assettheme1/js/extra.js"></script>

    <?php echo $__env->yieldContent('script2'); ?>


    <script type="text/javascript" src="/asset/js/custom.js"></script>
    <script src="/assets/js/axios.min.js"></script>
    <script src="/asset/js/toastem.js"></script>

    <?php $h_set = new Controllers\AuthManager(); ?>
    <?php if($h_set->isLoged()): ?>
        <script>
            axios.defaults.headers.common['session_key'] = '<?php echo e($h_set->getAuth()->session_key); ?>';
            // axios.defaults.headers.get['session_key'] = '<?php echo e($h_set->getAuth()->session_key); ?>';
            var session_key = "<?php echo e($h_set->getAuth()->session_key); ?>";

        </script>
        <?php if($h_set->getAuth()->role > 0): ?>
            <script src="https://www.gstatic.com/firebasejs/5.9.0/firebase.js"></script>
            <script type="text/javascript" src="/assettheme1/js/firebase.js"></script>
        <?php endif; ?>
    <?php endif; ?>
    <?php echo $__env->yieldContent('script'); ?>

    <script>
        var items = $(".menuzord-menu").children();
     

        for (let index = 0; index < items.length; index++) {
            const element = items[index];
            $(element).removeClass("active");
         

            var lichild = element.querySelector("a");
            if(lichild!=null){

              if (lichild.href == location.href) {
                  $(element).addClass("active");
                  break;
              }
            
            }
        }

    </script>
</body>

</html>
