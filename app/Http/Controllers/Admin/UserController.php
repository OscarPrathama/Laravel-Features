<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    

    /**
     * Users view
     * 
     * @return View
     */
    public function index(){
        $data['title'] = 'Users Index';
        $data['users'] = User::latest()
            -> paginate(10)
            -> onEachSide(1);

        return view('admin.users.index', $data);
    }

    /**
     * Users create view
     * 
     * @return View
     */
    public function create(){
        $data['title'] = 'Create user';

        return view('admin.users.create', $data);
    }

    /**
     * Store user
     * 
     * @param   Request
     * @return  Response
    */
    public function store(UserRequest $request){

        // store data
        $User = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'notes'     => $request->notes,
            'dob'       => $request->dob,
            'password'  => Hash::make($request->password)
        ])->id;

        // return redirect()->route('users.edit', $User)->with('success', 'New user added !');
        return redirect()->route('users.index')->with('success', 'New user added');

    }

    /**
     * Edit user
     * 
     * @param   int $id
     * @return  View
    */
    public function edit(int $id){

    }

    /**
     * Update user
     * 
     * @param   Request     $request
     * @param   int         $id
     * @return  Response
    */
    public function update(Request $request, int $id){
        return null;
    }

    /**
     * Delete user
     * 
     * @param   int     $id
     * @return  void
    */
    public function destroy(int $id){
        return null;
    }

}
