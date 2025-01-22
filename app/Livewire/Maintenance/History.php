<?php

namespace App\Livewire\Maintenance;

use Livewire\Component;
use App\Models\MaintHistories;
use App\Models\MaintRequest;
use App\Models\MaintAsset;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Flasher\Toastr\Prime\ToastrInterface;

#[title('Maintenance | Maintenance History')]

class History extends Component
{
    public $histories; // Maintenance histories data
    public $request_id, $asset_id, $performed_by, $task_description, $date_completed; // Form fields
    public $history_id; // For editing existing records
    public  $modal_flag = false; //  flag for edit
    public $modal_title = 'Add New Maintenance History.';

    // Validation rules
    protected $rules = [
        'request_id' => 'required',
        'asset_id' => 'required|exists:assets,id',
        'performed_by' => 'required|exists:users,id',
        'task_description' => 'required|string|max:1000',
        'date_completed' => 'required|date',
    ];

    public function render()
    {
        $this->histories = MaintHistories::with(['request', 'asset'])->get();
        $requests = MaintRequest::all();
        $assets = MaintAsset::all();
        return view('livewire.maintenance.history', compact('requests', 'assets'))->layout('layouts.maintenance');
    }

// Reset form fields
public function exit()
{
    $this->reset(); //keyword
}

// Save a new or updated asset
public function save()
{
    //dd($this->name);
    //dd($this->category_id);

    $this->validate();

        MaintHistories::updateOrCreate(
            ['id' => $this->history_id],
            [
                'request_id' => $this->request_id,
                'asset_id' => $this->asset_id,
                'performed_by' => $this->performed_by,
                'task_description' => $this->task_description,
                'date_completed' => $this->date_completed,
            ]
        );

        toastr()->info( $this->history_id ? 'Maintenance history updated successfully!' : 'Maintenance history created successfully!');
        $this->reset(); //reset the fields
    }

    public function edit($id)
    {
        $history = MaintHistories::findOrFail($id);
        $this->history_id = $history->id;
        $this->request_id = $history->request_id;
        $this->asset_id = $history->asset_id;
        $this->performed_by = $history->performed_by;
        $this->task_description = $history->task_description;
        $this->date_completed = $history->date_completed;
        $this->modal_flag = true;
        $this->modal_title = 'Update Maintenance History';
    }

    public function delete($id)
    {
        MaintHistories::findOrFail($id)->delete();
        toastr()->info( 'Maintenance history deleted successfully!');
    }
}
