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
                { data: 'item_photo' },
                { data: 'item_floor' },
                { data: 'item_apt' },
                { data: 'item_room' },
                { data: 'item_total' },
                { data: 'item_balcony' },
                { data: 'item_rent' },
                { data: 'item_price' },
                { data: 'item_iso' },
                { data: 'item_infos' },
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
                text: 'Add New Item',
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
                            return 'Details of Item';
                        }
                    }),
                    type: 'column',
                    renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                        tableClass: 'table',
                        columnDefs: [{
                            targets: 1,
                            visible: false
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
                'item_photo': {
                    required: true
                },
                'item_floor': {
                    required: true
                },
                'item_apt': {
                    required: true
                },
                'item_room': {
                    required: true
                },
                'item_total': {
                    required: true
                },
                'item_balcony': {
                    required: true
                },
                'item_rent': {
                    required: true
                },
                'item_iso': {
                    required: true
                },
                'item_infos': {
                    required: true
                }
            }
        });

        newUserForm.on('submit', function (e) {
            var img_src = $('#item-upload-img').attr('src');
            var item_infos = $('#item-upload-pdf').val();
            var item_upload = $('#item-upload').val();

            var isValid = newUserForm.valid();
            var formData = new FormData(this);
            e.preventDefault();
            if (isValid && img_src != '#' && img_src != '' && item_infos != undefined && item_infos != '' && item_upload != '' && !item_upload.includes('.svg')) {
                $.ajax({
                    type: 'post',
                    url: '/item-create',
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

    var itemUploadImg = $('#item-upload-img'),
        itemUploadBtn = $('#item-upload'),
        uitemUploadImg = $('#uitem-upload-img'),
        uitemUploadBtn = $('#uitem-upload'),
        isoUploadImg = $('#iso-upload-img'),
        isoUploadBtn = $('#iso-upload'),
        uisoUploadImg = $('#uiso-upload-img'),
        uisoUploadBtn = $('#uiso-upload')
        
    if (itemUploadBtn) {
        itemUploadBtn.on('change', function (e) {
            var reader = new FileReader(),
                files = e.target.files;
            reader.onload = function () {
                if (itemUploadImg) {
                    itemUploadImg.attr('src', reader.result);
                }
            };
            reader.readAsDataURL(files[0]);
        });
    }
    if (isoUploadBtn) {
        isoUploadBtn.on('change', function (e) {
            var reader = new FileReader(),
                files = e.target.files;
            reader.onload = function () {
                if (isoUploadImg) {
                    isoUploadImg.attr('src', reader.result);
                }
            };
            reader.readAsDataURL(files[0]);
        });
    }
    if (uitemUploadBtn) {
        uitemUploadBtn.on('change', function (e) {
            var reader = new FileReader(),
                files = e.target.files;
            reader.onload = function () {
                if (uitemUploadImg) {
                    uitemUploadImg.attr('src', reader.result);
                }
            };
            reader.readAsDataURL(files[0]);
        });
    }
    if (uisoUploadBtn) {
        uisoUploadBtn.on('change', function (e) {
            var reader = new FileReader(),
                files = e.target.files;
            reader.onload = function () {
                if (uisoUploadImg) {
                    uisoUploadImg.attr('src', reader.result);
                }
            };
            reader.readAsDataURL(files[0]);
        });
    }
    // EDIT

    $(document).on("click", ".data_edit_btn", function () {
        var id = $(this).data('id');
        var url = '/item-update/' + id;
        $("#uitem-upload-img").attr('src', $(this).data('item_img'));
        $("#uitem_floor").val($(this).data('floor'));
        $("#uitem_apt").val($(this).data('apt'));
        $("#uitem_room").val($(this).data('room'));
        $("#uitem_total").val($(this).data('total'));
        $("#uitem_balcony").val($(this).data('balcony'));
        $("#uitem_rent").val($(this).data('rent'));
        $("#uitem_price").val($(this).data('price'));
        $("#uiso-upload-img").attr('src', $(this).data('iso'));
        $(".edit-data-modal").modal('show');

        $('.edit-data-form').on("submit", function (e) {
            var formData = new FormData(this);
            var datas = $("#uitem-upload-img").attr('src');
            e.preventDefault();
            if(!datas.includes('data:image/svg')){
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

    $(document).on("click", ".item_image_show", function () {
        $(".modal__image__show").attr('src', $(this).data('item_img'));
        $("#item__image__show__modal").modal('show');
    });

    $(document).on('click', '.paginate_button', function () {
        feather.replace();
    });
});