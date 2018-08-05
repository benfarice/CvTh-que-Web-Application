@extends('layouts.app')


@section('content')
<div class="container">
	@if(count($errors))
	<div class="alert alert-danger" role="alert">
		<ul>
			@foreach($errors->all() as $e)
			<li>
				{{$e}}
			</li>
			@endforeach
		</ul>
	</div>
	@endif
	<div class="row">
		<div class="col-md-12">
			<form action="{{ url('cvs/'.$cv->id) }}" method="post" 
				enctype="multipart/form-data">
				<input type="hidden" name="_method" value="PUT">
				{!! csrf_field() !!}
				<div class="form-group">
					<label for="">Titre</label>
					<input type="text"  class="form-control" value="{{$cv->titre}}" name="titre">
				</div>
				<div class="form-group">
					<label for="">Présentation</label>
					<textarea class="form-control" name="presentation">{{$cv->presentation}}</textarea>
				</div>
				<div class="form-group">
					<label>Image</label>
					<input type="file" class="form-control" name="photo">
				</div>
				<div class="form-group">
					
					<input type="submit"  class="form-control btn btn-danger" value="Modifier">
				</div>
			</form>
		</div>
	</div>
</div>

@endsection