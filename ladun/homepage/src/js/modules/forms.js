import 'jquery-validation'

const Forms = {
  init() {
    const _ = this

    _.Booking.init()
    _.Newsletter.init()
    _.Validation.init()
  },
  Booking: {
    $el: $('.booking-form'),
    init() {
      const _ = this

      if (_.$el.length > 0) {
        _.$el.submit(function() {
          const $btn = $(this).find('.btn-submit')
          const $form = $(this)

          if ($form.valid()) {
            $btn.addClass('loading')
            $.ajax({
              type: 'POST',
              url: './php/booking-form.php',
              data: $form.serialize(),
              error: function(err) {
                setTimeout(function() {
                  $btn.addClass('error')
                }, 1200)
              },
              success: function(data) {
                if (data != 'success') {
                  $btn.addClass('error')
                } else {
                  $btn.addClass('success')
                }
              },
              complete: function(data) {
                setTimeout(function() {
                  $btn.removeClass('loading error success')
                }, 6000)
              }
            })
            return false
          }
          return false
        })
      }
    }
  },
  Newsletter: {
    $el: $('.sign-up-form'),
    init() {
      const _ = this

      if (_.$el.length > 0) {
        _.$el.submit(function() {
          const $btn = $(this).find('.btn-submit')
          const $form = $(this)

          if ($form.valid()) {
            $btn.addClass('loading')
            $.ajax({
              type: $form.attr('method'),
              url: $form.attr('action'),
              data: $form.serialize(),
              cache: false,
              dataType: 'jsonp',
              jsonp: 'c',
              contentType: 'application/json; charset=utf-8',
              error: function(err) {
                setTimeout(function() {
                  $btn.addClass('error')
                }, 1200)
              },
              success: function(data) {
                if (data.result != 'success') {
                  $btn.addClass('error')
                } else {
                  $btn.addClass('success')
                }
              },
              complete: function(data) {
                setTimeout(function() {
                  $btn.removeClass('loading error success')
                }, 6000)
              }
            })
            return false
          }
          return false
        })
      }
    }
  },
  Validation: {
    $el: $('[data-validate], .validate-form'),
    init() {
      const _ = this

      if (_.$el.length) {
        _.$el.each(function() {
          $(this).validate({
            validClass: 'valid',
            errorClass: 'error',
            onfocusout: function(element, event) {
              $(element).valid()
            },
            errorPlacement: function(error, element) {
              return true
            },
            rules: {
              email: {
                required: true,
                email: true
              }
            }
          })
        })
      }
    }
  }
}

export default Forms
