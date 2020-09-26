<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fashi | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="asset/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="asset/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="asset/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="asset/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="asset/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="asset/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="asset/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="asset/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="asset/css/style.css" type="text/css">
    <style>
        #change-item-cart table tbody tr td img{
            width: 70px;
        }
    </style>
</head>

<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

@include('layouts.header')
@include('layouts.breadcumb')

<!-- Product Shop Section Begin -->
<section class="product-shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 order-1 order-lg-2">
                <div class="product-list">
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <img src="asset/img/products/{{ $product->img }}" alt="">
                                        <div class="sale pp-sale">Sale</div>
                                        <div class="icon">
                                            <i class="icon_heart_alt"></i>
                                        </div>
                                        <ul>
                                            <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                            <li class="quick-view"><a onclick="AddCart({{$product->id}})" href="javascript:">+ Add
                                                    Cart</a></li>
                                            <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name">Towel</div>
                                        <a href="#">
                                            <h5>{{ $product->name }}</h5>
                                        </a>
                                        <div class="product-price">
                                            {{ number_format($product->price) }} VND
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- Product Shop Section End -->

<!-- Partner Logo Section Begin -->
<div class="partner-logo">
    <div class="container">
        <div class="logo-carousel owl-carousel">
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="asset/img/logo-carousel/logo-1.png" alt="">
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="asset/img/logo-carousel/logo-2.png" alt="">
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="asset/img/logo-carousel/logo-3.png" alt="">
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="asset/img/logo-carousel/logo-4.png" alt="">
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="asset/img/logo-carousel/logo-5.png" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Partner Logo Section End -->

@include('layouts.footer')

<!-- Js Plugins -->
<script src="{{asset('asset/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('asset/js/bootstrap.min.js')}}"></script>
<script src="{{asset('asset/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('asset/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('asset/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('asset/js/jquery.zoom.min.js')}}"></script>
<script src="{{asset('asset/js/jquery.dd.min.js')}}"></script>
<script src="{{asset('asset/js/jquery.slicknav.js')}}"></script>
<script src="{{asset('asset/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('asset/js/main.js')}}"></script>
<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

<script >

    function getCart(){
        $.ajax({
            url:'list-cart/',
            type: 'GET',
        }).done(function (response){
            $("#change-item-cart").empty();
            $("#change-item-cart").html(response);
        })
    }
    getCart();

    function AddCart(id){
        $.ajax({
            url:'Add-Cart/'+id,
            type: 'GET',
        }).done(function (response){
            $("#change-item-cart").empty();
            $("#change-item-cart").html(response);
            alertify.success('Thêm sản phẩm thành công');
            getQuantyCart();
        });

    }

    $("#change-item-cart").on("click", ".si-close i", function (){
        console.log($(this).data("id"));
        $.ajax({
            url:'Delete-Item-Cart/'+$(this).data("id"),
            type: 'GET',
        }).done(function (response){
            $("#change-item-cart").empty();
            $("#change-item-cart").html(response);
            alertify.error('Xóa phẩm thành công');
            getQuantyCart();
        });
    });

    function getQuantyCart() {
        $.ajax({
            url:'get-quanty-cart',
            type: 'GET',
        }).done(function (response){
            $('#total-cart').html(response)
        });
    }
</script>
</body>

</html>
