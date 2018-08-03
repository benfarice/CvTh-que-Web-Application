<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cv;

use App\Http\Requests\cvRequest;

class CvController extends Controller
{
	//Lister les cvs
    public function index(){
        $listCvs = Cv::all();
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
         $cv->save();
         return redirect('cvs');
    	
    }
    //permet de récupérer un cv puis de le mettre dans le formulaire
    public function edit($id){
    	$cv = Cv::find($id);
        return view('cv.edit',['cv'=>$cv]);
    }
    //permet de modifier un cv
    public function update(cvRequest $request,$id){
    	 $cv = Cv::find($id);
         $cv->titre = $request->input('titre');
         $cv->presentation = $request->input('presentation');
         $cv->save();
         return redirect('cvs');
    }
    //permet de supprimer un cv
    public function destroy(Request $request,$id){
    	//return $request->all();
        $cv = Cv::find($id);
        $cv->delete();
        return redirect('cvs');
    }
}
