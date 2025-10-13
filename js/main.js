
var swiper = new Swiper(".mySwiper", {
  pagination: {
      el: ".swiper-pagination",
      type: "fraction",
  },
  navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
  },
  autoplay: {
      delay: 5000, // Change slide every 5 seconds
  },
});

let slideIndex = 0;

showSlides();

function showSlides() {
  let i;
  const slides = document.getElementsByClassName("background-slide");
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {
      slideIndex = 1
  }
  slides[slideIndex - 1].style.display = "block";
  setTimeout(showSlides, 5000); // Change image every 5 seconds
}



//Function to redirect to containerdn and scroll to it
function redirectToContainer() {
  // Redirect logic goes here
  // For focusing on the first name input field, you can use the following code
  document.getElementById("firstName").focus();
}






        // swiper js

        var swiper = new swiper(".mySwiper", {
            pagination: {
              el: ".swiper-pagination",
              type: "fraction",
              
            },
            navigation: {
              nextEl: ".swiper-button-next",
              prevEl: ".swiper-button-prev",
            },
            autoplay: {
            delay: 5000, // Adjust the delay as needed (in milliseconds)
          },
      
          });
      
      
      
          
        
      
      
      function openPopup() {
          var popup = document.getElementById('popup');
          var overlay = document.getElementById('overlay');
          popup.style.display = 'block';
          overlay.style.display = 'block';
      }
      function checkLogin() {

        // Validate the form fields
          var firstName = document.getElementById('firstName').value.trim();
          var lastName = document.getElementById('lastName').value.trim();
          var mobileNo = document.getElementById('mobileNo').value.trim();
          var email = document.getElementById('email').value.trim();
          var selectTemple = document.getElementById('selectTemple').value.trim();
          var donationAmount = document.getElementById('donationAmount').value.trim();
          var donationMethod = document.getElementById('donationMethod').value.trim();


          // Check if any field is empty
          if (firstName === '' || lastName === '' || mobileNo === '' || email === '' || selectTemple === '' || donationAmount === '' || donationAmount === '' || cardNumber === '' || expiryDate === '' || cvv === '') {
              alert('Please fill in all fields.');
              return;
          }

        // Send an AJAX request to check if the user is logged in
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'check_login.php', true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                if (xhr.responseText.trim() === 'true') {
                    // User is logged in, proceed with donation
                    openPopup();
                } else {
                    // User is not logged in, prompt to log in
                    alert("You need to login to donate.");
                    // Redirect the user to the login page
                    window.location.href = "login.php";
                }
            }
        };
        xhr.send();
    }
    
    


// Function to format expiry date input (MM/YYYY)
// document.getElementById("expiryDate").addEventListener("input", function() {
//   var value = this.value.replace(/\D/g, '').substring(0, 6);
//   var month = value.substring(0, 2);
//   var year = value.substring(2, 6);

//   if (value.length > 2) {
//       this.value = month + '/' + year;
//   } else {
//       this.value = month;
//   }
// });
// document.getElementById("expiryDate").addEventListener("input", function() {
//   var value = this.value.replace(/\D/g, '').substring(0, 6);
//   var month = value.substring(0, 2);
//   var year = value.substring(2, 6);

//   if (value.length > 2) {
//       this.value = month + '/' + year;
//   } else {
//       this.value = month;
//   }
// });

// Function to allow only numeric input for expiry date and '/' character


if (!/^\d{2}\/\d{2}$/.test(expiryDate)) {
  alert('Please enter expiry date in MM/YY format.');
  return;
}

// Function to handle payment
document.getElementsByName('payButton')[0].addEventListener('click', function() {
  // Perform payment processing here (assuming payment is successful)
  // Display success message
  var modal = document.getElementById("myModal");
        modal.style.display = "none";
  alert("Donation payment successful!");
});







      