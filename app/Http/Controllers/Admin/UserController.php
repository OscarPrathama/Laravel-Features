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
        $new_user_id = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'notes'     => $request->notes,
            'dob'       => $request->dob,
            'password'  => Hash::make($request->password)
        ])->id;

        return redirect()->route('admin.users.edit', $new_user_id)->with('success', 'New user added !');

    }

    /**
     * Edit user
     * 
     * @param   int $id
     * @return  View
    */
    public function edit(int $id){
        $data['user'] = User::findOrFail($id);

        return view('admin.users.edit', $data);
    }

    /**
     * Update user
     * 
     * @param   Request     $request
     * @param   int         $id
     * @return  Response
    */
    public function update(UserRequest $request, int $id){

        $user = User::findOrFail($id);
        
        $user->update([
            'name'      => $request->name,
            'email'     => $request->email,
            'notes'     => $request->notes,
            'dob'       => $request->dob,
            'password'  => Hash::make($request->password)
        ]);

        return redirect()->route('admin.users.edit', $id)->with('success', 'User updated !');
    }

    /**
     * Delete user
     * 
     * @param   int     $id
     * @return  void
    */
    public function destroy(int $id){
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted!');
    }

}
