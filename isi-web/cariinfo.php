<?php
session_start();
include "../config/koneksi.php";
include "index.php";
?>
<link rel="stylesheet" href="../css/style.css">
<div id="border">
<h2> Info Modifikasi dengan Kode "<?php echo $_GET['q'];?>"<h2>
    
    <!-- menampilkan hasil pencarian -->
    <?php
    if(isset($_GET['q']) && $_GET['q']){
    	$conn = mysql_connect("localhost", "root", "");
    	mysql_select_db("dbhitech");
    	$q = $_GET['q'];
    	$sql = "select * from tb_info where kode_transaksi like '%$q%'";
        $no=1;
    	$result = mysql_query($sql);
    	if(mysql_num_rows($result) > 0){
  		?>

<table width='100%' border='1' cellpadding='2' cellspacing='0'>
<tr bgcolor='grey'>
		<th>  No  </th>
       
        <th>  Kode Transaksi  </th>
        <th>  Pelanggan  </th>
        <th>  Motor  </th>
        <th>  Pilihan Modifikasi  </th>
        <th>  Status Modifikasi  </th>
        <th>  Gambar  </th>
        
     </tr>
<?php
while ($data = mysql_fetch_array($result)){ //mysql_fetch_array = get the query data into array
?>
  <tr align='center'>
  			<td ><?php echo$no;?></td>
            
            <td><?php echo $data['kode_transaksi'];?></td>
            <td><?php echo $data['pelanggan'];?></td>
            <td><?php echo $data['motor'];?></td>
            <td><?php echo $data['pilihan_modif'];?></td>
            <td><?php echo $data['status_modifikasi'];?></td>
            <td><img src="../info-modifikasi/foto/<?php echo $data[gambar];?>" width="65"></td>
           
       </tr>
<?php
$no++;
}
?>
</table>
    <h3 align="right"><i>Klik kanan untuk memperbesar gambar </h3>
</div>
    <?php
    	}else{
    		echo 'Data Not Found!';
    	}
    }
    ?>