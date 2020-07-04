import 'bootstrap/js/dist/modal'
import Cookies from './cookies'

const Modal = {
  DOM: {
    $timeout: $('.modal[data-timeout]'),
    $video: $('[data-toggle="video-modal"]')
  },
  init() {
    const _ = this

    // Timeout
    _.DOM.$timeout.each(function() {
      const $self = $(this)
      const timeout = $self.data('timeout')
      const cookieName = $self.data('set-cookie') || null

      if (cookieName) {
        const cookie = Cookies.getCookie(cookieName)
        if (cookie !== 'complete') {
          $self.modal('show')
        }
        $self.on('hidden.bs.modal', function() {
          Cookies.setCookie(cookieName, 'complete', 365)
        })
      } else {
        setTimeout(function() {
          $self.modal('show')
        }, timeout)
      }
    })

    // Video
    _.DOM.$video.on('click', function() {
      const modal = $(this).data('target')
      const video = $(this).data('video')

      $(modal + ' iframe').attr('src', video + '?autoplay=1')
      $(modal).modal('show')

      $(modal).on('hidden.bs.modal', function() {
        var $modalContent = $(modal + ' .modal-content')
        $(modal + ' iframe').remove()
        $modalContent.html('<iframe height="500"></iframe>')
      })

      return false
    })
  }
}

export default Modal
