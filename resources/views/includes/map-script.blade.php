<script>
  var mymap = L.map('mapid').setView([1.4822795012983179, 124.86507303747182], 13);

  L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    // id: 'mapbox/streets-v11',
    // id: 'mapbox/satellite-streets-v11',
    // id: 'mapbox/satellite-v9',
    id: 'mapbox/dark-v10',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1IjoiamVuaWZlcmRhbWFyIiwiYSI6ImNrcTZrYXY2cDFzeXIyb280eTBndTAwMHMifQ.AAdI5SToEU4ITSvEqPcGIA'
  }).addTo(mymap);

  @foreach ($items as $item)
    var detail = '<img style="width: 200px;" src="{{ Storage::url($item->gambar->first()->path) }}"><p class="font-weight-bold">{{ $item->nama_lokasi }}.</p> <p>Kec. {{ $item->kecamatan }}.</p> <button class="btn btn-block btn-info btn-sm" data-toggle="modal" data-target="#detailModal-{{ $item->id }}">Lihat  Detail </button>';

    L.circle([{{ $item->latitude }}, {{ $item->longitude }}], 250, {

      @if ($item->tingkat_kerawanan == 'Tidak Rawan')
        color: '#6DE459',
        fillColor: '#6DE459',
      @elseif ($item->tingkat_kerawanan == 'Rawan Sedang')
        color: '#FFEA2C',
        fillColor: '#FFEA2C',
      @else
        color: '#FF4446',
        fillColor: '#FF4446',
      @endif

      fillOpacity: 0.7
    }).addTo(mymap).bindPopup(innerHTML = detail);
  @endforeach

  var popup = L.popup();

</script>