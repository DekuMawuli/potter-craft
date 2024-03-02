<?php

namespace App\Livewire\Admin;

use App\CustomHelpers\CustomHelper;
use App\Models\Document;
use App\Models\Item;
use App\Models\SyncLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class ManageItemsComponent extends Component
{

    use WithPagination;

        public function syncDocument($code)
    {
        $doc = CustomHelper::fetchSingleRecordByCode( Document::query(), $code);
        if ($doc->status == "synced"){
            CustomHelper::message("info", "File already synced with database. Deletion not permitted");
            return;
        }

        if (!Storage::exists($doc->filename)){
            CustomHelper::message("danger", "File does not exist");
            return;
        }

        $rows = $this->readData($doc->filename);
        $total = count($rows);
        $uploaded = 0;



        DB::transaction(function () use ($rows, $doc, $uploaded, $total){


            foreach ($rows as $datum){
                $datum['code'] = CustomHelper::generateModelCode("ITM-");
                $datum['status'] = "available";
                $datum['document_id'] = $doc->id;

                if (!Item::where("name", $datum['name'])->exists()){
                    Item::create($datum);
                    $uploaded += 1;
                }

            }

            if ($uploaded > 0){
                DB::transaction(function () use ($doc){
                    Document::query()
                        ->where("code", $doc->code)
                        ->update([
                            'status' => "synced"
                        ]);
                    SyncLog::create([
                        "code" => CustomHelper::generateModelCode("SGL-"),
                        "depot_id" => $doc->depot_id,
                        "document_id" => $doc->id,
                        "sync_endpoint_id" => $doc->sync_endpoint_id,
                        "user_id" => Auth::id(),
                        "status" => "synced"

                    ]);
                });
                CustomHelper::message("success", "{$uploaded}/{$total} Items Synced.");
                return;
            }
            CustomHelper::message("warning", "Only duplicated values identified");


        });

    }


    public function render()
    {
        return view('livewire.admin.manage-items-component', [
            "documents" => Document::query()
            ->with(['depot', 'user'])
            ->orderByDesc('created_at')
            ->paginate(10)
        ]);
    }


    private function readData($filename)
    {
        $filePath = storage_path('app/'.$filename);
        $file = fopen($filePath, 'r');
        $header = fgetcsv($file);
        $data = [];
        while (($row = fgetcsv($file)) !== false) {
            $data[] = array_combine($header, $row);
        }
        fclose($file);
        return $data;
    }
}
