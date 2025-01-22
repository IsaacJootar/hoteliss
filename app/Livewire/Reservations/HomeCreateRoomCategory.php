<?php

namespace App\Livewire\Reservations;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Roomcategory;
use App\Models\Roomallocation;
use Livewire\Attributes\Title;
use App\Exceptions\deleteCatagoryException;
use Illuminate\Support\Facades\Log;

#[Title('Reservations | Categories')]
class HomeCreateRoomCategory extends Component
{
    public $categories;

    public function mount()
    {
        $this->categories = RoomCategory::all();
    }
    // Event Handler for re-rendering room cat
    #[On('refresh-categories')]
    public function refreshroomCat()
    {
        $this->categories = RoomCategory::all();
    }
    public function destroyCategory($id)
    {


        try {


            if (Roomallocation::where('category_id', $id)->exists()) {

                throw new deleteCatagoryException('This Room Category is already allocated for reservations and cannot be deleted now!');
            }
        } catch (deleteCatagoryException $exception) {
            //report($exception); send reports for more important cases
            //Log::debug($exception->getMessage()), Log::alert($exception->getMessage());
            toastr()->warning($exception->getMessage());
            return redirect('/reservations/home-create-room-category');
        }



        $room = RoomCategory::findOrFail($id);
        $room->delete();
        toastr()->info( 'Room Category is deleted successfully');
        $this->redirect('/reservations/home-create-room-category');
    }


    public function render()
    {
        return view('livewire.reservations.home-create-room-category')
            ->layout('layouts.reservations');
    }
}
