<div class="w-full">
<div class="flex w-full justify-between items-center">
    <div class="w-full lg:w-4/12 pr-2">
        <select name="search_by" class="block w-full px-3 py-2 focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text:white/80 text-sm leading-5.6 ease-soft appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
            <option value="search_by_doctor">Doctor</option>
            {{-- <option value="search_by_centre">Centre</option>
            <option value="search_by_specialization">Specialization</option> --}}
        </select>
    </div>

      <div class="relative w-8/12">
        <input wire:model.live="search" type="text" name="searchdate" placeholder="Search" class="block w-full pl-8 py-2 focus:shadow-soft-primary-outline border border-solid border-gray-300  background:white rounded-lg" style="background: #fff important;">
          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <i class="fas fa-search text-gray-400"></i>
          </div>
      </div>
      
     
</div>
@if(!empty($search))
    @if($doctors && $doctors->isNotEmpty())
    @foreach ($doctors as $member)
        <div class="pt-6 pb-6 w-full mx-auto">
            <div class="relative flex flex-col flex-auto min-w-0 overflow-hidden break-words border-0  dark:bg-gray-950 rounded-2xl bg-white/80 bg-clip-border backdrop-blur-2xl backdrop-saturate-200">
            <div class="flex flex-wrap">
                <div class="flex-none w-auto max-w-full px-3">
                <div class="text-base ease-soft-in-out h-19 w-19 relative inline-flex items-center justify-center rounded-xl text-white transition-all duration-200">
                    <img src="{{asset('/assets/img/profile.jpeg')}}" alt="profile_image" class="w-full shadow-soft-sm rounded-xl" />
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
                    <p class="mb-0 font-semibold leading-normal text-sm dark:text-white dark:opacity-60">{{ $member->specializations->first()->name ?? 'No specialization' }}</p>
                </div>
                </div>
                <div class="w-full max-w-full px-3  md:w-1/2 flex justify-end items-end lg:w-4/12">
                    <a href="{{route('channelDoctor', $member->id)}}"  class="inline-block px-8 py-2 text-xs font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer ease-soft-in leading-pro tracking-tight-soft bg-gradient-to-tl from-blue-600 to-blue-300 shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85">Book Now</a>
                </div>
            </div>
            </div>
        </div>
    @endforeach
    @else
        <div class="my-4 p-4 rounded-2 flex items-center  bg-red-100">
            <h3 class="text-sm mb-0 text-center text-red-500 font-semibold px-2">No avaialble Doctors For The Search Query</h3>
        </div>
    @endif

    @else
    <div class="my-4 p-4 rounded-2 flex items-center  bg-blue-100">
        <h3 class="text-sm mb-0 text-center text-blue-500 font-semibold px-2">Please Enter A Search Query</h3>
    </div>
@endif
</div>
