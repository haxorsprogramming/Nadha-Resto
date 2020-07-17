import twitterFetcher from 'twitter-fetcher'

const Twitter = {
  domId: 'twitter-feed',

  init() {
    const _ = this

    if ($(`#${_.domId}`).length) {
      var config = {
        profile: { screenName: 'suelopl' },
        domId: _.domId,
        maxTweets: 2,
        enableLinks: true,
        showPermalinks: false,
        showUser: false,
        showInteraction: false,
        showTime: true,
        lang: 'en'
      }

      twitterFetcher.fetch(config)
    }
  }
}

export default Twitter
