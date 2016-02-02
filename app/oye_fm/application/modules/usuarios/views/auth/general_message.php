<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>Info Oye Fm</title>

        <meta name="description" content="500 Error Page" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>application/third_party/assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>application/third_party/assets/font-awesome/4.2.0/css/font-awesome.min.css" />

        <!-- page specific plugin styles -->

        <!-- text fonts -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>application/third_party/assets/fonts/fonts.googleapis.com.css" />

        <!-- ace styles -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>application/third_party/assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

        <!--[if lte IE 9]>
                <link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
        <![endif]-->

        <!--[if lte IE 9]>
          <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
        <![endif]-->

        <!-- inline styles related to this page -->

        <!-- ace settings handler -->
        <script src="<?php echo base_url(); ?>application/third_party/assets/js/ace-extra.min.js"></script>

        <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

        <!--[if lte IE 8]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="no-skin">
        <div class="main-container" id="main-container">
            <script type="text/javascript">
                try {
                    ace.settings.check('main-container', 'fixed')
                } catch (e) {
                }
            </script>

            <div class="main-content">
                <div class="main-content-inner">
                    <div class="breadcrumbs" id="breadcrumbs">
                        <script type="text/javascript">
                            try {
                                ace.settings.check('breadcrumbs', 'fixed')
                            } catch (e) {
                            }
                        </script>

                        <div class="page-content">
                            <div class="row">
                                <div class="col-xs-12">
                                    <!-- PAGE CONTENT BEGINS -->

                                    <div class="error-container">
                                        <div class="well">
                                            <h1 class="grey lighter smaller">
                                                <span class="blue bigger-125">
                                                    <i class="ace-icon fa fa-random"></i>
                                                    500
                                                </span>
                                                <?php echo $titulo ?>
                                            </h1>

                                            <hr />
                                            <h3 class="lighter smaller">
                                                <?php echo $info ?>
                                                <i class="ace-icon fa fa-wrench icon-animated-wrench bigger-125"></i>
                                            </h3>

                                            <div class="space"></div>

                                            <div>
                                                <ul class="list-unstyled spaced inline bigger-110 margin-15">
                                                    <li>
                                                        <i class="ace-icon fa fa-hand-o-right blue"></i>
                                                        <?php echo $auth_message ?>
                                                    </li>
                                                </ul>
                                            </div>

                                            <hr />
                                            <div class="space"></div>

                                            <div class="center">
                                                <a href="<?php echo base_url('usuarios/auth/logout'); ?>" class="btn btn-primary">
                                                    <i class="ace-icon fa fa-arrow-left"></i>
                                                    Volver al Login
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- PAGE CONTENT ENDS -->
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div><!-- /.page-content -->
                    </div>
                </div><!-- /.main-content -->

                <div class="footer">
                    <div class="footer-inner">
                        <div class="footer-content">
                            <span class="bigger-120">
                                <span class="blue bolder">Oyefm</span>
                                Aplicacion web &copy; 2015-2016
                            </span>

                            &nbsp; &nbsp;
                            <span class="action-buttons">
                                <a href="#">
                                    <i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
                                </a>

                                <a href="#">
                                    <i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
                                </a>

                                <a href="#">
                                    <i class="ace-icon fa fa-rss-square orange bigger-150"></i>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>

                <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
                    <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
                </a>
            </div><!-- /.main-container -->

            <!-- basic scripts -->

            <!--[if !IE]> -->
            <script src="<?php echo base_url(); ?>application/third_party/assets/js/jquery.2.1.1.min.js"></script>

            <!-- <![endif]-->

            <!--[if IE]>
    <script src="assets/js/jquery.1.11.1.min.js"></script>
    <![endif]-->

            <!--[if !IE]> -->
            <script type="text/javascript">
                            window.jQuery || document.write("<script src='<?php echo base_url(); ?>application/third_party/assets/js/jquery.min.js'>" + "<" + "/script>");
            </script>

            <!-- <![endif]-->

            <!--[if IE]>
    <script type="text/javascript">
    window.jQuery || document.write("<script src='assets/js/jquery1x.min.js'>"+"<"+"/script>");
    </script>
    <![endif]-->
            <script type="text/javascript">
                if ('ontouchstart' in document.documentElement)
                    document.write("<script src='<?php echo base_url(); ?>application/third_party/assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
            </script>
            <script src="<?php echo base_url(); ?>application/third_party/assets/js/bootstrap.min.js"></script>

            <!-- page specific plugin scripts -->

            <!-- ace scripts -->
            <script src="<?php echo base_url(); ?>application/third_party/assets/js/ace-elements.min.js"></script>
            <script src="<?php echo base_url(); ?>application/third_party/assets/js/ace.min.js"></script>

            <!-- inline scripts related to this page -->
    </body>
</html>
