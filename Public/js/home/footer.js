function test(){
        checkHidden(),
        1000, 
        loadJScript();      
}
function checkHidden(){
    if($("#myModal").attr("aria-hidden"))
        return true;
    else
        return false;
}
//百度地图API功能
function loadJScript() {
    var script = document.createElement("script");
    script.type = "text/javascript";
    script.src = "http://api.map.baidu.com/api?v=1.4&callback=init";
    document.body.appendChild(script);
}
function init() {
    var map = new BMap.Map("allmap");            // 创建Map实例
    var point = new BMap.Point(121.61667,38.927461); // 创建点坐标
    // map.setCurrentCity("大连");          // 设置地图显示的城市 
    map.centerAndZoom(point,15);              
    // map.addControl(new BMap.MapTypeControl());   //添加地图类型控件
    var marker = new BMap.Marker(point);  // 创建标注
    map.addOverlay(marker);               // 将标注添加到地图中
    marker.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画
    // var label = new BMap.Label("众赢新业",{offset:new BMap.Size(20,-10)});
    // marker.setLabel(label);//此项是必须设置的  
    var label = new BMap.Label("大连众赢新业企业管理有限公司",{offset:new BMap.Size(20,-10)});
    marker.setLabel(label);
    map.enableScrollWheelZoom();                 //启用滚轮放大缩小
    // 添加带有定位的导航控件
    var navigationControl = new BMap.NavigationControl({
    // 靠左上角位置
    anchor: BMAP_ANCHOR_TOP_LEFT,
    // LARGE类型
    type: BMAP_NAVIGATION_CONTROL_LARGE,
    // 启用显示定位
    enableGeolocation: true
    });
    map.addControl(navigationControl);
    // 添加定位控件
    var geolocationControl = new BMap.GeolocationControl();
    geolocationControl.addEventListener("locationSuccess", function(e){
        // 定位成功事件
        var address = '';
        address += e.addressComponent.province;
        address += e.addressComponent.city;
        address += e.addressComponent.district;
        address += e.addressComponent.street;
        address += e.addressComponent.streetNumber;
        alert("当前定位地址为：" + address);
    });
    geolocationControl.addEventListener("locationError",function(e){
        // 定位失败事件
        alert(e.message);
    });
    map.addControl(geolocationControl);     
}  