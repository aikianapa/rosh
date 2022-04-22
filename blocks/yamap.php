<view>
    <div class="map" id="map">
        <div wb-module="yamap" class="map-canvas contact" height="510" 
            geopos="{{yamap.0.geopos}}" center="{{yamap.0.geopos}}" 
            zoom="{{yamap.0.zoom}}" title="{{yamap.0.address}}">
        </div>
    </div>
</view>

<edit header="Яндекс карта">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
    <input name="yamap" wb-module="yamap" height="400">
</edit>