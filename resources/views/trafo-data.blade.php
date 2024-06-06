<x-app-layout>
    <div class="main" style="display: grid; overflow-y: auto; max-width: 100%;">
        <div class="w-full h-full flex flex-col px-18 py-10 gap-5">
            <div class="self-end">
                @if(auth()->check() && auth()->user()->role == 'admin')
                <div class="">
                    <a href="admin/trafo-register">
                        <button
                            class="w-[225px] bg-[#2264E5] hover:bg-lime-500 text-white shadow-md font-bold py-2 px-4 rounded">
                            Add New Transformator
                        </button>
                </div>
                @else
                <div class="">
                    <a href="/trafo-register">
                        <button
                            class="w-[225px] bg-[#2264E5] hover:bg-lime-500 text-white shadow-md font-bold py-2 px-4 rounded">
                            Add New Transformator
                        </button>
                </div>
                @endif

                </a>
            </div>
        </div>
        <div class="bg-white overflow-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-center rtl:text-right text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                        <th scope="col" class="px-6 py-3 w-[10px]">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            CAPACITY
                        </th>
                        <th scope="col" class="px-6 py-3">
                            CITY
                        </th>
                        <th scope="col" class="px-6 py-3">
                            LATITUDE
                        </th>
                        <th scope="col" class="px-6 py-3">
                            LONGITUDE
                        </th>
                        <th scope="col" class="px-6 py-3">
                            STATUS
                        </th>
                        <th scope="col" class="px-6 py-3">
                            PERFORMANCE
                        </th>
                        <th scope="col" class="px-6 py-3">
                            ACTIONS
                        </th>
                    </tr>
                </thead>
                @foreach ($trafo as $t)
                <tbody>
                        <!-- <td class="px-6 py-4">
                            {{$t->brand}}
                        </td> -->
                        <td class="px-6 py-4">
                            {{$t->trafo_id}}
                        </td>
                        <td class="px-6 py-4">
                            {{$t->capacity}}
                        </td>
                        <!-- <td class="px-6 py-4">
                            {{$t->phase}}
                        </td> -->
                        <td class="px-6 py-4">
                            {{$t->city}}
                        </td>
                        <td class="px-6 py-4">
                            {{$t->latitude}}
                        </td>
                        <td class="px-6 py-4">
                            {{$t->longitude}}
                        </td>
                        <!-- <td class="px-6 py-4">
                            {{$t->capacity}} kVA
                        </td> -->
                        <td class="px-6 py-4">
                        @if($latestPerformance = $t->trafo_performance()->latest()->first())
                        @if ($latestPerformance->status === 'Normal')
                            <div class="px-4 rounded-full bg-green-100">
                                <p class=" text-green-700 font-bold">Normal</p>
                            </div>
                        @elseif ($latestPerformance->status === 'Warning')
                            <div class="px-4 rounded-full bg-yellow-100">
                                <p class=" text-yellow-700 font-bold">Warning</p>
                            </div>
                        @elseif($latestPerformance->status === 'Error')
                            <div class="px-4 rounded-full bg-red-100">
                                <p class=" text-red-700 font-bold">Error</p>
                            </div>
                        @else
                        empty
                        @endif
                        @else
                        <div class="px-4 rounded-full bg-gray-100">
                            <p class="text-gray-600 font-bold">Empty</p>
                        </div>
                        @endif                       
                        </td>
                        <!-- <td class="px-6 py-4">
                            {{$t->installation_date}}
                        </td> -->
                        <td class="px-6 py-4">
                            @if($t->trafo_performance)
                            <div class="px-4 rounded-full bg-green-100">
                                <p class=" text-green-700 font-bold">Complete</p>
                            @else
                            <div class="px-4 rounded-full bg-gray-100">
                                <p class="text-gray-600 font-bold">Empty</p>
                            </div>
                            @endif
                        </td>
                        @if(auth()->check() && auth()->user()->role == 'admin')
                        <td class="px-6 py-4 flex gap-7 items-center">
                            <a href="admin/trafo/{{$t->id}}"
                                class="font-bold text-blue-800 text-decoration-none">View</a>
                                <a href="trafo/performance/{{ $t->id }}"
                                    class="font-bold text-blue-800 text-decoration-none">Edit Performance</a>
                                <form id="deleteForm" action="{{route('trafo.destroy', $t->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="#" class="font-bold text-red-700 text-decoration-none" data-url="{{ route('trafo.destroy', $t->id) }}" onclick="confirmation(event)">Delete</a>
                                </form>
                        </td>
                        @else()
                        <td class="px-6 py-4 flex gap-7 items-center">
                            <a href="/trafo/{{$t->id}}"
                                class="font-bold text-blue-800 text-decoration-none">View</a>
                                <a href="/trafo/performance/{{ $t->id }}"
                                    class="font-bold text-blue-800 text-decoration-none">Edit Performance</a>
                                <form id="deleteForm" action="{{route('trafo.destroy', $t->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="#" class="font-bold text-red-700 text-decoration-none" data-url="{{ route('trafo.destroy', $t->id) }}" onclick="confirmation(event)">Delete</a>
                                </form>
                        </td>
                        @endif
                    </tr>

                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</x-app-layout>