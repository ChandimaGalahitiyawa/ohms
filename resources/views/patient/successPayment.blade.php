
@extends('patient.layouts.app')

@section('content')
<div class="p-6 mx-6 rounded-2xl bg-white/80 bg-clip-border backdrop-blur-2xl backdrop-saturate-200 ">
    <div class="w-full mx-auto">
     
        <h3 class="text-xl font-bold mb-4s">Payment Success For {{$doctor->user->name}} {{$doctor->last_name}} For {{$date}}</h3>


        <div class="relative flex flex-col min-w-0 break-words bg-white border-0 dark:bg-green-900 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="flex-auto p-4 bg-gradient-to-tl from-green-700 to-green-500 dark:bg-gradient-to-tl dark:from-slate-850 dark:to-gray-850 rounded-xl">
              <h6 class="mb-0 text-white">Payment SuccessFull</h6>
              <a  href="{{route('myBookings')}}" class="inline-block px-6 py-3 mb-0 font-bold text-right uppercase align-middle transition-all border-0 rounded-lg cursor-pointer hover:scale-102 active:opacity-85 hover:shadow-soft-xs bg-gradient-to-tl from-gray-400 to-gray-100 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 text-slate-800">My Bookings</a>
            </div>
          </div>

        <div class="flex flex-wrap w-full items-center mb-4">

        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 mx-auto lg:flex-0 shrink-0">
              <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl  rounded-2xl bg-clip-border">
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
                        Date: {{$date}}
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
                          <span class="py-1.8 px-3 text-xxs rounded-1 inline-block whitespace-nowrap bg-gradient-to-tl from-green-600 to-lime-400 text-center align-baseline font-bold uppercase leading-none text-white">{{$queueNo}}</span>
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
                        <span class="ml-2 font-semibold text-slate-700 dark:text-white">{{$referenceId}}</span>
                      </div>
                      <div class="flex justify-between">
                        <span class="mb-2 leading-normal text-sm">Date:</span>
                        <span class="ml-2 font-semibold text-slate-700 dark:text-white">{{$date}}</span>
                      </div>
                      <div class="flex justify-between">
                        <span class="mb-2 leading-normal text-sm">Queue No:</span>
                        <span class="ml-2 font-semibold text-slate-700 dark:text-white">{{$queueNo}}</span>
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
                        <span class="ml-2 font-semibold text-lg text-slate-700 dark:text-white">LKR. {{$total}}</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
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