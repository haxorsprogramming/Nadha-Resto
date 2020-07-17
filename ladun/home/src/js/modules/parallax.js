import { jarallax } from 'jarallax'

const Parallax = {
  init() {
    // Image
    jarallax(document.querySelectorAll('.bg-image.bg-parallax'), {
      speed: 0.75
    })
  }
}

export default Parallax
