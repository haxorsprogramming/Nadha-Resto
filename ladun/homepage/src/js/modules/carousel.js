import 'slick-carousel'

const Carousel = {
  init() {
    const _ = this

    _.Basic.init()
    _.MainOne.init()
    _.MainTwo.init()
    _.Gallery.init()
  },
  Basic: {
    $el: $('.carousel'),
    init() {
      const _ = this

      if (_.$el.length) {
        _.$el.slick()
      }
    }
  },
  MainOne: {
    DOM: {
      $images: $('#section-main-1-carousel-image'),
      $contents: $('#section-main-1-carousel-content')
    },
    init() {
      const _ = this

      if (_.DOM.$images.length) {
        _.DOM.$images.slick({
          dots: true,
          speed: 800,
          arrows: false,
          asNavFor: _.DOM.$contents
        })
      }

      if (_.DOM.$contents.length) {
        _.DOM.$contents.slick({
          dots: false,
          speed: 800,
          arrows: false,
          autoplay: true,
          autoplaySpeed: 3500,
          asNavFor: _.DOM.$images
        })

        const $contentNav = _.DOM.$contents.next('.content-nav')

        $contentNav.children('.next').on('click', function() {
          _.DOM.$contents.slick('slickNext')
          $(this).blur()
          return false
        })

        $contentNav.children('.prev').on('click', function() {
          _.DOM.$contents.slick('slickPrev')
          $(this).blur()
          return false
        })
      }
    }
  },
  MainTwo: {
    $el: $('#section-main-2-slider'),
    init() {
      const _ = this

      if (_.$el.length) {
        _.$el.slick({
          dots: true,
          speed: 800,
          arrows: true
          //autoplay: true,
          //autoplaySpeed: 3500
        })
      }
    }
  },
  Gallery: {
    DOM: {
      $images: $('.gallery-carousel', '#content'),
      $nav: $('.gallery-nav', '#content')
    },
    init() {
      const _ = this

      if (_.DOM.$images.length) {
        _.DOM.$images.slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
          asNavFor: _.DOM.$nav
        })

        _.DOM.$nav.slick({
          slidesToShow: 3,
          slidesToScroll: 1,
          infinite: true,
          centerMode: true,
          focusOnSelect: true,
          responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 3
              }
            }
          ],
          asNavFor: _.DOM.$images
        })
      }
    }
  }
}

export default Carousel
