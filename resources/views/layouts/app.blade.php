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
        
        <script type="text/javascript">

            function confirmation(ev){
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
                  Swal.fire({
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    icon: "success"
                  });
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

        <div
        class="flex h-screen"
        :class="{ 'overflow-hidden': isSideMenuOpen }"
        >
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