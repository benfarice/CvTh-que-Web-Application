@extends('layouts.app')


@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form action="{{ url('cvs/'.$cv->id) }}" method="post">
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
					
					<input type="submit"  class="form-control btn btn-danger" value="Modifier">
				</div>
			</form>
		</div>
	</div>
</div>

@endsection