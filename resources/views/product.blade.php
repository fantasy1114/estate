
<!-- BEGIN: Head-->
@include('layouts.header')
<!-- END: Head-->
<style>
    .dtr-details tr:nth-child(3) {display : none;}  
</style>
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
                <!-- Product list start -->
                <section class="app-user-list">

                    <!-- list section start -->
                    <div class="card">
                        <div class="card-datatable table-responsive pt-0">
                            <table class="data-list-table table">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Name</th>
                                        <th>Photo</th>
                                        <th>Category</th>
                                        <th>isometry</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                    <tr>
                                        <td>{{$product->product_name}}</td>
                                        <td><img src="{{$product->product_img}}" alt="{{$product->product_name}}" class="product_img_size rounded"></td>
                                        <td>{{$product->product_category->category_name}}</td>
                                        <td>
                                            <div class="custom-control custom-switch custom-control-inline status-product-update" data-id="{{$product->id}}" data-isometry="{{$product->isometry}}">
                                            <input type="checkbox" class="custom-control-input product__checkbox" id="customSwitch{{$product->id}}" @if ($product->isometry == 1) checked @endif class="isometry-checked">
                                            <label class="custom-control-label" id="product_isometry" for="customSwitch{{$product -> id}}"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <button class="dropdown-item data_open_btn d-inline w-auto rounded" data-id="{{$product->id}}">
                                                <i data-feather='book-open'></i>
                                            </button>
                                            <button class="dropdown-item data_edit_btn d-inline w-auto rounded" data-id="{{$product->id}}" data-product_name="{{$product->product_name}}" data-product_img="{{$product->product_img}}" data-category_id="{{$product->category_id}}">
                                                <i data-feather='edit'></i>
                                                <span></span>
                                            </button>
                                        
                                            <button class="dropdown-item d-inline product_delete_btn w-auto rounded" data-id="{{$product->id}}">
                                                <i data-feather='delete'></i>
                                                <span></span>
                                            </button>

                                            <button class="dropdown-item d-inline data_show_btn w-auto rounded" data-id="{{$product->id}}">
                                                <i data-feather='eye'></i>
                                            </button>

                                            <button class="dropdown-item d-inline item_image_show w-auto rounded" data-product_img="{{$product->product_img}}">
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
                                        <h5 class="modal-title" id="exampleModalLabel">Product</h5>
                                    </div>
                                    <div class="modal-body flex-grow-1">
                                        <div class="form-group">
                                            <label class="form-label" for="product_name">Name</label>
                                            <input type="text" class="form-control dt-full-name" id="product_name"
                                                placeholder="Product" name="product_name" aria-label="product_name"
                                                aria-describedby="product_name" />
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="category_id">Category</label>
                                            <select class="form-control" id="category_id" name="category_id">
                                                @foreach ($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="photo">Photo</label>
                                            <!-- header media -->
                                                <div class="media">
                                                    <a href="javascript:void(0);" class="mr-25">
                                                        <img src="#" id="product-upload-img" class="rounded mr-50" alt="image" height="80" width="80" />
                                                    </a>
                                                    <!-- upload and reset button -->
                                                    <div class="media-body mt-75 ml-1">
                                                        <label for="product-upload" class="btn btn-sm btn-primary mb-75 mr-75">Upload</label>
                                                        <input type="file" id="product-upload" name="product-upload" hidden accept="image/*" />
                                                    </div>
                                                    <!--/ upload and reset button -->
                                                </div>
                                            <!--/ header media -->
                                            
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
                                        <h5 class="modal-title">Update Product</h5>
                                    </div>
                                    <div class="modal-body flex-grow-1">
                                        <div class="form-group">
                                            <label class="form-label" for="uproduct_name">Name</label>
                                            <input type="text" class="form-control dt-full-name" id="uproduct_name"
                                                placeholder="Namr" name="uproduct_name" aria-label="uproduct_name"
                                                aria-describedby="uproduct_name" />
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="ucategory_id">Category</label>
                                            <select class="form-control" id="ucategory_id" name="ucategory_id">
                                                @foreach ($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="photo">Photo</label>
                                            <!-- header media -->
                                                <div class="media">
                                                    <a href="javascript:void(0);" class="mr-25">
                                                        <img src="#" id="uproduct-upload-img" class="rounded mr-50" alt="image" height="80" width="80" />
                                                    </a>
                                                    <!-- upload and reset button -->
                                                    <div class="media-body mt-75 ml-1">
                                                        <label for="uproduct-upload" class="btn btn-sm btn-primary mb-75 mr-75">Upload</label>
                                                        <input type="file" id="uproduct-upload" name="uproduct-upload" hidden accept="image/*" />
                                                    </div>
                                                    <!--/ upload and reset button -->
                                                </div>
                                            <!--/ header media -->
                                            
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary mr-1 data-submit">Submit</button>
                                        <button type="reset" class="btn btn-outline-secondary"
                                            data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Modal to update  Data Ends-->

                        <!-- Modal -->
                        <div class="modal fade" id="product__image__show__modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                    <button id="change-product-btn" hidden></button>
                    <button id="remove-product-btn" hidden></button>
                </section>
                <!-- Product list ends -->
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    @include('layouts.footer')

    <!-- BEGIN: Page JS-->
    <script src="{{asset('app-assets/js/scripts/tables/estate-product.js')}}"></script>
    <!-- END: Page JS-->
</body>
<!-- END: Body-->

</html>