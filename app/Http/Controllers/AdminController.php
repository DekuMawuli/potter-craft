<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view("dashboard");
    }


    public function users()
    {
        return view("users");
    }

    public function depots()
    {
        return view("depots");
    }

    public function items()
    {
        return view("items");
    }
    public function transfers()
    {
        return view("transfers");
    }

     public function documents()
    {
        return view("documents");
    }
}
