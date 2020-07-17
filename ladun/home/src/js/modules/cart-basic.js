import 'bootstrap/js/dist/modal'
import { $body, $bodyOverlay, currency } from '../globals'

const Cart = {
  init: function() {
    const _ = this

    _.Panel.init()
    _.Modal.init()
  },
  Panel: {
    DOM: {
      $panel: $('#panel-cart'),
      $panelToggler: $('[data-toggle="panel-cart"]')
    },
    init() {
      const _ = this

      _.DOM.$panelToggler.on('click', function() {
        if (_.DOM.$panel.hasClass('show')) {
          _.hidePanel()
        } else {
          _.showPanel()
        }
        return false
      })
    },
    showPanel() {
      const _ = this

      _.DOM.$panel.addClass('show')
      $bodyOverlay.fadeIn(400)
    },
    hidePanel() {
      const _ = this

      _.DOM.$panel.removeClass('show')
      $bodyOverlay.fadeOut(400)
    },
    handleClick(e) {
      const _ = this

      if (_.DOM.$panel.length && e.target.id == 'body-overlay') {
        _.hidePanel()
      }
    }
  },
  Modal: {
    DOM: {
      $modal: $('#product-modal'),
      $modalToggler: $('[data-action="open-cart-modal"]')
    },
    init() {
      const _ = this

      $body.on('click', '[data-action="open-cart-modal"]', function() {
        _.showProductModal($(this).data('id'))
      })

      $body.on('click', '[data-action="add-to-cart"]', function() {
        _.hideProductModal()
      })
    },
    showProductModal(id) {
      const _ = this

      _.DOM.$modal.modal('show')
    },
    hideProductModal() {
      const _ = this

      _.DOM.$modal.modal('hide')
    }
  }
}

export default Cart
