<?php 
include '../partials/header.php';
?>

<body>
    
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
                <h1>Data Barang</h1>
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Foto</th>
                            <th>Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Barang 1</td>
                            <td>10</td>
                            <td>10.000</td>
                            <td><img class="img-tr" src="/assets/box.png" alt=""></td>
                            <td><button class="btn-delete">Delete</button> <button onclick="editPopup()" class="btn-edit">Edit</button></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Barang 2</td>
                            <td>15</td>
                            <td>10.000</td>
                            <td><img class="img-tr" src="/assets/box.png" alt=""></td>
                            <td><button class="btn-delete">Delete</button> <button onclick="editPopup()" class="btn-edit">Edit</button></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Barang 3</td>
                            <td>20</td>
                            <td>10.000</td>
                            <td><img class="img-tr" src="/assets/box.png" alt=""></td>
                            <td><button class="btn-delete">Delete</button> <button onclick="editPopup()" class="btn-edit">Edit</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Tag yang diminta -->
            <div id="popupForm" class="popup">
            <div class="popup-content">
                <span class="closee" onclick="closePopup()">&times;</span>
                <h2>Form Input</h2>
                <form action="../control/process_form_barang.php" method="POST" enctype="multipart/form-data">
                    <label for="itemCode">Kode Barang:</label><br>
                    <input type="text" id="itemCode" name="itemCode_barang" class="input-request" required><br><br>

                    <label for="itemName">Nama Barang:</label><br>
                    <input type="text" id="itemName" name="itemName_barang" class="input-request" required><br><br>

                    <label for="itemQuantity">Jumlah:</label><br>
                    <input type="number" id="itemQuantity" name="itemQuantity_barang" class="input-request" required><br><br>

                    <label for="itemSize">Ukuran:</label><br>
                    <label for="itemSize">Ukuran:</label>
                        <select id="itemSize" name="itemSize_barang" class="input-request" required>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                            <option value="Custom">Custom</option>
                        </select><br><br>

                    <div id="customSizeContainer" style="display: none;">
                        <label for="customSize">Ukuran Custom:</label><br>
                        <input type="text" id="customSize" name="customSize_barang" class="input-request"><br><br>
                    </div>

                    <label for="itemPrice">Harga Barang:</label>
                    <input type="number" name="itemPrice_barang" step="0.01" min="0" required>

                    <label for="itemPhoto">Foto Barang:</label><br>
                    <input type="file" id="itemPhoto" name="itemPhoto_barang" class="input-request" accept="image/*" required><br><br>

                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>

            <div class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closeModal()">&times;</span>
                    <!-- Konten modal -->
                </div>
            </div>
        </div>
    </div>

    <div id="imageModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="modalImage">
    </div>

    <script>
    function toggleCustomSize() {
        var sizeSelect = document.getElementById('itemSize');
        var customSizeContainer = document.getElementById('customSizeContainer');
        if (sizeSelect.value === 'Custom') {
            customSizeContainer.style.display = 'block';
        } else {
            customSizeContainer.style.display = 'none';
        }
    }

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


    //edit
    function editPopup() {
        document.getElementById("popupForm").style.display = "block";
    }

    // Fungsi untuk menutup popup
    function closePopup() {
        document.getElementById("popupForm").style.display = "none";
    }

      // Fungsi untuk menampilkan ketersediaan stok berdasarkan ukuran yang dipilih
      function showStock(selectElement) {
            var size = selectElement.value;
            var stock = 0;
            // Simulasi ketersediaan stok (di backend sebenarnya Anda bisa menggunakan AJAX untuk mendapatkan data dari database)
            switch(size) {
                case 'S': stock = 5; break;
                case 'M': stock = 8; break;
                case 'L': stock = 12; break;
                case 'XL': stock = 15; break;
            }
            document.getElementById("stockDisplay").textContent = "Ketersediaan: " + stock;
        }

        // Fungsi untuk menghapus item
        function deleteItem(id) {
            if (confirm("Apakah Anda yakin ingin menghapus item ini?")) {
                window.location.href = `../control/delete/deleteBarang.php?id=${id}`;
            }
        }

        function showStock(selectElement) {
    var size = selectElement.value;
    var kodeBarang = selectElement.getAttribute('data-kode-barang'); // Ambil kode_barang dari atribut

    if (kodeBarang && size) {  // Pastikan keduanya ada
        fetch(`get_stock.php?kode_barang=${kodeBarang}&ukuran=${size}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById("stockDisplay").textContent = "Ketersediaan: " + data.stock;
            })
            .catch(error => {
                console.error('Error:', error);
            });
    } else {
        console.error('Parameter kode_barang atau ukuran tidak ditemukan.');
    }
}

function filterBySize() {
    var selectedSize = document.getElementById('filterSize').value;
    
    // Send an AJAX request to get the filtered data
    fetch(`get_filtered_barang.php?ukuran=${selectedSize}`)
        .then(response => response.text())
        .then(data => {
            // Replace the table body with the filtered data
            document.querySelector('tbody').innerHTML = data;
        })
        .catch(error => {
            console.error('Error:', error);
        });
}

function deleteItem(kode_barang, ukuran) {
    if (confirm("Apakah Anda yakin ingin menghapus barang ini?")) {
        // Kirim request ke PHP untuk menghapus data
        fetch('/delete/deleteBarang.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                'kode_barang': kode_barang,
                'ukuran': ukuran
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert(data.message);
                location.reload(); // Refresh halaman setelah penghapusan
            } else {
                alert(data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
}

</script>


<?php include '../partials/footer.php'; ?>
</body>
</html>
