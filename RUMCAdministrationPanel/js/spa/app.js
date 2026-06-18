'use strict';

(function () {
    function init() {
        var router = new Router([            
            new Route('createEvent', 'createEvent.php'),
            new Route('jobWithDoc', 'jobWithDoc.php'),
        ]);
    }
    init();
}());