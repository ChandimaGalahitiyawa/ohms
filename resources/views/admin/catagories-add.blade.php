@extends('admin.layouts.app')

@section('content')
<div class="w-full p-6 mx-auto">
    <div class="flex flex-wrap -mx-3">
      <div class="w-full max-w-full px-3 flex-0">
        <div multisteps-form class="mb-12">
          <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 m-auto flex-0 lg:w-8/12">
              <form class="relative mb-32" method="POST" action="{{ route('createCatagories') }}">
                @csrf
                <div form="profile" class="absolute top-0 left-0 flex flex-col  w-full min-w-0 p-4 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
                  <h5 class="font-bold dark:text-white">Add Catagories</h5>
                  <div>
                    <div class="flex flex-wrap mt-4 -mx-3">

                        {{-- category-type --}}
                      <div class="w-full max-w-full px-3 flex-0">
                        <label class="mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="category-type">Category type</label>
                        <input type="text" name="category-type" placeholder=".... lorem" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
                      </div>
                    
                      {{-- category_name --}}
                      <div class="w-full max-w-full px-3 flex-0">
                        <label class="mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="category_name">Category type</label>
                        <input type="text" name="category_name" placeholder=".... lorem" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
                      </div>

                      {{-- description --}}
                      <div class="w-full max-w-full px-3 mt-4 flex-0">
                        <label class="mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="description">Category name</label>
                        <textarea name="description" rows="5" placeholder=".... lorem " class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 min-h-unset text-sm leading-5.6 ease-soft block h-auto w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none"></textarea>
                      </div>
                    </div>
                    <div class="flex mt-6">
                      <button type="submit"  class="inline-block w-full px-6 py-3 mt-6 mb-0 font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer hover:scale-102 active:opacity-85 hover:shadow-soft-xs bg-gradient-to-tl from-purple-700 to-pink-500 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25">Create Catagory</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection