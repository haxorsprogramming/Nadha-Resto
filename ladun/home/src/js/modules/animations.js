import 'jquery.appear'

const Animations = {
  $el: $('.animated'),
  init() {
    const _ = this

    if (_.$el.length) {
      _.$el.appear(function() {
        const $target = $(this)
        const delay = $(this).data('animation-delay')
        setTimeout(function() {
          $target.addClass(`animate__animated animate__${$target.data('animation')}`).addClass('visible')
        }, delay)
      })
    }
  }
}

export default Animations
