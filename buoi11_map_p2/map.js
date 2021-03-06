//Khởi tạo map
// setView( [lat,lng], zoom )
var _SelectedLayer;
var map = L.map('map').setView([15.838509, 108.373883], 14);
//Khởi tạo tile map
var Tilemap = L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.png', {
    maxZoom: 18,
    minZoom: 0
});
//add tilemap vào map
map.addLayer(Tilemap);

var vetinh = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
    maxZoom: 18,
    minZoom: 0
});

map.addLayer(vetinh);

var Basemap = {
    'Bản đồ 1': Tilemap,
    'Vệ tinh' : vetinh
}
var Overlayers = {};
//Tạo control
var Control = L.control.layers(Basemap,Overlayers, {position: 'topleft' ,  collapsed: false });
map.addControl(Control);


// add marker
var Marker = L.marker( [10.831223, 106.748009] ).bindPopup('Tôi là điểm số 1');
var Marker2 = L.marker( [10.851223, 106.748009] );
var Marker3 = L.marker( [10.881223, 106.748009] );
// add layer marker vào map
//map.addLayer(Marker);
//map.addLayer(Marker2);
//map.addLayer(Marker3);

var polygon = L.polygon([
    [10.786963, 106.727217 ],
    [10.730015, 106.836718],
    [10.8837343,106.7088433]
]).bindPopup('Tôi là polygon!');
//map.addLayer(polygon);


//Control.addOverlay(Marker, 'Điểm số 1');
//Control.addOverlay(Marker2, 'Điểm số 2');
//Control.addOverlay(Marker3, 'Điểm số 3');
//Control.addOverlay(polygon, 'Vùng');

// add layer from geoserver
var thuadat = L.tileLayer.betterWms('http://localhost:8080/geoserver/thuadatquangnam/wms' , {
    layers: 'thuadatquangnam:duynghia_quangnam',
    transparent: true,
    format: 'image/png',    
    tiled: true 
});
map.addLayer(thuadat);
Control.addOverlay(thuadat, 'Thửa đất');

// add data geoJSON 

var geojsonFeature = {
    "type": "Feature",
    "properties": {
        "name": "Duy nghĩa",
    },
    "geometry": {
        "type": "Point",
        "coordinates": [108.373883,15.838509]
    }
};
var geojsondata = L.geoJSON(geojsonFeature);
//map.addLayer(geojsondata);
//Control.addOverlay(geojsondata, 'Geojson');


var polygongeojson = [{
    "type": "Feature",
    "properties": {"party": "Republican"},
    "geometry": {
        "type": "Polygon",
        "coordinates": [[
            [108.359657,15.841784],
            [108.376867,15.853258],
            [108.3696358,  15.856092],
            [108.383484,15.832908]
        ]]
    }
}];

var geojsonpolygon = L.geoJSON(polygongeojson , {
    fillColor: 'blue',
    fillOpacity: 0.2
}).on('mouseover', function(e){
   
    geojsonpolygon.setStyle({
        color: 'red',
        opacity: 1,
        fillColor: 'blue',
        fillOpacity: 0.5,
        weight: 15
    })
}).on('mouseout', function(e){
    geojsonpolygon.resetStyle();
});
//map.addLayer(geojsonpolygon);
//custom icon marker
/* var Iconoption = L.icon(
    {
        iconUrl: 'icon/home.png',
        iconSize:     [30, 30]
    }
);
var marker = L.marker([15.838509, 108.373883], {icon: Iconoption}).addTo(map); */




//hàm để nhận kết quả trả về khi click;
function showinfo(data){
    // Chuyển đổi dữ liệu trả về sang kiểu dữ liệu JSON
    var jsondata = JSON.parse(data);
    // Lấy ra geoJSON của dữ liệu trả về.
    var feature = jsondata.features[0];
    //console.log(feature);

    //Nếu biến _SelectedLayer != undefined thì có nghĩa là nó đã được gán cho 1 layer nào đó rồi.
    if(_SelectedLayer != undefined){
        map.removeLayer(_SelectedLayer);
    }

    //Vẽ một lớp geojson
    _SelectedLayer = L.geoJSON(feature , {
        color: 'red'
    });
    map.addLayer(_SelectedLayer);


    //Show thuộc tính ra bảng.
    var Properties = feature.properties;
    console.log(Properties);
    var Table = '<table class="table table-hover header-fixed">';
    Table += '<thead>';
    Table += '<tr><th>Số hiệu tờ</th>   <th>Số hiệu thửa</th> <th>Diện tích</th> <th>Tên chủ sdđ</th> </tr>';
    Table += '</thead>';
    Table += '<tbody>';
    Table += '<tr>';
    Table += '<td>'+Properties.shbando+'</td>';
    Table += '<td>'+Properties.shthua+'</td>';
    Table += '<td>'+Properties.dientich+'</td>';
    Table += '<td>'+Properties.tenchusdd+'</td>';
    Table += '</tr>';
    Table += '</tbody>';
    Table += '</table>';
    
    var result = $('#kq'); 
    result.empty();   
    result.append(Table);
}