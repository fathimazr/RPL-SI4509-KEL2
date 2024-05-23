<x-app-layout>
    <div class="flex flex-col gap-6 p-6 rounded-xl bg-white mt-6">
        <div class="flex h-full items-center justify-between">
            <form class="w-[500px] rounded-full">   
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="search" id="default-search" class=" rounded-full block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Area" required />
                </div>
            </form>
            <button class="bg-[#12A2BD] hover:bg-blue-800 text-white font-bold py-2 px-4 rounded">
                <a href="/maps/on">
                    Turn on Status View
                </a>
            </button>
            
        </div>
        <div id="map" class="rounded-xl h-[600px] shadow-lg"></div>
    </div>
</x-app-layout>

<script>
    var map = L.map('map', {
        maxZoom: 20,
        minZoom: 6,
        zoomControl: false
    }).setView([-6.9861,107.6049], 13);
    
    L.control.zoom({
        position: 'bottomright'
    }).addTo(map);
    
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);
</script>

@foreach($trafo as $t)
    <script>
        L.marker([{{ $t->latitude }}, {{ $t->longitude }}]).addTo(map);
    </script>
@endforeach