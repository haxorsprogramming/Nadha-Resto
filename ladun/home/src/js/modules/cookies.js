const Cookies = {
  $bar: $('#cookies-bar'),
  $accept: $('[data-accept="cookies"]'),
  init() {
    const _ = this

    if (_.$bar.length) {
      const cookie = Cookies.getCookie('cookies')

      if (cookie !== 'accepted') {
        _.show(_.$bar)
      }

      _.$accept.on('click', function() {
        _.hide(_.$bar)
        _.setCookie('cookies', 'accepted', 365)
      })
    }
  },
  show() {
    const _ = this

    _.$bar.fadeIn(200)
  },
  hide() {
    const _ = this

    _.$bar.fadeOut(200)
  },
  getCookie(cname) {
    const name = cname + '='
    const decodedCookie = decodeURIComponent(document.cookie)
    const ca = decodedCookie.split(';')

    for (let i = 0; i < ca.length; i++) {
      let c = ca[i]
      while (c.charAt(0) == ' ') {
        c = c.substring(1)
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length)
      }
    }
    return ''
  },
  setCookie(cname, cvalue, exdays) {
    const d = new Date()
    d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000)
    const expires = `expires=${d.toUTCString()}`
    document.cookie = `${cname}=${cvalue};${expires};path=/`
  }
}

export default Cookies
