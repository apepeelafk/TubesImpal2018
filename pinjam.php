<?php
	session_start();
	require_once "./functions/database_functions.php";
	require_once "./functions/pinjam_functions.php";

	if(isset($_POST['bookisbn'])){
		$book_isbn = $_POST['bookisbn'];
	}

	if(isset($book_isbn)){
		if(!isset($_SESSION['pinjam'])){
			$_SESSION['pinjam'] = array();

			$_SESSION['total_items'] = 0;
		}

		if(!isset($_SESSION['pinjam'][$book_isbn])){
			$_SESSION['pinjam'][$book_isbn] = 1;
		} elseif(isset($_POST['pinjam'])){
			$_SESSION['pinjam'][$book_isbn]++;
			unset($_POST);
		}
	}

	if(isset($_POST['save_change'])){
		foreach($_SESSION['pinjam'] as $isbn =>$qty){
			if($_POST[$isbn] == '0'){
				unset($_SESSION['pinjam']["$isbn"]);
			} else {
				$_SESSION['pinjam']["$isbn"] = $_POST["$isbn"];
			}
		}
	}

	$title = "peminjaman";
	require "./template/header.php";
	$date = date("Y-m-d");
	$returndate = date("Y-m-d", strtotime("+7 days"));

	if(isset($_SESSION['pinjam']) && (array_count_values($_SESSION['pinjam']))){
	
	$_SESSION['total_items'] = total_items($_SESSION['pinjam']);
		
?>
   	<form action="pinjam.php" method="post">
	   	<table class="table">
	   		<tr>
	   			<th>Barang</th>
	  			<th>Tanggal Pinjam</th>
	   			<th>Tanggal Kembali</th>
	   			<th>Jumlah</th>
	   		</tr>
	   		<?php
		    	foreach($_SESSION['pinjam'] as $isbn => $qty){
					$conn = db_connect();
					$book = mysqli_fetch_assoc(getBookByIsbn($conn, $isbn));
			?>
			<tr>
				<td><?php echo $book['book_title'] . " by " . $book['book_author']; ?></td>
				<td><p><?php echo $date ?></p></td>
				<td><p><?php echo $returndate ?></p></td>
				<td><input type="text" value="<?php echo $qty; ?>" size="2" name="<?php echo $isbn; ?>"></td>
			</tr>
			<?php } ?>
		    <tr>
		    	<th>&nbsp;</th>
		    	<th>&nbsp;</th>
		    	<th>&nbsp;</th>
		    	<th><?php echo $_SESSION['total_items']; ?></th>
		    </tr>
	   	</table>
	   	<input type="submit" class="btn btn-primary" name="save_change" value="Simpan">
	</form>
	<br/><br/>
	<a href="checkout.php" class="btn btn-primary">Pinjam</a> 
	<a href="books.php" class="btn btn-primary">Cari Buku Lain</a>
<?php
	} else {
		echo "<p class=\"text-warning\">Keranjang anda Kosong!</p>";
	}
	if(isset($conn)){ mysqli_close($conn); }
	require_once "./template/footer.php";
?>