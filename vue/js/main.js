$( document ).ready(function() {

  //Déclenchement de l'effet de hover en tactile
  $('a.col').on("touchend", function (e) {
    var link = $(this).last();
    if (link.hasClass('hover')) {
      return true;
    }
    else {
      link.addClass('hover');
      $('a.col').not(this).removeClass('hover');
      e.preventDefault();
      return false;
    }
  });

  //Petit message en console pour la 3WA
  document.onmousedown = function(event) {
    if (event.which == 3) { /*Click droit*/
        console.log("Bonjour 3WA !");
    }
  }

});


/**
 * Created by thomas on 06/05/2017.
 */
