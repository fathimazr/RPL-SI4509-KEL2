<!DOCTYPE html>
<html lang lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html lang="en">
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

        .form-header {
            background-color: #12A2BD;
            grid-column: 2 / 3;
            grid-row: 3 / 4;
            margin: 0px; /* Adjust margin as needed */
            padding: 0px; /* Add padding as needed */
            display: flex;
            align-items: center;
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
            margin: 0px; /* Adjust margin as needed */
            padding: 0px; /* Add padding as needed */
            gap: 10px;
            overflow-y: auto; /* Enable vertical scrolling */
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
            width: 110px; 
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
            /* display: inherit; */
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
<x-app-layout>
    <div class="main">
        <h1 class="form-title">REGISTER NEW USER</h1>
        <div class="form-header">
            <img class = "form-header-icon" src = "img/Form.png" alt = "Icon" width = "30px">
            <h1 class="form-header-title">Filling Form</h1>
        </div>
        <div class="form-container">
        <!-- tambahin action ke route utk store data -->
        <form id="form" action="" method="POST"> 
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="employeeID">Employee ID</label>
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="employeeID" name = "employeeID" type="text" placeholder="Please fill with your employee ID">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="email" name = "email" type="text" placeholder="Please fill with your email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="pass_log_id" name="password" type="password" placeholder="Please fill with your password">
                    <span toggle="#pass_log_id" class="fa fa-fw fa-eye field_icon toggle-password"></span>
                </div>

                <div class="form-group">
                    <label for="phase">Role</label>
                    <select class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="phase" name = "phase" placeholder="">
                        <option value="" disabled selected>Select your role</option>
                        <option value="1">Manajer</option>
                        <option value="2">Tim Teknis</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="phase">Branch Office</label>
                    <select class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="phase" name = "phase" placeholder="">
                        <option value="" disabled selected>Select your branch office</option>
                        <option value="1">Branch Office 1</option>
                        <option value="2">Branch Office 2</option>
                        <option value="1">Branch Office 3</option>
                        <option value="2">Branch Office 4</option>
                        <option value="1">Branch Office 5</option>
                        <option value="2">Branch Office 6</option>
                        <option value="2">Branch Office 7</option>
                    </select>
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