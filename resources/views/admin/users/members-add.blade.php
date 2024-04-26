@extends('admin.layouts.app')

@section('content')

<div class="flex-auto p-6 w-6/12 mx-auto ">
    <form role="form" method="POST" action="{{ route('createMember') }}">
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



      <!-- Birth Day -->
      <label class="inline-block mb-2 ml-1 font-bold text-slate-700 text-xs">Birth Day</label>
      <div class="mb-4">
        <input id="dob" type="date" name="dob"  autocomplete="dob" placeholder="dob" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
        @error('dob')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
      </div>

      <!-- Address -->
      <label class="inline-block mb-2 ml-1 font-bold text-slate-700 text-xs">Address</label>
      <div class="mb-4">
        <input id="address" type="text" name="address"  autocomplete="address" placeholder="Address" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
        @error('address')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
      </div>

      {{-- Medical schoolr --}}
      <label class="inline-block mb-2 ml-1 font-bold text-slate-700 text-xs">Medical School</label>
      <div class="mb-4">
        <input id="medical_school" type="text" name="medical_school"  autocomplete="medical_school" placeholder="Medical schoolr" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
        @error('medical_school')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
      </div>

      {{-- License number --}}
      <label class="inline-block mb-2 ml-1 font-bold text-slate-700 text-xs">License number</label>
      <div class="mb-4">
        <input id="license_number" type="text" name="license_number"  autocomplete="license_number" placeholder="License number" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
        @error('license_number')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
      </div>

      <!-- Specializations Field -->
      <label class="inline-block mb-2 ml-1 font-bold text-slate-700 text-xs">Specializations</label>
      <div>
          <div id="specializationsContainer" class="mb-4">
              <div class="specialization-select mb-2 flex items-center">
                  <select name="specializations[]" class="block w-full px-3 py-2 focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text:white/80 text-sm leading-5.6 ease-soft appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none">
                      <option value="">Select Specialization</option>
                      @foreach ($specializations as $specialization)
                          <option value="{{ $specialization->id }}">{{ $specialization->name }}</option>
                      @endforeach
                  </select>
                  <button type="button" class="remove-btn ml-2 text-red-500" onclick="removeSpecialization(this)">X</button>
              </div>
          </div>
          <button type="button" onclick="addSpecialization()" class="inline-block mb-2 ml-1 font-bold text-slate-500 text-xs">Add More</button>
      </div>
  
      <script>
        function addSpecialization() {
            var container = document.getElementById('specializationsContainer');
            var newSelect = document.querySelector('.specialization-select').cloneNode(true);
            container.appendChild(newSelect);
        }
        </script>
        
        <script>
          document.addEventListener('DOMContentLoaded', function () {
              var choices = new Choices('.specialization-selector', {
                  removeItemButton: true,
                  searchEnabled: true,
                  shouldSort: false,
              });
        
              window.addSpecialization = function() {
                  var container = document.getElementById('specializationsContainer');
                  var allSelects = container.querySelectorAll('select');
                  var selectedValues = Array.from(allSelects).map(select => select.value);
                  var canAdd = selectedValues.every(value => value); // Ensure all selects have values
        
                  if (canAdd) {
                      var newSelect = allSelects[0].parentNode.cloneNode(true);
                      newSelect.querySelector('select').value = "";
                      container.appendChild(newSelect);
                      new Choices(newSelect.querySelector('select'), {
                          removeItemButton: true,
                          searchEnabled: true,
                          shouldSort: false,
                      });
                  } else {
                      alert("Please select a specialization before adding more.");
                  }
              };
        
              window.removeSpecialization = function(element) {
                  var container = document.getElementById('specializationsContainer');
                  if (container.children.length > 1) {
                      var selectElement = element.parentNode.querySelector('select');
                      var instance = Choices.instances.get(selectElement);
                      if (instance) {
                          instance.destroy();
                      }
                      element.parentNode.remove();
                  } else {
                      alert("At least one specialization is required.");
                  }
              };
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
        <button type="submit" class="inline-block w-full px-6 py-3 mt-6 mb-0 font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer hover:scale-102 active:opacity-85 hover:shadow-soft-xs bg-gradient-to-tl from-purple-700 to-pink-500 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25">Submit</button>
      </div>
    </form>
  </div>
</div>

@endsection