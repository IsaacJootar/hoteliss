<?php

namespace App\Livewire\Logistics;
use App\Models\Report;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Spatie\LivewireFilepond\WithFilePond;

#[Title('Logistics | Reports')]
class Reports extends Component
{

    use WithFilePond; // FilePond file upload library
    public  $reports; // report instance

    public $report;
    public $report_id; //create | update (modal flag)


    //#[Validate('required')]
    public $files; // image, Docs,PDFs, etc
    #[Validate('required')]
    public $trips_made;

    #[Validate('required|min:30')]
    public $note;

    #[Validate('required')]
    public $report_to;

    #[Validate('required')]
    public $airport_pickups;

    #[Validate('required')]
    public $other;
    #[Validate('required')]
    public $breakdowns;
    public $modal_title = 'Send Report.';
    public  $modal_flag = false; // event flag for edit




    public function save()
    {
       $this->validate();// validate and then save

       $this->files->store('report-files', 'public');

        Report::updateOrCreate(
        ['id' =>$this->report_id],
            [
                'trips_made'=>$this->trips_made,
                'airport_pickups'=>$this->airport_pickups,
                'other'=>$this->other,
                'breakdowns'=>$this->breakdowns,
                'note'=>$this->note,
                'report_to'=>$this->report_to,
            ]

        );

        toastr()->info($this->report_id ? 'Report Has Been Updated Successfuly' : 'Report Has Been Sent Successfuly' );
        $this->reset();
    }
    public function edit($id)
    {
        $this->report = Report::findOrFail($id);
        $this->report_id = $this->report->id;
        $this->trips_made = $this->report->trips_made;
        $this->airport_pickups = $this->report->airport_pickups;
        $this->other = $this->report->other;
        $this->breakdowns = $this->report->breakdowns;
        $this->note = $this->report->note;
        $this->report_to = $this->report->report_to;
        $this->modal_flag = true; // for update
        $this->modal_title = 'Update Report';
    }

    public function exit()
    { //rest modal feilds
        $this->reset();
    }


    /*
    dont delete reports for now

    public function destroy($id)
    {
        $report = report::findOrFail($id);
        $report->delete();
        toastr()->info('Report Item is deleted successfully');
    }
*/


    public function render()
    {
        $this->reports = Report::all();
        return view('livewire.logistics.reports')->layout('layouts.logistics');
    }



}
