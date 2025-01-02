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
                            <div class="col-lg-7">
                                <h5 class="mb-3"><a href="{{ url('/') }}" class="text-body"><i
                                            class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping</a></h5>
                                <hr>

                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <div>
                                        <p class="mb-1">Shopping cart</p>
                                        <p class="mb-0">You have 4 items in your cart</p>
                                    </div>
                                    <div>
                                        <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!"
                                                class="text-body">price <i class="fas fa-angle-down mt-1"></i></a></p>
                                    </div>
                                </div>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ($cart->cartItem as $item)
                                    @php
                                        $total += $item->book->price * $item->quantity;
                                    @endphp
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex flex-row align-items-center">
                                                    <div>
                                                        <img src="{{ Storage::url($item->book->cover_image) }}"
                                                            class="img-fluid rounded-3" alt="Shopping item"
                                                            style="width: 65px;">
                                                    </div>
                                                    <div class="ms-3">
                                                        <h5>{{ $item->book->title }}</h5>
                                                        <p class="small mb-0">{{ $item->book->author }}</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center">
                                                    <div style="width: 50px;">
                                                        <h5 class="fw-normal mb-0">{{ $item->quantity }}</h5>
                                                    </div>
                                                    <div class="me-3">
                                                        <h5 class="mb-0">
                                                            {{ Number::currency($item->book->price, 'IDR', 'id') }}</h5>
                                                    </div>
                                                    <a href="#!" style="color: #cecece;"><i
                                                            class="fas fa-trash-alt"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-lg-5">
                                <div class="card bg-primary text-white rounded-3">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <h5 class="mb-0">Info Pembeli</h5>
                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp"
                                                class="img-fluid rounded-3" style="width: 45px;" alt="Avatar">
                                        </div>
                                        <form class="mt-4">

                                            <div data-mdb-input-init class="form-outline form-white mb-4">
                                                <label class="form-label" for="typeName">Nama Pembeli</label>
                                                <input type="text" id="typeName"
                                                    class="form-control form-control-lg" siez="17"
                                                    placeholder="Cardholder's Name" value="{{ Auth::user()->name }}"
                                                    readonly />
                                            </div>

                                            <div data-mdb-input-init class="form-outline form-white mb-4">
                                                <label class="form-label" for="typeText">Email Pembeli</label>
                                                <input type="text" id="typeText"
                                                    class="form-control form-control-lg" siez="17"
                                                    placeholder="1234 5678 9012 3457" minlength="19"
                                                    value="{{ Auth::user()->email }}" maxlength="19" readonly />
                                            </div>
                                        </form>

                                        <hr class="my-4">

                                        <div class="d-flex justify-content-between">
                                            <p class="mb-2">Subtotal</p>
                                            <p class="mb-2">{{ Number::currency($total, 'IDR', 'id') }}</p>
                                        </div>

                                        <div class="d-flex justify-content-between">
                                            <p class="mb-2">Biaya Pengiriman</p>
                                            <p class="mb-2">Rp.20.000</p>
                                        </div>

                                        <div class="d-flex justify-content-between mb-4">
                                            <p class="mb-2">Total</p>
                                            <p class="mb-2">{{ Number::currency($total + 20000, 'IDR', 'id') }}</p>
                                        </div>
                                        <form action="{{ url('/transaction') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="total" value="{{ $total + 20000 }}">
                                            <button type="submit" id="pay-button" data-mdb-button-init
                                                data-mdb-ripple-init class="btn btn-info btn-block btn-lg">
                                                <div class="d-flex justify-content-between">
                                                    <span><i class="fas fa-cart-shopping me-2"></i>Checkout </span>
                                                </div>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $('form').on("submit", function(event) {
            event.preventDefault();
            $(this).find('button').attr("disabled", "disabled");

            $.ajax({
                url: $(this).attr('action'),
                cache: false,
                data: $(this).serialize(),
                type: 'POST',

                success: function(data) {
                    console.log(data.snapToken);
                    var snapToken = data.snapToken;
                    snap.pay(snapToken, {
                        onSuccess: function(result) {
                            // Handle success case here
                            console.log(result);
                            alert('Transaction successful!');
                        },
                        onPending: function(result) {
                            // Handle pending case here
                            console.log(result);
                            alert('Transaction pending!');
                        },
                        onError: function(result) {
                            // Handle error case here
                            console.log(result);
                            alert('Transaction failed!');
                        }
                    });
                }
            });
        });
    </script>
</section>
