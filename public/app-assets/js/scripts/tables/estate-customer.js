/*=========================================================================================
    File Name: app-user-list.js
    Description: User List page
    --------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent

==========================================================================================*/
$(function() {
    'use strict';

    var dtUserTable = $('.data-list-table'),
        newUserSidebar = $('.new-data-modal'),
        newUserForm = $('.add-new-data')

    // Users List datatable
    if (dtUserTable.length) {
        dtUserTable.DataTable({
            columns: [
                // columns according to JSON
                { data: 'name' },
                { data: 'email' },
                { data: 'phone' },
                { data: 'min_price' },
                { data: 'max_price' },
                { data: 'min_size' },
                { data: 'max_size' },
                { data: 'region' },
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
                text: 'Add New Customer',
                className: 'add-new btn btn-primary mt-50',
                attr: {
                    'data-toggle': 'modal',
                    'data-target': '#modals-slide-in'
                },
                init: function(api, node, config) {
                    $(node).removeClass('btn-secondary');
                }
            }],
            // For responsive popup
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.modal({
                        header: function(row) {
                            var data = row.data();
                            return 'Details of ' + data['name'];
                        }
                    }),
                    type: 'column',
                    renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                        tableClass: 'table',
                        columnDefs: [{
                                targets: 0,
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
                'name': {
                    required: true
                }                
            }
        });
        
        newUserForm.on('submit', function(e) {
            
            var isValid = newUserForm.valid();
            var formData = new FormData(this);
            e.preventDefault();
            if (isValid) {
                $.ajax({
                    type: 'post',
                    url: '/customer-create',
                    cache:false,
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if(data['success']){
                            window.location.reload();
                        }
                        else{
                            
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
    $(document).on('shown.bs.modal', '.dtr-bs-modal', function(){
        feather.replace();
    });

    // EDIT

    $(document).on("click", ".data_edit_btn", function()  {
        var id = $(this).data('id');
        var url = '/customer-update/' + id;
        
        $("#ucustomer_name").val($(this).data('name'));
        $("#ucustomer_email").val($(this).data('email'));
        $("#ucustomer_phone").val($(this).data('phone'));
        $("#ucustomer_min_price").val($(this).data('min_price'));
        $("#ucustomer_max_price").val($(this).data('max_price'));
        $("#ucustomer_min_size").val($(this).data('min_size'));
        $("#ucustomer_max_size").val($(this).data('max_size'));
        $("#ucustomer_region").val($(this).data('region'));
        $(".edit-data-modal").modal('show');

        $('.edit-data-form').on("submit", function(e) {
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
        });
    });
    
});