<x-app-layout>
    <x-slot name="breadcrumb">
        <div
            class="flex flex-col items-start justify-between pb-6 space-y-4 border-b lg:items-center lg:space-y-0 lg:flex-row"
          >
            <h1 class="text-2xl font-semibold whitespace-nowrap">Dashboard</h1>
            <div class="space-x-2">
            <a
              href="{!! route('applications.create') !!}"
              class="inline-flex items-center justify-center px-4 py-1 space-x-1 bg-red-500 text-white rounded-md shadow hover:bg-red-600"
            > <!-- animate-bounce -->
              <span>
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
              </span>
              <span>NEW APPLICATION</span>
            </a>
            </div>
          </div>
    </x-slot>

    <div class="grid grid-cols-1 gap-5 mt-6 sm:grid-cols-2 lg:grid-cols-4">
      <div class="p-4 transition-shadow border rounded-lg shadow-sm hover:shadow-lg">
        <div class="flex items-start justify-between">
          <div class="flex flex-col space-y-2">
            <span class="text-gray-400">Certification Types</span>
            <span class="text-lg font-semibold">{!! number_format($data->total->certification_types) !!}</span>
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
            <span class="text-gray-400">Certification Categories</span>
            <span class="text-lg font-semibold">{!! number_format($data->total->certification_categories) !!}</span>
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
            <span class="text-gray-400">Certified Applications</span>
            <span class="text-lg font-semibold">{!! number_format($data->total->certified_applications) !!}</span>
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
            <span class="text-gray-400">User Businesses</span>
            <span class="text-lg font-semibold">{!! number_format($data->total->businesses) !!}</span>
          </div>
          <div class="p-10 bg-gray-200 rounded-md"></div>
        </div>
        <!-- <div>
          <span class="inline-block px-2 text-sm text-white bg-green-300 rounded">14%</span>
          <span>from 2019</span>
        </div> -->
      </div>
  </div>
</x-app-layout>
