const Background = {
  init($context) {
    const _ = this

    // Image
    $('.bg-image, .post-wide .post-image, .post.single .post-image', $context || 'html').each(function() {
      const $self = $(this)
      const src = $self.children('img').attr('src')
      $self
        .css('background-image', 'url(' + src + ')')
        .children('img')
        .hide()
    })

    // Video
    $('.bg-video', $context || 'html').each(function() {
      const $self = $(this)
      setTimeout(() => {
        const $video = $(`
          <video muted playsinline autoplay loop preload="none">
            <source src="${$self.data('src')}" type="${$self.data('type')}">
          </video>
        `)
        $video.appendTo($self)
      }, 500)
    })
  }
}

export default Background
