<?php
   include "public/head.admin.php";
?>
      <br>
      <div class="container">
         <div class="row">
            <div class="offset-md-4">
            <div id="clock">
               <div id="time">
                  <div>
                     <span id="hours">00</span> 
                     <span id="H">Hours</span>
                  </div>
                  <div>
                     <span id="minutes">00</span> 
                     <span id="M">Minutes</span>
                  </div>
                  <div>
                     <span id="seconds">00</span> 
                     <span id="S">Seconds</span>
                  </div>
                  <div>
                     <span id="ampm">AM</span>
                  </div>

               </div>
            </div>
            </div>
         </div>

         <br><br>
         <div class="row">
            <div class="col-sm-5 col-md-4 offset-md-1">
               <center>
                  <img src="../img/LabSys.png" width="300px" height="300px"/>
               </center>
            </div>

            <div class="col-sm-4 offset-sm-2 col-md-6 offset-md-0">
               <div class="card">
                  <div class="card-head">
                     <h3 class="text-center"><b>Bienvenido</b></h3>
                  </div>
                  <div class="card-body">
                     <h3 class="text-body">
                        &nbsp;<?php echo $user->getNombre(); ?><br><br>
                        &nbsp;<?php echo $user->getPrivilegio(); ?><br><br>
                        &nbsp;<?php echo $user->getCedula(); ?><br>

                     </h3>
                  </div>
               </div>
            </div>
         </div>
         
      </div>
      
      <br><br>
      <?php
         include "public/body.admin.php";
      ?>
      <script type="text/javascript">
         function clock() {
            var hours = document.getElementById('hours');
            var minutes = document.getElementById('minutes');
            var seconds = document.getElementById('seconds');
            var ampm = document.getElementById('ampm');

            var h = new Date().getHours();
            var m = new Date().getMinutes();
            var s = new Date().getSeconds();
            var am = "AM";

            if (h > 12) {
               //h = h - 12;
               var am = "PM";
            }

            h = (h < 10) ? "0" + h : h
            m = (m < 10) ? "0" + m : m
            s = (s < 10) ? "0" + s : s
            
            hours.innerHTML = h;
            minutes.innerHTML = m;
            seconds.innerHTML = s;
            ampm.innerHTML = am;

         }

         var interval = setInterval(clock, 1000);
         
      </script>

	</body>
	
</html>