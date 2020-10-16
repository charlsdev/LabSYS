<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
		<!--<meta http-equiv="Refresh" content="30"/>-->
		
		<title>Laboratorio Clinico LabSys</title>
		
		<link href="../img/LabSys.ico" type="image/x-icon" rel="shortcut icon" />
		<link href="../lib/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="../lib/css/swiper.min.css" rel="stylesheet" type="text/css" />
		<link href="../lib/estilo_g.css" rel="stylesheet" type="text/css" />
		<link href="../lib/team.style.css" rel="stylesheet" type="text/css" />
		  		
   </head>
    
   <body>
		<div class="row-cols-12">
		   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				&nbsp;
				<img src="../img/LabSys.png" id="img_logo"/>
				
				&nbsp;&nbsp;&nbsp;
				<a class="navbar-brand" href="../index.php"><b>LabSys</b></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
				
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
							<li class="nav-item">
								<a class="nav-link" href="laboratorios.php"><b>Laboratorios</b></a>
							</li>
							<li class="nav-item">
							<a class="nav-link" href="team.php"><b>Equipo de Trabajo</b></a>
							</li>
							<li class="nav-item">
							<a class="nav-link" href="inicio_sesion.php" target="_blank"><b>Log in</b></a>
							</li>
					
						</ul>
						
				</div>
			</nav>
      </div>
      
		<br>
      <center><h2><b>Innova Tech'S Team</b></h2></center>

      <!-- Swiper -->
      <div class="swiper-container">
         <div class="swiper-wrapper">

            <div class="swiper-slide">
               <div class="imgBox">
                  <img src="../img/Innvo Tech'S.png" id="teamID">
               </div>
               <div class="details" style="color:#000;" id="details6">
                  <center><h5>Innova Tech'S</h5><hr><h6><span>Innova Tech'S Team</span></h6></center>
               </div>
            </div>

            <div class="swiper-slide">
               <div class="imgBox">
                  <img src="../img/Iam.jpg">
               </div>
               <div class="details" style="color:#000;" id="details1">
                  <center><h5>Carlos VP</h5><hr><h6><span>Innova Tech'S Developer</span></h6></center>
               </div>
            </div>

            <div class="swiper-slide">
               <div class="imgBox">
                  <img src="../img/Enanis.jpg">
               </div>
               <div class="details" style="color:#000;" id="details3">
                  <center><h5>Elizabeth Ch.</h5><hr><h6><span>Innova Tech'S Designer</span></h6></center>
               </div>
            </div>
            
            <div class="swiper-slide">
               <div class="imgBox">
                  <img src="../img/Victor.jpg" id="teamID">
               </div>
               <div class="details" style="color:#000;" id="details5">
                  <center><h5>Victor FC.</h5><hr><h6><span>Innova Tech'S Marketing</span></h6></center>
               </div>
            </div>

            <div class="swiper-slide">
               <div class="imgBox">
                  <img src="../img/Xiomara.jpg">
               </div>
               <div class="details" style="color:#000;" id="details4">
                  <center><h5>Jennifer BP.</h5><hr><h6><span>Innova Tech'S Designer</span></h6></center>
               </div>
            </div>

            <div class="swiper-slide">
               <div class="imgBox">
                  <img src="../img/Patu.jpg">
               </div>
               <div class="details" style="color:#000;" id="details2">
                  <center><h5>Enferma & I</h5><hr><h6><span>Innova Tech'S Lazy</span></h6></center>
               </div>
            </div>
            
         </div>
         
         <!-- Add Pagination -->
         <div class="swiper-pagination"></div>
      </div>
		
		<br><br>

      <script src="../lib/jquery.min.js"></script>
		<script src="../lib/js/bootstrap.min.js"></script>
      <script src="../lib/js/swiper.min.js"></script>
      
      <!-- Initialize Swiper -->
      <script>
         var swiper = new Swiper('.swiper-container', {
            effect: 'coverflow',
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: 'auto',
            coverflowEffect: {
               rotate: 50,
               stretch: -25,
               depth: 100,
               modifier: 1,
               slideShadows : true,
            },
            pagination: {
               el: '.swiper-pagination',
            },
         });
      </script>
		
   </body>
</html>