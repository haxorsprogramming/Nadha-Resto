import { $body, $bodyOverlay } from '../globals'

const Navigation = {
  DOM: {
    $nav: $('#nav-main'),
    $scrollers: $('[data-local-scroll]'),
    $mobilePanel: $('#panel-mobile'),
    $mobileNav: null,
    $mobileToggler: $('[data-toggle="panel-mobile"]')
  },
  init() {
    const _ = this

    // Scrollers
    _.DOM.$scrollers.find('a').on('click', function() {
      const $self = $(this)
      const url = new URL(window.location.href)
      const target = new URL($self.attr('href'))
      const hash = target.hash

      console.log(url, target, hash)

      if ((url.pathname === target.pathname || target.origin === 'null') && hash && hash !== '') {
        _.scrollTo(hash)
        $self.blur()
        return false
      } else {
        return false
      }
    })

    // Desktop Dropdown
    _.DOM.$nav.find('li.has-dropdown > a').on('click', function() {
      const $selfParent = $(this).parent('li')
      if (!$selfParent.hasClass('dropdown-show')) {
        $selfParent.siblings('.dropdown-show').removeClass('dropdown-show')
        $selfParent.addClass('dropdown-show')
        $body.addClass('dropdown-visible')
      } else {
        $selfParent.removeClass('dropdown-show')
        $body.removeClass('dropdown-visible')
      }
      return false
    })

    // Mobile Navigation
    _.DOM.$mobileNav = _.DOM.$nav
      .clone()
      .attr('id', 'nav-main-mobile')
      .removeClass('nav-main')
      .addClass('nav-main-mobile')
    _.DOM.$mobileNav.appendTo('#panel-mobile .module-navigation')

    // Mobile Dropdown
    _.DOM.$mobileNav.find('li.has-dropdown > a').on('click', function() {
      $(this)
        .next('.dropdown-container, ul')
        .slideToggle(300)
      return false
    })

    // Mobile Panel Toggle
    _.DOM.$mobileToggler.on('click', function() {
      if (_.DOM.$mobilePanel.hasClass('show')) {
        _.DOM.$mobilePanel.removeClass('show')
        $bodyOverlay.fadeOut(400)
      } else {
        _.DOM.$mobilePanel.addClass('show')
        $bodyOverlay.fadeIn(400)
      }
      return false
    })
  },
  scrollTo(id) {
    const _ = this
    const $target = $(id)

    if ($target.length) {
      $('html, body').animate(
        {
          scrollTop: $target.offset().top
        },
        600
      )
    } else {
      console.error('[NAVIGATION] Wrong href - the ID does not exist in the DOM')
    }
  },
  handleClick(e) {
    const _ = this

    if (e.target.localName == 'body' || e.target.localName == 'html' || e.target.id == 'body-wrapper') {
      _.DOM.$nav.find('li.dropdown-show').removeClass('dropdown-show')
      $body.removeClass('dropdown-visible')
    }
  },
  hideDropdown() {
    $('.dropdown-show').removeClass('dropdown-show')
    $body.removeClass('dropdown-visible')
  }
}

export default Navigation
