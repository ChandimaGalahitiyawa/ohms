@extends('member.layouts.app')

@section('content')

<div class="w-full p-6 mx-auto">
    <div class="flex flex-wrap -mx-3">

      <div class="w-full max-w-full px-3 shrink-0 xl:flex-0 xl:w-9/12">
        <div class="relative flex flex-col min-w-0 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
          <div class="flex-auto p-4">
            <div data-toggle="calendar" id="calendar"></div>
          </div>
        </div>
      </div>

      <div class="w-full max-w-full px-3 shrink-0 xl:flex-0 xl:w-3/12">
        <div class="flex flex-wrap -mx-3">
          <div class="w-full max-w-full px-3 mt-6 shrink-0 md:flex-0 md:w-6/12 xl:w-full xl:mt-0">
            <div class="relative flex flex-col min-w-0 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
              
              <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-4 pb-0">
                <h6 class="mb-0 dark:text-white">Next events</h6>
              </div>

              <div class="flex-auto p-4 rounded-xl">

                <div class="flex">
                  <div>
                    <div class="inline-block w-12 h-12 text-center text-black bg-center rounded-lg shadow-none fill-current stroke-none bg-red-600/3">
                      <i class="ni leading-none ni-money-coins text-lg text-transparent bg-clip-text bg-gradient-to-tl from-red-600 to-rose-400 relative z-1 top-3.5"></i>
                    </div>
                  </div>
                  <div class="ml-4">
                    <div>
                      <h6 class="mb-1 leading-normal dark:text-white text-sm text-slate-700">Cyber Week</h6>
                      <span class="leading-normal text-sm">21 March 2021, at 12:30 PM</span>
                    </div>
                  </div>
                </div>

                <div class="flex mt-6">
                  <div>
                    <div class="inline-block w-12 h-12 text-center text-black bg-center rounded-lg shadow-none fill-current stroke-none bg-purple-700/3">
                      <i class="ni leading-none ni-bell-55 text-lg text-transparent bg-clip-text bg-gradient-to-tl from-purple-700 to-pink-500 relative z-1 top-3.5"></i>
                    </div>
                  </div>
                  <div class="ml-4">
                    <div>
                      <h6 class="mb-1 leading-normal dark:text-white text-sm text-slate-700">Meeting with Marry</h6>
                      <span class="leading-normal text-sm">24 March 2021, at 10:00 PM</span>
                    </div>
                  </div>
                </div>

                <div class="flex mt-6">
                  <div>
                    <div class="inline-block w-12 h-12 text-center text-black bg-center rounded-lg shadow-none fill-current stroke-none bg-green-600/3">
                      <i class="ni leading-none ni-books text-lg text-transparent bg-clip-text bg-gradient-to-tl from-green-600 to-lime-400 relative z-1 top-3.5"></i>
                    </div>
                  </div>
                  <div class="ml-4">
                    <div>
                      <h6 class="mb-1 leading-normal dark:text-white text-sm text-slate-700">Book Deposit Hall</h6>
                      <span class="leading-normal text-sm">25 March 2021, at 9:30 AM</span>
                    </div>
                  </div>
                </div>

                <div class="flex mt-6">
                  <div>
                    <div class="inline-block w-12 h-12 text-center text-black bg-center rounded-lg shadow-none fill-current stroke-none bg-red-500/3">
                      <i class="ni leading-none ni-delivery-fast text-lg text-transparent bg-clip-text bg-gradient-to-tl from-red-500 to-yellow-400 relative z-1 top-3.5"></i>
                    </div>
                  </div>
                  <div class="ml-4">
                    <div>
                      <h6 class="mb-1 leading-normal dark:text-white text-sm text-slate-700">Shipment Deal UK</h6>
                      <span class="leading-normal text-sm">25 March 2021, at 2:00 PM</span>
                    </div>
                  </div>
                </div>

                <div class="flex mt-6">
                  <div>
                    <div class="inline-block w-12 h-12 text-center text-black bg-center rounded-lg shadow-none fill-current stroke-none bg-blue-600/3">
                      <i class="ni leading-none ni-palette text-lg text-transparent bg-clip-text bg-gradient-to-tl from-blue-600 to-cyan-400 relative z-1 top-3.5"></i>
                    </div>
                  </div>
                  <div class="ml-4">
                    <div>
                      <h6 class="mb-1 leading-normal dark:text-white text-sm text-slate-700">Verify Dashboard Color Palette</h6>
                      <span class="leading-normal text-sm">26 March 2021, at 9:00 AM</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      
    </div>
    

  </div>

@endsection