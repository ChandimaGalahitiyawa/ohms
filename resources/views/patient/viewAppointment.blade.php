
@extends('patient.layouts.app')

@section('content')
<div class="p-6 mx-6">
    <div class="w-full mx-auto">

        <div class="flex flex-wrap w-full items-center mb-4">

        <div class="flex w-full flex-wrap -mx-3">
            <div class="w-full max-w-full flex justify-start  px-3 mx-auto lg:flex-0 shrink-0">
              <div class="relative flex mr-2 flex-col min-w-0 mb-6 lg:w-6/12 p-6  break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl  rounded-2xl bg-clip-border">
                <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-4 pb-0">
                  <div class="flex items-center justify-between">
                    <div>
                      <h6 class="dark:text-white uppercase">Center: {{$center->centre_name}}, {{$center->centre_city}}</h6>
                      <p class="mb-0 leading-normal max-w-80 text-sm">
                        Address: {{$center->address}}
                      </p>
                      <p class="mb-0 leading-normal text-sm">
                        Email: {{$center->centre_email_address}}
                      </p>
                      <p class="leading-normal text-sm">
                        Phone: {{$center->centre_contact_number}}
                      </p>
                      <p class="leading-normal font-bold text-sm">
                        Date: {{$appointment->appointment_date}}
                      </p>
                    </div>
                  </div>
                </div>
              
                <div class="flex-auto p-4 pt-0">
                  <hr class="h-px mt-0 mb-6 bg-gradient-to-r from-transparent via-black/40 to-transparent" />
                  <div class="flex flex-wrap -mx-3">
                    <div class="w-full max-w-full px-3 flex-0 md:w-6/12">
                      <div class="flex">
                        <div>
                          <h6 class="mt-2 mb-0 dark:text-white text-lg">{{$doctor->user->name}} {{$doctor->last_name}}</h6>
                          <p class="mb-4 leading-normal text-sm">{{$doctor->specializations->first()->name}}</p>
                          <span class="py-1.8 px-3 text-xxs rounded-1 inline-block whitespace-nowrap bg-gradient-to-tl from-green-600 to-lime-400 text-center align-baseline font-bold uppercase leading-none text-white">{{$appointment->queue_no}}</span>
                        </div>
                      </div>
                    </div>
                   
                  </div>
                  <hr class="h-px mt-0 mb-6 bg-gradient-to-r from-transparent via-black/40 to-transparent" />
                  <div class="flex flex-wrap -mx-3">
                
                    <div class="w-full max-w-full px-3">
                      <h6 class="mb-4 dark:text-white">Booking Summary</h6>
                      <div class="flex justify-between">
                        <span class="mb-2 leading-normal text-sm">Reference Id:</span>
                        <span class="ml-2 font-semibold text-slate-700 dark:text-white">{{$appointment->reference_id}}</span>
                      </div>
                      <div class="flex justify-between">
                        <span class="mb-2 leading-normal text-sm">Date:</span>
                        <span class="ml-2 font-semibold text-slate-700 dark:text-white">{{$appointment->date}}</span>
                      </div>
                      <div class="flex justify-between">
                        <span class="mb-2 leading-normal text-sm">Queue No:</span>
                        <span class="ml-2 font-semibold text-slate-700 dark:text-white">{{$appointment->queue_no}}</span>
                      </div>
                      <div class="flex justify-between">
                        <span class="mb-2 leading-normal text-sm">Center Charge:</span>
                        <span class="ml-2 font-semibold text-slate-700 dark:text-white">LKR. {{$center->centre_fee}}</span>
                      </div>
                      <div class="flex justify-between">
                        <span class="mb-2 leading-normal text-sm">Doctor Charge:</span>
                        <span class="ml-2 font-semibold text-slate-700 dark:text-white">LKR. {{$doctor->specializations->first()->pivot->fee}}</span>
                      </div>
                      <div class="flex justify-between">
                        <span class="mb-2 leading-normal text-sm">Other:</span>
                        <span class="ml-2 font-semibold text-slate-700 dark:text-white"> - </span>
                      </div>
                      <div class="flex justify-between mt-6">
                        <span class="mb-2 text-lg">Total:</span>
                        <span class="ml-2 font-semibold text-lg text-slate-700 dark:text-white">LKR. {{$appointment->total}}</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              @if($appointment->status == 'completed')
              <div class="relative flex flex-col min-w-0 mb-6 lg:w-6/12 p-6  break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl  rounded-2xl bg-clip-border">
                <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-4 pb-0">
                  <div class="flex items-center justify-between">
                    <div>

                      <span class="font-semibold leading-tight dark:text-white text-xs">
                        @if ($appointment->status == 'pending')
                          <span class="py-2.2 px-3.6 text-xs rounded-md w-full inline-block whitespace-nowrap text-center text-white bg-gradient-to-tl from-blue-600 to-cyan-400 align-baseline font-bold uppercase leading-none">Pending</span>
                        @elseif($appointment->status == 'completed')
                          <span class="py-2.2 px-3.6 text-xs rounded-md w-full inline-block whitespace-nowrap text-center text-white bg-gradient-to-tl from-green-600 to-lime-400 align-baseline font-bold uppercase leading-none">Completed</span>
                        @elseif($appointment->status == 'ongoing')
                          <span class="py-2.2 px-3.6 text-xs rounded-md w-full inline-block whitespace-nowrap text-center text-white bg-gradient-to-tl from-red-600 to-rose-400 align-baseline font-bold uppercase leading-none">Ongoing</span>
                        @endif
                      </span>


                      <h6 class="dark:text-white pt-12 uppercase">Center: {{$center->centre_name}}, {{$center->centre_city}}</h6>
                      <p class="mb-0 leading-normal max-w-80 text-sm">
                        Address: {{$center->address}}
                      </p>
                      <p class="mb-0 leading-normal text-sm">
                        Email: {{$center->centre_email_address}}
                      </p>
                      <p class="leading-normal text-sm">
                        Phone: {{$center->centre_contact_number}}
                      </p>
                      <p class="leading-normal font-bold text-sm">
                        Date: {{$appointment->appointment_date}}
                      </p>
                    </div>

                   
                  </div>

                  <div>
                    <h6 class="dark:text-white uppercase">{{$appointment->doctorNote->description}}</h6>

                    @if($appointment->doctorNote->file_path)
                      <p class="mb-0 leading-normal text-blue-500 max-w-80 text-sm">
                        Prescription : <a class="font-bold text-blue-500" href="{{asset('/storage/'. $appointment->doctorNote->file_path)}}"> Prescription File (click to View)</a>
                      </p>
                    @endif
                   
                  </div>
                </div>
              </div>
              @endif
             
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
    
<script>
  document.addEventListener("DOMContentLoaded", function () {
      var today = new Date();

      flatpickr("#DatePicker", {
          allowInput: true,
          dateFormat: "Y-m-d",
      });

  });
</script>

<script>

if (document.getElementById("choices-centers")) {
  var centers = document.getElementById("choices-centers");
  const example = new Choices(centers, {
    searchEnabled: true, // Enable search feature
  });
}

</script>

<script>
    // Set the time for the countdown (10 minutes)
    var countdownTime = 600; // 10 minutes * 60 seconds

    // Update the countdown timer every second
    var timerInterval = setInterval(function() {
        countdownTime--;

        // Calculate remaining minutes and seconds
        var minutes = Math.floor(countdownTime / 60);
        var seconds = countdownTime % 60;

        // Add leading zeros if necessary
        var formattedMinutes = minutes < 10 ? '0' + minutes : minutes;
        var formattedSeconds = seconds < 10 ? '0' + seconds : seconds;

        // Update the timer display
        document.getElementById('countdown').textContent = formattedMinutes + ':' + formattedSeconds;

        // Check if the countdown has reached zero
        if (countdownTime <= 0) {
            clearInterval(timerInterval); // Stop the timer
            // Optionally, you can add code here to handle what happens when the timer expires
        }
    }, 1000); // Update the timer every second (1000 milliseconds)
</script>
@endpush