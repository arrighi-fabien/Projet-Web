const PREFIX = "V1"; // cache name prefix (e.g. V1, V2, etc.)
const OFFLINE_PAGES = [
    "/error-internet",
    "/css/style.css",
    "/js/script.js",
    "/img/logo.webp",
    "/img/background1.webp",
    "/img/background2.webp",
    "/img/sprite.svg",
]; // list of offline pages to cache (e.g. /offline.html, style.css, etc.)

/*
 * The install handler takes care of precaching the resources we always need.
 */
self.addEventListener("install", (event) => {
    self.skipWaiting(); // Activate immediately without waiting for the page to reload
    event.waitUntil(
        (async () => {
            const cache = await caches.open(PREFIX);
            await Promise.all(
                OFFLINE_PAGES.map((page) => {
                    return cache.add(new Request(`${page}`)); // put the offline pages in the cache
                })
            );
        })()
    );
    console.log(`Service Worker ${PREFIX} installed`);
});

/*
 * The activate handler takes care of cleaning up old caches.
 */
self.addEventListener("activate", (event) => {
    clients.claim(); // Activate immediately without waiting for the page to reload
    /*event.waitUntil(
        (async () => {
            const keys = await caches.keys();
            await Promise.all(
                keys.map((key) => {
                    if (!key.includes(PREFIX)) {
                        return caches.delete(key);
                    }
                })
            );
        })()
    );*/
    console.log(`Service Worker ${PREFIX} activated`);
});

/*
 *
 */

self.addEventListener("fetch", function (event) {
    console.log(
        `Service Worker ${PREFIX} fetch ${event.request.url}, mode: ${event.request.mode}`
    );
    let $url_Path = new URL(event.request.url).pathname;
    if (OFFLINE_PAGES.includes($url_Path)) {
        event.respondWith(caches.match(event.request)); // return the cached version of the file if it exists
    } else if (event.request.mode === "navigate") {
        console.log("Navigate request");
        console.log(event.request.url);
        event.respondWith(
            (async () => {
                try {
                    const preloadedResponse = await event.preloadResponse;
                    if (preloadedResponse) {
                        return preloadedResponse;
                    }
                    return await fetch(event.request);
                } catch (error) {
                    // return the offline page if the fetch fails
                    const cache = await caches.open(PREFIX);
                    return await cache.match(OFFLINE_PAGES[0]);
                }
            })()
        );
    }
});