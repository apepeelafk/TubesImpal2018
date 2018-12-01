<?php
	session_start();
	$title = "Pengembalian";
	require_once "./template/header.php";
	require_once "./functions/database_functions.php";
	$conn = db_connect();
	$result = getAllpeminjaman($conn);
?>
    <form method="POST">
        <table class="table" style="margin-top: 20px">
            <tr>
                <th>Kode Peminjaman</th>
                <th>Tanggal</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Kota</th>
                <th>Kode Pos</th>
                <th>negara</th>
            </tr>
            <?php while($row = mysqli_fetch_assoc($result)){ ?>
            <tr>
                <td><?php echo $row['orderid']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['ship_name']; ?></td>
                <td><?php echo $row['ship_address']; ?></td>
                <td><?php echo $row['ship_city']; ?></td>
                <td><?php echo $row['ship_zip_code']; ?></td>
                <td><?php echo $row['ship_country']; ?></td>
                <?php 
                    echo "<td><a href='delete.php?id=" . $row['orderid'] . "'>Kembalikan</a></td>";
                ?>
        </tr>
            </tr>
            <?php } ?>
        </table>
    </form>

<?php
	if(isset($conn)) {mysqli_close($conn);}
	require_once "./template/footer.php";
    if ($_POST['submit'])
    {
        $id = $_POST['submit'];
        $id = end(explode(" ",$orderid));

        $delete = "delete from 'orders' where orderid=$orderid";
        mysqli_query($con,$delete);
        header("Location:user.php");
}
?>