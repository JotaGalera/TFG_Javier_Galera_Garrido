<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class UserController extends Controller
{
    public function index()
    {
        $roles = \App\Role::all();
        $ubicacion = \App\Ubicacion::all();
        return view('user.index', compact('roles','ubicacion'));
    }
    public function findSelect2( Request $request )
    {

        $obj = \App\User::where([
            ['name', 'like', '%' . trim($request->q) . '%']
        ])->get();

        return $obj;

    }
    public function store(Request $request)
    {
        if($request['externo'] == 'on' || !isset($request['externo'])) $request['externo'] = isset($request['externo']) ? 1 : 0;

        $user = \App\User::create([
            'name' => $request['name'],
            'user' => $request['user'],
            'email' => $request['email'],
            'rfid_tag' => $request['rfid_tag'],
            'pin' => $request['pin'],
            'password' => bcrypt($request['password']),
            'externo' => $request['externo']
        ]);

        $user->roles()->attach($request['role']);

        return 1;
    }
    public function show($id)
    {
        $user = \App\User::with('roles')->with('ubicacion')->find($id);
        return json_encode($user);
    }
    public function update(Request $request, $id)
    {
        if($request['externo'] == 'on' || !isset($request['externo'])) $request['externo'] = isset($request['externo']) ? 1 : 0;

        $id = $request->input('id');

        $user = \App\User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->user = $request->get('user');
        $user->rfid_tag = $request->get('rfid_tag');
        $user->pin = $request->get('pin');
        $user->externo = $request['externo'];

        if($request->get('password') != "") $user->password = bcrypt($request->get('password'));
        $user->update();
        $user->roles()->sync($request['role']);
        $user->ubicacion()->sync($request['ubicacion_name']);
        return 1;
    }
    public function destroy($id)
    {
        $user = \App\User::find($id);
        $user->delete();
        return $user;
    }
    public function getDataTable()
    {
        return Datatables::of(\App\User::all())->editColumn("created_at", function($user){
            return date( 'd/m/Y h:i:s', strtotime($user->created_at) );
        })->editColumn("updated_at", function($user){
            return date( 'd/m/Y h:i:s', strtotime($user->updated_at) );
        })->editColumn("externo", function($user){
            $mensajeTXT = '';
            if($user->externo == 1) $mensajeTXT = 'Si'; else $mensajeTXT = 'No' ;
            return $mensajeTXT;
        })->addColumn('action', function($user){
            return '<a href="#" class="btn btn-xs btn-primary edit" id="'.$user->id.'"><i class="fa fa-pencil" aria-hidden="true"></i></a> <a href="#" class="btn btn-xs btn-danger delete" id="'.$user->id.'"><i class="fa fa-trash" aria-hidden="true"></i></a>';
        })->addColumn('roles', function($user){
            $cadena = '';
            foreach ($user->roles as $rol) {
                $cadena .= ' <small class="label bg-primary">'.$rol->name.'</small> ';
            }
            return $cadena;
        })->rawColumns(['action', 'roles'])->make(true);
    }
}
