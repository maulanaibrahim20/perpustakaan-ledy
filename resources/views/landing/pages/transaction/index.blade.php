<style>
    @media (min-width: 1025px) {
        .h-custom {
            height: 100vh !important;
        }
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key={{ env('client_key') }}></script>
<section class="h-100 h-custom" style="background-color: #eee;">
    <div id="snap-container"></div>
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card bg-primary text-white rounded-3 mb-4">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <h5 class="mb-0">Info Pembeli</h5>
                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp"
                                                class="img-fluid rounded-3" style="width: 45px;" alt="Avatar">
                                        </div>
                                        <div data-mdb-input-init class="form-outline form-white mb-4">
                                            <label class="form-label" for="typeName">Nama Pembeli</label>
                                            <input type="text" id="typeName" class="form-control form-control-lg"
                                                siez="17" value="{{ $cart->user->name }}" name="name"
                                                readonly />
                                        </div>
                                        <div data-mdb-input-init class="form-outline form-white mb-4">
                                            <label class="form-label" for="typeText">Email Pembeli</label>
                                            <input type="text" id="typeText" class="form-control form-control-lg"
                                                siez="17" value="{{ $cart->user->email }}" name="email"
                                                readonly />
                                        </div>
                                    </div>
                                </div>

                                <div class="card bg-light rounded-3 mb-4">
                                    <div class="card-body">
                                        <h5 class="mb-4">Daftar Produk</h5>
                                        @php
                                            $subTotal = 0;
                                        @endphp
                                        @foreach ($cartItem as $item)
                                            @php
                                                $price = $item->book->price; // Harga per unit
                                                $quantity = $item->quantity; // Kuantitas
                                                $totalPrice = $price * $quantity; // Total harga
                                                $subTotal += $totalPrice; // Subtotal keseluruhan
                                            @endphp
                                            <div class="card mb-3 shadow-sm">
                                                <div class="card-body">
                                                    <div class="row align-items-center">
                                                        <div class="col-2">
                                                            <img src="{{ asset('images/default_cover.jpg') }}"
                                                                class="img-fluid rounded-3" alt="Product Image">
                                                        </div>
                                                        <div class="col-6">
                                                            <h6 class="mb-0">{{ $item['book']['title'] }}</h6>
                                                            <p class="small text-muted mb-0">Author:
                                                                {{ $item['book']['author'] }}</p>
                                                            <p class="small text-muted mb-0">Price:
                                                                {{ Number::currency($item->book->price, 'IDR', 'id') }}
                                                            </p>
                                                        </div>
                                                        <div class="col-2 text-center">
                                                            <span class="badge bg-primary">{{ $item->quantity }}</span>
                                                        </div>
                                                        <div class="col-2 text-end">
                                                            <p class="mb-0">
                                                                {{ Number::currency($totalPrice, 'IDR', 'id') }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <hr>
                                        <div class="d-flex justify-content-between">
                                            <p class="mb-2">Subtotal</p>
                                            <p class="mb-2">{{ Number::currency($subTotal, 'IDR', 'id') }}</p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="mb-2">Biaya Pengiriman</p>
                                            <p class="mb-2">Rp.20,000</p>
                                        </div>
                                        @php
                                            $total = $subTotal + 20000; // Total akhir
                                        @endphp
                                        <div class="d-flex justify-content-between mb-4">
                                            <p class="mb-2"><strong>Total</strong></p>
                                            <p class="mb-2">
                                                <strong>{{ Number::currency($total, 'IDR', 'id') }}</strong>
                                            </p>
                                        </div>
                                        <button type="button" id="pay-button" data-mdb-button-init data-mdb-ripple-init
                                            class="btn btn-info btn-block btn-lg">
                                            <div class="d-flex justify-content-between">
                                                <span><i class="fas fa-cart-shopping me-2"></i>Bayar</span>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="snap-container"></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    Swal.fire({
                        title: 'Pembayaran Sukses!',
                        text: 'Terima kasih atas pembayaran Anda.',
                        icon: 'success',
                        confirmButtonText: 'Kembali ke Halaman Utama'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '/';
                        }
                    });
                    console.log(result);
                },
                onPending: function(result) {
                    alert("wating your payment!");
                    console.log(result);
                },
                onError: function(result) {
                    alert("payment failed!");
                    console.log(result);
                },
                onClose: function() {
                    alert('you closed the popup without finishing the payment');
                }
            })
        });
    </script>
</section>
