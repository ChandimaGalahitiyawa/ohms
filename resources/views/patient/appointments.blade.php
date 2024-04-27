@extends('patient.layouts.app')

@section('content')
<div class="p-6 w-6/12 mx-auto">
    <div class="w-full mx-auto">
        <form role="form" method="POST" action="#">
        @csrf
        <h3 class="text-xl font-bold mb-4 text-center">Channel Your Doctor</h3>

        <div class="mt-4">
            <select choice name="member" id="choices-member" class="block w-full px-3 py-2 focus:shadow-soft-primary-outline border border-solid border-gray-300  background:white rounded-lg" style="background: #fff important;">
                <option value="">Doctor</option>
                <option value="member">First Name + Last Name</option>
            </select>
        </div>

        <div class="mt-4">
            <select name="specialization" choice  id="choices-specialization" class="block w-full px-3 py-2 focus:shadow-soft-primary-outline border border-solid border-gray-300  background:white rounded-lg" style="background: #fff important;">
                <option value="">Specialization</option>
                <option value="Monday">Selected Member's Specialization</option>
                <option value="Monday">if member not select, direct search specialization show all members Specialization</option>
            </select>
        </div>

        <div class="mt-4">
            <div class="relative z-0 flex flex-col min-w-0 p-3 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border">
                this will show selected member's Availability in calendar, based on Specialization or member selected, or if member not selected, then not show any members Availability in calendar
                <div data-toggle="calendar" id="calendar"></div>
            </div>
        </div>
        <!-- Submit Button -->
        <div class="mt-4 text-center">
            <button type="submit" class="inline-block w-full px-6 py-3 mt-2 pt-10 font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer hover:scale-102 active:opacity-85 hover:shadow-soft-xs bg-gradient-to-tl from-purple-700 to-pink-500 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25">Check Availability</button>
        </div>
    </form>

    <form>
        <div class="mt-4">
        <select choice name="specialization" id="choices-specialization" class="block w-full px-3 py-2 focus:shadow-soft-primary-outline border border-solid border-gray-300  background:white rounded-lg" style="background: #fff important;">
            this base on member's availablity, according customer select date, if no result then show no availablity message here
        <option value="">Time Range & Remaining Slots</option>
            <option value="avalablity time">according member's avalablity, and Remaining slots here, if customer select one and book one then slots reduce according to avvlocation.</option>
           <option value="avalablity time">We sorry. No Remaining Slots / No availablity on this date </option>
        </select>

        <button class="mt-4">Payment</button>
        </div>
            <!-- Submit Button -->
            <div class="mt-4 text-center">
                <button type="submit" class="inline-block w-full px-6 py-3 mt-2 pt-10 font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer hover:scale-102 active:opacity-85 hover:shadow-soft-xs bg-gradient-to-tl from-purple-700 to-pink-500 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25">Book now</button>
            </div>
        </form>
    </div>
  </div>
</div>
@endsection