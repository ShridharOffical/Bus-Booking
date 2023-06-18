<?php
      require_once 'db_scripts/fetch_seats.php';
      require_once "db_scripts/admindb.php";
      //Fetching the rate of the selected route for user convinience
      $route = $_SESSION['Road'];
      $query = "select amount from `fares` where route='$route'";
      $result = $conn->query($query);
      $fetched = $result->fetch_row();
      $route_amount = $fetched[0];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="seatBook.css" />
        <title>Seat Booking</title>
      </head>
      <body>
        <div class="movie-container">
          <select id="movie">
            <option value="<?php echo $route_amount; ?>"><?php echo $route?></option>
          </select>
        </div>
        
        <ul class="showcase">
          <li>
            <div class="seat"></div>
            <small>N/A</small>
          </li>
    
          <li>
            <div class="seat selected"></div>
            <small>Selected</small>
          </li>
    
          <li>
            <div class="seat occupied"></div>
            <small>occupied</small>
          </li>
        </ul>
    
        <div class="container">
          <div class="screen"></div>
          <div class="row">
            <div class="seat">1</div>
            <div class="seat">2</div>
            <div class="seat">3</div>
           
            <div class="seat">4</div>
          </div>
          <div class="row">
            <div class="seat">5</div>
            <div class="seat">6</div>
         
            <div class="seat">7</div>
            <div class="seat">8</div>
          </div>
    
          <div class="row">
            <div class="seat">9</div>
            <div class="seat">10</div>
          
            <div class="seat">11</div>
            <div class="seat">12</div>
          </div>
    
          <div class="row">
            <div class="seat">13</div>
            <div class="seat">14</div>
          
            <div class="seat">15</div>
            <div class="seat">16</div>
          </div>
    
          <div class="row">
            <div class="seat">17</div>
            <div class="seat">18</div>
          
            <div class="seat">19</div>
            <div class="seat">20</div>
          </div>
    
          <div class="row">
            <div class="seat">21</div>
            <div class="seat">22</div>
          
            <div class="seat ">23</div>
            <div class="seat">24</div>
          </div>
        </div>

        
    
        <p class="text">
          You have selected <span id="count">0</span> seats for a price of Rs<span id="total">0</span>
        </p>
        

        <button id="Confrm" style="margin:10px; padding:15px; border-radius: 20px; font-size:0.9rem; background-color:rgba(3, 161, 239, 0.915); " >Procced to Payment</button>
        <script type='text/javascript'> 
          var arr = <?php echo json_encode($data);?>;
          window.glob = "arr"; 
          // </script>
        <script src="seatBook.js"></script>
        
      </body>
    </html>



    