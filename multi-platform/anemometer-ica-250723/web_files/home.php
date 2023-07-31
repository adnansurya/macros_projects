
<!DOCTYPE html>
<html>
  <head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=2">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
      
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <br>
		<center><a href="#" class="navbar-brand">Sistem Monitoring Kecepatan Angin</a></center>
</br>
		</div>
        <div>
        <ul class="nav navbar-nav">
            <li> <a href="logout.php"> Log Out </a> </li>
        </ul>
    </div>
</nav>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <script type="text/javascript" src="jquery/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            setInterval(function(){
                $("#cektegangan").load('cektegangan.php');
                $("#cekarus").load('cekarus.php');
                $("#cekdaya").load('cekdaya.php');
                $("#cekenergi").load('cekenergi.php');
                $("#cekcosphi").load('cekcosphi.php');
                $("#cekfrekuensi").load('cekfrekuensi.php');
            }, 1000) ;
        });

    </script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Web Multi Sensor</title>
  </head>
  <body>
    <div class="container" style="margin-top: 200px; text-align: center;">
        <h2>Sistem Monitoring Kecepatan Angin<br>Secara Realtime</h2>    

        <div style="display: flex; justify-content: center; padding-top: 10px">
        <!-- Tegangan -->
        <div class="card text-center" style="width: 30%">
          <div class="card-header" style="font-size: 15px; font-weight: bold; background-color: yellow">
            Tegangan
          </div>
          <div class="card-body">
            <h1 class="card-title"><span id="cektegangan">0</span></h1>
          </div>
        </div>

        <!-- Arus -->
        <div class="card text-center" style="width: 30%">
          <div class="card-header" style="font-size: 15px; font-weight: bold; background-color: blue; color: white">
            Arus
          </div>
          <div class="card-body">
            <h1 class="card-title"><span id="cekarus">0</span></h1>
          </div>
        </div>  

        <!-- LDR -->
        <div class="card text-center" style="width: 30%">
          <div class="card-header" style="font-size: 15px; font-weight: bold; background-color: red; color: white">
            Daya
          </div>
          <div class="card-body">
            <h1 class="card-title"><span id="cekdaya">0</span></h1>
          </div>
        </div>
        

  
    <!-- LDR -->
        <div class="card text-center" style="width: 30%">
          <div class="card-header" style="font-size: 15px; font-weight: bold; background-color: purple; color: white">
            Energi
          </div>
          <div class="card-body">
            <h1 class="card-title"><span id="cekenergi">0</span></h1>
          </div>
        </div>
        


    <!-- LDR -->
        <div class="card text-center" style="width: 30%">
          <div class="card-header" style="font-size: 15px; font-weight: bold; background-color: green; color: white">
            CosPhi
          </div>
          <div class="card-body">
            <h1 class="card-title"><span id="cekcosphi">0</span></h1>
          </div>
        </div>




    <!-- LDR -->
        <div class="card text-center" style="width: 30%">
          <div class="card-header" style="font-size: 15px; font-weight: bold; background-color: orange; color: white">
            Frekuensi
          </div>
          <div class="card-body">
            <h1 class="card-title"><span id="cekfrekuensi">0</span></h1>
          </div>
        </div>
        </div>

    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>