<div>
    @php
      use Carbon\Carbon;
    @endphp


     <div class="container-xxl flex-grow-1 container-p-y">
             <!--/ page-label component -->
         <div>
             <x-home-page-label>These  are reserved room(s) as at today {{Carbon::now()->format('l, jS \ F, Y')}}</x-home-page-label>
         </div>
          <!--/ action button component -->

          <p class="my-2">
         <div class="card">

 <div class="table-responsive text-nowrap">
     <table class="table">
       <thead class="table-light">

                         <tr>
                             <th>SN</th>
                             <th>Room</th>
                             <th>Category</th>
                             <th>Reservation ID</th>
                             <th>Customer</th>
                              <th>Checkin</th>
                                <th>CheckOut</th>
                             <th>Value</th>

                               <th>Payment Medium</th>
                              <th>Status</th>

                                <th>Adress</th>
                                 <th>Phone</th>
                                  <th>Email</th>

                           <th>Created time</th>
                           <th>Payment Status</th>
                           <th>Action</th>

                         </tr>
                     </thead>
                         <tbody class="table-border-bottom-0">
                             @foreach ($reserved as $reserve)


                             <tr wire:key='{{$reserve->id}}'>

                                 <td>{{$loop->index + 1}}</td>
                                 <td>{{Str::ucfirst($room = DB::table('rooms')->where('id', $reserve->room_id)->value('name'))}}
                                </td>

                                <td>{{str::ucfirst($room = DB::table('room_categories')->where('id', $reserve->category_id)->value('category'))}}
                                </td>
                                <td>    {{$reserve->reservation_id}}</td>
                                <td>   {{$reserve->fullname}}</td>
                                <td>    {{$reserve->checkin}}</td>
                                <td>    {{$reserve->checkout}}</td>
                                <td>    {{Helper::format_currency(DB::table('room_allocations')->where('room_id', $reserve->room_id)->value('price'))}}</td>

                                <td>    {{$reserve->medium}}</td>
                                <td><span class="badge bg-label-primary me-1">Reserved</span></td>

                                <td>   {{$reserve->adress}}</td>
                                <td>   {{$reserve->phone}}</td>
                                <td>   {{$reserve->email}}</td>
                                <td>    {{$reserve->created_at}}</td>
                                 <td>{{Helper::get_reservation_payment_status($reserve->reservation_id)}}</td>
                                 <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></button>
                                    <div class="dropdown-menu">
                                        <a data-bs-toggle="modal" data-bs-target="#roombooked" class="dropdown-item" href="javascript:void(0);"><i
                                            class="ti ti-receipt me-1"></i> View Receipt</a>
                                            <a wire:click='comfirmPayment({{$reserve->reservation_id }})'
                                                wire:confirm="Are you sure you want to proceed and Comfirm Payment?"
                                                class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ti ti-check me-1"></i> Comfirm this Payment</a>
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
 </div>
