var origin = { lat: -23.533773, lng: -46.625290 };
     // initMap(origin, 'Academias');

     function initMap(city, place_query) {
      map = new google.maps.Map(document.getElementById('map'), {
        center: city,
        zoom: 12,
        styles: [{
          stylers: [{ visibility: 'simplified' }]
        }, {
          elementType: 'labels',
          stylers: [{ visibility: 'off' }]
        }]
      });

      infoWindow = new google.maps.InfoWindow();
      service = new google.maps.places.PlacesService(map);

      map.addListener('idle', performSearch);

      var map;
      var infoWindow;
      var service;

      function performSearch() {
        var request = {
          bounds: map.getBounds(),
          keyword: place_query
        };
        service.radarSearch(request, callback);
      }

      var places = new Array ();
      var total = 0;
      function callback(results, status) {
        total += results.length;

        var total_elem = document.getElementById('total');
        total_elem.innerHTML = total;

        if (status !== google.maps.places.PlacesServiceStatus.OK) {
          console.error(status);
          return;
        }
        for (var i = 0, result; result = results[i]; i++) {            
          addMarker(result);
          var place = result;
          service.getDetails(place, function(result, status) {
            function _getComponent(components, string, other, another) {
              var item = '';
              var i;
              for(i = 0; i < components.length; i++) {
                var component = components[i];
                if(component.types[0] == string || component.types[0] == other || component.types[0] == another) {
                  item = component['long_name'];
                }
              }
              if(i == components.length) {
                return item;
              }
            }
            var item = {
              place_id: result.place_id,
              nome: result.name,
              endereco: result.formatted_address,
              lat: result.geometry.location.lat(),
              lng: result.geometry.location.lng(),
              telefone: result.international_phone_number,
              url: result.url,
              website: result.website,
              rua: _getComponent(result.address_components, 'route'),
              rua_numero: _getComponent(result.address_components, 'street_number'),
              cidade: _getComponent(result.address_components, 'locality'),
              estado: _getComponent(result.address_components, 'administrative_area_level_1'),
              bairro: _getComponent(result.address_components, 'neighborhood', 'sublocality_level_1'),
              cep: _getComponent(result.address_components, 'postal_code'),
              pais: _getComponent(result.address_components, 'country'),
              rating: result.rating
            };
            places.push(item);
          });
        }
      }

      function enviaPlaces(places){
        var jsonString = $(places).serializeArray();
        $.ajax({        
         type: "POST",
         url: "places_to_db.php",
         data: { data : jsonString}
       }).fail(function( jqXHR, textStatus ) {
        alert( "Request failed: " + textStatus );
      }).done(function(e){
        alert('sucesso ' + e);
      });
    }
    document.getElementById('clickEnvia').addEventListener('click', function() {
      enviaPlaces(places);
    });


    function addMarker(place) {
      var marker = new google.maps.Marker({
        map: map,
        position: place.geometry.location,
        icon: {
          url: 'http://maps.gstatic.com/mapfiles/circle.png',
          anchor: new google.maps.Point(10, 10),
          scaledSize: new google.maps.Size(10, 17)
        }
      });

      google.maps.event.addListener(marker, 'click', function() {
        service.getDetails(place, function(result, status) {
          if (status !== google.maps.places.PlacesServiceStatus.OK) {
            console.error(status);
            return;
          }
          infoWindow.setContent('Place ID: ' + place.place_id + '<br>' + 'Name ' + result.name);
          infoWindow.open(map, marker);
        });
      });
    }
  }

  document.getElementById('search-button').addEventListener('click', function() {
    var city = document.getElementById('search-input').value.toLowerCase();
    var place_query = document.getElementById('search-place').value.toLowerCase();

    if(city && place_query) {
      var geocoder = new google.maps.Geocoder();
      geocoder.geocode({ 'address': city }, function(results, status) {
        console.log(results, 'fired');
        if (status == google.maps.GeocoderStatus.OK) {
          var coordinates = {
            lat: results[0].geometry.location.lat(),
            lng: results[0].geometry.location.lng()
          };
          initMap(coordinates, place_query);
        } else {
          alert('Something got wrong ' + status);
        }
      });
    } else {
      console.error('No city', 'No palce_query')
    }
  });