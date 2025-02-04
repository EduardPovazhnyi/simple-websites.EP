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

<?php
    function greet($name = "Guest") {
        return "Hello, $name!";
    }
    echo greet(); //Output: Hello, Guest!
    echo greet("Alice"); //Output: Hello, Alice!
?>

<?php
// 1. String function: strlen()
// The strlen() function is used to get the length of a string.
function getStringLength($string) {
    return strlen($string);
}
$string = "Hello, PHP!";
echo "The length of the string '{$string}' is: " . getStringLength($string) . "\n";


// 2. Array function: array_sum()
// The array_sum() function calculates the sum of all the values in an array.
function getArraySum($array) {
    return array_sum($array);
}
$numbers = [10, 20, 30, 40];
echo "The sum of the array is: " . getArraySum($numbers) . "\n";


// 3. Date and Time function: date()
// The date() function formats the current date or time according to a specified format.
function getCurrentDate() {
    return date('Y-m-d H:i:s');
}
echo "The current date and time is: " . getCurrentDate() . "\n";


// 4. Mathematical function: rand()
// The rand() function generates a random integer between two specified numbers.
function getRandomNumber($min, $max) {
    return rand($min, $max);
}
echo "A random number between 1 and 100: " . getRandomNumber(1, 100) . "\n";


// 5. File function: file_exists()
// The file_exists() function checks if a specified file or directory exists.
function checkFileExists($file_name) {
    return file_exists($file_name) ? "The file '{$file_name}' exists." : "The file '{$file_name}' does not exist.";
}
$file_name = "example.txt";
echo checkFileExists($file_name) . "\n";
?>

<?php
$file_name = "example.txt";
if (file_exists($file_name)) 
    {
    echo "The file '{$file_name}' exists.\n";
    } 
else 
    {
    echo "The file '{$file_name}' does not exist.\n";
    }
?>
