<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request){

        return User::query()->when($request->search, fn($q)=> $q->where('name','like','%'.$request->search.'%'))->when($request->sort, fn($q)=> $q->orderBy($request->sort,$request->order??'asc'))->paginate(20);
    }
}
