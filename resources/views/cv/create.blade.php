@extends('layouts.app')


@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form action="{{ url('cvs') }}" method="post">
				{!! csrf_field() !!}
				<div class="form-group">
					<label for="">Titre</label>
					<input type="text"  class="form-control" name="titre">
				</div>
				<div class="form-group">
					<label for="">Présentation</label>
					<textarea class="form-control" name="presentation"></textarea>
				</div>
				
				<div class="form-group">
					
					<input type="submit"  class="form-control btn btn-primary" value="Enregistrer">
				</div>
			</form>
		</div>
	</div>
</div>

@endsection