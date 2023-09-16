 <!-- Javascript -->
 <script src="assets/plugins/popper.min.js"></script>
 <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

 <!-- Charts JS -->
 <script src="assets/plugins/chart.js/chart.min.js"></script>
 <script src="assets/js/index-charts.js"></script>

 <!-- Page Specific JS -->
 <script src="assets/js/app.js"></script>
 </script>
 <script>
     function sendData() {
         alert("send");
         // Capture user input
         var inputData = document.getElementById("inputData").value;

         // Create a new XMLHttpRequest object
         var xhr = new XMLHttpRequest();

         // Configure the request
         xhr.open("POST", "process.php", true);
         xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

         // Define the callback function to handle the response
         xhr.onreadystatechange = function() {
             if (xhr.readyState == 4 && xhr.status == 200) {
                 // Parse and display the response
                 document.getElementById("result").innerHTML = xhr.responseText;
             }
         };

         // Send the request with user input as data
         xhr.send("data=" + inputData);
     }
 </script>