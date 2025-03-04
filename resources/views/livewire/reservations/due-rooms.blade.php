<div>
    @php
      use Carbon\Carbon;
    @endphp


     <div class="container-xxl flex-grow-1 container-p-y">
             <!--/ page-label component -->
         <div>
             <x-home-page-label>These  are rooms due for checkouts as at today {{Carbon::now()->timezone('Africa/Lagos')->format('l, jS \ F, Y')}}</x-home-page-label>
         </div>
          <!--/ action button component -->
          <div>
            <x-modal-home-create-plain-button data-bs-target="#filterDueDate"> <i
                class="ti ti-search me-1"></i> Filter Due Dates</x-modal-home-create-plain-button>
        </div>
            <hr class="my-2">
            <div class="card">
 <div class="table-responsive text-nowrap">
     <table class="table">
       <thead class="table-light">

                         <tr>
                             <th>SN</th>
                             <th>Room</th>
                             <th>Category</th>
                              <th>Checkin</th>
                                <th>CheckOut</th>

                             <th>Reservation ID</th>

                               <th>Customer</th>

                                 <th>Phone</th>
                                  <th>Email</th>


                           <th>Payment Status</th>
                           <th>Action</th>

                         </tr>
                     </thead>
                         <tbody class="table-border-bottom-0">
                             @foreach($reservations as $reservation)


                             <tr wire:key='{{$reservation->id}}'>

                                 <td>{{$loop->index + 1}}</td>
                                 <td>{{Str::ucfirst($room = \App\Models\Room::where('id', $reservation->room_id)->value('name'))}}
                                </td>

                                <td>{{str::ucfirst($room = \App\Models\RoomCategory::where('id', $reservation->category_id)->value('category'))}}
                                </td>
                                <td>    {{$reservation->checkin}}</td>
                                <td>    {{$reservation->checkout}}</td>
                                 <td>    {{$reservation->reservation_id}}</td>

                                <td>   {{$reservation->fullname}}</td>

                                <td>   {{$reservation->phone}}</td>
                                <td>   {{$reservation->email}}</td>

                                 <td>{{Helper::get_reservation_payment_status($reservation->reservation_id)}}</td>
                                 <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></button>
                                        <div class="dropdown-menu">

                                            <a wire:click='checkout({{$reservation->reservation_id }}, {{$reservation->category_id }}, {{$reservation->room_id }})'
                                                wire:confirm="Are you sure you want to proceed and Checkout this customer?"
                                                class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ti ti-check me-1"></i> Checkout</a>
                                        </div>
                                    </div>
                                </td>
                                 </tr>
                             @endforeach
                         </tbody>
                     </table>
                 </div>
             </div>
             <!--/ Reserved rooms Rows -->

     </div>
     <livewire:reservations.filter-due-rooms>
 </div>
