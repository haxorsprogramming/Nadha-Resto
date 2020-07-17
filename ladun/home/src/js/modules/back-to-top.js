const BackToTop = {
  $el: $('.back-to-top'),
  init() {
    const _ = this

    if (_.$el.length) {
      _.$el.on('click', function() {
        $('body, html').animate(
          {
            scrollTop: 0
          },
          1000
        )
        return false
      })
    }
  },
  handleScroll(scrolled) {
    const _ = this
    if (scrolled > $(window).height() && !_.$el.hasClass('visible')) {
      _.$el.addClass('visible')
    } else if (scrolled <= $(window).height() && _.$el.hasClass('visible')) {
      _.$el.removeClass('visible')
    }
  }
}

export default BackToTop
