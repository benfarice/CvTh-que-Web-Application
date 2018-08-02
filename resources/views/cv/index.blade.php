@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>La liste de mes CVs</h1>
			<div class="pull-right">
				<a class="btn btn-success" href="{{ url('cvs/create')}}">Nouveau cv</a>
			</div>
			<table class="table">
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
						<td>{{$cv->titre}}</td>
						<td>{{$cv->presentation}}</td>
						<td>{{$cv->created_at}}</td>
						<td>
							
							<form action="{{ url('cvs/'.$cv->id)}}" method="post">
							{{csrf_field()}}
							{{ method_field('DELETE')}}
							<a href="" class="btn btn-primary">Details</a>
							<a href="{{url('cvs/'.$cv->id.'/edit')}}" class="btn btn-default">Editer</a>
							<button type="submit" class="btn btn-danger">Supprimer</button>
							</form>

							
						</td>
					</tr>
					@endforeach
				</tbody>

			</table>
		</div>
	</div>
</div>

@endsection