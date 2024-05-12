<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Actions\CreateUserAction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use App\Http\Resources\UserResource;
use App\Models\User;

class AuthController extends Controller
{
    protected $createUserAction;
    protected $cookie;
    protected $cookiePath = '/';
    protected $cookieDomain;
    protected $secureCookie = false;
    protected $httpOnlyCookie = false;
    protected $adminService;


    public function __construct(CreateUserAction $createUserAction)
    {
        $this->createUserAction = $createUserAction;
        $this->cookie = config('cookie.user_cookie');
        $this->cookieDomain = config('cookie.domain');
    }

    public function register(Request $request)
    {
        $user = $this->createUserAction->execute($request);
        Auth::login($user);

        return response()->json($user, 201);
    }
    public function login(Request $request)
    {
        $token = null;
        $legacyToken = null;
        // If the user is authenticated in middleware
        if (Auth::user()) {
            $agent = Auth::user();
            // $token = Cookie::get('token') ?? $agent->createToken('breez')->plainTextToken;
            // $legacyToken = Cookie::get('breez_1');
        } else {
            $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string',
                'remember' => 'boolean',
            ]);

            $agent = User::where('email', $request->email)->first();

            $token = $agent->createToken('laravelApp8')->plainTextToken;
            Auth::login($agent);
        }

        $cookieDuration = $request->remember ? config('cookie.duration.30_days') : config('cookie.duration.7_days');
        $token = $agent->createToken('laravelApp8')->plainTextToken;

        return response()->json(new UserResource($agent));
        // ->cookie($this->cookie, $legacyToken ?: Cookie::get('byt_cd') ?? AuthHelper::generateLegacyAuthCookie($agent), $cookieDuration, $this->cookiePath, $this->cookieDomain, $this->secureCookie, $this->httpOnlyCookie)
        // ->cookie('token', $token, $cookieDuration, $this->cookiePath, $this->cookieDomain, $this->secureCookie, $this->httpOnlyCookie);
    }
}
