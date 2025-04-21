// Waktu untuk di bagian awal page 
const greeting = document.getElementById('greetingText');
const hour = new Date().getHours();
let waktu;

// text yang tampil di bagian awal page
const greetingText = document.getElementById('greetingText');
if (hour < 6) {
  greetingText.textContent = "Hola, Good Morning Kein";
} else if (hour < 12) {
  greetingText.textContent = "Hola, Good Afternoon Kein";
} else if (hour < 18) {
  greetingText.textContent = "Hola, Good Evening Kein";
}else {
  greetingText.textContent = "Hola, Good Night Kein";
}
  // Fungsi untuk menampilkan modal
  // function openModal(title, description, status, deeadline) {
  //   document.getElementById('modalTitle').innerText = title;
  //   document.getElementById('modalDescription').innerText = description;
  //   document.getElementById('modalStatus').innerText = status;
  //   document.getElementById('modalDeadline').innerText = deadline;
  //   document.getElementById('taskModal').style.display = "block";
  // }
  
  // function closeModal() {
  //   document.getElementById('taskModal').style.display = "none";
  //}