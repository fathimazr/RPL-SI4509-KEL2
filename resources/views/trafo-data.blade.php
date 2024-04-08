<x-app-layout>
    <div class="w-full h-full flex flex-col px-18 py-10 gap-5">
        <div class="self-end">
            <div class="">
                <button class="w-[225px] bg-[#2264E5] hover:bg-lime-500 text-white shadow-md font-bold py-2 px-4 rounded">
                    Add New Transformator
                </button>
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
                            BRAND
                        </th>
                        <th scope="col" class="px-6 py-3">
                            CITY
                        </th>
                        <th scope="col" class="px-6 py-3">
                            PHASE
                        </th>
                        <th scope="col" class="px-6 py-3">
                            LATITUDE
                        </th>
                        <th scope="col" class="px-6 py-3">
                            LONGITUDE
                        </th>
                        <th scope="col" class="px-6 py-3">
                            CAPACITY
                        </th>
                        <th scope="col" class="px-6 py-3">
                            STATUS
                        </th>
                        <th scope="col" class="px-6 py-3">
                            INSTALLATION DATE
                        </th>
                        <th scope="col" class="px-6 py-3">
                            PERFORMANCE
                        </th>
                        <th scope="col" class="px-6 py-3">
                            ACTIONS
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="odd:bg-white  even:bg-gray-50  border-b ">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                            1101
                        </th>
                        <td class="px-6 py-4">
                            STARLITE
                        </td>
                        <td class="px-6 py-4">
                            JAKARTA
                        </td>
                        <td class="px-6 py-4">
                            3
                        </td>
                        <td class="px-6 py-4">
                            1.043496628353671
                        </td>
                        <td class="px-6 py-4">
                            107.38636884737015
                        </td>
                        <td class="px-6 py-4">
                            200 kVA
                        </td>
                        <td class="px-6 py-4">
                            <div class="px-4 rounded-full bg-red-100">
                                <p class=" text-red-600 font-bold">Error</p>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            03-08-2023
                        </td>
                        <td class="px-6 py-4">
                            <div class="px-4 rounded-full bg-green-100">
                                <p class=" text-green-700 font-bold">Complete</p>
                            </div>
                        </td>
                        <td class="px-6 py-4 flex gap-7 items-center">
                            <a href="/view-performance" class="font-bold text-blue-800 text-decoration-none">View</a>
                            <a href="/add-performance" class="font-bold text-blue-800 text-decoration-none">Add Performance</a>
                            <a href="#" class="font-bold text-red-700 text-decoration-none">Delete</a>
                        </td>
                    </tr>
                    <tr class="odd:bg-white  even:bg-gray-50  border-b ">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                            1102
                        </th>
                        <td class="px-6 py-4">
                            STARBOY
                        </td>
                        <td class="px-6 py-4">
                            BANDUNG
                        </td>
                        <td class="px-6 py-4">
                            3
                        </td>
                        <td class="px-6 py-4">
                            1.043496628353671
                        </td>
                        <td class="px-6 py-4">
                            107.38636884737015
                        </td>
                        <td class="px-6 py-4">
                            200 kVA
                        </td>
                        <td class="px-6 py-4">
                            <div class="px-4 rounded-full bg-yellow-200">
                                <p class=" text-yellow-700 font-bold">Warning</p>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            03-08-2023
                        </td>
                        <td class="px-6 py-4">
                            <div class="px-4 rounded-full bg-green-100">
                                <p class=" text-green-700 font-bold">Complete</p>
                            </div>
                        </td>
                        <td class="px-6 py-4 flex gap-7 items-center">
                            <a href="/view-performance" class="font-bold text-blue-800 text-decoration-none">View</a>
                            <a href="/add-performance" class="font-bold text-blue-800 text-decoration-none">Add Performance</a>
                            <a href="#" class="font-bold text-red-700 text-decoration-none">Delete</a>
                        </td>
                    </tr>
                    <tr class="odd:bg-white  even:bg-gray-50  border-b ">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                            1103
                        </th>
                        <td class="px-6 py-4">
                            STARLITE
                        </td>
                        <td class="px-6 py-4">
                            JAMBI
                        </td>
                        <td class="px-6 py-4">
                            3
                        </td>
                        <td class="px-6 py-4">
                            1.043496628353671
                        </td>
                        <td class="px-6 py-4">
                            107.38636884737015
                        </td>
                        <td class="px-6 py-4">
                            200 kVA
                        </td>
                        <td class="px-6 py-4">
                            <div class="px-4 rounded-full bg-green-100">
                                <p class=" text-green-700 font-bold">Normal</p>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            03-08-2023
                        </td>
                        <td class="px-6 py-4">
                            <div class="px-4 rounded-full bg-green-100">
                                <p class=" text-green-700 font-bold">Complete</p>
                            </div>
                        </td>
                        <td class="px-6 py-4 flex gap-7 items-center">
                            <a href="/view-performance" class="font-bold text-blue-800 text-decoration-none">View</a>
                            <a href="/add-performance" class="font-bold text-blue-800 text-decoration-none">Add Performance</a>
                            <a href="#" class="font-bold text-red-700 text-decoration-none">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>