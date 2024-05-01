
@extends('patient.layouts.app')

@section('content')
<div class="p-6 mx-6 rounded-2xl bg-white/80 bg-clip-border backdrop-blur-2xl backdrop-saturate-200 ">
    <div class="w-full mx-auto">
     
        <h3 class="text-xl font-bold mb-4s">Make Your Booking For {{$doctor->user->name}} {{$doctor->last_name}}</h3>
        <p class="text font-normal">You Can Filter The Bookings By Selecting Date And Center</p>

        <div class="flex flex-wrap w-full items-center mb-4">
             @livewire('doctor-availabilities', ['doctor' => $doctor], key($doctor->id))
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
@endpush