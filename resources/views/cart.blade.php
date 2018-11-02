@extends('app.app')

@section('style')
    <title>Keranjang | BangzanStore</title>
@endsection

@section('content')
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			@if(Session::has('status'))
				<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('status') }}</p>
			@endif
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image" style="width: 13%;">Item</td>
							<td class="description" style="width: 44%;">Nama</td>
							<td class="price" style="width: 13%;">Harga</td>
							<td class="quantity" style="width: 12%;">Jumlah</td>
							<td class="total" style="width: 13%;">Total</td>
							<td style="width: 5%;"></td>
						</tr>
					</thead>
					<tbody>
						@if($barang)
							<?php $index = 1; ?>
							@foreach($barang as $data)
								<tr>
									<td class="cart_product">
										<a href=""><img src="{{$data->gambar}}" alt="" style="width: 100px; height: 100px;"></a>
									</td>
									<td class="cart_description">
										<h4><a href="">{{$data->nama}}</a></h4>
										<p>SKU    : {{$data->sku}}</p>
										<p>Berat  : {{$data->berat}}</p>
										<p>Varian : @if($data->varian_1) [{{$data->varian_1}}] @endif @if($data->varian_2) - [{{$data->varian_2}}] @endif</p>
									</td>
									<td class="cart_price">
										<p>{{"Rp " . number_format($data->harga,2,',','.')}}</p>
									</td>
									<td class="cart_quantity">
										<div class="cart_quantity_button">
											<a class="cart_quantity_up" href="{{url('/deletekeranjang/'.$index.'/')}}/1"> + </a>
											<input class="cart_quantity_input" type="text" name="quantity" value="{{$data->jumlah_barang}}" autocomplete="off" size="2">
											@if($data->jumlah_barang > 1)
												<a class="cart_quantity_down" href="{{url('/deletekeranjang/'.$index.'/')}}/0"> - </a>
											@endif
										</div>
									</td>
									<td class="cart_price">
										<p>{{"Rp " . number_format(($data->jumlah_barang * $data->harga),2,',','.')}}</p>
									</td>
									<td class="cart_delete">
										<a class="cart_quantity_delete" href="{{url('/deletekeranjang/'.$index)}}"><i class="fa fa-times"></i></a>
									</td>
								</tr>
								<?php $index++; ?>
							@endforeach
						@else 
							<tr>
								<td>Tidak Ada Barang</td>
							</tr>
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</section>
	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>Informasi Pengiriman</h3>
				<!-- <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p> -->
			</div>
			<form action="{{url('/checkout')}}" method="post">
				{{csrf_field()}}
				<div class="row">
					<div class="col-sm-12">
						<div class="chose_area">
							<ul class="user_option">
								<!-- <li>
									<input type="checkbox">
									<label>Use Coupon Code</label>
								</li>
								<li>
									<input type="checkbox">
									<label>Use Gift Voucher</label>
								</li> -->
								<li>
									<input type="checkbox" id="checkbox" name="checkbox" onclick="div();"/>
									<label>Dropship</label>
								</li>
								<li id="textDropship" class="single_field">
									<input type="text" name="pengirim" placeholder="pengirim" />
									<input type="text" name="no_telp_dropship" placeholder="Alamat Pengirim" />
								</li>
							</ul>
							<ul class="user_info">
								<li class="single_field zip-field">
									<label>Penerima:</label>
									<textarea placeholder="Alamat" name="nama_penerima"></textarea>
								</li>
								<li class="single_field zip-field">
									<label>Alamat:</label>
									<textarea placeholder="Alamat" name="alamat"></textarea>
								</li>
								<li class="single_field">
									<label>Jasa Pengiriman:</label>
									<select name="pengiriman">
										<option value="JNE">JNE</option>
										<option value="SICEPAT">SICEPAT</option>
										<option value="JNT">JNT</option>
										<option value="INSTANT KURIR">INSTANT KURIR</option>
									</select>
									
								</li>
								<li class="single_field">
									<label>No Telp:</label>
									<input type="" name="no_telp" placeholder="No Telp" />
								</li>
							</ul>
							<button type="submit" class="btn btn-default check_out">Checkout</button>
							<!-- <a class="btn btn-default check_out" href="javascript:void(0)">Checkout</a> -->
						</div>
					</div>
				</div>
			</form>
		</div>
	</section>
@endsection

@section('javascript')
    <script>
    	div();
    	function div(){
    		console.log(document.getElementById("checkbox").checked);
    		if(document.getElementById("checkbox").checked == true){
    			$('#textDropship').show();
    		} else {
    			$('#textDropship').hide();
    		}
    	}
	</script>
@endsection