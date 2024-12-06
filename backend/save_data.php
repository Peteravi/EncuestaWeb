<?php
// Ruta del archivo CSV donde se guardarán las respuestas
$dataFile = '../data/results.csv';

// Verifica si el formulario se envió mediante POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibe las respuestas desde el formulario
    $question1 = $_POST['question1'] ?? '';
    $question2 = $_POST['question2'] ?? '';
    $question3 = $_POST['question3'] ?? '';
    $question4 = $_POST['question4'] ?? '';
    $question5 = $_POST['question5'] ?? '';

    // Prepara los datos en formato CSV
    $rowData = [$question1, $question2, $question3, $question4, $question5, date('Y-m-d H:i:s')];

    // Intenta abrir el archivo para escribir
    try {
        $file = fopen($dataFile, 'a'); // Modo 'a' para agregar datos sin sobrescribir
        fputcsv($file, $rowData); // Agrega los datos como una nueva línea
        fclose($file); // Cierra el archivo

        // Redirige a una página de confirmación o muestra un mensaje
        echo "¡Gracias por completar la encuesta!";
    } catch (Exception $e) {
        // Manejo de errores
        echo "Error al guardar las respuestas. Por favor, inténtalo de nuevo.";
    }
} else {
    echo "Método no permitido.";
}
?>
