@extends('layouts.app')

 @section('content')

 <div class="container">
  <p align="center">        <img src="..\logo.png" height="200" width="200"></p>
 <h3>Tambah Data Mahasiswa</h3>
  <h4><font face="Elephant">STMIK AUB SURAKARTA</h4></font><br>



 <form action="{{ url('/mahasiswa') }}" method="POST">
 @csrf
 <table>
 <tr>
 <td>NIM</td>
 <td><input type="text" name="mhsw_nim"></td>
 </tr>
 <tr>
 <td>NAMA</td>
 <td><input type="text" name="mhsw_nama"></td>
 </tr>
 <tr>
 <td>JURUSAN</td>
 <td><select name="mhsw_jurusan" id="mhsw_jurusan">
        <option value="">-- Pilih --</option>
        <option value="Sistem Komputer">S-1 Sistem Komputer</option>
        <option value="Sistem Informasi">S-1 Sistem Informasi</option>
        <option value="Teknik Komputer">D-3 Teknik Komputer</option>
      </select></td>
 </tr>
 <tr>
 <td>JENIS KELAMIN</td>
 <td><input name="gender" type="radio" value="Laki-Laki" <? if($jekel=='Laki-Laki'){echo 'checked';}?>
        Laki-Laki  <input type="radio" name="gender" value="Perempuan" <? if($jekel=='Perempuan'){echo 'checked';}?>
        Perempuan</td>
 </tr>
 <tr>
 	<td>LULUSAN</td>
 	<td>
 		<div class="form-check">
 		<input class="form-check-input" type="checkbox" value="SD" id="defaultCheck1" name="lulusan[]">
  		<label class="form-check-label" for="defaultCheck1">
    	SD
  		</label>
  		</div>
  		 		<div class="form-check">
 		<input class="form-check-input" type="checkbox" value="SMP" id="defaultCheck1" name="lulusan[]">
  		<label class="form-check-label" for="defaultCheck1">
    	SMP
  		</label>
  		</div>
  		 		<div class="form-check">
 		<input class="form-check-input" type="checkbox" value="SMA/SMK" id="defaultCheck1" name="lulusan[]">
  		<label class="form-check-label" for="defaultCheck1">
    	SMA / SMK
  		</label>
  		</div>
  	</td>
 </tr>
 <tr>
 <td>ALAMAT</td>
 <td><input type="text" name="mhsw_alamat"></td>
 </tr>
 <tr>
 <td></td>
 <td><br><input type="submit" value="SIMPAN"></td>
 </tr>
 </table>
 </form>
 </div>
@endsection