<div>
    <x-input-error-messages/>

<<<<<<< HEAD
    <div class="container-xxl flex-grow-1 container-p-y">
            <!--/ page-label component -->
        <div>
            <x-home-page-label>Create, update and delete Maintenace Assets Here </x-home-page-label>
=======
        <div class="col-sm-12 mb-3">&nbsp; &nbsp; &nbsp;
            <x-modal-home-create-button wire:click="openModal">Create Asset</x-modal-home-create-button>
        </div>
        <hr class="my-2">
<<<<<<< Updated upstream
        <div class="table-responsive text-nowrap">
            <table class="table">
                <caption>List of Assets</caption>
                <thead>
                    <tr class="bg-gray-200 text-left">
                        <th>SN</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Category</th>
                        <th>Location</th>
                        <th>Purchase Date</th>
                        <th>Last Maintenance</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($assets as $asset)
                        <tr wire:key='{{$asset->id}}'>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $asset->name }}</td>
                            <td>{{ $asset->type }}</td>
                            <td>{{ $asset->category_id }}</td>
                            <td>{{ $asset->location }}</td>
                            <td>{{ $asset->purchase_date ? $asset->purchase_date->format('Y-m-d') : 'N/A' }}</td>
                            <td>{{ $asset->last_maintenance_date ? $asset->last_maintenance_date->format('Y-m-d') : 'N/A' }}</td>
                            <td>{{ $asset->status }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="ti ti-dots-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0)" wire:click="editAsset({{ $asset->id }})">
                                            <i class="ti ti-pencil me-1"></i> Edit
                                        </a>
                                        <a class="dropdown-item" href="javascript:void(0)" wire:click="deleteAsset({{ $asset->id }})">
                                            <i class="ti ti-trash me-1"></i> Delete
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
=======
        <div class="card">
<div class="table-responsive text-nowrap">

    <table class="table">
      <thead class="table-light">

        <tr class="bg-gray-200 text-left">
            <th>SN</th>
            <th>Name</th>
            <th>Category</th>
            <th>Location</th>
            <th>Purchase Date</th>
            <th>Last Maintenance</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
                    </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($assets as $asset)
                            <tr wire:key='{{$asset->id}}'>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $asset->name }}</td>


<td> {{$count=DB::table('maint_asset_cat')->where('id', $asset->id)->get()->value('name')}}</td>
                                <td>{{ $asset->location }}</td>
                                <td>{{ $asset->purchase_date ? $asset->purchase_date : 'N/A' }}</td>
                                <td>{{ $asset->last_maintenance_date ? $asset->last_maintenance_date : 'N/A' }}</td>
                                <td>{{ $asset->status }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="ti ti-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addAsset" wire:click="edit({{ $asset->id }})">
                                                <i class="ti ti-pencil me-1"></i> Edit
                                            </a>
                                            <a class="dropdown-item" href="javascript:void(0)"
                                             wire:confirm="Are you sure you want to proceed and delete this asset?"
                                            wire:click="delete({{ $asset->id }})">
                                                <i class="ti ti-trash me-1"></i> Delete
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!--/ Assets items -->

    </div>

    <form>
    @csrf
    <!-- Add New Fleet Item -->
    <div  wire:ignore.self  class="modal fade" data-bs-focus="false" id="addAsset" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
        <div class="modal-content">
          <div class="modal-body">
            <button wire:click='exit' type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            <div class="text-center mb-6">

              <h4 class="mb-2"><x-home-page-label>{{$modal_title}}</x-home-page-label></h4>
            </div>


              <div class="col-12">

                <label class="form-label w-100" for="modaladdFleet">Name </label>
                <div class="input-group input-group-merge">
                  <input wire:model='name' class="form-control form-control-lg" type="text" aria-describedby="modaladdFleet" placeholder="Generator" />
                  <span class="input-group-text cursor-pointer p-1" id="modalAddCard2"><span class="card-type"></span></span>
                </div>
                    <br>
                <label for="status" class="form-label">Asset Category</label>
                <select wire:model="category_id" class="form-select form-select-lg" data-allow-clear="true">
                    <option value="">--Select Category-</option>
                    @foreach ($cats as $cat)

                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach
                  </select><br>
                        <label class="form-label w-100" for="modalAddValue">Enter Location</label>
                        <div class="input-group input-group-merge">
                            <input wire:model='location' placeholder="Store or Room 1" class="form-control form-control-lg" type="text"
                                aria-describedby="modalItemName" />
                            <span class="input-group-text cursor-pointer p-1" id="modalAddCard2"><span
                                    class="card-type"></span></span>
                        </div><br>
                        <label class="form-label w-100" for="modaladdFleet">Purchase Date</label>
                        <div class="input-group input-group-merge">
                            <input wire:model="purchase_date"   class="form-control form-control-lg" placeholder="Select arrival Date" type="text" id="flatpickr-date" required>
                            <span class="input-group-text cursor-pointer p-1" id="modalAddCard2"><span class="card-type"></span></span>
                        </div>
                        <br>
                        <label class="form-label w-100" for="modaladdFleet">Last Maintenance Date</label>
                        <div class="input-group input-group-merge">
                            <input wire:model="last_maintenance_date"   class="form-control form-control-lg" placeholder="Last Maintenance Date" type="text" id="flatpickr-date" required>
                            <span class="input-group-text cursor-pointer p-1" id="modalAddCard2"><span class="card-type"></span></span>
                        </div>
                        <br>
                <label for="status" class="form-label">Status</label>
                <select wire:model="status" class="form-select form-select-lg"
                    data-allow-clear="true">
                    <option value="">--Select Status--</option>

                    <option value="Operational">Operational</option>
                    <option value="Under Maintenance">Under Maintenance</option>
                    <option value="Decommissioned">Decommissioned</option>

                </select><br>
              <div class="col-12 text-center">
                <!-- if flag is TRUE, display update action  button -->
                <button wire:click='save' type="button" class="btn btn-primary">{{$modal_flag ? 'Update' : 'Save'}}</button>
                <button wire:click='exit' type="button" class="btn btn-label-secondary btn-reset" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                <x-app-loader/>
              </div>
            </form>
          </div>
>>>>>>> Stashed changes
>>>>>>> f45b03cc80387123b2023670c8a43860e286484b
        </div>
         <!--/ action button component -->
    <div>
        <x-modal-home-create-button  data-bs-target="#addAsset">Create Asset </x-modal-home-create-button>
    </div>
        <hr class="my-2">
        <div class="card">
<div class="table-responsive text-nowrap">

    <table class="table">
      <thead class="table-light">

        <tr class="bg-gray-200 text-left">
            <th>SN</th>
            <th>Name</th>
            <th>Type</th>
            <th>Category</th>
            <th>Location</th>
            <th>Purchase Date</th>
            <th>Last Maintenance</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
                    </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($assets as $asset)
                            <tr wire:key='{{$asset->id}}'>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $asset->name }}</td>
                                <td>{{ $asset->type }}</td>


<td> {{$count=DB::table('maint_assets')->where('id', $asset->id)->get()->value('name')}}</td>
                                <td>{{ $asset->location }}</td>
                                <td>{{ $asset->purchase_date ? $asset->purchase_date : 'N/A' }}</td>
                                <td>{{ $asset->last_maintenance_date ? $asset->last_maintenance_date->format('Y-m-d') : 'N/A' }}</td>
                                <td>{{ $asset->status }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="ti ti-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addAsset" wire:click="edit({{ $asset->id }})">
                                                <i class="ti ti-pencil me-1"></i> Edit
                                            </a>
                                            <a class="dropdown-item" href="javascript:void(0)"
                                             wire:confirm="Are you sure you want to proceed and delete this asset?"
                                            wire:click="delete({{ $asset->id }})">
                                                <i class="ti ti-trash me-1"></i> Delete
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!--/ Assets items -->

    </div>

    <form>
    @csrf
    <!-- Add New Fleet Item -->
    <div  wire:ignore.self  class="modal fade" data-bs-focus="false" id="addAsset" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
        <div class="modal-content">
          <div class="modal-body">
            <button wire:click='exit' type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            <div class="text-center mb-6">

              <h4 class="mb-2"><x-home-page-label>{{$modal_title}}</x-home-page-label></h4>
            </div>


              <div class="col-12">

                <label class="form-label w-100" for="modaladdFleet">Name </label>
                <div class="input-group input-group-merge">
                  <input wire:model='name' class="form-control form-control-lg" type="text" aria-describedby="modaladdFleet" placeholder="Generator" />
                  <span class="input-group-text cursor-pointer p-1" id="modalAddCard2"><span class="card-type"></span></span>
                </div>

                <label for="status" class="form-label">Asset Category</label>
                <select wire:model="category_id" class="select2 form-select form-select-lg" data-allow-clear="true">
                    <option value="">--Select Category-</option>
                    @foreach ($cats as $cat)

                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach
                  </select><br>
                        <label class="form-label w-100" for="modalAddValue">Enter Location</label>
                        <div class="input-group input-group-merge">
                            <input wire:model='location' placeholder="Store or Room 1" class="form-control form-control-lg" type="text"
                                aria-describedby="modalItemName" />
                            <span class="input-group-text cursor-pointer p-1" id="modalAddCard2"><span
                                    class="card-type"></span></span>
                        </div><br>
                <label class="form-label w-100" for="modaladdFleet">Purchase Date</label>
                <div class="input-group input-group-merge">
                    <input wire:model="purchase_date"   class="form-control form-control-lg" placeholder="Select arrival Date" type="text" id="flatpickr-date" required>

                  <span class="input-group-text cursor-pointer p-1" id="modalAddCard2"><span class="card-type"></span></span>
                </div>
                <label for="status" class="form-label">Status</label>
                <select wire:model="status" class="select2 form-select form-select-lg"
                    data-allow-clear="true">
                    <option value="">--Select Status--</option>

                    <option value="Operational">Operational</option>
                    <option value="Under Maintenance">Under Maintenance</option>
                    <option value="Decommissioned">Decommissioned</option>

                </select><br>
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
    <!--/ Asset Modal -->

    </div>

