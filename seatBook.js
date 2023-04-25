const container = document.querySelector('.container');
const seats = document.querySelectorAll('.row .seat');
const count = document.getElementById('count');
const total = document.getElementById('total');
const movieSelect = document.getElementById('movie');
const Btn = document.getElementById('Confrm');


populateUI();

let ticketPrice = +movieSelect.value;  
var Sold = arr; //^  array of the seats which have been sold already
var Selected_seats;//* This will the seats which are selected

//? update total and count
function updateSelectedCount() {
  const selectedSeats = document.querySelectorAll('.row .seat.selected');

  const selectedSeatsCount = selectedSeats.length;

  count.innerText = selectedSeatsCount;
  total.innerText = selectedSeatsCount * ticketPrice;
}

// get data from localstorage and populate ui
function populateUI() {
  const selectedSeats = JSON.parse(localStorage.getItem('selectedSeats'));
  if (selectedSeats !== null && selectedSeats.length > 0) {
    seats.forEach((seat, index) => {
      if (selectedSeats.indexOf(index) > -1) {
        seat.classList.add('selected');
      }
      
    });
  }

  const selectedMovieIndex = localStorage.getItem('selectedMovieIndex');

  if (selectedMovieIndex !== null) {
    movieSelect.selectedIndex = selectedMovieIndex;
  }
}

function taken() {  //^Displays the seats which have been sold already as occupied (Final)
  var iter = 1;
  seats.forEach(element => {
      
      for (let index = 0; index < Sold.length; index++) {

          if (iter == Sold[index]){
              element.classList.add('occupied');
          }
      }
      iter++;
  });
     
  }



// Movie select event
movieSelect.addEventListener('change', (e) => {
  ticketPrice = +e.target.value;
  setMovieData(e.target.selectedIndex, e.target.value);
  updateSelectedCount();
});

// Seat click event
container.addEventListener('click', (e) => {
  if (e.target.classList.contains('seat') && !e.target.classList.contains('occupied')) {
    e.target.classList.toggle('selected');

    updateSelectedCount();
  }
});


async function Number_of_selected () {

  const getArrElem = document.querySelectorAll('.row .seat.selected');
  var size = getArrElem.length;

  var get_arr = new Int32Array(size);
  for (let index = 0; index < getArrElem.length; index++) {
    
    var temp = parseInt(getArrElem[index].innerHTML);
    get_arr[index] = temp;

    
    
  }
  
    document.cookie = "Seats=" + get_arr;

}


Btn.addEventListener('click', (e) => {
    Number_of_selected();
    // fetch('db_scripts/send_seats.php');
    window.location.href = 'payment.html';
});



updateSelectedCount();
taken();