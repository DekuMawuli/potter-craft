<?php

namespace App\Livewire\User;

use App\CustomHelpers\CustomHelper;
use App\Models\Document;
use App\Models\SyncEndpoint;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class ManageDocumentsComponent extends Component
{
    use WithFileUploads;
    public Document $newDoc;
    public $allURLs;
    public $fileDoc;

    public $existingURL;

    public $otherURL;

    protected $rules = [
        "fileDoc" => "required|mimes:csv",
        "existingURL" => "nullable|string",
        "otherURL" => "sometimes|string|unique:sync_endpoints,url"
    ];


    public function saveRecord()
    {

        if ($this->existingURL != 'other'){
            $selectedURL = $this->existingURL;
        }else{
            if(SyncEndpoint::query()->where('url', $this->otherURL)->exists()){
                CustomHelper::message('warning', 'URL already exist');
                return;
            }
            $newURL = SyncEndpoint::create([
                "code" => CustomHelper::generateModelCode("SUL-"),
                "url" => $this->otherURL
            ]);
            $selectedURL = $newURL->id;
        }
        $this->newDoc->sync_endpoint_id = $selectedURL;


        $path = $this->fileDoc->store('uploaded_docs');
        $this->newDoc->depot_id = Auth::user()->depot_id;
        $this->newDoc->user_id = Auth::id();
        $this->newDoc->filename = $path;

        $this->newDoc->code = CustomHelper::generateModelCode("DOC-");
        $this->newDoc->status = "not_synced";
        $this->newDoc->save();
        CustomHelper::message("success", "File Uploaded Successfully");
        $this->resetData();

    }


    public function render()
    {
        return view('livewire.user.manage-documents-component', [
            "documents" => Document::query()
                ->with(['depot', 'user', 'syncEndpoint'])
                ->where("depot_id", Auth::user()->depot_id)
                ->paginate(10)
        ]);
    }

    private function resetData()
    {
        $this->newDoc = new Document();
        $this->allURLs = SyncEndpoint::query()
            ->orderBy('url')
            ->get();
    }

    public function mount()
    {
        $this->resetData();
    }
}
