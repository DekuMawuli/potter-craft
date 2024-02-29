<?php

namespace App\Http\Controllers;

use App\CustomHelpers\CustomHelper;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    /**
     * Display a login form for admin
     *
     * @return View
     */
    public function signIn()
    {
        return view("login");
    }

    /**
     * Validates admin credentials and process them for login
     *
     * @return RedirectResponse
     */

    public function processSign(LoginRequest $request)
    {
        // gets admin credentials
        $email = $request->get('email');
        $password = $request->get('password');

        // verify if user is an admin
        if ($this->verifyUserIsAdmin($email)){
            // attempts to login
            if (Auth::attempt(["email" => $email, "password" => $password])){
                // if successful , redirect the user to admin dashboard
                return redirect()->route("admin.dashboard");
            }
            // Redirect the user to login page if credentials is not correct
            CustomHelper::message("danger", "Invalid Credentials");
        return redirect()->route("admin.sign_in");
        }
         // Redirect the user to login page if the role is not an admin
        CustomHelper::message("danger", "User not Authorized for access");
        return redirect()->route("admin.sign_in");
    }

    /**
     * Verifies if a user is and admin or not
     *
     * @return bool
     */
    private function verifyUserIsAdmin(string $email) : bool
    {
        return User::query()
            ->where("email", $email)
            ->where('role', "admin")
            ->exists();
    }


    public function userSignIn()
    {
        return view("user.login");
    }

    /**
     * Validates user credentials and process them for login
     *
     * @return RedirectResponse
     */

    public function userProcessSignIn(LoginRequest $request)
    {
        // gets admin credentials
        $email = $request->get('email');
        $password = $request->get('password');

        // verify if user is an user by role
        if ($this->verifyUserIsRegularUser($email)){
            if (Auth::attempt(["email" => $email, "password" => $password])){
                 // if successful , redirect the user to admin dashboard
                return redirect()->route("user.dashboard");
            }
             // Redirect the user to login page if credentials is not correct
            CustomHelper::message("danger", "Invalid Credentials");
            return redirect()->route("user.sign_in");
        }
         // Redirect the user to login page if role is not recognized
        CustomHelper::message("danger", "User not Authorized for access");
        return redirect()->route("user.sign_in");
    }


    /**
     * Verifies if a user is user by role or not
     *
     * @return bool
     */
    private function verifyUserIsRegularUser(string $email) : bool
    {
        return User::query()
            ->where("email", $email)
            ->where('role', "user")
            ->exists();
    }


    /**
     * De-authenticate a logged-in user and redirects them to the login page
     *
     * @return RedirectResponse
     */

    public function logout()
    {
        Auth::logout();
        session()->regenerateToken();
         CustomHelper::message("warning", "Logout Successful");
        return redirect()->route('admin.sign_in');
    }


    public function userLogout()
    {
        Auth::logout();
        session()->regenerateToken();
        CustomHelper::message("warning", "Logout Successful");
        return redirect()->route('user.sign_in');
    }








}
