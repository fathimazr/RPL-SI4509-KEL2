<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>

        .main {
            background-color: #E5E7EB;
            display: grid;
            grid-template-columns: 0.044fr 0.912fr 0.044fr;
            grid-template-rows: 0.0324074fr 0.05fr 0.0589815fr 1fr;
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
<x-app-layout>
    <div class="main">
        <h1 class="form-title">ADD MAINTENANCE DATA</h1>
        <div class="form-header">
            <img class = "form-header-icon" src = "img/form.png" alt = "Icon" width = "30px">
            <h1 class="form-header-title">Filling Form</h1>
        </div>
        <div class="form-container">
        <!-- tambahin action ke route utk store data -->
        <form id="form" action="{{ route('maintenance.update') }}" method="POST"> 
                {{-- @method('POST') --}}
                @csrf
                <div class="form-group">
                    <label for="ID">Employee ID</label>
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="ID" name="employee_id" type="text" value="{{$data->employee_id}}">
                </div>
                <div class="form-group">
                    <label for="brand">Trafo ID</label>
                    <select class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="ID" name="trafo_id" placeholder="Please select your trafo's ID">
                    <option value="" disabled selected>Please select your trafo's ID</option>
                        <option value="1101">1101</option>
                        <option value="1102">1102</option>
                        <option value="1103">1103</option>
                        <option value="1104">1104</option>
                        <option value="1105">1105</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="maintenanceDate">Maintenance Date</label>
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="maintenanceDate" name="maintenance_date" type="date" placeholder="Please select maintenance date">
                </div>
                <div class="form-group">
                    <label for="maintenanceData">Maintenance Data</label>
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="maintenanceData" name="maintenance_data" type="text" placeholder="Describe your trafo's maintenance data">
                </div>
                <div class="row">
                    <button id="discardButton" type="button">Cancel</button>
                    <button id="saveButton" type="button">Next</button>
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
            window.location.href = "maintenance.update";
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