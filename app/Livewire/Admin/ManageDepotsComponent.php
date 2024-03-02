<?php

namespace App\Livewire\Admin;

use App\CustomHelpers\CustomHelper;
use App\Models\Depot;
use Livewire\Component;
use Livewire\WithPagination;

class ManageDepotsComponent extends Component
{
    use WithPagination;
    public $updateMode = false;
    public $allDepots;
    public Depot $newDepot;

    protected $rules = [
        "newDepot.name" => "required|string|unique:depots,name",
        "newDepot.location" => "required|string",
        "newDepot.region" => "required|string",
        "newDepot.status" => "required|string",
        "newDepot.description" => "sometimes|string",
    ];
    public function saveRecord()
    {
        if ($this->updateMode){
            $this->validate([
                "newDepot.name" => "required|string",
                "newDepot.location" => "required|string",
                "newDepot.region" => "required|string",
                "newDepot.status" => "required|string",
                "newDepot.description" => "sometimes|string",
            ]);
            $this->newDepot->save();
            CustomHelper::message("info", "Depot updated successfully");
            $this->updateMode = false;
        }   else{
            $this->validate();
            $this->newDepot->code = CustomHelper::generateModelCode("DPT-");
            $this->newDepot->save();
            CustomHelper::message("success", "Depot added successfully");

        }
//        $this->fetchRecord();
        $this->initVar();
    }

    public function deleteDepot($code)
    {
        $this->newDepot = CustomHelper::fetchSingleRecordByCode(Depot::query(), $code);
        $this->newDepot->delete();
//        $this->fetchRecord();
        $this->initVar();
        CustomHelper::message("warning", "Depot removed successfully");
    }

    public function setForUpdate($code)
    {
        $this->newDepot = CustomHelper::fetchSingleRecordByCode(Depot::query(), $code);
        $this->updateMode = true;
    }

    public function cancelUpdate()
    {
        $this->updateMode = false;
        $this->initVar();
    }

    public function render()
    {

        return view('livewire.admin.manage-depots-component', [
            'depots' => Depot::query()->paginate(2)
        ]);
    }



    private function initVar()
    {
        $this->newDepot = new Depot();
    }


    public function mount()
    {
        $this->initVar();
    }
}
