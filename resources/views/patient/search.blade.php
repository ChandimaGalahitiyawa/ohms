@extends('patient.layouts.app')

@section('content')

<div class="p-6 w-6/12 mx-auto rounded-2xl bg-white/80 bg-clip-border backdrop-blur-2xl backdrop-saturate-200 ">
    <div class="w-full mx-auto">
      <h3 class="text-xl font-bold mb-4s">Channel Your Doctor</h3>
      <p class="text font-normal">Find convenient appointments by selecting a filter.</p>


      @foreach ($members as $member)
      <div class="pt-6 pb-6 w-full mx-auto">
        <div class="relative flex flex-col flex-auto min-w-0 overflow-hidden break-words border-0 shadow-blur dark:shadow-soft-dark-xl dark:bg-gray-950 rounded-2xl bg-white/80 bg-clip-border backdrop-blur-2xl backdrop-saturate-200">
          <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-auto max-w-full px-3">
              <div class="text-base ease-soft-in-out h-19 w-19 relative inline-flex items-center justify-center rounded-xl text-white transition-all duration-200">
                <img src="../../../assets/img/bruce-mars.jpg" alt="profile_image" class="w-full shadow-soft-sm rounded-xl" />
              </div>
            </div>
            <div class="flex-none w-auto max-w-full px-3 my-auto">
              <div class="h-full">
                <h5 class="mb-1 dark:text-white">{{ $member->user->name }} {{ $member->last_name }}</h5>
                <li class="flex text-3xs text-left	">
                  <div class="text-left	">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                    <span> 4.9/5 </span>
                  </div>
                </li>
                <p class="mb-0 font-semibold leading-normal text-sm dark:text-white dark:opacity-60">{{ $member->specializations->first()->name ?? 'No specialization' }} / {{ $member->centres->first()->centre_name ?? 'No Centre' }} - {{ $member->centres->first()->centre_city ?? 'No City' }}</p>
              </div>
            </div>
            <div class="w-full max-w-full px-3 mx-auto mt-4 sm:my-auto sm:mr-0 md:w-1/2 md:flex-none lg:w-4/12">
  
              <div class="right-0 align-middle">
                <ul class="relative flex flex-wrap p-1 list-none bg-transparent rounded-xl" nav-pills role="list">
                  <li class="z-30 flex-auto text-center">
                    <a  href="{{route('findBookings', $member->id)}}" role="tab" aria-selected="true" class="inline-block w-full px-6 py-3 mt-2 pt-10 font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer hover:scale-102 active:opacity-85 hover:shadow-soft-xs bg-gradient-to-tl from-purple-700 to-pink-500 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25">
                      Channel
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
<script>
  document.getElementById('search_by').addEventListener('change', (event) => {
    const searchOptions = ['search_by_doctor', 'search_by_centre', 'search_by_specialization'];
    searchOptions.forEach(option => {
        document.getElementsByClassName(option)[0].style.display = option === event.target.value ? 'block' : 'none';
    });
});
</script>
@endsection