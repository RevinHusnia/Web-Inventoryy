<?php 
include '../partials/header.php'; 

?>
    
    <div class="form-overlay" id="formOverlay"></div>
    <div class="content">
        <div class="header">
            <div class="user-info" id="userInfo">
                <div class="admin-clickable">
                    <img src="/assets/user.png" alt="Admin" class="admin-img">
                    <span class="admin-text">admin ▼</span>
                </div>
            </div>

            <!-- Popup Konfirmasi Logout -->
            <div id="logoutModal" class="modal">
                <div class="modal-content">
                    <p>Apakah Anda ingin logout?</p>
                    <button id="confirmLogout" class="btn-confirm">Yes</button>
                    <button id="cancelLogout" class="btn-cancel">No</button>
                </div>
            </div>
        </div>

        <div class="data-barang">
            <div class="table-container">
            <button class="btn-edit" onclick="showPopup()">Tambah</button>
                <h1>Data Laporan</h1>
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                         
                            <th>Foto Laporan/Temuan</th>
                            <th>Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Barang 1</td>
                            <td>10</td>
                            
                            <td><img class="img-tr" src="/assets/box.png" alt=""></td>
                            <td><button class="btn-delete">Delete</button> <button onclick="editPopup()" class="btn-edit">Edit</button></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Barang 2</td>
                            <td>15</td>
                            
                            <td><img class="img-tr" src="/assets/box.png" alt=""></td>
                            <td><button class="btn-delete">Delete</button> <button onclick="editPopup()" class="btn-edit">Edit</button></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Barang 3</td>
                            <td>20</td>
                           
                            <td><img class="img-tr" src="/assets/box.png" alt=""></td>
                            <td><button class="btn-delete">Delete</button> <button onclick="editPopup()" class="btn-edit">Edit</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="popupForm" class="popup">
    <div  class="popup-content">
        <span class="closee" onclick="closePopup()">&times;</span>
        <h2>Form Input</h2>
        <form>
        <label for="itemCode">Kode Barang:</label><br>
        <input type="text" id="itemCode" name="itemCode" class="input-request"><br><br>

        <label for="itemName">Nama Barang:</label><br>
        <input type="text" id="itemName" name="itemName" class="input-request"><br><br>

        <label for="itemQuantity">Jumlah:</label><br>
        <input type="number" id="itemQuantity" name="itemQuantity" class="input-request"><br><br>

        <label for="itemPhoto">Foto Barang:</label><br>
        <input type="file" id="itemPhoto" name="itemPhoto" class="input-request" accept="image/*"><br><br>

                    
            <button type="submit">Submit</button>
        </form>
    </div>
</div>
        </div>
    </div>
    <div id="imageModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="modalImage">
    </div>

    <script>
    // Fungsi untuk menampilkan modal konfirmasi logout
    document.getElementById('adminClickable').addEventListener('click', function() {
        var result = confirm("Apakah Anda yakin ingin logout?");
        if (result) {
            // Jika pengguna menekan "OK"
            alert("Logout berhasil!");
            // Aksi logout bisa ditambahkan di sini, seperti redirect ke halaman login
            window.location.href = '/Login.php';
        } else {
            // Jika pengguna menekan "Cancel"
            alert("Logout dibatalkan.");
        }
    });

    // Menutup modal gambar saat diklik
    document.getElementsByClassName("close")[0].onclick = function() {
        document.getElementById("imageModal").style.display = "none";
    }
    function showPopup() {
    document.getElementById("popupForm").style.display = "block";
}

// Fungsi untuk menutup popup
function closePopup() {
    document.getElementById("popupForm").style.display = "none";
}

function editPopup() {
        document.getElementById("popupForm").style.display = "block";
    }

    // Fungsi untuk menutup popup
    function closePopup() {
        document.getElementById("popupForm").style.display = "none";
    }


</script>
    <?php include '../partials/footer.php'; ?>
