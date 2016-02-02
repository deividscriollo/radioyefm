<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>Oye - Fm Admin</title>

        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>application/third_party/assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>application/third_party/assets/font-awesome/4.2.0/css/font-awesome.min.css" />

        <!-- page specific plugin styles -->

        <!-- text fonts -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>application/third_party/assets/fonts/fonts.googleapis.com.css" />

        <!-- ace styles -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>application/third_party/assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>application/third_party/assets/css/app.css"/>

        <link rel="stylesheet" href="<?php echo base_url(); ?>application/third_party/css/angular-messagebox.css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>application/third_party/css/estilo.css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>application/third_party/css/select2.css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>application/third_party/css/ng-table.min.css"/>

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

        <!-- scripts librerias -->
        <script src="<?php echo base_url(); ?>application/third_party/js/angular.min.js"></script>
        <script src="<?php echo base_url(); ?>application/third_party/js/ui-bootstrap-tpls-0.13.3.min.js"></script>
        <script src="<?php echo base_url(); ?>application/third_party/js/angular-messagebox.js"></script>
        <script src="<?php echo base_url(); ?>application/third_party/js/ng-table.min.js"></script>
        <script src="<?php echo base_url(); ?>application/third_party/js/select2.min.js"></script>
        <script src="<?php echo base_url(); ?>application/third_party/js/select2_locale_es.js"></script>
        <script src="<?php echo base_url(); ?>application/third_party/js/select2sortable.js"></script>
        <script src="<?php echo base_url(); ?>application/third_party/js/jquery.blockUI.js"></script>

        <script src="<?php echo base_url(); ?>application/third_party/js_app/dependencias_angular.js"></script>
        <script src="<?php echo base_url(); ?>application/third_party/js_app/validaciones.js"></script>

        <script>
            var urlAuth = "<?php echo base_url(); ?>" + "usuarios/auth/";
            var urlPanel = '<?= base_url() . 'usuarios/user_panel/' ?>';
        </script>
    </head>

    <?php
    $this->load->view('templates/menu');
    