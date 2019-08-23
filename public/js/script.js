$(function () {
    var slides = $('.slides>figure');
    var slideCount = 0;
    var totalSlides = slides.length;
    var slideCache = [];

    (function preloader() {
        if (slideCount < totalSlides) {
            slideCache[slideCount] = new Image();
            slideCache[slideCount].src = slides.eq(slideCount).find('img').attr('src');
            slideCache[slideCount].onload = function () {
                slideCount++;
                preloader();
            };
        } else {
            slideCount = 0;
            SlideShow();
        }
    }());

    function SlideShow() {
        slides.eq(slideCount).fadeIn(1000).delay(2000).fadeOut(1000, function () {
            slideCount < totalSlides - 1 ? slideCount++ : slideCount = 0;
            SlideShow();
        });
    }

});

function date_diff() {

    var d1 = document.getElementById('begin_date').value;
    var d2 = document.getElementById('end_date').value;
    var elem = document.getElementById('totale_time');

    var diff = Date.parse(d2) - Date.parse(d1);

    elem.value = Math.floor(diff / 86400000) + 1;

}

function remaining() {
    var total = document.getElementById('total_amount').value;
    var pay = document.getElementById('amount_pay').value;
    var remain = document.getElementById('remaining_amount');

    remain.value = total - pay;

}

function hide() {
    hidden = document.getElementsByClassName("hide");
    hidden.forEach(hide => {
        hide.style.display = "none";
    });
}

function printer() {
    window.print();
}

function detail() {
    //url="http://localhost/RentACar/index.php?action=showVV&vehicle=all";
    month = document.getElementById("month").value;
    console.log(window.location.href)
    window.location.href += "&month=" + month;
}

function isAdmin(i, j) {
    console.log("i=" + i + " j=" + j);
    check1 = document.getElementById(i);
    check2 = document.getElementById(j);

    console.log(check1);

    check1.checked = true;
    check2.checked = true;

}

function notAdmin(i, j) {
    console.log("i=" + i + " j=" + j);
    check1 = document.getElementById(i);
    check2 = document.getElementById(j);

    console.log(check1);

    check1.checked = false;
    check2.checked = false;

}

// show and hide

// var vehicle = document.getElementById('vehicle');
// vehicle.style.display = 'none';

function hideType() {
    var hide = document.getElementById('type');
    var parent = document.getElementById('parent');
    var parent_form = document.getElementById('feedback_form');
    var contenu = document.getElementById('contenu');
    var annonce = document.getElementsByClassName('annonce');
    console.log(annonce, hide.value);
    

    lieu = `<div id="a_lieu" class="form-group annonce">
    <label for="lieu" class="control-label col-lg-2">Lieu de l'activté</label>
    <div class="col-lg-10" id="lieu">
        <input class="form-control" id="lieu" name="lieu" type="text" value="" />
    </div>
</div>`;

date_evenement = `<div id="a_date_evenement" class="form-group annonce">
    <label for="date_evenement" class="control-label col-lg-2">date de l'activté</label>
    <div class="col-lg-10" id="date_evenement">
        <input class="form-control" id="date_evenement" name="date_evenement" type="date" value="" />
    </div>
</div>`;
    if (hide.value == 'Autre') {
        //remove element
        parent.removeChild(hide);

        //add element
        ele = document.createElement('input');
        ele.setAttribute('class', 'form-control');
        ele.setAttribute('placeholder', 'Entrer le type d\'article');
        ele.setAttribute('name', 'type');
        ele.setAttribute('id', 'type');
        ele.setAttribute('required', '');
        parent.appendChild(ele);
    }else if (hide.value == 7) {   
        if (!$('#a_lieu').length) {
            $('#contenu').before(lieu);
            $('#contenu').before(date_evenement);
        }    
    } else {
        $('#a_lieu').remove();   
        $('#a_date_evenement').remove();   
    }
}

function add_element(element, text=null, id=null, element_prev) {
    ele = document.createElement(element);
    ele.innerHTML = text;
    ele.setAttribute('id', id);
    ele.style.color = 'red';
    element_prev.parentNode.insertBefore(ele, element_prev.nextSibling);
}

function remove_element(element, parent) {
    parent.removeChild(element);
}

function hideCategory() {
    var hideC = document.getElementById('category');
    var hideU = document.getElementById('url');
    var parentF = document.getElementById('parentF');
    if (hideC.value == 'vidéos') {
        //remove element
        parentF.removeChild(hideU);

        //add element
        ele = document.createElement('input');
        ele.setAttribute('class', 'form-control');
        ele.setAttribute('placeholder', 'Entrer l\'url youtube de la vidéo');
        ele.setAttribute('name', 'url');
        ele.setAttribute('id', 'url');
        ele.setAttribute('required', '');
        parentF.appendChild(ele);
    }
}

function searchTable() {
    var input, filter, table, tr, td, i, j;
    input = document.getElementById('search');
    filter = input.value.toUpperCase();
    table = document.getElementById('myTable');
    tr = table.getElementsByTagName('tr');
    tdlength = tr[1].getElementsByTagName('td').length;

    for (i = 0; i < tr.length; i++) { //i=0
        for (j = 0; j < tdlength; j++) { // j=0
            console.log(j);
            td = tr[i].getElementsByTagName('td')[j];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    console.log(td);
                    tr[i].style.display = "";
                    j = tdlength;
                } else if (j == tdlength - 1) {
                    tr[i].style.display = "none";
                }
            }

        }


    }
}

function btn() {
    var like;
    like = document.getElementById('like');
    like.style.zIndex = '-10';
}

// image view

let modalId = $('#image-gallery');

$(document)
    .ready(function () {

        loadGallery(true, 'a.thumbnail');

        //This function disables buttons when needed
        function disableButtons(counter_max, counter_current) {
            $('#show-previous-image, #show-next-image')
                .show();
            if (counter_max === counter_current) {
                $('#show-next-image')
                    .hide();
            } else if (counter_current === 1) {
                $('#show-previous-image')
                    .hide();
            }
        }

        $(document).ready(function () {
            $('#summernote').summernote();
            console.log("yes");
        });

        /**
         *
         * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
         * @param setClickAttr  Sets the attribute for the click handler.
         */

        function loadGallery(setIDs, setClickAttr) {
            let current_image,
                selector,
                counter = 0;

            $('#show-next-image, #show-previous-image')
                .click(function () {
                    if ($(this)
                        .attr('id') === 'show-previous-image') {
                        current_image--;
                    } else {
                        current_image++;
                    }

                    selector = $('[data-image-id="' + current_image + '"]');
                    updateGallery(selector);
                });

            function updateGallery(selector) {
                let $sel = selector;
                current_image = $sel.data('image-id');
                $('#image-gallery-title')
                    .text($sel.data('title'));
                $('#image-gallery-image')
                    .attr('src', $sel.data('image'));
                disableButtons(counter, $sel.data('image-id'));
            }

            if (setIDs == true) {
                $('[data-image-id]')
                    .each(function () {
                        counter++;
                        $(this)
                            .attr('data-image-id', counter);
                    });
            }
            $(setClickAttr)
                .on('click', function () {
                    updateGallery($(this));
                });
        }
    });

function file(id) {
    console.log(id);
    myFile = document.getElementById(id);
    length = myFile.files.length;
    console.log("la taille est: " + length);

    if (length != 4) {
        alert("Vous devez choisir quatre(4) images !");
        myFile.value = "";
    }
}

// build key actions
$(document)
    .keydown(function (e) {
        switch (e.which) {
            case 37: // left
                if ((modalId.data('bs.modal') || {})._isShown && $('#show-previous-image').is(":visible")) {
                    $('#show-previous-image')
                        .click();
                }
                break;

            case 39: // right
                if ((modalId.data('bs.modal') || {})._isShown && $('#show-next-image').is(":visible")) {
                    $('#show-next-image')
                        .click();
                }
                break;

            default:
                return; // exit this handler for other keys
        }
        e.preventDefault(); // prevent the default action (scroll / move caret)
    });

function delAlerte() {
    myalerte = document.getElementsByClassName('alert-parent')[0];
    mes = document.querySelector('.myalert-content>p');
    link = document.querySelector('.myalert-footer>a.right');
    mes.innerHTML = "Voulez vous vraiment supprimer ce dossier";
    link.href = 'index.php?action=showDocumentation&del=';
    myalerte.style.display = "none";
}

function showAlerte(nomDossier, id) {
    //console.log(myalerte+"ha");
    myalerte = document.getElementsByClassName('alert-parent')[0];
    mes = document.querySelector('.myalert-content>p');
    link = document.querySelector('.myalert-footer>a.right');
    warning = document.querySelector('.myalert-content>p.text-danger');
    bd = document.querySelector('.panel-alert');
    mes.innerHTML += ' "' + nomDossier + '" ?';
    link.href += id;
    myalerte.style.display = "block";
    
        bd.style.position = 'absolute';
        bd.style.top = '0';
        bd.style.left = '0';
        bd.style.minHeight = '100vh';
        

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            
            warning.innerHTML = this.responseText;
        }
    };

    xmlhttp.open("GET", "model/function/funcAJAX.php?q=" + id, true);
    xmlhttp.send();
}

function typeImage(id) {
    var file = document.getElementById('images[]');
    var select = document.getElementById(id);
    nom = `
    <div id="label_url" class="form-group ">
    <label for="label" class="control-label col-lg-2">Titre</label>
    <div class="col-lg-10" id="">
        <input class="form-control" id="label" name="label" type="text">
    </div>
  </div>
    `;
    if (select.value== "Images") {
        $('#label_url').remove();
        file.setAttribute('type','file');
        file.setAttribute('accept','image/*');
    }else if((select.value== "Autre")){
        $('#label_url').remove();
        file.setAttribute('type','file');
        file.setAttribute('accept','.doc, .docx, .pdf, .odp, .ppt, .odt');
    }else if((select.value== "youtube")){
        file.setAttribute('type','text');
        file.setAttribute('id','images');
        file.setAttribute('name','images');
       if (!$('#label_url').length) {
            $('#fic').before(nom);
       }
    }


}