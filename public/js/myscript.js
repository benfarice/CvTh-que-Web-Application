var app = new Vue({
		el:'#myapp',
		data:{
			message:'je suis Youssef Imzoughene',
			experiences:[],
			formations:[],
			competences:[],
			projets:[],
			open:{
				experience:false,
				formation:false,
				competence:false,
				projet:false
			},
			experience:{
				id:0,
				cv_id:window.Laravel.IdExperience,
				titre:'',
				body:'',
				debut:'',
				fin:''
			},
			formation:{
				id:0,
				cv_id:window.Laravel.IdExperience,
				titre:'',
				description:'',
				debut:'',
				fin:''
			},
			competence: {
				id:0,
				cv_id:window.Laravel.IdExperience,
				titre:'',
				description:''
			},
			projet:{
				id:0,
				cv_id:window.Laravel.IdExperience,
				titre:'',
				description:'',
				lien:'',
				image:''
			},
			edit:{
				experience:false,
				formation:false,
				competence:false,
				projet:false
			}
		},
		methods:{
			getData : function(){
				axios.get(window.Laravel.url+'/getData/'+window.Laravel.IdExperience)
				.then(response => {
					this.experiences=response.data[0];
					this.formations=response.data[1];
					this.competences=response.data[3];
					this.projets=response.data[2];
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
						this.open.experience = false;

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
			addFormation : function(){
				axios.post(window.Laravel.url+'/add_formation',this.formation)
				.then(response => {
					if(response.data.etat){
						this.open.formation = false;

						this.formation.id = response.data.id;


						this.formations.push(this.formation);
						this.formation = {
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
			addCompetence : function(){
				axios.post(window.Laravel.url+'/add_competence',this.competence)
				.then(response => {
					if(response.data.etat){
						this.open.competence = false;

						this.competence.id = response.data.id;


						this.competences.push(this.competence);
						this.competence = {
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
			addProjet : function(){
				axios.post(window.Laravel.url+'/add_projet',this.projet)
				.then(response => {
					if(response.data.etat){
						this.open.projet = false;

						this.projet.id = response.data.id;


						this.projets.push(this.projet);
						this.projet = {
							id:0,
							cv_id:window.Laravel.IdExperience,
							titre:'',
							body:'',
							debut:'',
							fin:'',
							lien:'',
							image:''
						}
					}
					console.log(response.data)
				})
				.catch(error => {
					console.log("error : "+error)
				})
			},
			editExperience : function(exp){
				this.open.experience = true;
				this.edit.experience = true;
				this.experience = exp;
			},
			editFormation : function(exp){
				this.open.formation = true;
				this.edit.formation = true;
				this.formation = exp;
			},
			editCompetence : function(exp){
				this.open.competence = true;
				this.edit.competence = true;
				this.competence = exp;
			},
			editProjet : function(exp){
				this.open.projet = true;
				this.edit.projet = true;
				this.projet = exp;
			},
			updateExperience : function(){
				axios.put(window.Laravel.url+'/update_experience',this.experience)
				.then(response => {
					if(response.data.etat){
						this.open.experience = false;
					
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
					this.edit.experience = false;
				})
				.catch(error => {
					console.log("error : "+error)
				})
			},
			updateFormation : function(){
				axios.put(window.Laravel.url+'/update_formation',this.formation)
				.then(response => {
					if(response.data.etat){
						this.open.formation = false;
					
						this.formation = {
							id:0,
							cv_id:window.Laravel.IdExperience,
							titre:'',
							body:'',
							debut:'',
							fin:''
						}
					}
					console.log(response.data)
					this.edit.formation = false;
				})
				.catch(error => {
					console.log("error : "+error)
				})
			},
			updateCompetence : function(){
				axios.put(window.Laravel.url+'/update_competence',this.competence)
				.then(response => {
					if(response.data.etat){
						this.open.competence = false;
					
						this.competence = {
							id:0,
							cv_id:window.Laravel.IdExperience,
							titre:'',
							body:'',
							debut:'',
							fin:''
						}
					}
					console.log(response.data)
					this.edit.competence = false;
				})
				.catch(error => {
					console.log("error : "+error)
				})
			},
			updateProjet : function(){
				axios.put(window.Laravel.url+'/update_projet',this.projet)
				.then(response => {
					if(response.data.etat){
						this.open.projet = false;
					
						this.competence = {
							id:0,
							cv_id:window.Laravel.IdExperience,
							titre:'',
							body:'',
							debut:'',
							fin:'',
							lien:'',
							image:''
						}
					}
					console.log(response.data)
					this.edit.projet = false;
				})
				.catch(error => {
					console.log("error : "+error)
				})
			},
			deleteExperience : function(exp){




				swal({
				  title: 'Etes vous ?',
				  text: "De supprimer cette experience ?",
				  type: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Oui, Supprimer!'
				}).then((result) => {
				  if (result.value) {


				  	axios.delete(window.Laravel.url+'/deleteExperience/'+exp.id)
					.then(response => {
						if(response.data.etat){
						
							var position = this.experiences.indexOf(exp);
							this.experiences.splice(position,1);
						}
						console.log(response.data)
						
					})
					.catch(error => {
						console.log("error : "+error)
					})
				    swal(
				      'Deleted!',
				      'Your file has been deleted.',
				      'success'
				    )
				  }
				})










				
			},deleteFormation : function(exp){

				swal({
				  title: 'Etes vous ?',
				  text: "De supprimer cette formation ?",
				  type: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Oui, Supprimer!'
				}).then((result) => {
				  if (result.value) {


				  	axios.delete(window.Laravel.url+'/delete_formation/'+exp.id)
					.then(response => {
						if(response.data.etat){
						
							var position = this.formations.indexOf(exp);
							this.formations.splice(position,1);
						}
						console.log(response.data)
						
					})
					.catch(error => {
						console.log("error : "+error)
					})
				    swal(
				      'Deleted!',
				      'Your file has been deleted.',
				      'success'
				    )
				  }
				})		
			},deleteCompetence : function(exp){

				swal({
				  title: 'Etes vous ?',
				  text: "De supprimer cette formation ?",
				  type: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Oui, Supprimer!'
				}).then((result) => {
				  if (result.value) {


				  	axios.delete(window.Laravel.url+'/delete_competence/'+exp.id)
					.then(response => {
						if(response.data.etat){
						
							var position = this.competences.indexOf(exp);
							this.competences.splice(position,1);
						}
						console.log(response.data)
						
					})
					.catch(error => {
						console.log("error : "+error)
					})
				    swal(
				      'Deleted!',
				      'Your file has been deleted.',
				      'success'
				    )
				  }
				})		
			},deleteProjet : function(exp){

				swal({
				  title: 'Etes vous ?',
				  text: "De supprimer cette Projet ?",
				  type: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Oui, Supprimer!'
				}).then((result) => {
				  if (result.value) {


				  	axios.delete(window.Laravel.url+'/delete_projet/'+exp.id)
					.then(response => {
						if(response.data.etat){
						
							var position = this.projets.indexOf(exp);
							this.projets.splice(position,1);
						}
						console.log(response.data)
						
					})
					.catch(error => {
						console.log("error : "+error)
					})
				    swal(
				      'Deleted!',
				      'Your file has been deleted.',
				      'success'
				    )
				  }
				})		
			},
			validateForm(scope){
				this.$validator.validateAll(scope).then((result)=>{
					if(result){
						if(this.edit.experience==false)
						this.addExperience();
					}
				});
			}
		},
		mounted:function(){
			this.getData();
		}
	});