var page = require('webpage').create();
page.open('https://azscore.com/live', function() {
    setTimeout(function() {
        phantom.exit();
    }, 200);
});