<div>
    <section class="section-py bg-body first-section-pt">
        <div class="container">
          <!--/ Checkout Wizard -->
          <!-- Checkout Wizard -->
          <div id="wizard-checkout" class="bs-stepper wizard-icons wizard-icons-example">
            <div class="bs-stepper-content border-top">
              <form id="wizard-checkout-form" onSubmit="return false">
@php
          use Carbon\Carbon;
          use Illuminate\Support\Facades\Storage;

          if (session()->get('token') == 1){// from index
          $checkin=Carbon::now()->timezone('Africa/Lagos')->format('Y-m-d');
          $checkout=Carbon::now()->addDays(1)->timezone('Africa/Lagos')->format('Y-m-d'); // working with dates is exhuasting
         }

         if (session()->get('token') == 2){ //from search
          $checkin= session('checkin');
          $checkout=session('checkout');
         }

          $checkin=Carbon::now()->timezone('Africa/Lagos')->format('Y-m-d');
          $checkout=Carbon::now()->addDays(1)->timezone('Africa/Lagos')->format('Y-m-d'); // working with dates is exhuasting



@endphp

<!-- Reservation search results starts -->
<h6 class="pb-1 mb-6"><span class="badge rounded-pill bg-label-info">Available rooms below are from time period:  <strong>   {{$checkin}} -  {{ $checkout}} </strong> You can search again using different dates above</span></h6>
<div class="row mb-12 g-6">
    @foreach ($allocations as $allocation)
  <div class="col-md">
    <div class="card">
      <div class="row g-0">
        <div class="col-md-4">
          <img class="card-img card-img-left" src="{{ Storage::url('room-images/'.$allocation->category->image) }}"  alt="Card image" />
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h4 class="card-title"> <span class="badge bg-label-primary"> {{ $allocation->category->category}}</span></h4>

            <p class="card-text">
                {{ $allocation->category->details}}
            </p>
              <hr><br/>
                <h6 class="mb-1">Special Offers</h6>
                 <!-- Specials-make this dynamic later and allow managers add at will -->
                <p>
                <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-4 my-2">
                    <li class="list-inline-item d-flex gap-2 align-items-center">
                        @php if($allocation->category->wifi == 1){ echo '<i class="fas fa-wifi"></i>'.' <span class="fw-medium">WiFi</span>';} @endphp
                      </li>
                      <li class="list-inline-item d-flex gap-2 align-items-center">
                        @php if($allocation->category->breakfast == 1){ echo '<i class="fas fa-coffee"></i>'.' <span class="fw-medium">Breakfast</span>';} @endphp
                    </li>
                    <li class="list-inline-item d-flex gap-2 align-items-center">
                        @php if($allocation->category->lunch == 1){ echo '<i class="fas fa-concierge-bell"></i>'.' <span class="fw-medium">Lunch</span>';} @endphp
                    </li>
                    <li class="list-inline-item d-flex gap-2 align-items-center">
                        @php if($allocation->category->laundry == 1){ echo '<i class="fas fa-tshirt"></i>'.' <span class="fw-medium">Laundry </span>';} @endphp
                    </li>



                  </ul>
                </p>


            </p> <br/>
            <h6 class="mb-1">Price: {{Helper::format_currency(DB::table('room_allocations')->where('category_id', $allocation->category_id)->get()->value('price'))}}
                <h6 class="mb-1">Per Night (Inc. Tax ) </h6>
        </h6>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>

</div>
  </div>
              </form>
            </div>
             <!--  Reservation search results ends-->
          </div>
          <!--/ Checkout Wizard -->


          <!-- Add new address modal -->

          <!--/ Add New Address Modal -->

        </div>
      </section>
</div>
