@extends('admin.layouts.app')

@section('content')

<div class="w-full p-6 mx-auto">

    <div class="flex flex-wrap -mx-3">
      <div class="w-full max-w-full px-3 flex-0">
        <div class="relative flex flex-col min-w-0 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
          <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
            <div class="lg:flex">
              <div>
                <h5 class="mb-0 dark:text-white">Member Managements</h5>
              </div>
              <div class="my-auto mt-6 ml-auto lg:mt-0">
                <div class="my-auto ml-auto">
                  <a href="{{ route('MembersManagementAdd') }}" class="inline-block px-8 py-2 m-0 text-xs font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer ease-soft-in leading-pro tracking-tight-soft bg-gradient-to-tl from-purple-700 to-pink-500 shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85">+&nbsp; Add Memeber</a>
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
                          <th>Nationality</th>
                          <th>NIC/PP</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($members as $members)
                      <tr>
                          <td class="leading-normal text-sm">{{ $members->user->name }} {{ $members->last_name }}</td>
                          <td class="leading-normal text-sm">{{ $members->user->email }}</td>
                          <td class="leading-normal text-sm">{{ $members->phone }}</td>
                          <td class="leading-normal text-sm">{{ $members->nationality }}</td>
                          <td class="leading-normal text-sm">{{ $members->nic ?? $members->members }}</td>
                          <td class="leading-normal text-sm">
                            <a href="{{ route('edit_member', $members->id) }}" class="mx-4">
                                <i class="fas fa-user-edit text-slate-400 dark:text-white/70"></i>
                            </a>
                            <a href="javascript:void(0);" onclick="event.preventDefault(); if(confirm('Are you sure? If you delete this, it cannot be recovered.')) document.getElementById('delete-form-{{ $members->id }}').submit();">
                              <i class="fas fa-trash text-slate-400 dark:text-white/70"></i>
                          </a>
                          <form id="delete-form-{{ $members->id }}" action="{{ route('deleteMember', $members->id) }}" method="POST" style="display: none;">
                              @csrf
                              @method('DELETE')
                          </form>
                          
                        </td>
                      </tr>
                      @endforeach
                  </tbody>
                  <tfoot>
                      <tr>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Nationality</th>
                          <th>NIC/PP</th>
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