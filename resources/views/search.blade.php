@extends('app.app')

@section('style')
    <title>Cari Barang | BangzanStore</title>
@endsection

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar" id='panel-kategori'>
                        <h2>Kategori</h2>
                        <div class="panel-group category-products" id="accordian">
                        </div><!--/category-productsr-->
                        
                        <div class="shipping text-center"><!--shipping-->
                        </div><!--/shipping-->
                        
                    </div>
                </div>
                
                <div class="col-sm-9 padding-right" id='panel-barang'>
                    <p>Cari Barang @if(isset($cari)) <b>{{$cari}}</b> @endif</p>
                    <div class="features_items" id="features_items"><!--features_items-->
                    </div><!--features_items-->
                </div>
            </div>
        </div>
    </section>
    
@endsection

@section('javascript')
    <script>
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
        var data = <?php echo $data->listBarang; ?>;
        console.log(data);
        var html = '';
        var index = 0;
        for (var i = 0; i < data.products.length; i++) {
            css = '';
            if((index%3) == 0){
                css = 'style="clear:both"';
            }
            harga = data.products[i].sku[0].final_price;
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
            url_asli = data.products[i].sku[0].url;
            url = url_asli.split('/');
            url_id_asli = url[4].split('?jtm');
            url_id = url_id_asli[1].split('#');
            html += '<a href="{{url("/barang")}}/'+url[3]+'/'+url_id_asli[0]+'?id='+url_id[1]+'"><div class="col-sm-4" '+css+'><div class="product-image-wrapper"><div class="single-products"><div class="productinfo text-center"><img src="'+data.products[i].sku[0].image+'" alt="" /><h2></h2><p>'+data.products[i].name+'</p><p>'+harga+'</p></div></div></div></div></a>';
            index++;
        }
        pagination = '';
        index = 1;
        cekGet = $('#page').val();
        var d;
        for(d in data.pagination.links.first){
            pagination += '<li'
            if(d==cekGet){
                pagination += ' class="active"';
            }
            pagination += '><a href="{{ url("/cari/".$cari)}}/'+d+'">'+d+'</a></li>';
            index++;
        }
        if(data.pagination.links.hasSlider){
            pagination += '<li><a href="javascript:void(0)">...</a></li>'
        }
        var d;
        for(d in data.pagination.links.slider){
            pagination += '<li'
            if(d==cekGet){
                pagination += ' class="active"';
            }
            pagination += '><a href="{{ url("/cari/".$cari)}}/'+d+'">'+d+'</a></li>';
            index++;
        }
        if(data.pagination.links.hasLast){
            pagination += '<li><a href="javascript:void(0)">...</a></li>'
        }
        var d;
        for(d in data.pagination.links.last){
            pagination += '<li'
            if(d==cekGet){
                pagination += ' class="active"';
            }
            pagination += '><a href="{{ url("/cari/".$cari)}}/'+d+'">'+d+'</a></li>';
            index++;
        }
        $('#features_items').html('<h2 class="title text-center">Data Barang</h2>'+html+'<div style="clear:both"><ul class="pagination">'+pagination+'</ul></div>');
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