@include('users.layouts.header-product')
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container d-flex align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Products</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $product[0]->products_name }}</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="product-details-top">
                <div class="row">
                    <div class="col-md-6">
                        <div class="product-gallery product-gallery-vertical">
                            <div class="row">
                                <figure class="product-main-image">
                                    <img id="product-zoom" src="{{ asset('images/' . $images_product[0]->path) }}"
                                         data-zoom-image="{{ asset('users/assets/images/products/single/1-big.jpg') }}"
                                         alt="product image">

                                    <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                        <i class="icon-arrows"></i>
                                    </a>
                                </figure><!-- End .product-main-image -->

                                <div id="product-zoom-gallery" class="product-image-gallery">
                                    @foreach ($images_product as $image)
                                        <a class="product-gallery-item active" href="#"
                                           data-image="{{ asset('images/' . $image->path) }}"
                                           data-zoom-image="{{ asset('images/' . $image->path) }}">
                                            <img src="{{ asset('images/' . $image->path) }}" alt="product side">
                                        </a>

                                    @endforeach
                                </div><!-- End .product-image-gallery -->
                            </div><!-- End .row -->
                        </div><!-- End .product-gallery -->
                    </div><!-- End .col-md-6 -->

                    <div class="col-md-6">
                        <div class="product-details">
                            <h1 class="product-title">{{ $product[0]->products_name }}</h1><!-- End .product-title -->

                            <div class="ratings-container">
                              
                                <a class="ratings-text" href="#product-review-link"
                                   id="review-link">{{ $product[0]->liked }} Liked</a>
                            </div><!-- End .rating-container -->

                            <div class="product-price">
                                {{ $product[0]->price }} VND
                            </div><!-- End .product-price -->

                            <div class="details-filter-row details-row-size">
                                <label for="qty">Qty:</label>
                                <div class="product-details-quantity">
                                    <input type="number" id="qty" class="form-control" value="1" min="1" max="10"
                                           step="1" data-decimals="0" required>
                                </div><!-- End .product-details-quantity -->
                            </div><!-- End .details-filter-row -->

                            <div class="product-details-action">
                                <a href="/product/add-to-cart/{{ $product[0]->id }}" class="btn-product btn-cart"><span>add to cart</span></a>

                                <div class="details-action-wrapper">
                                    <a href="#" class="btn-product btn-wishlist"
                                       title="Wishlist"><span>Add to Wishlist</span></a>
                                </div><!-- End .details-action-wrapper -->
                            </div><!-- End .product-details-action -->


                        </div><!-- End .product-details -->
                    </div><!-- End .col-md-6 -->
                </div><!-- End .row -->
            </div><!-- End .product-details-top -->

            <div class="product-details-tab">
                <ul class="nav nav-pills justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab"
                           role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab"
                           role="tab" aria-controls="product-review-tab" aria-selected="false">Reviews</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel"
                         aria-labelledby="product-desc-link">
                        <div class="product-desc-content">
                            <h3>Product Information</h3>
                            <ul>
                                <li><strong>CPU: </strong> <span>{{$information[0]->CPU}}</span></li>
                                <li><strong>RAM: </strong> <span>{{$information[0]->RAM}}</span></li>
                                <li><strong>ROM: </strong> <span>{{$information[0]->ROM}}</span></li>
                                <li><strong>Operating System: </strong>
                                    <span>{{$information[0]->Operating_system}}</span></li>
                                <li><strong>SCREEN: </strong> <span>{{$information[0]->SCREEN}}</span></li>
                                <li><strong>WEIGHT: </strong> <span>{{$information[0]->WEIGHT}}</span></li>
                            </ul>
                        </div><!-- End .product-desc-content -->
                    </div><!-- .End .tab-pane -->

                    <div class="tab-pane fade" id="product-review-tab" role="tabpanel"
                         aria-labelledby="product-review-link">
                        <div class="reviews">
                            @auth
                            <form action="{{ route('comment.product', ['pid'=>$product[0]->id]) }}" method="post"
                                style="margin-bottom: 20px;">
                                @csrf
                                <input type="text" class="form-control" name="comment" id="cmt"
                                       placeholder="Comment here...." required="" style="margin-bottom: 0;">
                                <button class="btn btn-primary" type="submit">POST <i class="icon-long-arrow-right"></i>
                                </button>
                            </form>
                            @endauth
                            {{-- <h3>Reviews (2)</h3> --}}
                            @foreach($comments as $item)
                            <div class="review" >
                                <div class="row no-gutters">
                                    <div class="col-4">
                                        <h4>{{$item->name}}</h4>
                                        <div class="ratings-container">
                                        </div><!-- End .rating-container -->
                                    </div><!-- End .col -->
                                    <div class="col-8">
                                        <h4>{{$item->comment}}</h4>
                                    </div><!-- End .col-auto -->
                                </div><!-- End .row -->
                            </div><!-- End .review -->
                            @endforeach
                    </div><!-- .End .tab-pane -->
                </div><!-- End .tab-content -->
            </div><!-- End .product-details-tab -->


        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->

@include('users.layouts.footer')
