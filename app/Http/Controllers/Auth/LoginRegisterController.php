<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Register;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class LoginRegisterController extends Controller
{
    /**
     * Instantiate a new LoginRegisterController instance.
     */
    

    /**
     * Display a registration form.
     *
     * @return \Illuminate\Http\Response
     */

    public function register()
    {
        $user = DB::table('users')->get();
        return view('auth.register', ['user' => $user]);
    }

    public function register2()
    {
        return view('layouts.auth.register-1');
    }

    // public function gfg($a)
    // {
    //     return view('formpengetahuan.gfg', ['articleName' => $a]);
    // }

    // public function pengetahuan($pel)
    // {
    //     $def = 'pengetahuan';
    //     $matpel = $pel ?: $def;
    //     $pengetahuan = DB::table($matpel)->get();
    //     return view('formpengetahuan.pai', ['pengetahuan' => $pengetahuan]);
    // }

    public function keterampilan()
    {
        $keterampilan = DB::table('keterampilan')->get();
        return view('formketerampilan.index', ['keterampilan' => $keterampilan]);
    }

    /**
     * Store a new login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:logins',
            'password' => 'required|min:8|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        // $credentials = $request->only('email', 'password');
        // Auth::attempt($credentials);
        // $request->session()->regenerate();
        return redirect()->route('register');
        // ->withSuccess('You have successfully registered & logged in!');
    }

    /**
     * Display a login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('layouts.auth.login');
    }

    /**
     * Authenticate the login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->route('dashboard')
                ->withSuccess('You have successfully logged in!');
        }

        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');

    } 
    
    /**
     * Display a dashboard to authenticated logins.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        if(Auth::check())
        {
            $siswa = DB::table('siswa')->get();
            return view('dashboard.index', ['siswa' => $siswa]);
        }
        
        return redirect()->route('login')
            ->withErrors([
            'email' => 'Please login to access the dashboard.',
        ])->onlyInput('email');
    } 
    
    /**
     * Log out the login from application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('You have logged out successfully!');;
    }    

    public function destroy($id)
	{
		$user = Register::find($id);
		$user->delete();
		return redirect('/register');
	}

    public function update($id, Request $request)
	{
		$user = Register::find($id);
		$user->update($request->except(['_token','submit']));
		return redirect('/register');
	}
}
