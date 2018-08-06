@extends('layouts.app')


@section('content')

<div class="container" id="app">
	<div class="row">
		<div class="col-md-12">
			<h1>@{{ message }}</h1>
			<div class="panel panel-primary">
				<div class="panel-heading">

					<div class="row">
						<div class="col-md-10">
							<h3 class="panel-title">
								Experience
							</h3>
						</div>
						<div class="col-md-2 text-right">
							<button class="btn btn-success">
								Ajouter
							</button>
						</div>
					</div>



					
				</div>
				<div class="panel-body">
					<ul class="list-group">

						<li class="list-group-item" v-for="experience in experiences">
							<div class="pull-right">
								<button class="btn btn-warning btn-sm">
								Editer	
								</button>
							</div>
							<h3>@{{experience.titre }}</h3>
							<p>@{{experience.body}}</p>
							<small>@{{experience.debut }} - @{{experience.fin }}</small>
						</li>
						
					

					</ul>
				</div>
			</div>
			<hr>
			<div class="panel panel-primary">
				<div class="panel-heading">


					<div class="row">
						<div class="col-md-10">
							<h3 class="panel-title">
								Formation
							</h3>
						</div>
						<div class="col-md-2 text-right">
							<button class="btn btn-success">
								Ajouter
							</button>
						</div>
					</div>
					
				</div>
				<div class="panel-body">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</div>
			</div>

			<hr>
			<div class="panel panel-primary">
				<div class="panel-heading">

					<div class="row">
						<div class="col-md-10">
							<h3 class="panel-title">
								Portefolio
							</h3>
						</div>
						<div class="col-md-2 text-right">
							<button class="btn btn-success">
								Ajouter
							</button>
						</div>
					</div>
					
				</div>
				<div class="panel-body">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</div>
			</div>


			<hr>

			<div class="panel panel-primary">
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-10">
							<h3 class="panel-title">
								Competence
							</h3>
						</div>
						<div class="col-md-2 text-right">
							<button class="btn btn-success">
								Ajouter
							</button>
						</div>
					</div>
					
				</div>
				<div class="panel-body">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</div>
			</div>
			<hr>


		</div>
	</div>
</div>

@endsection


@section('js_scripts')

<script type="text/javascript" src="{{asset('js/vue.js')}}"></script>
<script type="text/javascript" src="{{asset('js/axios.min.js')}}"></script>
<script type="text/javascript">
	var app = new Vue({
		el:'#app',
		data:{
			message:'je suis Youssef Imzoughene',
			experiences:[]
		},
		methods:{
			getExperiences : function(){
				axios.get('http://localhost:8000/getexperiences')
				.then(response => {
					this.experiences=response.data;
					console.log(response.data)
				})
				.catch(error => {
					console.log("error : "+error)
				})
			}
		},
		mounted:function(){
			this.getExperiences();
		}
	});

</script>
@endsection
