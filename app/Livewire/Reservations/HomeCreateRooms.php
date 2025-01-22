<?php

namespace App\Livewire\Reservations;

use App\Models\Room;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Masmerise\Toaster\Toaster;

#[Title('Reservations | Rooms')]
class HomeCreateRooms extends Component
{
    public $rooms;

    public function mount()
    {
        $this->rooms = Room::all();
    }
    // Event Handler for re-rendering room view
    #[On('refresh-rooms')]
    public function refreshrooms()
    {
        $this->rooms = Room::all();
    }


    public function destroyRoom($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();
        toastr()->info('Room is deleted successfully');
        $this->redirect('/reservations/home-create-rooms');
    }


    public function render()
    {
        return view('livewire.reservations.home-create-rooms')
            ->layout('layouts.reservations');
    }
}
