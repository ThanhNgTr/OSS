

<?php
include './include/conn.php';
$strSQL="SELECT *  FROM sua a, loai_sua b,hang_sua c where a.Ma_loai_sua=b.Ma_loai_sua and c.Ma_hang_sua=a.Ma_hang_sua LIMIT 0,8 ";
$result = mysqli_query($conn, $strSQL);
$i=0;
?>
<table border="1" align="center">
    <tr>
        <th colspan="5"><h1>Thong tin cac san pham</h1></th>
    </tr>
    <?php if(mysqli_num_rows($result)!==0) :?>
        <?php foreach ($result as $item ) :?>

            <?php if ($i==0) {echo '<tr>';}  $i++?>
            <td align="center">
                <strong><?php echo $item['Ten_sua'] ?> </strong>
                <br>
                <?php echo  $item['Trong_luong'] . '-' . $item['Don_gia'].' VND' ?>
                <br>
                <img src="./BaiTapTH/SQL/Bai2/Anh_Sua/<?php echo $item['Hinh'] ?> "width="180px" height="180px">
            </td>

            <?php if ($i==3) {echo '</tr>';$i=0;}?>
        <?php endforeach;?>

    <?php endif;?>
</table>
