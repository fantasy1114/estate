<!-- BEGIN: Head-->
@include('layouts.header')
<!-- END: Head-->
<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static" data-open="click"
    data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: navbar-->
    @include('layouts.navbar')
    <!-- END navbar -->

    <!-- BEGIN LAYOUT -->
    @include('layouts.layout')
    <!-- END LAYOUT -->
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section id="page-account-settings">
                    <div class="row">
                        <!-- right content section -->
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">                                        
                                    <div class="tab-content">
                                        <!-- mailcontents tab -->
                                        <div role="tabpanel" class="tab-pane active" id="account-vertical-service" aria-labelledby="account-pill-service" aria-expanded="true">
                                            
                                            <!-- form -->
                                            <form class="validate-form update-mailcontents-page mt-2" data-id={{$id}}>
                                                <div class="row">
                                                    <div class="row col-12">
                                                        <div class="col-12 col-sm-3"></div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label for="from">From</label>
                                                                <input type="text" class="form-control" id="from" name="from" placeholder="Title" value="{{$from}}" required/>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-3"></div>
                                                    </div>
                                                    <div class="row col-12">
                                                        <div class="col-12 col-sm-3"></div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label for="subject">Subject</label>
                                                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Title" value="{{$subject}}" required/>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-3"></div>
                                                    </div>
                                                    <div class="row col-12">
                                                        <div class="col-12 col-sm-3"></div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label for="content">Content</label>
                                                                <textarea class="form-control" id="content" name="content" rows="5" required>{{$content}}
                                                                </textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-3"></div>
                                                    </div>
                                                </div> 
                                                
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-primary mt-2 mr-1">Save changes</button>
                                                </div>
                                            </form>
                                            <!--/ form -->
                                            
                                        </div>
                                        <!--/ mailcontents tab -->

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ right content section -->
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    
    <!-- BEGIN: Footer-->
    @include('layouts.footer')
    <!-- END: Footer-->

    <script>
    $(function() {        
        $('.update-mailcontents-page').on("submit", function(e) {
            var id = $(this).data('id');
            if(id == ''){
                var url = 'mailcontent-create';
                var formData = new FormData(this);
                e.preventDefault();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: url,
                    cache:false,
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if(data['success']){
                            window.location.reload();
                        }
                        else{
                            console.log('error');
                        }
                    }
                })
            }
            else{
                var url = 'mailcontent-update/' + id;
                var formData = new FormData(this);
                e.preventDefault();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: url,
                    cache:false,
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if(data['success']){
                            window.location.reload();
                        }
                        else{
                            console.log('error');
                        }
                    }
                })
            }
            
        });

    })
   
    </script>
</body>
<!-- END: Body-->

</html>