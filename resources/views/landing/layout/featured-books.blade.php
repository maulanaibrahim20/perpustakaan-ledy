<section id="featured-books" class="py-5 my-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="section-header align-center">
                    <div class="title">
                        <span>Some quality items</span>
                    </div>
                    <h2 class="section-title">Featured Books</h2>
                </div>

                <div class="product-list" data-aos="fade-up">
                    <div class="row">
                        @foreach ($book as $data)
                            <div class="col-md-3">
                                <div class="product-item">
                                    <figure class="product-style">
                                        <img src="{{ asset(Storage::url($data->cover_image)) }}" alt="Books"
                                            class="product-item">
                                        <form action="{{ url('/cart/add/' . $data->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="add-to-cart"
                                                data-product-tile="add-to-cart">Add
                                                to
                                                Cart</button>
                                        </form>
                                    </figure>
                                    <figcaption>
                                        <h3>{{ $data->title }}</h3>
                                        <span>{{ $data->author }}</span>
                                        <div class="item-price">{{ Number::currency($data->price, 'IDR', 'id') }}</div>
                                    </figcaption>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div><!--inner-content-->
        </div>

        <div class="row">
            <div class="col-md-12">

                <div class="btn-wrap align-right">
                    <a href="#" class="btn-accent-arrow">View all products <i
                            class="icon icon-ns-arrow-right"></i></a>
                </div>

            </div>
        </div>
    </div>
</section>
