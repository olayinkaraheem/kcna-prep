<?php
echo '<!DOCTYPE html>
<html>
<head>
    <title>Online Test</title>
    <link rel="stylesheet" href="styles/main.css">
    <script src="scripts/main.js"></script>
</head>
<body>
    <h2>Take the Test</h2>
    <form method="post">';

$resource_num = isset($_GET['resource_num']) ? $_GET['resource_num'] : 1;
$questions = __DIR__ . '/resources/resource-' . $resource_num . '.csv';

$output = [];

// Open the file for reading
if (($handle = fopen($questions, "r")) !== false) {
    // Read the header row
    $headers = fgetcsv($handle, 0, ',', '"', '\\');

    while (($data = fgetcsv($handle, 0, ',', '"', '\\')) !== false) {
        $row = array_combine($headers, $data);

        array_push($output, $row);
    }

    fclose($handle);
} else {
    echo "Unable to open the file.";
}

foreach ($output as $key => $row) {
    $questionNumber = $row['No'];
    $question = htmlspecialchars($row['Question']);
    $options = array_slice($row, 2, 5); // Option A to E
    $answer = $row['Correct Answer'];

    echo '<div class="question-block">';
    echo '<div class="question-title">' . $row['No'] . '. ' . $question . '</div>';
    echo '<div class="options">';

    $optionLabels = ['A', 'B', 'C', 'D', 'E'];
    foreach ($options as $index => $option) {
        $optionText = htmlspecialchars($option);
        $optionName = 'q' . $questionNumber;
        $optionValue = $options[$index];
        $optionLabel = str_replace('Option ', '', $index);

        if (!empty($optionText)) {
            echo '<label>';
            echo '<input type="radio" name="' . $optionName . '" value="' . $optionValue . '"> ';
            echo $optionLabel . '. ' . $optionText;
            echo '</label>';
        }
    }

    echo '</div>';
    echo '<div class="reveal-answer-button" onclick="toggleQuestion(' . $row['No'] . ')">Reveal Answer </div><span class="answer-text" id="answer-' . $row['No'] . '">' . $row['Correct Answer'] . ' (' . $row['Explanation'] . ')' . '</span>';
    echo '</div>';
}


echo '<input type="reset" class="submit-btn" value="Reset">';
echo '</form>
</body>
</html>';
