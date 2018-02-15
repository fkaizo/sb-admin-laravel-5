@extends('layouts.dashboard') @section('page_heading',$owner->nome.' - Lista Gestores') @section('section')
<div class="col-sm-12">
		@if (session('success'))
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="alert alert-success alert-dismissable" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
				<p class="text-center"><strong>Feito!</strong> Novo Gestor gravado com sucesso.</p>
					<p class="text-center"><a href="{{url('ownerManager/'.session('success'))}}" class="alert-link">Visualizar</a></p>
				
			</div>
		</div>
	</div>
	@endif
	<div class="row">
		<div class="col-sm-12">
			<a href="{{ route('ownerManager.create')}}">
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