<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Users;
use Illuminate\Support\Facades\Crypt;

class UsersController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('appusers.login');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        return view('appusers.register');
    }

    /**
     * Write code on Method
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector()
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

//        print($request['email']);
//        print($request['password']);

        $appUsers = Users::where('email', $request['email'])->first();
        if (!$appUsers) {
            return redirect("login")->withErrors(['error' => 'You have registered yet. Please complete the registration.']);
        }
        $attributes = $appUsers->toArray($request);
        $decrypted_pass = Crypt::decryptString($attributes['password']);

        if ($request['password'] == $decrypted_pass) {

            session()->start();
            session()->put('user_id', $attributes['id']);
            session()->put('user_name', $attributes['name']);

            return redirect('/');
//            return view('welcome');
        } else {
            return redirect("login")->withErrors(['error' => 'Wrong credential !!!']);
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);
        if($check){
            return redirect("login")->withErrors(['error' => 'User has been registered.']);
        } else {
            return redirect("login")
                ->withErrors(['error' => 'Oppes! Failed to create user. Try again.'])
                ->with(['name' => $request["name"], 'email' => $request["email"], 'password' => $request["password"]]);
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
        return Users::create([
            'name' => $data['name'],
            'email' => $data['email'],
//            'password' => Hash::make($data['password'])
            'password' => Crypt::encryptString($data['password'])
        ]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
//        Session::flush();
//        Auth::logout();

        session()->flush();
        return redirect('login');
    }

    public function list()
    {
        $users = Users::orderBy('id','desc')->paginate(10);
        return view('appusers.list', compact('users'));
    }
}
