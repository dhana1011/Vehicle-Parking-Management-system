<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dpms</title>

    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

<style>
        .popup-container {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7); /* Transparent background */
            z-index: 9999;
            color:black;
            text-align:center;
            line-height:25px;
            cursor:pointer;
            font-family:sans-serif;
        }

        .popup-content {
            position: relative;
            background-color: #fff;
            margin: 10% auto;
            padding: 20px;
            border-radius: 5px;
            max-width: 80%;
        }

        .close-popup {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            font-size: 40px;
        }
        </style>
        </head>
<body >

    <section class="hero">
        <header>
            <div class="container">
                <div class="logo">
                <h2 class="parking-system-title">Parking System</h2>

                </div>
                <nav class="menu-overlay">
					<ul>
						<li><a href="admin/login.php">Admin</a></li>
						<li><a href="#"></a></li>
                        <li><a href="" id="learn-more-link">Learn More</a></li>
						
					</ul>
				</nav>
            </div>
        </header>
       
       <video autoplay muted loop playsinline id="background-video">
			<source src="car.mp4" type="video/mp4">
			Your browser does not support the video tag.
         </video>  

        <div class="details">
            <div class="container">
                <h1>Welcome to <br>DPMS Parking System</h1>
                <p>------------------------------------------------------------------------</p>

               <!--<a href="" id="learn-more-link">Read More</a>-->
            </div>
    </div>
</section>

    <div class="hamb">
        <span></span>
        <span></span>
        <span></span>
    </div>
   
    <!-- Pop-up Container -->
<div id="popup-container" class="popup-container">
    <div class="popup-content">
        <span class="close-popup" onclick="closePopup()">&times;</span>
        <h2 style="font-size:40px; margin-bottom:10px;">VPMS</h2>
        <p>Our project, the Vehicle Parking Management System, is a web-based platform designed to streamline and enhance the management of vehicle parking facilities. The system primarily focuses on maintaining a comprehensive log of vehicle entries and exits, allowing users to efficiently track the in-time and out-time of their vehicles. The platform features a user-friendly interface, ensuring ease of use for individuals seeking to manage their parking needs effectively. Users can conveniently input vehicle entry and exit times, enabling seamless tracking of parking durations. Additionally, the system offers functionalities to categorize parking activities, facilitating better organization and analysis. Moreover, our system provides graphical representations of parking data, empowering users to visualize their parking patterns and make informed decisions regarding their parking management strategies. By offering insights into parking behaviors, our platform aims to promote more efficient utilization of parking resources and enhance overall parking facility management. In summary, the Vehicle Parking Management System serves as a valuable tool for individuals and organizations seeking to optimize their parking operations, improve resource allocation, and enhance user experience in parking facilities.</p>
    </div>
</div>

<script>
    // JavaScript for the pop-up
    function openPopup() {
        document.getElementById("popup-container").style.display = "block";
    }

    function closePopup() {
        document.getElementById("popup-container").style.display = "none";
    }

    // Event listener for the "Learn More" link
    document.getElementById("learn-more-link").addEventListener("click", function(event) {
        event.preventDefault(); // Prevent default link behavior
        openPopup();
    });
</script>

   
</body>
</html>
