<x-app-layout>
    <div class="main" style="display: grid; overflow-y: auto; max-width: 100%; margin-left: 50px">
        
        <div class="w-full h-full flex flex-col px-18 py-10 gap-5 items-center justify-between">
        
                <div class="flex items-center gap-5 justify-between w-full">
                    <!-- <div class=""> -->
                    <h1 class="form-title" style = "font-size: 24px; font-weight: 600; margin-right: 10px;">MAINTENANCE LOG</h1>
                        <a href="/add-maintenance">
                            <button
                                class="w-[225px] bg-[#2264E5] hover:bg-lime-500 text-white shadow-md font-bold py-2 px-4 rounded mr-[50px]">
                                Add Maintenance Data
                            </button>
                        </a>
                    <!-- </div> -->
                </div>
        </div>
        <div class="bg-white overflow-auto shadow-md sm:rounded-lg" style = "margin-right: 50px">
            <table class="w-full text-sm text-center rtl:text-right text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 " style = "font-size: 15px;">
                    <tr>
                        <th scope="col" class="px-6 py-3" style = "padding-right: 30px; padding-left: 30px;">
                            DATE
                        </th>
                        <th scope="col" class="px-6 py-3" style = "padding-right: 30px; padding-left: 30px;">
                            TRAFO ID
                        </th>
                        <th scope="col" class="px-6 py-3" style = "padding-right: 30px; padding-left: 30px;">
                            EMPLOYEE ID
                        </th>
                        <th scope="col" class="px-6 py-3" style = "padding-right: 30px; padding-left: 30px;">
                            UPDATE
                        </th>
                        <th scope="col" class="px-6 py-3" style = "padding-right: 30px; padding-left: 30px;">
                            ACTIONS
                        </th>
                    </tr>
                </thead>
                    <tbody>
                    @foreach ($maintenance as $m)
                        
                    <tr class="odd:bg-white  even:bg-gray-50  border-b ">
                        <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap ">
                                {{ $m->maintenance_date }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $m->trafo_id }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $m->employee_id }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $m->maintenance_data }}
                            </td>
                            <td class="px-6 py-4 flex justify-center gap-7 items-center">
                                <a href="/trafo/{{ $m->id }}" class="font-bold text-blue-800 text-decoration-none underline">View Data</a>
                               
                            </td>
                        </tr>
                        
                        @endforeach

                    </tbody>
                
            </table>
        </div>
                
    </div> 
</x-app-layout>