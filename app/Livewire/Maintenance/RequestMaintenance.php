<?php

namespace App\Livewire\Maintenance;

use Livewire\Component;
use App\Models\MaintRequest;
use App\Models\Department;
use App\Models\User;
use App\Models\MaintAsset;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Flasher\Toastr\Prime\ToastrInterface;

#[title('Maintenance | Request Maintenance ')]

class RequestMaintenance extends Component
{

    public $maintenances; // List of all maintenance requests
    public $title, $description, $status = 'Open', $priority = 'Low', $department_id, $assigned_to, $asset_id; // Request properties
    public $request_id; // Used for edit operations
    public  $modal_flag = false; //  flag for edit
    public $modal_title = 'Add New Maintenance Request.';

    // Validation rules
    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'status' => 'required|in:Open,In Progress,Resolved,Closed',
        'priority' => 'required|in:Low,Medium,High',
        'department_id' => 'required|exists:departments,id',
        'assigned_to' => 'required|exists:users,id',
        'asset_id' => 'required|exists:assets,id',
    ];

    public function render()
    {
        // Fetch all assets to display
        $this->maintenances = MaintRequest::all();
        $assets = MaintAsset::all();
        return view('livewire.maintenance.request-maintenance', compact('assets'))->layout('layouts.maintenance');
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


        MaintRequest::updateOrCreate(
            ['id' => $this->id],
            [
                'title' => $this->title,
                'description' => $this->description,
                'status' => $this->status,
                'priority' => $this->priority,
                'department_id' => $this->department_id,
                'assigned_to' => $this->assigned_to,
                'asset_id' => $this->asset_id,
            ]
        );

        toastr()->info( $this->id ? 'Asset updated successfully!' : 'Asset created successfully!');
        $this->reset();
    }

    // Edit an existing asset
    public function edit($id)
    {
        $request = MaintRequest::findOrFail($id);
        $this->request_id = $request->id;
        $this->title = $request->title;
        $this->description = $request->description;
        $this->status = $request->status;
        $this->priority = $request->priority;
        $this->department_id = $request->department_id;
        $this->assigned_to = $request->assigned_to;
        $this->asset_id = $request->asset_id;
        $this->modal_flag = true;
        $this->modal_title = 'Update Request';

    }

    // Delete an asset
    public function delete($id)
    {
        MaintRequest::findOrFail($id)->delete();
        toastr()->info( 'Maintenance request deleted successfully!');
    }
}

