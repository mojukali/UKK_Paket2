<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>ToDo List</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
</head>
<body>
  <div class="greeting" id="greetingText"></div>
  <div class="container" style="margin-top: 30px">    
    <h2>List Task</h2>
    
    @foreach ($todolists as $task)
      @php
        $isExpired = $task->deadline && \Carbon\Carbon::now()->gt($task->deadline);
      @endphp
    
      @if ($task->status !== 'completed' && !$isExpired)
        <div class="task-box">
          {{-- Bagian putih buka modal --}}
          <div class="task-content" onclick="openModal({{ $task->id }})">
            {{ $task->judul }}
          </div>
    
          {{-- Bagian warna dengan icon --}}
          <form action="{{ route('tasks.status', $task->id) }}" method="POST">
            @csrf
            <button type="submit" class="dropdown-status {{ $task->proritas === 'priority' ? 'blue' : 'yellow' }}" title="Ubah status">
              @if($task->status === 'pending')
                <i class="fa-solid fa-hourglass-half"></i>
              @elseif($task->status === 'in-progress')
                <i class="fa-solid fa-spinner"></i>
              @endif
            </button>
          </form>
        </div>
    
        {{-- Modal --}}
        <div id="modal-{{ $task->id }}" class="task-modal" style="display: none;">
          <div class="modal-content">
            <div class="modal-header">
              <span class="prioritas">{{ ucfirst($task->proritas) }}</span>
              <button class="close-btn" onclick="closeModal({{ $task->id }})">X</button>
            </div>
            <div class="modal-body">
              <h2>{{ $task->judul }}</h2>
              <p>{{ $task->deskripsi }}</p>
              <div class="deadline">
                <i class="fa-solid fa-calendar-days"></i>
                <span>{{ \Carbon\Carbon::parse($task->deadline)->format('d/m/Y') }}</span>
              </div>
            </div>
            <div class="modal-footer">
              <a href="{{ route('tasks.edit', $task->id) }}" class="edit-btn">Edit</a>
              <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                @csrf @method('DELETE')
                <button type="submit" class="delete-btn">Hapus</button>
              </form>
            </div>
          </div>
        </div>
      @endif
    @endforeach
    
    <div class="top-bar">
      <a href="{{ route('tasks.create') }}">
          <button class="round-button">+</button>
      </a>
    </div>      
    </div>
    <script>
      function openModal(id) {
        document.getElementById('modal-' + id).style.display = 'flex';
      }
    
      function closeModal(id) {
        document.getElementById('modal-' + id).style.display = 'none';
      }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    @include('partials.alerts')
</body>
</html>
