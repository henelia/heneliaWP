/**
 *
 * Cookie
 * Gestion du message de cookie : Affichage du message
 * Gestion d'un cookie
 *
 */

// fonction pour créer un cookie
// nom du cookie : c_name (string)
// valeur du cookie : c_value (string)
// durée de vie du cookie (jours) : c_dead (number)
function setCookie(c_name, c_value, c_dead) {

    // début de la chaine qui va permettre de créer le cookie
    var cookie = c_name + '=' + c_value;
    var d = new Date(); // objet date
    d.setTime(d.getTime() + (c_dead*24*60*60*1000)); // date d'expiration
    var end = "expires="+d.toGMTString(); // au format international

    // création
    // si le cookie doit être présent sur plusieurs sous domaine
    // document.cookie = c_name + '=' + c_value + ';' + end + ';domain=ndd; path=/' ;
    // où ndd est le nom de domaine sans le préfixe du sous domaine
    // exemple : ".henelia.fr", sans les guillements, ne pas oublier le point
    document.cookie = c_name + '=' + c_value + ';' + end + '; path=/' ; // création 
}

// fonction pour retourner la valeur d'un cookie
// par défaut tous les cookies sont renvoyés sous forme d'une chaine concaténé
function getCookie(c_name) {
    var name = c_name + "="; // chaine recherchée
    var ca = document.cookie.split(';'); // // sépare la chaine en sous chaine, renvoie un tableau
    for(var i=0; i<ca.length; i++) { // pour chaque élément du tableau (= chaque cookie)
        var c = ca[i].replace(/^\s+|\s+$/g, ''); // suppression des espaces aux extrémités (regex because IE8)
        // si le contenu de la cellule correspond à la chaine recherchée
        // la fonction return la valeur du cookie (le reste de la chaine de caractères)
        if (c.indexOf(name) === 0) return c.substring(name.length, c.length);
    }
    return "";
}

// pour tester la présence d'un cookie, tester si getCookie() renvoie une valeur
// pour modifier un cookie, écraser l'ancien avec setCookie();

// fonction pour effcer un cookie
// = modifier la date d'expiration
function killcookie(c_name) {
    document.cookie = c_name + "=; expires=Thu, 01 Jan 1970 00:00:00 GMT"; 
}

jQuery(document).ready(function(){
    // cookie es-tu là ?
    if (getCookie('cookie_ok') === '') {
        // création du message, caché par défaut
        // css dans position-helpers.less
        jQuery('body').prepend('<p class="js-alert-cookie is-cookie-hidden">En poursuivant votre navigation sur ce site, vous acceptez l’utilisation de <strong>cookies</strong>, <a href="https://www.cnil.fr/fr/cookies-traceurs-que-dit-la-loi" title="Informations sur les cookies" class="alert-cookie--link" rel="nofollow" target="_blank">en savoir plus</a>. <button type="button" class="btn btn-default alert-cookie--btn">OK</button></p>');
        // apparition du message
        jQuery('.js-alert-cookie').removeClass('is-cookie-hidden');
        // btn de validation des cookies
        jQuery('.alert-cookie--btn').click(function() {
            // création du cookie, valable un an
            setCookie('cookie_ok', 'accepted', 365);
            // disparition du message
            jQuery('.js-alert-cookie').addClass('is-cookie-hidden');
            // suppression du message
            setTimeout(function(){jQuery('.js-alert-cookie').remove();}, 500);
        });
    }
});
