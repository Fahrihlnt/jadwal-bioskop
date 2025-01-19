<?php 
  if ( !empty($_POST)) { 
    
    $nama  = $_POST['nama'];
    $film    = $_POST['film'];
    $seat = $_POST['seat'];
    $harga = $_POST['harga'];
  
$file = file_get_contents('tiket.json');
$data = json_decode($file, true);
unset($_POST["add"]);
$data["tiket"] = array_values($data["tiket"]);
array_push($data["tiket"], $_POST);
file_put_contents("tiket.json", json_encode($data));
header("Location: index_crudjson.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="tutorial-bootstrap-merubah-warna">
    <meta name="author" content="ilmu-detil.blogspot.com">
    <title>Tutorial CRUD JSON DATA</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }
        .navbar-default {
            background-color: #3b5998;
            font-size: 18px;
            color: #ffffff;
            border-radius: 0;
        }
        .navbar-header h4 {
            color: #ffffff;
            margin: 0;
        }
        .container {
            margin-top: 20px;
        }
        .form-container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .form-container h3 {
            color: #333;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .form-actions {
            margin-top: 20px;
            text-align: right;
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
        .btn-default {
            background-color: #6c757d;
            border-color: #6c757d;
            color: #ffffff;
        }
        .btn-default:hover {
            background-color: #5a6268;
            border-color: #545b62;
            color: #ffffff;
        }
        .seat {
    width: 30px;
    height: 30px;
    background-color: #6c757d;
    margin: 5px;
    border-radius: 5px;
    cursor: pointer;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    color: #fff;
    font-weight: bold;
    font-size: 14px;
}

.seat.selected {
    background-color: #6ab04c;
    cursor: default;
}

.screen {
    width: 100%;
    height: 20px;
    background-color: #333;
    margin: 20px auto;
    border-radius: 5px;
    text-align: center;
    color: #fff;
    font-weight: bold;
    line-height: 20px;
}
.seats {
    display: grid;
    grid-template-columns: repeat(10, 50px); /* Sepuluh kolom dengan lebar masing-masing 50px */
    grid-auto-rows: 50px; /* Tinggi baris otomatis sebesar 50px */
    gap: 5px; /* Jarak antara kursi */
}

.seat {
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #ccc;
    border-radius: 5px;
    font-weight: bold;
}

.selected {
    background-color: #ff0000; /* Warna yang berbeda untuk kursi yang dipilih */
}
.seats {
    display: grid;
    grid-template-columns: repeat(10, 40px); /* Sepuluh kolom dengan lebar masing-masing 40px */
    grid-auto-rows: 40px; /* Tinggi baris otomatis sebesar 40px */
    gap: 3px; /* Mengurangi jarak antara kursi */
}

.seat {
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #ccc;
    border-radius: 5px;
    font-weight: bold;
}

.selected {
    background-color: #ff0000; /* Warna yang berbeda untuk kursi yang dipilih */
}





    </style>
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <h4>Pemesanan Tiket Bioskop</h4>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="form-container">
                    <form id="createUserForm" method="POST" action="">
                        <div class="form-group">
                            <label for="inputnama">Nama:</label>
                            <input type="text" class="form-control" required="required" id="inputnama" name="nama" placeholder="Nama">
                        </div>

                        <div class="form-group">
    <label for="inputfilm">Film:</label>
    <input type="text" class="form-control" required="required" id="inputfilm" name="film" placeholder="Nama Film">
</div>

                        <div class="form-group">
                            <label for="inputseat">Seat:</label>
                            <div class="seats">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputtiket">Jumlah Tiket:</label>
                            <input class="form-control" required="required" id="inputtiket" name="tiket" placeholder="Jumlah Tiket">
                        </div>
                    
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success">PESAN</button>
                            <a class="btn btn btn-default" href="index_crudjson.php">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('createUserForm').addEventListener('submit', function (event) {
                event.preventDefault(); // prevent form submission

                // Your form submission logic here
                // For example, you can use AJAX to submit the form data to the server

                // Show SweetAlert upon successful form submission
                Swal.fire({
                    title: 'Success!',
                    text: 'Data has been added.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(function() {
                    window.location = 'index_crudjson.php'; // Redirect to index page
                });
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
    const seatsContainer = document.querySelector('.seats');
    const checkoutBtn = document.querySelector('#checkout-btn'); // Menggunakan querySelector untuk mencari tombol checkout
    const seats = 16 * 10; // Jumlah total kursi
    const invalidLetters = ['i', 'o']; // Huruf-huruf yang harus dihindari
    let selectedSeats = [];

    // Buat kursi-kursi
    for (let i = 1; i <= seats; i++) {
        const row = Math.ceil(i / 10); // Hitung baris berdasarkan nomor kursi
        const col = i % 10 === 0 ? 10 : i % 10; // Hitung kolom berdasarkan nomor kursi
        const letterIndex = row - 1; // Index untuk menentukan huruf
        let letter = String.fromCharCode(65 + letterIndex); // Mengubah index huruf menjadi huruf ASCII

        // Menyusun layout huruf dari atas ke bawah
        if (row > 8) {
            letter = String.fromCharCode(65 + letterIndex + 8); // Huruf-huruf di sebelah kanan
        }

        if (!invalidLetters.includes(letter.toLowerCase())) {
            const seat = document.createElement('div');
            seat.classList.add('seat');
            seat.innerText = letter + col; // Menyusun label kursi
            seat.addEventListener('click', () => {
                // Toggle pemilihan kursi
                if (seat.classList.contains('selected')) {
                    seat.classList.remove('selected');
                    selectedSeats = selectedSeats.filter(seatNumber => seatNumber !== i);
                } else {
                    seat.classList.add('selected');
                    selectedSeats.push(i);
                }
            });
            seatsContainer.appendChild(seat);
        }
    }

    // Handler untuk tombol checkout
    checkoutBtn.addEventListener('click', () => {
        if (selectedSeats.length === 0) {
            alert('Anda belum memilih kursi!');
        } else {
            const seatsStr = selectedSeats.map(seat => {
                const row = Math.ceil(seat / 10); // Hitung baris berdasarkan nomor kursi
                const col = seat % 10 === 0 ? 10 : seat % 10; // Hitung kolom berdasarkan nomor kursi
                const letterIndex = row - 1; // Index untuk menentukan huruf
                let letter = String.fromCharCode(65 + letterIndex); // Mengubah index huruf menjadi huruf ASCII

                // Menyusun layout huruf dari atas ke bawah
                if (row > 8) {
                    letter = String.fromCharCode(65 + letterIndex + 8); // Huruf-huruf di sebelah kanan
                }

                return letter + col;
            }).join(', ');
            alert('Anda telah memilih kursi: ' + seatsStr);
            // Di sini, Anda dapat menambahkan logika lanjutan, misalnya untuk memproses pembayaran atau memperbarui basis data.
        }
    });
});

    </script>
</body>
</html>
