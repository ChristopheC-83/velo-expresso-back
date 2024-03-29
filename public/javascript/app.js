let alerts = document.querySelectorAll('.alert');

if (alerts.length > 0) {
  alerts.forEach((alert) => {
    setTimeout(() => {
      alert.classList.add('d-none');
    }, 3000);
  });
}


// envoie automatiquement le formulaire overlay du slider function submitForm() {
function submitForm() {
  document.getElementById("overlay").submit(); 
}

    