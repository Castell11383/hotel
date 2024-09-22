import { Dropdown } from "bootstrap";
import L from 'leaflet';

const map = L.map('map', {
    center: [15.525158, -90.32959],
    zoom: 7,
    layers: []
});

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);


const markerLayer = L.layerGroup();

const icon = L.icon({
    iconUrl: './images/alfiler.png',
    iconSize: [35, 35]
});

L.marker([14.737479979733719, -91.1595963691584], {
    icon: icon
}).addTo(markerLayer);

markerLayer.addTo(map);