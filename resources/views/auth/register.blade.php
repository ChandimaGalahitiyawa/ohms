@extends('auth.layouts.app')

@section('content')
<section>
    <div class=" relative flex items-center min-h-screen p-0 overflow-hidden bg-center bg-cover">
      <div class="container z-1">
        <div class=" flex flex-wrap -mx-3">

          <div class="flex flex-col w-full max-w-full px-3 mx-auto lg:mx-0 shrink-0 md:flex-0 md:w-7/12 lg:w-5/12 xl:w-4/12">
            <div class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none lg:py4 dark:bg-gray-950 rounded-2xl bg-clip-border">
              <div class="p-6 pb-0 mb-0">
                <h4 class="font-bold">Sign Up</h4>
                <p class="mb-0">Enter your email and password to register</p>
              </div>

              <div class="flex-auto p-6">
                  <form role="form" method="POST" action="{{ route('createPatient') }}">
                    @csrf  
  
                    <div class="flex">
                      <!-- First Name Field -->
                      <div class="flex flex-col mr-4">
                          <label class="inline-block mb-2 ml-1 font-bold text-slate-700 text-xs">First Name</label>
                          <div class="mb-4">
                              <input id="FirstName" type="text" name="FirstName" :value="old('name')" autofocus autocomplete="name" placeholder="First Name" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
                              @error('FirstName')
                              <p class="text-red-500 text-xs italic">{{ $message }}</p>
                              @enderror
                          </div>
                      </div>
                  
                      <!-- Last Name Field -->
                      <div class="flex flex-col">
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
                    <label class="inline-block mb-2 ml-1 font-bold text-slate-700 text-xs">Password</label>
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
  
                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="min-h-6 pl-7 mb-0.5 block">
                        <input id="terms" type="checkbox" name="terms" value="1" {{ old('terms') ? 'checked' : '' }}  class="w-5 h-5 ease-soft -ml-7 rounded-1.4 checked:bg-gradient-to-tl checked:from-gray-900 checked:to-slate-800 after:text-xxs after:font-awesome after:duration-250 after:ease-soft-in-out duration-250 relative float-left mt-1 cursor-pointer appearance-none border border-solid border-slate-200 bg-white bg-contain bg-center bg-no-repeat align-top transition-all after:absolute after:flex after:h-full after:w-full after:items-center after:justify-center after:text-white after:opacity-0 after:transition-all after:content-['\f00c'] checked:border-0 checked:border-transparent checked:bg-transparent checked:after:opacity-100"/>
                        <label for="terms" class="mb-2 ml-1 font-normal text-left cursor-pointer select-none text-sm text-slate-700">
                            I agree to the <a href="{{ route('terms.show') }}" target="_blank" class="font-bold text-slate-700 underline">Terms and Conditions</a> and
                            <a href="{{ route('policy.show') }}" target="_blank" class="font-bold text-slate-700 underline">Privacy Policy</a>.
                        </label>
                    </div>
                    @endif
  
  
                    <div class="text-center">
                      <button type="submit" class="inline-block w-full px-6 py-3 mt-6 mb-0 font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer hover:scale-102 active:opacity-85 hover:shadow-soft-xs bg-gradient-to-tl from-purple-700 to-pink-500 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25">Sign Up</button>
                    </div>
                  </form>
                </div>
  
                <div class="border-black/12.5 rounded-b-2xl border-t-0 border-solid p-6 text-center pt-0 px-1 sm:px-6">
                  <p class="mx-auto mb-4">Already have an account? <a href="{{ route('login') }}" class="font-bold text-transparent bg-clip-text bg-gradient-to-tl from-purple-700 to-pink-500">Sign in</a></p>
                </div>
              </div>
            </div>
            <div class="absolute top-0 right-0 flex-col justify-center hidden w-6/12 h-full max-w-full px-3 pr-0 my-auto text-center flex-0 lg:flex">
              <div class="relative flex flex-col justify-center h-full px-24 m-4 bg-gradient-to-tl from-purple-700 to-pink-500 rounded-xl">
                <img class="absolute left-0 opacity-40" src="https://demos.creative-tim.com/soft-ui-dashboard-pro/assets/img/shapes/pattern-lines.svg" alt="pattern-lines">
                <div class="relative">
                  <img class="relative w-full max-w-125 z-2" src="https://demos.creative-tim.com/soft-ui-dashboard-pro/assets/img/illustrations/rocket-white.png" alt="rocket">
                </div>
                <h4 class="mt-12 font-bold text-white">Your journey starts here</h4>
                <p class="text-white ">Just as it takes a company to sustain a product, it takes a community to sustain a protocol.</p>
              </div>
            </div>
  
          </div>
        </div>
    </div

  </section>
@endsection
