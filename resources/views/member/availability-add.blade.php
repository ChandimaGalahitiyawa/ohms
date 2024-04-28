@extends('member.layouts.app')

@section('content')
<div class="flex-auto p-6 w-6/12 mx-auto">
    <div class="my-10 w-full mx-auto">
        <form role="form" method="POST" action="{{ route('createWeeklyAvailability') }}">
        @csrf
        <h3 class="text-xl font-bold mb-4">Weekly Availability</h3>
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
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                            <option value="Sunday">Sunday</option>
                        </select>
                    </div>
                    <div class="w-full lg:w-3/12 pr-2">
                        <input type="time" name="week_start_time[]" class="block w-full px-3 py-2 focus:shadow-soft-primary-outline border border-solid border-gray-300 rounded-lg">
                    </div>
                    <div class="w-full lg:w-3/12 pr-2">
                        <input type="time" name="week_end_time[]" class="block w-full px-3 py-2 focus:shadow-soft-primary-outline border border-solid border-gray-300 rounded-lg">
                    </div>
                    <div class="w-full lg:w-3/12">
                        <div class="flex items-center">
                            <input type="number" name="week_slots[]" placeholder="Slots" class="block w-full px-3 py-2 focus:shadow-soft-primary-outline border border-solid border-gray-300 rounded-lg">
                            <!-- Remove button -->
                            <button type="button" class="remove-day ml-2 text-red-500" onclick="removeDayTimeSlot(this)">X</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" id="add-more-days" class="inline-block mb-2 ml-1 font-bold text-slate-500 text-xs">Add More</button>
        
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Function to add more date/time slots
                document.getElementById('add-more-dates').addEventListener('click', function() {
                    var container = document.getElementById('date-time-container');
                    var currentInputs = container.querySelector('.date-time-slot:last-of-type').querySelectorAll('input');
                    var allFilled = Array.from(currentInputs).every(input => input.value.trim() !== '');
            
                    if (allFilled) {
                        var template = container.querySelector('.date-time-slot').cloneNode(true);
                        // Reset all input fields in the cloned template
                        template.querySelectorAll('input').forEach(input => input.value = '');
                        container.appendChild(template);
                    } else {
                        alert("Please fill all fields before adding more.");
                    }
                });
            
                // Function to remove a date/time slot group
                window.removeDateTimeSlot = function(element) {
                    var container = document.getElementById('date-time-container');
                    if (container.querySelectorAll('.date-time-slot').length > 1) {
                        element.closest('.date-time-slot').remove();
                    } else {
                        alert("At least one date/time slot is required.");
                    }
                };
            });
            </script>
    <br>
        <!-- Centre Name Select Dropdown -->
        <label class="inline-block mb-2 ml-1 font-bold text-slate-700 text-xs">Selec Centre</label>
        <div class="mb-4">
            <select name="centre_id" class="block w-full px-3 py-2 focus:shadow-soft-primary-outline border border-solid border-gray-300 rounded-lg">
                <option value="">Select a Centre</option>
                @foreach ($centres as $centre)
                    <option value="{{ $centre->id }}">{{ $centre->centre_name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit" class="inline-block w-full px-6 py-3 mt-2 pt-10 font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer hover:scale-102 active:opacity-85 hover:shadow-soft-xs bg-gradient-to-tl from-purple-700 to-pink-500 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25">Set Availability</button>
        </div>

    </form>
    </div>
    <br><br>
    <div class="my-10 w-full mx-auto">
    <form role="form" method="POST" action="{{ route('createSpecificAvailability') }}">
        @csrf
        <h3 class="text-xl font-bold mt-8 mb-4"> Specific Availability</h3>

        <div id="date-time-container">
            <!-- Static Labels -->
            <div class="flex flex-wrap w-full items-center mb-4">
                <div class="w-full lg:w-3/12 pr-2">
                    <label class="inline-block mb-2 ml-1 font-bold text-slate-700 text-xs">Select Date</label>
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
            <!-- Initial date/time slots input group -->
            <div class="date-time-slot">
                <div class="flex flex-wrap w-full items-center mb-4">
                    <div class="w-full lg:w-3/12 pr-2">
                        <input type="date" name="specific_dates[]" class="block w-full px-3 py-2 focus:shadow-soft-primary-outline border border-solid border-gray-300 rounded-lg">
                    </div>
                    <div class="w-full lg:w-3/12 pr-2">
                        <input type="time" name="specific_start_times[]" class="block w-full px-3 py-2 focus:shadow-soft-primary-outline border border-solid border-gray-300 rounded-lg">
                    </div>
                    <div class="w-full lg:w-3/12 pr-2">
                        <input type="time" name="specific_end_times[]" class="block w-full px-3 py-2 focus:shadow-soft-primary-outline border border-solid border-gray-300 rounded-lg">
                    </div>
                    <div class="w-full lg:w-3/12">
                        <div class="flex items-center">
                            <input type="number" name="specific_slots[]" placeholder="Slots" class="block w-full px-3 py-2 focus:shadow-soft-primary-outline border border-solid border-gray-300 rounded-lg">
                            <!-- Remove button -->
                            <button type="button" class="remove-day ml-2 text-red-500" onclick="removeDateTimeSlot(this)">X</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" id="add-more-dates" class="inline-block mb-2 ml-1 font-bold text-slate-500 text-xs">Add More</button>
        
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Function to add more day/time slots
                document.getElementById('add-more-days').addEventListener('click', function() {
                    var container = document.getElementById('day-container');
                    var currentInputs = container.querySelector('.day-time-slot:last-of-type').querySelectorAll('select, input');
                    var allFilled = Array.from(currentInputs).every(input => input.value.trim() !== '');
            
                    if (allFilled) {
                        var template = container.querySelector('.day-time-slot').cloneNode(true);
                        // Reset all input fields in the cloned template
                        template.querySelectorAll('select, input').forEach(input => input.value = '');
                        container.appendChild(template);
                    } else {
                        alert("Please fill all fields before adding more.");
                    }
                });
            
                // Function to remove a day/time slot group
                window.removeDayTimeSlot = function(element) {
                    var container = document.getElementById('day-container');
                    if (container.querySelectorAll('.day-time-slot').length > 1) {
                        element.closest('.day-time-slot').remove();
                    } else {
                        alert("At least one day/time slot is required.");
                    }
                };
            });
            </script>
            <br>
        <!-- Centre Name Select Dropdown -->
        <label class="inline-block mb-2 ml-1 font-bold text-slate-700 text-xs">Select Centre</label>
        <div class="mb-4">
            <select name="centre_id" class="block w-full px-3 py-2 focus:shadow-soft-primary-outline border border-solid border-gray-300 rounded-lg">
                <option value="">Select a Centre</option>
                @foreach ($centres as $centre)
                    <option value="{{ $centre->id }}">{{ $centre->centre_name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit" class="inline-block w-full px-6 py-3 mt-2 mb-0 font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer hover:scale-102 active:opacity-85 hover:shadow-soft-xs bg-gradient-to-tl from-purple-700 to-pink-500 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25">Set Availability</button>
        </div>
        </form>
    </div>
  </div>
</div>
@endsection