<?php include_once("TemplateAdminTren.php");?>
<?php
        if(!empty($_SESSION["flag"]))
        {
            if($_SESSION["flag"]==1)
            {
                echo '<script type="text/javascript">
                swal("Xóa phiếu nhập thành công!","You clicked the button!", "success");
                </script>';
                $_SESSION["flag"]='';
            }else if($_SESSION["flag"]==0)
            {
                echo '<script type="text/javascript">
                swal("Xóa thất bại!","You clicked the button!", "success");
                </script>';
                $_SESSION["flag"]='';
            }
        }

    ?>
<div style="text-align: center">
    <form action="" method="post">
        <input class="search" type="text" autocomplete="off"  placeholder="Tìm kiếm theo họ tên..." name="timkiem" id="timkiem" value="<?php if(!empty($_REQUEST["timkiem"])){echo $_REQUEST["timkiem"];}?>"/>
        <input type="submit" value="" style="margin: 20px 0px;position: absolute;width: 30px; height: 30px; background-image: url(HinhAnh/search.png); background-repeat: no-repeat; background-size: 100% 100%; border-radius: 5px; "></input>
    </form>
</div>
<div style=" width: fit-content; margin: 10px auto; ">
    <a href="#" id="myBtn"  class="btnThem"  >Thêm mới</a>
    <a href="MainPage.php"  class="btnThem"  >Quản lý chi tiêu</a>
</div>
<div style="border: 1px solid; width: 95%; margin: auto; border-radius: 5px ;box-shadow: 0 1px 1px 0 rgb(165 165 165), 0 1px 1px 0 rgb(0 0 0);"></div>
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <form method="POST" id="form"enctype="multipart/form-data" onsubmit="return validateForm()">
                        <div class="them" style=" margin-top: 30px; ">
                            <input class="input" type="hidden" id="ID" name="ID" />
                            <h4>Thêm mới người:</h4>
                            <p>Họ tên: </p>
                            <input class="input" type="text" id="hoten" name="hoten" />
                            <p>Ngày sinh: </p>
                            <input class="input" type="date" id="ngaysinh" name="ngaysinh">
                            <p>Giới tính: </p>
                            <p><select id="gioitinh" name="gioitinh" class="input">
                                    <option  value=1 selected="selected">Nam</option>
                                    <option  value=0 >Nữ</option>
                                </select></p>
                        </div>
                    <div style="margin: 20px;">
                        <input type="submit" class="btnThem" id="btnThem" name="btnThem"  value="Thêm" /> 
                        <input type="submit" class="btnCapNhat" id="btnCapNhat" name="btnCapNhat"  value="Cập nhật" /> 
                    </div>
                    <p id="demo" class="result" style=" font-family: Montserrat; color: #ff0000; margin: 20px;"></p>
    </form>
  </div>

</div>
                <?php
                    
                    if(empty($_REQUEST["timkiem"]))
                    {
                        $sql="select count(*) as total FROM user   ";
                    }else{
                        $sql=" select count(*) as total FROM user where HoTen LIKE N'%".$_REQUEST["timkiem"]."%' ";
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
                        ?>
                        <table class="table lsmh">
                        <thead>
                            <tr>
                            <th scope="col" style="width: 60%;">HỌ TÊN</th>
                            <th scope="col" style="width: 20%;">NGÀY SINH</th>
                            <th scope="col" style="width: 20%;">GIỚI TÍNH</th>
                            <th scope="col" style="width: 10%;text-align: center;">XÓA</th>
                            </tr>
                        </thead>
                        <tbody style="background-color: #6060601f;">
                        <?php
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
                            $sql=" select * FROM user order by ID asc LIMIT $start , $limit";
                        }else{
                            $sql=" select * FROM user where HoTen like N'%".$_REQUEST["timkiem"]."%' order by ID asc LIMIT $start , $limit";
                        }
                        
                        
                       
                        $query=DataProvider::ExecuteQuery($sql);
                        while($data = mysqli_fetch_array($query))
                            {
                                $date = new DateTime($data['NgaySinh']);
                                
                ?>
                    <tr >
                        <td onclick="popupUpdate(<?php echo $data['ID'];?>,'<?php echo $data['HoTen'];?>','<?php echo $data['NgaySinh'];?>','<?php echo $data['GioiTinh'];?>');">
                            <p><?php echo $data["HoTen"];?> </p>
                        </td>
                        <td onclick="popupUpdate(<?php echo $data['ID'];?>,'<?php echo $data['HoTen'];?>','<?php echo $data['NgaySinh'];?>','<?php echo $data['GioiTinh'];?>');">
                            <p><?php echo $date->format('d/m/Y'); ?></p>
                        </td>
                        <td onclick="popupUpdate(<?php echo $data['ID'];?>,'<?php echo $data['HoTen'];?>','<?php echo $data['NgaySinh'];?>','<?php echo $data['GioiTinh'];?>');">
                            <p><?php if ($data["GioiTinh"]==1)
                            {
                                echo "Nam";
                            }else{
                                echo "Nữ";
                            }?></p>
                        </td>
                        <td>
                        
                            <p style=" text-align: center; "><a onclick='javascript:
                            swal({
                            title: "Bạn có chắc muốn xóa người này?",
                            text: "Cẩn thận củi lửa nha!",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                            })
                            .then((willDelete) => {
                            if (willDelete) {
                                window.location.href="XoaUser.php?ID=<?php echo $data["ID"]?>";
                            } else {
                                swal("Hủy thao tác thành công!");
                            }
                            });
                        ' ><img class="imgXoa" src="HinhAnh/delete.png" ></a></p>
                        </td>
                    </tr>
                
                <?php
                    }      
                   
                }
                ?>
            </tbody>
        </table>
        <?php 
                    if($total_records!=0&&$total_records>$limit)
                    {
                        if(empty($_REQUEST["timkiem"]))
                        {
                ?>
                        <div class="phantrang">
                         <?php
                            if ($current_page > 1 && $total_page > 1){
                                echo '<a class="btnPN" href="QuanLyUser.php?page='.($current_page-1).'">←</a></button>';
                            }
                
                            for ($i = 1; $i <= $total_page; $i++){
                
                                if ($i == $current_page){
                                    echo '<span class="btnpt" style="color: white;font-size: 16px;   background: linear-gradient(to bottom right, #5a5a5a, #a0a0a0);">'.$i.'</span>';
                                }
                                else{
                                    echo '<a class="btnpt" href="QuanLyUser.php?page='.$i.'">'.$i.'</a>';
                                }
                            }
                            if ($current_page < $total_page && $total_page > 1){
                                echo '<a  class="btnPN" href="QuanLyUser.php?page='.($current_page+1).'">→</a> ';
                            }
                            ?>
                        </div>
                <?php
                            
                        }else{
                            ?>
                            <div class="phantrang">
                            <?php
                               if ($current_page > 1 && $total_page > 1){
                                   echo '<a class="btnPN" href="QuanLyUser.php?page='.($current_page-1).'&timkiem='.$_REQUEST["timkiem"].'">←</a></button>';
                               }
                   
                               for ($i = 1; $i <= $total_page; $i++){
                   
                                   if ($i == $current_page){
                                       echo '<span class="btnpt" style="color: white;font-size: 16px;   background: linear-gradient(to bottom right, #5a5a5a, #a0a0a0);">'.$i.'</span>';
                                   }
                                   else{
                                       echo '<a class="btnpt" href="QuanLyUser.php?page='.$i.'&timkiem='.$_REQUEST["timkiem"].'">'.$i.'</a>';
                                   }
                               }
                               if ($current_page < $total_page && $total_page > 1){
                                   echo '<a  class="btnPN" href="QuanLyUser.php?page='.($current_page+1).'&timkiem='.$_REQUEST["timkiem"].'">→</a> ';
                               }
                               ?>
                           </div>
                        <?php
                        }
                        ?>

              <?php        
                    }
                ?>
<?php include_once("TemplateAdminDuoi.php");?>

<script>
    function validateForm() {
    if (document.getElementById('hoten').value == "") {
        swal("Họ tên không được trống!","You clicked the button!", "warning");
        return false;
    }
    if( document.getElementById("NgaySinh").value == "" ){
        swal("Chưa chọn ngày sinh!","You clicked the button!", "warning");
        return false;;
    }
    }    
    function popupUpdate(ID,HoTen,NgaySinh,GioiTinh){
    modal.style.display = "block";
    btnThem.style.display = "none";
    btnCapNhat.style.display = "block";
    document.getElementById('ID').value=ID;
    document.getElementById('hoten').value=HoTen;
    document.getElementById('ngaysinh').value=NgaySinh;
    document.getElementById('gioitinh').value=GioiTinh;
    

    }                           
</script>
<?php
                    if(isset($_REQUEST["btnThem"]))
                    {
                            $sql = "INSERT INTO user(HoTen, NgaySinh, GioiTinh) VALUES ('".$_REQUEST["hoten"]."','".$_REQUEST["ngaysinh"]."','".$_REQUEST["gioitinh"]."')";
                            DataProvider::ExecuteQuery($sql);
                            
                            echo '<script type="text/javascript">
                            swal("Thêm người mới thành công!!","You clicked the button!", "success")
                            .then((value) => {
                                if(value==true)
                                {
                                window.location = "QuanLyUser.php"
                                }
                              });
                                
                            </script>';
                       
                    }
                    if(isset($_REQUEST["btnCapNhat"]))
                    {
                            $sql = "Update user set HoTen='".$_REQUEST["hoten"]."',NgaySinh='".$_REQUEST["ngaysinh"]."',GioiTinh=".$_REQUEST["gioitinh"]." where ID=".$_REQUEST["ID"];
                            DataProvider::ExecuteQuery($sql);
                            
                            echo '<script type="text/javascript">
                            swal("Cập nhật thành công!!","You clicked the button!", "success")
                            .then((value) => {
                                if(value==true)
                                {
                                window.location = "QuanLyUser.php"
                                }
                              });
                                
                            </script>';
                       
                    }
?>