import './bootstrap';
import '../css/app.css';


document.querySelectorAll('.character-button').forEach(function(button) {
    button.addEventListener('click', function() {
        const target = button.getAttribute('data-target');
        document.getElementById(target).style.display = 'block';
    });
});


document.querySelectorAll('.close').forEach(function(closeButton) {
    closeButton.addEventListener('click', function() {
        const target = closeButton.getAttribute('id').replace('closeModal-', '');
        document.getElementById(`modal-${target}`).style.display = 'none';
    });
});

window.addEventListener('click', function(event) {
    if (event.target.classList.contains('modal')) {
        event.target.style.display = 'none';
    }
});
