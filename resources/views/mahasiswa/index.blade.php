@extends('layouts.app')

 @section('content')
<!DOCTYPE html>
 <html>
 	<head> 	<p align="center">				<img src="logo.png" height="200" width="200"></p>

 		<title></title>
 		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
 	</head>
 	<body>
 		<div class="container">
 			<div class="row">
 				<h3>Daftar Mahasiswa	<br> 
 					  <h4><font face="Elephant">STMIK AUB SURAKARTA</h4></font><br>
<p>Cari Data Mahasiswa :</p>
	<form action="/mahasiswa/cari" method="GET">
		<input type="text" name="cari" placeholder="Cari Mahasiswa .." value="{{ old('cari') }}">
		<input type="submit" value="CARI">
	</form>
		
	<br/>

 					<a href="{{ url('mahasiswa/create') }}">Tambah Data</a></h3></br>

 			<table class="table">
 			<tr>
 			<td><strong>NIM</strong></td>
 			<td><strong>NAMA</strong></td>
			 <td><strong>JURUSAN</strong></td>
			 <td><strong>ALAMAT</strong></td>
			 <td><strong>JENIS KELAMIN</strong></td>
			 <td><strong>LULUSAN</strong></td>
			 <td colspan="2" class="text-center"><strong>ACTION</strong></td>
 			</tr>

 		@foreach($rows as $row)
 			<tr>
 			<td>{{ $row->mhsw_nim }}</td>
 			<td>{{ $row->mhsw_nama }}</td>
 			<td>{{ $row->mhsw_jurusan }}</td>
			<td>{{ $row->mhsw_alamat }}</td>
			<td>{{ $row->mhsw_jenkel }}</td>
			<td>
				@php $lulusanData = json_decode($row->mhsw_lulusan, true) @endphp
				@foreach($lulusanData as $lulusan)
					{{ $lulusan }}
				@endforeach
			</td>
 			<td><a href="{{ url('mahasiswa/' . $row->mhsw_id. '/edit') }}">Edit</a></td>
 			<td><a href="{{ url('mahasiswa/' . $row->mhsw_id. '/delete') }}">Delete</a></td>
			 
 			</tr>
 			@endforeach
 			</table>
			 </div>
 			@endsection
 
 		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>
</html>