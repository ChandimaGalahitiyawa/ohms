@extends('member.layouts.app')

@section('content')
<div class="flex-auto p-6 w-6/12 mx-auto overflow-hidden break-words border-0 shadow-blur dark:shadow-soft-dark-xl dark:bg-gray-950 rounded-2xl bg-white/80 bg-clip-border backdrop-blur-2xl backdrop-saturate-200">
    <div class="my-10 w-full mx-auto">
        <h3 class="text-xl font-bold mb-4">Add Availability</h3>
        <p class="text font-normal">Customize your availability by setting locations and specifying availability based on weekly schedules or specific time slots. You can add multiple availability options, each allowing you to specify the number of patients who can book a session.</p>
    </div>
    <br>
    <div class="my-10 w-full mx-auto">

        <div class="w-full mx-auto">
            <div>
              <div class="mb-4 rounded-t-1">
                <div class="overflow-hidden transition-all ease-soft-in-out duration-350">
                  <div class="p-4 leading-normal text-sm opacity-80 ">
                    <form role="form" method="POST" action="{{ route('updateWeeklyAvailability', $availability->id) }}">
                        @csrf
                        <label class="inline-block mb-2 ml-1 font-bold text-slate-700 text-xs">Selec Centre</label>
                        <div class="mb-4">
                            <select choice id="choices-centre1" name="centre_id" class="block w-full px-3 py-2 focus:shadow-soft-primary-outline border border-solid border-gray-300 rounded-lg">
                                <option value="">Select a Centre</option>
                                @foreach ($centres as $centre)
                                    <option value="{{ $centre->id }}" {{  $centre->id == $centre->id ? 'selected' : '' }}>{{ $centre->centre_name }} - {{ $centre->centre_city }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div id="day-container">
                            <!-- Static Labels -->
                            <div class="flex flex-wrap w-full items-center mb-4">
                                <div class="w-full lg:w-3/12 pr-2">
                                    <label class="inline-block mb-2 ml-1 font-bold text-slate-700 text-xs">Select a Day</label>
                                </div>
                                <div class="w-full lg:w-3/12 pr-2">
                                    <label class="inline-block mb-2 ml-1 font-bold text-slate-700 text-xs">Start Time</label>
                                </div>
                                <div class="w-full lg:w-3/12 pr-2">
                                    <label class="inline-block mb-2 ml-1 font-bold text-slate-700 text-xs">End Time</label>
                                </div>
                                <div class="w-full lg:w-3/12">
                                    <label class="inline-block mb-2 ml-1 font-bold text-slate-700 text-xs">Number of Slots</label>
                                </div>
                            </div>
                            <!-- Initial day/time slots input group -->
                            <div class="day-time-slot">
                                <div class="flex flex-wrap w-full items-center mb-4">
                                    <div class="w-full lg:w-3/12 pr-2">
                                        <select name="days[]" class="block w-full px-3 py-2 focus:shadow-soft-primary-outline border border-solid border-gray-300 rounded-lg">
                                            <option value="">Select a Day</option>
                                            <option value="Monday" {{  $availability->day == 'Monday' ? 'selected' : '' }}>Monday</option>
                                            <option value="Tuesday" {{  $availability->day == 'Tuesday' ? 'selected' : '' }}>Tuesday</option>
                                            <option value="Wednesday" {{  $availability->day == 'Wednesday' ? 'selected' : '' }}>Wednesday</option>
                                            <option value="Thursday" {{  $availability->day == 'Thursday' ? 'selected' : '' }}>Thursday</option>
                                            <option value="Friday" {{  $availability->day == 'Friday' ? 'selected' : '' }}>Friday</option>
                                            <option value="Saturday" {{  $availability->day == 'Saturday' ? 'selected' : '' }}>Saturday</option>
                                            <option value="Sunday" {{  $availability->day == 'Sunday' ? 'selected' : '' }}>Sunday</option>
                                        </select>
                                    </div>
                                    <div class="w-full lg:w-3/12 pr-2">
                                        <input type="time" value="{{$availability->start_time}}" name="week_start_time" class="block w-full px-3 py-2 focus:shadow-soft-primary-outline border border-solid border-gray-300 rounded-lg">
                                    </div>
                                    <div class="w-full lg:w-3/12 pr-2">
                                        <input type="time" value="{{$availability->end_time}}" name="week_end_time" class="block w-full px-3 py-2 focus:shadow-soft-primary-outline border border-solid border-gray-300 rounded-lg">
                                    </div>
                                    <div class="w-full lg:w-3/12">
                                        <div class="flex items-center">
                                            <input type="number" value="{{$availability->slots}}" name="week_slots" placeholder="Slots" class="block w-full px-3 py-2 focus:shadow-soft-primary-outline border border-solid border-gray-300 rounded-lg">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="inline-block w-full px-6 py-3 mt-2 pt-10 font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer hover:scale-102 active:opacity-85 hover:shadow-soft-xs bg-gradient-to-tl from-purple-700 to-pink-500 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25">Update</button>
                        </div>
                
                    </form>
                </div>
                </div>
              </div>
             
              </div>
            </div>
          </div>
    </div>
  </div>
</div>
<br><br>
@endsection