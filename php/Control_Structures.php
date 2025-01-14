<?php
$score = 80;
if ($score >= 70) {
    echo "Congratulations! You passed the exam.";
} else {
    echo "Ooops! you did not pass the exam.";
}
?>

<?php
    function calculateArea($length, $width) {
        $area = $length * $width;
        return $area;
    }
    $result = calculateArea(5, 10);
    echo "The area is: " . $result; // Output: The area is: 50
?>
