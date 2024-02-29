<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Dashboard page of the user
     *
     * @return View
     */
    public function dashboard()
    {
        return view("user.dashboard");
    }




/**
 * Display a listing of the documents uploaded from a depot.
 *
 * @return View
 */

     public function documents()
    {
        // query documents uploaded in the order of last uploaded from the depot
        $documents = Document::query()
            ->with(['depot', 'user'])
            ->where("depot_id", Auth::user()->depot_id)
            ->orderByDesc('created_at')
            ->get();
        return view("user.documents", compact('documents'));
    }
}
