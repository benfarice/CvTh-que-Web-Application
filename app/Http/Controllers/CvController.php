<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

use App\Cv;
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

    
}
