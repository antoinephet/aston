/*alert('Hello World');*/

/*console.log(5+2);*/

// EXERCICE DU PROMPT


/*var nombre = prompt("Entrez votre âge");
nombre = parseInt(nombre);
if (nombre >= 18) {

    console.log("Vous pouvez passer le permis!");
}

if(nombre>=18 && nombre<=25 || nombre >= 90){
    console.log("Vous bénéficiez du tarif réduit!!");
}

else if(nombre < 18){
    ecart = 18 - nombre;
    console.log("Vous ne pouvez pas passer le permis!! Vous devez attendre "+ecart+" ans avant de passer le permis");
}*/


/*else{
    console.log("Vous ne bénéficiez pas du tarif réduit!!");
}*/

// LES BOUCLES

/*var num = 3;

while(num < 10){

    console.log("Ma boucle");
    num++;
}


do{

    console.log("Ma boucle1");
    num++;
} while(num < 10);


for(num=0;num < 10;num++){

    console.log("Ma boucle2");
}*/


// parcours du tableau 
/*var tab = [];
tab = ["Moussa", "Kevin", "Pierre", "Paul", "Jacques"];

console.log(tab);

for (var i = 0; i < tab.length; i++) {

    console.log(i+" "+tab[i]);

    if(tab[i] === "Kevin"){  === compare les valeurs et s'ils sont de même type 
        console.log(tab[i] +" Trouvé! Son indice est "+i);
    }
    else if(tab[i] != "Kevin"){
        console.log("pas de Kevin");
    }
    
}*/


// NOMBRES PREMIERS  2,3,5,7,11,13,17,19,23,29,31,37,41,43


/*var nombre = prompt("Entre un nombre");
nombre = parseInt(nombre);
if (nombre%nombre == 0 && nombre&1 == 0) {

    console.log("C'est un nombre premier!");
}
else if(nombre%2 == 0 || nombre%5 == 0){

    console.log("Ce n'est pas un nombre premier!");
}*/

// *********************************************************
// *********************************************************


/*var i, nb, compter, test, resultat;
test =0;
var nb = prompt("Entre un nombre");
nb = parseInt(nb);

for (i = 2; i < nb; i++){
    resultat = nb % i;
    console.log(nb + "/" + i + " = " + resultat);
    if (nb % i == 0){

        test = 1;
        console.log(nb + " il n'est pas premier car il est divisible par "+i);
    }


}
if (!test){

    console.log(nb + " nombre premier");
}
else{

    console.log(nb + " n'est pas nombre premier");
}*/


// *********************************************************
// *********************************************************

// FONCTIONS ARITHMETIQUES
/*function etudiant(nom, prenom){

    if (prenom == undefined) {

        prenom = 'Aston';
    }
    console.log(nom+prenom);
}

function addition(a,b,c,d){
    var resultat=soustraction(a,b);
    return resultat+c+d;
}


function soustraction(a,b){

    return a-b;
}

function multiplication(a,b){

    return a*b;
}


function division(a,b){

    return a/b;
}


var estPremier = function (nombre){
    for (var i = 2; i < nombre; i++) {
        if (nombre % i === 0) {
            console.log(nombre + ' est pas premier car il est divisible par ' + i)
            return false
        }
    }
    console.log(nombre + ' est un nombre premier')
    return true
}*/


var questions = [
{
    ques: 'Est-ce que tu aimes le Javascript ?',
    ans: 'Oui'
},

{
    ques: 'Le Javascript est une évolution du Java ?',
    ans: 'Non'
},
{
    ques: 'Est-e que tu aimes le Javascript est proche du Java',
    ans: 'Non'
},

{
    ques: 'le Javascript est un langage d\'objet par prototypage ?',
    ans: 'Oui'
}

];

for (var i = 0; i < questions.length; i++) {
    if (prompt(questions[i].ques).toLowerCase() === questions[i].ans.toLowerCase()) {
        console.log('Bonne réponse à la question ' + questions[i].ques);
    }
    else{

        console.log('Faux. La bonne réponse à la question ' + questions[i].ques + ' était ' + questions[i].ans);
    }
}