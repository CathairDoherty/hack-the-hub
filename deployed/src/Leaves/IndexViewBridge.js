var bridge = function (presenterPath) {
    window.rhubarb.viewBridgeClasses.ViewBridge.apply(this, arguments);
};

bridge.prototype = new window.rhubarb.viewBridgeClasses.ViewBridge();
bridge.prototype.constructor = bridge;

bridge.prototype.attachEvents = function () {
    var welcomescreen_slides = [
        {
            id: 'slide0',
            picture: '<div class="tutorialicon">♥</div>',
            text: 'Welcome to this tutorial. In the next steps we will guide you through a manual that will teach you how to use this app.'
        },
        {
            id: 'slide1',
            picture: '<div class="tutorialicon">✲</div>',
            text: 'This is slide 2'
        },
        {
            id: 'slide2',
            picture: '<div class="tutorialicon">♫</div>',
            text: 'This is slide 3'
        },
        {
            id: 'slide3',
            picture: '<div class="tutorialicon">☆</div>',
            text: 'Thanks for reading! Enjoy this app.<br><br><a id="tutorial-close-btn" href="#">End Tutorial</a>'
        }
    ];

    var options = {
        'bgcolor': '#0da6ec',
        'fontcolor': '#fff'
    };

    var welcomescreen = new Welcomescreen(welcomescreen_slides, options);


    var slideout = new Slideout({
        'panel': document.getElementById('panel'),
        'menu': document.getElementById('menu'),
        'padding': 256,
        'tolerance': 70
    });

    this.raiseServerEvent('getEvents', function(data) {
        debugger;
        if (data.length === 0) {
            if (console.error) {
                console.error('We have no location data');
            }
            return false;
        }
        var markersArray = [];
        $.each(data, function (key, value) {
            try {
                    if (value.Latitude && value.Longitude) {

                        markerUrl = options.marker;

                        var pos = new google.maps.LatLng(value.Latitude, value.Longitude);
                        var icon = new google.maps.MarkerImage(markerUrl, null, null, null, new google.maps.Size(34, 34));
                        var marker = new google.maps.Marker({
                                icon: icon,
                                position: pos,
                                map: window.map,
                                optimized: false,
                                animation:google.maps.Animation.DROP
                            }),

                            tweetImage = '',
                            tweetText = '',
                            onclick;
                        markersArray.push(marker);
                }
            }
            catch( ex )
            {
                console.log( ex );
            }
        });
    });


};

window.rhubarb.viewBridgeClasses.IndexViewBridge = bridge;