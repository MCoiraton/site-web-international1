<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;

class UserController extends Controller
{
    public function liste(){
        $admins=Admin::all();
        return view('admin-utilisateurs',['admins'=>$admins]);
    }
    //fonction add pour ajouter un admin par uid s'il ne l'est pas déjà
    public function add(Request $request){
        $uid=$request->uid;
        $admins=Admin::all();
        $isAdmin=false;
        foreach($admins as $admin){
            if($admin->uid==$uid) $isAdmin=true;
        }
        if(!$isAdmin){
            Admin::create(['uid'=>$uid]);
        }
        return redirect('/admin/utilisateurs');
    }
    //fonction delete pour supprimer un admin par uid
    public function delete(Request $request){
        $uid=$request->uid;
        $admins=Admin::all();
        $isAdmin=false;
        foreach($admins as $admin){
            if($admin->uid==$uid) $isAdmin=true;
        }
        if($isAdmin){
            Admin::where('uid',$uid)->delete();
        }
        return redirect('/admin/utilisateurs');
    }
}
