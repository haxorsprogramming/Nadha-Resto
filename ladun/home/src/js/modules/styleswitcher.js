const Styleswitcher = {
  $styleswitcher: $(`
    <div id="style-switcher-wrapper">
      <span id="style-switcher-toggle"><img src="assets/img/icons/settings.svg" alt=""></span>
      <div id="style-switcher">
        <div class="style-switcher-title">Color</div>
        <ul id="color-switcher" class="style-switcher-list list-colors"></ul>
        <div class="style-switcher-bottom">
            <a href="http://themeforest.net/user/suelo/portfolio?ref=suelo" target="_blank" class="btn btn-sm btn-outline-primary"><span>Check other products</span></a>
        </div>
        <a class="style-switcher-close"><img src="assets/img/icons/close.svg" alt=""></a>
      </div>
    </div>
  `),
  colors: [
    {
      name: 'beige',
      color: '#ddae71'
    },
    {
      name: 'blue',
      color: '#497ece'
    },
    {
      name: 'green',
      color: '#56a75f'
    },
    {
      name: 'mint',
      color: '#47a782'
    },
    {
      name: 'orange',
      color: '#d66b52'
    },
    {
      name: 'red',
      color: '#d15454'
    },
    {
      name: 'teal',
      color: '#58adb7'
    }
  ],
  init() {
    const _ = this
    _.$styleswitcher.appendTo('body')

    let activeScheme = $('#theme')
      .attr('href')
      .substring(5)

    activeScheme = activeScheme.substring(0, activeScheme.length - 4)
    activeScheme = activeScheme.split('-')
    let activeColor = activeScheme[1]

    const $colorSwitcher = $('#color-switcher')

    _.colors.forEach(o => {
      const $color = $(`
        <li>
          <a href="#" data-color="${o.name}">
            <span class="color" style="background-color: ${o.color};"></span>
          </a>
        </li>
      `)
      $color.appendTo($colorSwitcher)
    })

    _.$styleswitcher.find('ul a').on('click', function() {
      $(this)
        .parents('ul')
        .find('a.active')
        .removeClass('active')
      $(this).addClass('active')
      return false
    })

    $colorSwitcher.find('a').each(function() {
      if ($(this).data('color') == activeColor) $(this).addClass('active')
    })

    $colorSwitcher.find('a').on('click', function() {
      activeColor = $(this).data('color')
      _.setStyle(activeColor)

      return false
    })

    // Init Toggler
    $('#style-switcher-toggle').on('click', function(e) {
      $('#style-switcher-wrapper').toggleClass('show')
      e.stopPropagation()
    })

    $('#style-switcher .style-switcher-close').on('click', function(e) {
      $('#style-switcher-wrapper').removeClass('show')
      e.stopPropagation()
    })

    $('#style-switcher-wrapper').on('click', function(e) {
      $('#style-switcher-wrapper').removeClass('show')
    })

    _.$styleswitcher.on('click', function(e) {
      e.stopPropagation()
    })
  },
  setStyle(color) {
    $('#theme').attr('href', 'dist/theme-' + color + '.css')
  }
}

export default Styleswitcher
