<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html lang = "en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
       /* body {
            height: 100vh;
            width: 100vw;
            display: grid;  
            grid-template-columns: 0.154fr 1fr;
            grid-template-rows: 0.109fr 1fr;
            margin: 0;
            padding: 0;
            overflow: auto;
            font-family : inter;
        }  */

        /* .topbar-placeholder {
            background-color: white; 
            grid-column: 2 / 3;
            grid-row: 1 / 2;
            margin: 0;
            z-index: 1;
            position: sticky;
            top: 0;
        }

        .sidebar-placeholder {
            background-color: #12A2BD; 
            grid-column: 1 / 2;
            grid-row: 1 / 3;
            margin: 0;
            padding: 10px;
            display: grid;
            vertical-align: top;
            height: 100vh;
            overflow: auto;
        } */

        .main {
            background-color: #E5E7EB;
            display: grid;
            grid-template-columns: 0.044fr 0.912fr 0.044fr;
            grid-template-rows: 0.032fr auto 1fr;
            gap: 0px;
            overflow-y: auto; 
            width: 100%;

        }

        .form-title {
            font-size: 24px; 
            color: #333;
            font-weight: 600;
            grid-column: 2 / 3;
            grid-row: 2 / 3;
            margin-top: 20px;
            margin-bottom: 10px;
        }

        .form-header {
            background-color: #12A2BD;
            grid-column: 2 / 3;
            grid-row: 3 / 4;
            margin: 0px;
            padding: 0px; 
            display: flex;
            align-items: center;
            padding: 5px;
        }

        .form-header-title {
            margin-left: 9px;
            font-size: 20px;
            color: white;
            font-weight: 500;
            
        }

        .form-header-icon {
            margin-left: 14px;
            padding: 1px;
        }

        .form-container {
            background-color: white;
            grid-column: 2 / 3;
            grid-row: 4 / 5;
            margin: 0px; 
            padding: 0px; 
            gap: 10px;
            overflow-y: auto; 
        }

        .form-group {
            margin-top: 45px; 
            margin-bottom: 45px;
            margin-right: 49px;
            display: grid;
            align-items: left;
            grid-template-columns: 1fr 4fr;
        }

        .form-group label {
            grid-column: 1 / 2;
            font-weight: 500;
            font-size: 20;
            text-align: left;
            margin-left: 49px; 
            display: inline-block; 
            width: 120px; 
        }
        
        .form-group select {
            width: 100%;
        }
        
        .form-container .row {
                display: flex;
                justify-content: flex-end;
                margin-top: 20px;
                margin-bottom: 60px;
                margin-right: 49px;
            }

        .form-container .row input[type="submit"],
        .form-container .row button {
            background-color: #12A2BD;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-left: 10px;
            font-size: 20;
            font-weight: 500;
        }

        .form-container .row input[type="submit"]:hover,
        .form-container .row button:hover {
            background-color: #15677B;
        }

    .custom-swal-container {
        backdrop-filter: blur(2px);
        background: rgba(0,0,0,0) !important;
        width: 1fr;
        height: 1fr;
        padding: none;
    }

    .custom-swal-title {
        font-size: 40px;
        font-weight: 700;
        color: #000000;
        margin-top: 2px;
    }

    .custom-swal-text {
        font-size: 33px;
        color: #000000;
        font-weight: 500;
    }

    .custom-swal-discard-button, .custom-swal-cancel-button {
        border-radius: 4px;
        padding: 10px 20px;
        font-size: 33px;
        font-weight: 500;
        cursor: pointer;
        margin: 10px;
    }

    .custom-swal-cancel-button {
        background-color: #000000 !important;
        color: white !important;
        border: 2px solid black !important;
    }

    .custom-swal-discard-button {
        background-color: white !important;
        color: black !important;
        border: 2px solid black !important;
    }

    .swal2-actions {
        display: flex;
        flex-direction: row-reverse; 
    }
    </style>
</head>
<!-- <body> -->
<!-- <div class="topbar-placeholder">
</div>
<div class="sidebar-placeholder"> 
</div> -->
<x-app-layout>
    <div class="main">
        <h1 class="form-title">UPDATE PERFORMANCE DATA</h1>
        <div class="form-header">
            <img class = "form-header-icon" src = "{{ asset('img/Form.png') }}" alt = "Icon" width = "30px">
            <h1 class="form-header-title">Filling Form</h1>
        </div>
        <div class="form-container">
        <!-- tambahin action ke route utk store data -->
        <form id="form" action="{{ route('trafo-performance-store', ['id' => $trafo->id]) }}" method="POST">
                @csrf
                <input type="hidden" name="trafo_id" value="{{ $trafo->id }}">
                <div class="form-group">
                    <label for="ID">Voltage</label>
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="ID" name="voltage" type="text" placeholder="Please fill your trafo’s voltage (in kVA)" required>
                </div>
                <div class="form-group">
                    <label for="brand">Current</label>
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="ID" name="current" type="text" placeholder="Please fill your trafo’s current" required>
                </div>
                <div class="form-group">
                    <label for="city">Temperature</label>
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="ID" name="temperature" type="text" placeholder="Please fill your trafo’s temperature" required>
                </div>
                <div class="form-group">
                    <label for="city">Blackout Status</label>
                    <select class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="phase" name="blackout_status" placeholder="" required>
                        <option selected>Pick an Option</option>
                        <option value="Active">Active</option>
                        <option value="Blackout">Blackout</option>
                    </select>
                </div>
                <!-- New Fields -->
                <div class="form-group">
                    <label for="active_power">Active Power</label>
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="active_power" name="active_power" type="text" placeholder="Active Power (W)">
                </div>
                <div class="form-group">
                    <label for="reactive_power">Reactive Power</label>
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="reactive_power" name="reactive_power" type="text" placeholder="Reactive Power (VAR)">
                </div>
                <div class="form-group">
                    <label for="apparent_power">Apparent Power</label>
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="apparent_power" name="apparent_power" type="text" placeholder="Apparent Power (VA)">
                </div>
                <div class="form-group">
                    <label for="voltage_thd">Voltage THD</label>
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="voltage_thd" name="voltage_thd" type="text" placeholder="Voltage THD (%)">
                </div>
                <div class="form-group">
                    <label for="current_thd">Current THD</label>
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="current_thd" name="current_thd" type="text" placeholder="Current THD (%)">
                </div>
                <div class="form-group">
                    <label for="total_power_losses">Total Power Losses</label>
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="total_power_losses" name="total_power_losses" type="text" placeholder="Total Power Losses (W)">
                </div>
                <div class="form-group">
                    <label for="power_factor">Power Factor</label>
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="power_factor" name="power_factor" type="text" placeholder="Power Factor">
                </div>
                <div class="form-group">
                    <label for="frequency">Frequency</label>
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="frequency" name="frequency" type="text" placeholder="Frequency (Hz)">
                </div>
                <div class="form-group">
                    <label for="pressure">Pressure</label>
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="pressure" name="pressure" type="text" placeholder="Pressure (Pa or bar)">
                </div>
                <div class="form-group">
                    <label for="k_factor">K-Factor</label>
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="k_factor" name="k_factor" type="text" placeholder="K-Factor">
                </div>
                <div class="form-group">
                    <label for="individual_harmonics">Individual Harmonics</label>
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="individual_harmonics" name="individual_harmonics" type="text" placeholder="Individual Harmonics (%)">
                </div>
                <div class="form-group">
                    <label for="tripplen_harmonics">Tripplen Harmonics</label>
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="tripplen_harmonics" name="tripplen_harmonics" type="text" placeholder="Tripplen Harmonics (%)">
                </div>
                <div class="form-group">
                    <label for="power_losses">Power Losses</label>
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="power_losses" name="power_losses" type="text" placeholder="Power Losses (W)">
                </div>
                <div class="form-group">
                    <label for="oil_pressure">Oil Pressure</label>
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="oil_pressure" name="oil_pressure" type="text" placeholder="Oil Pressure (Pa or bar)">
                </div>
                <div class="form-group">
                    <label for="oil_temperature">Oil Temperature</label>
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="oil_temperature" name="oil_temperature" type="text" placeholder="Oil Temperature (°C)">
                </div>
                <div class="row">
                    <button id="discardButton" type="button">Cancel</button>
                    <button id="saveButton" type="button">Save</button>
                </div>
            </form>
            </div>
            <script>

        document.getElementById('discardButton').addEventListener('click', function() {
        Swal.fire({
            width:'0.52fr',
            height: '0.386fr',
            title: "Discard Changes?", 
            text: 'Are you sure you want to discard your changes?',            
            showCancelButton: true,
            cancelButtonText: 'No, Cancel',
            confirmButtonText: 'Yes, Discard',
            b: 'black',
            customClass: {
                title: 'custom-swal-title',
                text: 'custom-swal-text',
                confirmButton: 'custom-swal-discard-button',
                cancelButton: 'custom-swal-cancel-button',
                container: 'custom-swal-container',
            }
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('trafo-data') }}";
            } else {
                console.log('Cancelled');
            }
        })
    });

    document.getElementById('saveButton').addEventListener('click', function() {
        Swal.fire({
            width:'0.52fr',
            height: '0.386fr',
            title: "Save Changes?", 
            text: 'Are you sure you want to save your changes?',            
            showCancelButton: true,
            cancelButtonText: 'No, Cancel',
            confirmButtonText: 'Yes, Save',
            b: 'black',
            customClass: {
                title: 'custom-swal-title',
                text: 'custom-swal-text',
                confirmButton: 'custom-swal-discard-button',
                cancelButton: 'custom-swal-cancel-button',
                container: 'custom-swal-container',
            }
        }).then((result) => {
            if (result.isConfirmed) {
                // masukin function utk store data
                document.getElementById('form').submit(); 
            } else {
                console.log('Cancelled');
            }
        })
    });
</script>
</x-app-layout>
<!-- </body> -->
</html>