<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
    <!-- <title>Document</title> -->

    <style>
        .main {
            width: 40%;
            font-family: 'inter';
            
        }
        .notif {
            background-color:#12A2BD;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 5px;
        }
        .notif-title {
            margin-left: 15px;
            font-size: 16px;
            color: white;
            font-weight: 500;

        }
        .notif-header-icon {
            width: 8px;
            height: 8px;
            margin-right: 10px;
        }
        .box-1 {
            background-color: #F6F6F6;
            padding: 40px;
    
        }
        .trafo-1 {
            color: black;
            font-size: 16px;
            font-weight: 500;
           
        }
        .text-1 {
            color: #7F7F7F;
            font-size: 14px;
            display: flex;
            align-items: center;
            
        }
        .text-1 p {
            margin: 0; 
            white-space: nowrap; 
            /* display: inline-block; */
            flex-grow: 1;
        }

        .text-1 p + p {
            margin-left: 30px;
        }

        .box-2 {
            background-color: #FFFFFF;
            padding: 40px;
    
        }
        .row {
            background-color: #E2EFFD;
            padding: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .row a {
            color: #24BEFE;
            

        }

    </style>
</head>
<x-app-layout>
<!-- <button type="button" class="btn btn-primary position-relative">
  Profile
  <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
    <span class="visually-hidden">New alerts</span>
  </span>
</button> -->
<div class="main">
    <div class="notif">
        <h1 class="notif-title">Notification</h1>
        <img class = "notif-header-icon" src = "img/x.png" alt = "Icon" >
    </div>
    <div class="box-1">
        <h1 class= "trafo-1">Trafo ID 1101</h1>
        <div class= "text-1">
            <p>There is an error on your transformator</p>
            <p>01/02</p>
        </div>
    </div>
    <div class="box-2">
        <h1 class= "trafo-1">Trafo ID 1111</h1>
        <div class= "text-1">
            <p>There is a warning on your transformator</p>
            <p>03/02</p>
        </div>
    </div>
    <div class="row">
        <a href="/view-all">View All</a>
    </div>
<div>


</x-app-layout>

</html>