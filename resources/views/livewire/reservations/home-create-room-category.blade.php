<div>



    <div class="container-xxl flex-grow-1 container-p-y">
        <!--/ page-label component -->
        <div>
            <x-home-page-label>Create, update and remove hotel room categories Here </x-home-page-label>
        </div>
        <!--/ action button component -->
        <div><x-modal-home-create-button data-bs-target="#onboardingSlideModal">Create Category</x-modal-home-create-button></div>
        <hr class="my-2">
        <div class="card">
            @php
            /*
            abandoned in favour of toastr Notifications
            <x-input-success-message />

            <x-custom-error-message />
            */
            @endphp
            <div class="table-responsive text-nowrap">
                <table id="myTable" class="table">
                    <thead class="table-light">
                        <tr>
                            <th>SN</th>
                            <th>Category</th>
                            <th>Wifi</th>
                            <th>Breakfast</th>
                            <th>Lunch</th>
                            <th>Laundry</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($categories as $category )
                        <tr wire:key='{{$category->id}}'>
                            <td>{{$loop->index + 1}}</td>
                            <td>
                                {{$category->category}}
                            </td>
                            <td>
                                {{$category->wifi}}
                            </td>
                            <td>
                                {{$category->breakfast}}
                            </td>
                            <td>
                                {{$category->lunch}}
                            </td>
                            <td>
                                {{$category->laundry}}
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></button>
                                    <div class="dropdown-menu">
                                        <a data-bs-toggle="modal" data-bs-target="#onboardingSlideModal" class="dropdown-item" href="javascript:void(0);" @click="$dispatch('modal-flag', { id: {{ $category->id }} })"><i class="ti ti-pencil me-1"></i> Edit</a>
                                        <a wire:click='destroyCategory({{ $category->id }})' class="dropdown-item" href="javascript:void(0);"><i class="ti ti-trash me-1"></i> Delete</a>
                                    </div>
                                </div>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ categories Rows -->

    </div>
    <livewire:reservations.create-room-category>
</div>
