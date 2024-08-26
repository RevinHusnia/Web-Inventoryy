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
                <h1>Data User</h1>
                <table class="data-table-history">
                    <thead>
                        <tr>
                            
                            <th>Request</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Albar</td>
                            <td>12345678910111213</td>
                            <td>12345678910111213</td>
                            <td><button class="btn-delete-history">Delete</button></td>
                        </tr>
                        <tr>
                            <td>Danar</td>
                            <td>12345678910111213</td>
                            <td>12345678910111213</td>
                            <td><button class="btn-delete-history">Delete</button></td>
                        </tr>
                        <tr>
                            <td>psy</td>
                            <td>12345678910111213</td>
                            <td>12345678910111213</td>
                            <td><button class="btn-delete-history">Delete</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="imageModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="modalImage">
    </div>

    <?php include '../partials/footer.php' ?>