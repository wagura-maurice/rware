<x-app-layout>
    <x-slot name="breadcrumb">
        <div
            class="flex flex-col items-start justify-between pb-6 space-y-4 border-b lg:items-center lg:space-y-0 lg:flex-row"
          >
            <h1 class="text-2xl font-semibold whitespace-nowrap">Dashboard</h1>
            <div class="space-x-2">
            <a
              href="{!! route('campaign.create') !!}"
              class="inline-flex items-center justify-center px-4 py-1 space-x-1 bg-red-500 text-white rounded-md shadow hover:bg-red-600"
            > <!-- animate-bounce -->
              <span>
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
              </span>
              <span>NEW CAMPAIGN</span>
            </a>
            </div>
          </div>
    </x-slot>

    <div class="grid grid-cols-1 gap-5 mt-6 sm:grid-cols-2 lg:grid-cols-4">
      <div class="p-4 transition-shadow border rounded-lg shadow-sm hover:shadow-lg">
        <div class="flex items-start justify-between">
          <div class="flex flex-col space-y-2">
            <span class="text-gray-400">Total Campaigns</span>
            <span class="text-lg font-semibold">{!! number_format($data->total_campaigns) !!}</span>
          </div>
          <div class="p-10 bg-gray-200 rounded-md"></div>
        </div>
        <!-- <div>
          <span class="inline-block px-2 text-sm text-white bg-green-300 rounded">14%</span>
          <span>from 2019</span>
        </div> -->
      </div>

      <div class="p-4 transition-shadow border rounded-lg shadow-sm hover:shadow-lg">
        <div class="flex items-start justify-between">
          <div class="flex flex-col space-y-2">
            <span class="text-gray-400">Total Youtube Campaigns</span>
            <span class="text-lg font-semibold">{!! number_format($data->total_youtube_campaigns) !!}</span>
          </div>
          <div class="p-10 bg-gray-200 rounded-md"></div>
        </div>
        <!-- <div>
          <span class="inline-block px-2 text-sm text-white bg-green-300 rounded">14%</span>
          <span>from 2019</span>
        </div> -->
      </div>

      <div class="p-4 transition-shadow border rounded-lg shadow-sm hover:shadow-lg">
        <div class="flex items-start justify-between">
          <div class="flex flex-col space-y-2">
            <span class="text-gray-400">Total Skiza Campaigns</span>
            <span class="text-lg font-semibold">{!! number_format($data->total_skiza_campaigns) !!}</span>
          </div>
          <div class="p-10 bg-gray-200 rounded-md"></div>
        </div>
        <!-- <div>
          <span class="inline-block px-2 text-sm text-white bg-green-300 rounded">14%</span>
          <span>from 2019</span>
        </div> -->
      </div>

      <div class="p-4 transition-shadow border rounded-lg shadow-sm hover:shadow-lg">
        <div class="flex items-start justify-between">
          <div class="flex flex-col space-y-2">
            <span class="text-gray-400">Total Hits</span>
            <span class="text-lg font-semibold">{!! number_format($data->total_hits) !!}</span>
          </div>
          <div class="p-10 bg-gray-200 rounded-md"></div>
        </div>
        <!-- <div>
          <span class="inline-block px-2 text-sm text-white bg-green-300 rounded">14%</span>
          <span>from 2019</span>
        </div> -->
      </div>
  </div>

  <!-- component -->
<div class="sans-serif bg-gray-200 w-lg">
  <style>
    /* body {
      font-family: 'IBM Plex Mono', sans-serif;
    } */
    [x-cloak] {
      display: none;
    }

    .line {
      background: repeating-linear-gradient(
        to bottom,
        #eee,
        #eee 1px,
        #fff 1px,
        #fff 8%
      );
    }
    .tick {
      background: repeating-linear-gradient(
        to right,
        #eee,
        #eee 1px,
        #fff 1px,
        #fff 5%
      );
    }
  </style>

  <div x-data="campaignschart()" x-cloak class="px-4">
    <div class="max-w-lg mx-auto py-10">
      <div class="shadow p-6 rounded-lg bg-white">
        <div class="md:flex md:justify-between md:items-center">
          <div>
            <h2 class="text-xl text-gray-800 font-bold leading-tight">Campaigns</h2>
            <p class="mb-2 text-gray-600 text-sm">Monthly Average</p>
          </div>

          <!-- Legends -->
          <div class="mb-4">
            <div class="flex items-center">
              <div class="w-2 h-2 bg-blue-600 mr-2 rounded-full"></div>
              <div class="text-sm text-gray-700">Count</div>
            </div>
          </div>
        </div>

        <div class="line my-8 relative">
          <!-- Tooltip -->
          <template x-if="tooltipOpen == true">
            <div x-ref="tooltipContainer" class="p-0 m-0 z-10 shadow-lg rounded-lg absolute h-auto block"
                 :style="`bottom: ${tooltipY}px; left: ${tooltipX}px`"
                 >
              <div class="shadow-xs rounded-lg bg-white p-2">
                <div class="flex items-center justify-between text-sm">
                  <div>Count:</div>
                  <div class="font-bold ml-2">
                    <span x-html="tooltipContent"></span>
                  </div>
                </div>
              </div>
            </div>
          </template>

          <!-- Bar Chart -->
          <div class="flex -mx-2 items-end mb-2">
            <template x-for="data in chartData">

              <div class="px-2 w-1/6">
                <div :style="`height: ${data}px`" 
                     class="transition ease-in duration-200 bg-blue-600 hover:bg-blue-400 relative"
                     @mouseenter="showTooltip($event); tooltipOpen = true" 
                     @mouseleave="hideTooltip($event)"
                     >
                  <div x-text="data" class="text-center absolute top-0 left-0 right-0 -mt-6 text-gray-800 text-sm"></div>
                </div>
              </div>

            </template>
          </div>

          <!-- Labels -->
          <div class="border-t border-gray-400 mx-auto" :style="`height: 1px; width: ${ 100 - 1/chartData.length*100 + 3}%`"></div>
          <div class="flex -mx-2 items-end">
            <template x-for="data in labels">
              <div class="px-2 w-1/6">
                <div class="bg-red-600 relative">
                  <div class="text-center absolute top-0 left-0 right-0 h-2 -mt-px bg-gray-400 mx-auto" style="width: 1px"></div>
                  <div x-text="data" class="text-center absolute top-0 left-0 right-0 mt-3 text-gray-700 text-sm"></div>
                </div>
              </div>
            </template>	
          </div>

        </div>
      </div>
      
    </div>
  </div>

  <div x-data="hitsChart()" x-cloak class="px-4">
    <div class="max-w-lg mx-auto py-10">
      <div class="shadow p-6 rounded-lg bg-white">
        <div class="md:flex md:justify-between md:items-center">
          <div>
            <h2 class="text-xl text-gray-800 font-bold leading-tight">Preview Hits</h2>
            <p class="mb-2 text-gray-600 text-sm">Monthly Average</p>
          </div>

          <!-- Legends -->
          <div class="mb-4">
            <div class="flex items-center">
              <div class="w-2 h-2 bg-blue-600 mr-2 rounded-full"></div>
              <div class="text-sm text-gray-700">Hits</div>
            </div>
          </div>
        </div>

        <div class="line my-8 relative">
          <!-- Tooltip -->
          <template x-if="tooltipOpen == true">
            <div x-ref="tooltipContainer" class="p-0 m-0 z-10 shadow-lg rounded-lg absolute h-auto block"
                 :style="`bottom: ${tooltipY}px; left: ${tooltipX}px`"
                 >
              <div class="shadow-xs rounded-lg bg-white p-2">
                <div class="flex items-center justify-between text-sm">
                  <div>Hits:</div>
                  <div class="font-bold ml-2">
                    <span x-html="tooltipContent"></span>
                  </div>
                </div>
              </div>
            </div>
          </template>

          <!-- Bar Chart -->
          <div class="flex -mx-2 items-end mb-2">
            <template x-for="data in chartData">

              <div class="px-2 w-1/6">
                <div :style="`height: ${data}px`" 
                     class="transition ease-in duration-200 bg-blue-600 hover:bg-blue-400 relative"
                     @mouseenter="showTooltip($event); tooltipOpen = true" 
                     @mouseleave="hideTooltip($event)"
                     >
                  <div x-text="data" class="text-center absolute top-0 left-0 right-0 -mt-6 text-gray-800 text-sm"></div>
                </div>
              </div>

            </template>
          </div>

          <!-- Labels -->
          <div class="border-t border-gray-400 mx-auto" :style="`height: 1px; width: ${ 100 - 1/chartData.length*100 + 3}%`"></div>
          <div class="flex -mx-2 items-end">
            <template x-for="data in labels">
              <div class="px-2 w-1/6">
                <div class="bg-red-600 relative">
                  <div class="text-center absolute top-0 left-0 right-0 h-2 -mt-px bg-gray-400 mx-auto" style="width: 1px"></div>
                  <div x-text="data" class="text-center absolute top-0 left-0 right-0 mt-3 text-gray-700 text-sm"></div>
                </div>
              </div>
            </template>	
          </div>

        </div>
      </div>
      
    </div>
  </div>

  <script>
    function campaignschart() {
      return {
        chartData: {!! $data->campaignsChart->chartData !!},
        labels: {!! $data->campaignsChart->labels !!},

        tooltipContent: '',
        tooltipOpen: false,
        tooltipX: 0,
        tooltipY: 0,
        showTooltip(e) {
          console.log(e);
          this.tooltipContent = e.target.textContent
          this.tooltipX = e.target.offsetLeft - e.target.clientWidth;
          this.tooltipY = e.target.clientHeight + e.target.clientWidth;
        },
        hideTooltip(e) {
          this.tooltipContent = '';
          this.tooltipOpen = false;
          this.tooltipX = 0;
          this.tooltipY = 0;
        }
      }
    }

    function hitsChart() {
      return {
        chartData: {!! $data->hitsChart->chartData !!},
        labels: {!! $data->hitsChart->labels !!},

        tooltipContent: '',
        tooltipOpen: false,
        tooltipX: 0,
        tooltipY: 0,
        showTooltip(e) {
          console.log(e);
          this.tooltipContent = e.target.textContent
          this.tooltipX = e.target.offsetLeft - e.target.clientWidth;
          this.tooltipY = e.target.clientHeight + e.target.clientWidth;
        },
        hideTooltip(e) {
          this.tooltipContent = '';
          this.tooltipOpen = false;
          this.tooltipX = 0;
          this.tooltipY = 0;
        }
      }
    }
  </script>
</div>
</x-app-layout>
