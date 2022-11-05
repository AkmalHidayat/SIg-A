<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    @include('Admin.template.head')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        @include('Admin.template.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('Admin.template.mainside')

        <!-- Content Wrapper. Contains page content -->
        @include('Admin.template.wrapper')
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        @include('Admin.template.control')
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        @include('Admin.template.footer')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    @include('Admin.template.script')
</body>

</html>
