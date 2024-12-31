@extends('landing_page')
@section('content')
    {{-- <style>
        body {
            background-color: #f4e1d2;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border: none;
            border-radius: 10px;
        }

        .card-title {
            font-size: 18px;
            font-weight: bold;
        }

        .btn-custom {
            background-color: #6d4c41;
            color: white;
        }

        .btn-custom:hover {
            background-color: #3e2723;
        }

        .book-cover {
            height: 250px;
            object-fit: cover;
            border-radius: 5px;
        }
    </style> --}}
    <div class="container">
        <h1 class="text-center mb-4">Katalog Buku</h1>
        <div class="row">
            <?php
            // Data buku yang tersedia dengan gambar sampul
            $bukuTersedia = [['judul' => 'The Great Gatsby', 'pengarang' => 'F. Scott Fitzgerald', 'tahun' => 1925, 'gambar' => 'gatsby.jpg'], ['judul' => 'To Kill a Mockingbird', 'pengarang' => 'Harper Lee', 'tahun' => 1960, 'gambar' => 'mockingbird.jpg'], ['judul' => '1984', 'pengarang' => 'George Orwell', 'tahun' => 1949, 'gambar' => '1984.jpg']];

            // Menampilkan buku yang ada
            foreach ($bukuTersedia as $buku) {
                echo '<div class="col-md-4 mb-4">';
                echo '<div class="card">';
                echo '<img src="images/' . htmlspecialchars($buku['gambar']) . '" class="card-img-top book-cover" alt="' . htmlspecialchars($buku['judul']) . '">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . htmlspecialchars($buku['judul']) . '</h5>';
                echo '<p class="card-text"><strong>Pengarang:</strong> ' . htmlspecialchars($buku['pengarang']) . '</p>';
                echo '<p class="card-text"><strong>Tahun:</strong> ' . htmlspecialchars($buku['tahun']) . '</p>';
                echo '<form action="detail_buku.php" method="GET">';
                echo '<input type="hidden" name="judulBuku" value="' . htmlspecialchars($buku['judul']) . '">';
                echo '<button type="submit" class="btn btn-custom">Detail Buku</button>';
                echo '</form>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
@endsection
