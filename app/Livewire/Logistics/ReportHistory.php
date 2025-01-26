<?php

namespace App\Livewire\Logistics;

use App\Models\Report;
use App\Models\ReportsFileUpload;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Logistics | Report Full View ')]
class ReportHistory extends Component
{


    public  $reports; // report instance, incase you want a full array of data
    public  $report_id; // report ID for modal full report view, for individul view display
    public  $files; // files instance
    public $modal_title;
    public function mount()
    {
        $this->reports = Report::all();
    }


    public function view($report_id)
    {
        $this->report_id = $report_id;
        //$this->reports = ReportsFileUpload::findOrFail($report_id);
        $this->files = ReportsFileUpload::where('report_id', $report_id)->get();
        $this->modal_title = 'Report Full View';
    }

    public function exit()
    { //rest modal feilds
        $this->reset();
    }
    public function render()
    {
        $this->reports = Report::all();
        return view('livewire.logistics.report-history')->layout('layouts.logistics');
    }
}
