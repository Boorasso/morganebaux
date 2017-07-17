/*=====================================================================
=================               VARIABLES             =================
=======================================================================*/


var projet = {
    id: -1,
    titre: "",
    couleurTitre: "#FFF",
    poste: "",
    texte: "",
    mainImage: {
        fileName: "",
        alt: ""},
    images: [
        {
            fileName: "",
            alt: "",
            size: "",
        }
    ]
}

/*=====================================================================
 =================               FUNCTIONS            =================
 =======================================================================*/

function getProject() {

    //Get ID
    projet.id = $('#nom_projet').data("id-projet");

    //Get title
    projet.titre = $('#nom_projet').val();

    //Get title color
    projet.couleurTitre = $('#couleur_titre').val();

    //Get job position
    projet.poste = $('#titre_poste').val();

    //Get text
    projet.texte = CKEDITOR.instances['text'].getData();

    //Get images
    var images = $('#mainsection').find("div[class^=col-]");

}


function readURL(input, targetDiv, targetLink) {
    console.log("function readURL");

    targetLink = targetLink || 0;

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            targetDiv.css('background-image', 'url('+e.target.result +')');
            if (targetLink != 0) {
                targetLink.attr("href", e.target.result);
            }
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function returnURL(input) {
    console.log("function returnURL");

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.readAsDataURL(input.files[0]);

        reader.onload = function (e) {
            return e.target.result;
        }
    }
}

function  toggleUpAndDownButtons(element) {

    var allImages = $('#mainsection').find("div[class^=col-]"),
        firstElement = allImages[0],
        lastElement = allImages[((allImages.length)-1)];

    if (element.is(firstElement)) {
        element.find('.image-up').addClass("hidden");
    }
    else {
        element.find('.image-up').removeClass("hidden");
    }

    if (element.is(lastElement)) {
        element.find('.image-down').addClass("hidden");
    }
    else {
        element.find('.image-down').removeClass("hidden");
    }
}






$(document).ready(function() {

    //PREVENT BUTTONS DEFAULT
    $('button:not([type=submit])').click(function(e) {e.preventDefault();});

    //TOGGLE ALT FIELD
    $('.tag_button').click(function() {
        $('#alt_img').toggleClass("hidden");
    });

    //TOGGLE SMALL BUTTONS
    $('.hide-buttons').click(function(e) {
        e.preventDefault();
        $('.admin-icons').toggleClass('hidden');
    });



    /*--------------------------------------------
                        PREVIEW
    --------------------------------------------*/

    //PREVIEW BUTTON
    $('.edit-description').click(function() {
        var buttonValue = $(this).html(),
        nomProjet = $('#nom_projet').val(),
        colorTitle = $('#couleur_titre').val(),
        posteTitle = $('#titre_poste').val(),
        descriptionText = CKEDITOR.instances['text'].getData();

        if (buttonValue == "Preview") {
            $(this).html('Mode édition');
            $('#titreprojet').html(nomProjet);
            $('#titreprojet').css('color', "#"+colorTitle);
            $('#poste').html(posteTitle);
            $('#texteprojet').html(descriptionText);
        }
        else {
            $(this).html('Preview');
        }

        $('.project-description-admin-view').toggleClass('hidden');
        $('.project-description-preview').toggleClass('hidden');
    });

    //IMAGE PREVIEW
    $(".image-input").change(function() {
        var target = $(this).parent().parent();
        var targetLink = $(this).parent().parent().find(".colcontent");
        readURL(this, target, targetLink);
    });

    //ADD IMAGE
    $('#image_new').change(function() {
        var allImages = $('#mainsection').find("div[class^=col-]"),
            lastElementNumber = ((allImages.length)+1),
            newImageNumber = lastElementNumber + 1,
            newImageTempURL = readURL($(this)),
            newImage = "<div class='col-4' style='background-image: url('" + newImageTempURL + "')'>"+
                            "<a href='" + newImageTempURL + "' data-fancybox='group' class='colcontent'></a>"+
                                "<div class='admin-icons'>"+
                                    "<a href='#'><i class='fa fa-arrows-alt' aria-hidden='true'></i></a>"+
                                    "<a href=#' class='image-up'><i class='fa fa-arrow-up' aria-hidden='true'></i></a>"+
                                    "<a href=#' class='image-down hidden'><i class='fa fa-arrow-down' aria-hidden='true'></i></a>"+
                                    "<button onclick='$('#image_" + newImageNumber + "').click()'> <i class='fa fa-pencil' aria-hidden='true'></i> </button>"+
                                    "<input type='file' name='image_" + newImageNumber + "' id='image_" + newImageNumber + "' class='image-input' style='display: none'>"+
                                    "<a href='#'><i class='fa fa-times' aria-hidden='true'></i></a>"+
                                "</div>"+
                            "<?php endif; ?>"+
                        "</div>";

        console.log(newImageTempURL);
        console.log($(this));
        console.log($(this).parent());

        $(this).parent().before(newImage);
    });

    //IMAGE UP
    $(document).find('.image-up').click(function(e) {
        e.preventDefault();

        var movingUP = $(this).parent().parent(),
            movingDOWN = movingUP.prev();

        movingDOWN.before(movingUP);

        toggleUpAndDownButtons(movingUP);
        toggleUpAndDownButtons(movingDOWN);

    });

    //IMAGE DOWN
    $(document).find('.image-down').click(function(e) {
        e.preventDefault();

        var movingDOWN = $(this).parent().parent(),
            movingUP = movingDOWN.next();

        movingDOWN.before(movingUP);

        toggleUpAndDownButtons(movingUP);
        toggleUpAndDownButtons(movingDOWN);

    });



    //DATA GETTER (objet projet)
    getProject();


});
