@include('users.layouts.header-product')
<main class="main">
    <div class="page-header text-center" style="background-image: url('{{ asset('users/assets/images/page-header-bg.jpg') }}')">
        <div class="container">
            <h1 class="page-title">My Account<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Account</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="dashboard">
            <div class="container">
                <div class="row">
                    <aside class="col-md-4 col-lg-3">
                        <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false">Account Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-dashboard-link" data-toggle="tab" href="#tab-dashboard" role="tab" aria-controls="tab-dashboard" aria-selected="true">Product Liked</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Sign Out</a>
                            </li>
                        </ul>
                    </aside><!-- End .col-lg-3 -->

                    <div class="col-md-8 col-lg-9">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">
                                <form action="#">
                                    <label>Full Name *</label>
                                    <input type="text" value="{{auth()->user()->name}}" class="form-control" required>
                                   
                                    <label>Email address *</label>
                                    <input type="email" value="{{auth()->user()->email}}" class="form-control" required>

                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>SAVE CHANGES</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                </form>

                                <p> Forgot your password <a href="/forgot-password">click here</a>
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane fade" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <div class="products mb-3">
                                                <div class="row justify-content-start">
                        
                                         
                                                    <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                                        <div class="product product-7 text-center">
                                                            <figure class="product-media">
                                                                <a href="/product/details/1">
                                                                    <img src="{{ asset('images/01/Picture1.png') }}" alt="Product image" class="product-image">
                                                                </a>
                                                            
                                                                <div class="product-action-vertical">
                                                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                                                </div><!-- End .product-action-vertical -->
                        
                                                                <div class="product-action">
                                                                    <a href="/product/add-to-cart/1" class="btn-product btn-cart"><span>add to cart</span></a>
                                                                </div><!-- End .product-action -->
                                                            </figure><!-- End .product-media -->
                        
                                                            <div class="product-body">
                                                                <div class="product-cat">
                                                                    <a href="#">LAPTOP</a>
                                                                </div><!-- End .product-cat -->
                                                                <h3 class="product-title"><a href="/product/details/1">TAdgADKJahkAHSKJAhskjh</a></h3><!-- End .product-title -->
                                                                <div class="product-price">
                                                                   343243424 VND
                                                                </div><!-- End .product-price -->
                                                               
                                                            </div><!-- End .product-body -->
                                                        </div><!-- End .product -->
                                                    </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
                                                
                                                  
                        
                                                   
                                                </div><!-- End .row -->
                                            </div><!-- End .products -->
                        
                        
                                        </div><!-- End .col-lg-9 -->
                                      
                                    </div><!-- End .row -->
                                </div><!-- End .container -->
                            </div><!-- .End .tab-pane -->
                           
                        </div>
                    </div><!-- End .col-lg-9 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .dashboard -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
@include('users.layouts.footer')