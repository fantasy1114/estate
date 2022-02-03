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
        table tr:hover{
            background-color: #F1EDE9;
        }
        td span{
            text-decoration: underline;
        }
        td a{
            color: #9E866E;
        }
        td a:hover{
            text-decoration: none;
            color: #9E866E;
        }
        td span:hover{
            text-decoration: none;
            color: #000;
        }

        .table__title{
            border-top: solid 1px #000;
            border-bottom: solid 1px #000;
        }
        .menu__category{
            cursor: pointer;
            padding: 5px 0px;
        }
        .menu__category:hover{
            background-color: #eee;
        }
        .menu__links{
            margin-top: 3px;
        }
        .item__favourite_on > .icon__fill, .btn_heart_on > .icon__fill {
            color: red;
            fill: red;
        }
        .btn__default__page > .icon__fill{
            color: red;
        }
        .column__border__one{
            border-top: solid 1px #000;
        }
        .column__border{
            border-top: solid 1px #000;
            border-bottom: solid 1px #000;
        }
        .column__border__last{
            border-bottom: solid 1px #000;
        }
        .item__favourite_on_column > .icon__fill{
            color: red;
            fill: red;
        }
        select.form-control:not([multiple='multiple']){
            background-image: url('/app-assets/images/page/arrow-down.png');
            background-position: calc(100% - 0px) 0px, calc(100% - 20px) 13px, 100% 0;
            background-size: 60px 60px, 0px 0px;
        }
        .category__select{
            width: 70%;
        }
        @media (max-width: 992px) { 
            .category__select{
                width: 80%;
            }
        }
        @media (max-width: 768px) { 
            .category__select{
                width: 100%;
            }
        }
    </style>
    <!-- END STYLE CSS -->
</head>

<body>
    <div class="col-12">
        <div class="row mt-5">
            <div class="col-md-3"></div>
            <div class="col-md-9">
                <div class="form-group category__select">
                    <h3 for="basicSelect">Favourite</h3>
                    <select class="form-control" id="basicSelect" style="height: 60px; font-size: 24px;">
                        @foreach ($categories as $category)
                            <option selected>All Favourite</option>
                            <optgroup label="{{$category->category_name}}">
                                @foreach ($category->category_product as $product)
                                    <option value="{{$product->id}}" {{str_replace('show/', '',Request::path()) == $product->id ? 'selected' : ''}}>{{$product->product_name}}</option>
                                @endforeach
                            </optgroup>
                        @endforeach
                        
                    </select>
                </div>
              
            </div>
            <div class="col-12 d-flex justify-content-end mb-1">
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
            <div class="col-md-3">
                <div class="menu__title h6 py-1 ml-2">
                    MIETEN IN OSTERMUNDINGEN
                </div>
                <div class="mt-1">
                    <i data-feather='arrow-right'></i> &nbsp;<span class="menu__category h5">AHORN</span>
                    <a class="d-block ml-2 text-dark filter__name__birke">BIRKE</a>
                    <a class="d-block ml-2 text-dark filter__name__carolina">CAROLINA</a>
                </div>
                <div class="mt-1">
                    <i data-feather='arrow-right'></i> &nbsp;<span class="menu__category h5">ALLE</span>
                    <a class="d-block ml-2 text-dark filter__room__one">1.5 ZIMMER</a>
                    <a class="d-block ml-2 text-dark filter__room__two">2.5 ZIMMER</a> 
                    <a class="d-block ml-2 text-dark filter__room__three">3.5 ZIMMER</a>
                </div>  
        
                <div class="form-group align-items-center menu__category mt-2 ml-2">
                    {{-- <label for="basic-range" class="h5">PREIS</label>
                    <div id="hover" class="my-1" style="background-color: #4b4b4b;"></div>
                    <span class="hover_val" id="hover-val"></span> --}}
                    <!-- Slider Scales / Pips and Steps section -->
                    <section id="slider-scales-pips">
                        <label for="basic-range" class="h5">PREIS</label>
                        <div id="pips-range" class="mt-2 mb-3"></div>                
                    </section>
                    <!--/ Slider Scales / Pips and Steps section -->
                </div>
                <div class="form-group">
                    
                </div>

                
            </div> 
            <div class="col-md-9 pl-md-3">
                <div class="table__title h6 py-1">
                    HAUS AHORN IN OESTERMUNDINGEN
                </div>
                <div class="schema_table mt-1" style="display: none;">
                    <table class="w-100 table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Floor</th>
                                <th>Apt</th>
                                <th>Room</th>
                                <th>Total WF</th>
                                <th>Balcony</th>
                                <th>Status</th>
                                <th>Infos</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr data-over="{{$item->item_img}}" class="tr_change">
                                    <td>
                                        <a class="item_favourite item_favourite{{$item->id}} {{$item->favourite == 'on' ? 'item__favourite_on' : 'item__favourite_off'}}" data-id="{{$item->id}}">
                                            <i data-feather="heart" class="icon__fill"></i>
                                            <span class="d-none price__filter">{{$item->price}}</span>
                                        </a>
                                        
                                    </td>
                                    <td>{{$item->floor}}</td>
                                    <td>{{$item->apt}}</td>
                                    <td><span class="item__room">{{$item->room}}</span><span class="d-none item__name">{{$item->name}}</span></td>
                                    <td>{{$item->total}} m<sup>2</sup></td>
                                    <td>{{$item->balcony}} m<sup>2</sup></td>
                                    <td><a href="@if($item->rent == 'Jetzt bewerben') /application/{{$item->id}} @endif" style="color: @if($item->rent == 'reserviert') blue @endif @if($item->rent == 'vermietet') red @endif @if($item->rent == 'Jetzt bewerben') green @endif">{{$item->rent}}</a></td>
                                    <td><a href="{{$item->infos}}" target="_blank"><i class="fa fa-file-text-o"></i> <span>Details</span></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="column__table row">
                    @foreach ($items as $item)
                        <div class="col-lg-3 col-md-4 col-sm-6 px-lg-2 mt-1 tr_change" data-over="{{$item->item_img}}" style="cursor: pointer;">
                            <div>
                                <a class="item_favourite font-weight-bold item_favourite{{$item->id}} {{$item->favourite == 'on' ? 'item__favourite_on' : 'item__favourite_off'}}" data-id="{{$item->id}}">
                                    <i data-feather="heart" class="icon__fill"></i> AHORN
                                    <span class="d-none price__filter">{{$item->price}}</span>
                                </a>
                            </div>
                            <div class="mt-2">
                                <img src="{{$item->item_img}}" class="w-100">
                            </div>
                            <div class="d-flex justify-content-between mt-2 column__border__one">
                                <span>{{$item->floor}}</span> <span class="item__room">{{$item->room}}</span> <span class="d-none item__name">{{$item->name}}</span>
                            </div>
                            <div class="d-flex justify-content-between column__border">
                                <span>{{$item->total}} m<sup>2</sup></span> <span>CHF {{$item->price}}</span>
                            </div>
                            <div class="column__border__last favourite__link{{$item->id}} {{$item->favourite == 'on' ? 'd-block' : 'd-none'}}">
                                <a href="/favourite" style="color: red;">Favorit</a>
                            </div>
                            <div class="d-flex justify-content-between column__border__last">
                                <a href="@if($item->rent == 'Jetzt bewerben') /application/{{$item->id}} @else # @endif" style="color: @if($item->rent == 'reserviert') blue @endif @if($item->rent == 'vermietet') red @endif @if($item->rent == 'Jetzt bewerben') green @endif">{{$item->rent}} @if($item->rent == 'Jetzt bewerben')<i data-feather='arrow-right'></i> @endif</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
    <script>
        var maxprice = Number("{{$maxprice}}");
    </script>
    <!-- BEGIN JS IMPORT -->
    @include('layouts.footer')
    <script src="{{asset('app-assets/js/scripts/pages/favourite.js')}}"></script>
    <!-- END JS IMPORT -->
    <script>
        

    </script>
</body>

</html>