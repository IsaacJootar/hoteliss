<div>
   @php
     use Carbon\Carbon;
   @endphp
       <br>

       <div>
        <x-home-page-label>These  are available rooms for today {{Carbon::now()->format('l, jS \ F, Y')}}</x-home-page-label>
    </div>
   <div class="container-xxl flex-grow-1 container-p-y">
    <p class="my-2">
        <div class="row">
            <div class="card">
<table id="myTable" class="table">
    <thead class="table-light">

        <tr>
            <th>SN</th>
            <th>Room</th>
            <th>Category</th>
            <th>Value</th>
          <th>Status</th>

        </tr>
    </thead>
    <tbody class="table-border-bottom-0">
        @foreach ($availables as $available)


        <tr wire:key='{{$available->id}}'>

            <td>{{$loop->index + 1}}</td>
            <td>{{Str::ucfirst($room = \App\Models\Room::where('id', $available->room_id)->value('name'))}}
            </td>
            <td>{{\App\Models\Roomcategory::where('id', $available->category_id)->value('category')}}
            </td>

            <td>

                {{Helper::format_currency($available->price)}}
            </td>

            <td><span class="badge bg-label-success me-1">Available</span></td>

            </tr>
        @endforeach
    </tbody>
</table>


                </div>


    </div>
</div>
