let mapOptions = {
    center: [46.627, 2.911],
    zoom: 7,
    minZoom: 2,
    maxZoom: 18,
};

let map = L.map('map', mapOptions);

let layer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');

rooms.forEach(room => {
  L.marker([room.latitude, room.longitude])
    .addTo(map)
    .bindPopup(`<b>${room.name}</b><br>${room.address}`);
});

map.addLayer(layer);