<!DOCTYPE html>
<html lang="{!! str_replace('_', '-', app()->getLocale()) !!}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{!! csrf_token() !!}">

        <title>{!! strtoupper(config('app.name', 'Laravel')) !!}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        @notifyCss
        <link rel="stylesheet" href="{!! asset('css/app.css') !!}">
        <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />
    </head>
    <body class="font-sans antialiased">
        <!-- component -->
    <div class="flex h-screen overflow-y-hidden bg-white" x-data="setup()" x-init="$refs.loading.classList.add('hidden')">
      <!-- Loading screen -->
      <div
        x-ref="loading"
        class="fixed inset-0 z-50 flex items-center justify-center text-white bg-black bg-opacity-50"
        style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)"
      >
        Loading.....
      </div>

      <!-- Sidebar backdrop -->
      <div
        x-show.in.out.opacity="isSidebarOpen"
        class="fixed inset-0 z-10 bg-black bg-opacity-20 lg:hidden"
        style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)"
      ></div>

      <!-- Sidebar -->
      <aside
        x-transition:enter="transition transform duration-300"
        x-transition:enter-start="-translate-x-full opacity-30  ease-in"
        x-transition:enter-end="translate-x-0 opacity-100 ease-out"
        x-transition:leave="transition transform duration-300"
        x-transition:leave-start="translate-x-0 opacity-100 ease-out"
        x-transition:leave-end="-translate-x-full opacity-0 ease-in"
        class="fixed inset-y-0 z-10 flex flex-col flex-shrink-0 w-64 max-h-screen overflow-hidden transition-all transform bg-white border-r shadow-lg lg:z-auto lg:static lg:shadow-none"
        :class="{'-translate-x-full lg:translate-x-0 lg:w-20': !isSidebarOpen}"
      >
        <!-- sidebar header -->
        <div class="flex items-center justify-between flex-shrink-0 p-2" :class="{'lg:justify-center': !isSidebarOpen}">
          <span class="p-2 text-xl font-semibold leading-8 tracking-wider uppercase whitespace-nowrap">
            <!-- K -->
            <span :class="{'lg:hidden': !isSidebarOpen}">{!! config('app.name', 'Laravel') !!}</span>
          </span>
          <button @click="toggleSidbarMenu()" class="p-2 rounded-md lg:hidden">
            <svg
              class="w-6 h-6 text-gray-600"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <!-- Sidebar links -->
        <nav class="flex-1 overflow-hidden hover:overflow-y-auto">
        <ul class="space-y-2 text-sm">
            <li>
                <a href="{!! route('dashboard.index') !!}" class="flex items-center space-x-3 text-gray-700 p-2 rounded-md font-medium transform hover:translate-x-2 transition-transform ease-in duration-200 hover:bg-gray-200 {{ trim(Route::currentRouteName()) == 'dashboard.index' ? 'bg-gray-200' : '' }} focus:shadow-outline" :class="{'justify-center': !isSidebarOpen}">
                    <span class="inline-flex items-center justify-center h-5 w-12 text-lg text-gray-600"><i class="bx bx-desktop"></i></span>
                    <span :class="{ 'lg:hidden': !isSidebarOpen }">Dashboard</span>
                </a>
            </li>
            @can('certification_types_access')
            <li>
                <a href="{!! route('types.index') !!}" class="flex items-center space-x-3 text-gray-700 p-2 rounded-md font-medium transform hover:translate-x-2 transition-transform ease-in duration-200 hover:bg-gray-200 {{ trim(Route::currentRouteName()) == 'types.index' || trim(Route::currentRouteName()) == 'types.create' || trim(Route::currentRouteName()) == 'types.edit' || trim(Route::currentRouteName()) == 'types.show' ? 'bg-gray-200' : '' }} focus:shadow-outline" :class="{'justify-center': !isSidebarOpen}">
                <span class="inline-flex items-center justify-center h-5 w-12 text-lg text-gray-600"><i class="bx bx-data"></i></span>
                    <span :class="{ 'lg:hidden': !isSidebarOpen }">Certification Types</span>
                </a>
            </li>
            @endcan
            @can('certification_categories_access')
            <li>
                <a href="{!! route('categories.index') !!}" class="flex items-center space-x-3 text-gray-700 p-2 rounded-md font-medium transform hover:translate-x-2 transition-transform ease-in duration-200 hover:bg-gray-200 {{ trim(Route::currentRouteName()) == 'categories.index' || trim(Route::currentRouteName()) == 'categories.create' || trim(Route::currentRouteName()) == 'categories.edit' || trim(Route::currentRouteName()) == 'categories.show' ? 'bg-gray-200' : '' }} focus:shadow-outline" :class="{'justify-center': !isSidebarOpen}">
                <span class="inline-flex items-center justify-center h-5 w-12 text-lg text-gray-600"><i class="bx bx-data"></i></span>
                    <span :class="{ 'lg:hidden': !isSidebarOpen }">Certification Categories</span>
                </a>
            </li>
            @endcan
            <li>
                <a href="{!! route('applications.index') !!}" class="flex items-center space-x-3 text-gray-700 p-2 rounded-md font-medium transform hover:translate-x-2 transition-transform ease-in duration-200 hover:bg-gray-200 {{ trim(Route::currentRouteName()) == 'applications.index' || trim(Route::currentRouteName()) == 'applications.create' || trim(Route::currentRouteName()) == 'applications.edit' || trim(Route::currentRouteName()) == 'applications.show' ? 'bg-gray-200' : '' }} focus:shadow-outline" :class="{'justify-center': !isSidebarOpen}">
                <span class="inline-flex items-center justify-center h-5 w-12 text-lg text-gray-600"><i class="bx bx-data"></i></span>
                    <span :class="{ 'lg:hidden': !isSidebarOpen }">Certification Applications</span>
                </a>
            </li>
            <li>
                <a href="{!! route('businesses.index') !!}" class="flex items-center space-x-3 text-gray-700 p-2 rounded-md font-medium transform hover:translate-x-2 transition-transform ease-in duration-200 hover:bg-gray-200 {{ trim(Route::currentRouteName()) == 'businesses.index' || trim(Route::currentRouteName()) == 'businesses.create' || trim(Route::currentRouteName()) == 'buinesses.edit' || trim(Route::currentRouteName()) == 'businesses.show' ? 'bg-gray-200' : '' }} focus:shadow-outline" :class="{'justify-center': !isSidebarOpen}">
                <span class="inline-flex items-center justify-center h-5 w-12 text-lg text-gray-600"><i class="bx bx-data"></i></span>
                    <span :class="{ 'lg:hidden': !isSidebarOpen }">Certification Businesses</span>
                </a>
            </li>
            <!-- <li>
                <a href="#" class="flex items-center space-x-3 text-gray-700 p-2 rounded-md font-medium transform hover:translate-x-2 transition-transform ease-in duration-200 hover:bg-gray-200 focus:shadow-outline" :class="{'justify-center': !isSidebarOpen}">
                    <span class="inline-flex items-center justify-center h-5 w-12 text-lg text-gray-600"><i class="bx bx-desktop"></i></span>
                    <span :class="{ 'lg:hidden': !isSidebarOpen }">Settings</span>
                </a>
            </li> -->
        </ul>
        </nav>
        <!-- Sidebar footer -->
        <div class="flex-shrink-0 p-2 border-t max-h-14">
            <a href="{!! route('logout') !!}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <button
            class="flex items-center justify-center w-full px-4 py-2 space-x-1 font-medium tracking-wider uppercase bg-gray-100 border rounded-md focus:outline-none focus:ring"
          >
            <span>
              <svg
                class="w-6 h-6"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                />
              </svg>
            </span>
            <span :class="{'lg:hidden': !isSidebarOpen}"> {!! __('Logout') !!} </span>
          </button>
            </a>
        </div>
      </aside>

      <div class="flex flex-col flex-1 h-full overflow-hidden">
        <!-- Navbar -->
        <header class="flex-shrink-0 border-b">
          <div class="flex items-center justify-between p-2">
            <!-- Navbar left -->
            <div class="flex items-center space-x-3">
              <span class="p-2 text-xl font-semibold tracking-wider uppercase lg:hidden">{!! config('app.name', 'Laravel') !!}</span>
              <!-- Toggle sidebar button -->
              <button @click="toggleSidbarMenu()" class="p-2 rounded-md focus:outline-none focus:ring">
                <svg
                  class="w-4 h-4 text-gray-600"
                  :class="{'transform transition-transform -rotate-180': isSidebarOpen}"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                </svg>
              </button>
            </div>

            <!-- Mobile search box -->
            <div
              x-show.transition="isSearchBoxOpen"
              class="fixed inset-0 z-10 bg-black bg-opacity-20"
              style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)"
            >
              <div
                @click.away="isSearchBoxOpen = false"
                class="absolute inset-x-0 flex items-center justify-between p-2 bg-white shadow-md"
              >
                <div class="flex items-center flex-1 px-2 space-x-2">
                  <!-- search icon -->
                  <span>
                    <svg
                      class="w-6 h-6 text-gray-500"
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                      />
                    </svg>
                  </span>
                  <input
                    type="text"
                    placeholder="Search"
                    class="w-full px-4 py-3 text-gray-600 rounded-md focus:bg-gray-100 focus:outline-none"
                  />
                </div>
                <!-- close button -->
                <button @click="isSearchBoxOpen = false" class="flex-shrink-0 p-4 rounded-md">
                  <svg
                    class="w-4 h-4 text-gray-500"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                </button>
              </div>
            </div>

            <!-- Desktop search box -->
            <div class="items-center hidden px-2 space-x-2 md:flex-1 md:flex md:mr-auto md:ml-5">
              <!-- search icon -->
              <span>
                <svg
                  class="w-5 h-5 text-gray-500"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                  />
                </svg>
              </span>
              <input
                type="text"
                placeholder="Search"
                class="px-4 py-3 rounded-md hover:bg-gray-100 lg:max-w-sm md:py-2 md:flex-1 focus:outline-none md:focus:bg-gray-100 md:focus:shadow md:focus:border"
              />
            </div>

            <!-- Navbar right -->
            <div class="relative flex items-center space-x-3">
              <!-- Search button -->
              <button
                @click="isSearchBoxOpen = true"
                class="p-2 bg-gray-100 rounded-full md:hidden focus:outline-none focus:ring hover:bg-gray-200"
              >
                <svg
                  class="w-6 h-6 text-gray-500"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                  />
                </svg>
              </button>

              <!-- avatar button -->
              <div class="relative" x-data="{ isOpen: false }">
                <button @click="isOpen = !isOpen" class="p-1 bg-gray-200 rounded-full focus:outline-none focus:ring">
                  <img
                    class="object-cover w-8 h-8 rounded-full"
                    src="{!! Auth::user()->gravatar !!}"
                    alt="{!! Auth::user()->name !!}"
                  />
                </button>
                <!-- green dot -->
                <div class="absolute right-0 p-1 bg-green-400 rounded-full bottom-3 animate-ping"></div>
                <div class="absolute right-0 p-1 bg-green-400 border border-white rounded-full bottom-3"></div>

                <!-- Dropdown card -->
                <div
                  @click.away="isOpen = false"
                  x-show.transition.opacity="isOpen"
                  class="absolute mt-3 transform -translate-x-full bg-white rounded-md shadow-lg min-w-max"
                >
                  <div class="flex flex-col p-4 space-y-1 font-medium border-b">
                    <span class="text-gray-800">{!! Auth::user()->name !!}</span>
                    <span class="text-sm text-gray-400">{!! Auth::user()->email !!}</span>
                  </div>
                  <!-- <ul class="flex flex-col p-2 my-2 space-y-1">
                    <li>
                      <a href="#" class="block px-2 py-1 transition rounded-md hover:bg-gray-100">Link</a>
                    </li>
                    <li>
                      <a href="#" class="block px-2 py-1 transition rounded-md hover:bg-gray-100">Another Link</a>
                    </li>
                  </ul> -->
                  <div class="flex items-center justify-center p-4 text-blue-700 underline border-t">
                    <a href="{!! route('logout') !!}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{!! __('Logout') !!}</a>
                    <form id="logout-form" action="{!! route('logout') !!}" method="POST" style="display: none;">
                                @csrf
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </header>
        <!-- Main content -->
        <main class="flex-1 max-h-full p-5 overflow-hidden overflow-y-scroll">
        <!-- Page breadcrumb -->
        {!! isset($breadcrumb) ? $breadcrumb : '' !!}
        <!-- Page Content -->
        {!! $slot !!}
        </main>
        <!-- Main footer -->
        <footer class="flex items-center justify-between flex-shrink-0 p-4 border-t max-h-14">
          <div>{!! strtoupper(config('app.name', 'Laravel')) !!} &copy; {!! \Carbon\Carbon::now()->format('Y') !!}</div>
          <div>
            <!-- Github svg -->
            <a
              href="{!! config('app.author_url') !!}"
              target="_blank"
              class="flex items-center space-x-1"
            >
              <svg class="w-6 h-6 text-gray-400" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true">
                <path
                  fill-rule="evenodd"
                  d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z"
                ></path>
              </svg>
              <span class="hidden text-sm md:block"> by {!! config('app.author_name') !!}</span>
            </a>
          </div>
        </footer>
      </div>
    </div>
    <!-- Scripts -->
    <script type="text/javascript" src="{!! asset('js/app.js') !!}"></script>
    <script type="text/javascript">
      const setup = () => {
        return {
          loading: true,
          isSidebarOpen: false,
          toggleSidbarMenu() {
            this.isSidebarOpen = !this.isSidebarOpen
          },
          isSearchBoxOpen: false,
        }
      }

      function CopyToClipboard(value) {
        var tempInput = document.createElement("input");
        tempInput.style = "position: absolute; left: -1000px; top: -1000px";
        tempInput.value = value;
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand("copy");
        document.body.removeChild(tempInput);
      }
    </script>
    @include('notify::messages')
    @notifyJs
    </body>
</html>
