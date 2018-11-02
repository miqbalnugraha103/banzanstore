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
						<h2>KATEGORI</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
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
											<li><a href="">Nike </a></li>
											<li><a href="">Under Armour </a></li>
											<li><a href="">Adidas </a></li>
											<li><a href="">Puma</a></li>
											<li><a href="">ASICS </a></li>
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
											<li><a href="">Fendi</a></li>
											<li><a href="">Guess</a></li>
											<li><a href="">Valentino</a></li>
											<li><a href="">Dior</a></li>
											<li><a href="">Versace</a></li>
											<li><a href="">Armani</a></li>
											<li><a href="">Prada</a></li>
											<li><a href="">Dolce and Gabbana</a></li>
											<li><a href="">Chanel</a></li>
											<li><a href="">Gucci</a></li>
										</ul>
									</div>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#womens">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Womens
										</a>
									</h4>
								</div>
								<div id="womens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="">Fendi</a></li>
											<li><a href="">Guess</a></li>
											<li><a href="">Valentino</a></li>
											<li><a href="">Dior</a></li>
											<li><a href="">Versace</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Kids</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Fashion</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Households</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Interiors</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Clothing</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Bags</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Shoes</a></h4>
								</div>
							</div>
						</div><!--/category-products-->
						
						<div class="shipping text-center"><!--shipping-->
							<!-- <img src="images/home/shipping.jpg" alt="" /> -->
						</div><!--/shipping-->
						
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="images/product-details/1.jpg" alt="" id="image_detail_utama" />
								<!-- <h3>ZOOM</h3> -->
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
										<div class="item active" id="deret_image">
										  
										</div>
									</div>

								  <!-- Controls -->
							</div>

						</div>
						<form action="{{url('/addkeranjang')}}" method="post">
						{{ csrf_field() }}
							<div class="col-sm-7">
								<div class="product-information"><!--/product-information-->
									<h2 id="namaBarang"></h2>
									<p id="skuBarang"></p>
									<span>
										<span id="hargaBarang"></span>
									</span>
									<div id='inputan_cart'>
									</div>
									<input type="hidden" value="1" name="name" id="input_nama_barang"/>
									<span>
										<label>Quantity:</label>
										<input type="text" value="1" name="jumlah_barang"/>
										<button type="submit" class="btn btn-fefault cart">
											<i class="fa fa-shopping-cart"></i>
											Add to cart
										</button>
									<div id="variantsBarang"></div>
									</span>
									<p><b id="stokBarang"></b></p>
									<p><b>Kondisi Barang :</b> Baru</p>
									<p id="brandBarang"> </p>
									<!-- <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a> -->
								</div><!--/product-information-->
							</div>
						</form>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#details" data-toggle="tab">Details</a></li>
								<!-- <li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
								<li><a href="#tag" data-toggle="tab">Tag</a></li>
								<li><a href="#reviews" data-toggle="tab">Reviews (5)</a></li> -->
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="details" >
								<?php echo $data->informasi; ?>
								<!-- <div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery1.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div> 
							</div>
							
							<div class="tab-pane fade" id="companyprofile" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery1.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
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
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
									<ul>
										<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
										<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
									</ul>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
									<p><b>Write Your Review</b></p>
									
									<form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
										<textarea name="" ></textarea>
										<b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
										<button type="button" class="btn btn-default pull-right">
											Submit
										</button>
									</form>
								</div>
							</div> -->
							
						</div>
					</div><!--/category-tab-->
					
					<!-- <div class="recommended_items">
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="item">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div> --><!--/recommended_items-->
					
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
			document.getElementById("image_detail_utama").src = link;
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
			indexGambar = 5;
			if(gambar.length < 5){
				indexGambar = gambar.length;
			}
			html = '';
			for (var i = 0; i < indexGambar; i++) {
				link = "'"+detailBarang.sku[id].images[i].thumbnail+"'";
				html += '<a href="javascript:void(0)" onclick="gantiGambar('+link+')"><img src="'+detailBarang.sku[id].images[i].icon+'" alt=""></a>';
				// document.getElementById("image_detail_"+(i+1)).onclick = document.getElementById("image_detail_utama").src = detailBarang.sku[id].images[i].thumbnail;
			}
			$('#deret_image').html(html);
			$('#inputan_cart').html(html_input_cari);
        }
	</script>
	
@endsection