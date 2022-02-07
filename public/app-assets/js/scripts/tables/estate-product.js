/*=========================================================================================
    File Name: app-user-list.js
    Description: User List page
    --------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent

==========================================================================================*/
$(function () {
    'use strict';

    var dtUserTable = $('.data-list-table'),
        newUserSidebar = $('.new-data-modal'),
        newUserForm = $('.add-new-data')

    // Users List datatable
    if (dtUserTable.length) {
        dtUserTable.DataTable({
            columns: [
                // columns according to JSON
                { data: 'product_name' },
                { data: 'category_id' },
                { data: 'img' },
                { data: 'status' },
                { data: 'action' }
            ],
            columnDefs: [{
            },
            {
                targets: 0,
                responsivePriority: 4,
            },
            ],
            order: [
                // [0, 'desc']
            ],
            dom: '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
                '<"col-lg-12 col-xl-6" l>' +
                '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
                '>t' +
                '<"d-flex justify-content-between mx-2 row mb-1"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',
            language: {
                sLengthMenu: 'Show _MENU_',
                search: 'Search',
                searchPlaceholder: 'Search..'
            },
            // Buttons with Dropdown
            buttons: [{
                text: 'Add New Product',
                className: 'add-new btn btn-primary mt-50',
                attr: {
                    'data-toggle': 'modal',
                    'data-target': '#modals-slide-in'
                },
                init: function (api, node, config) {
                    $(node).removeClass('btn-secondary');
                }
            }],
            // For responsive popup
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.modal({
                        header: function (row) {
                            var data = row.data();
                            return 'Details of ' + data['product_name'];
                        }
                    }),
                    type: 'column',
                    renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                        tableClass: 'table',
                        columnDefs: [{
                            targets: 0,
                            visible: true
                        },
                        {
                            targets: 1,
                            visible: true
                        },
                        {
                            targets: 2,
                            visible: true
                        }
                        ]
                    })
                }
            },
            language: {
                paginate: {
                    // remove previous & next text from pagination
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            }
        });
    }

    // Form Validation
    if (newUserForm.length) {
        newUserForm.validate({
            errorClass: 'error',
            rules: {
                'product_name': {
                    required: true
                }
            }
        });

        newUserForm.on('submit', function (e) {
            var img_src = $('#product-upload-img').attr('src');
            var product_img = $('#product-upload').val();
            
            var isValid = newUserForm.valid();
            var formData = new FormData(this);
            e.preventDefault();
            if (isValid && img_src != '#' && product_img != '' && product_img.includes('.svg')) {
                $.ajax({
                    type: 'post',
                    url: '/product-create',
                    cache: false,
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if (data['success']) {
                            window.location.reload();
                        }
                        else {

                        }
                    }
                });
                newUserSidebar.modal('hide');
            }
        });
    }
    // To initialize tooltip with body container
    $('body').tooltip({
        selector: '[data-toggle="tooltip"]',
        container: 'body'
    });
    $(document).on('shown.bs.modal', '.dtr-bs-modal', function () {
        feather.replace();
    });

    var accountUploadImg = $('#product-upload-img'),
        accountUploadBtn = $('#product-upload'),
        uaccountUploadImg = $('#uproduct-upload-img'),
        uaccountUploadBtn = $('#uproduct-upload')
    if (accountUploadBtn) {
        accountUploadBtn.on('change', function (e) {
            var reader = new FileReader(),
                files = e.target.files;
            reader.onload = function () {
                if (accountUploadImg) {
                    accountUploadImg.attr('src', reader.result);
                }
            };
            reader.readAsDataURL(files[0]);

        });
    }
    if (uaccountUploadBtn) {
        uaccountUploadBtn.on('change', function (e) {
            var reader = new FileReader(),
                files = e.target.files;
            reader.onload = function () {
                if (uaccountUploadImg) {
                    uaccountUploadImg.attr('src', reader.result);
                }
            };
            reader.readAsDataURL(files[0]);
        });
    }
    // EDIT

    $(document).on("click", ".data_edit_btn", function () {
        var id = $(this).data('id');
        var url = '/product-update/' + id;
        $("#uproduct_name").val($(this).data('product_name'));
        $("#ucategory_id").val($(this).data('category_id'));
        $("#uproduct-upload-img").attr('src', $(this).data('product_img'));
        $(".edit-data-modal").modal('show');
        
        $('.edit-data-form').on("submit", function (e) {
            var formData = new FormData(this);
            var datas = $("#uproduct-upload-img").attr('src');
            
            e.preventDefault();
            if(datas.includes('data:image/svg') || datas.includes('.svg')){
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: url,
                    cache: false,
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if (data['success']) {
                            window.location.reload();
                        }
                        else {
                            console.log('error');
                        }
                    }
                })
            }
            
        });
    });

    // Image SHOW
    $(document).on("click", ".item_image_show", function () {
        $(".modal__image__show").attr('src', $(this).data('product_img'));
        $("#product__image__show__modal").modal('show');
    });

    // OPEN
    $(document).on("click", ".data_open_btn", function () {
        var id = $(this).data('id');
        var url = '/itempage/' + id;
        window.location.href = url;
    });

    // GO
    $(document).on("click", ".data_show_btn", function () {
        var id = $(this).data('id');
        var url = '/show/' + id;
        window.location.href = url;
    });

    $(document).on('change', '.status-product-update', function () {
        var id = $(this).data('id');
        var url = 'product-change/' + id;

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: url,
            data: { isometry: 'on' },
            success: function (data) {
                if (data['success']) {
                    $('#change-product-btn').click();
                }
            }
        });
    });

});