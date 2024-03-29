<?php
include("dbconnect.php");
session_start();
$mail=$_SESSION['mail'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Loading...</title>
    <style>
       .loader-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh; /* Set height of container to full viewport height */
    }
.ui-loader {
  display: inline-block;
  width: 50px;
  height: 50px;
}

.loader-blk {
  color: #3f51b5;
  animation: rotate-outer08 1.4s linear infinite;
}

.multiColor-loader {
  display: block;
  animation: color-anim08 1.4s infinite;
}

.loader-circle {
  stroke: currentColor;
}

.MuiCircularProgress-circleStatic {
  transition: stroke-dashoffset 0.3s cubic-bezier(0.4, 0, 0.2, 1) 0s;
}

.loader-circle-animation {
  animation: rotate-inner08 1.4s ease-in-out
    infinite;
  stroke-dasharray: 80px, 200px;
  stroke-dashoffset: 0;
}

@keyframes rotate-outer08 {
  0% {
    transform-origin: 50% 50%;
  }

  100% {
    transform: rotate(360deg);
  }
}

@keyframes rotate-inner08 {
  0% {
    stroke-dasharray: 1px, 200px;
    stroke-dashoffset: 0;
  }

  50% {
    stroke-dasharray: 100px, 200px;
    stroke-dashoffset: -15px;
  }

  100% {
    stroke-dasharray: 100px, 200px;
    stroke-dashoffset: -125px;
  }
}

@keyframes color-anim08 {
  0% {
    color: #4285f4;
  }

  25% {
    color: #ea4335;
  }

  50% {
    color: #f9bb2d;
  }

  75% {
    color: #34a853;
  }
}

    </style>
</head>
<body>
<div class="loader-container">
<div class="ui-loader loader-blk">
    <svg viewBox="22 22 44 44" class="multiColor-loader">
        <circle cx="44" cy="44" r="20.2" fill="none" stroke-width="3.6" class="loader-circle loader-circle-animation"></circle>
    </svg>
</div>
</div>
    <script>
   
        // Redirect after 3 seconds
        setTimeout(function() {
            window.location.href = "home.php";
        }, 3000);
    </script>
</body>
</html>
