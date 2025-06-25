<?php
echo '<!DOCTYPE html>
<html>
<head>
    <title>Online Test</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .question-block {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .question-title {
            font-weight: bold;
            margin-bottom: 10px;
        }
        .options label {
            display: block;
            margin-bottom: 5px;
        }
        .submit-btn {
            padding: 10px 20px;
            font-size: 16px;
        }
    </style>
    <script>
        function toggleQuestion(id) {
            const answers = document.getElementById("answer-" + id);
            if (answers.style.display === "none") {
                answers.style.display = "block";
            } else {
                answers.style.display = "none";
            }
        }
    </script>
</head>
<body>
    <h2>Take the Test</h2>
    <form method="post" action="submit.php">';

$resource_num = isset($_GET['resource_num']) ? $_GET['resource_num'] : 1;
$questions = __DIR__ . '/resources/resource-' . $resource_num . '.csv';

$output = [];

// Open the file for reading
if (($handle = fopen($questions, "r")) !== false) {
    // Read the header row
    $headers = fgetcsv($handle);

    // Read each remaining row
    while (($data = fgetcsv($handle)) !== false) {
        // Combine headers with row data
        $row = array_combine($headers, $data);

        // Print or process the row
        array_push($output, $row);
    }

    // Close the file
    fclose($handle);
} else {
    echo "Unable to open the file.";
}
// var_dump($output[0]);
foreach ($output as $key => $row) {
    // echo "\n-------------------\n";
    // var_dump($row["Question"]);
    // die;
    // var_dump(array_slice($row, 2, 5));
    // die;
    $questionNumber = $row['No'];
    $question = htmlspecialchars($row['Question']);
    $options = array_slice($row, 2, 5); // Option A to E
    $answer = $row['Correct Answer'];

    // var_dump($options);
    // die;

    echo '<div class="question-block">';
    echo '<div class="question-title">' . $row['No'] . '. ' . $question . '</div>';
    echo '<div class="options">';

    $optionLabels = ['A', 'B', 'C', 'D', 'E'];
    foreach ($options as $index => $option) {
        // var_dump([$index, htmlspecialchars($option),  $questionNumber, $optionLabels]);
        // die;
        $optionText = htmlspecialchars($option);
        $optionName = 'q' . $questionNumber;
        $optionValue = $options[$index];
        $optionLabel = str_replace('Option ', '',$index);
        // $correctAnswer = str_replace('Option ', '',$index) == $row['Correct Answer'];

        if (!empty($optionText)) {
            echo '<label>';
            echo '<input type="radio" name="' . $optionName . '" value="' . $optionValue . '"> ';
            echo $optionLabel.'. ' . $optionText;
            echo '</label>';
        }
    }

    echo '</div>';
    echo '<div onclick="toggleQuestion('.$row['No'].')">Answer: </div><span style="display:none;" id=answer-'.$row['No'].'>'. $row['Correct Answer'] .'</span>';
    echo '</div>';
}


echo '<input type="submit" class="submit-btn" value="Submit Answers">';
echo '</form>
</body>
</html>';
