<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Crecimiento Urbano</title>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="images/INSUSvertical.png" type="image/png" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <link rel="stylesheet" href="css/leaflet.css">
        <link rel="stylesheet" href="css/qgis2web.css"><link rel="stylesheet" href="css/fontawesome-all.min.css">
        
        <link rel="stylesheet" href="lib/bootstrap4.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/estilos_login.css">
        <script src="lib/bootstrap4.5/js/bootstrap.min.js"></script>
        <script src="js/custom.min.js"></script>
        
        <style>
        html, body, #map {
            width: 100%;
            height: 97%;
            padding: 0;
            margin: 0;
            position: absolute;
        }
            
        .marcainsus{
            position:absolute;
            bottom: 50px;
            left: 30px;
            z-index: 500;
        }
            
            .centrado{
    margin-left: 25%;
    transform: translateX(-25%);
        </style>
        <title></title>
    </head>
    <body>
       <header>
       <nav class="navbar navbar-expand-lg logo">
             <img id="logoMexico" src="https://framework-gb.cdn.gob.mx/landing/img/logoheader.svg" width="128" height="48">
          
          <a class="navbar-brand centrado" href="#" style="color:white; font-weight: bold;">Identificación de Asentamientos Humanos Irregulares</a>
        </nav>   
    </header>
        <div id="map">
        <div class="marcainsus">
                <img src="images/INSUS_vertical_white.png" height="40">
            </div>
        </div>
        <script src="js/qgis2web_expressions.js"></script>
        <script src="js/leaflet.js"></script>
        <script src="js/multi-style-layer.js"></script>
        <script src="js/leaflet.rotatedMarker.js"></script>
        <script src="js/leaflet.pattern.js"></script>
        <script src="js/leaflet-hash.js"></script>
        <script src="js/Autolinker.min.js"></script>
        <script src="js/rbush.min.js"></script>
        <script src="js/labelgun.min.js"></script>
        <script src="js/labels.js"></script>
        <script src="data/LimiteMetropolitano_1.js"></script>
        <script src="data/LimiteMunicipal_2.js"></script>
        <script src="data/Crecimiento_2010_2020_3.js"></script>
        <script src="data/Crecimiento_2010_2015_4.js"></script>
        <script src="data/SueloConstruido2020_5.js"></script>
        <script src="data/SueloConstruido2015_6.js"></script>
        <script src="data/SueloConstruido2010_7.js"></script>
        <script src="data/Propuesta1_AHIP_8.js"></script>
        <script src="data/RezagoUrbanoSocial_9.js"></script>
        <script src="data/AsentamientosDispersos_10.js"></script>
        <script src="data/AsentamientosEnParcelasYTUC_11.js"></script>
        <script src="data/AsentamientosEnANP_12.js"></script>
        <script src="data/AsentamientosVulnerablesRiesgos_13.js"></script>
        <script src="data/AsentamientosSobreDerechoDeVia_14.js"></script>
        <script src="data/Propuesta_2_1.js"></script>
        <script src="data/ColoniasTecho_1.js"></script>
        <script src="data/ComunidadesTecho_2.js"></script>
        <script>
        var map = L.map('map', {
            zoomControl:true, maxZoom:28, minZoom:10
        }).fitBounds([[18.995667536298345,-100.21038313456161],[19.596693982522094,-99.04093565510998]]);
        var hash = new L.Hash(map);
        map.attributionControl.setPrefix('<a href="https://github.com/tomchadwin/qgis2web" target="_blank">qgis2web</a> &middot; <a href="https://leafletjs.com" title="A JS library for interactive maps">Leaflet</a> &middot; <a href="https://qgis.org">QGIS</a>');
        var autolinker = new Autolinker({truncate: {length: 30, location: 'smart'}});
        var bounds_group = new L.featureGroup([]);
        function setBounds() {
            map.setMaxBounds(map.getBounds());
        }
        map.createPane('pane_satellite_0');
        map.getPane('pane_satellite_0').style.zIndex = 400;
        var layer_satellite_0 = L.tileLayer('http://www.google.cn/maps/vt?lyrs=s@189&gl=cn&x={x}&y={y}&z={z}', {
            pane: 'pane_satellite_0',
            opacity: 1.0,
            attribution: '',
            minZoom: 1,
            maxZoom: 28,
            minNativeZoom: 0,
            maxNativeZoom: 18
        });
        layer_satellite_0;
        map.addLayer(layer_satellite_0);
        function pop_LimiteMetropolitano_1(feature, layer) {
            var popupContent = '<table>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['fid_1'] !== null ? autolinker.link(feature.properties['fid_1'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['CVE_SUN'] !== null ? autolinker.link(feature.properties['CVE_SUN'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['NOM_SUN'] !== null ? autolinker.link(feature.properties['NOM_SUN'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['Tipo'] !== null ? autolinker.link(feature.properties['Tipo'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['Tipo_N'] !== null ? autolinker.link(feature.properties['Tipo_N'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['CVE_ZM'] !== null ? autolinker.link(feature.properties['CVE_ZM'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['Municipios'] !== null ? autolinker.link(feature.properties['Municipios'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['MCS'] !== null ? autolinker.link(feature.properties['MCS'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['CF'] !== null ? autolinker.link(feature.properties['CF'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['MC'] !== null ? autolinker.link(feature.properties['MC'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['MEEG'] !== null ? autolinker.link(feature.properties['MEEG'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['MEPPU'] !== null ? autolinker.link(feature.properties['MEPPU'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['POB_2015'] !== null ? autolinker.link(feature.properties['POB_2015'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['P_2016'] !== null ? autolinker.link(feature.properties['P_2016'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['P_2017'] !== null ? autolinker.link(feature.properties['P_2017'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['P_2018'] !== null ? autolinker.link(feature.properties['P_2018'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['P_2019'] !== null ? autolinker.link(feature.properties['P_2019'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['P_2020'] !== null ? autolinker.link(feature.properties['P_2020'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['P_2021'] !== null ? autolinker.link(feature.properties['P_2021'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['P_2022'] !== null ? autolinker.link(feature.properties['P_2022'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['P_2023'] !== null ? autolinker.link(feature.properties['P_2023'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['P_2024'] !== null ? autolinker.link(feature.properties['P_2024'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['P_2025'] !== null ? autolinker.link(feature.properties['P_2025'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['P_2026'] !== null ? autolinker.link(feature.properties['P_2026'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['P_2027'] !== null ? autolinker.link(feature.properties['P_2027'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['P_2028'] !== null ? autolinker.link(feature.properties['P_2028'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['P_2029'] !== null ? autolinker.link(feature.properties['P_2029'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['P_2030'] !== null ? autolinker.link(feature.properties['P_2030'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_LimiteMetropolitano_1_0() {
            return {
                pane: 'pane_LimiteMetropolitano_1',
                opacity: 1,
                color: 'rgba(255,255,255,1.0)',
                dashArray: '',
                lineCap: 'square',
                lineJoin: 'bevel',
                weight: 3.0,
                fillOpacity: 0,
                interactive: false,
            }
        }
        function style_LimiteMetropolitano_1_1() {
            return {
                pane: 'pane_LimiteMetropolitano_1',
                opacity: 1,
                color: 'rgba(35,35,35,1.0)',
                dashArray: '10,5',
                lineCap: 'square',
                lineJoin: 'bevel',
                weight: 2.0,
                fillOpacity: 0,
                interactive: false,
            }
        }
        map.createPane('pane_LimiteMetropolitano_1');
        map.getPane('pane_LimiteMetropolitano_1').style.zIndex = 401;
        map.getPane('pane_LimiteMetropolitano_1').style['mix-blend-mode'] = 'normal';
        var layer_LimiteMetropolitano_1 = new L.geoJson.multiStyle(json_LimiteMetropolitano_1, {
            attribution: '',
            interactive: false,
            dataVar: 'json_LimiteMetropolitano_1',
            layerName: 'layer_LimiteMetropolitano_1',
            pane: 'pane_LimiteMetropolitano_1',
            onEachFeature: pop_LimiteMetropolitano_1,
            styles: [style_LimiteMetropolitano_1_0,style_LimiteMetropolitano_1_1,]
        });
        bounds_group.addLayer(layer_LimiteMetropolitano_1);
        map.addLayer(layer_LimiteMetropolitano_1);
        function pop_LimiteMunicipal_2(feature, layer) {
            var popupContent = '<table>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['CVEGEO'] !== null ? autolinker.link(feature.properties['CVEGEO'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['CVE_ENT'] !== null ? autolinker.link(feature.properties['CVE_ENT'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['CVE_MUN'] !== null ? autolinker.link(feature.properties['CVE_MUN'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['NOMGEO'] !== null ? autolinker.link(feature.properties['NOMGEO'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_LimiteMunicipal_2_0() {
            return {
                pane: 'pane_LimiteMunicipal_2',
                opacity: 1,
                color: 'rgba(255,255,255,1.0)',
                dashArray: '',
                lineCap: 'square',
                lineJoin: 'bevel',
                weight: 1.0,
                fillOpacity: 0,
                interactive: false,
            }
        }
        map.createPane('pane_LimiteMunicipal_2');
        map.getPane('pane_LimiteMunicipal_2').style.zIndex = 402;
        map.getPane('pane_LimiteMunicipal_2').style['mix-blend-mode'] = 'normal';
        var layer_LimiteMunicipal_2 = new L.geoJson(json_LimiteMunicipal_2, {
            attribution: '',
            interactive: false,
            dataVar: 'json_LimiteMunicipal_2',
            layerName: 'layer_LimiteMunicipal_2',
            pane: 'pane_LimiteMunicipal_2',
            onEachFeature: pop_LimiteMunicipal_2,
            style: style_LimiteMunicipal_2_0,
        });
        bounds_group.addLayer(layer_LimiteMunicipal_2);
        map.addLayer(layer_LimiteMunicipal_2);
        function pop_Crecimiento_2010_2020_3(feature, layer) {
            var popupContent = '<table>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['OBJECTID'] !== null ? autolinker.link(feature.properties['OBJECTID'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['Crec'] !== null ? autolinker.link(feature.properties['Crec'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['Shape_Leng'] !== null ? autolinker.link(feature.properties['Shape_Leng'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['Shape_Area'] !== null ? autolinker.link(feature.properties['Shape_Area'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_Crecimiento_2010_2020_3_0() {
            return {
                pane: 'pane_Crecimiento_2010_2020_3',
                stroke: false, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(0,55,0,0.7019607843137254)',
                interactive: false,
            }
        }
        map.createPane('pane_Crecimiento_2010_2020_3');
        map.getPane('pane_Crecimiento_2010_2020_3').style.zIndex = 403;
        map.getPane('pane_Crecimiento_2010_2020_3').style['mix-blend-mode'] = 'normal';
        var layer_Crecimiento_2010_2020_3 = new L.geoJson(json_Crecimiento_2010_2020_3, {
            attribution: '',
            interactive: false,
            dataVar: 'json_Crecimiento_2010_2020_3',
            layerName: 'layer_Crecimiento_2010_2020_3',
            pane: 'pane_Crecimiento_2010_2020_3',
            onEachFeature: pop_Crecimiento_2010_2020_3,
            style: style_Crecimiento_2010_2020_3_0,
        });
        bounds_group.addLayer(layer_Crecimiento_2010_2020_3);
        function pop_Crecimiento_2010_2015_4(feature, layer) {
            var popupContent = '<table>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['OBJECTID'] !== null ? autolinker.link(feature.properties['OBJECTID'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['Shape_Leng'] !== null ? autolinker.link(feature.properties['Shape_Leng'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['Shape_Area'] !== null ? autolinker.link(feature.properties['Shape_Area'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_Crecimiento_2010_2015_4_0() {
            return {
                pane: 'pane_Crecimiento_2010_2015_4',
                stroke: false, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(0,161,0,0.7019607843137254)',
                interactive: false,
            }
        }
        map.createPane('pane_Crecimiento_2010_2015_4');
        map.getPane('pane_Crecimiento_2010_2015_4').style.zIndex = 404;
        map.getPane('pane_Crecimiento_2010_2015_4').style['mix-blend-mode'] = 'normal';
        var layer_Crecimiento_2010_2015_4 = new L.geoJson(json_Crecimiento_2010_2015_4, {
            attribution: '',
            interactive: false,
            dataVar: 'json_Crecimiento_2010_2015_4',
            layerName: 'layer_Crecimiento_2010_2015_4',
            pane: 'pane_Crecimiento_2010_2015_4',
            onEachFeature: pop_Crecimiento_2010_2015_4,
            style: style_Crecimiento_2010_2015_4_0,
        });
        bounds_group.addLayer(layer_Crecimiento_2010_2015_4);
        function pop_SueloConstruido2020_5(feature, layer) {
            var popupContent = '<table>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['OBJECTID_1'] !== null ? autolinker.link(feature.properties['OBJECTID_1'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['OBJECTID_2'] !== null ? autolinker.link(feature.properties['OBJECTID_2'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['OBJECTID'] !== null ? autolinker.link(feature.properties['OBJECTID'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['Shape_Leng'] !== null ? autolinker.link(feature.properties['Shape_Leng'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['Shape_Le_1'] !== null ? autolinker.link(feature.properties['Shape_Le_1'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['Shape_Le_2'] !== null ? autolinker.link(feature.properties['Shape_Le_2'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['Shape_Area'] !== null ? autolinker.link(feature.properties['Shape_Area'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_SueloConstruido2020_5_0() {
            return {
                pane: 'pane_SueloConstruido2020_5',
                stroke: false, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(78,92,0,0.7019607843137254)',
                interactive: false,
            }
        }
        map.createPane('pane_SueloConstruido2020_5');
        map.getPane('pane_SueloConstruido2020_5').style.zIndex = 405;
        map.getPane('pane_SueloConstruido2020_5').style['mix-blend-mode'] = 'normal';
        var layer_SueloConstruido2020_5 = new L.geoJson(json_SueloConstruido2020_5, {
            attribution: '',
            interactive: false,
            dataVar: 'json_SueloConstruido2020_5',
            layerName: 'layer_SueloConstruido2020_5',
            pane: 'pane_SueloConstruido2020_5',
            onEachFeature: pop_SueloConstruido2020_5,
            style: style_SueloConstruido2020_5_0,
        });
        bounds_group.addLayer(layer_SueloConstruido2020_5);
        function pop_SueloConstruido2015_6(feature, layer) {
            var popupContent = '<table>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['OBJECTID'] !== null ? autolinker.link(feature.properties['OBJECTID'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['Shape_Leng'] !== null ? autolinker.link(feature.properties['Shape_Leng'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['Shape_Area'] !== null ? autolinker.link(feature.properties['Shape_Area'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_SueloConstruido2015_6_0() {
            return {
                pane: 'pane_SueloConstruido2015_6',
                stroke: false, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(156,183,0,0.7019607843137254)',
                interactive: false,
            }
        }
        map.createPane('pane_SueloConstruido2015_6');
        map.getPane('pane_SueloConstruido2015_6').style.zIndex = 406;
        map.getPane('pane_SueloConstruido2015_6').style['mix-blend-mode'] = 'normal';
        var layer_SueloConstruido2015_6 = new L.geoJson(json_SueloConstruido2015_6, {
            attribution: '',
            interactive: false,
            dataVar: 'json_SueloConstruido2015_6',
            layerName: 'layer_SueloConstruido2015_6',
            pane: 'pane_SueloConstruido2015_6',
            onEachFeature: pop_SueloConstruido2015_6,
            style: style_SueloConstruido2015_6_0,
        });
        bounds_group.addLayer(layer_SueloConstruido2015_6);
        function pop_SueloConstruido2010_7(feature, layer) {
            var popupContent = '<table>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['OBJECTID'] !== null ? autolinker.link(feature.properties['OBJECTID'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['Shape_Leng'] !== null ? autolinker.link(feature.properties['Shape_Leng'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['Shape_Area'] !== null ? autolinker.link(feature.properties['Shape_Area'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_SueloConstruido2010_7_0() {
            return {
                pane: 'pane_SueloConstruido2010_7',
                stroke: false, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(194,224,0,0.7019607843137254)',
                interactive: false,
            }
        }
        map.createPane('pane_SueloConstruido2010_7');
        map.getPane('pane_SueloConstruido2010_7').style.zIndex = 407;
        map.getPane('pane_SueloConstruido2010_7').style['mix-blend-mode'] = 'normal';
        var layer_SueloConstruido2010_7 = new L.geoJson(json_SueloConstruido2010_7, {
            attribution: '',
            interactive: false,
            dataVar: 'json_SueloConstruido2010_7',
            layerName: 'layer_SueloConstruido2010_7',
            pane: 'pane_SueloConstruido2010_7',
            onEachFeature: pop_SueloConstruido2010_7,
            style: style_SueloConstruido2010_7_0,
        });
        bounds_group.addLayer(layer_SueloConstruido2010_7);
        function pop_Propuesta1_AHIP_8(feature, layer) {
            var popupContent = '<table>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['OBJECTID'] !== null ? autolinker.link(feature.properties['OBJECTID'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['Shape_Leng'] !== null ? autolinker.link(feature.properties['Shape_Leng'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['Shape_Area'] !== null ? autolinker.link(feature.properties['Shape_Area'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['Tipo'] !== null ? autolinker.link(feature.properties['Tipo'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_Propuesta1_AHIP_8_0() {
            return {
                pane: 'pane_Propuesta1_AHIP_8',
                stroke: false, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(0,255,255,0.7019607843137254)',
                interactive: false,
            }
        }
        map.createPane('pane_Propuesta1_AHIP_8');
        map.getPane('pane_Propuesta1_AHIP_8').style.zIndex = 408;
        map.getPane('pane_Propuesta1_AHIP_8').style['mix-blend-mode'] = 'normal';
        var layer_Propuesta1_AHIP_8 = new L.geoJson(json_Propuesta1_AHIP_8, {
            attribution: '',
            interactive: false,
            dataVar: 'json_Propuesta1_AHIP_8',
            layerName: 'layer_Propuesta1_AHIP_8',
            pane: 'pane_Propuesta1_AHIP_8',
            onEachFeature: pop_Propuesta1_AHIP_8,
            style: style_Propuesta1_AHIP_8_0,
        });
        bounds_group.addLayer(layer_Propuesta1_AHIP_8);
        map.addLayer(layer_Propuesta1_AHIP_8);
            
            
        function pop_Propuesta_2_1(feature, layer) {
            var popupContent = '<table>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['OBJECTID'] !== null ? autolinker.link(feature.properties['OBJECTID'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['Tipo'] !== null ? autolinker.link(feature.properties['Tipo'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['Shape_Leng'] !== null ? autolinker.link(feature.properties['Shape_Leng'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['Shape_Area'] !== null ? autolinker.link(feature.properties['Shape_Area'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_Propuesta_2_1_0(feature) {
            switch(String(feature.properties['Tipo'])) {
                case 'Asentamientos no precarios':
                    return {
                pane: 'pane_Propuesta_2_1',
                stroke: false, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(255,188,116,0.7)',
                interactive: false,
            }
                    break;
                case 'Asentamientos sin especificar':
                    return {
                pane: 'pane_Propuesta_2_1',
                stroke: false, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(251,112,80,0.7)',
                interactive: false,
            }
                    break;
                case 'Asentamientos precarios':
                    return {
                pane: 'pane_Propuesta_2_1',
                stroke: false, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(103,0,13,0.7)',
                interactive: false,
            }
                    break;
            }
        }
        map.createPane('pane_Propuesta_2_1');
        map.getPane('pane_Propuesta_2_1').style.zIndex = 401;
        map.getPane('pane_Propuesta_2_1').style['mix-blend-mode'] = 'normal';
        var layer_Propuesta_2_1 = new L.geoJson(json_Propuesta_2_1, {
            attribution: '',
            interactive: false,
            dataVar: 'json_Propuesta_2_1',
            layerName: 'layer_Propuesta_2_1',
            pane: 'pane_Propuesta_2_1',
            onEachFeature: pop_Propuesta_2_1,
            style: style_Propuesta_2_1_0,
        });
        bounds_group.addLayer(layer_Propuesta_2_1);
            
            
        function pop_RezagoUrbanoSocial_9(feature, layer) {
            var popupContent = '<table>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['OBJECTID'] !== null ? autolinker.link(feature.properties['OBJECTID'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['GRADO'] !== null ? autolinker.link(feature.properties['GRADO'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['Shape_Leng'] !== null ? autolinker.link(feature.properties['Shape_Leng'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['Shape_Area'] !== null ? autolinker.link(feature.properties['Shape_Area'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_RezagoUrbanoSocial_9_0() {
            return {
                pane: 'pane_RezagoUrbanoSocial_9',
                stroke: false, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(207,103,0,0.7019607843137254)',
                interactive: false,
            }
        }
        map.createPane('pane_RezagoUrbanoSocial_9');
        map.getPane('pane_RezagoUrbanoSocial_9').style.zIndex = 409;
        map.getPane('pane_RezagoUrbanoSocial_9').style['mix-blend-mode'] = 'normal';
        var layer_RezagoUrbanoSocial_9 = new L.geoJson(json_RezagoUrbanoSocial_9, {
            attribution: '',
            interactive: false,
            dataVar: 'json_RezagoUrbanoSocial_9',
            layerName: 'layer_RezagoUrbanoSocial_9',
            pane: 'pane_RezagoUrbanoSocial_9',
            onEachFeature: pop_RezagoUrbanoSocial_9,
            style: style_RezagoUrbanoSocial_9_0,
        });
        bounds_group.addLayer(layer_RezagoUrbanoSocial_9);
        map.addLayer(layer_RezagoUrbanoSocial_9);
        function pop_AsentamientosDispersos_10(feature, layer) {
            var popupContent = '<table>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['consol'] !== null ? autolinker.link(feature.properties['consol'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_AsentamientosDispersos_10_0() {
            return {
                pane: 'pane_AsentamientosDispersos_10',
                stroke: false, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(0,0,255,0.7019607843137254)',
                interactive: false,
            }
        }
        map.createPane('pane_AsentamientosDispersos_10');
        map.getPane('pane_AsentamientosDispersos_10').style.zIndex = 410;
        map.getPane('pane_AsentamientosDispersos_10').style['mix-blend-mode'] = 'normal';
        var layer_AsentamientosDispersos_10 = new L.geoJson(json_AsentamientosDispersos_10, {
            attribution: '',
            interactive: false,
            dataVar: 'json_AsentamientosDispersos_10',
            layerName: 'layer_AsentamientosDispersos_10',
            pane: 'pane_AsentamientosDispersos_10',
            onEachFeature: pop_AsentamientosDispersos_10,
            style: style_AsentamientosDispersos_10_0,
        });
        bounds_group.addLayer(layer_AsentamientosDispersos_10);
        map.addLayer(layer_AsentamientosDispersos_10);
        function pop_AsentamientosEnParcelasYTUC_11(feature, layer) {
            var popupContent = '<table>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['Propiedad_'] !== null ? autolinker.link(feature.properties['Propiedad_'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_AsentamientosEnParcelasYTUC_11_0() {
            return {
                pane: 'pane_AsentamientosEnParcelasYTUC_11',
                stroke: false, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(255,0,255,0.7019607843137254)',
                interactive: false,
            }
        }
        map.createPane('pane_AsentamientosEnParcelasYTUC_11');
        map.getPane('pane_AsentamientosEnParcelasYTUC_11').style.zIndex = 411;
        map.getPane('pane_AsentamientosEnParcelasYTUC_11').style['mix-blend-mode'] = 'normal';
        var layer_AsentamientosEnParcelasYTUC_11 = new L.geoJson(json_AsentamientosEnParcelasYTUC_11, {
            attribution: '',
            interactive: false,
            dataVar: 'json_AsentamientosEnParcelasYTUC_11',
            layerName: 'layer_AsentamientosEnParcelasYTUC_11',
            pane: 'pane_AsentamientosEnParcelasYTUC_11',
            onEachFeature: pop_AsentamientosEnParcelasYTUC_11,
            style: style_AsentamientosEnParcelasYTUC_11_0,
        });
        bounds_group.addLayer(layer_AsentamientosEnParcelasYTUC_11);
        map.addLayer(layer_AsentamientosEnParcelasYTUC_11);
        function pop_AsentamientosEnANP_12(feature, layer) {
            var popupContent = '<table>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['FID'] !== null ? autolinker.link(feature.properties['FID'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['AHI'] !== null ? autolinker.link(feature.properties['AHI'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_AsentamientosEnANP_12_0() {
            return {
                pane: 'pane_AsentamientosEnANP_12',
                stroke: false, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(0,255,0,0.7019607843137254)',
                interactive: false,
            }
        }
        map.createPane('pane_AsentamientosEnANP_12');
        map.getPane('pane_AsentamientosEnANP_12').style.zIndex = 412;
        map.getPane('pane_AsentamientosEnANP_12').style['mix-blend-mode'] = 'normal';
        var layer_AsentamientosEnANP_12 = new L.geoJson(json_AsentamientosEnANP_12, {
            attribution: '',
            interactive: false,
            dataVar: 'json_AsentamientosEnANP_12',
            layerName: 'layer_AsentamientosEnANP_12',
            pane: 'pane_AsentamientosEnANP_12',
            onEachFeature: pop_AsentamientosEnANP_12,
            style: style_AsentamientosEnANP_12_0,
        });
        bounds_group.addLayer(layer_AsentamientosEnANP_12);
        map.addLayer(layer_AsentamientosEnANP_12);
        function pop_AsentamientosVulnerablesRiesgos_13(feature, layer) {
            var popupContent = '<table>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['Riesgo'] !== null ? autolinker.link(feature.properties['Riesgo'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_AsentamientosVulnerablesRiesgos_13_0() {
            return {
                pane: 'pane_AsentamientosVulnerablesRiesgos_13',
                stroke: false, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(255,0,0,0.7019607843137254)',
                interactive: false,
            }
        }
        map.createPane('pane_AsentamientosVulnerablesRiesgos_13');
        map.getPane('pane_AsentamientosVulnerablesRiesgos_13').style.zIndex = 413;
        map.getPane('pane_AsentamientosVulnerablesRiesgos_13').style['mix-blend-mode'] = 'normal';
        var layer_AsentamientosVulnerablesRiesgos_13 = new L.geoJson(json_AsentamientosVulnerablesRiesgos_13, {
            attribution: '',
            interactive: false,
            dataVar: 'json_AsentamientosVulnerablesRiesgos_13',
            layerName: 'layer_AsentamientosVulnerablesRiesgos_13',
            pane: 'pane_AsentamientosVulnerablesRiesgos_13',
            onEachFeature: pop_AsentamientosVulnerablesRiesgos_13,
            style: style_AsentamientosVulnerablesRiesgos_13_0,
        });
        bounds_group.addLayer(layer_AsentamientosVulnerablesRiesgos_13);
        map.addLayer(layer_AsentamientosVulnerablesRiesgos_13);
        function pop_AsentamientosSobreDerechoDeVia_14(feature, layer) {
            var popupContent = '<table>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['FID'] !== null ? autolinker.link(feature.properties['FID'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['AHIDV'] !== null ? autolinker.link(feature.properties['AHIDV'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_AsentamientosSobreDerechoDeVia_14_0() {
            return {
                pane: 'pane_AsentamientosSobreDerechoDeVia_14',
                stroke: false, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(255,255,0,0.8)',
                interactive: false,
            }
        }
        map.createPane('pane_AsentamientosSobreDerechoDeVia_14');
        map.getPane('pane_AsentamientosSobreDerechoDeVia_14').style.zIndex = 414;
        map.getPane('pane_AsentamientosSobreDerechoDeVia_14').style['mix-blend-mode'] = 'normal';
        var layer_AsentamientosSobreDerechoDeVia_14 = new L.geoJson(json_AsentamientosSobreDerechoDeVia_14, {
            attribution: '',
            interactive: false,
            dataVar: 'json_AsentamientosSobreDerechoDeVia_14',
            layerName: 'layer_AsentamientosSobreDerechoDeVia_14',
            pane: 'pane_AsentamientosSobreDerechoDeVia_14',
            onEachFeature: pop_AsentamientosSobreDerechoDeVia_14,
            style: style_AsentamientosSobreDerechoDeVia_14_0,
        });
        bounds_group.addLayer(layer_AsentamientosSobreDerechoDeVia_14);
        map.addLayer(layer_AsentamientosSobreDerechoDeVia_14);
            
            
        function pop_ColoniasTecho_1(feature, layer) {
            var popupContent = '<table>\
                    <tr>\
                        <td colspan="2">COLONIA '+ (feature.properties['NOMBRE'] !== null ? autolinker.link(feature.properties['NOMBRE'].toLocaleString()) : '')+'<br /></td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_ColoniasTecho_1_0() {
            return {
                pane: 'pane_ColoniasTecho_1',
                opacity: 1,
                color: 'rgba(255,255,255,1.0)',
                dashArray: '',
                lineCap: 'square',
                lineJoin: 'bevel',
                weight: 3.0,
                fillOpacity: 0,
                interactive: true,
            }
        }
        function style_ColoniasTecho_1_1() {
            return {
                pane: 'pane_ColoniasTecho_1',
                opacity: 1,
                color: 'rgba(160,26,26,1.0)',
                dashArray: '10,5',
                lineCap: 'square',
                lineJoin: 'bevel',
                weight: 2.0,
                fillOpacity: 0,
                interactive: true,
            }
        }
        map.createPane('pane_ColoniasTecho_1');
        map.getPane('pane_ColoniasTecho_1').style.zIndex = 451;
        map.getPane('pane_ColoniasTecho_1').style['mix-blend-mode'] = 'normal';
        var layer_ColoniasTecho_1 = new L.geoJson.multiStyle(json_ColoniasTecho_1, {
            attribution: '',
            interactive: true,
            dataVar: 'json_ColoniasTecho_1',
            layerName: 'layer_ColoniasTecho_1',
            pane: 'pane_ColoniasTecho_1',
            onEachFeature: pop_ColoniasTecho_1,
            styles: [style_ColoniasTecho_1_0,style_ColoniasTecho_1_1,]
        });
        bounds_group.addLayer(layer_ColoniasTecho_1);
            
            
        function pop_ComunidadesTecho_2(feature, layer) {
            var popupContent = '<table>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['Name'] !== null ? autolinker.link(feature.properties['Name'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_ComunidadesTecho_2_0() {
            return {
                pane: 'pane_ComunidadesTecho_2',
        rotationAngle: 0.0,
        rotationOrigin: 'center center',
        icon: L.icon({
            iconUrl: 'images/TechoChincheta.svg',
            iconSize: [22.799999999999997, 22.799999999999997]
        }),
                interactive: true,
            }
        }
        map.createPane('pane_ComunidadesTecho_2');
        map.getPane('pane_ComunidadesTecho_2').style.zIndex = 500;
        map.getPane('pane_ComunidadesTecho_2').style['mix-blend-mode'] = 'normal';
        var layer_ComunidadesTecho_2 = new L.geoJson(json_ComunidadesTecho_2, {
            attribution: '',
            interactive: true,
            dataVar: 'json_ComunidadesTecho_2',
            layerName: 'layer_ComunidadesTecho_2',
            pane: 'pane_ComunidadesTecho_2',
            onEachFeature: pop_ComunidadesTecho_2,
            pointToLayer: function (feature, latlng) {
                var context = {
                    feature: feature,
                    variables: {}
                };
                return L.marker(latlng, style_ComunidadesTecho_2_0(feature));
            },
        });
        bounds_group.addLayer(layer_ComunidadesTecho_2);
            
            
            
            
        var baseMaps = {};
        L.control.layers(baseMaps,{'<img src="legend/AsentamientosSobreDerechoDeVia_14.png" /> Asentamientos en derecho de vía': layer_AsentamientosSobreDerechoDeVia_14,'<img src="legend/AsentamientosVulnerablesRiesgos_13.png" /> Asentamientos vulnerables a riesgos': layer_AsentamientosVulnerablesRiesgos_13,'<img src="legend/AsentamientosEnANP_12.png" /> Asentamientos en Áreas Naturales Protegidas': layer_AsentamientosEnANP_12,'<img src="legend/AsentamientosEnParcelasYTUC_11.png" /> Asentamientos en parcelas y TUC': layer_AsentamientosEnParcelasYTUC_11,'<img src="legend/AsentamientosDispersos_10.png" /> Asentamientos Irregulares Dispersos': layer_AsentamientosDispersos_10,'<img src="legend/RezagoUrbanoSocial_9.png" /> Asentamientos con Rezago Urbano Social': layer_RezagoUrbanoSocial_9,'<img src="legend/Propuesta1_AHIP_8.png" /> AHI propuesta 1': layer_Propuesta1_AHIP_8,'Propuesta 2 AHI<br /><table><tr><td style="text-align: center;"><img src="legend/Propuesta_2_1_AsentamientosIrregularesnoprecarios0.png" /></td><td>Asentamientos Irregulares no precarios</td></tr><tr><td style="text-align: center;"><img src="legend/Propuesta_2_1_AsentamientosIrregularessinespecificar1.png" /></td><td>Asentamientos Irregulares sin especificar</td></tr><tr><td style="text-align: center;"><img src="legend/Propuesta_2_1_AsentamientosIrregularesprecarios2.png" /></td><td>Asentamientos Irregulares precarios</td></tr></table>': layer_Propuesta_2_1,'<img src="legend/SueloConstruido2010_7.png" /> Suelo Construido 2010': layer_SueloConstruido2010_7,'<img src="legend/SueloConstruido2015_6.png" /> Suelo Construido 2015': layer_SueloConstruido2015_6,'<img src="legend/SueloConstruido2020_5.png" /> Suelo Construido 2020': layer_SueloConstruido2020_5,'<img src="legend/Crecimiento_2010_2015_4.png" /> Crecimiento 2010-2015': layer_Crecimiento_2010_2015_4,'<img src="legend/Crecimiento_2010_2020_3.png" /> Crecimiento 2010-2020': layer_Crecimiento_2010_2020_3,'<img src="legend/ComunidadesTecho_2_1.png" height="16" /> Comunidades Techo': layer_ComunidadesTecho_2,'<img src="legend/ColoniasTecho_1.png" /> Colonias Techo': layer_ColoniasTecho_1,'<img src="legend/LimiteMunicipal_2.png" /> Límite Municipal': layer_LimiteMunicipal_2,'<img src="legend/LimiteMetropolitano_1.png" /> Límite Metropolitano': layer_LimiteMetropolitano_1,},{collapsed:false}).addTo(map);
        setBounds();
        </script>
    </body>
</html>
