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
        }

        .main {
            background-color: #f0f0f0;
            grid-column: 2 / 3;
            grid-row: 2 / 3;
            display: grid;
            grid-template-columns: 0.044fr 0.912fr 0.044fr;
            grid-template-rows: 0.0324074fr 0.05fr 0.0589815fr 1fr;
            gap: 0px;
            overflow-y: auto; /* Enable vertical scrolling */
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
            font: inter;
            text-align: left;
            margin-left: 49px; /* Adjust as needed */
            display: inline-block; /* Display label as inline-block */
        }
        .form-group input[type="text"],
        .form-group input[type="date"],
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
            font: inter;
            font-size: 20;
            font-weight: 500;
        }

        .form-container .row input[type="submit"]:hover,
        .form-container .row button:hover {
            background-color: #15677B;
        }

    </style>
</head>
<body>
    <div class="topbar-placeholder"></div>
    <div class="sidebar-placeholder"></div>
    <div class="main">
        <h1 class="form-title">REGISTER NEW TRANSFORMATOR</h1>
        <div class="form-header">
            <img class="form-header-icon" src="/images/form.png" alt="icon">
            <h1 class="form-header-title">Filling Form</h1>
        </div>
        <div class="form-container">
            <form>
                <div class="form-group">
                    <label for="inline-trafoID">Trafo ID</label>
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-trafoID" type="text" placeholder="Please fill with your trafo's ID">
                </div>
                <div class="form-group">
                    <label for="inline-brand">Brand</label>
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-brand" type="text" placeholder="Please fill with your trafo's brand">
                </div>
                <div class="form-group">
                    <label for="inline-city">City</label>
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-city" type="text" placeholder="Please fill with your trafo's installation city">
                </div>
                <div class="form-group">
                    <label for="inline-phase">Phase</label>
                    <select class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-phase" placeholder="hi">
                        <option value="" disabled selected>Select your trafo's phase</option>
                        <option value="1">Phase 1 Transformator</option>
                        <option value="2">Phase 3 Transformator</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="inline-latitude">Latitude</label>
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-latitude" type="text" placeholder="Please fill with your trafo's installation latitude">
                </div>
                <div class="form-group">
                    <label for="inline-longitude">Longitude</label>
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-longitude" type="text" placeholder="Please fill with your trafo's installation longitude">
                </div>
                <div class="form-group">
                    <label for="inline-capacity">Capacity</label>
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-capacity" type="text" placeholder="Please fill with your trafo's capacity">
                </div>
                <div class="form-group">
                    <label for="inline-date">Installation Date</label>
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-installationDate" type="date" placeholder="Please select installation date">
                </div>
                <div class="row">
                    <button type="button">Cancel</button>
                    <input type="submit" value="Submit">
                </div>
            </form>
            </div>
</body>
</html>