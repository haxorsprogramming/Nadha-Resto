/* -----------------------------------------------------------------------------

Soup - Restaurant with Online Ordering System Template

File:           JS Core
Version:        2.00
Last change:    14/05/20
Author:         Suelo (Piotr Osmola)

-------------------------------------------------------------------------------- */

'use strict'

var $body = $('body'),
  $bodyWrapper = $('#body-wrapper'),
  $header = $('#header'),
  $headerMobile = $('#header-mobile'),
  $footer = $('#footer'),
  $pageLoader = $('#page-loader'),
  $navToggle = $('#nav-toggle'),
  $navMain = $('#nav-main'),
  $messengerToggle = $('[data-toggle="messenger"]'),
  $messenger = $('#messenger'),
  $navAdditionalToggle = $('[data-toggle="nav-additional"]'),
  $navAdditional = $('#nav-additional'),
  trueMobile,
  $bodyOverlay = $('#body-overlay'),
  $backToTop = $('#back-to-top')

var $panelCartToggle = $('[data-toggle="panel-cart"]'),
  $panelCart = $('#panel-cart')

function showPanelCart() {
  $panelCart.addClass('show')
  $bodyOverlay.fadeIn(400)
}

function hidePanelCart() {
  $panelCart.removeClass('show')
  $bodyOverlay.fadeOut(400)
}

// Mobile Panel

var $panelMobileToggle = $('[data-toggle="panel-mobile"]'),
  $panelMobile = $('#panel-mobile')

function showPanelMobile() {
  $panelMobile.addClass('show')
  $bodyOverlay.fadeIn(400)
}

function hidePanelMobile() {
  $panelMobile.removeClass('show')
  $bodyOverlay.fadeOut(400)
}

var Core = {
  init: function() {
    this.Component.init()
  },
  Component: {
    init: function() {
      this.cart.init()
      this.customControls()
      this.forms()
      this.map()
    },
    cart: {
      $productModal: $('#productModal'),
      productModalInit: $('#productModal').html(),
      $activeProduct: null,
      $addProductPriceItem: $('#addProductPrice'),
      addProductPrice: 0,
      $items: [],
      additions: [],
      additionsValue: 0,
      $additionsItems: $('#panelDetailsAdditions'),
      init: function() {
        var _ = this
        // Panel Cart
        $panelCartToggle.on('click', function() {
          if ($panelCart.hasClass('show')) {
            hidePanelCart()
          } else {
            showPanelCart()
          }
          return false
        })
        $panelCart.find('[data-toggle="modal"]').on('click', function() {
          $($(this).attr('href')).modal('show')
        })

        $('[data-action="open-cart-modal"]').on('click', function() {
          _.$activeProduct = $(this).parents('.menu-item')
          _.showProductModal()
        })

        $('[data-action="add-to-cart"]').on('click', function() {
          _.hideProductModal()
          _.$activeProduct = null
        })

        _.$productModal.find('[data-size]').on('change', function() {
          _.setAddProductPrice($(this).val())
        })

        _.$productModal.find('[data-addition]').on('change', function() {
          _.updateAdditions()
        })
      },
      showProductModal: function() {
        var _ = this
        _.setAddProductPrice(_.$activeProduct.find('[data-product-base-price]').text())
        _.$productModal.modal('show')
      },
      hideProductModal: function() {
        var _ = this
        _.$productModal.modal('hide')
      },
      setAddProductPrice: function(price) {
        var _ = this
        var p
        if (price) {
          p = Number(price)
        } else {
          p = Number(_.addProductPrice)
        }
        _.addProductPrice = p + _.additionsValue
        _.$addProductPriceItem.text((p + _.additionsValue).toFixed(2))
      },
      updateAdditions: function() {
        var _ = this
        _.additionsValue = 0
        _.additions = []

        _.$additionsItems.find('[data-addition]').each(function() {
          if ($(this).prop('checked')) {
            _.additions.push($(this).data('addition'))
            _.additionsValue += Number($(this).attr('value'))
          }
        })
        _.setAddProductPrice()
      }
    }
  }
}

Core.Basic.pageTransition()

$(document).ready(function() {
  Core.init()
})

$(document).on('click', function(e) {
  if (e.target.id == 'body-overlay') {
    hidePanelCart()
  }
})

// Stick to Content
var $stickableNav = $('.stick-to-content')
var stickableNavOffset

if ($stickableNav.length) {
  stickableNavOffset = $stickableNav.offset().top
}

function setStickyElement(scrolled) {
  var topVal = 0

  if ($(window).width() <= 991) {
    topVal = $headerMobile.outerHeight()
  }

  if (scrolled > stickableNavOffset - topVal) {
    $stickableNav.css({
      position: 'fixed',
      top: topVal + 'px',
      width: $stickableNav.innerWidth() + 'px'
    })
  } else {
    $stickableNav.removeAttr('style')
  }

  if (scrolled > $footer.offset().top - $stickableNav.outerHeight()) {
    $stickableNav.css({
      position: 'absolute',
      top: $footer.offset().top - $stickableNav.outerHeight() - stickableNavOffset + 'px'
    })
  }
}

$(window).on('scroll', function() {
  var scrolled = $(window).scrollTop()
  if ($stickableNav.length) {
    setStickyElement(scrolled)
  }
})
