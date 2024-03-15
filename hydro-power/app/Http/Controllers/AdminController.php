<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Admin;
use App\Companies;
use App\Project;
use App\InternationalFinances;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        if ($request->session()->has('ADMIN_LOGIN')) {
            return redirect('admin/dashboard');
        } else {
            return view('admin.login');
        }
        return view('admin.login');
    }
    public function auth(Request $request)
    {
        $user_name=$request->post('user_name');
        $password=$request->post('password');

        $result=Admin::where(['user_name'=>$user_name])->first();
        if($result){
            if(Hash::check($request->post('password'),$result->password)){
                $request->session()->put('ADMIN_LOGIN',true);
                $request->session()->put('ADMIN_ID',$result->id);
                return redirect('admin/dashboard');
            }
            else{
                $request->session()->flash('error','***Please enter correct Password***');
                return redirect('admin');
            }

        }
        else{
            $request->session()->flash('error','***Please enter valid Login Details***');
            return redirect('admin');
        }
    }
    public function dashboard()
    {    $companies=Companies::count();
        $finances=InternationalFinances::count();
        $projects=Project::count();
        return view('admin.dashboard',compact('companies','finances','projects'));
    }


}