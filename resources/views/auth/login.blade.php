@extends('auth.layouts.app')

@section('content')
<section>
    <div class="relative flex items-center min-h-screen p-0 overflow-hidden bg-center bg-cover">
      <div class="container z-1">
        <div class="flex flex-wrap -mx-3">

          <div class="flex flex-col w-full max-w-full px-3 mx-auto lg:mx-0 shrink-0 md:flex-0 md:w-7/12 lg:w-5/12 xl:w-4/12">

            <div class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none lg:py4 dark:bg-gray-950 rounded-2xl bg-clip-border">
              <div class="p-6 pb-0 mb-0">
                <h4 class="font-bold">Sign In</h4>
                <p class="mb-0">Enter your email and password to sign in</p>
              </div>

              <div class="flex-auto p-6">
                <form role="form" method="POST" action="{{ route('login') }}">
                @csrf
                  <div class="mb-4">
                    <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Email" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
                    @error('email')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="mb-4">
                    <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="Password" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
                    @error('password')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="min-h-6 mb-0.5 block pl-12 text-left">
                    <input id="remember_me" name="remember" class="mt-0.5 rounded-10 duration-250 ease-soft-in-out after:rounded-circle after:shadow-soft-2xl after:duration-250 checked:after:translate-x-5.3 h-5 relative float-left -ml-12 w-10 cursor-pointer appearance-none border border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain bg-left bg-no-repeat align-top transition-all after:absolute after:top-px after:h-4 after:w-4 after:translate-x-px after:bg-white after:content-[''] checked:border-slate-800/95 checked:bg-slate-800/95 checked:bg-right" type="checkbox" />
                    <label class="mb-2 ml-1 font-normal cursor-pointer select-none text-sm text-slate-700" for="remember_me">Remember me</label>
                </div>                
                  <div class="text-center">
                    <button type="submit" class="inline-block w-full px-6 py-3 mt-6 mb-3 font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer hover:scale-102 active:opacity-85 hover:shadow-soft-xs bg-gradient-to-tl from-purple-700 to-pink-500 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25">Sign In</button>
                  </div>
                  <div>
                    @if (Route::has('password.request'))
                    <a class="underline text-sm  text-gray-600 hover:text-gray-900 rounded-md focus:outline-none" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                        @endif
                </div>
                </form>
              </div>
              <div class="border-black/12.5 rounded-b-2xl border-t-0 border-solid p-6 text-center pt-0 px-1 sm:px-6">
                <p class="mx-auto mb-4">Don't have an account? <a href="{{ route('register') }}" class="font-bold text-transparent bg-clip-text bg-gradient-to-tl from-purple-700 to-pink-500">Sign up</a></p>
              </div>
              <p class="mt-6 text-sm text-gray-600 text-justify leading-relaxed">
                This project was developed by Project Group 11, comprising students Chandima Galahitiyawa (10637143), Hiruni Hansika (10639177), Packiyanathan Jeewandhiga (10635068), and Minadi Vimansa (10624233). The group worked under the academic guidance of Lead Coordinator Dr. Maneesha Caldera and Project Supervisor Ms. Inoshi Madushika Jayaweera. This was completed as part of the final-year Applied Project – CSG3101.2 (2024 T1, ECU SRI).
              </p>      
            </div>          
          </div>
          <div class="absolute top-0 right-0 flex-col justify-center hidden w-6/12 h-full max-w-full px-3 pr-0 my-auto text-center flex-0 lg:flex">
            <div class="relative flex flex-col justify-center h-full opacity-90 bg-cover  px-24 m-4 bg-gradient-to-tl from-purple-700 to-pink-500 rounded-xl" style="background-image: url('{{asset('assets/img/cover-photo.webp')}}')">
              <h4 class="mt-12 font-bold text-8xl text-start text-white">Find Your Doctor Easily.</h4>
            </div>
          </div>
        </div>
      </div>
  </div>

  </section>
@endsection
