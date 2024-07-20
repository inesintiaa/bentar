document.addEventListener('DOMContentLoaded', function() {
    var inputs = document.querySelectorAll('input[required]');
    inputs.forEach(function(input) {
        input.oninvalid = function(event) {
            var customMessage = input.dataset.customMessage;
            if (customMessage) {
                event.target.setCustomValidity(customMessage);
            }
        }
        input.oninput = function(event) {
            event.target.setCustomValidity('');
        }
    });
});