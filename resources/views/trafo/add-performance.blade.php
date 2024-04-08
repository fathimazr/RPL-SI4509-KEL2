<x-app-layout>
    <div class="w-full h-full flex flex-col gap-2 p-10 bg-slate-200">
        <h1 class=" ml-4 font-extrabold text-[24px]">UPDATE PERFORMANCE DATA</h1>
        
        <div class="h-[700px] bg-white rounded-xl shadow-lg p-3 flex flex-col gap-3">
            <div class="bg-[#12A2BD] shadow-md rounded-xl w-full h-[60px] flex px-9 py-2 items-center gap-4">
                <div class="self-center">
                    <img aria-hidden="true" class="w-full h-full"
                    src="{{ asset('images/form-add-performance.png') }}"
                    alt=""/>
                </div>
                <h1 class="text-[#FFFFFF] font-bold text-[20px]">Filling Form</h1>
            </div>

            <div class="flex flex-col gap-5 justify-between">
                <div class="px-10 py-5 flex gap-10 justify-between">
                    <div class="self-center flex gap-2">
                        <label class="block text-black font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                          Voltage
                        </label>
                    </div>
                    <div class="self-center w-[850px]">
                        <input class=" appearance-none border-3 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text" value="Please fill your trafo’s voltage (in kVA)">
                    </div>
                </div>
    
                <div class="px-10 py-5 flex gap-10 justify-between">
                    <div class="self-center flex gap-2">
                        <label class="block text-black font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                          Current
                        </label>
                    </div>
                    <div class="self-center w-[850px]">
                        <input class=" appearance-none border-3 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text" value="Please fill your trafo’s current">
                    </div>
                </div>
    
                <div class="px-10 py-5 flex gap-8 justify-between">
                    <div class="self-center flex gap-2">
                        <label class="block text-black font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                          Temperature
                        </label>
                    </div>
                    <div class="self-center w-[850px]">
                        <input class=" appearance-none border-3 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text" value="Please fill your trafo’s temperature (in Celcius)">
                    </div>
                </div>

                <form class="px-10 py-5 flex gap-8 justify-between">
                    <div class="self-center flex gap-2">
                        <label for="blackout" class="block mb-1 text-black font-bold ">Blackout Status</label>
                    </div>
                    
                    <div class="self-center w-[850px]">
                        <select id="blackout" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option selected>Pick an Option</option>
                            <option value="US">Active</option>
                            <option value="CA">Blackout</option>
                          </select>
                    </div>
                </form>
            </div>

            <div class="flex gap-2 justify-end px-10">
                <div class="">
                    <button class="w-[100px] bg-white hover:bg-red-600 hover:text-white text-gray-400 shadow-lg border-0.5 font-bold py-2 px-4 rounded">
                        Cancel
                    </button>
                </div>
                <div class="">
                    <button class="w-[100px] bg-[#12A2BD] hover:bg-blue-700 text-white shadow-md font-bold py-2 px-4 rounded">
                        Save
                    </button>
                </div>
            </div>
         </div>
    </div>
</x-app-layout>