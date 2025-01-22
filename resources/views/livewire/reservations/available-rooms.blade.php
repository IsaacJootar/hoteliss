<div>
   @php
     use Carbon\Carbon;
   @endphp


    <div class="container-xxl flex-grow-1 container-p-y">
            <!--/ page-label component -->
        <div>
            <x-home-page-label>These  are available rooms for today {{Carbon::now()->format('l, jS \ F, Y')}}</x-home-page-label>
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
                            <th>Value</th>
                          <th>Status</th>

                        </tr>
                    </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($availables as $available)


                            <tr wire:key='{{$available->id}}'>

                                <td>{{$loop->index + 1}}</td>
                                <td>{{Str::ucfirst($room = DB::table('rooms')->where('id', $available->room_id)->value('name'))}}
                                </td>
                                <td>{{DB::table('room_categories')->where('id', $available->category_id)->value('category')}}
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
            <!--/ categories Rows -->

    </div>
</div>
