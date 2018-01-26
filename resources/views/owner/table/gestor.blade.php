@extends('layouts.dashboard') 
@section('page_heading','Lista gestores - '.$owner->nome) 
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
			<table class="table table-striped">
				<thead>
					<tr>
						<th style="width:5%">N.</th>
						<th>Nome</th>
						<th>Email</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($managers as $item)
						<tr>
							<td>{{++$i}}</td>
							<td>{{$item->nome}}</td>
							<td>{{$item->email}}</td>
							<td>detalhes</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			{!! $managers->links() !!}
		</div>
	</div>

</div>
@stop