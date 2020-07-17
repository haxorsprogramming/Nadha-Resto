import 'bootstrap/js/dist/collapse'

const Collapse = {
  $el: $('.panel-details'),
  init() {
    const _ = this

    if (_.$el.length) {
      _.$el.on('show.bs.collapse', '.collapse', function() {
        $(this)
          .parents('.panel-details-container')
          .find('.collapse.show')
          .collapse('hide')
      })

      _.$el.on('hide.bs.collapse', '.collapse', function() {
        $(this)
          .prev('.panel-details-title')
          .find('input')
          .prop('checked', true)
      })

      _.$el.find('.panel-details-title a').on('click', function() {
        $(this).blur()
      })
    }
  }
}

export default Collapse
