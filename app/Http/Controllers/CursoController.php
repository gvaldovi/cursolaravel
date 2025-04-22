<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function show(Request $request){
        $nom = $request->input('name');
        return view('welcome', ['nombre' => $nom]);
    }

    public function index(){
        //$x = 20;
        //$y = 30;
        //echo 'La suma es: '. $this->sumar($x, $y);
        $name = 'Juan';
        $lastname = 'Rodríguez';
        $age = 35;
        /*return view('layout.child', [
            'name' => $name, 
            'lastname' => $lastname, 
            'age' => $age
        ]);
        
        return view('layout.child')->with('name', $name)
                                ->with('lastname', $lastname)
                                ->with('age', $age);
        */
        return view('layout.child', compact('name', 'lastname', 'age'));

    }


    public function sumar($x, $y){
        return $x + $y;
    }
}
