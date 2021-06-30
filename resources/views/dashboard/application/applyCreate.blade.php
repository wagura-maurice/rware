<x-app-layout>
<x-slot name="breadcrumb">
        <!-- Page breadcrumb -->
        <div
            class="flex flex-col items-start justify-between pb-6 space-y-4 border-b lg:items-center lg:space-y-0 lg:flex-row"
          >
            <h1 class="text-2xl font-semibold whitespace-nowrap">{!! $application->template->title !!}</h1>
            @can('certification_applications_create')
              <div class="space-x-2">
              <a
                href="{!! $application->template->url->{1} !!}"
                class="inline-flex items-center justify-center px-4 py-1 space-x-1 bg-red-500 text-white rounded-md shadow hover:bg-red-600"
              > <!-- animate-bounce -->
                <span>
                  <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                  </svg>
                </span>
                <span>{!! $application->template->url->{0} !!}</span>
              </a>
              </div>
            @endcan
          </div>
    </x-slot>

    <div class="flex flex-col mt-6">
      <form action="{!! route('applications.applyStore') !!}" method="POST">
      @csrf
        <input type="hidden" name="category_id" value="{!! $application->category->id !!}">
        <div class="shadow overflow-hidden sm:rounded-md">
          <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-6 gap-6">

              <div class="col-span-6 sm:col-span-3">
                <label for="business" class="block text-sm font-medium text-gray-700">Assigned business</label>
                <select id="business" name="business_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                  <option selected disabled>Select Type</option>
                  @foreach($application->businesses as $business)
                    <option value="{!! $business->id !!}">{!! strtoupper($business->name) !!}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="footage" class="block text-sm font-medium text-gray-700">Footage <small>(Sq Ft)</small></label>
                <input type="number" name="footage" id="footage" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" min="0" max="100000">
              </div>

              <div class="col-span-12 sm:col-span-6">
              <label for="description" class="block text-sm font-medium text-gray-700">
                Description
              </label>
              <div class="mt-1">
                <textarea id="description" name="description" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
              </div>
              <p class="mt-2 text-sm text-gray-500">
                Brief description for your place of work.
              </p>
            </div>

            </div>
          </div>
          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Save
            </button>
          </div>
        </div>
      </form>
    </div>

<div class="hidden sm:block" aria-hidden="true">
  <div class="py-5">
    <div class="border-t border-gray-200"></div>
  </div>
</div>

</x-app-layout>
