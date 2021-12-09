var map = L.map('map').setView([49.5011558, 0.1464804], 13);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution:
    '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
}).addTo(map);

L.marker([49.5011558, 0.1464804])
  .addTo(map)
  .bindPopup(
    'Notre cabinet<br>15 Rue de Verdun<br>76600 Le Havre<br>Easily customizable.'
  )
  .openPopup();
