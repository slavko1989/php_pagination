<?php
include_once("conn.php");

$sql = "select * from product";
$res = mysqli_query($conn,$sql);

$num_per_page = 3;
if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1;
}
$start_from=($page-1)*3;
$sql = "select * from product limit $start_from,$num_per_page";
$res = mysqli_query($conn,$sql);








?>

<!DOCTYPE html>
<html>

<HEAD>
    <title>Pagination in php</title>
</HEAD>

<body>
    <table align="center" border="1px">
        <tr>
            <th>PRODUCT NAME</th>
            <th>PRODUCT TEXT</th>
        </tr>

        <?php
        while($rows = mysqli_fetch_array($res)){
        ?>

        <tr>
            <td><?php echo $rows['product_name']; ?></td>
            <td><?php echo $rows['product_text']; ?></td>
        </tr>
        <?php } ?>
    </table>

    <?php 

    $sql = "select * from product";
     $result = mysqli_query($conn,$sql);
     $total = mysqli_num_rows($result);
     $total_pages =ceil($total/$num_per_page);

     for($i=1;$i<=$total_pages;$i++){
        echo "<a href='index.php?page=".$i."'>".$i."</a>";
     }
    
    ?>
</body>

</html>