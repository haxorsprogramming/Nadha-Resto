import 'bootstrap/js/dist/modal'
import { $body, $bodyOverlay, currency } from '../globals'
import CustomControl from './custom-control'
import ls from 'local-storage'

const JSON_CATEGORIES = './data/categories.json'
const JSON_MENU = './data/menu.json'
const JSON_DELIVERY = './data/delivery.json'

const Cart = {
  activeItem: null,
  activeItemAdditionsTotal: 0,
  activeCategory: null,
  activeAdditions: [],
  categories: null,
  menu: null,
  items: ls.get('cartItems') || [],
  deliveryPrice: 3.99,
  orderTotal: 0,
  init: function() {
    const _ = this

    _.getData()

    _.Panel.init()
    _.Modal.init()
  },
  getData() {
    const _ = this

    $.getJSON(JSON_CATEGORIES, data => {
      _.categories = data
    })

    $.getJSON(JSON_MENU, data => {
      _.menu = data
    })

    $.getJSON(JSON_DELIVERY, data => {
      _.deliveryPrice = data.price
    })
  },
  addActiveItemToCart() {
    const _ = this
    const item = {
      _ref: new Date().getTime(),
      ..._.activeItem
    }

    _.items.push(item)
    _.Panel.update()
    ls('cartItems', _.items)
  },
  updateActiveItemInCart() {
    const _ = this
    const index = _.items.findIndex(item => item._ref === _.activeItem._ref)

    _.items[index] = _.activeItem
    _.Panel.update()
    ls('cartItems', _.items)
  },
  removeItem(payload) {
    const _ = this

    const index = _.items.findIndex(item => item._ref === payload.ref)
    _.items.splice(index, 1)
    _.Panel.update()
    ls('cartItems', _.items)
  },
  setActiveAdditions($item, payload) {
    const _ = this

    if ($item.is(':checked')) {
      _.activeItemAdditionsTotal += payload.price
      _.activeAdditions.push(payload)
    } else {
      const index = _.activeAdditions.findIndex(o => o.id === payload.id)
      _.activeItemAdditionsTotal -= payload.price
      _.activeAdditions.splice(index, 1)
    }

    _.activeItem.additions = _.activeAdditions
    _.activeItem.totalPrice = _.activeItem.sizes.find(o => o.active === true).price + _.activeItemAdditionsTotal

    _.Modal.updatePrice()
  },
  setActiveSize($item, payload) {
    const _ = this

    const oldSize = _.activeItem.sizes.find(o => o.active === true)
    if (oldSize) oldSize.active = false
    const newSize = _.activeItem.sizes.find(o => o.id === payload.id)
    newSize.active = true
    _.activeItem.totalPrice = _.activeItem.totalPrice - oldSize.price + newSize.price

    console.log(_.activeItem.sizes, oldSize)

    _.Modal.updatePrice()
  },
  setActiveItem(id) {
    const _ = this

    if (_.Modal.mode === 'EDIT') {
      _.activeItem = _.items.find(o => o._ref === id)
    } else {
      _.activeItem = _.menu.find(o => o.id === id)
      _.activeItem.totalPrice = _.activeItem.price
    }
    _.activeCategory = _.categories.find(o => o.id === _.activeItem.categoryId)
  },
  Panel: {
    DOM: {
      $panel: $('#panel-cart'),
      $panelToggler: $('[data-toggle="panel-cart"]'),
      $headerNotification: $('.module-cart .notification'),
      $headerValue: $('.module-cart .value'),
      $details: $('.cart-details'),
      $table: $('.cart-details .cart-table'),
      $productsTotal: $('.cart-details .cart-products-total'),
      $delivery: $('.cart-details .cart-delivery'),
      $orderTotal: $('.cart-details .cart-total'),
      $empty: $('.cart-details .cart-empty'),
      $summary: $('.cart-details .cart-summary')
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

      if (_.DOM.$details.length) {
        this.update()
      }
    },
    update() {
      const _ = this

      let productsTotal = 0
      const countItems = Cart.items.length

      _.DOM.$table.html('')

      Cart.items.forEach(item => {
        productsTotal += item.totalPrice
        const size = item.sizes.find(o => o.active)
        const $item = $(`
          <tr>
              <td class="title">
                  <span class="name"><a href="#product-modal" data-toggle="modal">${item.name}</a></span>
                  <span class="caption text-muted">${size.name} (${size.value})</span>
              </td>
              <td class="price">${currency}${item.totalPrice.toFixed(2)}</td>
              <td class="actions">
                  <button data-toggle="modal" class="action-icon" data-action="open-cart-modal" data-id="${item._ref}" data-edit="true"><i class="ti ti-pencil"></i></button>
                  <button class="action-icon" data-action="remove-from-cart"><i class="ti ti-close"></i></button>
              </td>
          </tr>
        `)
        $item.find('[data-action="remove-from-cart"]').on('click', function() {
          Cart.removeItem(item)
          $item.remove()
        })
        $item.appendTo(_.DOM.$table)
      })

      _.DOM.$productsTotal.text(productsTotal.toFixed(2))
      _.DOM.$delivery.text(Cart.deliveryPrice.toFixed(2))
      _.DOM.$orderTotal.text((Cart.deliveryPrice + productsTotal).toFixed(2))
      if (countItems === 0) {
        _.DOM.$headerNotification.hide()
        _.DOM.$empty.show()
        _.DOM.$summary.hide()
        _.DOM.$table.hide()
      } else {
        _.DOM.$headerNotification.show()
        _.DOM.$headerNotification.text(countItems)
        _.DOM.$empty.hide()
        _.DOM.$summary.show()
        _.DOM.$table.show()
      }

      _.DOM.$headerValue.text(productsTotal.toFixed(2))
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
      $modalToggler: $('[data-action="open-cart-modal"]'),
      $addToCart: $('[data-action="add-to-cart"]'),
      $updateCart: $('[data-action="update-cart"]'),
      $details: $('#product-modal .panel-details'),
      $name: $('#product-modal .product-modal-name'),
      $ingredients: $('#product-modal .product-modal-ingredients'),
      $price: $('#product-modal .product-modal-price'),
      $sizes: $('#product-modal .panel-details-size'),
      $sizesList: $('#product-modal .product-modal-sizes'),
      $additions: $('#product-modal .panel-details-additions'),
      $additionsList: $('#product-modal .product-modal-additions')
    },
    mode: 'ADD',
    init() {
      const _ = this

      $body.on('click', '[data-action="open-cart-modal"]', function() {
        if ($(this).data('edit')) {
          _.mode = 'EDIT'
        } else {
          _.mode = 'ADD'
        }
        _.showProductModal($(this).data('id'))
      })

      _.DOM.$addToCart.on('click', function() {
        Cart.addActiveItemToCart()
        _.hideProductModal()
      })

      _.DOM.$updateCart.on('click', function() {
        Cart.updateActiveItemInCart()
        _.hideProductModal()
      })

      _.DOM.$modal.on('show.bs.modal', function() {
        if (_.mode === 'EDIT') {
          _.DOM.$addToCart.hide()
          _.DOM.$updateCart.show()
        } else {
          _.DOM.$addToCart.show()
          _.DOM.$updateCart.hide()
        }
        _.build()
      })

      _.DOM.$modal.on('hidden.bs.modal', function() {
        _.reset()
      })

      _.reset()
    },
    build() {
      const _ = this

      try {
        // Header
        _.DOM.$name.text(Cart.activeItem.name)
        _.DOM.$ingredients.text(Cart.activeItem.ingredients.join(', '))
        _.DOM.$price.text(Cart.activeItem.totalPrice.toFixed(2))

        // Sizes
        if (Cart.activeItem.sizes && Cart.activeItem.sizes.length > 1) {
          _.DOM.$sizesList.html('')
          Cart.activeItem.sizes.forEach(item => {
            const $item = $(`
            <div class="form-group">
                <label class="custom-control custom-radio">
                    <input name="radio_size" value="${item.id}" type="radio" class="custom-control-input" ${item.active ? 'checked' : ''}>
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">${item.name} - ${item.value} <span>(${currency}${item.price.toFixed(2)})</span></span>
                </label>
            </div>
          `)
            $item.find('input').on('change', function() {
              Cart.setActiveSize($(this), item)
            })
            $item.appendTo(_.DOM.$sizesList)
          })
          _.DOM.$sizes.show()
          _.DOM.$sizes.find('.collapse').addClass('show')
        } else {
          _.DOM.$sizes.hide()
        }

        // Additions
        if (Cart.activeCategory.additions && Cart.activeCategory.additions.length > 1) {
          _.DOM.$additionsList.html('')
          Cart.activeCategory.additions.forEach(item => {
            const $item = $(`
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" value="${item.id}" class="custom-control-input" ${Cart.activeItem.additions && Cart.activeItem.additions.findIndex(o => o.id === item.id) !== -1 ? 'checked' : ''}>
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">${item.name} <span>(${currency}${item.price.toFixed(2)})</span></span>
                    </label>
                </div>
            </div>
          `)
            $item.find('input').on('change', function() {
              Cart.setActiveAdditions($(this), item)
            })
            $item.appendTo(_.DOM.$additionsList)
          })
          _.DOM.$additions.show()
          if (!Cart.activeItem.sizes || Cart.activeItem.sizes.length <= 1) {
            _.DOM.$additions.find('.collapse').addClass('show')
          }
        } else {
          _.DOM.$additions.hide()
        }

        CustomControl.init(_.$modal)
      } catch (error) {
        console.error('[CART_MODAL] Please check a JSON data source and data-id attribute on the button.')
      }
    },
    showProductModal(id) {
      const _ = this

      Cart.setActiveItem(id)
      _.DOM.$modal.modal('show')
    },
    hideProductModal() {
      const _ = this

      _.DOM.$modal.modal('hide')
    },
    updatePrice() {
      const _ = this

      _.DOM.$price.text(Cart.activeItem.totalPrice.toFixed(2))
    },
    reset() {
      const _ = this

      _.DOM.$details.each(function() {
        const $self = $(this)
        const $title = $self.find('.panel-details-title')
        const $content = $self.find('.panel-details-content').children()

        $self.find('.collapse').removeClass('show')
        $title.find('input').prop('checked', false)

        if (!$self.hasClass('panel-details-form')) {
          $content.html('')
        }
      })
    }
  }
}

export default Cart
