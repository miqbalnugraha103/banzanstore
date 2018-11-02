@extends('app.app')

@section('style')
    <title>Home | BangzanStore</title>
@endsection

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Kategori</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                                                        <!-- <div class="panel panel-default">
                                                                <div class="panel-heading">
                                                                        <h4 class="panel-title">
                                                                                <a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
                                                                                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                                                                        Sportswear
                                                                                </a>
                                                                        </h4>
                                                                </div>
                                                                <div id="sportswear" class="panel-collapse collapse">
                                                                        <div class="panel-body">
                                                                                <ul>
                                                                                        <li><a href="#">Nike </a></li>
                                                                                        <li><a href="#">Under Armour </a></li>
                                                                                        <li><a href="#">Adidas </a></li>
                                                                                        <li><a href="#">Puma</a></li>
                                                                                        <li><a href="#">ASICS </a></li>
                                                                                </ul>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <div class="panel panel-default">
                                                                <div class="panel-heading">
                                                                        <h4 class="panel-title">
                                                                                <a data-toggle="collapse" data-parent="#accordian" href="#mens">
                                                                                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                                                                        Mens
                                                                                </a>
                                                                        </h4>
                                                                </div>
                                                                <div id="mens" class="panel-collapse collapse">
                                                                        <div class="panel-body">
                                                                                <ul>
                                                                                        <li><a href="#">Fendi</a></li>
                                                                                        <li><a href="#">Guess</a></li>
                                                                                        <li><a href="#">Valentino</a></li>
                                                                                        <li><a href="#">Dior</a></li>
                                                                                        <li><a href="#">Versace</a></li>
                                                                                        <li><a href="#">Armani</a></li>
                                                                                        <li><a href="#">Prada</a></li>
                                                                                        <li><a href="#">Dolce and Gabbana</a></li>
                                                                                        <li><a href="#">Chanel</a></li>
                                                                                        <li><a href="#">Gucci</a></li>
                                                                                </ul>
                                                                        </div>
                                                                </div>
                                                        </div>-->
                                                        
                                                        
                                                </div><!--/category-products-->
                                                <!-- <div class="price-range">
                                                        <h2>Price Range</h2>
                                                        <div class="well text-center">
                                                                 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                                                                 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                                                        </div>
                                                </div> --><!--/price-range-->
                                                
                                                <!-- <div class="shipping text-center"> -->
                                                        <!-- <img src="images/home/shipping.jpg" alt="" /> -->
                                                <!-- </div> -->
                                        
                                        </div>
                                </div>
                                
                                <div class="col-sm-9 padding-right">
                                        <!-- <div class="category-tab">
                                                <div class="tab-content">
                                                        <div class="tab-pane fade" id="sunglass" >
                                                                <div class="col-sm-3">
                                                                        <div class="product-image-wrapper">
                                                                                <div class="single-products">
                                                                                        <div class="productinfo text-center">
                                                                                                <img src="images/home/gallery3.jpg" alt="" />
                                                                                                <h2>$56</h2>
                                                                                                <p>Easy Polo Black Edition</p>
                                                                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                                                        </div>
                                                                                        
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                        <div class="product-image-wrapper">
                                                                                <div class="single-products">
                                                                                        <div class="productinfo text-center">
                                                                                                <img src="images/home/gallery4.jpg" alt="" />
                                                                                                <h2>$56</h2>
                                                                                                <p>Easy Polo Black Edition</p>
                                                                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                                                        </div>
                                                                                        
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                        <div class="product-image-wrapper">
                                                                                <div class="single-products">
                                                                                        <div class="productinfo text-center">
                                                                                                <img src="images/home/gallery1.jpg" alt="" />
                                                                                                <h2>$56</h2>
                                                                                                <p>Easy Polo Black Edition</p>
                                                                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                                                        </div>
                                                                                        
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                        <div class="product-image-wrapper">
                                                                                <div class="single-products">
                                                                                        <div class="productinfo text-center">
                                                                                                <img src="images/home/gallery2.jpg" alt="" />
                                                                                                <h2>$56</h2>
                                                                                                <p>Easy Polo Black Edition</p>
                                                                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                                                        </div>
                                                                                        
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        
                                                        <div class="tab-pane fade" id="kids" >
                                                                <div class="col-sm-3">
                                                                        <div class="product-image-wrapper">
                                                                                <div class="single-products">
                                                                                        <div class="productinfo text-center">
                                                                                                <img src="images/home/gallery1.jpg" alt="" />
                                                                                                <h2>$56</h2>
                                                                                                <p>Easy Polo Black Edition</p>
                                                                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                                                        </div>
                                                                                        
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                        <div class="product-image-wrapper">
                                                                                <div class="single-products">
                                                                                        <div class="productinfo text-center">
                                                                                                <img src="images/home/gallery2.jpg" alt="" />
                                                                                                <h2>$56</h2>
                                                                                                <p>Easy Polo Black Edition</p>
                                                                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                                                        </div>
                                                                                        
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                        <div class="product-image-wrapper">
                                                                                <div class="single-products">
                                                                                        <div class="productinfo text-center">
                                                                                                <img src="images/home/gallery3.jpg" alt="" />
                                                                                                <h2>$56</h2>
                                                                                                <p>Easy Polo Black Edition</p>
                                                                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                                                        </div>
                                                                                        
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                        <div class="product-image-wrapper">
                                                                                <div class="single-products">
                                                                                        <div class="productinfo text-center">
                                                                                                <img src="images/home/gallery4.jpg" alt="" />
                                                                                                <h2>$56</h2>
                                                                                                <p>Easy Polo Black Edition</p>
                                                                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                                                        </div>
                                                                                        
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        
                                                        <div class="tab-pane fade" id="poloshirt" >
                                                                <div class="col-sm-3">
                                                                        <div class="product-image-wrapper">
                                                                                <div class="single-products">
                                                                                        <div class="productinfo text-center">
                                                                                                <img src="images/home/gallery2.jpg" alt="" />
                                                                                                <h2>$56</h2>
                                                                                                <p>Easy Polo Black Edition</p>
                                                                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                                                        </div>
                                                                                        
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                        <div class="product-image-wrapper">
                                                                                <div class="single-products">
                                                                                        <div class="productinfo text-center">
                                                                                                <img src="images/home/gallery4.jpg" alt="" />
                                                                                                <h2>$56</h2>
                                                                                                <p>Easy Polo Black Edition</p>
                                                                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                                                        </div>
                                                                                        
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                        <div class="product-image-wrapper">
                                                                                <div class="single-products">
                                                                                        <div class="productinfo text-center">
                                                                                                <img src="images/home/gallery3.jpg" alt="" />
                                                                                                <h2>$56</h2>
                                                                                                <p>Easy Polo Black Edition</p>
                                                                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                                                        </div>
                                                                                        
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                        <div class="product-image-wrapper">
                                                                                <div class="single-products">
                                                                                        <div class="productinfo text-center">
                                                                                                <img src="images/home/gallery1.jpg" alt="" />
                                                                                                <h2>$56</h2>
                                                                                                <p>Easy Polo Black Edition</p>
                                                                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                                                        </div>
                                                                                        
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div> --><!--/category-tab-->

                                        <div class="features_items"><!--features_items-->
                                            <h2 class="title text-center">Kategori Terpopuler</h2>
                                            <?php $index = 0; 
                                                $indexCss = 0;
                                            ?>
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
                                                    $css = '';
                                                    if (($indexCss%4) == 0) {
                                                        $css = 'style="clear:both;"';
                                                    }
                                                ?>
                                                <div class="col-sm-3" <?php echo $css; ?>>
                                                    <div class="product-image-wrapper">
                                                        <a href="{{url('/kategori/'.$kategori.'/1')}}">
                                                            <div class="single-products">
                                                                <div class="productinfo text-center">
                                                                    <!-- <img src="" alt="" /><h2></h2><p></p> -->
                                                                    <h5><?php echo ucfirst($nama); ?></h5>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                @if($index == 15)
                                                    <?php break; ?>
                                                @endif
                                                <?php $index++; $indexCss++; ?>
                                            @endforeach
                                        </div>
                                        
                                        <div id="kategori_barang">
                                            
                                        </div>
                                        
                                </div>
                        </div>
                </div>
        </section>
@endsection

@section('javascript')
    <script type="text/javascript">
        var kategori = <?php echo $data->hasil_arr_kat ?>;
        html = '';
        for (var i = 0; i < kategori.length; i++) {
            // console.log(kategori[i]);
            html += '<div class="panel panel-default"><div class="panel-heading"><h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordian" href="#'+i+'"><span class="badge pull-right"><i class="fa fa-plus"></i></span>'+kategori[i].name+'</a></h4></div><div id="'+i+'" class="panel-collapse collapse"><div class="panel-body"><ul>';
            for (var a = 0; a < kategori[i].children.length; a++) {
                html += '<li><a href="{{ url("/kategori")}}/'+kategori[i].children[a].url.split("?jtm")[0]+'/1">'+kategori[i].children[a].name+'</a></li>';
            }
            html += '</ul></div></div></div>';
        }
        $('#accordian').html(html);
        var kategori_barang = <?php echo $data->hasil_arr_barang ?>;
        var x;
        html = '';
        for (x in kategori_barang) {
            for (var i = 0; i < kategori_barang[x].length; i++) {
                html += '<div class="recommended_items">';
                html += '<h2 class="title text-center">'+kategori_barang[x][i].name+'</h2><div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">';
                products = kategori_barang[x][i].products;
                indexCss = 0;
                for (var a = 0; a < products.length; a++) {
                    harga = products[a].sku[0].final_price;
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
                    css = '';
                    if((indexCss%4) == 0){
                        css = 'style="clear:both"';
                    }
                    url = products[a].url.split('/');
                    console.log(products[a]);
                    html += '<a href="{{url("/barang")}}/'+url[3]+'/'+url[4]+'?id='+products[a].sku[0].code+'"><div class="col-sm-3" '+css+'><div class="product-image-wrapper"><div class="single-products"><div class="productinfo text-center"><img src="'+products[a].sku[0].image+'" alt="" /><h2></h2><p>'+products[a].name+'</p><p>'+harga+'</p></div></div></div></div></a>';
                    indexCss++;
                }
                html += '</div></div>';
            }
        }
        $('#kategori_barang').html(html);
    </script>
@endsection