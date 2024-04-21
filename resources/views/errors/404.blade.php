@extends('errors.layouts.app')

@section('content')
<section class="my-48">
    <div class="container">
      <div class="flex flex-wrap -mx-3">
        <div class="w-full max-w-full px-3 my-auto shrink-0 lg:flex-0 lg:w-6/12 ">
            <h1 class="leading-tighter text-['calc(1.625rem_+_4.5vw)'] font-bold bg-clip-text bg-gradient-to-tl from-red-600 to-rose-400 z-1 relative xl:text-8xl">Error 404</h1>
          <h2>Erm. Page not found</h2>
          <p class="font-normal leading-relaxed text-xl">We suggest you to go back to the previous page while we solve this issue.</p>
          <a href="#" onclick="event.preventDefault(); window.history.back();" class="inline-block px-6 py-3 mt-6 mb-4 font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer hover:scale-102 active:opacity-85 hover:shadow-soft-xs dark:bg-gradient-to-tl dark:from-slate-850 dark:to-gray-850 bg-gradient-to-tl from-gray-900 to-slate-800 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25">Previous Page</a>
        </div>
        <div class="relative w-full max-w-full px-3 my-auto shrink-0 lg:flex-0 lg:w-6/12">
          <img class="relative w-full" src="https://demos.creative-tim.com/soft-ui-dashboard-pro/assets/img/illustrations/error-404.png" alt="error-404-img">
        </div>
      </div>
    </div>
  </section>

@endsection
