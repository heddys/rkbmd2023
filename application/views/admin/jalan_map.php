<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title>Peta Keberadaan Aset</title>

    <style>
      html,
      body,
      #viewDiv {
        padding: 0;
        margin: 0;
        height: 100%;
        width: 100%;
      }
    </style>

    <link rel="stylesheet" href="https://js.arcgis.com/4.26/esri/themes/light/main.css">
    <script src="https://js.arcgis.com/4.26/"></script>

    <script>
      require([
        "esri/config",
        "esri/Map",
        "esri/views/MapView",

        "esri/widgets/Search"
    ], function(esriConfig, Map, MapView, Search) {

        esriConfig.apiKey = "AAPKbdb7fc1930f34db8b7c5e6c303f1f68f3HDf8zMn7oayooQym5YdBIogv1y0q4y5z4FbrRtOLkxAPwmkPH8G-w7T4e3OSOxj";

        const map = new Map({
          basemap: "arcgis-imagery" // Basemap layer service
        });

        const view = new MapView({
          map: map,
          center: [112.7475295, -7.2586814], // Longitude, latitude
          zoom: 17, // Zoom level
          container: "viewDiv" // Div element
        });

        const search = new Search({  //Add Search widget
          view: view
        });

        view.ui.add(search, "top-right"); //Add to the map

      });
    </script>

  </head>
  <body>
    <div id="viewDiv"></div>
  </body>
</html>