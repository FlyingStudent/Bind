<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrganizedLoginRequest;
use App\Http\Requests\OrganizedRequest;
use App\Http\Resources\OrganizedResource;
use App\Models\UserModel;
use Carbon\Carbon;
// TODO(Hassan): change the name to planner.
class OrganizedController extends BaseController
{
    //sign up
   public function register(OrganizedRequest $request)
    {
        $user = new UserModel($request->all());
        $user->save();
        $expiresIn = $request->has('remember') ? Carbon::now()->addWeeks(1) : Carbon::now()->addHours(2);
        $accessToken = $user->createToken('MyApp')->accessToken;
        $token = $user->tokens->last();
        $token->expires_at = $expiresIn;
        $token->save();
        $data['token'] = $accessToken;
        $data['token_type'] = 'Bearer';
        $data['user'] = new OrganizedResource($user);
        return $this->sendResponse($accessToken, "Registration Done");
    }

    //sign in
    public function login(OrganizedLoginRequest $request)
    {
        $user = UserModel::where('email', $request->email)->first();
        if (!$user) {
            return $this->sendError("this email is false");
        }
        if ($request->password != $user->password) {
            return $this->sendError("this password is false");
        }
        $accessToken = $user->createToken('authToken')->accessToken;
        $data['token'] = $accessToken;
        $data['token_type'] = 'Bearer';
        $data['user'] = new OrganizedResource($user);
        return $this->sendResponse($data, "Login successfully");
    }

}
