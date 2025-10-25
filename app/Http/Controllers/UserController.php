<?php

namespace App\Http\Controllers;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        return UserResource::collection( User::lazy(5));
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);


        $request->validate([
            'name' => 'bail|required|string|max:255',
            'email' => 'bail|required|string|email|unique:users',
            'password' => 'bail|sometimes|string',
        ]);
        $user->update($request->all());
        return new UserResource($user);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( User $user)
    {
        $this->authorize('delete', $user);
        $user->delete();
        PersonalAccessToken::where('tokenable_id', $user->id)->delete();//to delete all the tokens for the user
        return response()->json(null, 204);
    }
}
