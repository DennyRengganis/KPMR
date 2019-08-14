var CACHE_NAME = "pwa-v" + new Date().getTime();
var urlsToCache = [
    './offline',
    './css/app.css',
    './js/app.js',
    './images/icons/icon-72x72.png',
    './images/icons/icon-96x96.png',
    './images/icons/icon-128x128.png',
    './images/icons/icon-144x144.png',
    './images/icons/icon-152x152.png',
    './images/icons/icon-192x192.png',
    './images/icons/icon-384x384.png',
    './images/icons/icon-512x512.png',
];

// Cache on install
self.addEventListener('install', function(event) {
    // Perform install steps
    event.waitUntil(
        caches.open(CACHE_NAME)
        .then(function(cache) {
            console.log('Opened cache '+CACHE_NAME);
            return cache.addAll(urlsToCache);
        })
        .catch(function(e) {
            console.log('Error from caches open', e);
        })
    )
});

self.addEventListener('fetch', function(event) {
    event.respondWith(
      caches.match(event.request)
        .then(function(response) {
          // Cache hit - return response
          if (response) {
                console.log('got it from cache', event.request);
                return response;
          }
          return fetch(event.request);
        }
      )
    );
  });
  
self.addEventListener("activate", function(event) {  
    event.waitUntil(
        caches.keys().then(function(cacheNames) {
            return Promise.all(
                cacheNames.map(function(cacheName) {          
                    if (CACHE_NAME !== cacheName) {
                        return caches.delete(cacheName);          
                    }        
                })      
            );    
        })  
    );
});