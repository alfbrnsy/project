// Toggle between forms
const btnMahasiswa = document.getElementById('btn-mahasiswa');
const btnDosen = document.getElementById('btn-dosen');
const formMahasiswa = document.getElementById('form-mahasiswa');
const formDosen = document.getElementById('form-dosen');

// Function to toggle active form
function showForm(role) {
    if (role === 'mahasiswa') {
        formMahasiswa.classList.add('active-form');
        formDosen.classList.remove('active-form');
        btnMahasiswa.classList.add('active');
        btnDosen.classList.remove('active');
    } else if (role === 'dosen') {
        formDosen.classList.add('active-form');
        formMahasiswa.classList.remove('active-form');
        btnDosen.classList.add('active');
        btnMahasiswa.classList.remove('active');
    }
}

// Event listeners for buttons
btnMahasiswa.addEventListener('click', () => showForm('mahasiswa'));
btnDosen.addEventListener('click', () => showForm('dosen'));
