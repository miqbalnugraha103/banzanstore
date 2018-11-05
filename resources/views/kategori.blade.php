@extends('app.app')

@section('style')
    <title>Kategori | BangzanStore</title>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('styles/bootstrap4/bootstrap.min.css') }}">
    <link href="{{ URL::asset('plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('plugins/OwlCarousel2-2.2.1/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('plugins/jquery-ui-1.12.1.custom/jquery-ui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('styles/shop_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('styles/shop_responsive.css') }}">
@endsection

@section('content')
	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="../../images/shop_background.jpg"></div>
		<div class="home_overlay"></div>
		<div class="home_content d-flex flex-column align-items-center justify-content-center">
			<h2 class="home_title" id="judul_kategori"></h2>
		</div>
	</div>

	<!-- Shop -->

	<div class="shop">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">

					<!-- Shop Sidebar -->
					<div class="shop_sidebar">
						<div class="sidebar_section">
							<div class="sidebar_title">Kategori Terkait</div>
							<ul class="sidebar_categories" id="kategori-terkait">
								
							</ul>
						</div>
						<div class="sidebar_section filter_by_section">
							<!-- <div class="sidebar_title">Filter By</div>
							<div class="sidebar_subtitle">Price</div> -->
							<!-- <div class="filter_price">
								<div id="slider-range" class="slider_range"></div>
								<p>Range: </p>
								<p><input type="text" id="amount" class="amount" readonly style="border:0; font-weight:bold;"></p>
							</div> -->
						</div>
					</div>

				</div>

				<div class="col-lg-9">
					
					<!-- Shop Content -->

					<div class="shop_content">
						<div class="shop_bar clearfix">
							<div class="shop_product_count"><span id="total_barang"></span> Total Barang</div>
						</div>

						<div class="product_grid">
							<div class="product_grid_border"></div>
							<div id="listBarang"></div>
						</div>
						<div class="shop_page_nav d-flex flex-row">
							<ul class="page_nav d-flex flex-row" id="pagination"></ul>
						</div>

					</div>

				</div>
			</div>
		</div>
	</div>
    <input type="hidden" id="page" value="{{$page}}">
    <input type="hidden" id="urlKategori" value="{{$kategori}}">
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
	<script src="{{ URL::asset('plugins/Isotope/isotope.pkgd.min.js') }}"></script>
	<script src="{{ URL::asset('plugins/jquery-ui-1.12.1.custom/jquery-ui.js') }}"></script>
	<script src="{{ URL::asset('plugins/parallax-js-master/parallax.min.js') }}"></script>
	<script src="{{ URL::asset('js/shop_custom.js') }}"></script>
    <script>
    	function rupiah(harga){
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
	        var	number_string = harga.toString(),
	        sisa 	= number_string.length % 3,
	        rupiah 	= number_string.substr(0, sisa),
	        ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
	            
	        if (ribuan) {
	            separator = sisa ? '.' : '';
	            rupiah += separator + ribuan.join('.');
	        }
	        return 'Rp '+rupiah;
    	}
    	
    	var kategori = <?php echo $data->hasil_arr_kat ?>;
        var urlKategori = $('#urlKategori').val();
        html = '';
        for (var i = 0; i < kategori.length; i++) {
            html += '<li class="hassubs">';
            html += '<a href="javascript:void(0)">'+kategori[i].name+'<i class="fas fa-chevron-right"></i></a>';
            html += '<ul>';
            if(kategori[i].url.split("?jtm")[0] == urlKategori){
            	judul_kategori = kategori[i].name;
            }
            for (var a = 0; a < kategori[i].children.length; a++) {
                html += '<li class="';
                if(kategori[i].children[a].url.split("?jtm")[0] == urlKategori){
	            	judul_kategori = kategori[i].children[a].name;
	            }
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
                	if(kategori[i].children[a].children[c].url.split("?jtm")[0] == urlKategori){
		            	judul_kategori = kategori[i].children[a].children[c].name;
		            }
                    html += '<li><a href="{{ url("/kategori")}}/'+kategori[i].children[a].children[c].url.split("?jtm")[0]+'/1">'+kategori[i].children[a].children[c].name+'<i class="fas fa-chevron-right"></i></a></li>';
                }
                html += '</ul>';
                html += '</li>';
            }
            // html += '<li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>';
            html += '</ul>';
            html += '</li>';
        }
        $('#judul_kategori').html(judul_kategori);
        $('#kategori').html(html);
	    var data = <?php echo $data->listBarang; ?>;
	    var html = '';
	    var index = 0;
	    for (var i = 0; i < data.products.length; i++) {
	    	discount = 0;
	    	html += '<div class="product_item ';
	    	if(data.products[i].sku[0].discount > 0){
	    		discount = rupiah(data.products[i].sku[0].price);
	    	}
	    	if(data.products[i].sku[0].is_new){
	    		html += 'is_new';
	    	}
	        harga = rupiah(data.products[i].sku[0].final_price);
	    	html += '">';
	    	url_asli = data.products[i].sku[0].url;
            url = url_asli.split('/');
            url_id_asli = url[4].split('?jtm');
            url_id = url_id_asli[1].split('#');
			html += '<div class="product_border"></div>';
			html += '<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="'+data.products[i].sku[0].image+'" alt="" style="width:140px; height:140px;"></div>';
			html += '<div class="product_content">';
			html += '<div class="product_price">'+harga;
			if(discount != 0){
				html += '<span>'+discount+'</span>';
			}
			html += '</div><div class="product_name"><div><a href="{{url("/barang")}}/'+url[3]+'/'+url_id_asli[0]+'?id='+url_id[1]+'" tabindex="0">'+data.products[i].name.slice(0, 20)+'...</a></div></div>';
			html += '</div>';
			// html += '<div class="product_fav"><i class="fas fa-heart"></i></div>';
			html += '<ul class="product_marks">';
			html += '<li class="product_mark product_new">new</li>';
			html += '</ul>';
			html += '</div>';
	    }
	    $('#listBarang').html(html);
	    $('#total_barang').html(data.pagination.total);
	    pagination = '';
	    index = 1;
	    cekGet = $('#page').val();
	    var d;
	    for(d in data.pagination.links.first){
	        pagination += '<li'
	        if(d==cekGet){
	            pagination += ' style="background-color:#007bff;"';
	        }
	        pagination += '><a href="{{ url("/kategori")}}/{{$kategori}}/'+d+'">'+d+'</a></li>';
	        index++;
	    }
	    if(data.pagination.links.hasSlider){
	        pagination += '<li><a href="javascript:void(0)">...</a></li>'
	    }
	    var d;
	    for(d in data.pagination.links.slider){
	        pagination += '<li'
	        if(d==cekGet){
	            pagination += ' style="background-color:#007bff;"';
	        }
	        pagination += '><a href="{{ url("/kategori")}}/{{$kategori}}/'+d+'">'+d+'</a></li>';
	        index++;
	    }
	    if(data.pagination.links.hasLast){
	        pagination += '<li><a href="javascript:void(0)">...</a></li>'
	    }
	    var d;
	    for(d in data.pagination.links.last){
	        pagination += '<li'
	        if(d==cekGet){
	            pagination += ' style="background-color:#007bff;"';
	        }
	        pagination += '><a href="{{ url("/kategori")}}/{{$kategori}}/'+d+'">'+d+'</a></li>';
	        index++;
	    }
	    $('#pagination').html(pagination);
	    // window.onscroll = function() {myFunction()};

	    // var header = document.getElementById("panel-kategori");
	    // var sticky = document.getElementById("panel-barang").offsetTop;

	    // function myFunction() {
	    // if (window.pageYOffset > sticky) {
	    //     header.classList.add("sticky");
	    // } else {
	    //     header.classList.remove("sticky");
	    // }
	    // }
	</script>
@endsection