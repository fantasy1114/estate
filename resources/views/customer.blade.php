
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
                <!-- category list start -->
                <section class="app-user-list">

                    <!-- list section start -->
                    <div class="card">
                        <div class="card-datatable table-responsive pt-0">
                            <table class="data-list-table table">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Min Price</th>
                                        <th>Max Price</th>
                                        <th>Min Size</th>
                                        <th>Max Size</th>
                                        <th>region</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customers as $customer)
                                    <tr>
                                        <td>{{$customer->name}}</td>
                                        <td>{{$customer->email}}</td>
                                        <td>{{$customer->phone}}</td>
                                        <td>CHF {{$customer->min_price}}</td>
                                        <td>CHF {{$customer->max_price}}</td>
                                        <td>{{$customer->min_size}} m<sup>2</sup></td>
                                        <td>{{$customer->max_size}} m<sup>2</sup></td>
                                        <td>{{$customer->region}}</td>
                                        <td>
                                            <button class="dropdown-item data_edit_btn d-inline w-auto rounded" data-id="{{$customer->id}}" data-name="{{$customer->name}}" data-email="{{$customer->email}}" data-phone="{{$customer->phone}}" data-min_price="{{$customer->min_price}}" data-max_price="{{$customer->max_price}}" data-min_size="{{$customer->min_size}}" data-max_size="{{$customer->max_size}}" data-region="{{$customer->region}}">
                                                <i data-feather='edit'></i>
                                                <span></span>
                                            </button>
                                        
                                            <button class="dropdown-item d-inline customer_delete_btn w-auto rounded" data-id="{{$customer->id}}">
                                                <i data-feather='delete'></i>
                                                <span></span>
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
                                        <h5 class="modal-title" id="exampleModalLabel">Customer</h5>
                                    </div>
                                    <div class="modal-body flex-grow-1">
                                        <div class="form-group">
                                            <label class="form-label" for="customer_name">Name</label>
                                            <input type="text" class="form-control" id="customer_name"
                                                placeholder="Name" name="customer_name" aria-label="customer_name"
                                                aria-describedby="customer_name" required/>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="customer_email">Email</label>
                                            <input type="email" class="form-control" id="customer_email"
                                                placeholder="Email@mail.com" name="customer_email" aria-label="customer_email"
                                                aria-describedby="customer_email" required/>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="customer_phone">Phone</label>
                                            <input type="number" class="form-control" id="customer_phone"
                                                placeholder="+19783470602" name="customer_phone" aria-label="customer_phone"
                                                aria-describedby="customer_phone" required/>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="customer_max_price">Max Price</label>
                                            <input type="number" class="form-control" id="customer_max_price"
                                                max="999999" name="customer_max_price" aria-label="customer_max_price"
                                                aria-describedby="customer_max_price" required/>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="customer_min_price">Min Price</label>
                                            <input type="number" class="form-control" id="customer_min_price"
                                                placeholder="0000" name="customer_min_price" aria-label="customer_min_price"
                                                aria-describedby="customer_min_price" required/>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="customer_max_size">Max Size</label>
                                            <input type="number" class="form-control" id="customer_max_size"
                                                placeholder="9999" max="9999" name="customer_max_size" aria-label="customer_max_size"
                                                aria-describedby="customer_max_size" required/>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="customer_min_size">Min Size</label>
                                            <input type="number" class="form-control" id="customer_min_size"
                                                placeholder="0000" name="customer_min_size" aria-label="customer_min_size"
                                                aria-describedby="customer_min_size" required/>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="region">Region</label>
                                            <input type="text" class="form-control" id="customer_region" placeholder="Hometown" name="customer_region" aria-label="customer_region" aria-describedby="customer_region" required>
                                        </div>
                                        
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
                                        <h5 class="modal-title">Update Customer</h5>
                                    </div>
                                    <div class="modal-body flex-grow-1">
                                        <div class="form-group">
                                            <label class="form-label" for="ucustomer_name">Name</label>
                                            <input type="text" class="form-control" id="ucustomer_name"
                                                placeholder="Name" name="ucustomer_name" aria-label="ucustomer_name"
                                                aria-describedby="ucustomer_name" required/>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="ucustomer_email">Email</label>
                                            <input type="email" class="form-control" id="ucustomer_email"
                                                placeholder="Email@mail.com" name="ucustomer_email" aria-label="ucustomer_email"
                                                aria-describedby="ucustomer_email" required/>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="ucustomer_phone">Phone</label>
                                            <input type="number" class="form-control" id="ucustomer_phone"
                                                placeholder="+19783470602" name="ucustomer_phone" aria-label="ucustomer_phone"
                                                aria-describedby="ucustomer_phone" required/>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="ucustomer_max_price">Max Price</label>
                                            <input type="number" class="form-control" id="ucustomer_max_price"
                                                placeholder="9999" name="ucustomer_max_price" aria-label="ucustomer_max_price"
                                                aria-describedby="ucustomer_max_price" required/>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="ucustomer_min_price">Min Price</label>
                                            <input type="number" class="form-control" id="ucustomer_min_price"
                                                placeholder="0000" name="ucustomer_min_price" aria-label="ucustomer_min_price"
                                                aria-describedby="ucustomer_min_price" required/>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="ucustomer_max_size">Max Size</label>
                                            <input type="number" class="form-control" id="ucustomer_max_size"
                                                placeholder="9999" name="ucustomer_max_size" aria-label="ucustomer_max_size"
                                                aria-describedby="ucustomer_max_size" required/>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="ucustomer_min_size">Min Size</label>
                                            <input type="number" class="form-control" id="ucustomer_min_size"
                                                placeholder="0000" name="ucustomer_min_size" aria-label="ucustomer_min_size"
                                                aria-describedby="ucustomer_min_size" required/>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="ucustomer_region">Region</label>
                                            <input type="text" class="form-control" id="ucustomer_region" placeholder="Hometown" name="ucustomer_region" aria-label="ucustomer_region" aria-describedby="ucustomer_region" required>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary mr-1 data-submit">Submit</button>
                                        <button type="reset" class="btn btn-outline-secondary"
                                            data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Modal to update  Data Ends-->
                        <button id="change-category-btn" hidden></button>
                    </div>
                </section>
                <!-- category list ends -->
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    @include('layouts.footer')

    <!-- BEGIN: Page JS-->
    <script src="{{asset('app-assets/js/scripts/tables/estate-customer.js')}}"></script>
    <!-- END: Page JS-->
    
</body>
<!-- END: Body-->

</html>