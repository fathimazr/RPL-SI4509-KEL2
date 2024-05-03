<x-app-layout>
    <div class="flex flex-col gap-6 p-6 rounded-xl bg-white mt-6">
        <div class="self-end">
            <button class="bg-[#12A2BD] hover:bg-blue-800 text-white font-bold py-2 px-4 rounded">
                <a href="/trafo">
                    Turn on Status View
                </a>
            </button>
        </div>
        <div id="map" class=" rounded-xl h-[500px] shadow-lg"></div>
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

        // pinpoints maps trafo

        var marker = L.marker([-7.1384470, 107.4812439]).addTo(map);

        var marker = L.marker([-6.9982514, 107.4945808]).addTo(map);
        
        var marker = L.marker([-7.0773577, 107.5866264]).addTo(map);

        var marker = L.marker([-7.0924224, 107.5839274]).addTo(map);

        var marker = L.marker([-7.1210729,107.5817180]).addTo(map);

    </script>
</x-app-layout>