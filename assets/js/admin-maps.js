/**
 * Created by Tiafeno on 14/08/2016.
 */

var selectedShape;
var Map;

jQuery.noConflict();
jQuery(function ($) {


    $('document').ready(function () {

        Map = new google.maps.Map(document.getElementById('mapsinteractive'), {
            zoom: 3,
            minZoom:3,
            trafficButton: false,
            noClear:true,
            mapTypeControl: false,
            streetViewControl: false,
            mapType:0,
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
                    /*
                     administrative.country selects countries.
                     administrative.land_parcel selects land parcels.
                     administrative.locality selects localities.
                     administrative.neighborhood selects neighborhoods.
                     administrative.province selects provinces.
                     */
                    featureType: "administrative.country",
                    elementType: "labels",
                    stylers: [
                        { visibility: "off" }
                    ]
                },
                {
                    "featureType": "administrative.country",
                    "elementType": "geometry",
                    "stylers": [
                    { "visibility": "simplified" },
                    { "weight": 0.1 },
                    { "saturation": -62 }
                    ]
                }
            ]
        });

        function clearSelection () {
            if (selectedShape) {
                selectedShape.setEditable(false);
                selectedShape = null;
            }
        }
        function setSelection (shape) {
            clearSelection();
            selectedShape = shape;
            shape.setEditable(true);
            //selectColor(shape.get('fillColor') || shape.get('strokeColor'));
        }
        function deleteSelectedShape () {
            /*if (selectedShape) {
             selectedShape.setMap(null);
             }*/
        }

        var Options = {
            strokeWeight: 0,
            fillOpacity: 0.45,
            editable: true,
            draggable: true
        };
        // Creates a drawing manager attached to the map that allows the user to draw
        // markers, lines, and shapes.

        var drawingManager = new google.maps.drawing.DrawingManager({
            drawingMode: google.maps.drawing.OverlayType.POLYGON,
            drawingControl: true,
            drawingControlOptions: {
                position: google.maps.ControlPosition.TOP_CENTER,
                drawingModes: ['marker', 'circle', 'polygon', 'polyline', 'rectangle']
            },
            markerOptions: {
                icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
                draggable: true
            },
            polylineOptions: {
                editable: true,
                draggable: true
            },
            rectangleOptions: Options,
            circleOptions: Options,
            polygonOptions: Options,
            map: Map
        });

        google.maps.event.addListener(drawingManager, 'overlaycomplete', function (e) {
            if (e.type !== google.maps.drawing.OverlayType.MARKER) {
                // Switch back to non-drawing mode after drawing a shape.
                drawingManager.setDrawingMode(null);
                // Add an event listener that selects the newly-drawn shape when the user
                // mouses down on it.
                var newShape = e.overlay;
                newShape.type = e.type;

                google.maps.event.addListener(newShape, 'click', function (e) {
                    if (e.vertex !== undefined) {
                        if (newShape.type === google.maps.drawing.OverlayType.POLYGON) {
                            var path = newShape.getPaths().getAt(e.path);

                            path.removeAt(e.vertex);
                            if (path.length < 3) {
                                newShape.setMap(null);
                            }
                        }
                        if (newShape.type === google.maps.drawing.OverlayType.POLYLINE) {
                            var path = newShape.getPath();
                            path.removeAt(e.vertex);
                            if (path.length < 2) {
                                newShape.setMap(null);
                            }
                        }
                    }
                    setSelection(newShape);
                });
                setSelection(newShape);
            }
        });




    });
});






