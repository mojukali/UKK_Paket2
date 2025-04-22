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
      <h2>Task</h2>
  
      <table>
        <thead>
          <tr>
            <th style="width: 90%">Task</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($todolists as $task)
            @php
              $isExpired = $task->deadline && \Carbon\Carbon::now()->gt($task->deadline);
            @endphp
  
            @if ($task->status !== 'completed' && !$isExpired)
              <tr>
                <td style="padding: 5px">
                  <div class="task-content" onclick="openModal({{ $task->id }})">
                    {{ $task->judul }}
                  </div>
                </td>
                <td>
                  {{-- Bagian warna tuk ubah status dengan icon --}}
                  {{-- <form action="{{ route('tasks.status', $task->id) }}" method="POST">
                    {{-- @csrf
                    <button type="submit" class="dropdown-status {{ $task->proritas === 'priority' ? 'blue' : 'yellow' }}" >
                      @if($task->status === 'pending')
                      <i class="fa-solid fa-spinner"></i>
                      @elseif($task->status === 'in-progress')
                      <i class="fa-solid fa-check"></i>
                      @endif --}}
                    {{-- </button> --}}
                    {{-- <div class="dropdown">
                      <button class="dropbtn">Status</button>
                      <div class="dropdown-content">
                        <a href="#">Link 1</a>
                        <a href="#">Link 2</a>
                        <a href="#">Link 3</a>
                      </div>
                    </div>
                  </form>
                  </div> --}} 
                  <form action="{{ route('tasks.status', $task->id) }}" method="POST">
                    @csrf
                    <select name="status" onchange="this.form.submit()" class="dropbtn {{ $task->proritas === 'priority' ? 'blue' : 'yellow' }}">
                      <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}> Pending</option>
                      <option value="in-progress" {{ $task->status == 'in-progress' ? 'selected' : '' }}>In Progress</option>
                      <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                  </form>
                </td>
              </tr>
  
              {{-- Modal --}}
              <div id="modal-{{ $task->id }}" class="task-modal" style="display: none;">
                <div class="modal-content">
                  <div class="modal-header">
                    <span class="prioritas">{{ ucfirst($task->proritas) }}</span>
                    <button class="close-btn" onclick="closeModal({{ $task->id }})">
                      <i class="fa-solid fa-arrow-left"></i>
                    </button>
                  </div>
                  <div class="modal-body">
                    <h2>{{ $task->judul }}</h2>
                    <p>{{ $task->deskripsi }}</p>
                    <span>Tenggat Waktu</span>
                    <div class="deadline">
                      <i class="fa-solid fa-calendar-days"></i>
                      <span>{{ \Carbon\Carbon::parse($task->deadline)->format('d/m/Y') }}</span>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <a href="{{ route('tasks.edit', $task->id) }}" class="edit-btn">Edit</a>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="delete-btn">Hapus</button>
                    </form>
                  </div>
                </div>
              </div>
            @endif
          @endforeach
        </tbody>
      </table>
  
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
    <script src="{{ asset('js/script.js') }}"></script>
    @include('partials.alerts')
  </body>
  </html>
  
  
  
  