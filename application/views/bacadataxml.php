<!DOCTYPE html>
<html>
	<head>
		<title>
			baca data XML dari data encoding Indra
		</title>
	</head>
	<body>
		<?PHP
			if(isset($xml) AND !empty($xml)){
				foreach($xml AS $dataxml){
					echo "Id User 		: ".$dataxml->id_user."</br>";
					echo "Nama			: ".$dataxml->nama."</br>";
					echo "NIP			: ".$dataxml->nip."</br>";
					echo "Jenis Kelamin	: ".$dataxml->jk."</br>";
					echo "Jabatan		: ".$dataxml->jabatan."</br>";
					echo "Telp.			: ".$dataxml->telp."</br>";
					echo "Nama Pengguna	: ".$dataxml->username."</br>";
					echo "</br></br>";
				}
			}
			else 
			{
				echo "Belum ada data<br>";
			}
		?>
	</body>
		
</html>