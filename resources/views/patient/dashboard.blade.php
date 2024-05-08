@extends('patient.layouts.app')

@section('content')
<div class="p-6 w-6/12 mx-auto rounded-2xl bg-white/80 bg-clip-border backdrop-blur-2xl backdrop-saturate-200 ">
    <div class="w-full mx-auto">
     
        <h3 class="text-xl font-bold mb-4s">Channel Your Doctor</h3>
        <p class="text font-normal">Find convenient appointments by selecting a filter.</p>

        <div class="flex flex-wrap w-full items-center mb-4">
        
          @livewire('channel-search')
        </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
    
@endpush