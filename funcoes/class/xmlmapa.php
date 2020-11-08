<?php
$servidor = "localhost";
$usuario = "root";
$senha ="";
$bdname = "sist_blsh";

$cone = mysqli_connect($servidor, $usuario, $senha, $bdname);

function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}

// Select all the rows in the markers table
$query = "SELECT * FROM markers";
$result = mysqli_query($cone, $query);

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';

// Iterate through the rows, printing XML nodes for each
while ($row_markers = @mysqli_fetch_assoc($result)) {
    // Add to XML document node
    echo '<marker ';
    echo 'id="' . $row_markers['id'] . '" ';
    echo 'name="' . parseToXML($row_markers['name']) . '" ';
    echo 'address="' . parseToXML($row_markers['address']) . '" ';
    echo 'lat="' . $row_markers['lat'] . '" ';
    echo 'lng="' . $row_markers['lng'] . '" ';
    echo 'type="' . $row_markers['type'] . '" ';

    echo '/>';
}
  echo '</markers>';
 
?>