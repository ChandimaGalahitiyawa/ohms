<!-- livewire/terms-and-conditions.blade.php -->

<div class="flex mt-6 flex-wrap -mx-3">
    <div class="w-full max-w-full px-3 flex-0 md:w-6/12">
        <div class="flex items-center">
            <div class="min-h-6 pl-7 mb-0.5 block">
                <input wire:click="toggleCheckbox" class="w-5 h-5 ease-soft -ml-7 rounded-1.4 checked:bg-gradient-to-tl checked:from-gray-900 checked:to-slate-800 after:text-[0.67rem] after:font-awesome after:duration-250 after:ease-soft-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border border-solid border-slate-150 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['\f00c'] checked:border-0 checked:border-transparent checked:bg-transparent checked:after:opacity-100" type="checkbox" />
            </div>
            <p class="mb-0 leading-normal text-sm">Agree To Terms And Conditions</p>
        </div>
    </div>
    <div class="w-full max-w-full px-3 my-auto text-right flex-0 md:w-6/12">
        <form class="relative" id="supplier-form"  action="{{route('checkout')}}" method="post">
            @csrf 
            <div active form="info" class="">
                <div>
                <input type="hidden" name="doctorId" value="{{$doctor->id}}">
                <input type="hidden" name="centerId" value="{{$center->id}}">
                <input type="hidden" name="date" value="{{$date}}">
                <input type="hidden" name="total" value="{{$total}}">
                <input type="hidden" name="queueNo" value="{{$queueNo}}">
                <input type="hidden" name="referenceId" value="{{$referenceId}}">



                <button href="{{ $isChecked ? route('confirmBooking', ['doctorId' => $doctor->id, 'centerId' => $center->id, 'date' => $date]) : '#' }}" class="inline-block px-6 py-3 mb-4 font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer hover:scale-102 active:opacity-85 hover:shadow-soft-xs {{ $isChecked ? 'bg-gradient-to-tl from-blue-600 to-cyan-400' : 'opacity-50 bg-gray-400' }} leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25">Pay Now</button>
                </div>
            </div>
        </form>
        
        <p class="mt-2 mb-0 leading-normal text-sm">You will be redirected to the payment portal <a class="dark:text-lime-500" href="javascript:;">here</a>.</p>
    </div>
</div>
