<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Cart;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
         $request->authenticate();

        $request->session()->regenerate();
        $url='';
        if($request->user()->role==='admin'){

            $url='admin/dashboard';

        }
        elseif($request->user()->role==='vendor'){

            $url='vendor/dashboard';

        }
        elseif($request->user()->role==='user'){
            if (session()->has('temp_user')) {
                $tempUserId = session()->get('temp_user');
                $loggedInUserId = Auth::id();
                Cart::where('user_id', $tempUserId)
                    ->where('status', 1)
                    ->update(['user_id' => $loggedInUserId]);
                     session()->forget('temp_user');
            }
           $url='/checkout/page';

        }

        return redirect()->intended($url);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        session(['temp_user' => rand(1, 1000)]);

        return redirect('/');
    }
}
