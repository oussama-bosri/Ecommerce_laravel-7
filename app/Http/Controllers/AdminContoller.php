<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminContoller extends Controller
   { 

   public function __construct()
    {
        $this->middleware('auth:admin')
        ->except(["showAdminLoginForm","adminLogin"]);
    } 
    public function index(){
        return view("admin.index");
    }

    public function showAdminLoginForm(){
        return view("admin.auth.login");
    }


    public function adminLogin(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);

        if(auth()->guard("admin")->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $request->get("remember"))) {
            return redirect("/admin");
        }else{
            return redirect()->route("admin.login");
        }
    }

    public function adminLogout(){

        auth()->guard("admin")->logout();
        return redirect()->route("admin.login");
    }
}
