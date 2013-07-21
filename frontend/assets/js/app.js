console.log('app booted');
_locationCard = new locationCard();


var readyStateCheckInterval = setInterval(function() {
    if (document.readyState === "complete") {
        _locationCard.init();
        clearInterval(readyStateCheckInterval);
    }
}, 10);

