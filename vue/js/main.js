// Objet chargé d'activé l'effet de hover et de forcer à taper deux fois sur les liens images sur écrans tactiles
var tactileHoverEffect = {
  links: '',
  start: function () {
    this.links = document.querySelectorAll('a.col');
    
    this.toggleHoverEffect = this.toggleHoverEffect.bind(this);
    this.disableAllOtherHover = this.disableAllOtherHover.bind(this);

    for (var i = 0; i < this.links.length; i++) {
      this.links[i].addEventListener('touchend', this.toggleHoverEffect);
    }
  },
  toggleHoverEffect: function (e) {
    var target = e.currentTarget;

    if (target.classList.contains('hover')) {
      return true;
    }
    else {
      target.classList.add('hover');
      this.disableAllOtherHover(target);
      e.preventDefault();
      return false;
    }
  },
  disableAllOtherHover: function (target) {
    var allHoverLinks = document.querySelectorAll('a.col.hover');

    for (var i = 0; i < allHoverLinks.length; i++) {
      if (target != allHoverLinks[i]) {
        allHoverLinks[i].classList.remove('hover');
      }
    }
  }
}  


document.addEventListener('DOMContentLoaded',function(){

  tactileHoverEffect.start();

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
