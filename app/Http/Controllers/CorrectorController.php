<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CorrectorController extends Controller
{
    //
    public function corregir(Request $request) {
        
    
        $preguntas=$request->all();
          
        return view('corrector',compact('preguntas'));
    
    }

}
