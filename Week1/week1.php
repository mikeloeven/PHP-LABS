<?php
 
 $s1 = "string 1";
/*
$s2 = "string2";
$s3 = ""; //empty string
*/
$ar1 = array("45  ","  56","34","46  ","  54");

$ar2 = array(
        "k1" => 45,
        "k2" => 53,
        "k3" => 44,
        "k4" => 41,
        "k5" => 95
);

/*
  $ar3 = array(
    array(45,34,65),
    array(87,34,76),
    array(36,39,45)
); 
 */
 

print_r( explode(" ","$s1"));

$browns = "yummy";
echo "<p/> the hash of",' $browns  '; echo sha1($browns);
// yes i have hashed browns
echo "<p> </p>";
$html = "<h1> now add the eggs and bacon </h1>";
echo htmlentities($html);
var_dump(htmlentities($html));

echo strip_tags($html); 

echo "<p/> MORE HASHED BROWNS !!  ";
echo md5($browns);
echo "<p/>";

echo trim("        food            ");

echo "<p/>";
echo ucwords($html);
echo "<p/>";
echo strlen($html);
echo "<p/> breakfast with dyslexia <p/>";
echo "<h1>";
echo str_shuffle(strip_tags($html));
echo "</h1>";
echo "<p/> the code to the worlds simplest ascii art <p/>";
echo ord($html);

echo "<p/> array count val</p>";
var_dump( array_count_values($ar1));    
echo "<p/> Array Flip <p/>";
var_dump($ar2);
$ar4 = array_flip($ar2);
var_dump($ar4);
echo "<p/>array key exists<p/>";
array_key_exists("k4", $ar2);

function trima($n)
{
    return(trim($n));
}

echo "<p/>Array Map<p/>";
var_dump((array_map(trima,$ar1)));
var_dump(array_rand($ar2,1));
array_push($ar2,"78","75");
var_dump($ar2);
echo in_array(45,$ar2);
var_dump(shuffle($ar2));
var_dump(count($ar2));
print_r(sort($ar2));

?>
