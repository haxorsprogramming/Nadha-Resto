/* -----------------------------------------------------------------------------

Soup - Restaurant with Online Ordering System Template

File:           JS Core
Version:        2.00
Last change:    22/05/2020
Author:         Suelo (Piotr Osmola)

-------------------------------------------------------------------------------- */

'use strict'

// Import Third-Part Styles
import 'bootstrap/scss/bootstrap.scss'
import 'slick-carousel/slick/slick.scss'
import 'animsition/dist/css/animsition.css'
import 'animate.css/animate.min.css'
import '@icon/themify-icons/themify-icons.css'
import 'font-awesome/css/font-awesome.css'

// Import Themes
import '@/scss/theme-teal.scss'
import '@/scss/theme-blue.scss'
import '@/scss/theme-green.scss'
import '@/scss/theme-mint.scss'
import '@/scss/theme-orange.scss'
import '@/scss/theme-red.scss'
import '@/scss/theme-beige.scss'

// Import Modules
import PageTransition from './modules/page-transition'
import BackToTop from './modules/back-to-top'
import Background from './modules/background'
import Carousel from './modules/carousel'
import Cart from './modules/cart'
import Collapse from './modules/collapse'
import Cookies from './modules/cookies'
import Components from './modules/components'
import CustomControl from './modules/custom-control'
import Forms from './modules/forms'
import GoogleMap from './modules/google-map'
import Navigation from './modules/navigation'
import Modal from './modules/modal'
import Parallax from './modules/parallax'
import Sticky from './modules/sticky'
import Twitter from './modules/twitter'
import Docs from './modules/docs'

// Document - Ready
$(function() {
  Background.init()
  BackToTop.init()
  Carousel.init()
  Cart.init()
  Collapse.init()
  Cookies.init()
  Components.init()
  CustomControl.init()
  Forms.init()
  GoogleMap.init()
  Navigation.init()
  Modal.init()
  PageTransition.init()
  Parallax.init()
  Sticky.init()
  Twitter.init()
  Docs.init()

  if (process.env.PREVIEW) {
    const Styleswitcher = require('./modules/styleswitcher')
    Styleswitcher.default.init()
  }
})

// Document - Click
$(document).on('click', function(e) {
  Navigation.handleClick(e)
  Cart.Panel.handleClick(e)
})

let scrolled = 0

// Window - Scroll
$(window).on('scroll', function() {
  scrolled = $(window).scrollTop()

  BackToTop.handleScroll(scrolled)
  Sticky.handleScroll(scrolled)
})
