<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link rel="stylesheet" href="form.css">
    <title>booking</title>
</head>
<body>


<div class="form-group">
<form action="db_scripts/generate.php" method="post">
    <label id="bus">Select Your Route :-</label>

<select id="route" required name="Route">
    <option value="" > Choose route here</option>
  <option value="ktom" >Kolhapur ---> Mumbai</option>
  <option value="mtok" > Mumbai ---> Kolhapur </option>
  <option value="ktod" > Kolhapur ---> Delhi</option>
  <option value="dtok"> Delhi ---> Kolhapur</option>
  <option value="ktob"> Kolhapur ---> Banglore</option>
  <option value="btok"> Banglore ---> Kolhapur</option>
</select>



<br>
<br>

<label id="bus">Select Your Date :-</label>
<input required class="form" type="date" id="start" name="trip-start" min="<?php echo date('Y-m-d'); ?>" value="">


<br>
<br>
    <label for="name">Name :-</label>
    <input class="form-control" type="text" name="name"  placeholder=" Enter your name" required>
    <br>
    <br>
    <label for="email">Email :-</label>
    <input  class="form-control" type="email" placeholder="Enter your Email ID " name="email">
    <br>
    <br>
    <label for="age">Age :-</label>
    <input class="form-control" name="age" type="number" data-mask="000" placeholder="Enter Your age" maxlength="2" size="2" ">
    <br>
    <br>

    <label class="input" style="color: white;">Gender :-</label>
    <select class="input"  id="gender" required name="gender">    
         <option value="">Select your Gender</option>
         <option value="male" >Male</option>
         <option value="female">Female</option>
         <option value="anyother">Other</option>
    </select> 
    <br><br>
    <button class="btn btn-light" id="bt" type="submit" value="submit">Procced</button></a>
</div>
</form>

    <!-- <script type="text/javascript" src="form.js"></script> -->
    <script>
         document.getElementById('start').valueAsDate = new Date();
        </script>
</body>
</html>