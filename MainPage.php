<?php include_once("TemplateAdminTren.php"); ?>

<div style="text-align: center">
    <form action="" method="post">
        <div style=" margin-right: 30px; ">
            <input class="search" type="text" autocomplete="off" placeholder="Tìm kiếm theo họ tên..." name="timkiem" id="timkiem" value="<?php if (!empty($_REQUEST["timkiem"])) {echo $_REQUEST["timkiem"];} ?>" />
            <input type="submit" class="iconSearch" value="" ></input>
        </div>

    </form>
</div>
<div style=" width: fit-content; margin: 10px auto; ">
    <a href="#" id="myBtn"  class="btnThem"  >Thêm mới</a>
    <a href="#"  class="btnThem"  >Quản lý người dùng</a>
</div>
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <form method="POST" id="form"enctype="multipart/form-data" onsubmit="return validateForm()">
                        <div class="them" style=" margin-top: 30px; ">
                            <p>Tên địa điểm: </p>
                            <input class="input" type="text" id="tendiadiem" name="tendiadiem" />
                            <p>Ghi chú: </p>
                            <textarea class="input" type="text" id="ghichu" name="ghichu" style="height: 100px;max-width: 100%;"></textarea>
                            <h4>Hình ảnh địa điểm:</h4>
                            <p>Chọn file để upload:
                            (Max size file
                            <?=ini_get('upload_max_filesize')?>)</p>
                            <input id="fileupload"name="fileupload[]" type="file" multiple="multiple" />
                        </div>
                    <div style="margin: 20px;">
                        <input type="submit" class="btnThem" id="btnThem" name="btnThem"  value="THÊM" /> 
                    </div>
                    <div align="center" class="result" style=" font-family: Montserrat; color: #ff0000; margin: 20px;"></div>
    </form>
  </div>

</div>

<ul class="containeritem float">
    <?php
    function bgcolor()
    {
        $a = array(
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
            "0049B7",
        );
        $random_keys = array_rand($a);
        return $a[$random_keys];
    }
    for ($i = 0; $i < 10; $i++) {
    ?>
        <a href="#">
            <li class="float-item">
                <div class="content" style="background: linear-gradient(to bottom right,#<?php echo bgcolor() ?>,#e5eaf5);">
                    <img class="anh" src="HinhAnh/Img/vt.jpg">
                    <p class="TenDiaDiem"><b>Vũng Tàu</b></p>
                    <p class="NgayTao">27-08-2022</p>
                    <p class="TongTien">4.475.000 VND</p>
                </div>
            </li>
        </a>
    <?php
    }
    ?>
</ul>

<?php include_once("TemplateAdminDuoi.php"); ?>

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