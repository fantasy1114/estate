<html>

<head>
  @include('layouts.header')

    <!-- BEGIN STYLE CSS -->
    <style>
        /* loaded image */
        .loaded_img{
            width: 100%;
            height: auto;
        }

        /* Table Edit */
        .schema_table{
            height: 420px;
            overflow: auto;
            margin-bottom: 20px;
        }
        .schema_table tbody tr{
            cursor: pointer;
        }
        
        td span{
            text-decoration: underline;
        }
        td a{
            color: #9E866E;
        }
      

        .table__title{
            border-top: solid 2px #837E6D;
            border-bottom: solid 2px #837E6D;
            font-weight: 600;
            color:#837E6D;
        }
        .menu__title{
            font-weight: 600;
            color:#837E6D;
        }
        .menu__category{
            cursor: pointer;
            padding: 5px 0px;
            color: #837E6D;
            font-weight: 600;
        }
    
        .product__font{
            color: #837E6D;
            margin: 3px 0px;
        }
        .menu__links{
            margin-top: 3px;
        }
        .item__favourite_on > .icon__fill, .btn_heart_on > .icon__fill {
            color: #DC684F;
            fill: #DC684F;
        }
        .btn__default__page > .icon__fill{
            color: #DC684F;
        }
        .column__border__one{
            border-top: solid 1px #837E6D;
        }
        .column__border{
            border-top: solid 1px #837E6D;
            border-bottom: solid 1px #837E6D;
        }
        .column__border__last{
            border-bottom: solid 1px #837E6D;
        }
        .item__favourite_on_column > .icon__fill{
            color: #DC684F;
            fill: #DC684F;
        }
        select.form-control:not([multiple='multiple']){
            background-image: url('/app-assets/images/page/arrow-down.png');
            background-position: calc(100% - 0px) 0px, calc(100% - 20px) 13px, 100% 0;
            background-size: 60px 60px, 0px 0px;
        }
        .noUi-base{
            background-color: #444440;
            height: 4px;
        }
        .category__select{
            width: 70%;
        }

        .default_font_color{
            color: #9D866F;
        }
        .select_option_font{
            color: #9D866F;
            font-weight: 500;
        }
        .dashboard-content-right{
            float: right;
            margin-left: -350px;
            width: 100%;
        }
        .dashboard-content-body{
            margin-left: calc(350px + 1rem);
        }
        .dashboard-sidebar{
            width: 350px;
            vertical-align: top;
            padding-top: 200px;
            position: fixed;
        }
        .shop_response_btn > .icon__fill{
            color: #444440;
        }
        .body-content-overlay{
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            position: absolute;
            display: block;
            z-index: 4;
            visibility: hidden;
            opacity: 0;
            transition: all 0.3s ease;
            width: 100%;
            height: 100%;
            position: fixed !important;
            z-index: 12 !important;
        }
        .body-content-overlay.show{
            visibility: visible;
            transition: all 0.3s ease;
            opacity: 1;
            background-color: rgba(34, 41, 47, 0.2);
            border-radius: 0.1785rem;
        }
        .item__image__size{
            height: 100px;
        }

        .table th, .table td{
            padding: 0.72rem 5px !important;
        }

        @media (max-width: 992px) {
            .dashboard-sidebar{
                position: inherit;
            }
            .category__select{
                width: 80%;
            }
            .dashboard-content-right{
                margin-left: 0px;
            }
            .dashboard-content-body{
                margin-left: 1rem;
            }
            .sidebar-shop{
                transform: translateX(-112%);
                transition: all 0.25s ease;
                position: fixed;
                top: 0;
                left: 0;
                height: 100%;
                overflow-y: scroll;
                margin: 0;
                width: 280px;
                padding-top: 100px;
            }
            .sidebar-shop.show{
                transition: all 0.25s ease;
                transform: translateX(0);
                z-index: 14;
                background-color: #fff;
            }
        }
        @media (max-width: 768px) { 
            .category__select{
                width: 100%;
            }
            .table th, .table td{
                padding: 0.72rem 1px !important;
            }
        }
        
        @media (max-width: 576px) {
            .table th, .table td{
                padding: 0.72rem 0px !important;
            }
        }

        @media (max-width: 375px) { 
            body{
                overflow-x: hidden;
            }
            .dashboard-content-body{
                margin-left: 0px;
            }
            .item__image__size{
                height: 150px;
            }
        }
       
    </style>
    <!-- END STYLE CSS -->
</head>

<body>
    <div class="dashboard-content-detached dashboard-content-right">
        <div class="dashboard-content-body">
            <div class="col-12">
                <div class="row mt-3">
                    
                    <div class="form-group category__select">
                        
                        <h3 for="basicSelect" class="default_font_color">{{$product_name}}</h3>
                        
                        <select class="form-control select_option_font" id="basicSelect" style="height: 60px; font-size: 24px;">
                            @foreach ($categories as $category)
                                
                                <option value="{{$category->id}}" {{$category_id == $category->id ? 'selected' : ''}}>{{$category->category_name}}</option>
                                    
                            @endforeach
                            
                        </select>
                    </div>
                    <div class="col-12 d-flex justify-content-between mb-1">
                        <button class="navbar-toggler shop-sidebar-toggler" type="button" data-toggle="collapse">
                            <span class="d-block d-lg-none shop_response_btn">
                                <i data-feather='menu' class="icon__fill"></i>
                            </span>
                        </button>
                        <div class="">
                            <a href="javascript:void(0)" class="btn btn-light btn-heart rounded btn_heart_off">
                                <i data-feather="heart" class="icon__fill"></i>
                            </a>
                            <a href="javascript:void(0)" class="btn btn-light btn-columns rounded btn__default__page">
                                <i data-feather='columns' class="icon__fill"></i>
                            </a>
                            <a href="javascript:void(0)" class="btn btn-light btn-menu rounded">
                                <i data-feather='menu' class="icon__fill"></i>
                            </a>
                        </div>
                    </div>
  
                    <div class="col-12">
                        <div class="table__title h5 py-1">
                            HAUS AHORN IN OESTERMUNDINGEN
                        </div>
                        <div class="schema_table mt-1" style="display: none;">
                            <table class="w-100 table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Etage</th>
                                        <th>Whg</th>
                                        <th>Zi.</th>
                                        <th>Total WF</th>
                                        <th>Balkon</th>
                                        <th>Mietzins*</th>
                                        <th>Infos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                        <tr data-over="{{$item->iso}}" class="tr_change">
                                            <td>
                                                <a class="item_favourite item_favourite{{$item->id}} {{$item->favourite == 'on' ? 'item__favourite_on' : 'item__favourite_off'}}" data-id="{{$item->id}}">
                                                    <i data-feather="heart" class="icon__fill"></i>
                                                    <span class="d-none price__filter">{{$item->price}}</span>
                                                </a>
                                                
                                            </td>
                                            <td>{{$item->floor}}</td>
                                            <td>{{$item->apt}}</td>
                                            <td><span class="item__room">{{$item->room}}</span></td>
                                            <td>{{$item->total}} m<sup>2</sup></td>
                                            <td>{{$item->balcony}} m<sup>2</sup></td>
                                            <td>
                                                <a href="@if($item->rent == 'Jetzt bewerben') /application/{{$item->id}} @endif" style="color: @if($item->rent == 'reserviert') blue @endif @if($item->rent == 'vermietet') #DC684F @endif @if($item->rent == 'Jetzt bewerben') green @endif">{{$item->rent}}</a>
                                            </td>
                                            <td><a href="{{$item->infos}}" target="_blank"><i class="fa fa-file-text-o"></i> <span>Details</span></a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="column__table row">
                            @foreach ($items as $item)
                                <div class="col-lg-3 col-md-4 col-sm-6 px-lg-2 mt-1 tr_change" data-over="{{$item->iso}}" style="cursor: pointer;">
                                    <div>
                                        <a class="item_favourite font-weight-bold item_favourite{{$item->id}} {{$item->favourite == 'on' ? 'item__favourite_on' : 'item__favourite_off'}}" data-id="{{$item->id}}">
                                            <i data-feather="heart" class="icon__fill"></i> AHORN
                                            <span class="d-none price__filter">{{$item->price}}</span>
                                        </a>
                                    </div>
                                    <div class="mt-2">
                                        <img src="{{$item->item_img}}" class="w-100 item__image__size">
                                    </div>
                                    <div class="d-flex justify-content-between mt-2 column__border__one">
                                        <span>{{$item->floor}}</span> <span class="item__room">{{$item->room}} ZIMMER</span> 
                                    </div>
                                    <div class="d-flex justify-content-between column__border">
                                        <span>{{$item->total}} m<sup>2</sup></span> <span>CHF {{$item->price}}</span>
                                    </div>
                                    <div class="column__border__last favourite__link{{$item->id}} {{$item->favourite == 'on' ? 'd-block' : 'd-none'}}">
                                        <a href="/favourite" style="color: #DC684F;">Favorit</a>
                                    </div>
                                    <div class="d-flex justify-content-between column__border__last">
                                        <a href="@if($item->rent == 'Jetzt bewerben') /application/{{$item->id}} @else # @endif" style="color: @if($item->rent == 'reserviert') blue @endif @if($item->rent == 'vermietet') #DC684F @endif @if($item->rent == 'Jetzt bewerben') green @endif">{{$item->rent}} @if($item->rent == 'Jetzt bewerben')<i data-feather='arrow-right'></i> @endif</a>
                                        <a href="http://yestate.herokuapp.com/application/7" target="blank"><i data-feather='link'></i> Order </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- background Overlay when sidebar is shown  starts-->
    <div class="body-content-overlay"></div>
    <!-- background Overlay when sidebar is shown  ends-->

    <div class="sidebar-detached sidebar-left">
        <div class="dashboard-sidebar px-2">
            <div class="sidebar-shop">
                <div class="col-md-12">
                    <div class="menu__title h6 py-1 ml-2">
                        MIETEN IN OSTERMUNDINGEN
                    </div>
                    
                    <div class="mt-1">
                        <i data-feather='arrow-right'></i> &nbsp;<span class="menu__category h5">AHORN</span>
                        @foreach ($products as $product)
                            <a href="/show/{{$product->id}}" class="d-block ml-2 product__font">{{$product->product_name}}</a>
                        @endforeach
                        
                    </div>
                    <div class="mt-1">
                        <i data-feather='arrow-right'></i> &nbsp;<span class="menu__category h5">ALLE</span>
                        <a class="d-block ml-2 product__font filter__room__one">1.5 ZIMMER</a>
                        <a class="d-block ml-2 product__font filter__room__two">2.5 ZIMMER</a> 
                        <a class="d-block ml-2 product__font filter__room__three">3.5 ZIMMER</a>
                    </div>  

                    <div class="form-group align-items-center menu__category mt-2 pl-2 pr-4">
                        <!-- Slider Scales / Pips and Steps section -->
                        <section id="slider-scales-pips">
                            <label for="basic-range" class="h5">PREIS</label>
                            <div id="pips-range" class="mt-2 mb-3"></div>                
                        </section>
                        <!--/ Slider Scales / Pips and Steps section -->
                    </div>
                    <div class="form-group">
                        
                    </div>

                    <div class="ml-2">
                        <!-- Loaded image -->
                            <img src="{{$product_img}}" class="loaded_img {{$isometry != '1' ? 'd-none' : ''}}" id="loaded_img" data-over="{{$product_img}}">
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <script>
        var maxprice = Number("{{$maxprice}}");
    </script>
    <!-- BEGIN JS IMPORT -->
    @include('layouts.footer')
    <script src="{{asset('app-assets/js/scripts/pages/dashboard.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/pages/app-ecommerce.js')}}"></script>
    <!-- END JS IMPORT -->
    <script>
        

    </script>
</body>

</html>