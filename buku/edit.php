<?php 
include '../koneksi.php';

$id_buku = $_GET["id_buku"];
$query = mysqli_query($kon,"SELECT * FROM buku INNER JOIN kategori ON buku.id_kategori = kategori.id_kategori WHERE id_buku=$id_buku");
$buku = mysqli_fetch_assoc($query);
include '../aset/header.php';
 ?>


 <div class="container">
 	<div class="row mt-4">
 		<div class="col-md">
 <center>
 <div class="card" style="width: 100%;">
 <div class="card-header" style="width: 100%;">
 	<h2 class="card-header"><i class="fas fas fa-book"></i>Edit Buku</h2>
 </div>
 <div class="card-body">
<form action="edit-proses.php" method="post">
<table class="table">
 <input type="hidden" name="id_buku" value="<?= $buku['id_buku']; ?>">
 <tr>
 	<td>Judul Buku</td>
    <td><input style="width:100%" type="text" name="judul" value="<?= $buku['judul'];?>" required></td>
</tr>
<tr>
 	<td>Penerbit</td>
    <td><input style="width:100%" type="text" name="penerbit" value="<?= $buku['penerbit'];?>" required></td>
</tr>
<tr>
 	<td>Pengarang</td>
    <td><input style="width:100%" type="text" name="pengarang" value="<?= $buku['pengarang'];?>" required></td>
</tr>
<tr>
 	<td>Ringkasan</td>
    <td style=""><textarea style="width:100%; height: 100px;" value="<?php $buku['cover']; ?>" type="textarea" name="ringkasan" required><?= $buku['ringkasan'];?></textarea></td>
</tr><input style="width:100%" type="hidden" name="cover" value="<?php $buku['cover']; ?>">
<tr>
 	<td>Stok</td>
    <td><input style="width:100%" type="text" name="stok" value="<?= $buku['stok'];?>" required></td>
</tr>
<tr></td>
    
</tr>
<tr>
	<td>Kategori</td>
	<td>
		<select style="width: 200px" name="id_kategori" required>
		
				<?php 
				$query = mysqli_query($kon, "SELECT * FROM buku INNER JOIN kategori ON buku.id_kategori = kategori.id_kategori WHERE id_buku=$id_buku");
				         while ($query_kategori = mysqli_fetch_assoc($query)){;
				          	?>
				         <option value="<?php echo $query_kategori['id_kategori']; ?>">
				             <?php echo $query_kategori['kategori']; ?>
				         </option>
                        <?php }; ?>
			
			</select>
			</td>
			</tr>
			</tr>
        <tr>
 	         <th></th>
             <th><button style="width:100; height: 70px" type="submit" class="btn btn-primary" name="simpan">Edit</button></th>
       </tr>
</table>
</form>
</div>
</div>
</div>
</div>
</div> 
</center>

 <?php 
include '../aset/footer.php';
  ?>