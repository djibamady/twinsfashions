
  $(document).ready(function() {
    // Soumettre le formulaire de contact
    $('#contact-form').submit(function(e) {
      e.preventDefault();
      
      // Récupérer les valeurs des champs
      var name = $('#name').val();
      var email = $('#email').val();
      var message = $('#message').val();
      
      // Envoyer les données via AJAX (exemple simplifié)
      $.ajax({
        url: 'envoyer_message.php',
        type: 'POST',
        data: {
          name: name,
          email: email,
          message: message
        },
        success: function(response) {
          // Traiter la réponse du serveur ici (par exemple, afficher un message de succès)
          alert('Message envoyé avec succès !');
          // Réinitialiser le formulaire
          $('#contact-form')[0].reset();
        },
        error: function() {
          // Gérer les erreurs de requête ici
          alert('Une erreur s\'est produite. Veuillez réessayer plus tard.');
        }
      });
    });
  });
