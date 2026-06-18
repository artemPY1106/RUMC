'use strict';

(function () {
    function init() {
        var router = new Router([            
            new Route('basicInformation', 'basicInformation.php'),
            new Route('education', 'education.php'),
            new Route('careerGuidance', 'careerGuidance.php'),
            new Route('events', 'events.php'),
            new Route('partners', 'partners.php'),
            new Route('accessibleEnvironment', 'accessibleEnvironment.php'),
            new Route('courses', 'courses.php'),
        ]);
    }
    init();
}());