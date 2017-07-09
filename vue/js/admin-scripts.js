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
    console.log(images);

}


function readURL(input, targetDiv) {
    console.log("function readURL");

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            console.log(targetDiv);
            targetDiv.css('background-image', 'url('+e.target.result +')');
        }

        reader.readAsDataURL(input.files[0]);
    }
}







$(document).ready(function() {

    $('.tag_button').click(function() {
        $('#alt_img').toggleClass("hidden");
    });

    $('.hide-buttons').click(function(e) {
        e.preventDefault();
        $('.admin-icons').toggleClass('hidden');
    });

    //Preview
    $('.edit-description').click(function() {
        console.log("Preview");

        var buttonValue = $(this).html(),
        nomProjet = $('#nom_projet').val(),
        colorTitle = $('#couleur_titre').val(),
        posteTitle = $('#titre_poste').val(),
        descriptionText = CKEDITOR.instances['text'].getData();

        if (buttonValue == "Preview") {
            $(this).html('Mode édition');

            console.log(nomProjet + ' ' + colorTitle + ' ' + posteTitle + ' ' + descriptionText);

            console.log($('#titreprojet').css('color'));

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

    CKEDITOR.instances['text'].on('change', function() {
        console.log(CKEDITOR.instances['text'].getData());
    });

    getProject();

    $(".image-input").change(function(){
        var target = $(this).parent().parent();
        readURL(this, target);
    });


});
