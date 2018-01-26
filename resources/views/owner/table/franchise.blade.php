@extends('layouts.dashboard')
@section('page_heading','Lista Franchises - '.$owner->nome)
@section('section')
<div class="col-sm-12">
	<div class="row">
		<div class="col-sm-12">
			<a href="{{ url('/owner/franchise/new')}}">
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
						<th>Descrição</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($franchises as $item)
					<tr>
						<td>{{++$i}}</td>
						<td>{{$item->nome}}</td>
						<td>{{$item->descricao}}</td>
						<td>detalhes</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			{!! $franchises->links() !!}
		</div>
	</div>

</div>
@stop