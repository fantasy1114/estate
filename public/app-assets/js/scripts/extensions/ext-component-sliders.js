/*=========================================================================================
	File Name: ext-component-sliders.js
	Description: noUiSlider is a lightweight JavaScript range slider library.
	----------------------------------------------------------------------------------------
	Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
	Author: PIXINVENT
	Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(function () {
  'use strict';

  // RTL Support
  var direction = 'ltr';
  if ($('html').data('textdirection') == 'rtl') {
    direction = 'rtl';
  }

  /********************************************
   *				Slider values				*
   ********************************************/

  // Handles
  var pipsRange = document.getElementById('pips-range');




  /****************************************************
   *				Slider Scales / Pips				*
   ****************************************************/

  if (typeof pipsRange !== undefined && pipsRange !== null) {
    // Range
    noUiSlider.create(pipsRange, {
      start: maxprice,
      step: 1,
      range: {
        min: 0,
        max: maxprice
      },
      tooltips: true,
      direction: direction,
      
      // pips: {
      //   mode: 'steps',
      //   stepped: true,
      //   density: 5
      // }
    });
    $('.noUi-tooltip').prepend('CHF ');
  }

  
});
