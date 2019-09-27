<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,
    Redirect,
    Response,
    File;
use Socialite;
use App\User;

class SocialController extends Controller {

    public function redirect($provider) {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider) {
        $getInfo = Socialite::driver($provider)->user();
        $user = $this->createUser($getInfo, $provider);
        auth()->login($user);
        return redirect()->to('/home');
    }

    function createUser($getInfo, $provider) {
        $user = User::where('provider_id', $getInfo->id)->first();
        if (!$user) {
            $user = User::create([
                        'name' => $getInfo->name,
                        'email' => $getInfo->email,
                        'typeuser' => $provider,
                        'provider_id' => $getInfo->id,
                        'status' => '0',
                        'register' => date('Y-m-d H:i:s')
            ])->assignRole('user');
        }
        return $user;
    }

}
