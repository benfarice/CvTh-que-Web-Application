@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			@include('partials.flash')
			<h1>La liste de mes CVs</h1>
			<div class="pull-right">
				<a class="btn btn-success" href="{{ url('cvs/create')}}">Nouveau cv</a>
			</div>
			<!--<table class="table">
				<thead>
					<tr>
						<th>Titre</th>
						<th>Présentation</th>
						<th>Date</th>
						<th>actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach($cvs as $cv)
					<tr>
						<td>{-{$cv->titre}}
						<br>
						{-{$cv->user->name}}
						</td>
						<td>{-{$cv->presentation}}</td>
						<td>{-{$cv->created_at}}</td>
						<td>
							
							<form action="{-{ url('cvs/'.$cv->id)}}" method="post">
							{-{csrf_field()}}
							{-{ method_field('DELETE')}}
							<a href="" class="btn btn-primary">Details</a>
							<a href="{-{url('cvs/'.$cv->id.'/edit')}}" class="btn btn-default">Editer</a>
							<button type="submit" class="btn btn-danger">Supprimer</button>
							</form>

							
						</td>
					</tr>
					@endforeach
				</tbody>

			</table>-->
			<div class="row">
				@foreach($cvs as $cv)
				<div class="col-sm-6 col-md-4">
					<div class="thumbnail">
						<img src="{{url('storage/'.$cv->photo)}}" alt="">
						<div class="caption">
							<h3>{{$cv->titre}}</h3>
							<p> {{$cv->presentation}}</p>
							<p>
							<form action="{{ url('cvs/'.$cv->id)}}" method="post">
							{{csrf_field()}}
							{{ method_field('DELETE')}}
							<a href="" class="btn btn-primary">Details</a>


							@can('update',$cv)
							<a href="{{url('cvs/'.$cv->id.'/edit')}}" class="btn btn-default">Editer</a>
							@endcan

							@can('delete',$cv)
							<button type="submit" class="btn btn-danger">Supprimer</button>
							@endcan

							</form>
							</p>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>

@endsection