<?php declare(strict_types=1);

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\{ UserLoginRequest, UserRegisterRequest};
use Illuminate\Http\{JsonResponse, Response};
use Illuminate\Support\Facades\Hash;
use App\Models\User;

/**
 * Class AuthController
 * @package App\Http\Controllers\API
 */
class AuthController extends Controller
{
    /**
     * @param UserRegisterRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(UserRegisterRequest $request):JsonResponse
    {
        $user = new User;
        $user->fill($request->all());
        $user->password = Hash::make($request->email);
        $user->save();
        $user->token = $user->createToken($request->email)->accessToken;

        return \response()->json( ['message'=> 'success', 'user' => $user],
            Response::HTTP_CREATED);
    }

    /**
     * @param UserLoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(UserLoginRequest $request):JsonResponse
    {
        $user = User::whereEmail($request->email)->first();
        $user->token = $user->createToken($request->email)->accessToken;

        return \response()->json(['message' => 'success', $user],
            Response::HTTP_OK);
    }
}
