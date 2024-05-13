<?php 

//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "uas_web");

function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ){
		$rows[] = $row;

	}
	return $rows;
}	



function tambah($data){
	global $conn;
	$title =  htmlspecialchars($data ["title"]);
	$category = htmlspecialchars($data ["category"]);
	$author = htmlspecialchars($data ["author"]);
	$date_published = htmlspecialchars($data ["date_published"]);
	$price = htmlspecialchars($data ["price"]);

	$query = "INSERT INTO datas_book
	VALUES 
	('', '$title', '$category', '$author',  '$date_published', '$price')
	";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}

function hapus($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM datas_book WHERE id = $id " );
	return mysqli_affected_rows($conn);
}


function edit($data){
	global $conn;

	$id = $data["id"];
	$title =  htmlspecialchars($data ["title"]);
	$category = htmlspecialchars($data ["category"]);
	$author = htmlspecialchars($data ["author"]);
	$date_published = htmlspecialchars($data ["date_published"]);
	$price = htmlspecialchars($data ["price"]);

	$query = " UPDATE datas_book SET 

			title = '$title',
			category ='$category',
			author = '$author',
			date_published ='$date_published',
			price = '$price'

			WHERE id = $id

			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}



function registrasi($data) {
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('username Already used !')
				</script>";
	return false;
	}


	/// cek konfirmasi password
	if( $password !== $password2) {
		echo "<script>
			alert(' Password Not Match !');
			</script>";
			return false;

	}
	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// masukkan ke dalam database
	mysqli_query($conn, "INSERT INTO user VALUES('', '$username', 'password')");
	return mysqli_affected_rows($conn);

}





 ?>


