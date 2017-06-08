

function verif(){


    /*var male = document.getElementById('mr').checked;
    var female = document.getElementById('mme').checked;

    if ((!male && !female)) {
        alert("vous devez selectionné votre civilité");
        document.formule.mr.focus();
        document.formule.mr.style.backgroundColor='red';
        return false;
    }*/


    if (document.getElementById('nom').value == "") {


        alert('Pas de nom');
        document.formule.nom.focus();
        document.formule.nom.style.backgroundColor='red';
        return false;
    }

    if (document.getElementById('prenom').value == "") {

        alert('Pas de prenom');
        document.formule.prenom.focus();
        document.formule.prenom.style.backgroundColor='red';
        return false;
    }

    /*if (document.getElementById('mail').value == "") {

        alert('Pas de mail saisi');
        document.formule.mail.focus();
        return false;
    }*/

    /*if (document.getElementById('tel').value == "") {

        alert('Pas de telephone');
        document.formule.tel.focus();
        return false;
    }*/

    

    var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
    if(regex.test(document.getElementById('mail').value)){
        return true;
    } else {
        alert("Entrez email valide!");
        document.formule.mail.focus();
        document.formule.mail.style.backgroundColor="red";
        return false;
    }


    var mobile = /^(01|02|03|04|05|06|08|0033|\+33)[0-9]{8}/;

    if (mobile.test(document.getElementById('tel').value)) {
        return true;
    } else {
        alert("Entrez un numero de telephone!");
        document.formule.tel.focus();
        document.formule.tel.style.backgroundColor="red";
        return false;
    }


    if (document.getElementById('message').value == "") {

        alert('Pas de message');
        document.formule.message.focus();
        return false;
    }


}

function sum_elements(){
    var somme=0;
    var result = document.getElementById("somme");
    for (var i = 1; i <= 6; i++) {
        var element = document.getElementById("el_"+i);
        if (element.value!="" && !isNaN(element.value)){
            somme += parseInt(element.value);
        }
    }
    result.value = somme;
    return somme;
}

// Calcul Panier
function aPayerParArticle() {
    var facturations = document.querySelectorAll('.facturations li');
    

    facturations.forEach(function(facturation){
        var price = facturation.querySelector('.price');
        var quantite = facturation.querySelector('.quantite');

        if((quantite.value != '' && !isNaN(quantite.value)) && (price.value != '' && !isNaN(price.value))){
            var calc = price.value * quantite.value;
            console.log(price.value + ' le prix');
            console.log(quantite.value + ' la quantite');

            facturation.querySelector('.totalAPayer').value = calc;
        }
    });
}

function sommeAll(){

    var somme1=0;
    var result = document.getElementById("somme1");
    for (var i = 1; i <= 4; i++) {
        var element = document.getElementById("to_"+i);
        if (element.value!="" && !isNaN(element.value)){
            somme1 += parseInt(element.value);
        }
    }
    result.value = somme1;
    return somme1;
}

function sum_elements_panier(){

    var elements = document.querySelectorAll('.totalAPayer');
    var netAPayer = 0;

    elements.forEach(function(element){

        if((element.value != '' && !isNaN(element.value)))
        {
            netAPayer += element.value * 1;
            document.querySelector('.totalPanier').value = netAPayer;
        }
    });
}