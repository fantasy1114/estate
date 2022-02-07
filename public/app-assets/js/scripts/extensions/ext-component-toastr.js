/*=========================================================================================
	File Name: ext-component-toastr.js
	Description: Toastr notifications
	----------------------------------------------------------------------------------------
	Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
	Author: Pixinvent
	Author URL: hhttp://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(function () {
  'use strict';

  var isRtl = $('html').attr('data-textdirection') === 'rtl',
    changepass = $('#change-pass-error'),
    changeproduct = $('#change-product-btn'),
    categoryremoveerror = $('#change-category-btn'),
    productremoveerror = $('#remove-product-btn'),
    clearToastObj;


  // 

  // Error Type
  changepass.on('click', function () {
    toastr['error']('👋 Your Old Password is wrong.', 'Error!', {
      closeButton: true,
      tapToDismiss: false,
      rtl: isRtl
    });
  });

  // Change Pass
  changeproduct.on('click', function () {
    toastr['success']('👋 Successfully Changed!', {
      closeButton: true,
      tapToDismiss: false,
      rtl: isRtl
    });
  });

  categoryremoveerror.on('click', function () {
    toastr['error']('👋 There are products in this category. Please remove the product to remove this category.', 'Error!', {
      closeButton: true,
      tapToDismiss: false,
      rtl: isRtl
    });
  });

  productremoveerror.on('click', function () {
    toastr['error']('👋 There are items in this product. Please remove the items to remove this product.', 'Error!', {
      closeButton: true,
      tapToDismiss: false,
      rtl: isRtl
    });
  });
});
