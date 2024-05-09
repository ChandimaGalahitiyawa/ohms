@extends('patient.layouts.app')
@section('content')

              <div class="flex flex-wrap -mx-3">
                <div class="w-full max-w-full px-3 m-auto flex-0 lg:w-8/12">
                  <form class="relative mb-32">
                    <div active form="info" class="absolute top-0 left-0 flex flex-col visible w-full h-auto min-w-0 p-4 break-words bg-white border-0 opacity-100 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
                      <h5 class="mb-0 font-bold dark:text-white">Medical Information</h5>
                      <div>
                        <div class="w-full max-w-full px-3 flex-0 ">
                            <label class="mt-6 mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="ProductName">Name</label>
                            <input type="text" name="ProductName" placeholder="eg. Off-White" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
                        </div>

                        <div class="w-full max-w-full px-3 flex-0">
                            <label class="mt-6 mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="Description">Description<small> (optional)</small></label>
                            <div editor-quill id="editor" class="!h-1/2">
                              
                            </div>
                        </div>
                        
                        {{-- image/pdf --}}

                      </div>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection