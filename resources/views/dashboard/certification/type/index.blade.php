<x-app-layout>
<x-slot name="breadcrumb">
        <!-- Page breadcrumb -->
        <div
            class="flex flex-col items-start justify-between pb-6 space-y-4 border-b lg:items-center lg:space-y-0 lg:flex-row"
          >
            <h1 class="text-2xl font-semibold whitespace-nowrap">{!! $types->template->title !!}</h1>
            <div class="space-x-2">
            <a
              href="{!! $types->template->url->{1} !!}"
              class="inline-flex items-center justify-center px-4 py-1 space-x-1 bg-red-500 text-white rounded-md shadow hover:bg-red-600"
            > <!-- animate-bounce -->
              <span>
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
              </span>
              <span>{!! $types->template->url->{0} !!}</span>
            </a>
            </div>
          </div>
    </x-slot>
    
        <!-- Table see (https://tailwindui.com/components/application-ui/lists/tables) -->
          <div class="flex flex-col mt-6">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden border-b border-gray-200 rounded-md shadow-md">
                  <table class="min-w-full overflow-x-scroll divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                      <tr>
                        <th
                          scope="col"
                          class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                        >
                          # Id
                        </th>
                        <th
                          scope="col"
                          class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                        >
                          Name / Description
                        </th>
                        <th
                          scope="col"
                          class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                        >
                          Tally
                        </th>
                        <th
                          scope="col"
                          class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                        >
                          Status
                        </th>
                        <th
                          scope="col"
                          class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                        >
                          Action
                        </th>
                      </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                          @foreach($types->data as $data)
                        <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap"><a href="#"># {!! $data->id !!}</a></td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                              <div class="flex-shrink-0 w-10 h-10">
                                <img
                                  class="w-10 h-10 rounded-full"
                                  src="https://ui-avatars.com/api/?bold=true&background=2dcea8&rounded=true&name={!! $data->name !!}&color=f9f9f9&size=50"
                                  alt="{!! ucwords($data->name) !!}"
                                />
                              </div>
                              <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">{!! ucwords($data->name) !!}</div>
                                <div class="text-sm text-gray-500">{!! Str::limit($data->description, 50) !!}</div>
                              </div>
                            </div>
                          </td>
                          <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{!! number_format($data->total) !!}</td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <span
                              class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full"
                            >
                            {!! ucwords($data->_status ? 'active' : 'inactive') !!}
                            </span>
                          </td>
                          <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">                         
                          <a href="{!! route('types.destroy', $data->id) !!}" onclick="event.preventDefault(); document.getElementById('types-destroy').submit();"><span class="inline-flex items-center justify-center h-5 w-12 text-lg text-gray-600"><i class="bx bx-trash"></i></span></a>
                          <form id="types-destroy" action="{!! route('types.destroy', $data->id) !!}" method="POST" style="display: none;">
                              @method('DELETE')
                              @csrf
                          </form>
                          </td>
                        </tr>
                        @endforeach
                      {{ $types->data->links() }}
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
</x-app-layout>
