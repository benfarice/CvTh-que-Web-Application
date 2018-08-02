<!DOCTYPE html>
<html>
<head>
	<title>Imzoughene</title>
</head>
<body>
	<!--<pre>
		-{print_r($contacts)}}
	</pre>-->
	<h1>Liste des Contacts</h1>
	<ul>
		@foreach($contacts as $contact)
		<li>
			<h3>{{$contact->name}}</h3>
			<p>{{$contact->message}}</p>
			<hr>
		</li>
		@endforeach
	</ul>
</body>
</html>