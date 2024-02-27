<?php

namespace App\Livewire\Admin;

use App\Models\Document;
use App\Models\Item;
use App\Models\User;
use Livewire\Component;

class DashboardStatisticsComponent extends Component
{

    public int $uploadedDocs;

    public int $uploadedItems;

    public int $registeredAdmins;

    public int $registeredUsers;


    public function fetchUsers(): void
    {
        $this->uploadedDocs = Document::query()->count();
        $this->uploadedItems = Item::query()->count();
        $this->registeredAdmins = User::query()
            ->where('role', 'admin')
            ->count();
        $this->registeredUsers = User::query()
            ->where('role', 'user')
            ->count();
    }

    public function render()
    {
        return view('livewire.admin.dashboard-statistics-component');
    }

    public function mount()
    {
        $this->fetchUsers();
    }
}
