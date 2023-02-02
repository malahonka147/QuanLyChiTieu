            </div>
        </div> 
        <a href="javascript:void(0);" id="scroll" title="Scroll to Top" style="display: none;"><span></span></a> 
    </body>
</html>

<script type="text/javascript">
    $(document).ready(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('#scroll').fadeIn();
            } else {
                $('#scroll').fadeOut();
            }
        });
        $('#scroll').click(function () {
            $("html, body").animate({ scrollTop: 0 }, 100);
            return false;
        });
    });
</script>

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
  document.getElementById("tendiadiem").value ="";
  document.getElementById("ghichu").value ="";
  document.getElementById("fileupload").value ="";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
    document.getElementById("tendiadiem").value ="";
    document.getElementById("ghichu").value ="";
    document.getElementById("fileupload").value ="";
  }
}

</script>