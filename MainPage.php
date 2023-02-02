<?php include_once("TemplateAdminTren.php"); ?>

<div style="text-align: center">
    <form action="" method="post">
        <div style=" margin-right: 30px; ">
            <input class="search" type="text" autocomplete="off" placeholder="Tìm kiếm theo tên..." name="timkiem" id="timkiem" value="<?php if (!empty($_REQUEST["timkiem"])) {echo $_REQUEST["timkiem"];} ?>" />
            <input type="submit" class="iconSearch" value="" ></input>
        </div>

    </form>
</div>
<div style=" width: fit-content; margin: 10px auto; ">
    <a href="#" id="myBtn"  class="btnThem"  >Thêm mới</a>
    <a href="QuanLyUser.php"  class="btnThem"  >Quản lý người dùng</a>
</div>
<div style="border: 1px solid; width: 95%; margin: auto; border-radius: 5px ;box-shadow: 0 1px 1px 0 rgb(165 165 165), 0 1px 1px 0 rgb(0 0 0);"></div>
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <form method="POST" id="form"enctype="multipart/form-data" onsubmit="return validateForm()">
                        <div class="them" style=" margin-top: 30px; ">
                            <h4>Thêm mới địa điểm:</h4>
                            <p>Tên địa điểm: </p>
                            <input class="input" type="text" id="tendiadiem" name="tendiadiem" />
                            <p>Ghi chú: </p>
                            <textarea class="input" type="text" id="ghichu" name="ghichu" style="height: 100px;max-width: 100%;"></textarea>
                            <h4>Hình ảnh địa điểm:</h4>
                            <p>Chọn file để upload:
                            (Max size file
                            <?=ini_get('upload_max_filesize')?>)</p>
                            <input id="fileupload"name="fileupload" type="file" onchange="validateFileupload()"/>
                        </div>
                    <div style="margin: 20px;">
                        <input type="submit" class="btnThem" id="btnThem" name="btnThem"  value="THÊM" /> 
                    </div>
                    <p id="demo" class="result" style=" font-family: Montserrat; color: #ff0000; margin: 20px;"></p>
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
    if(empty($_REQUEST["timkiem"]))
                    {
                        $sql="select count(*) as total FROM diadiemdulich";
                    }else{
                        $sql=" select count(*) as total FROM diadiemdulich where TenDiaDiem LIKE N'%".$_REQUEST["timkiem"]."%' ";
                    }
                    $query=DataProvider::ExecuteQuery($sql);
                    $data = mysqli_fetch_array($query);
                    $total_records = $data['total'];
                    $limit = 12;
                    if($total_records==0)
                    {
                        ?>
                        <p style=" font-family: 'Montserrat'; color: #131313; font-weight: 400; text-align: center; font-size: 16px; line-height: 33px; margin-top: 10px; ">Không có dữ liệu!!!</p>
                        <?php
                    }
                    else
                    {
                        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                        
                        $total_page = ceil($total_records / $limit);
                        if ($current_page > $total_page){
                            $current_page = $total_page;
                        }
                        else if ($current_page < 1){
                            $current_page = 1;
                        }
                        $start = ($current_page - 1) * $limit;
                        if(empty($_REQUEST["timkiem"]))
                        {
                            $sql=" select * FROM diadiemdulich order by NgayTao Desc LIMIT $start , $limit";
                        }else{
                            $sql=" select * FROM diadiemdulich where TenDiaDiem like N'%".$_REQUEST["timkiem"]."%' order by NgayTao Desc LIMIT $start , $limit";
                        }
                        
                        
                       
                        $query=DataProvider::ExecuteQuery($sql);
                        while($data = mysqli_fetch_array($query))
                            {
                                $date = new DateTime($data['NgayTao']);
                                
    ?>
        <a href="#">
            <li class="float-item">
                <div class="content" style="background: linear-gradient(to bottom right,#<?php echo bgcolor() ?>,#e5eaf5);">
                    <img class="anh" src="HinhAnh/Img/<?php echo $data["HinhAnh"]; ?>">
                    <p class="TenDiaDiem"><b>Đ.Điểm:</b> <?php echo $data["TenDiaDiem"];?></p>
                    <p class="NgayTao"><b>Ngày: </b><?php echo $date->format('d/m/Y');?></p>
                    <p class="TongTien"><b>T.Tiền: </b><?php echo $data["TongTien"];?> VND</p>
                    <p class="GhiChu"><b>Note: </b><?php echo $data["GhiChu"];?></p>
                </div>
            </li>
        </a>
    <?php
            }
        }
    ?>
</ul>

<?php include_once("TemplateAdminDuoi.php"); ?>

<script>
    function validateForm() {
    if (document.getElementById('tendiadiem').value == "") {
        swal("Nhập tên địa điểm vào bạn ê!","You clicked the button!", "warning");
        return false;
    }
    if( document.getElementById("fileupload").files.length == 0 ){
        swal("Chưa chọn hình ảnh!","You clicked the button!", "warning");
        return false;;
    }
    }
    function validateFileupload() {
    if(document.getElementById("fileupload").files.length != 0)
    {
        var fileName = document.getElementById("fileupload").value;
        var allowed_extensions = new Array("jpg","png","gif");
        var file_extension = fileName.split('.').pop().toLowerCase(); // split function will split the filename by dot(.), and pop function will pop the last element from the array which will give you the extension as well. If there will be no extension then it will return the filename.
        var flag=false;
        for(var i = 0; i <= allowed_extensions.length; i++)
        {
            if(allowed_extensions[i]==file_extension)
            {
                flag= true; // valid file extension
            }
        }
        if(!flag)
        {
            swal("Chọn hình thôi má ơi!","You clicked the button!", "warning");
            document.getElementById("fileupload").value ="";
            return false;
        }
    }
    if(document.getElementById("fileupload").files[0].size > 2097152)
    {
        swal("Dung lượng hình quá lớn!" ,"You clicked the button!", "warning");
        document.getElementById("fileupload").value ="";
        return false;
    }
    }

                                    
</script>
<?php
                    if(isset($_REQUEST["btnThem"]))
                    {

                    if (($_SERVER['REQUEST_METHOD'] === 'POST') &&
                        (isset($_FILES['fileupload']))) {
                        
                        $files = $_FILES['fileupload'];
                            $names      = $files['name'];
                            $types      = $files['type'];
                            $tmp_names  = $files['tmp_name'];
                            $errors     = $files['error'];
                            $sizes      = $files['size'];

                        if ($tmp_names[0]!="")
                        {
                            $now = date_create()->format('Y-m-d');
                            $sql = "INSERT INTO diadiemdulich(TenDiaDiem, NgayTao, GhiChu) VALUES ('".$_REQUEST["tendiadiem"]."','".$now."','".$_REQUEST["ghichu"]."')";
                            DataProvider::ExecuteQuery($sql);
                            $sql="select max(ID) as ID from diadiemdulich where TenDiaDiem=N'".$_REQUEST["tendiadiem"]."' and NgayTao='".$now."'";
                            $result=DataProvider::ExecuteQuery($sql);
                            $data=mysqli_fetch_array($result);
                            $ID=$data["ID"];
                            DataProvider::ExecuteQuery($sql);
                                if ($errors == 0)
                                {
                                    $fileName = $names;
                                    $pos = strrpos( $fileName, "." );
                                    $fileExtension = substr($fileName,$pos);                        
                                    $tenHinh =  $ID.$fileExtension;
                                    move_uploaded_file($tmp_names, "HinhAnh/Img/".$tenHinh );
                                }
                            $sql = "Update diadiemdulich Set HinhAnh='" . $tenHinh . "' Where ID=" .$ID;
                            DataProvider::ExecuteQuery($sql);
                            echo '<script type="text/javascript">
                            swal("'.$sql.'","You clicked the button!", "success")
                            .then((value) => {
                                if(value==true)
                                {
                                window.location = "MainPage.php"
                                }
                              });
                                
                            </script>';
                        }
                    }
                }
                    ?>