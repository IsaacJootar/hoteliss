<div>
    <div class="container-xxl flex-grow-1 container-p-y">
<!--Checkout  Sections:Starts -->
@php
    use Carbon\Carbon;
@endphp
<section class="section-py bg-body first-section-pt">
    <div class="container">
      <div class="card px-3">
        <div class="row">
          <div class="col-lg-7 card-body border-end p-md-8">
            <h4 class="mb-2"><strong> Confirm Reservation</strong> (ID:{{$reservation_id}})</h4>

            <p class="mb-0">Please verify this reservation informations before you complete your order.</p>
            <div class="row g-5 py-8">


            </div>
            <form>

                <div class="table-responsive text-nowrap">
                    <table class="table">
                    <thead class="table-light">

                      <tr>
                        <th>Category</th>
                        <th>Customer</th>
                        <th>contact</th>


                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>{{(DB::table('room_categories')->where('id', $category_id)->get()->value('category'))}}</td>
                        <td>{{($fullname = DB::table('reservations')->where('reservation_id', $reservation_id)->get()->value('fullname'))}}</td>
                        <td>{{(DB::table('reservations')->where('reservation_id', $reservation_id)->get()->value('phone'))}}</td>


                      </tr>
                      <tr class="table-light">
                        <th>Email</th>
                        <th>Channel</th>
                        <th>Address</th>


                      </tr>
                      <tr>
                        <td>{{($email = DB::table('reservations')->where('reservation_id', $reservation_id)->get()->value('email'))}}</td>
                        <td>{{(DB::table('reservations')->where('reservation_id', $reservation_id)->get()->value('medium'))}}</td>
                        <td>{{( Str::of(DB::table('reservations')->where('reservation_id', $reservation_id)->get()->value('address'))->limit(50))}}</td>



                      </tr>
                      <tr class="table-light">
                        <th>Room(s)</th>
                        <th> </th>
                        <th>Special Requests</th>



                      </tr>
                      <tr>
                        <td>
                        @foreach ($rooms as $room)
                            {{$room->name}} .
                        @endforeach


                        </td>
                        <td></td>
                        <td>{{(Str::of(DB::table('reservations')->where('reservation_id', $reservation_id)->get()->value('requests'))->limit(50))}}</td>


                      </tr>
                      <tr class="table-light">
                        <th>Arrival Date</th>
                        <th></th>
                        <th>Departure Date</th>
                      </tr>
                      <tr>
                        <td>{{Carbon::parse($checkin)->format('l jS \ F Y')}}</td>
                        <td></td>
                        <td>{{Carbon::parse($checkout)->format('l jS \ F Y')}}</td>


                      </tr>
                    </tbody>
                  </table>
                </div>

            </form>
          </div>

          <div class="col-lg-5 card-body p-md-8">
            <h4 class="mb-2">Order Summary</h4>
            <p>

                <i class="badge bg-label-success ms-1">
               @php echo  Carbon::now()->format('l jS \ F Y');

                @endphp
                </i>
            </p>
            <p class="mb-8">You can use the edit reservation if you wish to make changes before payment.</p>

            <!-- coupon Offer this will have a model and component to,to store coupon codes and their corresponding amount, and where to mail them or text when any customer is due for a coupon as part of setup & configs   -->
             <h6>Coupon Offer</h6>
             <div class="row g-4 mb-4">
               <div class="col-8 col-xxl-8 col-xl-12">
                 <input  wire:model='coupon'  type="text" class="form-control" placeholder="Enter coupon Code" aria-label="Enter coupon Code">
               </div>
               <div class="col-4 col-xxl-4 col-xl-12">
                 <div class="d-grid">
                   <button type="button" class="btn btn-label-primary">Apply</button>
                 </div>
               </div>
             </div>
            <div class="bg-lighter p-6 rounded">
              <p><h6>{{(DB::table('room_categories')->where('id', $category_id)->get()->value('category'))}}</h6></p>
              <div class="d-flex align-items-center mb-4">
                <h2 class="text-heading mb-0">{{Helper::format_currency($price = DB::table('room_allocations')->where('category_id', $category_id)->get()->value('price'));}}</h2>
                <sub class="h6 text-body mb-n3">/Night</sub>
              </div>
              <div class="d-grid">
                @php
                // number of rooms
                 $nor = DB::table('reservations')->where('reservation_id', $reservation_id)->get()->value('nor')
                @endphp
                <a href="{{route('update-reservation', [
               'reservation_id' => $reservation_id,
                ])}}" type="button"   class="btn btn-label-primary" >Edit Reservation</a>
              </div>
            </div>


            <div class="mt-5">
                <div class="d-flex justify-content-between align-items-center">

                    <p class="mb-0">Quantity</p>
                    <h6 class="mb-0">{{$nor}} Room(s)</h6>

                  </div><p>
              <div class="d-flex justify-content-between align-items-center">


                    <p class="mb-0">Duration</p>
                    <h6 class="mb-0">{{Helper::get_number_of_days($checkin, $checkout)}} Night(s)</h6>

                  </div><p>
                <div class="d-flex justify-content-between align-items-center">
                <p class="mb-0">Subtotal</p>
                <h6 class="mb-0">{{helper::get_total_amount_due($checkin, $checkout, $category_id, $nor)}}</h6>
              </div>
              <div class="d-flex justify-content-between align-items-center mt-2">
                <p class="mb-0">Tax</p>
                <h6 class="mb-0"><i class="badge bg-label-success ms-1">inclusive</i></h6>
              </div>
              <hr>
              <div class="d-flex justify-content-between align-items-center mt-4 pb-1">
                <p class="mb-0"> <strong> Total</strong></p>
                <h6 class="mb-0">{{Helper::get_total_amount_due($checkin, $checkout, $category_id, $nor)}}</h6>
              </div>
            @php

            // Variables for paystack API
             if(is_null($email)){
               $email='vinegrouphouse@gmail.com'; //clients Email
             }else{ $email=$email;}

             $amount = Helper::get_total_amount_due_plain($checkin, $checkout, $category_id, $nor);  // convert all amounts to kobo bfor passing to paystack API//
             $amount=$amount * 100; // convert all amounts to kobo bfor passing to paystack API//
             $reservation_id=$reservation_id;
             $reference= Paystack::genTranxRef();

             // divide this amount by nor to slipt price for multiple reservations-mainly for DB
            //$amount= $amount / $nor;



     @endphp


<div class="d-grid mt-5">
    <a href="{{route('pay', ['amount' => $amount, 'email'=> $email, 'reference'=> $reservation_id, 'orderID'=> $reservation_id])}}">
    <button class="btn btn-success">
      <span style="color: white" class="me-2">Payment Online Now</span>
    </a>
    </button>

  </div>

  <div class="d-grid mt-5">

  <button id="btnGroupDrop1" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" class="btn btn-info">
    <span style="color: white" class="me-2">Offline Payment</span>

  </button>
  <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">

                <h6 class="mb-0"><i class="badge bg-label-warning ms-1">Make sure payment is received before you comfirm! </i></h6>
    <div class="d-grid mt-5">

        <label for="largeSelect" class="form-label"><strong> Select Receiving Bank</strong></label>
        <select wire:model="receiving_bank" id="largeSelect" class="form-select form-select-lg">
            <option>-------</option>
            <option value=""> </option>
            <option value="">  </option>
            <option value="">   </option>
            <option value=""></option>

        </select>
        <hr class="my-2">


        <a wire:click='comfirmPayment({{$reservation->reservation_id }})'
            wire:confirm="Are you sure you want to proceed and comfirm this payment?"
            > <button class="btn btn-success">
                <span style="color: white" class="me-2">Comfirm this Payment </span>
            </button></a>

            <x-app-loader/>
    </div>
    <p>

  </ul>


</div>

      <x-privacy-check/>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
</div>
