@extends('layouts.app')


@section('content')

<div class="container" id="myapp">
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
							<button class="btn btn-success" v-on:click="open.experience = true">
								Ajouter
							</button>
						</div>
					</div>



					
				</div>


				<!-- Panel Experience-->

				<div class="panel-body">

					<div v-if="open.experience">
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


						<button v-if="edit.experience" class="btn btn-danger btn-block" @click="updateExperience">
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

								<button class="btn btn-danger btn-sm" @click="deleteExperience(experience)">
								Supprimer	
								</button>
							</div>
							<h3>@{{experience.titre }}</h3>
							<p>@{{experience.body}}</p>
							<small>@{{experience.debut }} - @{{experience.fin }}</small>
						</li>
						
					

					</ul>
				</div>


				<!-- End Panel Experience -->


				


				
				
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
							<button class="btn btn-success" v-on:click="open.formation = true">
								Ajouter
							</button>
						</div>
					</div>
					
				</div>
					<!-- Formation Panel -->
					<div class="panel-body">

					<div v-if="open.formation">
						<div class="form-group">
							<label for="titre">Titre</label>
							<input type="text" placeholder="le Titre" name="" id="titre" class="form-control" v-model="formation.titre">
						</div>

						<div class="form-group">
							<label for="contenu">contenu</label>
							<textarea placeholder="le contenu" name="" id="contenu" class="form-control" v-model="formation.body"></textarea>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="debut">Date debut</label>
									<input type="date" class="form-control" name="" placeholder="debut" id="debut"
									v-model="formation.debut">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="fin">Date fin</label>
									<input type="date" class="form-control" name="" placeholder="fin" id="fin" v-model="formation.fin">
								</div>
							</div>
						</div>


						<button v-if="edit.formation" class="btn btn-danger btn-block" @click="updateFormation">
							Modifier
						</button>

						<button v-else class="btn btn-info btn-block" @click="addFormation">
							Ajouter
						</button>

						
					</div>







					<ul class="list-group">

						<li class="list-group-item" v-for="formation in formations">
							<div class="pull-right">
								<button class="btn btn-warning btn-sm" @click="editFormation(formation)">
								Editer	
								</button>

								<button class="btn btn-danger btn-sm" @click="deleteFormation(formation)">
								Supprimer	
								</button>
							</div>
							<h3>@{{formation.titre }}</h3>
							<p>@{{formation.body}}</p>
							<small>@{{formation.debut }} - @{{formation.fin }}</small>
						</li>
						
					

					</ul>
				</div>


				<!-- End Formation Panel-->
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
							<button class="btn btn-success" v-on:click="open.projet = true">
								Ajouter
							</button>
						</div>
					</div>
					
				</div>
				<!-- Projet Panel -->
					<div class="panel-body">

					<div v-if="open.projet">
						<div class="form-group">
							<label for="titre">Titre</label>
							<input type="text" placeholder="le Titre" name="" id="titre" class="form-control" v-model="projet.titre">
						</div>

						<div class="form-group">
							<label for="contenu">contenu</label>
							<textarea placeholder="le contenu" name="" id="contenu" class="form-control" v-model="projet.body"></textarea>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="lien">Lien</label>
									<input type="text" class="form-control" name="" placeholder="Lien" id="lien"
									v-model="experience.lien">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="image">Image</label>
									<input type="file" class="form-control" name="" id="image" >
									<!-- v-model="experience.image" -->
								</div>
							</div>
						</div>


						<button v-if="edit.projet" class="btn btn-danger btn-block" @click="updateProjet">
							Modifier
						</button>

						<button v-else class="btn btn-info btn-block" @click="addProjet">
							Ajouter
						</button>

						
					</div>







					<ul class="list-group">

						<li class="list-group-item" v-for="projet in projets">
							<div class="pull-right">
								<button class="btn btn-warning btn-sm" @click="editProjet(projet)">
								Editer	
								</button>

								<button class="btn btn-danger btn-sm" @click="deleteProjet(projet)">
								Supprimer	
								</button>
							</div>
							<h3>@{{projet.titre }}</h3>
							<p>@{{projet.body}}</p>
							<a :href="projet.lien">Voir .......</a>

							<img :src="projet.image">
						</li>
						
					

					</ul>
				</div>


				<!-- End Projet Panel  -->
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
							<button class="btn btn-success" v-on:click="open.competence = true">
								Ajouter
							</button>
						</div>
					</div>
					
				</div>
				<!-- Competence Panel -->
					<div class="panel-body">

					<div v-if="open.competence">
						<div class="form-group">
							<label for="titre">Titre</label>
							<input type="text" placeholder="le Titre" name="" id="titre" class="form-control" v-model="competence.titre">
						</div>

						<div class="form-group">
							<label for="contenu">contenu</label>
							<textarea placeholder="le contenu" name="" id="contenu" class="form-control" v-model="competence.body"></textarea>
						</div>

					


						<button v-if="edit.competence" class="btn btn-danger btn-block" @click="updateCompetence">
							Modifier
						</button>

						<button v-else class="btn btn-info btn-block" @click="addCompetence">
							Ajouter
						</button>

						
					</div>







					<ul class="list-group">

						<li class="list-group-item" v-for="competence in competences">
							<div class="pull-right">
								<button class="btn btn-warning btn-sm" @click="editCompetence(competence)">
								Editer	
								</button>

								<button class="btn btn-danger btn-sm" @click="deleteCompetence(competence)">
								Supprimer	
								</button>
							</div>
							<h3>@{{competence.titre }}</h3>
							<p>@{{competence.body}}</p>
						
						</li>
						
					

					</ul>
				</div>


				<!-- End Competence Panel  -->
			</div>
			<hr>


		</div>
	</div>
</div>

@endsection


@section('js_scripts')

<script type="text/javascript" src="{{asset('js/vue.js')}}"></script>
<script type="text/javascript" src="{{asset('js/axios.min.js')}}"></script>

<script type="text/javascript" src="{{asset('js/sweetalert2.js')}}"></script>
<script type="text/javascript">
	window.Laravel = {!! json_encode(
		[
			'csrfOken'    => csrf_token(),
			'IdExperience'=>$id,
			'url'         => url('/')
		]
		) !!};
</script>
<script type="text/javascript" src="{{asset('js/myscript.js')}}">
</script>
@endsection
