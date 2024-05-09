@extends('member.layouts.app')

@section('content')

<div class="w-full p-6 mx-auto">
    <div class="flex flex-wrap -mx-3">

      <div class="w-full max-w-full px-3 shrink-0 xl:flex-0 xl:w-8/12">
        <div class="relative flex flex-col min-w-0 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
          <div class="flex-auto p-4">
            <div data-toggle="calendar" id="calendar"></div>
          </div>
        </div>
      </div>

      <div class="w-full max-w-full px-3 shrink-0 xl:flex-0 xl:w-4/12">
        <div class="flex flex-wrap -mx-3">
          <div class="w-full max-w-full px-3 mt-6 shrink-0 md:flex-0 md:w-6/12 xl:w-full xl:mt-0">
            <div class="relative flex flex-col min-w-0 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
              
              <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-4 pb-0">
                <h6 class="mb-0 dark:text-white">Today Appointments</h6>
              </div>

              <div class="flex-auto p-4 rounded-xl">


                @foreach ($todayAppointments as $appointment)
                    
                  <div class="flex">
                    <div>
                      <div class="inline-block w-12 h-12 text-center text-black bg-center rounded-lg shadow-none fill-current stroke-none bg-red-600/3">
                        <i class="ni leading-none ni-money-coins text-lg text-transparent bg-clip-text bg-gradient-to-tl from-red-600 to-rose-400 relative z-1 top-3.5"></i>
                      </div>
                    </div>
                    <div class="ml-4">
                      <div>
                        <h6 class="mb-1 leading-normal dark:text-white text-sm text-slate-700">{{$appointment->patient->user->name}} {{$appointment->patient->last_name}}</h6>
                        <span class="leading-normal text-sm">{{$appointment->patient->user->email}}</span>
                      </div>
                    </div>
                  </div>

                @endforeach

              </div>
            </div>
          </div>
        </div>
      </div>

      
    </div>
    

  </div>

@endsection


@push('scripts')


<script>
  document.addEventListener('DOMContentLoaded', function () {
    const calendarElement = document.querySelector('[data-toggle="calendar"]');
    if (calendarElement) {
      // Fetch appointment data
      fetch('{{ route('fetchAppointmentCountsForCalendar') }}')
        .then(response => response.json())
        .then(data => {
          // Convert appointment data to events array
          const events = data.map(appointment => ({
            title: `Bookings: ${appointment.appointment_count}`,
            start: appointment.appointment_date,
            className: 'bg-gradient-to-tl from-red-600 to-rose-400', // You can customize this class as needed
          }));

          // Initialize FullCalendar with the events
          const calendar = new FullCalendar.Calendar(calendarElement, {
            contentHeight: 'auto',
            initialView: 'dayGridMonth',
            headerToolbar: {
              start: 'title', // will normally be on the left. if RTL, will be on the right
              center: '',
              end: 'today prev,next' // will normally be on the right. if RTL, will be on the left
            },
            selectable: true,
            editable: true,
            initialDate: '2024-05-01', // Update initial date as needed
            events: events,
            views: {
              month: {
                titleFormat: {
                  month: 'long',
                  year: 'numeric'
                }
              },
              agendaWeek: {
                titleFormat: {
                  month: 'long',
                  year: 'numeric',
                  day: 'numeric'
                }
              },
              agendaDay: {
                titleFormat: {
                  month: 'short',
                  year: 'numeric',
                  day: 'numeric'
                }
              }
            },
          });

          // Render the calendar
          calendar.render();
        })
        .catch(error => {
          console.error('Error fetching appointment data:', error);
        });
    }
  });
</script>

    
@endpush