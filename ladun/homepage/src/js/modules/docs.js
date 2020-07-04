import 'code-prettify/src/run_prettify'

const Docs = {
  init() {
    const _ = this

    // Html Markups
    $('.html-code').each(function() {
      var innerHtml = $(this).html()
      innerHtml = innerHtml
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
      $(this).html(innerHtml)
    })
  }
}

export default Docs
