@extends('member.layouts.app')

@section('content')

<div class="w-full p-6 mx-auto">

    <div class="flex flex-wrap -mx-3">
      <div class="w-full max-w-full px-3 flex-0">
        <div class="relative flex flex-col min-w-0 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
          <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
            <div class="lg:flex">
              <div>
                <h5 class="mb-0 dark:text-white">Appointments</h5>
              </div>
              <div class="my-auto mt-6 ml-auto lg:mt-0">
              </div>
            </div>
          </div>
  
            {{-- table --}}
            <div class="flex-auto p-6 px-0 pb-0">
              <div class="overflow-x-auto table-responsive">
                <table class="table" datatable id="products-list">
                    <thead class="thead-light">
                        <tr>
                            <th>Date</th>
                            <th>Queue No</th>
                            <th>Center</th>
                            <th>Doctor</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($bookings as $booking)
                      <tr>
                          <td class="leading-normal text-sm">{{$booking->appointment_date}}</td>
                          <td class="leading-normal text-sm">{{$booking->queue_no}}</td>
                          <td class="leading-normal text-sm">{{$booking->center->centre_name}}</td>
                          <td class="leading-normal text-sm">{{$booking->doctor->user->name}} {{$booking->doctor->last_name}} </td>
                          <td class="leading-normal text-sm">{{$booking->total}}</td>
                          <td class="p-2 leading-normal w-2/12 text-center align-middle border-b border-gray-200 border-solid text-sm whitespace-nowrap">
                            <span class="font-semibold leading-tight dark:text-white text-xs">
                              @if ($booking->status == 'pending')
                                <span class="py-2.2 px-3.6 text-xs rounded-md w-full inline-block whitespace-nowrap text-center text-white bg-gradient-to-tl from-blue-600 to-cyan-400 align-baseline font-bold uppercase leading-none">Pending</span>
                              @elseif($booking->status == 'completed')
                                <span class="py-2.2 px-3.6 text-xs rounded-md w-full inline-block whitespace-nowrap text-center text-white bg-gradient-to-tl from-green-600 to-lime-400 align-baseline font-bold uppercase leading-none">Completed</span>
                              @elseif($booking->status == 'ongoing')
                                <span class="py-2.2 px-3.6 text-xs rounded-md w-full inline-block whitespace-nowrap text-center text-white bg-gradient-to-tl from-red-600 to-rose-400 align-baseline font-bold uppercase leading-none">Ongoing</span>
                              @endif
                            </span>
                          </td>
                          <td class="leading-normal flex items-center gap-4 justify-end text-sm">
                            <a href="{{route('viewAppointment', $booking->id)}}" >
                                <i class="fas fa-eye text-slate-400 dark:text-white/70">&nbsp; view</i>
                            </a>

                            @if($booking->status == 'pending' || $booking->status == 'ongoing')
                            <a href="{{route('finishAppointment', $booking->id)}}" >
                                <i class="fas fa-flag text-green-400 dark:text-white/70">&nbsp; Finish</i>
                            </a>
                            @endif
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Accept Currency</th>
                          <th>Fee Type</th>
                          <th>Fee</th>
                          <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            </div>
          </div>
        </div>
      </div>
</div>


@endsection