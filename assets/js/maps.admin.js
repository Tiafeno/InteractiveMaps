var MAP;
var base64_encode = window.btoa;
var base64_decode = window.atob;
let Markers = [];
let ObjetsMarker = [];

(function (angular) {
    var app = angular.module('AdminMaps', ['ngMaterial', 'ngMessages', 'ngSanitize'])
    .directive('uploadDirective', function (httpPostFactory) {
        return {
            restrict: 'AEC',
            link: function (scope, element, attr) {
                element.bind('change', function () {
                    var formData = new FormData();
                    formData.append('file', element[0].files[0]);
                    formData.append('action', 'action_upload_file');

                    // optional front-end logging
                    // var fileObject = element[0].files[0];
                    // scope.fileLog = {
                    //     'lastModified': fileObject.lastModified,
                    //     'lastModifiedDate': fileObject.lastModifiedDate,
                    //     'name': fileObject.name,
                    //     'size': fileObject.size,
                    //     'type': fileObject.type
                    // };
                    scope.$apply();

                     httpPostFactory(ajaxurl, formData, attr, function (callback) {
                        //console.log(callback);
                     });
                });

            }
        };
    })
    .factory('httpPostFactory', function ($http, $scope) {
        return function (_url, _data, attr, callback) {
            $http({
                url: _url,
                method: "POST",
                data: _data,
                headers: {
                    'Content-Type': undefined
                }
            }).success(function (response) {
                $scope.jsonFileurl = response;
                $scope.ObjectGeoJSON.forEach(function(element){
                    if(element.ID === attr.__id){
                        element.Link = response;
                    }
                });
                callback(response);
            });
        };
    })

    .controller('AdminMapsCtrl', function ($scope, $http, $timeout) {
        var imagePath = 'https://material.angularjs.org/latest/img/list/60.jpeg';

        $scope.Encrypt = function (str) {
            if (!str) str = "";
            str = (str == "undefined" || str == "null") ? "" : str;
            try {
                var key = 146;
                var pos = 0;
                ostr = '';
                while (pos < str.length) {
                    ostr = ostr + String.fromCharCode(str.charCodeAt(pos) ^ key);
                    pos += 1;
                }
                return ostr;
            } catch (ex) {
                return '';
            }
        };
        $scope.projects = [];
        $scope.$watch("projects", function(){

        }, true);

        $scope.LayerContent = [];
        $scope.states = [];
        $scope.$watch("states", function(){

        }, true);

//----------------------------------------- GeoJSON ----------------------------------------
        $scope.jsonFileurl = null;
        $scope.$watch("jsonFileurl", function(){

        }, true);

        $scope.ObjectGeoJSON = [];
        $scope.GeoJSON = function ($id) {
            this.__construct = function ($ID) {
                return $ID;
            };

            this.ID = this.__construct($id);
            this.Title = null;
            this.State = null;
            this.Zoom = 0;
            this.Lat = 0;
            this.Lng = 0;
            this.Link = "";

            this.Event = {
                addListener: function () {

                },

                Save: function ($index, $id) {
                    var $indent = $index;
                    $scope.ObjectGeoJSON.forEach(function (el) {
                        var $params = {};

                        if (el.ID == $id) {
                            $params.ID = el.ID;
                            $params.Title = el.Title;
                            $params.State = el.State;
                            $params.Zoom = el.Zoom;
                            $params.Lat = el.Lat;
                            $params.Lng = el.Lng;
                            $params.Link = el.Link;

                            $params.action = "action_add_geojson";
                            $params.post_id = maps.post_id;
                            $http({
                                url: ajaxurl,
                                method: "POST",
                                params: $params

                            }).success(function (resp) {
                                $scope.ObjectGeoJSON.splice($indent, 1);
                            }).error(function () {
                            });
                        }
                    });
                },
                Cancel: function ($index) {
                    $scope.ObjectGeoJSON.splice($index, 1);
                }
            };
            this.__Add = function () {
                $scope.ObjectGeoJSON.push(new $scope.GeoJSON(this.ID));
            }


        };
//----------------------------------------- MARKER ----------------------------------------
        $scope.ObjectMarkers = [];
        $scope.UIMarkers = [];
        $scope.Markers = function($id){
            this.__construct = function ($ID) {
                return $ID;
            };

            this.ID = this.__construct($id);
            this.Title = null;
            this.Description = null;
            this.Lat = 0;
            this.Lng = 0;
            this.project_id = null;
            this.__Add = function () {
                $scope.UIMarkers.push(new $scope.Markers(this.ID));
            };

            this.Event = {
                Save : function($index,$id){
                    var $indent = $index;
                    $scope.UIMarkers.forEach(function (el) {
                        var $params = {};

                        if (el.ID == $id) {
                            $params.Title = el.Title;
                            $params.Lat = el.Lat;
                            $params.Lng = el.Lng;
                            $params.Description = el.Description;

                            $params.action = "action_add_marker";
                            $params.post_id = maps.post_id;
                            $params.project_id = el.project_id;
                            $http({
                                url: ajaxurl,
                                method: "POST",
                                params: $params

                            }).success(function (resp) {
                              //---------------- Add Marker in the Map
                              ObjetsMarker[el.ID] = new google.maps.Marker({
                                  map: MAP,
                                  draggable: false,
                                  animation: google.maps.Animation.DROP,
                                  position: el.position,
                                  icon: maps.assets_plugins_url + 'img/marker.png'
                              });
                              ObjetsMarker[el.ID].__id = el.ID;
                              ObjetsMarker[el.ID].__post_ids = el.post_ids;
                              ObjetsMarker[el.ID].__title = el.Title;
                              ObjetsMarker[el.ID].__desc = el.Description;

                              //---------------- Splice this in UIMarkers, for save
                              $scope.UIMarkers.splice($indent, 1);


                            }).error(function () {
                            });
                        }
                    });
                },

                Cancel : function($index){
                    $scope.UIMarkers.splice($index, 1);
                }
            }
        };


        $scope.people = [
            { name: 'Janet Perkins', img: 'img/100-0.jpeg', newMessage: true },
            { name: 'Mary Johnson', img: 'img/100-1.jpeg', newMessage: false },
            { name: 'Peter Carlsson', img: 'img/100-2.jpeg', newMessage: false }
        ];

        $scope.editLayer = function () {
            console.log($scope.LayerContent);
        };
        $scope.$watch("LayerContent", $scope.editLayer, true);

        $scope.action_set_marker_map = function(){
            $http({
                url: ajaxurl,
                method: "POST",
                params: {action: 'action_get_markers', post_id : maps.post_id}

            }).success(function (resp) {
                let y = resp;
                for(let i of y)
                    Markers.push(i);

                Markers.forEach(function(el){
                    ObjetsMarker[el.id] = new google.maps.Marker({
                        map: MAP,
                        draggable: false,
                        animation: google.maps.Animation.DROP,
                        position: el.position,
                        icon: maps.assets_plugins_url + 'img/marker.png'
                    });
                    ObjetsMarker[el.id].__id = el.id;
                    ObjetsMarker[el.id].__post_ids = el.post_ids;
                    ObjetsMarker[el.id].__title = el.title;
                    ObjetsMarker[el.id].__desc = el.description;
                });
            });
        };

        $scope.__init__ = function () {
            $http({
                url: ajaxurl,
                method: "POST",
                params: {action: "action_get_terms_product_cat"}

            }).success(function (resp) {
                let p = resp;
                for (let i of p) {
                    $scope.states.push({name: i.name, slug: i.slug});
                }
                //console.log($scope.states);

            });

            $http({
                url: ajaxurl,
                method: "POST",
                params: {action: 'action_get_projects'}

            }).success(function (resp) {
              console.log(resp);
                $scope.projects =  resp;

            });
            //___________________________________
            $scope.action_set_marker_map();
        };

        $scope.__init__();

        $scope.addLayer = function () {
            var i = {
                    ID: "",
                    title: "",
                    state: "",
                    description: "",
                    link: "",
                    zoom: null,
                    lat: null,
                    lng: null
                },
                nbr = Math.random(10) % 5 * 2;
            i.ID = $scope.Encrypt(String(nbr));
            $scope.LayerContent.push(i);
        };

        $scope.addMarker = function () {
            var $id = base64_encode(String(Math.random(10) % 5 * 2));
            $scope.UIMarkers.push(new $scope.Markers($id));
        };

        $scope.addGeoJson = function () {
            var $id = base64_encode(String(Math.random(10) % 5 * 2));
            $scope.ObjectGeoJSON.push(new $scope.GeoJSON($id));
        };

        $scope.deleteLayer = function (index) {
            $scope.LayerContent.splice(index, 1);
        };

        $scope.saveLayer = function (index, id) {
            var j = index;
            $scope.LayerContent.forEach(function (el) {
                if (el.ID == id) {
                    el.action = "action_add_geojson";
                    el.post_id = maps.post_id;
                    $http({
                        url: ajaxurl,
                        method: "POST",
                        params: el

                    }).success(function (resp) {
                        $scope.deleteLayer(j);

                    }).error(function () {
                    });
                }
            });
        };

        MAP = new google.maps.Map(document.getElementById('adminmaps'), {
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
                    featureType: 'all',
                    stylers: [
                        {saturation: -80}
                    ]
                },
                {
                    featureType: "administrative.country",
                    elementType: "labels",
                    stylers: [
                        {visibility: "on"}
                    ]
                },
                {
                    "featureType": "administrative.country",
                    "elementType": "geometry",
                    "stylers": [
                        {"visibility": "simplified"},
                        {"weight": 0.1},
                        {"saturation": -62}
                    ]
                }
            ]
        });


    })
        .config(function ($mdThemingProvider, $interpolateProvider) {
            $interpolateProvider.startSymbol('[[').endSymbol(']]');
            $mdThemingProvider.theme('docs-dark', 'default')
                .primaryPalette('blue')
                .dark();

        });
})(window.angular);
