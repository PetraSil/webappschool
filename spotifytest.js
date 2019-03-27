var SpotifyWebApi = require('spotify-web-api-node');

// credentials are optional
var spotifyApi = new SpotifyWebApi({
  clientId: '528f0a4643bb4f5d993cbc80941dda7a',
  clientSecret: '831367eceeb742158b27c103fdad7725',
  redirectUri: 'http://127.0.0.1:5500/spotifytest.html'
});