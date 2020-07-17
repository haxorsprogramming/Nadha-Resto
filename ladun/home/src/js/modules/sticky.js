import { $footer, $headerMobile } from '../globals'

const Sticky = {
  $el: $('.stick-to-content'),
  init() {
    const _ = this

    if (_.$el.length) {
      _.offset = _.$el.offset().top
      _.handleScroll($(window).scrollTop())
    }
  },
  handleScroll(scrolled) {
    const _ = this

    if (_.$el.length) {
      let topVal = 0

      if ($(window).width() <= 991) {
        topVal = $headerMobile.outerHeight()
      }

      if (scrolled > _.offset - topVal) {
        _.$el.css({
          position: 'fixed',
          top: topVal + 'px',
          width: _.$el.innerWidth() + 'px'
        })
      } else {
        _.$el.removeAttr('style')
      }

      if (scrolled > $footer.offset().top - _.$el.outerHeight()) {
        _.$el.css({
          position: 'absolute',
          top: $footer.offset().top - _.$el.outerHeight() - _.offset + 'px'
        })
      }
    }
  }
}

export default Sticky
