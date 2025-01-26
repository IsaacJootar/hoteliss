<?php

namespace App\Livewire\Reservations;

use Livewire\Attributes\Title;
use Livewire\WithFileUploads;
use App\Models\RoomCategory;
use Livewire\Component;
use Livewire\Attributes\On;
use Spatie\Image\Image;
use Spatie\Image\Enums\Fit;
use Illuminate\Support\Str;

#[title('Create Room Category')]

class CreateRoomCategory extends Component
{

    use WithFileUploads;
    public $room_category;
    public $category = '';
    public $image;

    public $details = '';
    public $wifi = '';

    public $laundry = '';
    public $lunch = '';

    public $breakfast = '';


    //public $modal_title = 'Create New Room Category.';
    public  $modal_flag = false;

    public function store()
    {
        $validation = $this->validate([
            'category' => ['required', 'min:4', 'unique:resv_room_categories,category'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg,', 'max:10048'], // 10mb
            'details' => ['required', 'min:20'],
            'wifi' => [],
            'laundry' => [],
            'lunch' => [],
            'breakfast' => [],

        ]);

        if ($this->image) {


            $imageName = $this->image->hashName();
            $imagePath = storage_path("app/public/category-images"); // path to laravel storage (Not the public)
            Image::load($this->image->path())
                ->fit(fit: Fit::FillMax, desiredWidth: 500,  desiredHeight: 500, backgroundColor: '#a3a3c2')
                ->save($imagePath . '/' . $imageName);

            //$this->image->store('category-images', 'public'); // store in default laravel storage directory

            $validation['image'] = $this->image->hashName(); // get the random name before persisting the database

            $validation['category']  = str::ucfirst($this->category);
        }

        Roomcategory::create($validation);

        $this->dispatch('refresh-categories');
        toastr()->info('Room  Category is created successfully');
        $this->reset();
    }

    #[On('modal-flag')] // from modal dispatch
    public function edit($id)
    {
        $this->room_category = RoomCategory::findOrFail($id);
        $this->category = $this->room_category->category;
        $this->details = $this->room_category->details;
        $this->wifi = $this->room_category->wifi;
        $this->laundry = $this->room_category->laundry;
        $this->lunch = $this->room_category->lunch;
        $this->breakfast = $this->room_category->breakfast;
        $this->modal_flag = true; // for triggering modal form status for  Update
        //$this->modal_title = 'Update Room category';
    }

    public function update()
    {
        $validation = $this->validate([
            'category' => ['required', 'min:4'],
            //'image' => ['image','mimes:jpeg,png,jpg,gif,svg','max:10048'], // dont require image again for update
            'details' => ['required', 'min:20'],
            'wifi' => [],
            'laundry' => [],
            'lunch' => [],
            'breakfast' => [],

        ]);


        if ($this->image) {
            // If uploaded on update, may not be sometimes

            $imageName = $this->image->hashName();
            $imagePath = public_path("storage/category-images");
            Image::load($this->image->path())
                ->fit(fit: Fit::FillMax, desiredWidth: 500,  desiredHeight: 500, backgroundColor: '#a3a3c2')
                ->save($imagePath . '/' . $imageName);

            $validation['image'] = $this->image->hashName(); // get the random name before persisting the database

            //$this->image->store('category-images');

            /*

              // find the old file and delete from storage then store the new file

              $old_file = RoomCategory::findOrFail($this->room_category->id);
              //dd($old_file->image);
              $filePath = 'room-images/'.$old_file->image;

              // Check if the file exists and delete it
              if (Storage::exists($filePath)) {

                  Storage::delete($filePath);
              }

            */




            $this->image->store('category-images', 'public');
            $validation['image'] = $this->image->hashName();
        }
        $update = RoomCategory::findOrFail($this->room_category->id);
        $validation['category']  = str::ucfirst($this->category);

        $update->update($validation);

        $this->dispatch('refresh-categories');
        toastr()->info('Room Categories is Updated successfully');
    }

    public function exit()
    { //rest modal feilds
        $this->reset();
    }

    public function render()
    {
        return view('livewire.reservations.create-room-category')
            ->layout('layouts.reservations');
    }
}
