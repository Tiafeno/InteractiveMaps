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


let PolyPro = [
    {
        name: 'Népal',
        slug: 'nepal',
        products: [],
        data: {zoom: 7, lat: 28.340647553430923, lng: 81.8646240234375}
    },
    {
        name: 'Madagascar',
        slug: 'madagascar',
        products: [],
        data: {zoom: 6, lat: -18.810145482371475, lng: 44.232757125000056}
    },
    {
        name: 'Haïti',
        slug: 'haiti',
        products: [],
        data: {zoom: 8, lat: 19.004996642802364, lng: -74.3389892578125}
    },
    {
        name: 'Sénégal',
        slug: 'senegal',
        products: [],
        data: {zoom: 7, lat: 14.469227827447636, lng: -16.76333662499996}
    },
    {
        name: 'Burkina Faso',
        slug: 'burkina_faso',
        products: [],
        data: {zoom: 7, lat: 12.213836224176072, lng: -4.0301823281249805}
    }
];

let PolyKML = {};

(function (angular) {
    var Options = {
        strokeWeight: 0,
        fillOpacity: 0.45,
        editable: true,
        draggable: true
    };

    var app = angular.module('MapsApp', ['ngMaterial', 'ngMessages', 'ngSanitize']);
    app.controller('AppCtrl', function ($scope, $http, $timeout, $mdSidenav) {
        jQuery("#dialog-maps").draggable();
        jQuery("#map").css('height', jQuery(window).height());

        jQuery(window).resize(function () {
            jQuery("#map").css('height', jQuery(window).height());

        });

        Map = new google.maps.Map(document.getElementById('map'), {
            zoom: 3,
            minZoom: 3,
            trafficButton: false,
            noClear: true,
            mapTypeControl: false,
            streetViewControl: false,
            mapType: 0,
            center: {
                lat: 17.539022,
                lng: 17.345224
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
//
//        Map.addListener('dragend', function () {
//            console.log(Map.getZoom());
//            var k = Map.getCenter();
//            console.log('lat: '+k.lat()+' - lng: '+k.lng());
//        });
        $scope.products = [];
        $scope.allproducts = [];
        $scope.MarkerProjects = [];
        $scope.states = PolyPro;
        $scope.state = null;
        $scope.title ={geojson: _TITLE_, marker : _TITLE_MARKER_ };

        $scope.$watch("products", function () {

        }, true);

        $scope.setProductbyState = function () {
            $scope.products = [];
            if ($scope.state !== null) {
                for (let x of $scope.allproducts) {
                    if (x.city === false)
                        continue;
                    for (let y of x.city) {
                        if ($scope.state === y.slug) {
                            $scope.products.push(x);
                            break;
                        }
                    }
                }

                Map.data.forEach(function (feature) {
                    if ($scope.state === feature.getProperty('slug')) {
                        Map.data.revertStyle();
                        Map.data.overrideStyle(feature, {fillColor: '#72B01D',
                            strokeColor: '#72B01D',
                            strokeOpacity: 0.5
                        });
                    }
                });
                $scope.setZoomCity();
            }
        };

        $scope.$watch("state", $scope.setProductbyState, true);

        $scope.setEventMarkers = function (idMarker, infow) {
            contentString = '<div id="content">' +
                    '<div id="siteNotice">' +
                    '</div>' +
                    '<h3 id="firstHeading" class="firstHeading" style="font-family: \'Trirong\', serif; line-height: 1.1; font-size:20px">' + ObjetsMarker[idMarker].__title + '</h3>' +
                    '<div id="bodyContent">' +
                    '<p style="font-family: \'Trirong\', serif">' + ObjetsMarker[idMarker].__desc + '</p>' +
                    '</div>' +
                    '</div>';

            ObjetsMarker[idMarker].__infowindow = new google.maps.InfoWindow({
                content: contentString,
                maxWidth: 200
            });

            ObjetsMarker[idMarker].addListener('click', function (e) {
                $scope.title.marker = ObjetsMarker[idMarker].__title;
                Map.setZoom(10);
                Map.setCenter(e.latLng);

                $http({
                    url: mapsinteractive.ajax_url,
                    method: "POST",
                    params: {action: "action_getProjectbyArray",
                    ids : JSON.stringify(ObjetsMarker[idMarker].__post_ids)}

                }).success(function (resp) {
                    $scope.MarkerProjects = [];
                    if (parseInt(resp) === 0)
                        return;
                    $mdSidenav('right').open().then(function () {});
                    let j = resp;
                    for(let k of j){
                      $scope.MarkerProjects.push(k);
                    }
                    console.log($scope.MarkerProjects);
                }).error(function () {

                });
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
                params: {action: 'action_get_markers', post_id : mapsinteractive.post_id}

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
                        ObjetsMarker[el.id].__post_ids = el.post_ids; // Array of Project id
                        ObjetsMarker[el.id].__title = el.title;
                        ObjetsMarker[el.id].__desc = el.description;

                        $scope.setEventMarkers(el.id);

                    });

                }
            });


        };

        $scope.setMarkers();

        $scope.setEventJSON = function () {
            Map.data.addListener('mouseover', function (event) {
                Map.data.revertStyle();
                Map.data.overrideStyle(event.feature, {
                    fillColor: '#72B01D',
                    strokeColor: '#72B01D',
                    strokeOpacity: 0.5
                });
            });

            Map.data.addListener('click', function (event) {
                if ($scope.state === event.feature.getProperty('slug'))
                    $scope.setZoomCity();

                $scope.state = event.feature.getProperty('slug');
                $scope.$apply();

                Map.data.revertStyle();
                Map.data.overrideStyle(event.feature, {
                    fillColor: '#72B01D',
                    strokeColor: '#72B01D',
                    strokeOpacity: 0.5
                });
                $mdSidenav('left').open().then(function () {

                });
            });

            Map.data.addListener('mouseout', function (event) {
                if ($scope.state != event.feature.getProperty('slug'))
                    Map.data.revertStyle();
            });
        };
        $scope.setJSONLayer = function () {
            var geojson;

            for (let Poly of Polys) {
                geojson = mapsinteractive.assets_plugins_url + 'datalayer/' + Poly + '.json';
                Map.data.loadGeoJson(geojson);
                Map.data.setStyle(function (feature) {
                    var color = 'gray';
                    if (feature.getProperty('isColorful')) {
                        color = feature.getProperty('color');
                    }
                    return /** @type {google.maps.Data.StyleOptions} */({
                        fillColor: '#005199',
                        strokeColor: '#005199',
                        strokeWeight: 1
                    });
                });
                $scope.setEventJSON();
            }

        };

        $scope.setJSONLayer();

        $scope.__init__ = function () {
            Map.setCenter(new google.maps.LatLng(17.539022, 17.345224));
            Map.setZoom(3);
            $scope.title.geojson = _TITLE_;
            $scope.state = null;

            Map.data.revertStyle();
        };

        $scope.__initMap = function () {
            $http({
                url: mapsinteractive.ajax_url,
                method: "POST",
                params: {action: "action_get_products"}

            }).success(function (resp) {
                if (parseInt(resp) === 0)
                    return;
                let city = resp;
                for (let x of city) {
                    $scope.allproducts.push(x);
                }

            });

        };

        $scope.setZoomCity = function () {
            for (let p of PolyPro) {
                if ($scope.state === p.slug) {
                    var LatLng = new google.maps.LatLng({
                        lat: p.data.lat,
                        lng: p.data.lng
                    });
                    Map.setZoom(p.data.zoom);
                    Map.setCenter(LatLng);
                    $scope.title.geojson = p.name;
                    break;
                }
            }

        };


        $scope.__initMap();

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
