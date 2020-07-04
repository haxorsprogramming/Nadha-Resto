import { Loader } from 'google-maps'

// IMPORTANT! Put here your API key https://developers.google.com/maps/documentation/javascript/get-api-key
const loader = new Loader('AIzaSyBRMEkSrFLFkLKHyLVwT0DLLTqcUhUUZdM')

const GoogleMap = {
  $el: $('.google-map'),
  init() {
    const _ = this

    if (_.$el.length) {
      loader.load().then(function(google) {
        _.$el.each(function() {
          const $self = $(this)
          const latlon = new google.maps.LatLng(Number($self.data('lat')), Number($self.data('lon')))
          const map = new google.maps.Map($self[0], {
            zoom: 15,
            mapTypeControl: false,
            panControl: false,
            zoomControl: true,
            scaleControl: false,
            streetViewControl: false,
            scrollwheel: false
          })
          const marker = new google.maps.Marker({
            position: latlon,
            map: map,
            icon: {
              url: 'assets/img/location-pin.png',
              anchor: new google.maps.Point(29, 64),
              size: new google.maps.Size(72, 72),
              scaledSize: new google.maps.Size(72, 72)
            }
          })

          map.panTo(latlon)
        })
      })
    }
  }
}

export default GoogleMap
