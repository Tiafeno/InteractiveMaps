/* global mapsinteractive, google */

var res;
var MarkerObject = [];
var _TITLE_ = "Net Positive Impact Map";
var _TITLE_MARKER_ = "Marker Net POSITIVE IMPACT";

var Map;
var contentString;
var infowindow;
let Polys = ['senegal', 'madagascar', 'burkina_faso', 'haiti'];

let Markers = [];
let ObjetsMarker = [];



(function (angular) {
  var Options = {
    strokeWeight: 0,
    fillOpacity: 0.45,
    editable: true,
    draggable: true
  };

  var app = angular.module('MapsApp', ['ngMaterial', 'ngMessages', 'ngSanitize']);
  app.controller('AppCtrl', function ($scope, $http, $timeout, $mdSidenav, $window) {

    Map = new google.maps.Map(document.getElementById('map'), {
      zoom: 5,
      minZoom: 3,
      trafficButton: false,
      noClear: true,
      mapTypeControl: false,
      streetViewControl: false,
      mapType: 0,
      center: {
        lat: -18.9503343,
        lng: 48.0546989
      },
      styles: [
        {
          "featureType": "administrative.country",
          "elementType": "geometry.stroke",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "administrative.country",
          "elementType": "labels.icon",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "administrative.country",
          "elementType": "labels.text",
          "stylers": [
            {
              "saturation": 5
            },
            {
              "lightness": 35
            },
            {
              "visibility": "off"
            },
            {
              "weight": 0.5
            }
          ]
        }
      ]
    });


    $scope.allproducts = [];
    $scope.MarkerProjects = [];
    $scope.title ={geojson: _TITLE_, marker : _TITLE_MARKER_ };



    $scope.setEventMarkers = function (idMarker, infow) {
      contentString = '<div id="content">' +
      '<div id="siteNotice">' +
      '</div>' +
      '<h3 id="firstHeading" class="firstHeading" style="font-family: \'Trirong\', serif; line-height: 1.1; font-size:20px">' +
      ObjetsMarker[idMarker].__title + '</h3>' + '<div id="bodyContent">' +
      '<p style="font-family: \'Trirong\', serif">' + ObjetsMarker[idMarker].__desc + '</p>' +
      '</div>' +
      '</div>';

      ObjetsMarker[idMarker].__infowindow = new google.maps.InfoWindow({
        content: contentString,
        maxWidth: 200
      });

      ObjetsMarker[idMarker].addListener('click', function (e) {
        $scope.title.marker = ObjetsMarker[idMarker].__title;
        // Map.setZoom(10);
        // Map.setCenter(e.latLng);
        var post_id = ObjetsMarker[idMarker].__post_id;
        var win = $window.open($window.location.origin + "/projects/?post_id=" + post_id, "_blank");
        if(!win){
          console.log("Window Pop-up not accepte");
        }
      });

      ObjetsMarker[idMarker].addListener('mouseover', function (e) {
        ObjetsMarker[idMarker].__infowindow.open(Map, ObjetsMarker[idMarker]);
      });

      ObjetsMarker[idMarker].addListener('mouseout', function (e) {
        ObjetsMarker[idMarker].__infowindow.close();
      });
    };

    // Get markers in Database
    $scope.setMarkers = function () {
      $http({
        url: mapsinteractive.ajax_url,
        method: "POST",
        params: {action: 'action_get_markers_by_states', slug : mapsinteractive.in_page_slug}

      }).success(function (resp) {
        let y = resp;
        for(let i of y)
          Markers.push(i);

        if (Markers.length > 0) {
          Markers.forEach(function (el) {
            ObjetsMarker[el.id] = new google.maps.Marker({
              map: Map,
              draggable: false,
              animation: google.maps.Animation.DROP,
              position: el.position,
              icon: mapsinteractive.assets_plugins_url + 'img/marker.png'
            });
            ObjetsMarker[el.id].__id = el.id;
            ObjetsMarker[el.id].__post_id = el.post_id;
            ObjetsMarker[el.id].__title = el.title;
            ObjetsMarker[el.id].__desc = el.description;

            $scope.setEventMarkers(el.id);
          });

        }
      });


    };

    $scope.setMarkers(); // Set Markers
    $scope.toggleLeft = buildToggler('left');
    $scope.toggleRight = buildToggler('right');

    function buildToggler(componentId) {
      return function () {
        $mdSidenav(componentId).toggle();
      };
    }

  })
  .config(function ($mdThemingProvider, $interpolateProvider) {
    $interpolateProvider.startSymbol('[[').endSymbol(']]');

    // Configure a dark theme with primary foreground yellow
    $mdThemingProvider.theme('docs-dark', 'default')
    .primaryPalette('blue')
    .dark();
  });


  /*
  var deleteSelectedShape = function(){
  if (selectedShape) {
  selectedShape.setMap(null);
}
};
*/


})(window.angular);
