
//Touch hover fix
$('a.col').on("touchend", function (e) {
    'use strict'; //satisfy code inspectors
    var link = $(this).last(); //preselect the link
    if (link.hasClass('hover')) {
        return true;
    }
    else {
        link.addClass('hover');
        $('a.col').not(this).removeClass('hover');
        e.preventDefault();
        return false; //extra, and to make sure the function has consistent return points
    }
});

/**
 * Created by thomas on 06/05/2017.
 */
