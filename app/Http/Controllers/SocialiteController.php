<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SocialiteController extends Controller
{
    public function redirect(Request $request)
    {
        $driver = $request->get('driver');

        if (data_get(config('services'), $driver) && data_get(config('services'), $driver . '.client_id')) {
            return Socialite::driver($driver)->with(['driver' => $driver])->redirect();
        }

        return redirect(config('app.socialite_redirect.error'));
    }

    public function callback(Request $request)
    {
        $driver = $request->get('driver');

        if (data_get(config('services'), $driver) && data_get(config('services'), $driver . '.client_id')) {
            $socialiteUser = Socialite::driver($driver)->user();

            $user = User::updateOrCreate([
                'socialite_id' => $socialiteUser->id,
            ], [
                'name' => $socialiteUser->name ?? data_get($socialiteUser, 'nickname', $socialiteUser->email),
                'email' => $socialiteUser->email,
                'socialite_token' => $socialiteUser->token,
                'socialite_refresh_token' => $socialiteUser->refreshToken,
            ]);

            Auth::login($user);

            return redirect(config('app.socialite_redirect.success'));
        }
        return redirect(config('app.socialite_redirect.error'));
    }
}
