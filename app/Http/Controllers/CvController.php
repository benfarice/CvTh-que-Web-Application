<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

use App\Cv;
use App\Experience;
use App\Formation;
use App\Competence;
use App\Projet;


use Auth;

use App\Http\Requests\cvRequest;

class CvController extends Controller
{

    public function __construct(){
         $this->middleware('auth');
    }





	//Lister les cvs
    public function index(){
        //$listCvs = Cv::all();
        //$listCvs = Cv::where('user_id',Auth::user()->id)->get();

        if(Auth::user()->is_admin){
            $listCvs = Cv::all();
        }else{
            $listCvs=Auth::user()->cvs;

        }



        //$listCvs=Auth::user()->cvs;
        return view('cv.index',
            ['cvs'=>$listCvs]);
    }
    //Affiche le formulaire de creation de cv
    public function create(){
    	return view('cv.create');
    }
    //Enregister un cv
    public function store(cvRequest $request){
        //return $request->all();
        $cv = new Cv();
        $cv->titre = $request->input('titre');
        $cv->presentation = $request->input('presentation');
        $cv->user_id=Auth::user()->id;
       

        if($request->hasfile('photo')){
             $cv->photo = $request->photo->store('image');

        }


        

        $cv->save();


         session()->flash('success','Le cv à été bien enregistré !!');

         return redirect('cvs');
    	
    }
    //permet de récupérer un cv puis de le mettre dans le formulaire
    public function edit($id){
    	$cv = Cv::find($id);

        $this->authorize('update',$cv);

        return view('cv.edit',['cv'=>$cv]);
    }
    //permet de modifier un cv
    public function update(cvRequest $request,$id){
    	 $cv = Cv::find($id);
         $cv->titre = $request->input('titre');
         $cv->presentation = $request->input('presentation');
         if($request->hasfile('photo')){
             $cv->photo = $request->photo->store('image');

         }
         $cv->save();
         return redirect('cvs');
    }
    //permet de supprimer un cv
    public function destroy(Request $request,$id){
    	//return $request->all();
        $cv = Cv::find($id);
        $this->authorize('delete',$cv);
        $cv->delete();
        return redirect('cvs');
    }

    public function show($id){
        return view('cv.show',['id'=>$id]);
    }

    public function getData($id){
        $cv =  Cv::find($id);
        return 
        [
            $cv->experiences()->orderBy('debut','desc')->get(),
            $cv->formations()->orderBy('debut','desc')->get(),
            $cv->projets()->get(),
            $cv->competences()->get(),
        ];



    }

    public function addexperience(Request $request){
        $experience = new Experience;
        $experience->titre = $request->titre;
        $experience->body  = $request->body;
        $experience->debut = $request->debut;
        $experience->fin  = $request->fin;
        $experience->cv_id  = $request->cv_id;

        $experience->save();

        return Response()->json([
            'etat' => true,
            'id'   => $experience->id
        ]);
    }

    public function add_formation(Request $request){
        $f = new Formation;
        $f->titre = $request->titre;
        $f->body  = $request->body;
        $f->debut = $request->debut;
        $f->fin  = $request->fin;
        $f->cv_id  = $request->cv_id;

        $f->save();

        return Response()->json([
            'etat' => true,
            'id'   => $f->id
        ]);
    }

    public function add_competence(Request $request){
        $f = new Competence;
        $f->titre = $request->titre;
        $f->body  = $request->body;
       
        $f->cv_id  = $request->cv_id;

        $f->save();

        return Response()->json([
            'etat' => true,
            'id'   => $f->id
        ]);
    }

    public function add_projet(Request $request){
        $f = new Projet;
        $f->titre = $request->titre;
        $f->body  = $request->body;

        $f->lien = $request->lien;
        $f->image  = $request->image;
       
        $f->cv_id  = $request->cv_id;

        $f->save();

        return Response()->json([
            'etat' => true,
            'id'   => $f->id
        ]);
    }

    function update_experience(Request $request){
        $experience = Experience::find($request->id);
        $experience->titre = $request->titre;
        $experience->body  = $request->body;
        $experience->debut = $request->debut;
        $experience->fin  = $request->fin;
        $experience->cv_id  = $request->cv_id;

        $experience->save();

        return Response()->json([
            'etat' => true,
            'id'   => $experience->id
        ]);
    }

    function update_formation(Request $request){
        $f = Formation::find($request->id);
        $f->titre = $request->titre;
        $f->body  = $request->body;
        $f->debut = $request->debut;
        $f->fin  = $request->fin;
        $f->cv_id  = $request->cv_id;

        $f->save();

        return Response()->json([
            'etat' => true,
            'id'   => $f->id
        ]);
    }

    function update_competence(Request $request){
        $f = Competence::find($request->id);
        $f->titre = $request->titre;
        $f->body  = $request->body;
      
        $f->cv_id  = $request->cv_id;

        $f->save();

        return Response()->json([
            'etat' => true,
            'id'   => $f->id
        ]);
    }

     function update_projet(Request $request){
        $f = Projet::find($request->id);
        $f->titre = $request->titre;
        $f->body  = $request->body;
      
        $f->cv_id  = $request->cv_id;

        $f->save();

        return Response()->json([
            'etat' => true,
            'id'   => $f->id
        ]);
    }

    function deleteExperience(Request $request,$id){
        $exp = Experience::find($id);
        $exp->delete();
        return Response()->json([
            'etat' => true,
            
        ]);

    }

     function deleteFormation(Request $request,$id){
        $exp = Formation::find($id);
        $exp->delete();
        return Response()->json([
            'etat' => true,
            
        ]);

    }

     function delete_competence(Request $request,$id){
        $exp = Competence::find($id);
        $exp->delete();
        return Response()->json([
            'etat' => true,
            
        ]);

    }

     function delete_projet(Request $request,$id){
        $exp = Projet::find($id);
        $exp->delete();
        return Response()->json([
            'etat' => true,
            
        ]);

    }

    
}
