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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script type="text/javascript">
            
            // Script Pop Up Message Discard Changes
            function cancelconfirmation(ev){
                ev.preventDefault();
                var discard=ev.currentTarget.getAttribute('href');
                
                console.log(discard);
                Swal.fire({
                  title: "Discard Changes?",
                  text: "Are you sure you want to discard your changes?",
                  showDenyButton: true,
                  confirmButtonText: "Yes, Discard",
                  denyButtonText: No, Cancel
                }).then((result) => {
                  /* Read more about isConfirmed, isDenied below */
                  if (result.isConfirmed) {
                    Swal.fire("Discard Succeed!", "", "success");
                  } else if (result.isDenied) {
                    Swal.fire("Changes are not saved", "", "info");
                  }
                });
            }

            // Script Pop Up Message Save Changes
            function saveconfirmation(ev){
                ev.preventDefault();
                var link=ev.currentTarget.getAttribute('href');
                
                console.log(link);
                Swal.fire({
                  title: "Save Changes?",
                  text: "Are you sure you want to save your changes?",
                  showDenyButton: true,
                  confirmButtonText: "Yes, Save",
                  denyButtonText: No, Cancel
                }).then((result) => {
                  /* Read more about isConfirmed, isDenied below */
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