<?php
include_once("koneksi.php");
?>
<h3>Form Pencarian DATA KHS Dengan PHP </h3>
<form action="" method="get">
    <label>Cari :</label>
    <input type="text" name="cari">
    <input type="submit" value="Cari">
</form>
<?php
if (isset($_GET['cari'])) {
    $cari = $_GET['cari'];
    echo "<b>Hasil pencarian : " . $cari . "</b>";
}
?>
<table border="1">
    <tr>
        <th>No</th>
        <th>NIM</th>
        <th>kode MK</th>
        <th>Nilai</th>
    </tr>
    <?php
    if (isset($_GET['cari'])) {
        $cari = $_GET['cari'];
        $sql = "select * from khs where nim like'%" . $cari . "%'";
        $tampil = mysqli_query($koneksi, $sql);
    } else {
        $sql = "select * from khs";
        $tampil = mysqli_query($koneksi, $sql);
    }
    $no = 1;
    while ($r = mysqli_fetch_array($tampil)){
    ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $r['nim']; ?></td>
            <td><?php echo $r['kodeMK']; ?></td>
            <td><?php echo $r['nilai']; ?></td>
        </tr>
    <?php } ?>
</table>