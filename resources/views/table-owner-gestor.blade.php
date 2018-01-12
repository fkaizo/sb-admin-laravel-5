@extends('layouts.dashboard')
@section('page_heading','Lista gestor Owner')

@section('section')
<div class="col-sm-12">
		<div class="row">
				<div class="col-sm-12">
						<a href="{{ url('/owner/gestor/new')}}">
							@include('widgets.button', array('value'=>'CADASTRAR', 'class'=>'primary'))
						</a>
				</div>

		</div>
		<hr>
<div class="row">
	<div class="col-sm-12">
		@include('widgets.table', array('class'=>'table-striped'))
	</div>
</div>
	
</div>
@stop