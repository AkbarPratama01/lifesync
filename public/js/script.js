const toggleSidebar = document.getElementById('toggleSidebar');
const sidebar = document.getElementById('sidebar');
const content = document.getElementById('content');

// Fungsi untuk menyesuaikan sidebar berdasarkan lebar layar
function adjustSidebarForMobile() {
    if (window.innerWidth <= 768) { // Ukuran breakpoint untuk handphone
        sidebar.classList.add('collapsed');
        content.classList.add('collapsed');
    } else {
        sidebar.classList.remove('collapsed');
        content.classList.remove('collapsed');
    }
}

// Tambahkan event listener untuk toggle button
toggleSidebar.addEventListener('click', () => {
    sidebar.classList.toggle('collapsed');
    content.classList.toggle('collapsed');
});

// Periksa lebar layar saat halaman dimuat
adjustSidebarForMobile();

// Tambahkan event listener untuk mendeteksi perubahan ukuran layar
window.addEventListener('resize', adjustSidebarForMobile);