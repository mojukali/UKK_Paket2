<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <title>Tambah Tugas</title>
   <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="{{ asset('css/create.css') }}">

</head>

<body>
   <div class="create-header">
      <h1>Ingin menambah apa hari ini?</h1>
   </div>

   <div class="create-container" style="font-weight: bold">
      <h2>Tambah Daftar</h2>
      <form action="{{ route('tasks.store') }}" method="POST">
         @csrf
         <hr>

         <div class="create-radio-group">
            <label><input type="radio" name="proritas" value="priority"> <strong
                  class="text-blue">Prioritas</strong></label>
            <label><input type="radio" name="proritas" value="non-priority"> <strong class="text-yellow">Non
                  Prioritas</strong></label>
         </div>

         <label for="judul"><i style="color: crimson">* </i>Judul</label>
         <input type="text" id="judul" name="judul" class="create-input">

         <label for="deskripsi">Deskripsi</label>
         <textarea id="deskripsi" name="deskripsi" class="create-textarea"></textarea>

         <label for="deadline"><i style="color: crimson">* </i>Tenggat Waktu</label>
         <input type="date" id="deadline" name="deadline" class="create-input">
         <div class="button-wrapper">
            <a href="{{ route('tasks.index') }}" class="create-btn back-btn">Kembali</a>
            <button type="submit" class="create-btn">Simpan</button>
        </div>  
      </form>
   </div>
</body>

</html>
