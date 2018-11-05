@extends('app.app')

@section('style')
    <title>Home | BangzanStore</title>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('styles/bootstrap4/bootstrap.min.css') }}">
    <link href="{{ URL::asset('plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('plugins/OwlCarousel2-2.2.1/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('plugins/slick-1.8.0/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('styles/main_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('styles/responsive.css') }}">
@endsection

@section('content')
    <div class="banner">
        <div class="banner_background" style="background-image:url(images/banner_background.jpg)"></div>
        <div class="container fill_height">
            <div class="row fill_height">
                <div class="banner_product_image"><img src="images/banner_product.png" alt=""></div>
                <div class="col-lg-5 offset-lg-4 fill_height">
                    <div class="banner_content">
                        <h1 class="banner_text">new era of smartphones</h1>
                        <div class="banner_price"><span>$530</span>$460</div>
                        <div class="banner_product_name">Apple Iphone 6s</div>
                        <div class="button banner_button"><a href="#">Shop Now</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="popular_categories">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="popular_categories_content">
                        <div class="popular_categories_title">Popular Categories</div>
                        <div class="popular_categories_slider_nav">
                            <div class="popular_categories_prev popular_categories_nav"><i class="fas fa-angle-left ml-auto"></i></div>
                            <div class="popular_categories_next popular_categories_nav"><i class="fas fa-angle-right ml-auto"></i></div>
                        </div>
                        <div class="popular_categories_link"><a href="#">full catalog</a></div>
                    </div>
                </div>
                
                <!-- Popular Categories Slider -->

                <div class="col-lg-9">
                    <div class="popular_categories_slider_container">
                        <div class="owl-carousel owl-theme popular_categories_slider" id="kategori_populer">
                            <?php $index = 0; ?>
                            @foreach ($data->hasil_populer as $d)
                                <?php 
                                    $name = explode('/', $d); 
                                    $nama = explode('?', $name[3]); 
                                    $kategori = $nama[0];
                                    $array = explode('-', $nama[0]);
                                    $nama = '';
                                    for ($i=0; $i < count($array); $i++) { 
                                        $nama .= ucfirst($array[$i]).' ';
                                    }
                                ?>
                                <div class="owl-item">
                                    <div class="popular_category d-flex flex-column align-items-center justify-content-center">
                                        <div class="popular_category_image"><img src="images/popular_1.png" alt=""></div>
                                        <div class="popular_category_text">{{$nama}}</div>
                                    </div>
                                </div>
                                @if($index == 15)
                                    <?php break; ?>
                                @endif
                                <?php $index++; ?>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Hot New Arrivals -->
    <div id="kategori_barang">
        
    </div>
@endsection

@section('kategori')
    <div class="cat_menu_container">
        <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
            <div class="cat_burger"><span></span><span></span><span></span></div>
            <div class="cat_menu_text">Kategori</div>
        </div>

        <ul class="cat_menu" id="kategori">
            
        </ul>
    </div>
@endsection

@section('javascript')
    <script src="{{ URL::asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ URL::asset('styles/bootstrap4/popper.js') }}"></script>
    <script src="{{ URL::asset('styles/bootstrap4/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/greensock/TweenMax.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/greensock/TimelineMax.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/greensock/animation.gsap.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/greensock/ScrollToPlugin.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
    <script src="{{ URL::asset('plugins/slick-1.8.0/slick.js') }}"></script>
    <script src="{{ URL::asset('plugins/easing/easing.js') }}"></script>
    <script src="{{ URL::asset('js/custom.js') }}"></script>
    <script type="text/javascript">
        var kategori = <?php echo $data->hasil_arr_kat ?>;
        html = '';
        for (var i = 0; i < kategori.length; i++) {
            html += '<li class="hassubs">';
            html += '<a href="#">'+kategori[i].name+'<i class="fas fa-chevron-right"></i></a>';
            html += '<ul>';
            for (var a = 0; a < kategori[i].children.length; a++) {
                html += '<li class="';
                if(kategori[i].children[a].children.length > 0){
                    html += 'hassubs';
                }
                html += '"><a href="';
                if(kategori[i].children[a].children.length > 0){
                    html += 'javascript:void(0)';
                } else {
                    html += '{{ url("/kategori")}}/'+kategori[i].children[a].url.split("?jtm")[0]+'/1';
                }
                html += '">'+kategori[i].children[a].name+'<i class="fas fa-chevron-right"></i></a>';
                html += '<ul>';
                for (var c = 0; c < kategori[i].children[a].children.length; c++) {
                    html += '<li><a href="{{ url("/kategori")}}/'+kategori[i].children[a].children[c].url.split("?jtm")[0]+'/1">'+kategori[i].children[a].children[c].name+'<i class="fas fa-chevron-right"></i></a></li>';
                }
                html += '</ul>';
                html += '</li>';
            }
            // html += '<li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>';
            html += '</ul>';
            html += '</li>';
        }
        $('#kategori').html(html);
        var kategori_barang = <?php echo $data->hasil_arr_barang ?>;
        console.log(kategori_barang);
        var x;
        html = '';
        for (x in kategori_barang) {
            html += '<div class="new_arrivals"><div class="container"><div class="row"><div class="col"><div class="tabbed_container"><div class="tabs clearfix tabs-left">';
            html += '<ul class="clearfix">';
            for (var i = 0; i < kategori_barang[x].length; i++) {
                html += '<li '
                if(i == 0){
                    html += 'class="active"';
                }
                html += '>'+kategori_barang[x][i].name+'</li>';
            }
            html += '</ul><div class="tabs_line"><span></span></div></div><div class="row"><div class="col-lg-12" style="z-index:1;">';
            for (var i = 0; i < kategori_barang[x].length; i++) {
                html += '<!-- Product Panel --><div class="product_panel panel ';
                if(i == 0){
                    html += 'active';
                }
                html += '">';
                html += '<div class="arrivals_slider slider">';
                for (var a = 0; a < kategori_barang[x][i].products.length; a++) {
                    harga = kategori_barang[x][i].products[a].sku[0].final_price;
                    if(parseInt(harga) <= 50000){
                        harga = parseInt(harga) + 10000;
                    } else if(parseInt(harga) <= 150000){
                        harga = parseInt(harga) + 20000;
                    } else if(parseInt(harga) <= 300000){
                        harga = parseInt(harga) + 30000;
                    } else if(parseInt(harga) <= 600000){
                        harga = parseInt(harga) + 50000;
                    } else if(parseInt(harga) <= 600000){
                        harga = parseInt(harga) + 70000;
                    } else if(parseInt(harga) <= 1200000){
                        harga = parseInt(harga) + 90000;
                    } else {
                        harga = parseInt(harga) + 110000;
                    }
                    var number_string = harga.toString(),
                    sisa    = number_string.length % 3,
                    rupiah  = number_string.substr(0, sisa),
                    ribuan  = number_string.substr(sisa).match(/\d{3}/g);
                        
                    if (ribuan) {
                        separator = sisa ? '.' : '';
                        rupiah += separator + ribuan.join('.');
                    }
                    harga = 'Rp '+rupiah;
                    html += '<!-- Slider Item --><div class="arrivals_slider_item">';
                    html += '<div class="border_active"></div>';
                    html += '<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">';
                    html += '<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="'+kategori_barang[x][i].products[a].sku[0].image+'" alt="" style="width:100px; height:100px;"></div>';
                    html += '<div class="product_content">';
                    html += '<div class="product_price">'+harga+'</div>';
                    html += '<div class="product_name"><div><a href="product.html">'+kategori_barang[x][i].products[a].name.slice(0, 25)+'...</a></div></div>';
                    html += '<div class="product_extras">';
                    html += '<div class="product_color">';
                    html += '<input type="radio" checked name="product_color" style="background:#b19c83">';
                    html += '<input type="radio" name="product_color" style="background:#000000">';
                    html += '<input type="radio" name="product_color" style="background:#999999">';
                    html += '</div>';
                    html += '<button class="product_cart_button">Add to Cart</button>';
                    html += '</div>';
                    html += '</div>';
                    html += '<div class="product_fav"><i class="fas fa-heart"></i></div>';
                    html += '<ul class="product_marks">';
                    html += '<li class="product_mark product_discount"></li>';
                    // html += '<li class="product_mark product_new">new</li>';
                    html += '</ul>';
                    html += '</div>';
                    html += '</div>';
                }
                html += '</div>';
                html += '<div class="arrivals_slider_dots_cover"></div>';
                html += '</div>';
            }

            html += '</div></div></div></div></div></div></div>';
            // for (var i = 0; i < kategori_barang[x].length; i++) {
            //     html += '<div class="recommended_items">';
            //     html += '<h2 class="title text-center">'+kategori_barang[x][i].name+'</h2><div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">';
            //     products = kategori_barang[x][i].products;
            //     indexCss = 0;
            //     for (var a = 0; a < products.length; a++) {
            //         harga = products[a].sku[0].final_price;
            //         if(parseInt(harga) <= 50000){
            //             harga = parseInt(harga) + 10000;
            //         } else if(parseInt(harga) <= 150000){
            //             harga = parseInt(harga) + 20000;
            //         } else if(parseInt(harga) <= 300000){
            //             harga = parseInt(harga) + 30000;
            //         } else if(parseInt(harga) <= 600000){
            //             harga = parseInt(harga) + 50000;
            //         } else if(parseInt(harga) <= 600000){
            //             harga = parseInt(harga) + 70000;
            //         } else if(parseInt(harga) <= 1200000){
            //             harga = parseInt(harga) + 90000;
            //         } else {
            //             harga = parseInt(harga) + 110000;
            //         }
            //         var number_string = harga.toString(),
            //         sisa    = number_string.length % 3,
            //         rupiah  = number_string.substr(0, sisa),
            //         ribuan  = number_string.substr(sisa).match(/\d{3}/g);
                        
            //         if (ribuan) {
            //             separator = sisa ? '.' : '';
            //             rupiah += separator + ribuan.join('.');
            //         }
            //         harga = 'Rp '+rupiah;
            //         css = '';
            //         if((indexCss%4) == 0){
            //             css = 'style="clear:both"';
            //         }
            //         url = products[a].url.split('/');
            //         html += '<a href="{{url("/barang")}}/'+url[3]+'/'+url[4]+'?id='+products[a].sku[0].code+'"><div class="col-sm-3" '+css+'><div class="product-image-wrapper"><div class="single-products"><div class="productinfo text-center"><img src="'+products[a].sku[0].image+'" alt="" /><h2></h2><p>'+products[a].name+'</p><p>'+harga+'</p></div></div></div></div></a>';
            //         indexCss++;
            //     }
            //     html += '</div></div>';
            // }
        }
        $('#kategori_barang').html(html);
    </script>
@endsection