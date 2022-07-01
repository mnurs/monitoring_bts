@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="row"> 
          <div id="map" style="width: 100%; height: 600px;"></div>
        </div> 
    </div>

@push('page_scripts')
<script src="https://maps.google.com/maps/api/js?sensor=false"></script>
<script> 
var LocationsForMap = [];

    @foreach($bts as $data)
      LocationsForMap.push(["{{$data->nama}}",{{$data->latitude}},{{$data->longitude}}]);
    @endforeach

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 2,
      center: new google.maps.LatLng(28.704, 77.25),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < LocationsForMap.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(LocationsForMap[i][1], LocationsForMap[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(LocationsForMap[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
</script>
@endpush
@endsection