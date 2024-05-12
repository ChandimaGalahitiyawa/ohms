@extends('member.layouts.app')

@section('content')

<div class="flex-auto p-6 w-6/12 mx-auto overflow-hidden break-words border-0 shadow-blur dark:shadow-soft-dark-xl dark:bg-gray-950 rounded-2xl bg-white/80 bg-clip-border backdrop-blur-2xl backdrop-saturate-200">
    <div class="my-10 w-full mx-auto">
        <form role="form" method="POST" action="{{ route('createSpecialization') }}">
        @csrf
        <h3 class="text-xl font-bold mb-4">Add Specializations</h3>
        <p class="text font-normal">You can add specializations according to your expertise. Each specialization needs to specify how much you charge per session, according to your rates.</p>
        <div id="specializations-container">
            <!-- Static Labels -->
            <div class="flex flex-wrap w-full items-center mb-4">
                <div class="w-full lg:w-8/12 pr-2">
                    <label class="inline-block mb-2 ml-1 font-bold text-slate-700 text-xs">Select Specializations</label>
                </div>
                <div class="w-full lg:w-4/12">
                    <label class="inline-block mb-2 ml-1 font-bold text-slate-700 text-xs">Consultation fee</label>
                </div>
            </div>

            {{-- data --}}
            <div class="specializations">
                <div class="flex flex-wrap w-full items-center mb-4">
                    <div class="w-full lg:w-8/12 pr-2">
                        <select name="specializations[0][id]" class="block w-full px-3 py-2 focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text:white/80 text-sm leading-5.6 ease-soft appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                            <option value="">Select Specialization</option>
                            @foreach ($specializations as $specialization)
                                <option value="{{ $specialization->id }}">{{ $specialization->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-full lg:w-4/12">
                        <div class="flex items-center">
                            <input type="number" step="any" name="specializations[0][fee]" placeholder="Fee in LKR" class="block w-full px-3 py-2 focus:shadow-soft-primary-outline border border-solid border-gray-300 rounded-lg">                    </div>
                </div>
            </div>
        </div>        
        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit" class="inline-block w-full px-6 py-3 mt-2 mb-0 font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer hover:scale-102 active:opacity-85 hover:shadow-soft-xs bg-gradient-to-tl from-purple-700 to-pink-500 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25">Submit</button>
        </div>
    </form>
    </div>
  </div>
</div>
<br><br>
@endsection