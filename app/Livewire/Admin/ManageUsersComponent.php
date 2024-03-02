<?php

namespace App\Livewire\Admin;

use App\CustomHelpers\CustomHelper;
use App\Models\Depot;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use JetBrains\PhpStorm\NoReturn;
use Livewire\Component;

class ManageUsersComponent extends Component
{

    public $allUsers;

    public bool $updateMode;

    public User $newUser;

    public $allDepots;

    protected array $rules = [
        "newUser.name" => "required|string",
        "newUser.email" => "required|email|unique:users,email",
        "newUser.phone" => "required|numeric|unique:users,phone",
        "newUser.role" => "required|string",
        "newUser.depot_id" => "sometimes|int|unique:depots,id"
    ];

    public function saveRecord()
    {
        if ($this->updateMode){
            $this->validate([
            "newUser.name" => "required|string",
            "newUser.email" => "required|email",
            "newUser.phone" => "required|numeric",
            "newUser.role" => "required|string",
            "newUser.depot_id" => "required|int",
        ]);
            $this->newUser->save();
            $this->updateMode = false;
            CustomHelper::message("info", "User updated Successfully");
        }else{
//            $this->validate();
            $this->newUser->code = CustomHelper::generateModelCode("USSR-");
            $this->newUser->password = Hash::make($this->newUser->phone);
            $this->newUser->save();
            CustomHelper::message("success", "User added Successfully");
        }
            $this->fetchUsers();
            $this->initializeVars();

    }

    public function cancelEdit()
    {
        $this->initializeVars();

    }


    public function setForUpdate($code)
    {
        $user = User::firstWhere("code", $code);
        if ($user){
            $this->newUser = $user;
            $this->updateMode = true;
            return;
        }
        CustomHelper::message("warning", "User does not exist");
    }

    public function resetPassword($code)
    {
        $user = User::firstWhere("code", $code);
        if ($user){
            $user->password = Hash::make($user->phone);
            CustomHelper::message("info", "Password reset successful");
            return;
        }
        CustomHelper::message("warning", "User does not exist");
    }


    public function render()
    {
        return view('livewire.admin.manage-users-component');
    }

    private function fetchUsers()
    {
        $this->allUsers = User::query()
            ->with("depot")
            ->orderBy('name')
            ->get();
    }

    private function initializeVars()
    {
        $this->newUser = new User();
        $this->newUser->role = "";
        $this->updateMode = false;
    }



    public function mount()
    {
        $this->fetchUsers();
        $this->initializeVars();
        $this->allDepots = Depot::query()
            ->orderBy('name')
            ->get();
    }
}
