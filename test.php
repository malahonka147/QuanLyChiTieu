
<?php include_once("TemplateAdminTren.php");?>
<!-- Trigger/Open The Modal -->
<button id="myBtn">Open Modal</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    
<ul class="containeritem float">
 <?php
 function bgcolor(){ 
    $a=array(
    "51e2f5",
    "9df9ef",
    "ffa8B6",
    "a0d2eb",
    "d0bdf4",
    "8458B3",
    "ff1d58",
    "f75990",
    "fff685",
    "00DDFF",
    "0049B7",);
    $random_keys=array_rand($a);
    return $a[$random_keys];}
 for($i=0;$i<10;$i++)
 {
 ?>
                <a href="#">
                    <li class="float-item">
                        <div class="content" style="background: linear-gradient(to bottom right,#<?php echo bgcolor() ?>,#e5eaf5);">
                            <table>
                                <tr>
                                    <td><img class="anh" src="HinhAnh/Img/vt.jpg"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><b>Vũng Tàu<b></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>27-08-2022</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>4.475.000 VND</p>
                                    </td> 
                                </tr>
                            </table>
                        </div>
                    </li>
                </a>
                <?php 
                }
                ?>
</ul>
  </div>

</div>

<script>
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
<?php include_once("TemplateAdminDuoi.php");?>