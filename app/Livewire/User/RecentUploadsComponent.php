<?php

namespace App\Livewire\User;

use App\Models\Document;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class RecentUploadsComponent extends Component
{

    use WithPagination;

    public function render()
    {
        return view('livewire.user.recent-uploads-component', [
            "recentDocs" => Document::query()
                ->with(['depot', 'user', 'syncEndpoint'])
                ->where("depot_id", Auth::user()->depot_id)
                ->orderByDesc('created_at')
                ->orderBy('status', 'asc')
                ->paginate(5)
        ]);
    }
}
