@extends('patient.layouts.app')

@section('content')
<div class="p-6 w-6/12 mx-auto rounded-2xl bg-white/80 bg-clip-border backdrop-blur-2xl backdrop-saturate-200 ">
    <div class="w-full mx-auto">
      <form role="form" method="POST" action="{{ route('member.search') }}">
        @csrf
        <h3 class="text-xl font-bold mb-4s">Channel Your Doctor</h3>
        <p class="text font-normal">Find convenient appointments by selecting a filter.</p>


        <div class="flex flex-wrap w-full items-center mb-4">
          <div class="w-full lg:w-2/12 pr-2 pt-4">
              <select name="search_by" class="block w-full px-3 py-2 focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text:white/80 text-sm leading-5.6 ease-soft appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                  <option value="#">Search by</option>
                  <option value="search_by_doctor">Doctor</option>
                  <option value="search_by_centre">Centre</option>
                  <option value="search_by_specialization">Specialization</option>
                </select>
          </div>

          <div class="w-full lg:w-6/12 pr-2">
            <div class="search_by_doctor block mt-4" style="display:none;">
              <select name="searchmember" choice id="choices-member" class="block w-full px-3 py-2 focus:shadow-soft-primary-outline border border-solid border-gray-300 rounded-lg" style="background: #fff;">
                <option value="">Select a Doctor</option>
                @foreach ($members as $member)
                  <option value="{{ $member->id }}">{{ $member->user->name }} {{ $member->last_name }}</option>
                @endforeach
              </select>
            </div>
          
            <div class="search_by_centre block mt-4" style="display:none;">
              <select name="searchcentre" id="choices-centre" class="block w-full px-3 py-2 focus:shadow-soft-primary-outline border border-solid border-gray-300 rounded-lg" style="background: #fff;">
                <option value="">Select a Centre</option>
                @foreach ($centres as $centre)
                  <option value="{{ $centre->id }}">{{ $centre->centre_name }} - {{ $centre->centre_city }}</option>
                @endforeach
              </select>
            </div>
          
            <div class="search_by_specialization block mt-4">
              <select name="searchspecialization" id="choices-specialization" class="block w-full px-3 py-2 focus:shadow-soft-primary-outline border border-solid border-gray-300 rounded-lg" style="background: #fff;">
                <option value="">Any Specialization</option>
                @foreach ($specializations as $specialization)
                  <option value="{{ $specialization->id }}">{{ $specialization->name }}</option>
                @endforeach
              </select>
            </div>
          </div> 
            
          <div class="w-full lg:w-4/12 pt-4">
              <div class="flex items-center">
                <input type="date" name="searchdate" class="block w-full px-3 py-2 focus:shadow-soft-primary-outline border border-solid border-gray-300  background:white rounded-lg" style="background: #fff important;">
              </div>
          </div>
        </div>

        <div class="mt-4 text-center">
          <button type="submit" class="inline-block w-full px-6 py-3 mt-2 pt-10 font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer hover:scale-102 active:opacity-85 hover:shadow-soft-xs bg-gradient-to-tl from-purple-700 to-pink-500 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25">Check Availability</button>
        </div>

    </form>
    </div>
  </div>
</div>
@endsection