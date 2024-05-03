<x-app-layout>
    <div class="flex flex-col gap-6 p-6 rounded-xl bg-white mt-6">
        <div class="self-end">
            <button class="bg-[#12A2BD] hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                <a href="/maps">
                    Turn off Status View
                </a>
            </button>
        </div>
        <div id="map" class=" rounded-xl h-[500px] shadow-lg"></div>
    </div>

    {{-- Leaflet Script Set --}}
    <script>
        var map = L.map('map', {
            maxZoom: 20,
            minZoom: 6,
            zoomControl: false
        }).setView([-7.0610,107.5000], 12);
        L.control.zoom({
            position: 'bottomright'
        }).addTo(map);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
          maxZoom: 19,
          attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        var marker = L.marker([-7.1384470, 107.4812439]).addTo(map);
        marker._icon.classList.add("redchange");
        marker.openPopup().bindPopup(`
            Trafo ID    : 1101<br>
            City        : CIPAGALO<br>
            Lat         : -7.1384470<br>
            Long        : 107.4812439<br>
            Status      : ERROR<br>
            <br>
            <a href="/trafo/view-performance">View Data</a>
        `);

        var marker = L.marker([-6.9982514, 107.4945808]).addTo(map);
        marker._icon.classList.add("redchange");
        marker.openPopup().bindPopup(`
            Trafo ID    : 1102<br>
            City        : MARGAHAYU<br>
            Lat         : -6.9982514<br>
            Long        : 107.4945808<br>
            Status      : ERROR<br>
            <br>
            <a href="/trafo/view-performance">View Data</a>
        `);
        var marker = L.marker([-7.0773577, 107.5866264]).addTo(map);
        marker._icon.classList.add("yellowchange");
        marker.openPopup().bindPopup(`
            Trafo ID    : 1103<br>
            City        : DAYEUHKOLOT<br>
            Lat         : -7.0773577<br>
            Long        : 107.5866264<br>
            Status      : WARNING<br>
            <br>
            <a href="/trafo/view-performance">View Data</a>
        `);
        var marker = L.marker([-7.0924224,107.5839274]).addTo(map);
        marker._icon.classList.add("greenchange");
        marker.openPopup().bindPopup(`
            Trafo ID    : 1104<br>
            City        : KOPO<br>
            Lat         : -7.0924224<br>
            Long        : 107.5839274<br>
            Status      : NORMAL<br>
            <br>
            <a href="/trafo/view-performance">View Data</a>
        `);
        var marker = L.marker([-7.1210729,107.5817180]).addTo(map);
        marker._icon.classList.add("yellowchange");
        marker.openPopup().bindPopup(`
            Trafo ID    : 1105<br>
            City        : SUKASARI<br>
            Lat         : -7.1210729<br>
            Long        : 107.5817180<br>
            Status      : WARNING<br>
            <br>
            <a href="/trafo/view-performance">View Data</a>
        `);
        
    </script>
    
</x-app-layout>