
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
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                    <tr>
                                        <td>{{$category->category_name}}</td>
                                        <td>
                                            <button class="dropdown-item data_edit_btn d-inline w-auto rounded" data-id="{{$category->id}}" data-category_name="{{$category->category_name}}">
                                                <i data-feather='edit'></i>
                                                <span></span>
                                            </button>
                                        
                                            <button class="dropdown-item d-inline category_delete_btn w-auto rounded" data-id="{{$category->id}}">
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
                                        <h5 class="modal-title" id="exampleModalLabel">Category</h5>
                                    </div>
                                    <div class="modal-body flex-grow-1">
                                        <div class="form-group">
                                            <label class="form-label" for="category_name">Name</label>
                                            <input type="text" class="form-control dt-full-name" id="category_name"
                                                placeholder="category" name="category_name" aria-label="category_name"
                                                aria-describedby="category_name" />
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
                                        <h5 class="modal-title">Update Category</h5>
                                    </div>
                                    <div class="modal-body flex-grow-1">
                                        <div class="form-group">
                                            <label class="form-label" for="ucategory_name">Name</label>
                                            <input type="text" class="form-control dt-full-name" id="ucategory_name"
                                                placeholder="Namr" name="ucategory_name" aria-label="ucategory_name"
                                                aria-describedby="ucategory_name" />
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
    <script src="{{asset('app-assets/js/scripts/tables/estate-category.js')}}"></script>
    <!-- END: Page JS-->
    
</body>
<!-- END: Body-->

</html>