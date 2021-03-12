const h = document.getElementById("db-h");
const p = document.getElementById('db-p');

const smash = document.getElementById("smash");
smash.addEventListener("mouseenter", function (e) {
    h.classList.add("smash");
    h.classList.remove("thelane");
    h.classList.remove("dac");
    h.innerText = "Smash";
    p.innerText = 'Affrontez-vous au dessus du vide. Ejectez vos adversaires dans le vide à l’aide de vos compétences et soyez le dernier survivant dans l’arène.\nChoissisez une classe, chaque classe permet d’avoir une compétence spécifique. Utilisez vos compétences de double sauts et les boosts présents sur la carte afin d’éjecter vos ennemis. Plus votre vie diminue, plus vous êtes éjecté loin, faites attention...';
});

const dac = document.getElementById("dac");
dac.addEventListener("mouseenter", function(e) {
    h.classList.remove("smash");
    h.classList.remove("thelane");
    h.classList.add("dac");
    h.innerText = "Dé à Coudre";
    p.innerText =
        "Affrontez vos adversaires dans un concours de plongeons. Sautez tour à tour dans une piscine et soyez le dernier à survivre de votre chute.\nSautez chacun votre tour dans une piscine d’eau. Lors de chaque saut, l’endroit où vous avez attéri est remplacé par un bloc. Au fur et à mesure des sauts, l’espace disponible pour attérir se réduit et la difficulté augmente. Sauter dans un bloc d’eau entouré de blocs solides vous fait gagner des points supplémentaires.";
});

const thelane = document.getElementById("thelane");
thelane.addEventListener("mouseenter", function(e) {
    h.classList.remove("smash");
    h.classList.add("thelane");
    h.classList.remove("dac");
    h.innerText = "TheLane";
    p.innerText =
        "Affrontez votre/vos adversaire(s) lors d'une bataille de PvP pour gagner du territoire. Repousser votre territoire jusqu'à la base ennemie. Les territoires sont séparer par une ligne au centre de la map que vous devrez faire avancer. \n Afin de faire progresser la ligne : \n- Abattez-vos ennemies dans des combats sanglants\n- Contestez le territoire en restant du côté adverse de la ligne durant quelques secondes.\nAttention… Chaque secondes augmente la progression de la ligne...";
});
