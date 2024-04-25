@extends('admin.layouts.app')

@section('content')

<div class="flex-auto p-6 w-6/12 mx-auto">
    <form role="form" method="POST" action="{{ route('createPatient') }}">
      @csrf  

      <div class="flex w-full">
        <!-- First Name Field -->
        <div class="flex flex-col mr-4 w-full lg:w-6/12">
            <label class="inline-block mb-2 ml-1 font-bold text-slate-700 text-xs">First Name</label>
            <div class="mb-4">
                <input id="FirstName" type="text" name="FirstName" :value="old('name')" autofocus autocomplete="name" placeholder="First Name" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
                @error('FirstName')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        </div>
    
        <!-- Last Name Field -->
        <div class="flex flex-col  w-full lg:w-6/12">
            <label class="inline-block mb-2 ml-1 font-bold text-slate-700 text-xs">Last Name</label>
            <div class="mb-4">
                <input id="name" type="text" name="LastName" :value="old('name')" autofocus autocomplete="name" placeholder="Last Name" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
                @error('LastName')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

      <!-- Phone Field -->
      <label class="inline-block mb-2 ml-1 font-bold text-slate-700 text-xs">Phone number</label>
      <div class="mb-4">
        <input id="phone" type="text" name="phone"  autocomplete="phone" placeholder="Phone number" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
        @error('phone')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
      </div>

      <!-- Email Field -->
      <label class="inline-block mb-2 ml-1 font-bold text-slate-700 text-xs">Email</label>
      <div class="mb-4">
        <input id="email" type="email" name="email" :value="old('email')"  autocomplete="username" placeholder="Email" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
        @error('email')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
      </div>
    
    <!-- Nationality Field -->
    <label class="inline-block mb-2 ml-1 font-bold text-slate-700 text-xs">Nationality</label>
    <div class="mb-4">
        <select name="nationality" id="nationality" class="block w-full px-3 py-2 focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
            <option value="Local" selected>Local</option>
            <option value="Foreign">Foreign</option>
        </select>
        @error('nationality')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </div>

    <!-- Document Number Field -->
    <div class="mb-4" id="documentFields">
        <label id="documentLabel" class="inline-block mb-2 ml-1 font-bold text-slate-700 text-xs">National Identity Card</label>
        <input id="nic" type="text" name="nic" placeholder="NIC" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none"/>
        <input id="passport" type="text" name="passport" placeholder="Passport" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" style="display:none;"/>
        @error('nic')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </div>

    <script>
        document.getElementById('nationality').addEventListener('change', function() {
            if (this.value !== 'Local') {
                document.getElementById('documentLabel').innerText = 'Passport Number';
                document.getElementById('nic').style.display = 'none';
                document.getElementById('passport').style.display = 'block';
            } else {
                document.getElementById('documentLabel').innerText = 'National Identity Card';
                document.getElementById('nic').style.display = 'block';
                document.getElementById('passport').style.display = 'none';
            }
        });
    </script>






      <!-- Password Field -->
      <label class="inline-block mb-2 ml-1 font-bold text-slate-700 text-xs">Temporary Password</label>
      <div class="mb-4">
        <input id="password" type="password" name="password"  autocomplete="new-password" placeholder="Password" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text:white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
        @error('password')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
      </div>

      <!-- Confirm Password Field -->
      <label class="inline-block mb-2 ml-1 font-bold text-slate-700 text-xs">Confirm Password</label>
      <div class="mb-4">
        <input id="password_confirmation" type="password" name="password_confirmation"  autocomplete="new-password" placeholder="Confirm Password" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text:white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
        @error('password_confirmation')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
      </div>

      <div class="text-center">
        <input type="hidden" name="registered_by_admin" value="yes">
        <button type="submit" class="inline-block w-full px-6 py-3 mt-6 mb-0 font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer hover:scale-102 active:opacity-85 hover:shadow-soft-xs bg-gradient-to-tl from-purple-700 to-pink-500 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25">Add Patient</button>
      </div>
    </form>
  </div>
</div>

@endsection