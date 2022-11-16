<!DOCTYPE html>
<html lang="en">
@include('dashboard.layouts.assets')
@yield('inline-css')

<body class="bg-light">

	<!-- Boxed layout wrapper -->
	<div class="d-flex flex-column flex-1 ">
        @include('dashboard.layouts.header')
		<!-- Page content -->
		<div class="page-content">
            @include('dashboard.layouts.sidebar')
            <!-- Main content -->
            <div class="content-wrapper">

                @yield('content')


                @include('dashboard.layouts.footer')

            </div>
            <!-- /main content -->
            
		</div>
		<!-- /page content -->

	</div>
	<!-- /boxed layout wrapper -->
    {{-- @include('dashboard.layouts.additional.datatable') --}}
    @yield('inline-js')
</body>
</html>
