@extends('admin.layouts.app')

@section('content')

<div class="w-full p-6 mx-auto">
    <div class="flex flex-wrap -mx-3">
      <div class="w-full max-w-full px-3 mb-6 shrink-0 sm:flex-0 sm:w-6/12 xl:w-3/12 xl:mb-0">
        <div class="relative flex flex-col min-w-0 break-words bg-white dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
          <div class="flex-auto p-4">
            <div class="flex flex-wrap -mx-3">
              <div class="flex-none w-2/3 max-w-full px-3">
                <div>
                  <p class="mb-0 font-sans font-semibold leading-normal text-sm">Appointments</p>
                  <h5 class="mb-0 font-bold dark:text-white">
                    {{count($pendingAppointments)}}
                    <span class="leading-normal text-sm font-weight-bolder text-lime-500">Pending</span>
                  </h5>
                </div>
              </div>
              <div class="w-4/12 max-w-full px-3 ml-auto text-right flex-0">
                <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-gray-900 to-slate-800 shadow-soft-2xl">
                  <i class="ni leading-none ni-circle-08 text-lg relative top-3.5 text-white" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="w-full max-w-full px-3 mb-6 shrink-0 sm:flex-0 sm:w-6/12 xl:w-3/12 xl:mb-0">
         <div class="relative flex flex-col min-w-0 break-words bg-white dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
          <div class="flex-auto p-4">
            <div class="flex flex-wrap -mx-3">
              <div class="flex-none w-2/3 max-w-full px-3">
                <div>
                  <p class="mb-0 font-sans font-semibold leading-normal text-sm">Appointments</p>
                  <h5 class="mb-0 font-bold dark:text-white">
                    {{count($completedAppointments)}}
                    <span class="leading-normal text-sm font-weight-bolder text-lime-500">Completed</span>
                  </h5>
                </div>
              </div>
              <div class="w-4/12 max-w-full px-3 ml-auto text-right flex-0">
                <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-gray-900 to-slate-800 shadow-soft-2xl">
                  <i class="ni leading-none ni-world text-lg relative top-3.5 text-white" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="w-full max-w-full px-3 mb-6 shrink-0 sm:flex-0 sm:w-6/12 xl:w-3/12 xl:mb-0">
         <div class="relative flex flex-col min-w-0 break-words bg-white dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
          <div class="flex-auto p-4">
            <div class="flex flex-wrap -mx-3">
              <div class="flex-none w-2/3 max-w-full px-3">
                <div>
                  <p class="mb-0 font-sans font-semibold leading-normal text-sm">Center Revenues</p>
                  <h5 class="mb-0 font-bold dark:text-white">
                    <span class="leading-normal text-lime-500 text-sm font-weight-bolder">Rs.</span>
                    {{$totalCenterCharge}}
                  </h5>
                </div>
              </div>
              <div class="w-4/12 max-w-full px-3 ml-auto text-right flex-0">
                <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-gray-900 to-slate-800 shadow-soft-2xl">
                  <i class="ni leading-none ni-watch-time text-lg relative top-3.5 text-white" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="w-full max-w-full px-3 shrink-0 sm:flex-0 sm:w-6/12 xl:w-3/12">
         <div class="relative flex flex-col min-w-0 break-words bg-white dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
          <div class="flex-auto p-4">
            <div class="flex flex-wrap -mx-3">
              <div class="flex-none w-2/3 max-w-full px-3">
                <div>
                  <p class="mb-0 font-sans font-semibold leading-normal text-sm">Doctor Revenues</p>
                  <h5 class="mb-0 font-bold dark:text-white">
                    <span class="leading-normal text-sm font-weight-bolder text-lime-500">Rs.</span>
                    {{$totalDoctorCharge}}
                  </h5>
                </div>
              </div>
              <div class="w-4/12 max-w-full px-3 ml-auto text-right flex-0">
                <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-gray-900 to-slate-800 shadow-soft-2xl">
                  <i class="ni leading-none ni-image text-lg relative top-3.5 text-white" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="flex flex-wrap mt-6 -mx-3">
      <div class="w-full max-w-full px-3 shrink-0 md:flex-0 md:w-full lg:w-7/12">
        <div class="relative flex flex-col min-w-0 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
          <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-4 pb-0">
            <h6 class="mb-0 dark:text-white">Traffic channels</h6>
            <div class="flex items-center">
              <span class="py-2.6 mr-6 rounded-1.8 text-sm inline-block whitespace-nowrap bg-transparent px-0 text-center align-baseline font-normal leading-none text-white">
                <i class="rounded-circle mr-1.5 inline-block h-2 w-2 align-middle bg-fuchsia-500"></i>
                <span class="leading-tight dark:text-white text-slate-700 text-xs">Doctor Charge</span>
              </span>
              <span class="py-2.6 mr-6 rounded-1.8 text-sm inline-block whitespace-nowrap bg-transparent px-0 text-center align-baseline font-normal leading-none text-white">
                <i class="rounded-circle mr-1.5 inline-block h-2 w-2 align-middle bg-slate-700"></i>
                <span class="dark:text-white text-slate-700">Center Charge</span>
              </span>
              <span class="py-2.6 mr-6 rounded-1.8 text-sm inline-block whitespace-nowrap bg-transparent px-0 text-center align-baseline font-normal leading-none text-white">
                <i class="rounded-circle mr-1.5 inline-block h-2 w-2 align-middle bg-cyan-500"></i>
                <span class="dark:text-white text-slate-700">Total</span>
              </span>
            </div>
          </div>
          <div class="flex-auto p-4">
            <canvas id="chart-line-traffic" class="chart-canvas" height="300"></canvas>
          </div>
        </div>
      </div>
      <div class="w-full max-w-full px-3 mt-6 shrink-0 md:flex-0 md:w-full lg:w-5/12 lg:mt-0">
        <div class="relative flex flex-col h-full min-w-0 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
          <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-4 pb-0">
            <div class="flex items-center">
              <h6 class="mb-0 dark:text-white">Revenue By Center</h6>
              <button type="button" class="active:shadow-soft-xs active:opacity-85 ease-soft-in leading-pro text-xs bg-150 bg-x-25 rounded-3.5xl p-1.2 h-6 w-6 mb-0 ml-auto flex cursor-pointer items-center justify-center border border-solid border-slate-400 bg-transparent text-center align-middle font-bold text-slate-400 shadow-none transition-all hover:bg-transparent hover:text-slate-400 hover:opacity-75 hover:shadow-none active:bg-slate-400 active:text-black hover:active:bg-transparent hover:active:text-slate-400 hover:active:opacity-75 hover:active:shadow-none" data-target="tooltip_trigger">
                <i class="fas fa-info text-3xs"></i>
              </button>
              <div class="z-50 hidden px-2 py-1 text-center text-white bg-black rounded-lg max-w-46 text-sm" id="tooltip" role="tooltip" data-popper-placement="bottom">
                See wich centers total revenues
                <div id="arrow" class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']" data-popper-arrow></div>
              </div>
            </div>
          </div>
        
          <div class="flex-auto p-4">
            <div class="flex flex-wrap -mx-3">
              <div class="w-full max-w-full px-3 flex-0">
                <div class="overscroll-x-auto">
                  <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                    <tbody class="align-top">

                      @foreach ($centerChargesByCenter as $center)
                        <tr>
                          <td class="p-2 align-middle border-b border-solid dark:border-white/40 whitespace-nowrap border-inherit">
                            <div class="flex px-2 py-1">
                              <div class="flex flex-col justify-center">
                                <h6 class="mb-0 leading-normal dark:text-white text-sm">{{$center->center_name}}</h6>
                              </div>
                            </div>
                          </td>
                          <td class="p-2 leading-normal text-center align-middle border-b border-gray-200 border-solid text-sm whitespace-nowrap">
                            <span class="font-semibold leading-tight dark:text-white text-xs">LKR. {{$center->total_center_charge}}</span>
                          </td>
                        </tr>
                      @endforeach
                     
                    </tbody>
                  </table>
                </div>
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
      fetch('{{ route('fetchDataForChart') }}')
          .then(response => response.json())
          .then(data => {
              // Convert strings to numbers
              const doctorCharges = data.doctorCharges.map(charge => parseFloat(charge));
              const centerCharges = data.centerCharges.map(charge => parseFloat(charge));
              const totals = data.totals.map(total => parseFloat(total));

              // Update chart data
              const chartData = {
                  labels: data.labels,
                  datasets: [
                      {
                          label: 'Doctor Charge',
                          tension: 0.4,
                          borderWidth: 0,
                          pointRadius: 2,
                          pointBackgroundColor: "#cb0c9f",
                          borderColor: "#cb0c9f",
                          borderWidth: 3,
                          backgroundColor: gradientStroke1,
                          data: doctorCharges,
                          maxBarThickness: 6
                      },
                      {
                          label: 'Center Charge',
                          tension: 0.4,
                          borderWidth: 0,
                          pointRadius: 2,
                          pointBackgroundColor: "#3A416F",
                          borderColor: "#3A416F",
                          borderWidth: 3,
                          backgroundColor: gradientStroke2,
                          data: centerCharges,
                          maxBarThickness: 6
                      },
                      {
                          label: 'Total',
                          tension: 0.4,
                          borderWidth: 0,
                          pointRadius: 2,
                          pointBackgroundColor: "#17c1e8",
                          borderColor: "#17c1e8",
                          borderWidth: 3,
                          backgroundColor: gradientStroke2,
                          data: totals,
                          maxBarThickness: 6
                      },
                  ],
              };

              // Get the chart context
              const ctx = document.getElementById('chart-line-traffic').getContext('2d');
              
              // Update or create the chart using the updated data
              if (window.myLineChart) {
                  window.myLineChart.destroy(); // Destroy existing chart if it exists
              }
              window.myLineChart = new Chart(ctx, {
                  type: 'line',
                  data: chartData,
                  options: {
                      maintainAspectRatio: false,
                      responsive: true,
                      aspectRatio: 1.5,

                      plugins: {
                          legend: {
                              display: false
                          }
                      },
                  }
              });
          })
          .catch(error => {
              console.error('Error fetching data:', error);
          });
  });
</script>

    
@endpush