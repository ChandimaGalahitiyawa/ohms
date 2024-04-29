@extends('member.layouts.app')

@section('content')
<div class="w-full p-6 mx-auto">

    <div class="flex flex-wrap -mx-3">
      <div class="w-full max-w-full px-3 flex-0">
        <div class="relative flex flex-col min-w-0 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
          <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
            <div class="lg:flex">
              <div>
                <h5 class="mb-0 dark:text-white">Availability Managements</h5>
              </div>
              <div class="my-auto mt-6 ml-auto lg:mt-0">
                <div class="my-auto ml-auto">
                  <a href="{{ route('MemberAvailabilityAdd') }}" class="inline-block px-8 py-2 m-0 text-xs font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer ease-soft-in leading-pro tracking-tight-soft bg-gradient-to-tl from-purple-700 to-pink-500 shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85">+&nbsp; Add Availability </a>
               </div>
              </div>
            </div>
          </div>

          {{-- table --}}
          <div class="flex-auto p-6 px-0 pb-0">
            <div class="overflow-x-auto table-responsive">
              <table class="table" datatable id="products-list">
                  <thead class="thead-light">
                      <tr>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Accept Currency</th>
                          <th>Fee Type</th>
                          <th>Fee</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td class="leading-normal text-sm">...</td>
                          <td class="leading-normal text-sm">...</td>
                          <td class="leading-normal text-sm">...</td>
                          <td class="leading-normal text-sm">...</td>
                          <td class="leading-normal text-sm">...</td>
                          <td class="leading-normal text-sm">...</td>
                          <td class="leading-normal text-sm">
                              <a href="javascript:;" class="mx-4" >
                                  <i class="fas fa-user-edit text-slate-400 dark:text-white/70"></i>
                              </a>
                              <a href="javascript:;" >
                                  <i class="fas fa-trash text-slate-400 dark:text-white/70"></i>
                              </a>
                          </td>
                      </tr>
                  </tbody>
                  <tfoot>
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Accept Currency</th>
                        <th>Fee Type</th>
                        <th>Fee</th>
                        <th>Action</th>
                      </tr>
                  </tfoot>
              </table>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection