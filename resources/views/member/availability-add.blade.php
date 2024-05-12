@extends('member.layouts.app')

@section('content')
<div class="flex-auto p-6 w-6/12 mx-auto overflow-hidden break-words border-0 shadow-blur dark:shadow-soft-dark-xl dark:bg-gray-950 rounded-2xl bg-white/80 bg-clip-border backdrop-blur-2xl backdrop-saturate-200">
    <div class="my-10 w-full mx-auto">
        <h3 class="text-xl font-bold mb-4">Add Availability</h3>
        <p class="text font-normal">Customize your availability by setting locations and specifying availability based on weekly schedules or specific time slots. You can add multiple availability options, each allowing you to specify the number of patients who can book a session.</p>
    </div>
        <div section-content class="overflow-hidden transition-all ease-soft-in-out duration-350">
            <div class="p-4 leading-normal text-sm opacity-80 ">
              <form role="form" method="POST" action="{{ route('createWeeklyAvailability') }}">
                  @csrf

                  <!-- Centre Name Select Dropdown -->
                  <label class="inline-block mb-2 ml-1 font-bold text-slate-700 text-xs">Available Center</label>
                  <div class="mb-4">
                      <select choice id="choices-centre1" name="centre_id" class="block w-full px-3 py-2 focus:shadow-soft-primary-outline border border-solid border-gray-300 rounded-lg">
                          <option value="">Select a Centre</option>
                          @foreach ($centres as $centre)
                              <option value="{{ $centre->id }}">{{ $centre->centre_name }} - {{ $centre->centre_city }}</option>
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
          
                  <!-- Submit Button -->
                  <div class="text-center">
                      <button type="submit" class="inline-block w-full px-6 py-3 mt-2 mb-0 font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer hover:scale-102 active:opacity-85 hover:shadow-soft-xs bg-gradient-to-tl from-purple-700 to-pink-500 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25">Submit</button>
                  </div>
          
              </form>
          </div>
          </div>
  </div>
</div>
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
<br><br>
@endsection