<?php include_once("TemplateAdminTren.php");?>

<div style="text-align: center">
    <form action="" method="post">
        <input class="search" type="text" autocomplete="off"  placeholder="Tìm kiếm theo họ tên..." name="timkiem" id="timkiem" value="<?php if(!empty($_REQUEST["timkiem"])){echo $_REQUEST["timkiem"];}?>"/>
        <input type="submit" value="" style="margin: 20px 0px;position: absolute;width: 30px; height: 30px; background-image: url(HinhAnh/search.png); background-repeat: no-repeat; background-size: 100% 100%; border-radius: 5px; "></input>
    </form>
</div>
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
       
<?php include_once("TemplateAdminDuoi.php");?>
