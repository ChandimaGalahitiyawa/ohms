<div class="w-full">
    {{-- <div class="flex w-full justify-start items-center">
        <div class="w-full max-w-full px-3 lg:w-4/12">
            <select choice name="center" id="choices-centers" wire:model="selectedCenter">
                <option value="">Select center</option>
                @foreach ($centers as $center)
                    <option value="{{ $center->id }}">{{ $center->centre_name }}</option>
                @endforeach
            </select>
        </div>
    
        <div class="w-full max-w-full flex items-center px-3 flex-0 lg:w-4/12">
            <input datetimepicker name="start_date"  id="DatePicker" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" type="text" placeholder="Filter By Date" />
        </div>
    </div> --}}
   <div>
        @foreach($centers as $center)
            @if(isset($availableDays[$center->id]))
            <h2 class="mb-0 py-4 uppercase leading-normal text-xl font-bold text-slate-700 dark:text-white">{{$center->centre_name}}</h2>

            <ul class="flex flex-col pl-0 mb-0 rounded-none">
            
                    @foreach($availableDays[$center->id] as $date => $slots)

                        <li class="border-black/12.5 py-4 rounded-t-inherit relative mb-4 block flex-col bg-gray-50 items-center border-0 border-solid px-4 pl-0 text-inherit">
                        <div class="before:w-0.75 before:rounded-1 ml-4 pl-2 before:absolute before:top-0 before:left-0 before:h-full before:bg-fuchsia-500 before:content-['']">
                            <div class="flex items-center">
                                <h6 class="mb-0 leading-normal text-md font-bold text-slate-700 dark:text-white">{{$doctor->user->name}}</h6>
                            </div>
                            <div class="flex items-center pl-1 mt-4 ml-6">
                                <div>
                                    <p class="mb-0 font-semibold leading-tight text-xs text-slate-400 dark:text-white/80">Date</p>
                                    <span class="font-bold leading-tight text-lg">{{$date}}</span>
                                </div>
                                <div class="mx-auto">
                                    <p class="mb-0 font-semibold leading-tight text-xs text-slate-400 dark:text-white/80">Available Slots</p>
                                    <span class="font-bold leading-tight text-lg">{{ $slots }}</span>
                                </div>
                                <div class=" flex justify-end">
                                    <p class="mb-0 font-semibold leading-t ight text-xs text-slate-400 dark:text-white/80"></p>
                                    <a  href="{{ route('makeBooking', ['doctorId' => $doctor->id, 'centerId' => $center->id, 'date' => $date]) }}" class="flex items-center px-8 py-2 m-1 text-xs font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer ease-soft-in leading-pro tracking-tight-soft bg-gradient-to-tl from-blue-600 to-blue-300 shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85"><i class="fas mr-4 text-xl fa-plus-circle"></i> Book Now</a>
                                </div>
                            </div>
                        </div>
                        </li>
                        
                    @endforeach
                    
            </ul>
            @endif
        @endforeach
   </div>
</div>
    