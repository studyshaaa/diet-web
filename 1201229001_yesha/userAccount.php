<?php
require 'database.php';
// Membuat objek koneksi
$database = new Database();

// Mendapatkan objek PDO
$pdo = $database->getConnection();


class UserAccount{
    private $user_id;
    private $username;
    private $password;
    private $email;
    private $basisdata;

    function __construct($nama=null,$pass=null,$mail=null,$status=null)
    {
        $this->basisdata = new database();

        if($nama != null && $pass != null && $mail != null && $status != null){
            $this->username = $nama;
            $this->password = $pass;
            $this->email = $mail;
        }
    }

    public function simpan()
    {
        $sql = 'INSERT INTO user (username, password, email) VALUES (?, ?, ?)';
        $statement = $this->basisdata->getConnection()->prepare($sql);

        if($statement->execute([$this->username, $this->password, $this->email])){
            echo "data tersimpan!";
        } else {
            echo "data tidak tersimpan!";
        }
    }

    public function tampilSemua()
    {
        $sql = 'SELECT * FROM user';
        $statement = $this->basisdata->getConnection()->query($sql);
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function hapus($id)
    {
        $sql = 'DELETE FROM user WHERE user_id = :id';
        $statement = $this->basisdata->getConnection()->prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);

        if ($statement->execute()) {
            $pesan['status'] = 'Hapus berhasil';
            return $pesan;
        } else {
            $pesan['status'] = 'Hapus gagal';
            return $pesan;
        }
    }

    public function tampilNama()
    {
        echo $this->username;
    }

    public function auth($user, $password)
    {
        $sql = 'SELECT * FROM user WHERE username=:usr AND password=:pwd LIMIT 1';
        $statement = $this->basisdata->getConnection()->prepare($sql);
        $statement->bindParam(':usr', $user, PDO::PARAM_STR);
        $statement->bindParam(':pwd', $password, PDO::PARAM_STR);
        $statement->execute();
        $data = $statement->fetch();
        return $data;
    }
    
}
?>
