<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
       body {
            height: 100vh;
            display: grid;  
            grid-template-columns: 0.154fr 0.846fr;
            grid-template-rows: 0.109fr 1fr;
            margin: 0;
            padding: 0;
            overflow: auto;
        } 

        .topbar-placeholder {
            background-color: white; /* White color */
            grid-column: 2 / 3;
            grid-row: 1 / 2;
            margin: 0;
            z-index: 1;
            position: sticky;
            top: 0;
        }

        .sidebar-placeholder {
            background-color: #12A2BD; /* Sidebar color */
            grid-column: 1 / 2;
            grid-row: 1 / 3;
            margin: 0;
            padding: 10px;
            display: inline-block;
            vertical-align: top;
        }

        .sidebar-placeholder img {
            display: block;
            margin-bottom: 30px;
        }

        /* .sidebar-placeholder span {
            font-size: 16px;
            color: white;
            font-family: "Inter";
        } */

        .main {
            background-color: #f0f0f0;
            grid-column: 2 / 3;
            grid-row: 2 / 3;
            display: grid;
            grid-template-columns: 0.044fr 0.912fr 0.044fr;
            grid-template-rows: 0.0324074fr 0.05fr 0.0589815fr 1fr;
            gap: 0px;
            overflow-y: auto; /* Enable vertical scrolling */
            font-family: "Inter";
        }

        .form-title {
            font-size: 24px; /* Heading font size */
            color: #333; /* Heading text color */
            font-weight: 900;
            font: inter;
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
            align-items: left;
            grid-template-columns: 1fr 4fr;
        }
        .form-group label {
            grid-column: 1 / 2;
            font-weight: 500;
            font-size: 20;
            font-family: "Inter";
            text-align: left;
            margin-left: 49px; /* Adjust as needed */
            display: inline-block; /* Display label as inline-block */
            width: 200%; 
        }
        /* .form-group input[type="text"],
        .form-group input[type="date"], */
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
/* 
        .form-container .row input[type="submit"], */
        .form-container .row button {
            background-color: #12A2BD;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-left: 10px;
            font-family: "Inter";
            font-size: 20;
            font-weight: 500;
        }

        /* .form-container .row input[type="submit"]:hover, */
        .form-container .row button:hover {
            background-color: #15677B;
        }

    </style>
</head>
<body>
    <div class="topbar-placeholder"></div>
    <div class="sidebar-placeholder">
        <img src = "img/gridgeoalert.png" alt = "GridGeoAlert" width = "200">
        <img src = "img/Dashboard.png" alt = "Dashboard">
        <img src = "img/TrafoData.png" alt = "Trafo Data">
        <img src = "img/NewUser.png" alt = "Register New User">
    </div>
    <div class="main">
        <h1 class="form-title">REGISTER NEW USER</h1>
        <div class="form-header">
            <img class = "form-header-icon" src = "img/Form.png" alt = "Filling Form">
            <h1 class="form-header-title">Filling Form</h1>
        </div>
        <div class="form-container">
            <form>
                <div class="form-group">
                    <label for="inline-employeeID">Employee ID</label>
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-trafoID" type="text" placeholder="Please fill with your employee ID">
                </div>
                <div class="form-group">
                    <label for="inline-brand">Email</label>
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-brand" type="text" placeholder="Please fill with your email">
                </div>
                <div class="form-group">
                    <label for="inline-city">Password</label>
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-city" type="text" placeholder="Please fill with your password">
                </div>
                <div class="form-group">
                    <label for="inline-phase">Role</label>
                    <select class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-phase" placeholder="hi">
                        <option value="" disabled selected>Select your role</option>
                        <option value="1">Manajer</option>
                        <option value="2">Tim Teknis</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="inline-phase">Branch Office</label>
                    <select class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-phase" placeholder="hi">
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
                    <button type="button">Cancel</button>
                    <button type="button">Submit</button>
                </div>
            </form>
            </div>
</body>
</html>