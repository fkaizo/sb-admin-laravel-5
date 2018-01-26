@extends('layouts.plane') @section('body')
<div id="wrapper">

	<!-- Navigation -->
	<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{ url ('') }}">Owner Management</a>
		</div>
		<!-- /.navbar-header -->

		<ul class="nav navbar-top-links navbar-right">
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">
					<i class="fa fa-user fa-fw"></i>
					<i class="fa fa-caret-down"></i>
				</a>
				<ul class="dropdown-menu dropdown-user">
					<li>
						<a href="#">
							<i class="fa fa-user fa-fw"></i> User Profile</a>
					</li>
					<li>
						<a href="#">
							<i class="fa fa-gear fa-fw"></i> Settings</a>
					</li>
					<li class="divider"></li>
					<li>
						<a href="{{ url ('login') }}">
							<i class="fa fa-sign-out fa-fw"></i> Logout</a>
					</li>
				</ul>
				<!-- /.dropdown-user -->
			</li>
			<!-- /.dropdown -->
		</ul>
		<!-- /.navbar-top-links -->

		<div class="navbar-default sidebar" role="navigation">
			<div class="sidebar-nav navbar-collapse">
				<ul class="nav" id="side-menu">
					<li {{ (Request::is('/') ? 'class="active"' : '') }}>
						<a href="{{ url ('') }}">
							<i class="fa fa-home fa-fw"></i> Home</a>
					</li>
					<li>
						<a href="#">
							<i class="fa fa-cog fa-fw"></i> Owner
							<span class="fa arrow"></span>
						</a>
						<ul class="nav nav-second-level">
							<li {{ (Request::is('*ownerManager') ? 'class="active"' : '') }}>
								<a href="{{ url('/ownerManager') }}">Gestores</a>
							</li>
							<li {{ (Request::is('*ownerFranchise') ? 'class="active"' : '') }}>
								<a href="{{ url('/ownerFranchise') }}">Franchises</a>
							</li>
						</ul>
						<!-- /.nav-second-level -->
					</li>

					<li {{ (Request::is( '*franchise') ? 'class="active"' : '') }}>
						<a href="#">
							<i class="fa fa-certificate fa-fw"></i> Franchises
							<span class="fa arrow"></span>
						</a>
						<ul class="nav nav-second-level">
						@foreach ($franchiseList as $item)
							<li>
								<a href="#">{{$item->nome}}
									<span class="fa arrow"></span>
								</a>
								<ul class="nav nav-third-level">
									<li>
										<a href="{{ url('/franchise/gestor/list') }}">Gestores</a>
									</li>
									<li>
										<a href="{{ url('/franchise/cliente/list') }}">Clientes</a>
									</li>
									<li>
										<a href="{{ url('/franchise/veiculo/list') }}">Veiculos</a>
									</li>
								</ul>
							</li>
						@endforeach
						</ul>
					</li>


				</ul>
			</div>
			<!-- /.sidebar-collapse -->
		</div>
		<!-- /.navbar-static-side -->
	</nav>


	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">@yield('page_heading')</h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<div class="row">
			@yield('section')

		</div>
		<!-- /#page-wrapper -->
	</div>
</div>
@stop