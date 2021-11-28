<?php
class modul4{
	var $hostname = "localhost";
	var $username = "root";
	var $password = "";
	var $databasename = "wad_modul4";
	var $koneksi;
 
	function __construct(){
		$this->koneksi = mysqli_connect($this->hostname, $this->username, $this->password, $this->databasename);
	}

	function addCatalog($userId, $tempat, $lokasi, $harga, $tanggal){
			$inputData = mysqli_query($this->koneksi,"INSERT INTO booking (user_id, nama_tempat, lokasi, harga, tanggal) VALUES ('$userId','$tempat','$lokasi','$harga', '$tanggal')");
			if($inputData){
				return true;
			}
			return false;
	}

	function delete($id){
		$query = "DELETE FROM booking WHERE id='$id'";
		mysqli_query($this->koneksi, $query);
	}

	function show($id){
		$show = "SELECT * FROM booking WHERE user_id='$id'";
		$query = mysqli_query($this->koneksi, $show);
		return $query;
	}

	function detailProfile($id){
		$show = "SELECT * FROM users WHERE id = '$id'";
		$query = mysqli_query($this->koneksi, $show);
		return $query;
	}

	function editProfile($nama,$email,$phone,$pass){
		$query = mysqli_query($this->koneksi,"UPDATE users SET nama='$nama',no_hp='$phone',password='$pass' WHERE email='$email'");
		session_start();
		$_SESSION['nama'] = $nama;
		return $query;
	}
 
 
     function registrasi($nama,$email,$phone,$pass)
	{	
		$insert = mysqli_query($this->koneksi,"INSERT INTO users (nama, email, no_hp, password) VALUES ('$nama','$email','$phone','$pass')");
		if($insert){
			return true;
		}
		return false;
	}
 
	function login($email,$pass)
	{
		$query = mysqli_query($this->koneksi,"SELECT * FROM users WHERE email='$email'");
		$data_user = $query->fetch_array();
		echo $data_user['password'];
		$id = $data_user['id'];

		if(password_verify($pass,$data_user['password']))
		{
				setcookie('email', $email, time() + (60 * 60 * 24 * 5), '/');
				setcookie('nama', $data_user['nama'], time() + (60 * 60 * 24 * 5), '/');
				setcookie('id', $data_user['id'], time() + (60 * 60 * 24 * 5), '/');
				echo 'berhasil';
			session_start();
			$_SESSION['id'] = $id;
			$_SESSION['pass'] = $pass;
			$_SESSION['nama'] = $data_user['nama'];
			$_SESSION['is_login'] = TRUE;
			return TRUE;
		}
	}
 
	function relogin($username)
	{
		$query = mysqli_query($this->koneksi,"select * from user where email='$username'");
		$data_user = $query->fetch_array();
		$_SESSION['username'] = $username;
		$_SESSION['nama'] = $data_user['nama'];
		$_SESSION['id'] = $data_user['id'];
		$_SESSION['is_login'] = TRUE;
	}
} 
?>