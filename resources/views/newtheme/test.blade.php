<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style type="text/css">


.section {
  height: 100%;

  justify-content: center;
}

.box1 {
  position: relative;
  height: 400px;
  padding: 53px;


}

.list {
  display: none;
  position: fixed;
  z-index: 10000;
  list-style: none;
  background-color: lightgrey;
  border-radius: 5px;
  width: 170px;
  padding: 1px;

  
}

.list li {
  padding: 10px;
  cursor: pointer;
}

.list li a{
  padding: 0;
  text-decoration: none;
  color: #333;
}

.list li .orange::before{
  content: "";
  background-color: orange;
  padding:  0px 9px 0px 7px;
  border-radius: 30px;
  margin: 10px;
}



.list li .yellow::before{
  content: "";
  background-color: yellow;
  padding: 0px 9px 0px 7px;
  border-radius: 30px;
  margin: 10px;
}


.list li .pink::before{
  content: "";
  background-color: pink;
  padding: 0px 9px 0px 7px;
  border-radius: 30px;
  margin: 10px;
}


.list li .blue::before{
  content: "";
  background-color: blue;
  padding: 0px 9px 0px 7px;
  border-radius: 30px;
  margin: 10px;
}


.list li a:hover, .list li:hover a{
  text-decoration: none;
  color: #fff;
}

.list li:hover {
  background-color: #e7e7e7 #eee
  color: #fff;
}
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 30%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}


.modal-text {

}


</style>

</head>
<body>                   



 <section class="d-flex justify-content-center" >
      <div class="d-flex justify-content-center">
        <div class="d-flex justify-content-center">
        <div class="box1" id="box1">
         <article>
          <p>

        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sit amet odio eu magna mattis vehicula. Duis egestas fermentum leo. Nunc eget dapibus eros, id egestas magna. Fusce non arcu non quam laoreet porttitor non non dui. Ut elit nisl, facilisis id hendrerit et, maximus at nunc. Fusce at consequat massa. Curabitur fermentum odio risus, vel egestas ligula rhoncus id. Nam pulvinar mollis consectetur. Aenean dictum ut tellus id fringilla. Maecenas rutrum ultrices leo, sed tincidunt massa tempus ac. Suspendisse potenti. Aenean eu tempus nisl. 
          </p>

          </article>
          

          <ul class="list" id="list">
            <li><a class="orange" href="#" id="change_color_orange"></a>
              <a class="yellow" href="#" id="change_color_yellow"></a>
              <a class="pink" href="#" id="change_color_pink" ></a>
              <a class="blue" href="#" id="change_color_blue" ></a>
            </li>
            <hr>

            <li><span id="myBtn">Add Note +</span> </li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
           
          </ul>

        </div>
        </div>

    
    </section>

<br/><br/>




<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">

  
        <p>Add Note +</p>
        <textarea rows="10" cols="70" placeholder="Here student can write the code"></textarea>
        
        <div style="display:flex; flex-direction: row-reverse; padding: 4px;">
          <span id=""> <button class="btn btn-primary">Save</button></span>
          <span class="close"> <button class="btn btn-default">Close</button></span>
        </div>

        
  </div>

</div>






<script type="text/javascript">
 
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>




<script type="text/javascript">
  const element = document.getElementById("box1");

const listElement = document.getElementById("list");

const onClickOutside = (event) => {
  listElement.style.display = "none";
  document.removeEventListener("click", onClickOutside);
};

listElement.addEventListener("contextmenu", (event) => {
  event.stopPropagation();
});

listElement.addEventListener("mouseup", (event) => {
  event.stopPropagation();
});

document.addEventListener("contextmenu", (event) => {
  listElement.style.display = "none";
});

listElement.addEventListener("click", (event) => {
  event.stopPropagation();
});

element.addEventListener("mouseup", (event) => {
  event.stopPropagation();
  if (event.button === 2) {
    return;
  }
});

element.addEventListener("contextmenu", (event) => {
  event.preventDefault();
  event.stopPropagation();
  document.addEventListener("click", onClickOutside);
  const x = event.offsetX;
  const y = event.offsetY - 15;
  listElement.style.display = "block";
  listElement.style.top = y + "px";
  listElement.style.left = x + "px";
});
</script>


<script type="text/javascript">
  

  document.getElementById("change_color_orange").onclick = function() {
  // Get Selection
  sel = window.getSelection();

  if (sel.rangeCount && sel.getRangeAt) {
    range = sel.getRangeAt(0);
  }
  // Set design mode to on
  document.designMode = "on";
  if (range) {
    sel.removeAllRanges();
    sel.addRange(range);
  }
  // Colorize text
  document.execCommand("BackColor", false, "orange");
  // Set design mode to off
  document.designMode = "off";
}

</script>



<script type="text/javascript">
  

  document.getElementById("change_color_yellow").onclick = function() {
  // Get Selection
  sel = window.getSelection();
  if (sel.rangeCount && sel.getRangeAt) {
    range = sel.getRangeAt(0);
  }
  // Set design mode to on
  document.designMode = "on";
  if (range) {
    sel.removeAllRanges();
    sel.addRange(range);
  }
  // Colorize text
  document.execCommand("BackColor", false, "yellow");
  // Set design mode to off
  document.designMode = "off";
}
</script>




<script type="text/javascript">
  

  document.getElementById("change_color_pink").onclick = function() {
  // Get Selection
  sel = window.getSelection();
  if (sel.rangeCount && sel.getRangeAt) {
    range = sel.getRangeAt(0);
  }
  // Set design mode to on
  document.designMode = "on";
  if (range) {
    sel.removeAllRanges();
    sel.addRange(range);
  }
  // Colorize text
  document.execCommand("BackColor", false, "pink");
  // Set design mode to off
  document.designMode = "off";
}
</script>


<script type="text/javascript">


  document.getElementById("change_color_blue").onclick = function() {
  // Get Selection
  sel = window.getSelection();
  if (sel.rangeCount && sel.getRangeAt) {
    range = sel.getRangeAt(0);
  }
  // Set design mode to on
  document.designMode = "on";
  if (range) {
    sel.removeAllRanges();
    sel.addRange(range);
  }
  // Colorize text
  document.execCommand("BackColor", false, "blue");
  // Set design mode to off
  document.designMode = "off";
}
</script>

  
</body>
</html>