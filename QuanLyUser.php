<?php include_once("TemplateAdminTren.php");?>
<?php

        if(!empty($_SESSION["HuyDH"]))
        {
            if($_SESSION["HuyDH"]==1)
            {
                echo '<script type="text/javascript">
                swal("Hủy đơn hàng thành công!","You clicked the button!", "success");
                </script>';
                $_SESSION["HuyDH"]='';
            }
        }

    ?>
<div style="text-align: center">
    <form action="" method="post">
        <input class="search" type="text" autocomplete="off"  placeholder="Tìm kiếm theo họ tên..." name="timkiem" id="timkiem" value="<?php if(!empty($_REQUEST["timkiem"])){echo $_REQUEST["timkiem"];}?>"/>
        <input type="submit" value="" style="margin: 20px 0px;position: absolute;width: 30px; height: 30px; background-image: url(HinhAnh/search.png); background-repeat: no-repeat; background-size: 100% 100%; border-radius: 5px; "></input>
    </form>
</div>
                <?php
                    
                    if(empty($_REQUEST["timkiem"]))
                    {
                        $sql="select count(*) as total FROM user";
                    }else{
                        $sql=" select count(*) as total FROM user AND TenKH LIKE N'%".$_REQUEST["timkiem"]."%' ";
                    }
                    $query=DataProvider::ExecuteQuery($sql);
                    $data = mysqli_fetch_array($query);
                    $total_records = $data['total'];
                    $limit = 12;
                    if($total_records==0)
                    {
                        ?>
                        <p style=" font-family: 'Montserrat'; color: #131313; font-weight: 400; text-align: center; font-size: 16px; line-height: 33px; margin-top: 10px; ">Hiện tại không có đơn hàng nào cần xử lý!!!</p>
                        <?php
                    }
                    else
                    {
                        ?>
                        <table class="table lsmh">
                        <thead>
                            <tr>
                            <th scope="col" style="width: 60%;">HỌ TÊN</th>
                            <th scope="col" style="width: 30%;">NGÀY SINH</th>
                            <th scope="col" style="width: 10%;">GIỚI TÍNH</th>
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
                            $sql=" select * FROM user and HoTen like N'%".$_REQUEST["timkiem"]."%' order by ID asc LIMIT $start , $limit";
                        }
                        
                        
                       
                        $query=DataProvider::ExecuteQuery($sql);
                        while($data = mysqli_fetch_array($query))
                            {
                                $date = new DateTime($data['NgaySinh']);
                                
                ?>
                <tr>
                    <td>
                        <p style="margin: 10px;"><?php echo $data["HoTen"];?> </p>
                    </td>
                    <td>
                        <p><?php echo $date->format('d/m/Y'); ?></p>
                    </td>
                    <td>
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
                            window.location.href="../XuLy/XuLyHuyDonHang.php?MaHD=<?php echo $data["ID"]?>&vt=1";
                        } else {
                            swal("Hủy thao tác thành công!");
                        }
                        });
                    ' ><img src="HinhAnh/delete.png" style="width:20px;height:20px;"></a></p>
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
