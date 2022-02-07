
<!-- BEGIN: Head-->
@include('layouts.header')
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->
    
    @include('layouts.navbar')

    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    @include('layouts.layout')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            
            <div class="content-body">
                <!-- Item list start -->
                <section class="app-user-list">
                    
                    <!-- list section start -->
                    <div class="card">
                        <div class="card-datatable table-responsive pt-0">
                            <table class="data-list-table table">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Photo</th>
                                        <th>Floor</th>
                                        <th>Apt</th>
                                        <th>Room</th>
                                        <th>Total</th>
                                        <th>Balcony</th>
                                        <th>Status</th>
                                        <th>Price</th>
                                        <th>Infos</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                    <tr>
                                        <td><img src="{{$item->item_img}}" alt="item" class="product_img_size rounded"></td>
                                        <td>{{$item->floor}}</td>
                                        <td>{{$item->apt}}</td>
                                        <td>{{$item->room}}</td>
                                        <td>{{$item->total}} m<sup>2</sup></td>
                                        <td>{{$item->balcony}} m<sup>2</sup></td>
                                        <td><span style="color: @if($item->rent == 'reserviert') blue @endif @if($item->rent == 'vermietet') red @endif @if($item->rent == 'Jetzt bewerben') green @endif">{{$item->rent}}</span></td>
                                        <td>CHF {{$item->price}}</td>
                                        <td><i data-feather='file-text' style="zoom:1.2"></i> <a href="{{$item->infos}}" target="_blank" style="text-decoration: underline;">Details</a></td>
                                        <td>
                                            <button class="dropdown-item data_edit_btn d-inline w-auto rounded" data-id="{{$item->id}}" data-item_img="{{$item->item_img}}" data-floor="{{$item->floor}}" data-apt="{{$item->apt}}" data-room="{{$item->room}}" data-total="{{$item->total}}" data-balcony="{{$item->balcony}}" data-rent="{{$item->rent}}" data-price="{{$item->price}}">
                                                <i data-feather='edit'></i>
                                                <span></span>
                                            </button>
                                        
                                            <button class="dropdown-item d-inline item_delete_btn w-auto rounded" data-id="{{$item->id}}">
                                                <i data-feather='delete'></i>
                                                <span></span>
                                            </button>
                                            
                                            <button class="dropdown-item d-inline item_image_show w-auto rounded" data-item_img="{{$item->item_img}}">
                                                <i data-feather='image'></i>
                                            </button>
                                        </td>
                                    
                                    </tr>
                                    @endforeach
                                                                       
                                </tbody>
                            </table>
                        </div>
                        <!-- Modal to add new Data starts-->
                        <div class="modal modal-slide-in new-data-modal fade" id="modals-slide-in">
                            <div class="modal-dialog">
                                <form class="add-new-data modal-content pt-0">
                                    {{csrf_field()}}
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">×</button>
                                    <div class="modal-header mb-1">
                                        <h5 class="modal-title" id="exampleModalLabel">Item</h5>
                                    </div>
                                    <div class="modal-body flex-grow-1">
                                        <div class="form-group">
                                            <label class="form-label" for="photo">Photo</label>
                                            <!-- header media -->
                                                <div class="media">
                                                    <a href="javascript:void(0);" class="mr-25">
                                                        <img src="#" id="item-upload-img" class="rounded mr-50" alt="image" height="80" width="80" />
                                                    </a>
                                                    <!-- upload and reset button -->
                                                    <div class="media-body mt-75 ml-1">
                                                        <label for="item-upload" class="btn btn-sm btn-primary mb-75 mr-75">Upload</label>
                                                        <input type="file" id="item-upload" name="item-upload" hidden accept="image/*" />
                                                    </div>
                                                    <!--/ upload and reset button -->
                                                </div>
                                            <!--/ header media -->
                                            
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="item_floor">Floor</label>
                                            <input type="text" class="form-control dt-full-name" id="item_floor"
                                                placeholder="1" name="item_floor" aria-label="item_floor"
                                                aria-describedby="item_floor" />
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="item_apt">Apt</label>
                                            <input type="text" class="form-control dt-full-name" id="item_apt"
                                                placeholder="A 0.1" name="item_apt" aria-label="item_apt"
                                                aria-describedby="item_apt" />
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="item_room">Room</label>
                                            <select class="form-control" id="item_room" name="item_room">
                                                <option value="1.5">1.5</option>
                                                <option value="2.5">2.5</option>
                                                <option value="3.5">3.5</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="item_total">Total WF</label>
                                            <input type="number" class="form-control dt-full-name" id="item_total"
                                                placeholder="36.7 m2" name="item_total" aria-label="item_total"
                                                aria-describedby="item_total" step="0.01"/>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="item_balcony">Balcony</label>
                                            <input type="number" class="form-control dt-full-name" id="item_balcony"
                                                placeholder="8.1 m2" name="item_balcony" aria-label="item_balcony"
                                                aria-describedby="item_balcony" step="0.01"/>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="item_rent">Status</label>
                                            <select class="form-control" name="item_rent" id="item_rent">
                                                <option value="vermietet">vermietet</option>
                                                <option value="reserviert">reserviert</option>
                                                <option value="Jetzt bewerben">Jetzt bewerben</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="item_price">Price</label>
                                            <input type="number" step="0.01" class="form-control dt-full-name" id="item_price"
                                                placeholder="100" name="item_price" aria-label="item_price"
                                                aria-describedby="item_price" />
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="infos">Infos</label>
                                            <!-- header media -->
                                                <div class="media">
                                                    <input type="file" id="item-upload-pdf" name="item-upload-pdf" accept=".pdf" />
                                                </div>
                                            <!--/ header media -->
                                            
                                        </div>
                                        <input type="text" value="{{str_replace('itempage/', '', Request::path())}}" name="product_id" hidden>
                                        
                                        
                                        <button type="submit" class="btn btn-primary mr-1 data-submit">Submit</button>
                                        <button type="reset" class="btn btn-outline-secondary"
                                            data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Modal to add new Data Ends-->

                        <!-- Modal to update  Data starts-->
                        <div class="modal modal-slide-in edit-data-modal fade" id="modals-slide-in">
                            <div class="modal-dialog">
                                <form class="edit-data-form modal-content pt-0">
                                    {{csrf_field()}}
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">×</button>
                                    <div class="modal-header mb-1">
                                        <h5 class="modal-title">Update Item</h5>
                                    </div>
                                    <div class="modal-body flex-grow-1">
                                        <div class="form-group">
                                            <label class="form-label" for="photo">Photo</label>
                                            <!-- header media -->
                                                <div class="media">
                                                    <a href="javascript:void(0);" class="mr-25">
                                                        <img src="#" id="uitem-upload-img" class="rounded mr-50" alt="image" height="80" width="80" />
                                                    </a>
                                                    <!-- upload and reset button -->
                                                    <div class="media-body mt-75 ml-1">
                                                        <label for="uitem-upload" class="btn btn-sm btn-primary mb-75 mr-75">Upload</label>
                                                        <input type="file" id="uitem-upload" name="uitem-upload" hidden accept="image/*" />
                                                    </div>
                                                    <!--/ upload and reset button -->
                                                </div>
                                            <!--/ header media -->
                                            
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="uitem_floor">Floor</label>
                                            <input type="text" class="form-control dt-full-name" id="uitem_floor"
                                                placeholder="1" name="uitem_floor" aria-label="uitem_floor"
                                                aria-describedby="uitem_floor" />
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="uitem_apt">Apt</label>
                                            <input type="text" class="form-control dt-full-name" id="uitem_apt"
                                                placeholder="A 0.1" name="uitem_apt" aria-label="uitem_apt"
                                                aria-describedby="uitem_apt" />
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="uitem_room">Room</label>
                                            <select class="form-control" id="uitem_room" name="uitem_room">
                                                <option value="1.5">1.5</option>
                                                <option value="2.5">2.5</option>
                                                <option value="3.5">3.5</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="uitem_total">Total WF</label>
                                            <input type="text" class="form-control dt-full-name" id="uitem_total"
                                                placeholder="36.7 m2" name="uitem_total" aria-label="uitem_total"
                                                aria-describedby="uitem_total" />
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="uitem_balcony">Balcony</label>
                                            <input type="text" class="form-control dt-full-name" id="uitem_balcony"
                                                placeholder="8.1 m2" name="uitem_balcony" aria-label="uitem_balcony"
                                                aria-describedby="uitem_balcony" />
                                        </div>

                                        <div class="form-group">
                                            <div class="form-group">
                                                <label class="form-label" for="uitem_rent">Status</label>
                                                <select class="form-control" name="uitem_rent" id="uitem_rent">
                                                    <option value="vermietet">vermietet</option>
                                                    <option value="reserviert">reserviert</option>
                                                    <option value="Jetzt bewerben">Jetzt bewerben</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="uitem_price">Price</label>
                                            <input type="number" step="0.01" class="form-control dt-full-name" id="uitem_price"
                                                placeholder="100" name="uitem_price" aria-label="uitem_price"
                                                aria-describedby="uitem_price" />
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="infos">Infos</label>
                                            <!-- header media -->
                                                <div class="media">
                                                    <input type="file" id="uitem-upload-pdf" name="uitem-upload-pdf" accept=".pdf" />
                                                </div>
                                            <!--/ header media -->
                                        </div>

                                        <input type="text" value="{{str_replace('itempage/', '', Request::path())}}" name="product_id" hidden>
                                        
                                        <button type="submit" class="btn btn-primary mr-1 data-submit">Submit</button>
                                        <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Modal to update  Data Ends-->

                        <!-- Modal -->
                        <div class="modal fade" id="item__image__show__modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 75%;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Photo</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="#" class="modal__image__show">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal END -->
                    </div>
                    
                </section>
                <!-- Item list ends -->
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    @include('layouts.footer')

    <!-- BEGIN: Page JS-->
    <script src="{{asset('app-assets/js/scripts/tables/estate-item.js')}}"></script>
    <!-- END: Page JS-->
    
</body>
<!-- END: Body-->

</html>