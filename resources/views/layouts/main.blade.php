@include("layouts.header")

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include("layouts.sidebar")
        <!-- End of Sidebar -->

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include("layouts.navbar")
                <!-- End of Topbar -->

                <!-- Begin Page Content -->

                <!----Modal start here---->
                @include("layouts.modal")
                <!--- Modal end here ------>

                @yield('main_content')

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!------ Footer start---->
        @include("layouts.footer")
        <!------ Footer end---->
