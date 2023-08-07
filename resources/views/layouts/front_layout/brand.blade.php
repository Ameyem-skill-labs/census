<!-- our brand -->
<div class="brand">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title">
                            <h2>Featured <strong class="black">Articles</strong></h2>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="brand-bg">
                <div class="row">

                    @foreach ($getProducts as $product)

                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 margintop">
                            <div class="brand-box">
                                <i><img src="{{ asset('images/product_images/medium/' . $product['image']) }}" /></i>

                                <h3><a href="{{ url('/product/' . $product['id']) }}">{{ $product['name'] }}</a>
                                </h3>

                                @if ($product['discount_price'] > 0)
                                    <ins>{{ $product['discount_price'] }} BDT</ins>
                                    <del>{{ $product['price'] }} BDT</del>
                                @else
                                    <ins>{{ $product['price'] }} BDT</ins>
                                @endif
                            </div>
                        </div>

                    @endforeach

                </div>
            </div>
        </div>
        


    <!-- end our brand -->