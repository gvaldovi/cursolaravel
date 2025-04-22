<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $num = 70;
        $data = '';
        $names=[];
        return view('directives', compact('num', 'data','names'));
    }

    public function data(){
        //$users = DB::select('select * from users');  //SQL
        //$users = DB::table('users')->get(); //Query Builder
        $users = User::get(); //Eloquent
        $users = User::where('id', '>', 5)->get();
        //dd($users);

        //$usr = DB::select('select * from users where id = ?', [2]);  //SQL
        //$usr = DB::table('users')->where('id',5)->firstOrFail(); //Query Builder  
        //$usr = DB::table('users')->pluck('email');
        //$usr = DB::table('users')->where('name','Juan')->exists(); 
        $query = DB::table('users')->select('name as nombre','lastname as apellidos'); 
        $usr = $query->addSelect('email')->get();

        //$usr = User::find(2);

        dd($users);

        return view('data', compact('users', 'usr'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->name);
        /*DB::table('users')->insert([
            [
            'name' => 'Pepe', 
            'lastname' => 'Valencia',
            'email' => 'pepev@pepe.com', 
            'phone' => '+5299999999',
            'password' => Hash::make('1234'), //'1234'
            ],
            [            
                'name' => 'Juanita', 
                'lastname' => 'Lopez',
                'email' => 'juan@juan.com', 
                'phone' => '+5299999999',
                'password' => Hash::make('1234'), //'1234');        
            ]
        ]);
        $user = new User;
        $user->name = 'Pepe';
        $user->lastname = 'Valencia';
        $user->email = 'pepeeee@pepe.com';
        $user->phone = '+5299999999';
        $user->password = Hash::make('1234');
        $user->save();
        $dato = [
            'name' => 'Pepe', 
            'lastname' => 'Valencia',
            'email' => 'pepevvv@pepe.com', 
            'phone' => '+5299999999',
            'password' => Hash::make('1234'),
        ];

        $user = new User;
        $user->fill($dato);
        $user->save();
*/       $dato = [
            'name' => $request->name, 
            'lastname' => $request->lastname,
            'email' => $request->email, 
            'phone' => $request->phone,            
            'password' => Hash::make($request->password),
        ];
        User::create($dato);
        
        return 'Guardado';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'name' => 'Pepe', 
            'lastname' => 'Valencia',
            'phone' => '+5299999999',
        ];
        /*DB::table('users')->where('id', $id)->update(['name' => 'Jose', 'lastname' => 'Salas',]);  */
        $user = User::find($id);
        //$user->name = 'Christian';
        //$user->lastname = 'Valdivia';
        $user->fill($data);
        $user->save();


        return 'Actualizado';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //DB::table('users')->where('id', $id)->delete();
        $user = User::find($id);
        $user->delete();
        //User::where('id', $id)->delete();

        return 'Eliminado';
    }
}
