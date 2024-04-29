@extends('admin.layouts.app')

@section('content')
<div class=" p-6 w-6/12 mx-auto rounded-2xl overflow-hidden break-words border-0 shadow-blur dark:shadow-soft-dark-xl dark:bg-gray-950 rounded-2xl bg-white/80 bg-clip-border backdrop-blur-2xl backdrop-saturate-200 ">
    <form role="form" method="POST" action="{{ route('createCentre') }}">
      @csrf  
      <h3 class="text-xl font-bold mb-4">Add Centre</h3>    
      <p class="text font-normal">Include all details to establish a successful center.</p>
      <!-- Centre Name Field -->
      <label class="inline-block mb-2 ml-1 font-bold text-slate-700 text-xs">Centre Name</label>
      <div class="mb-4">
        <input required id="centre_name" type="text" name="centre_name"  autocomplete="centre_name" placeholder="centre name" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
        @error('centre_name')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
      </div>

      

      <!-- Phone Field -->
      <label class="inline-block mb-2 ml-1 font-bold text-slate-700 text-xs">Phone Number</label>
      <div class="mb-4">
        <input required id="centre_contact_number" type="number" name="centre_contact_number"  autocomplete="centre_contact_number" placeholder="centre contact number" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
        @error('centre_contact_number')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
      </div>

      <!-- Email Field -->
      <label class="inline-block mb-2 ml-1 font-bold text-slate-700 text-xs">Email Address</label>
      <div class="mb-4">
        <input required id="centre_email_address" type="email" name="centre_email_address" autocomplete="centre_email_address" placeholder="centre email address" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
        @error('centre_email_address')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
      </div>

      <!-- centre City Field -->
      <label class="inline-block mb-2 ml-1 font-bold text-slate-700 text-xs">Centre City</label>
      <div class="mb-4">
        <input required id="centre_city" type="text" name="centre_city"  autocomplete="centre_city" placeholder="centre city" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
        @error('centre_city')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
      </div>
      
      <!-- Centre Country Field -->
      <label class="inline-block mb-2 ml-1 font-bold text-slate-700 text-xs">Centre Address</label>
      <div class="mb-4">
        <input id="address" type="text" name="address"  autocomplete="address" placeholder="address" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
        @error('address')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
      </div>    

      <div class="flex flex-wrap w-full items-center mb-4">
        <div class="w-full lg:w-6/12 pr-2">
            <label class="inline-block mb-2 ml-1 font-bold text-slate-700 text-xs">Centre Fee Type</label>
            <select name="centre_fee_type" class="block w-full px-3 py-2 focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text:white/80 text-sm leading-5.6 ease-soft appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                <option value="" disabled selected>Fee Type</option>
                <option value="flat_rate">Flat Rate</option>
                <option value="percentage">Percentage %</option>
            </select>
        </div>
        <div class="w-full lg:w-6/12">
            <label class="inline-block mb-2 ml-1 font-bold text-slate-700 text-xs">Centre Accept Currency</label>
            <div class="flex items-center">
                <select name="centre_accept_currency" class="block w-full px-3 py-2 focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text:white/80 text-sm leading-5.6 ease-soft appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                    <option value='' disabled selected>Select Accept Currency</option>
                    <option value="LKR">LKR</option>
                    <option value="USD">USD</option>
                </select>
           </div>
        </div>
    </div>
      <!-- Centre Fee -->
      <label class="inline-block mb-2 ml-1 font-bold text-slate-700 text-xs">Centre Fee</label>
      <div class="mb-4">
        <input id="centre_fee" type="text" name="centre_fee"  autocomplete="centre_fee" placeholder="centre fee" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
        @error('centre_fee')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
      </div>

    


      <!-- Refund Protection Fee -->
      <label class="inline-block mb-2 ml-1 font-bold text-slate-700 text-xs">Refund Protection Fee</label>
      <div class="mb-4">
        <input id="refund_protection_fee" type="text" name="refund_protection_fee"  autocomplete="refund_protection_fee" placeholder="refund protection fee" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
        @error('refund_protection_fee')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
      </div>
      
      <div class="text-center">
        <button type="submit" class="inline-block w-full px-6 py-3 mt-6 mb-0 font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer hover:scale-102 active:opacity-85 hover:shadow-soft-xs bg-gradient-to-tl from-purple-700 to-pink-500 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25">Submit</button>
      </div>
    </form>
  </div>
</div>
<br><br>
@endsection