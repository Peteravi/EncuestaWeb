// Capturamos el formulario por su ID
const surveyForm = document.getElementById('survey-form');

// Escuchamos el evento de envío del formulario
surveyForm.addEventListener('submit', (event) => {
    // Prevenimos el envío si los campos no están llenos
    let valid = true;
    const questions = document.querySelectorAll('#survey-form select');

    questions.forEach((select) => {
        if (select.value === '') {
            valid = false;
            // Añade una clase de error para resaltar el campo vacío
            select.classList.add('error');
        } else {
            // Elimina la clase de error si ya tiene valor
            select.classList.remove('error');
        }
    });

    if (!valid) {
        event.preventDefault(); // Detiene el envío del formulario
        alert('Por favor, responde todas las preguntas antes de enviar.');
    }
});

// Agregar eventos de foco para eliminar mensajes de error
document.querySelectorAll('#survey-form select').forEach((select) => {
    select.addEventListener('change', () => {
        if (select.value !== '') {
            select.classList.remove('error');
        }
    });
});
