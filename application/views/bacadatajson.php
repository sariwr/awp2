<!DOCTYPE html>
<html>
	<head>
		<title>
			baca data json dari data encoding Indra
		</title>
	</head>
	<body>
		<div id="demo"></div>
		<script type="text/javascript" src="http://localhost/ci_point-jsonxml/assets/bootstrap/vendor/jquery/jquery.min.js"></script>
		<script type="text/javascript">
			var source = "http://milikindra.pe.hu/index.php/user/jsonwrite"; //wajib di sesuaikan alamat sourcenya
			
			$.getJSON(source, function(data){
				$.each(data.tabeluser, function(i,dtuser){
					$("#demo").append(
						"Id User : " + dtuser.id_user + "<br>" +
						"Nama : " + dtuser.nama + "<br>" +
						"NIP : " + dtuser.nip + "<br>" +
						"Jenis Kelamin : " + dtuser.jk + "<br>" +
						"Jabatan : " + dtuser.jabatan + "<br>" +
						"Telepon : " + dtuser.telp + "<br>"  +
						"Nama Pengguna : " + dtuser.username + "<br>" + "<br>" 
						

					);
				});
			});
		
		
		</script>
	</body>
		
</html>