@extends('admin.layouts.app')

@section('content')

<div class="w-full p-6 mx-auto">
       
    <div class="flex flex-wrap -mx-3">
      <div class="flex w-full max-w-full px-3 ml-auto flex-0 lg:w-6/12">
        <a href="javascript:;" class="inline-block px-6 py-3 mb-4 ml-auto font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer text-slate-400 hover:scale-102 leading-pro text-xs ease-soft-in tracking-tight-soft active:opacity-85 active:shadow-soft-xs border-slate-400 hover:border-slate-400 hover:bg-transparent hover:opacity-75 active:border-slate-400 active:bg-slate-400 active:text-black hover:active:bg-transparent hover:active:text-slate-400 hover:active:shadow-none">
          <span>Export</span>
          <span class="ml-2">
            <i class="ni leading-none ni-folder-17"></i>
          </span>
        </a>
        <div class="relative ml-4">
          <button type="button" class="after:inline-block after:ml-1 after:content-[''] after:align-[.255em] after:border-3 after:border-t-white after:border-solid after:border-b-0 after:border-transparent after:text-white inline-block px-6 py-3 mb-4 font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer hover:scale-102 active:opacity-85 hover:shadow-soft-xs dark:bg-gradient-to-tl dark:from-slate-850 dark:to-gray-850 bg-gradient-to-tl from-gray-900 to-slate-800 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25" dropdown-trigger aria-expanded="false">
            Today
          </button>
          <p class="hidden transform-dropdown-show"></p>
          <ul dropdown-menu class="dark:shadow-soft-dark-xl z-100 dark:bg-gray-950 text-sm top-1 lg:shadow-soft-3xl duration-250 before:duration-350 before:font-awesome before:ease-soft min-w-44 before:text-5.5 transform-dropdown pointer-events-none absolute right-0 left-auto m-0 -mr-4 mt-2 list-none rounded-lg border-0 border-solid border-transparent bg-white bg-clip-padding px-0 py-2 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-7 before:left-auto before:top-0 before:z-40 before:text-white before:transition-all before:content-['\f0d8']">
            <li>
              <a class="py-1.2 lg:ease-soft clear-both block w-full whitespace-nowrap rounded-lg border-0 bg-transparent px-4 text-left font-normal text-slate-500 hover:bg-gray-200 hover:text-slate-700 dark:text-white dark:hover:bg-gray-200/80 dark:hover:text-slate-700 lg:transition-colors lg:duration-300" href="javascript:;">Yesterday</a>
            </li>
            <li>
              <a class="py-1.2 lg:ease-soft clear-both block w-full whitespace-nowrap rounded-lg border-0 bg-transparent px-4 text-left font-normal text-slate-500 hover:bg-gray-200 hover:text-slate-700 dark:text-white dark:hover:bg-gray-200/80 dark:hover:text-slate-700 lg:transition-colors lg:duration-300" href="javascript:;">Last 7 days</a>
            </li>
            <li>
              <a class="py-1.2 lg:ease-soft clear-both block w-full whitespace-nowrap rounded-lg border-0 bg-transparent px-4 text-left font-normal text-slate-500 hover:bg-gray-200 hover:text-slate-700 dark:text-white dark:hover:bg-gray-200/80 dark:hover:text-slate-700 lg:transition-colors lg:duration-300" href="javascript:;">Last 30 days</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="flex flex-wrap -mx-3">
      <div class="w-full max-w-full px-3 mb-6 shrink-0 sm:flex-0 sm:w-6/12 xl:w-3/12 xl:mb-0">
        <div class="relative flex flex-col min-w-0 break-words bg-white dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
          <div class="flex-auto p-4">
            <div class="flex flex-wrap -mx-3">
              <div class="flex-none w-2/3 max-w-full px-3">
                <div>
                  <p class="mb-0 font-sans font-semibold leading-normal text-sm">Users</p>
                  <h5 class="mb-0 font-bold dark:text-white">
                    930
                    <span class="leading-normal text-sm font-weight-bolder text-lime-500">+55%</span>
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
                  <p class="mb-0 font-sans font-semibold leading-normal text-sm">New Users</p>
                  <h5 class="mb-0 font-bold dark:text-white">
                    744
                    <span class="leading-normal text-sm font-weight-bolder text-lime-500">+3%</span>
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
                  <p class="mb-0 font-sans font-semibold leading-normal text-sm">Sessions</p>
                  <h5 class="mb-0 font-bold dark:text-white">
                    1,414
                    <span class="leading-normal text-red-600 text-sm font-weight-bolder">-2%</span>
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
                  <p class="mb-0 font-sans font-semibold leading-normal text-sm">Pages/Session</p>
                  <h5 class="mb-0 font-bold dark:text-white">
                    1.76
                    <span class="leading-normal text-sm font-weight-bolder text-lime-500">+5%</span>
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
                <span class="leading-tight dark:text-white text-slate-700 text-xs">Organic search</span>
              </span>
              <span class="py-2.6 mr-6 rounded-1.8 text-sm inline-block whitespace-nowrap bg-transparent px-0 text-center align-baseline font-normal leading-none text-white">
                <i class="rounded-circle mr-1.5 inline-block h-2 w-2 align-middle bg-slate-700"></i>
                <span class="dark:text-white text-slate-700">Referral</span>
              </span>
              <span class="py-2.6 mr-6 rounded-1.8 text-sm inline-block whitespace-nowrap bg-transparent px-0 text-center align-baseline font-normal leading-none text-white">
                <i class="rounded-circle mr-1.5 inline-block h-2 w-2 align-middle bg-cyan-500"></i>
                <span class="dark:text-white text-slate-700">Social media</span>
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
              <h6 class="mb-0 dark:text-white">Referrals</h6>
              <button type="button" class="active:shadow-soft-xs active:opacity-85 ease-soft-in leading-pro text-xs bg-150 bg-x-25 rounded-3.5xl p-1.2 h-6 w-6 mb-0 ml-auto flex cursor-pointer items-center justify-center border border-solid border-slate-400 bg-transparent text-center align-middle font-bold text-slate-400 shadow-none transition-all hover:bg-transparent hover:text-slate-400 hover:opacity-75 hover:shadow-none active:bg-slate-400 active:text-black hover:active:bg-transparent hover:active:text-slate-400 hover:active:opacity-75 hover:active:shadow-none" data-target="tooltip_trigger">
                <i class="fas fa-info text-3xs"></i>
              </button>
              <div class="z-50 hidden px-2 py-1 text-center text-white bg-black rounded-lg max-w-46 text-sm" id="tooltip" role="tooltip" data-popper-placement="bottom">
                See wich websites are sending traffic to your website
                <div id="arrow" class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']" data-popper-arrow></div>
              </div>
            </div>
          </div>
        
          <div class="flex-auto p-4">
            <div class="flex flex-wrap -mx-3">
              <div class="w-full max-w-full px-3 text-center flex-0 lg:w-5/12">
                <div class="mt-12">
                  <canvas id="chart-doughnut-referrals" height="200"></canvas>
                </div>
                <a href="javascript:;" class="inline-block px-8 py-2 m-0 mt-6 text-xs font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer ease-soft-in leading-pro tracking-tight-soft bg-gradient-to-tl from-slate-600 to-slate-300 shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85">See all referrals</a>
              </div>
              <div class="w-full max-w-full px-3 flex-0 lg:w-7/12">
                <div class="overscroll-x-auto">
                  <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                    <tbody class="align-top">
                      <tr>
                        <td class="p-2 align-middle border-b border-solid dark:border-white/40 whitespace-nowrap border-inherit">
                          <div class="flex px-2 py-1">
                            <div>
                              <img class="inline-flex items-center justify-center text-white transition-all duration-200 text-sm ease-soft-in-out h-9 w-9 rounded-xl" src="../../assets/img/small-logos/logo-xd.svg" alt="xd logo" />
                            </div>
                            <div class="flex flex-col justify-center">
                              <h6 class="mb-0 leading-normal dark:text-white text-sm">Adobe</h6>
                            </div>
                          </div>
                        </td>
                        <td class="p-2 leading-normal text-center align-middle border-b border-gray-200 border-solid text-sm whitespace-nowrap">
                          <span class="font-semibold leading-tight dark:text-white text-xs">25%</span>
                        </td>
                      </tr>
                      <tr>
                        <td class="p-2 align-middle border-b border-solid dark:border-white/40 whitespace-nowrap border-inherit">
                          <div class="flex px-2 py-1">
                            <div>
                              <img class="inline-flex items-center justify-center text-white transition-all duration-200 text-sm ease-soft-in-out h-9 w-9 rounded-xl" src="../../assets/img/small-logos/logo-atlassian.svg" alt="atlassian logo" />
                            </div>
                            <div class="flex flex-col justify-center">
                              <h6 class="mb-0 leading-normal dark:text-white text-sm">Atlassian</h6>
                            </div>
                          </div>
                        </td>
                        <td class="p-2 leading-normal text-center align-middle border-b border-gray-200 border-solid text-sm whitespace-nowrap">
                          <span class="font-semibold leading-tight dark:text-white text-xs">3%</span>
                        </td>
                      </tr>
                      <tr>
                        <td class="p-2 align-middle border-b border-solid dark:border-white/40 whitespace-nowrap border-inherit">
                          <div class="flex px-2 py-1">
                            <div>
                              <img class="inline-flex items-center justify-center text-white transition-all duration-200 text-sm ease-soft-in-out h-9 w-9 rounded-xl" src="../../assets/img/small-logos/logo-slack.svg" alt="slack logo" />
                            </div>
                            <div class="flex flex-col justify-center">
                              <h6 class="mb-0 leading-normal dark:text-white text-sm">Slack</h6>
                            </div>
                          </div>
                        </td>
                        <td class="p-2 leading-normal text-center align-middle border-b border-gray-200 border-solid text-sm whitespace-nowrap">
                          <span class="font-semibold leading-tight dark:text-white text-xs">12%</span>
                        </td>
                      </tr>
                      <tr>
                        <td class="p-2 align-middle border-b border-solid dark:border-white/40 whitespace-nowrap border-inherit">
                          <div class="flex px-2 py-1">
                            <div>
                              <img class="inline-flex items-center justify-center text-white transition-all duration-200 text-sm ease-soft-in-out h-9 w-9 rounded-xl" src="../../assets/img/small-logos/logo-spotify.svg" alt="spotify logo" />
                            </div>
                            <div class="flex flex-col justify-center">
                              <h6 class="mb-0 leading-normal dark:text-white text-sm">Spotify</h6>
                            </div>
                          </div>
                        </td>
                        <td class="p-2 leading-normal text-center align-middle border-b border-gray-200 border-solid text-sm whitespace-nowrap">
                          <span class="font-semibold leading-tight dark:text-white text-xs">7%</span>
                        </td>
                      </tr>
                      <tr>
                        <td class="p-2 align-middle border-b-0 border-solid whitespace-nowrap border-inherit">
                          <div class="flex px-2 py-1">
                            <div>
                              <img class="inline-flex items-center justify-center text-white transition-all duration-200 text-sm ease-soft-in-out h-9 w-9 rounded-xl" src="../../assets/img/small-logos/logo-jira.svg" alt="jira logo" />
                            </div>
                            <div class="flex flex-col justify-center">
                              <h6 class="mb-0 leading-normal dark:text-white text-sm">Jira</h6>
                            </div>
                          </div>
                        </td>
                        <td class="p-2 leading-normal text-center align-middle border-b-0 border-gray-200 border-solid text-sm whitespace-nowrap">
                          <span class="font-semibold leading-tight dark:text-white text-xs">10%</span>
                        </td>
                      </tr>
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