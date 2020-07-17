import 'animsition'
import Animations from '../modules/animations'

const PageTransition = {
  $el: $('#body-wrapper'),
  init() {
    const _ = this

    if (_.$el.length) {
      _.$el.animsition({
        inClass: 'fade-in',
        outClass: 'fade-out-up-sm',
        inDuration: 800,
        outDuration: 800,
        linkElement: 'a:not([target="_blank"]):not([href^="#"])',
        loading: true,
        loadingParentElement: 'body', //animsition wrapper element
        loadingClass: 'animsition-loading',
        loadingInner: '', // e.g '<img src="loading.svg" />'
        timeout: false,
        timeoutCountdown: 500,
        onLoadEvent: true,
        browser: ['animation-duration', '-webkit-animation-duration'],
        overlay: false,
        overlayClass: 'animsition-overlay-slide',
        overlayParentElement: 'body',
        transition: function(url) {
          window.location.href = url
        }
      })

      _.$el.on('animsition.inStart', function() {
        Animations.init()
      })
    } else {
      Animations.init()
    }
  }
}

export default PageTransition
