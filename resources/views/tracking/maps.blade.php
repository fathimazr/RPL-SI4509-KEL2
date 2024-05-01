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
    
    @foreach($trafo as $t)
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

        // pinpoints maps trafo
        var marker = L.marker([{{ $t->latitude }}, {{ $t->longitude }}]).addTo(map);
        
        // var marker = L.marker([-6.966776, 107.656769]).addTo(map);
        
        // var marker = L.marker([-6.962316, 107.639987]).addTo(map);
        
        // var marker = L.marker([-6.962190, 107.572324]).addTo(map);
        
        // var marker = L.marker([-6.977094, 107.612429]).addTo(map);
        
        // var marker = L.marker([-6.9922,107.5457]).addTo(map);
        
        // var marker = L.marker([-7.0116,107.5905]).addTo(map);
        
        // var marker = L.marker([-7.0106,107.6640]).addTo(map);
        </script>
        @endforeach
</x-app-layout>