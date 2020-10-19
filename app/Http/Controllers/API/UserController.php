<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::select('users.id', 'users.name', 'users.email', 'r.role')
        ->join('roles as r', 'r.id', '=', 'users.role_id')
        ->get();

        return new UserCollection($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //  @todo validate data
        $this->validate($request, [
            'name' => 'required|max:100',
            'email' => 'required|max:100',
            'password' => 'required|max:100',
            'role_id' => 'required|integer'
        ]);

        if (User::where('email', '=', $request->get('email'))->first()) {
            return response()->json('User Email already taken');
        }

        $user = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'role_id' => $request->get('role_id')
        ]);

        $user->save();

        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        if (!auth()->user()) {
            abort(403);
        }

        if (User::where('users.id', $id)->exists()) {
            $user = User::select('users.id', 'users.name', 'users.email', 'r.role')
            ->join('roles as r', 'r.id', '=', 'users.role_id')
            ->where('users.id', $id)
            ->first();
            return new UserResource($user);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $user_name = $request->get('name');
        $role_id = $request->get('role_id');
        if ($role_id !== 1 || $role_id !== 2) {
            abort(401);
        }
        if (User::where('id', $id)->exists()) {
            $user = User::select('*')
            ->where('id', $id)
            ->first();

            if ($user->name == $user_name || is_null($user_name) || $user_name == '') {
                abort(401);
            }

            $user->name = $user_name;
            $user->role_id = $role_id;
            $user->save();
            
            return new UserResource($user);
        } else {
            abort(404);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if (User::where('id', $id)->exists()) {
            $user = User::find($id);
            $user->delete();

            return response()->json([
                'message' => 'User was deleted'
            ], 202);
        } else {
            return response()->json([
                'message' => 'User was not found'
            ], 404);
        }

    }
}
