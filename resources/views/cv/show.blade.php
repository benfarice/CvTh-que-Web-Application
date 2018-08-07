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
							<button class="btn btn-success" v-on:click="open = true">
								Ajouter
							</button>
						</div>
					</div>



					
				</div>
				<div class="panel-body">

					<div v-if="open">
						<div class="form-group">
							<label for="titre">Titre</label>
							<input type="text" placeholder="le Titre" name="" id="titre" class="form-control" v-model="experience.titre">
						</div>

						<div class="form-group">
							<label for="contenu">contenu</label>
							<textarea placeholder="le contenu" name="" id="contenu" class="form-control" v-model="experience.body"></textarea>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="debut">Date debut</label>
									<input type="date" class="form-control" name="" placeholder="debut" id="debut"
									v-model="experience.debut">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="fin">Date fin</label>
									<input type="date" class="form-control" name="" placeholder="fin" id="fin" v-model="experience.fin">
								</div>
							</div>
						</div>


						<button v-if="edit" class="btn btn-danger btn-block" @click="updateExperience">
							Modifier
						</button>

						<button v-else class="btn btn-info btn-block" @click="addExperience">
							Ajouter
						</button>

						
					</div>







					<ul class="list-group">

						<li class="list-group-item" v-for="experience in experiences">
							<div class="pull-right">
								<button class="btn btn-warning btn-sm" @click="editExperience(experience)">
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


	window.Laravel = {!! json_encode(
		[
			'csrfOken'    => csrf_token(),
			'IdExperience'=>$id,
			'url'         => url('/')
		]
		) !!};





	var app = new Vue({
		el:'#app',
		data:{
			message:'je suis Youssef Imzoughene',
			experiences:[],
			open:false,
			experience:{
				id:0,
				cv_id:window.Laravel.IdExperience,
				titre:'',
				body:'',
				debut:'',
				fin:''
			},
			edit:false
		},
		methods:{
			getExperiences : function(){
				axios.get(window.Laravel.url+'/getexperiences/'+window.Laravel.IdExperience)
				.then(response => {
					this.experiences=response.data;
					console.log(response.data)
				})
				.catch(error => {
					console.log("error : "+error)
				})
			},
			addExperience : function(){
				axios.post(window.Laravel.url+'/addexperience',this.experience)
				.then(response => {
					if(response.data.etat){
						this.open = false;

						this.experience.id = response.data.id;


						this.experiences.push(this.experience);
						this.experience = {
							id:0,
							cv_id:window.Laravel.IdExperience,
							titre:'',
							body:'',
							debut:'',
							fin:''
						}
					}
					console.log(response.data)
				})
				.catch(error => {
					console.log("error : "+error)
				})
			},
			editExperience : function(exp){
				this.open = true;
				this.edit = true;
				this.experience = exp;
			},
			updateExperience : function(){
				axios.put(window.Laravel.url+'/update_experience',this.experience)
				.then(response => {
					if(response.data.etat){
						this.open = false;
					
						this.experience = {
							id:0,
							cv_id:window.Laravel.IdExperience,
							titre:'',
							body:'',
							debut:'',
							fin:''
						}
					}
					console.log(response.data)
					this.edit = false;
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
