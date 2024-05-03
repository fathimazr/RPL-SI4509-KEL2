<x-app-layout>
    <div class="main" style="display: grid; overflow-y: auto; max-width: 100%; margin-left: 50px">
        <div class="w-full h-full flex flex-col px-18 py-10 gap-5 ">
            <h1 class="form-title" style = "font-size: 24px; font-weight: 600;">NOTIFICATION LOG</h1>
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
                            MESSAGE NOTIFICATION
                        </th>
                        <th scope="col" class="px-6 py-3" style = "padding-right: 30px; padding-left: 30px;">
                            ACTIONS
                        </th>
                    </tr>
                </thead>
                    <tbody>
                    <tr class="odd:bg-white  even:bg-gray-50  border-b ">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap ">
                                01/02/2024
                            </th>
                            <td class="px-6 py-4">
                                1101
                            </td>
                            <td class="px-6 py-4">
                                There is an error on your transformator
                            </td>
                            <td class="px-6 py-4 flex justify-center gap-7 items-center">
                                <a href="/view-performance" class="font-bold text-blue-800 text-decoration-none underline">View Data</a>
                                <a href="#" class="font-bold text-blue-800 text-decoration-none underline" >Mark as Read</a>
                               
                            </td>
                        </tr>

                        <tr class="odd:bg-white even:bg-gray-50  border-b ">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap ">
                                03/02/2024
                            </th>
                            <td class="px-6 py-4">
                                1111
                            </td>
                            <td class="px-6 py-4">
                                There is an error on your transformator
                            </td>
                            
                            <td class="px-6 py-4 flex justify-center gap-7 items-center">
                                <a href="/view-performance" class="font-bold text-blue-800 text-decoration-none underline">View Data</a>
                                <a href="#" class="font-bold text-blue-800 text-decoration-none underline" >Mark as Read</a>
                            </td>
                        </tr>

                        <tr class="odd:bg-white  even:bg-gray-50  border-b ">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap ">
                                05/02/2024
                            </th>
                            <td class="px-6 py-4">
                                1114
                            </td>
                            <td class="px-6 py-4">
                                There is a warning on your transformator
                            </td>
                            <td class="px-6 py-4 flex justify-center  gap-7 items-center">
                                <a href="/view-performance" class="font-bold text-blue-800 text-decoration-none underline">View Data</a>
                                <a href="#" class="font-bold text-blue-800 text-decoration-none underline">Mark as Read</a>
                               
                            </td>
                        </tr>
                    </tbody>
                
            </table>
        </div>
                
    </div> 
</x-app-layout>