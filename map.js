	
        var map; //complex object of type OpenLayers.Map

        function init() {
          map = new OpenLayers.Map ("map", {
            //controls:[
				//new OpenLayers.Control.Navigation(),
				//new OpenLayers.Control.PanZoomBar(),
				//new OpenLayers.Control.LayerSwitcher(),
				//new OpenLayers.Control.Attribution()],
			  
            maxExtent: new OpenLayers.Bounds(-20037508.34,-20037508.34,20037508.34,20037508.34),
            maxResolution: 156543.0399,
            numZoomLevels: 19,
            units: 'm',
            projection: new OpenLayers.Projection("EPSG:900913"),
            displayProjection: new OpenLayers.Projection("EPSG:4326")
          } );

		  

          // Define the map layer
          // Here we use a predefined layer that will be kept up to date with URL changes
          layerMapnik = new OpenLayers.Layer.OSM.Mapnik("Mapnik");
          map.addLayer(layerMapnik);
          layerMarkers = new OpenLayers.Layer.Markers("Markers");
          map.addLayer(layerMarkers);

          
		  var gpxtrack="gpx/kalliotoolo.gpx";

			// Add "shadow" to Layer with the GPX Track
			var lgpxshadow = new OpenLayers.Layer.Vector("Display route", {
            strategies: [new OpenLayers.Strategy.Fixed()],
            protocol: new OpenLayers.Protocol.HTTP({
              url: gpxtrack,
              format: new OpenLayers.Format.GPX()
            }),
            style: {strokeColor: "rgba(50,50,50)", strokeWidth: 3, strokeOpacity: 0.4},
            projection: new OpenLayers.Projection("EPSG:4326")
          });
          map.addLayer(lgpxshadow);

          // Add the Layer with the GPX Track
          var lgpx = new OpenLayers.Layer.Vector("Display route", {
            strategies: [new OpenLayers.Strategy.Fixed()],
            protocol: new OpenLayers.Protocol.HTTP({
              url: gpxtrack,
              format: new OpenLayers.Format.GPX()
            }),
            style: {strokeColor: "rgba(156,0,255)", strokeWidth: 2, strokeOpacity: 0.8},
            projection: new OpenLayers.Projection("EPSG:4326")
          });
          map.addLayer(lgpx);


          //Add a marker for starting and end points  
          lgpx.events.register("loadend", lgpx, function() {
          this.map.zoomToExtent(this.getDataExtent());
          var startPoint = this.features[0].geometry.components[0];
          var endPoint = this.features[0].geometry.components[this.features[0].geometry.components.length - 1];
          var size = new OpenLayers.Size(21, 27);
          var offset = new OpenLayers.Pixel(-(size.w/2), -size.h);
          var starticon = new OpenLayers.Icon('images/startpointerpuikelo.png',size,offset);
          var finnishicon = new OpenLayers.Icon('images/finishpointerpuikelo.png',size,offset);
          layerMarkers.addMarker(new OpenLayers.Marker(new OpenLayers.LonLat(startPoint.x, startPoint.y),starticon));
          layerMarkers.addMarker(new OpenLayers.Marker(new OpenLayers.LonLat(endPoint.x, endPoint.y),finnishicon));
        });
          layerMarkers.setZIndex( 1001 );
          map.zoomToExtent(lgpx.getDataExtent());
        }
        