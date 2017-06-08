/*function test(){

    console.log('zepto fonctionne');
}*/

//**** Variables globales ****



var players = null; // source de données globale (toutes les fonctions y ont accès)
var ageAsc = false; // booléen permet de savoir si les joueurs sont triés par age ascendant
var nomAsc = true;
var filterAge = null; // au départ, aucun filtre sur l'âge



// ************************************************************

//**** Fonctions ****


function getPlayers(){

    var url = 'http://localhost/projet/php/ajax2.php';
    console.log(players);

    // requête aja ASYNCHRONE. Javascript n'attend pas la réponse du serveur pour continuer l'exécution du script
    $.get(url,function(data) {
        // data contiendra les donnéees envoyées par le serveur
        //console.log(data);
        players = JSON.parse(data);
        displayTable(players); // fonction responsable de l'affichage d'un tableau de joueurs


        /*$('#ageHeader').on('click',function(){ // quand on clique sur 'Age'
            if (ageAsc) {
                var sortedPlayers = _.reverse(_.sortBy(players, ['age']));
            } else {
                var sortedPlayers = _.sortBy(players, ['age']);
            }
            ageAsc = !ageAsc; // true devient false ou false devient true
            console.log(ageAsc);
            console.log('ok');
            //displayTable(sortedPlayers);
            //console.log('ok');
            //console.log(sortedPlayers);

        });*/

        /*players.forEach(function(player){ // dans la fonction affiche sur chaque itération les noms dans Console
        console.log(player.nom);

        });*/
    });
    console.log(players);
}

function displayTable(players){

    var table = '<table class="table table-striped">';

    //entête
    table +='<tr><th id="nomHeader">Nom</th><th>Prénom</th><th id="ageHeader">Age</th><th>Numéro</th><th>Équipe</th></tr>';

    

    //boucle
    players.forEach(function(player){
        table += '<tr>';
        table += '<td>' + player.nom + '</td>';
        table += '<td>' + player.prenom + '</td>';

        var oldest = _.max(getAges(players)); // récupère l'âge le plus élevé
        //console.log(oldest);

        if (player.age == oldest) {

            table += '<td class="oldest">' + player.age + '</td>';

        } else{

            table += '<td>' + player.age + '</td>';
        }
        
        table += '<td>' + player.numero_maillot + '</td>';

        if (player.equipe_nom == null) {
            table +=  '<td>Sans équipe</td>';
        } else {
            table += '<td>' + player.equipe_nom + '</td>';
        }


        table += '</tr>';


    });

    table += '</table>';
    $('#listPlayers').html(table);
}

function hidePlayers(ageLimit){
    var nbResults = 0;
    var rows = $('table tr'); // on récupère les lignes du tableau
    //console.log(rows);
    $.each(rows,function(index,row){

        // row.hide(); // erreur : row.hide is not a function
        // on cible la ligne par zepto afin "d'envelopper" l'élément
        // de nouvelles capacités (propriétés et méthodes)

        var r = $(row); // r est "plus riche" en fonctionnalités que row

        //console.log(r.children().eq(2).text());

        var age = r.children().eq(2).text();

        // récupération de l'age du joueur
        //console.log(row.children[2].text()); // il affiche dans la console que des <tr>
        //var ageCrade = row.children[2]; // exemple : <td>28</td>


        //console.log(typeof ageCrade);
        //var age = ageCrade.substr(4,2);
        //console.log(age);

        if (age > ageLimit && index != 0){ //age > ageLimit && age != 'Age', la ligne d'entête ne disparait pas
            r.hide();
        } else {
            r.show();
            nbResults++;
        }

    });
    // on affiche le résultat dans le DOM
    // -1 pour ne pas compter la ligne d'en-tête
    $('#nbResults').html(nbResults - 1);
}

function getAges() {
    var ages = []; // on initialise un tableau vide

    players.forEach(function(player){
        ages.push(player.age); // push permet d'ajouter un élément dans le tableau sur chaque itération
    });

    return ages; // on retourne le tableau des ages
}

function getFormValues(form){



    // récupère tous les inputs placées dans le formulaire fourni en entrée
    var inputs      = form.children('input');

    //récupère la valeur du premier input trouvé (nom)
    var nom         = inputs.eq(0).val();
    var prenom      = inputs.eq(1).val();
    var age         = inputs.eq(2).val();

    // renvoie un tableau de deux balises select
    var selects     = form.children('select');

    var maillot     = selects.eq(0).val();
    var equipe      = selects.eq(1).val();

    //console.log(nom + ' ' + prenom + ' ' + maillot);

    // création d'un objet values
    // values nous permettra de stocker toutes les valeurs à transmettre au serveur
    var values = {
        nom: nom,
        prenom: prenom,
        age: age,
        maillot: maillot,
        equipe: equipe
    }

    //console.log(values);
    return values;
}

function checkValues(player){
    //player est un objet
    var conditions = 
        player.nom.length > 1 && 
        player.prenom.length > 1 && 
        player.age.length > 1;

    return conditions;


}


function clearMessage(timer){

    var message = $('#message');
    setTimeout(function(){
        // efface le text situé dans l'élément #message ainsi que les classes
        message.text('').removeClass();

    }, timer);
}


// ************************************************************

//**** Écouteurs d'évènements (eventListeners) ****


//$('#btn').on('click',test); // document.getElementById('btn').addEventListener('click',test);



$('#selectAge').on('change',function(){
    //var age = $(this).val(); // val() récupère la valeur de la balise select
    //console.log('age sélectionné: ' + age);
    //console.log(players);
    //hidePlayers(age);
    filterAge = $(this).val();
    hidePlayers(filterAge);
});

// Lorsque l'élément #ageHeader existera dans le dom, JS placera un écouteur d'élément click
$(document).on('click','#ageHeader', function(){
    //console.log('ok');
    //$('#ageHeader').on('click',function(){ // quand on clique sur 'Age'
    if (ageAsc) {
            var sortedPlayers = _.reverse(_.sortBy(players, ['age']));
    } else {
            var sortedPlayers = _.sortBy(players, ['age']);
    }
    ageAsc = !ageAsc; // true devient false ou false devient true
    //console.log(ageAsc);
    //console.log('ok');

    displayTable(sortedPlayers);

    if(filterAge){ // si variable filterAge différent de null ou false ou undefined

         hidePlayers(filterAge); // on masque les joueurs dont l'âge est supérieur à la valeur stockée dans filterAge
    }
   
    //console.log('ok');
    //console.log(sortedPlayers);

});


$(document).on('click','#nomHeader', function(){
    //console.log('ok');
    //$('#ageHeader').on('click',function(){ // quand on clique sur 'Age'
    if (nomAsc) {
            var sortedPlayers = _.reverse(_.sortBy(players, ['nom']));
    } else {
            var sortedPlayers = _.sortBy(players, ['nom']);
    }
    nomAsc = !nomAsc; // true devient false ou false devient true
    //console.log(ageAsc);
    //console.log('ok');
    displayTable(sortedPlayers);
    if(filterAge){ // si variable filterAge différent de null ou false ou undefined

         hidePlayers(filterAge); // on masque les joueurs dont l'âge est supérieur à la valeur stockée dans filterAge
    }
    //console.log('ok');
    //console.log(sortedPlayers);

});


$('#displayFormPlayer').on('click',function(){

    var text = ' le formulaire pour ajouter un joueur';
    //console.log('ok');
    //$('#formPlayer').show();
    var form = $(this).next(); // ciblage relatif
    form.toggle();

    // changer le texte du lien en fonction de la visibilité du fomulaire
    //console.log(form.css('display')); // pour afficher le retour de cette fonction, s'il affiche le formulaire, il indique "block" sinon "none"

    var status = form.css('display');
    if (status == 'none') {
        $(this).text('Afficher' + text);
    } else {
        $(this).text('Masquer' + text);
    }

});

$('#formPlayer button').on('click',function(){ //function = fontion anonyme

    //var nom = $('#formPlayer input'); // var nom = $('#formPlayer input').eq(0).val();
    //console.log('nom');
    //console.log('ok');

    var form = $('#formPlayer');

    // création d'un objet player à partir des valeurs récupérés dans le formulaire
    var player = getFormValues(form);

    var check = checkValues(player);

    if (check) {
        // si conditions remplies => requête ajax en post
        // requête ajax en post
        var url = 'http://localhost/projet/php/ajaxAddPlayer.php';
        $.post(url, player, function(data){

        // si php a renvoyé 1 (requête sql exécutée avec succès)
        if (data == 1) {
            getPlayers(); // recharge la page immédiatememnt
            $('#message').text('L\'enregistrement a réussi').removeClass().addClass('bg-success text-success');
        } else {

            $('#message').text('L\'enregistrement a échoué').removeClass().addClass('bg-danger text-danger');
            
            
        }
        
        });
        //console.log(data);
    } else {


        // aficher message d'erreur si les conditions de validation non remplies
        $('#message').text('Formulaire Non Valide').removeClass().addClass('bg-danger text-danger');
        
    }
    clearMessage(5000);

    //console.log(player);

});



// ************************************************************


// Chargement de la liste des joueurs
getPlayers(); // appel de la fonction au chargement du script




// ************************************************************
// Lodash exemples

/*var notes = [7, 56, 12, 74, 30];

console.log("capte lodash");
var max = _.max(notes);
var min = _.min(notes);


console.log(max);
console.log(min);*/

/*var p = $('p');
p.hide();*/ // cache les paragraphes toto ?