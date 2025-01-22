<div>



        <form onSubmit="return false">

      <div class="row">
          <div class="col-5">
              <input wire:model="checkin"   class="form-control form-control-lg" placeholder="Select arrival Date" type="text" id="flatpickr-date" required>
          </div>
          <div class="col-5">
              <input wire:model="checkout"   class="form-control form-control-lg"  placeholder="Select departure Date" type="text" id="flatpickr-date2" required>

          </div>
          <div class="col-2">
            <div class="input-group mb-3">

              <button wire:click='search'  type="button" style="width:100px;height:45px;" class="btn btn-primary shadow-none rounded-0 rounded-end-bottom rounded-end-top">
                  Search
                </button>
            </div>

          </div>

        </div>
        <x-app-loader/>
      </form>
</div>
