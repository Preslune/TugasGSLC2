<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class ExternalAuthController extends Controller
{
    public function Facebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackFromFacebook()
    {

    $user = Socialite::driver('facebook')->user();

    $authUser = User::updateOrCreate([
        'facebook_id' => $user->getId(),
    ],[
        'name' => $user->getName(),
        'email' => $user->getEmail(),
        'password' => Hash::make($user->getName().'@'.$user->getId())
        ]);

    Auth()->login($authUser, true);

    Cookie::queue(
        'loggedUser',
        Auth::user()->name,
        60
    );

    return redirect()->route('home-page');
   }

   public function Google()
   {
       return Socialite::driver('google')->redirect();
   }

   public function callbackFromGoogle()
   {

   $user = Socialite::driver('google')->user();

   $authUser = User::updateOrCreate([
       'google_id' => $user->getId(),
   ],[
       'name' => $user->getName(),
       'email' => $user->getEmail(),
       'password' => Hash::make($user->getName().'@'.$user->getId())
       ]);

   Auth()->login($authUser, true);

   Cookie::queue(
       'loggedUser',
       Auth::user()->name,
       60
   );

   return redirect()->route('home-page');
  }

}
