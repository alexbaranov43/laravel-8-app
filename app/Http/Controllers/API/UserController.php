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
        //if user not admin abort
        if (auth()->user()->role_id !== 2) {
            abort(403);
        }

        $data = $request->data;

        $user = new User([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role_id' => $data['role_id']
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
        // if (!auth()->user()) {
        //     abort(403);
        // }

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
        if (!auth()->user()->role_id() !== 2) {
            abort(403);
        }

        if (User::where('id', $id)->exists()) {
            $user::find($id);
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
