@extends('app.app')

@section('style')
    <title>Home | BangzanStore</title>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('styles/bootstrap4/bootstrap.min.css') }}">
    <link href="{{ URL::asset('plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('plugins/OwlCarousel2-2.2.1/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('styles/product_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('styles/product_responsive.css') }}">
@endsection

@section('content')
	<div class="single_product">
		<div class="container">
			<div class="row">

				<!-- Images -->
				<div class="col-lg-2 order-lg-1 order-2">
					<ul class="image_list" id="deret_image"></ul>
				</div>

				<!-- Selected Image -->
				<div class="col-lg-5 order-lg-2 order-1">
					<div class="image_selected"><img src="images/single_4.jpg" alt=""  id="image_detail_utama"></div>
				</div>

				<!-- Description -->
				<div class="col-lg-5 order-3">
					<div class="product_description">
						<div class="product_category">Laptops</div>
						<div class="product_name" id="namaBarang"></div>
						<!-- <div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div> -->
						<div class="product_text"></div>
						<div class="order_info d-flex flex-row">
							<form action="#">
								<div class="clearfix" style="z-index: 1000;">

									<!-- Product Quantity -->
									<div class="product_quantity clearfix">
										<span>Quantity: </span>
										<input id="quantity_input" type="text" pattern="[0-9]*" value="1">
										<div class="quantity_buttons">
											<div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
											<div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
										</div>
									</div>

									<!-- Product Color -->
									<ul class="product_color">
										<li>
											<span>Color: </span>
											<div class="color_mark_container"><div id="selected_color" class="color_mark"></div></div>
											<div class="color_dropdown_button"><i class="fas fa-chevron-down"></i></div>

											<ul class="color_list">
												<li><div class="color_mark" style="background: #999999;"></div></li>
												<li><div class="color_mark" style="background: #b19c83;"></div></li>
												<li><div class="color_mark" style="background: #000000;"></div></li>
											</ul>
										</li>
									</ul>

									<ul class="product_color">
										<li>
											<span>Color: </span>
											<div class="color_mark_container"><div id="selected_color" class="color_mark"></div></div>
											<div class="color_dropdown_button"><i class="fas fa-chevron-down"></i></div>

											<ul class="color_list">
												<li><div class="color_mark" style="background: #999999;"></div></li>
												<li><div class="color_mark" style="background: #b19c83;"></div></li>
												<li><div class="color_mark" style="background: #000000;"></div></li>
											</ul>
										</li>
									</ul>

								</div>

								<div class="product_price">$2000</div>
								<div class="button_container">
									<button type="button" class="button cart_button">Add to Cart</button>
									<div class="product_fav"><i class="fas fa-heart"></i></div>
								</div>
								
							</form>
						</div>
					</div>
				</div>

			</div>
		</div>

	</div>
	<div class="single_product">
		<div class="container">
			<?php echo $data->informasi; ?>
		</div>
		
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
    <script src="{{ URL::asset('plugins/easing/easing.js') }}"></script>
	<script src="{{ URL::asset('js/product_custom.js') }}"></script>
    <script type="text/javascript">
    	var kategori = <?php echo $data->hasil_arr_kat ?>;
        html = '';
        for (var i = 0; i < kategori.length; i++) {
            html += '<div class="panel panel-default"><div class="panel-heading"><h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordian" href="#'+i+'"><span class="badge pull-right"><i class="fa fa-plus"></i></span>'+kategori[i].name+'</a></h4></div><div id="'+i+'" class="panel-collapse collapse"><div class="panel-body"><ul>';
            for (var a = 0; a < kategori[i].children.length; a++) {
                html += '<li><a href="{{ url("/kategori")}}/'+kategori[i].children[a].url.split("?jtm")[0]+'/1">'+kategori[i].children[a].name+'</a></li>';
            }
            html += '</ul></div></div></div>';
        }
        $('#accordian').html(html);
        var detailBarang = <?php echo $data->detailBarang; ?>;
        // console.log(detailBarang);
        text = '';
        array = replaceall(detailBarang.url.split('/')[4],'-',' ').split(' ');
        for (var i = 0; i < array.length; i++) {
        	text += array[i].charAt(0).toUpperCase() + array[i].slice(1)+' ';
        }
        $('#namaBarang').html(text);
		$('#input_nama_barang').val(text);
        urlBarang = '<?php echo $urlBarang; ?>';
		var id = <?php echo $_GET['id']; ?>;
        detail(id);
        function replaceall(str,replace,with_this){
		    var str_hasil ="";
		    for(var i=0;i<str.length;i++)
		    {
		        if (str[i] == replace)
		        {
		            var temp = with_this;
		        }
		        else
		        {
		            var temp = str[i];
		        }
		        str_hasil += temp;
		    }
		    var result = str_hasil.toString();
		    return result;
		}

		function gantiGambar(link){
			// document.getElementById("image_detail_utama").src = link;
		}

        function detail(id,data=detailBarang){
        	$('#skuBarang').html('SKU : '+id);
			html_input_cari = '<input type="hidden" value="'+id+'" name="sku_barang">';
        	array = data.sku[id].price.final_money.split(' ');
        	harga = replaceall(array[1],'.','');
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
			html_input_cari += '<input type="hidden" value="'+harga+'" name="harga_barang">';
	        var	number_string = harga.toString(),
	        sisa 	= number_string.length % 3,
	        rupiah 	= number_string.substr(0, sisa),
	        ribuan 	= number_string.substr(sisa).match(/\d{3}/g);

	        if (ribuan) {
	            separator = sisa ? '.' : '';
	            rupiah += separator + ribuan.join('.');
	        }
	        harga = 'Rp '+rupiah;
	        $('#stokBarang').html('Stok Kosong');
	        if(data.sku[id].in_stock){
	        	$('#stokBarang').html('Stok Tersedia');
	        } 
	        $('#brandBarang').html('<b>Brand:</b> '+data.store.name);
	        $('#beratBarang').html('<B>Berat:</b> '+data.sku[id].weight_information);
			html_input_cari += '<input type="hidden" value="'+data.sku[id].weight_information+'" name="berat_barang">';
        	$('#hargaBarang').html(harga);
        	if(data.matrix){
	        	var x;
	        	var cek = 0;
	        	for(x in data.matrix){
	        		if (typeof data.matrix[x] == 'object') {
	        			cek = 1;
        			}
	        	}
	        	if (cek == 0) {
		        	html = '';
		        	var x;
		        	for(x in data.matrix){
		        		var y;
		        		for(y in data.variants){
		        			item = data.variants[y].values[x];
		        			varian = data.variants[y].name;
		        		}
		        		if(id == data.matrix[x]){
		        			html += '<p style="float:left;"> <b>['+item+']</b></p>';	
							html_input_cari += '<input type="hidden" value="'+item+'" name="varian_1">';
		        		} else {
		        			html += '<a href="javascript:void(0)" onclick="detail('+data.matrix[x]+')"><p style="float:left;">['+item+']</p></a>';
		        		}
		        		
		        	}
					if(varian){
						$('#variantsBarang').html('<b style="float:left;">'+varian+' :</b>  '+html);
					}
	        	} else {
	        		var x;
	        		html = '';
	        		index = 1;
	        		for(x in data.variants){
	        			var y;
	        			for(y in data.variants[x].values){;
        					var a;
        					for(a in data.matrix){
        						var b;
        						for(b in data.matrix[a]){
        							if(data.matrix[a][b] == id){
        								if(!data.variants[x].previous){
        									id_sekarang_prev_null = a;
        								} else {
        									id_sekarang = b;
        								}
        							} 
        						}
        					}
	        			}
	        		}
	        		// console.log(data.matrix[id_sekarang_prev_null][]);
	        		var x;
					for(x in data.variants){
	        			html += '<p style="clear:both;"><b>'+data.variants[x].name+' :</b></p>';
	        			var y;
	        			for(y in data.variants[x].values){
	        				cek_varian = 0;
	        				id_untuk_varian = 0;
        					var a;
        					for(a in data.matrix){
        						var b;
        						for(b in data.matrix[a]){
        							if(data.matrix[a][b] == id){
        								if(!data.variants[x].previous){
        									cek_varian = a;
        								} else {
        									cek_varian = b;
        								}
        							} else {
        								if(!data.variants[x].previous){
	        								if(a == y && b == id_sekarang){
	        									id_untuk_varian = data.matrix[a][b];
	        								}
	        							} else {
	        								if(a == id_sekarang_prev_null && b == y){
	        									id_untuk_varian = data.matrix[a][b];
	        									
	        								}
	        							}
        							}
        						}
        					}
	        				if(cek_varian == y){
	        					html += '<p style="float:left"> <b>['+data.variants[x].values[y]+']</b></p>';
								html_input_cari += '<input type="hidden" value="'+data.variants[x].values[y]+'" name="varian_2">';
	        				} else {
	        					html += '<a href="javascript:void(0)" onclick="detail('+id_untuk_varian+')"><p style="float:left"> ['+data.variants[x].values[y]+']</p></a>';
	        				}
	        			}
	        			index++;
	        		}
	        		$('#variantsBarang').html(html);
	        	}
        	}
        	gambar = detailBarang.sku[id].images;
        	document.getElementById("image_detail_utama").src = gambar[0].thumbnail;
			html_input_cari += '<input type="hidden" value="'+gambar[0].thumbnail+'" name="gambar">';
			indexGambar = 3;
			if(gambar.length < 3){
				indexGambar = gambar.length;
			}
			html = '';
			for (var i = 0; i < indexGambar; i++) {
				link = "'"+detailBarang.sku[id].images[i].thumbnail+"'";
				html += '<li data-image="'+detailBarang.sku[id].images[i].thumbnail+'"><img src="'+detailBarang.sku[id].images[i].icon+'" alt=""></li>';
				// html += '<a href="javascript:void(0)" onclick="gantiGambar('+link+')"><img src="'+detailBarang.sku[id].images[i].icon+'" alt=""></a>';
				// document.getElementById("image_detail_"+(i+1)).onclick = document.getElementById("image_detail_utama").src = detailBarang.sku[id].images[i].thumbnail;
			}
			$('#deret_image').html(html);
			$('#inputan_cart').html(html_input_cari);
        }
	</script>
	
@endsection