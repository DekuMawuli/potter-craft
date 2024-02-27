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

     public function documents()
    {
        $documents = Document::query()
            ->with(['depot', 'user'])
            ->orderByDesc('created_at')
            ->get();
        return view("items", compact('documents'));
    }
}
