<?php
include('authentication.php');
include('header.php');
include('Lab.php');
$lab = new Lab();
$datalab = $lab->tampilSemua();
?>

<div class="tampilan">
    <h2>Peminjaman Ruangan Lab</h2>
    <div class="form-reg">
        <form action="pinjam_controller.php" method="POST">
            <label>Username:</label>
            <input type="text" name="user" value="<?=$_SESSION['usr'];?>" readonly="true"/>
            <input type="hidden" name="iduser" value="<?=$_SESSION['iduser'];?>"/>
            <label>Nama Lab:</label>
            <select name="slcnamalab">
                <option value="">Pilih Lab</option>
                <?php foreach($datalab as $data):?>
                <option value="<?=$data['idlaboratorium'];?>"><?=$data['namalab'];?></option>
                <?php endforeach;?>
            </select>
            <label>Waktu Pinjam:</label>
            <input type="date" name="tglpinjam"/><input type="time" name="waktupinjam"/>
            <label>Nama kegiatan:</label>
            <input type="text" name="namakeg" />
            <input type="submit" name="sbtsimpan" value="Simpan" />
        </form>
    </div>
</div>

<?php
include('footer.php');
?>
