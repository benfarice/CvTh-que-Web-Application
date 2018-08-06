<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Experience;

class ExperienceController extends Controller
{
    public function getExperiences(){
        $experiences = Experience::all();
        return $experiences;
    }
}
