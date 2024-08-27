// form_validation.js

document.getElementById('contactForm').addEventListener('submit', function(event) {
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var message = document.getElementById('message').value;

    // Simple validation
    if (name === "" || email === "" || message === "") {
        alert("Tous les champs sont requis.");
        event.preventDefault();  // Empêche l'envoi du formulaire
    } else if (!validateEmail(email)) {
        alert("Veuillez entrer une adresse email valide.");
        event.preventDefault();
    }
});

function validateEmail(email) {
    var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}
