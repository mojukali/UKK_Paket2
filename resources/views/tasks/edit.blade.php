<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <title>Edit Tugas</title>
   <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="{{ asset('css/create.css') }}">
</head>

<body>
   <div class="create-header">
      <h1>Apakah Anda yakin untuk mengedit data berikut?</h1>
   </div>

   <div class="create-container" style="font-weight: bold">
      <h2>Edit Daftar</h2>
      <form action="{{ route('tasks.update', $task->id) }}" method="POST">
         @csrf
         @method('PUT')         
         <hr>

         <div class="create-radio-group">
            <label>
               <input type="radio" name="proritas" value="priority" {{ $task->proritas === 'priority' ? 'checked' : '' }}>
               <strong class="text-blue">Prioritas</strong>
            </label>
            <label>
               <input type="radio" name="proritas" value="non-priority" {{ $task->proritas === 'non-priority' ? 'checked' : '' }}>
               <strong class="text-yellow">Non Prioritas</strong>
            </label>
         </div>

         <label for="judul">Judul</label>
         <input type="text" id="judul" name="judul" class="create-input" value="{{ old('judul', $task->judul) }}">

         <label for="deskripsi">Deskripsi</label>
         <textarea id="deskripsi" name="deskripsi" class="create-textarea">{{ old('deskripsi', $task->deskripsi) }}</textarea>

         <label for="deadline">Tenggat Waktu</label>
         <input type="date" id="deadline" name="deadline" class="create-input"
            value="{{ old('deadline', $task->deadline ? \Carbon\Carbon::parse($task->deadline)->format('Y-m-d') : '') }}">
            <div class="button-wrapper">
                <a href="{{ route('tasks.index') }}" class="create-btn back-btn">Kembali</a>
                <button type="submit" class="create-btn">Simpan</button>
            </div>      
        </form>
   </div>

</body>

</html>
