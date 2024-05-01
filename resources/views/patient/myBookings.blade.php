@extends('patient.layouts.app')

@section('content')
<div class="w-full p-6 mx-auto">

    <div class="flex flex-wrap -mx-3">
      <div class="w-full max-w-full px-3 flex-0">
        <div class="relative flex flex-col min-w-0 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
          <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
            <div class="lg:flex">
              <div>
                <h5 class="mb-0 dark:text-white">My Bookings</h5>
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
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($mybookings as $booking)
                    <tr>
                        <td class="leading-normal text-sm">{{$booking->appointment_date}}</td>
                        <td class="leading-normal text-sm">{{$booking->queue_no}}</td>
                        <td class="leading-normal text-sm">{{$booking->center->centre_name}}</td>
                        <td class="leading-normal text-sm">{{$booking->doctor->user->name}} {{$booking->doctor->last_name}} </td>
                        <td class="leading-normal text-sm">{{$booking->total}}</td>
                       
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