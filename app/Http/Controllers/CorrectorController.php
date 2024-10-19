<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;

class CorrectorController extends Controller
{
    //
    public function corregir(Request $request) {
        
    
        $preguntas=$request->all();
        
        return view('corrector',compact('preguntas'));
    
    }

}
