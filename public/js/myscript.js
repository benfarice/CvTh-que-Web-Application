
	





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










				
			}
		},
		mounted:function(){
			this.getExperiences();
		}
	});
