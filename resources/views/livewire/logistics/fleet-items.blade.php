<div>
    <x-input-error-messages/>

    <div class="container-xxl flex-grow-1 container-p-y">
            <!--/ page-label component -->
        <div>
            <x-home-page-label>Create, update and delete hotel Fleet Items Here </x-home-page-label>
        </div>
         <!--/ action button component -->
    <div>
        <x-modal-home-create-button  data-bs-target="#addFleetItems">Create Fleet Item </x-modal-home-create-button>
    </div>
        <hr class="my-2">
        <div class="card">
<div class="table-responsive text-nowrap">

    <table class="table">
      <thead class="table-light">

                        <tr>
                            <th>SN</th>
                            <th>Item Category</th>
                            <th>Item Name</th>
                            <th>Item Number</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($fleets as $fleet )
                            <tr wire:key='{{$fleet->id}}'>
                                <td>{{$loop->index + 1}}</td>
                                <td>
                                    {{$fleet->category}}
                                </td>
                                <td>
                                    {{$fleet->item_name}}
                                </td>
                                <td>
                                    {{$fleet->item_number}}
                                </td>

                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></button>
                                        <div class="dropdown-menu">
                                            <a wire:click="edit({{ $fleet->id }})" data-bs-toggle="modal" data-bs-target="#addFleetItems" class="dropdown-item" href="javascript:void(0);"><i
                                                class="ti ti-pencil me-1"></i> Edit</a>
                                            <a wire:click='destroy({{ $fleet->id }})'
                                                wire:confirm="Are you sure you want to proceed and delete this item?"
                                                class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ti ti-trash me-1"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!--/ fleet items -->

    </div>

    <form>
    @csrf
    <!-- Add New Fleet Item -->
    <div  wire:ignore.self  class="modal fade" data-bs-focus="false" id="addFleetItems" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
        <div class="modal-content">
          <div class="modal-body">
            <button wire:click='exit' type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            <div class="text-center mb-6">

              <h4 class="mb-2"><x-home-page-label>{{$modal_title}}</x-home-page-label></h4>
            </div>
              <div class="col-12">

                <label for="selectCat" class="form-label">Item Category</label>
                        <select wire:model="category" class="select2 form-select form-select-lg"
                            data-allow-clear="true">
                            <option value="">--Select Fleet Category--</option>

                            <option value="truck">Truck </option>
                            <option value="car">Car </option>
                            <option value="motocycle">Motocycle </option>
                            <option value="ambulance">Ambulance </option>
                            <option value="other">Other </option>

                        </select><br>
                        <label class="form-label w-100" for="modalAddValue">Enter Item Name</label>
                        <div class="input-group input-group-merge">
                            <input wire:model='item_name' class="form-control form-control-lg" type="text"
                                aria-describedby="modalItemName" />
                            <span class="input-group-text cursor-pointer p-1" id="modalAddCard2"><span
                                    class="card-type"></span></span>
                        </div>
                <label class="form-label w-100" for="modaladdFleet">Item Number. </label>
                <div class="input-group input-group-merge">
                  <input wire:model='item_number' class="form-control form-control-lg" type="text" aria-describedby="modaladdFleet" placeholder="Eg. Vehicle Plate No." />
                  <span class="input-group-text cursor-pointer p-1" id="modalAddCard2"><span class="card-type"></span></span>
                </div>

    <br>
              <div class="col-12 text-center">
                <!-- if flag is TRUE, display update action  button -->
                <button wire:click='save' type="button" class="btn btn-primary">{{$modal_flag ? 'Update' : 'Save'}}</button>
                <button wire:click='exit' type="button" class="btn btn-label-secondary btn-reset" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                <x-app-loader/>
              </div>
            </form>
          </div>
        </div>
      </div>


    </div>
    <!--/ New Feet Item Modal -->

    </div>

