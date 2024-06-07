<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html lang=en>
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
            grid-column: 2 / 3;
            grid-row: 2 / 3;
            display: grid;
            grid-template-columns: 0.044fr 0.912fr 0.044fr;
            grid-template-rows: 0.0324074fr 0.05fr 0.0589815fr 1fr;
            gap: 0px;
            overflow-y: auto; /* Enable vertical scrolling */
            width: 100%;

        }

        .form-title {
            font-size: 24px; /* Heading font size */
            color: #333; /* Heading text color */
            font-weight: 600;
            grid-column: 2 / 3;
            grid-row: 2 / 3;
        }

        .form-container {
            background-color: white;
            grid-column: 2 / 3;
            grid-row: 3 / 5;
            margin: 0px; /* Adjust margin as needed */
            padding: 0px; /* Add padding as needed */
            gap: 10px;
            overflow-y: auto; 
            position: relative;
        }

        .form-container::after {
           content: '';
           position: absolute;
           top: 0;
           bottom: 0;
           right: 0; /* Adjust the distance of the line from the right side */
           width: 30px; /* Width of the line */
           background-color: #12A2BD; /* Color of the line */
           height: auto;
        }

        .form-group {
            margin-top: 45px; /* Add space between each line */
            margin-bottom: 45px;
            margin-right: 49px;
            display: grid;
            align-items: center;
            grid-template-columns: 1fr 4fr;
        }

        .form-group label {
            grid-column: 1 / 2;
            font-weight: 500;
            font-size: 20;
            text-align: left;
            margin-left: 49px; /* Adjust as needed */
            display: inline-block; /* Display label as inline-block */
            width: 100px; 
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

        .form-container .row button:hover {
            background-color: #15677B;
        }

        .custom-swal-container {
            display: inherit;
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

        .swal2-popup {
            top: 50% !important;
            left: 50% !important;
            transform: translate(-50%, -50%) !important;
        }

    </style>
</head>
<!-- <body> -->
    
<x-app-layout>
    <div class="main">
        <h1 class="form-title">EDIT PROFILE</h1>
        <div class="form-container">
            <!-- tambahin action ke route utk store data -->
        <form id="form" action="{{ route('profile.update')  }}" method="POST" enctype="application/x-www-form-urlencoded"> 
            @method('patch')    
            @csrf
                <div class="img" style=" display: flex; justify-content: center; align-items: center;">
                    <img src="img/blank-profile.jpg" class="rounded-circle" style="width: 150px; margin-bottom: 10px; object-fit: cover; margin-top: 50px; border-radius: 50%;">
                </div>
                <div class="form-group">
                    <label for="fullname">Full Name</label>
                    {{-- <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="name" name = "name" type="text" placeholder="Muhammad Azzam"> --}}
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="name" name = "name" type="text" value="{{ $data->name }}">
                </div>
                <div class="form-group">
                    <label for="employeeID">Employee ID</label>
                    {{-- <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="employeeID" name = "employeeID" type="text" placeholder="199901172005072016" > --}}
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="employee_id" name = "employee_id" type="text" value="{{ $data->employee_id }}" disabled>
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="role" name = "role" type="text" value="{{ $data->role }}" disabled>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="email" name = "email" type="text" value="{{ $data->email }}" disabled>
                </div>
                <div class="form-group">
                    <label for="phase">Branch Office</label>
                    
                    <select class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="branch_office" name = "branch_office" value="{{ $data->branch_office }}">
                        @foreach($branchOffices as $id => $value)
                            <option value="{{ $value }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="pass_log_id" name="password" type="password" placeholder="Please fill with your password">
                    <span toggle="#pass_log_id" class="fa fa-fw fa-eye field_icon toggle-password"></span>
                </div>
                <div class="row">
                    <button id = "discardButton" type="button">Cancel</button>
                    <button id = "submitButton" type="button">Save</button>
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
                // Masukin function untuk redirect ke dashboard 
            } else {
                console.log('Cancelled');
            }
        })
    });

    document.getElementById('submitButton').addEventListener('click', function() {
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
    $("body").on('click','.toggle-password',function(){
        $(this).toggleClass("fa-eye fa-eye-slash");

        var input = $($(this).attr("toggle"));
        if (input.attr("type") === "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
</script>
</x-app-layout>
<!-- </body> -->
</html>

