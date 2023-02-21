valeur_max = Math.pow(137,7);

function ridiculous_hash(text) {

	nombre = 0;
	texte = text+text+text;

	// récupération des caractères 1 à 1
	for (var i = 0; i <= texte.length - 1; i++) {
		car = text.substr(i, 1);
		// codification des caractères récupérés
		code = texte.charCodeAt(car);
		puissance = Math.pow(256,i);
		nombre = (nombre + ( code * puissance ) ) % valeur_max;
	}

	return nombre;

}

console.log( ridiculous_hash("test") );
console.log( ridiculous_hash("tesu") );