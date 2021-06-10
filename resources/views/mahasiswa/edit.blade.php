@extends('layouts.app')

 @section('content')

 <div class="container">
<p align="center">        <img src="..\logo.png" height="200" width="200"></p>
 <h3>Edit Data Mahasiswa</h3>
   <h4><font face="Elephant">STMIK AUB SURAKARTA</h4></font>

 <form action="{{ url('/mahasiswa/' . $row->mhsw_id) }}" method="POST">
 <input name="_method" type="hidden" value="PATCH">
 @csrf
 <table>
 <tr>
 <td>NIM</td>
 <td><input type="text" name="mhsw_nim" value="{{ $row->mhsw_nim }}"></td>
 </tr>
 <tr>
 <td>NAMA</td>
 <td><input type="text" name="mhsw_nama" value="{{ $row->mhsw_nama }}"></td>
 </tr>
 <tr>
 <td>JURUSAN</td>
 <td><select name="mhsw_jurusan" id="mhsw_jurusan">
        <option value="">-- Pilih --</option>
        <option value="Sistem Komputer" {{ $row->mhsw_jurusan == "Sistem Komputer" ? 'selected' : '' }}>Sistem Komputer</option>
        <option value="Sistem Informasi" {{ $row->mhsw_jurusan == "Sistem Informasi" ? 'selected' : '' }}>Sistem Informasi</option>
        <option value="Teknik Komputer" {{ $row->mhsw_jurusan == "Teknik Komputer" ? 'selected' : '' }}>Teknik Komputer</option>
      </select></td>
 </tr>
  <tr>
 <td>JENIS KELAMIN</td>
 <td>
 	<input name="gender" type="radio" value="Laki-Laki" {{ $row->mhsw_jenkel == 'Laki-Laki' ? 'checked' : '' }}>Laki-Laki
	<input type="radio" name="gender" value="Perempuan" {{ $row->mhsw_jenkel == 'Perempuan' ? 'checked' : '' }}>Perempuan</td>
 </tr>
 <tr>
 	<td>LULUSAN</td>
 	<td>
	@php $lulusanData = json_decode($row->mhsw_lulusan, true) @endphp
 		<div class="form-check">
 		<input class="form-check-input" type="checkbox" value="SD" id="defaultCheck1" name="lulusan[]"	{{ in_array("SD", $lulusanData) ? 'checked' : ''}}>
  		<label class="form-check-label" for="defaultCheck1">
    	SD
  		</label>
  		</div>
  		 		<div class="form-check">
 		<input class="form-check-input" type="checkbox" value="SMP" id="defaultCheck1" name="lulusan[]"	{{ in_array("SMP", $lulusanData) ? 'checked' : ''}}>
  		<label class="form-check-label" for="defaultCheck1">
    	SMP
  		</label>
  		</div>
  		 		<div class="form-check">
 		<input class="form-check-input" type="checkbox" value="SMA/SMK" id="defaultCheck1" name="lulusan[]"	{{ in_array("SMA/SMK", $lulusanData) ? 'checked' : ''}}>
  		<label class="form-check-label" for="defaultCheck1">
    	SMA / SMK
  		</label>
  		</div>
  	</td>
 </tr>
 <tr>
 <td>ALAMAT</td>
 <td><input type="text" name="mhsw_alamat" value="{{ $row->mhsw_alamat }}"></td>
 </tr>
 <tr>
 <td></td>
 <td><br><input type="submit" value="UPDATE"></td>
 </tr>
 </table>
 </form>
 </div>
 @endsection