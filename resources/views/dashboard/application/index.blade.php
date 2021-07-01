<x-app-layout>
<x-slot name="breadcrumb">
        <!-- Page breadcrumb -->
        <div
            class="flex flex-col items-start justify-between pb-6 space-y-4 border-b lg:items-center lg:space-y-0 lg:flex-row"
          >
            <h1 class="text-2xl font-semibold whitespace-nowrap">{!! $applications->template->title !!}</h1>
            <div class="space-x-2">
            <a
              href="{!! $applications->template->url->{1} !!}"
              class="inline-flex items-center justify-center px-4 py-1 space-x-1 bg-red-500 text-white rounded-md shadow hover:bg-red-600"
            > <!-- animate-bounce -->
              <span>
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
              </span>
              <span>{!! $applications->template->url->{0} !!}</span>
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
                          Serial
                        </th>
                        <th
                          scope="col"
                          class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                        >
                          Certification
                        </th>
                        <th
                          scope="col"
                          class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                        >
                          Business / Description
                        </th>
                        <th
                          scope="col"
                          class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                        >
                          Cost Amount
                        </th>
                        <th
                          scope="col"
                          class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                        >
                          Paid Amount
                        </th>
                        <th
                          scope="col"
                          class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                        >
                          Expiration Date
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
                          @foreach($applications->data as $data)
                        <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap"><a href="#"># {!! $data->id !!}</a></td>
                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap"><a href="#">{!! $data->uniqueID !!}</a></td>
                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap"><a href="#">{!! ucwords($data->category->name) !!} - <small>[{!! ucwords($data->category->type->name) !!}]</small></a></td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                              <div class="flex-shrink-0 w-10 h-10">
                                <img
                                  class="w-10 h-10 rounded-full"
                                  src="https://ui-avatars.com/api/?bold=true&background=2dcea8&rounded=true&name={!! $data->business->name !!}&color=f9f9f9&size=50"
                                  alt="{!! ucwords($data->business->name) !!}"
                                />
                              </div>
                              <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">{!! ucwords($data->business->name) !!}</div>
                                <div class="text-sm text-gray-500">{!! Str::limit($data->description, 50) !!}</div>
                              </div>
                            </div>
                          </td>
                          <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">KSH. {!! number_format($data->total_amount, 2) !!}</td>
                          <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">KSH. {!! number_format($data->paid_amount, 2) !!}</td>
                          <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{!! ucwords($data->expiration_date) !!}</td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <span
                              class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full"
                            >
                            {!! ucwords($data->_status) !!}
                            </span>
                          </td>
                          <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                            <button class="modal-open bg-transparent border border-gray-500 hover:border-indigo-500 text-gray-500 hover:text-indigo-500 font-bold py-2 px-4 rounded-full">Open Modal</button>
                            <!--Modal-->
                            <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
                              <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
                              
                              <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
                                
                                <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
                                  <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                    <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                                  </svg>
                                  <span class="text-sm">(Esc)</span>
                                </div>

                                <!-- Add margin if you want to see some of the overlay behind the modal-->
                                <div class="modal-content py-4 text-left px-6">
                                  <!--Title-->
                                  <div class="flex justify-between items-center pb-3">
                                    <!-- <p class="text-2xl font-bold">Simple Modal!</p> -->
                                    <div class="modal-close cursor-pointer z-50">
                                      <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                                      </svg>
                                    </div>
                                  </div>

                                  <!--Body-->
                                  <form action="{!! route('lnmo.transaction') !!}" method="POST">
                                  @csrf
                                  <input type="hidden" name="amount" value="{!! $data->total_amount !!}">
                                  <input type="hidden" name="reference" value="{!! $data->uniqueID !!}">
                                    <div class="shadow overflow-hidden sm:rounded-md">
                                      <div class="px-4 py-5 bg-white sm:p-6">
                                        <!-- <div class="grid grid-cols-6 gap-6"> -->
                                          <!-- <div class="col-span-6 sm:col-span-3"> -->
                                            <label for="phoneNumber" class="block text-sm font-medium text-gray-700">M-pesa Phone Number</label>
                                            <input type="text" name="phoneNumber" id="phoneNumber" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                          <!-- </div> -->
                                        <!-- </div> -->
                                      </div>
                                    </div>
                                  <!-- </form> -->
                                  <!--Footer-->
                                  <div class="flex justify-end pt-2">
                                    <button class="modal-close px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2">Cancel</button>
                                    <button class="px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400" type="submit">Process Payment</button>
                                  </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                            @if($data->_status == \App\Models\Application::PROCESSING && $data->paid_amount < $data->total_amount)
                              <a href="{!! route('applications.applyPayment', $data->id) !!}" target="_blank"><span class="inline-flex items-center justify-center h-5 w-12 text-lg text-gray-600"><i class="bx bx-message-alt-check"></i></span></a>
                            @endif
                            @if($data->_status == \App\Models\Application::APPROVED)
                              <a href="{!! route('applications.applyPrint', $data->id) !!}" target="_blank"><span class="inline-flex items-center justify-center h-5 w-12 text-lg text-gray-600"><i class="bx bx-printer"></i></span></a>
                            @endif               
                            <a href="{!! route('applications.destroy', $data->id) !!}" onclick="event.preventDefault(); document.getElementById('applications-destroy-{!! $data->id !!}').submit();"><span class="inline-flex items-center justify-center h-5 w-12 text-lg text-gray-600"><i class="bx bx-trash"></i></span></a>
                            <form id="applications-destroy-{!! $data->id !!}" action="{!! route('applications.destroy', $data->id) !!}" method="POST" style="display: none;">
                              @method('DELETE')
                              @csrf
                            </form>
                          </td>
                        </tr>
                        @endforeach
                      {{ $applications->data->links() }}
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

</x-app-layout>

<script>
    var openmodal = document.querySelectorAll('.modal-open')
    for (var i = 0; i < openmodal.length; i++) {
      openmodal[i].addEventListener('click', function(event){
    	event.preventDefault()
    	toggleModal()
      })
    }
    
    const overlay = document.querySelector('.modal-overlay')
    overlay.addEventListener('click', toggleModal)
    
    var closemodal = document.querySelectorAll('.modal-close')
    for (var i = 0; i < closemodal.length; i++) {
      closemodal[i].addEventListener('click', toggleModal)
    }
    
    document.onkeydown = function(evt) {
      evt = evt || window.event
      var isEscape = false
      if ("key" in evt) {
    	isEscape = (evt.key === "Escape" || evt.key === "Esc")
      } else {
    	isEscape = (evt.keyCode === 27)
      }
      if (isEscape && document.body.classList.contains('modal-active')) {
    	toggleModal()
      }
    };
    
    function toggleModal () {
      const body = document.querySelector('body')
      const modal = document.querySelector('.modal')
      modal.classList.toggle('opacity-0')
      modal.classList.toggle('pointer-events-none')
      body.classList.toggle('modal-active')
    } 
</script>