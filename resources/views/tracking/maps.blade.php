<x-app-layout>
    <div class="flex flex-col gap-6 p-6 rounded-xl bg-white mt-6">
        <div class="self-end">
            <button class="bg-[#12A2BD] hover:bg-blue-800 text-white font-bold py-2 px-4 rounded">
                <a href="/trafo">
                    Turn on Status View
                </a>
            </button>
        </div>
        <div id="map" class=" rounded-xl h-[600px] shadow-lg"></div>
    </div>
    
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
        
        @foreach($trafo as $t)
        // pinpoints maps trafo
        var marker = L.marker([{{ $t->latitude }}, {{ $t->longitude }}]).addTo(map);
        
        
        </script>
        @endforeach
</x-app-layout>