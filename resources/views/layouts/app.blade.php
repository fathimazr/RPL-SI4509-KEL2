<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
  
  <!-- script chart -->
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

  {{-- Maps --}}
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
  integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
  crossorigin=""/>

  {{-- Leaflet Script --}}
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

  {{-- JQuery Script --}}
  <script src="{{ mix('js/app.js') }}" defer></script>

  <style>
    img.redchange { filter: hue-rotate(140deg); }
    img.greenchange { filter: hue-rotate(250deg); }
    img.yellowchange { filter: hue-rotate(190deg); }
    /* #map { height: 550px; } */
  </style>
  
  {{-- Leaflet CSS --}}
  <style>
    img.huechange { filter: hue-rotate(250deg); }
    /* #map { height: 550px; } */
  </style>

  <script type="text/javascript">
            function confirmation(ev) {
              ev.preventDefault();
              var deleteUrl = ev.currentTarget.getAttribute('data-url');
              
              Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
              }).then((result) => {
                if (result.isConfirmed) {
                  // Get CSRF token
                  var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                  
                  // Include CSRF token in request headers
                  fetch(deleteUrl, {
                    method: 'DELETE',
                    headers: {
                      'X-CSRF-TOKEN': csrfToken,
                      'Content-Type': 'application/json', // Set content type if needed
                      'Accept': 'application/json' // Set accept type if needed
                    }
                  }).then(response => {
                    Swal.fire(
                       'Deleted!',
                       'Your file has been deleted.',
                       'success'
                     ).then(function(){
                        window.location.reload();
                     });
                  });
                  // .then(response => {
                  //   if (!response.ok) {
                  //     throw new Error('Network response was not ok');
                  //   }
                  //   return response.json();
                  // })
                  // .then(data => {
                  //   // Handle the response data here
                  //   // For example, show a success message
                  //   Swal.fire(
                  //     'Deleted!',
                  //     'Your file has been deleted.',
                  //     'success'
                  //   );
                  //   // You may want to reload the page or update the UI after successful deletion
                  //   // window.location.reload(); // Uncomment this line to reload the page
                  // })
                  // .catch(error => {
                  //   // Handle errors here
                  //   Swal.fire(
                  //     'Failed to delete data',
                  //     error.message,
                  //     'error'
                  //   );
                  // });
                }
              });
            }

            
            function cancelconfirmation(ev){
                ev.preventDefault();
                var discard=ev.currentTarget.getAttribute('href');
               
                Swal.fire({
                  title: "Discard Changes?",
                  text: "Are you sure you want to discard your changes?",
                  showDenyButton: true,
                  confirmButtonText: "Yes, Discard",
                  denyButtonText: No, Cancel
                }).then((result) => {
                  if (result.isConfirmed) {
                    Swal.fire("Discard Succeed!", "", "success");
                  } else if (result.isDenied) {
                    Swal.fire("Changes are not saved", "", "info");
                  }
                });
            }

            function saveconfirmation(ev){
                ev.preventDefault();
                var link=ev.currentTarget.getAttribute('href');
                
                Swal.fire({
                  title: "Save Changes?",
                  text: "Are you sure you want to save your changes?",
                  showDenyButton: true,
                  confirmButtonText: "Yes, Save",
                  denyButtonText: No, Cancel
                }).then((result) => {
                    if (result.isConfirmed) {
                    Swal.fire("Saved!", "", "success");
                  } else if (result.isDenied) {
                    Swal.fire("Changes are not saved", "", "info");
                  }
                });
            }
  </script>
  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">

  <div class="flex h-screen" :class="{ 'overflow-hidden': isSideMenuOpen }">
    <!-- Desktop sidebar -->
    @include('layouts.navigation')

    <div class="flex flex-col  w-full bg-gray-200">
      @include('layouts.nav-main')
      <main class="w-full h-full overflow-y-auto">
        <div class="container px-6 mx-auto">
          @if (isset($header))
          <h2 class="my-6 text-xl font-semibold text-gray-700">
            {{ $header }}
          </h2>
          @endif
          {{ $slot }}
        </div>
      </main>
    </div>
  </div>
</body>

</html>