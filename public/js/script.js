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

$(document).ready(function () {
    $(".shalat-checkbox").change(function () {
        let checkedCount = $(".shalat-checkbox:checked").length;
        let totalCount = $(".shalat-checkbox").length;
        let progress = (checkedCount / totalCount) * 100;

        $("#progressBar").css("width", progress + "%").attr("aria-valuenow", progress);

        let shalat = $(this).data("shalat");
        let checked = $(this).prop("checked") ? "Ya" : "Tidak";

        $.ajax({
            url: "dashboard/update-shalat",
            type: "POST",
            data: { shalat: shalat, checked: checked },
            success: function (response) {
                console.log(response);
            },
            error: function (xhr, status, error) {
                console.error("Error:", error);
            }
        });
    });
});

