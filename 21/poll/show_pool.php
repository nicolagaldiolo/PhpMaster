<?php

$vote = isset($_POST['vote']) ? intval($_POST['vote']) : 0;

$mysqli = new mysqli("localhost", "root", "", "poll");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit;
}

if( $vote > 0){
    $v_stmt = $mysqli->prepare("UPDATE poll_results SET num_votes=num_votes+1 WHERE id = ?");
    $v_stmt->bind_param("i", $vote);
    $v_stmt->execute();
    $v_stmt->free_result();
}

$r_stmt = $mysqli->prepare("SELECT candidate, num_votes FROM poll_results");
$r_stmt->execute();
$r_stmt->store_result(); // salva in memoria tutto il resultset
$r_stmt->bind_result($candidate, $num_votes);
$num_candidates = $r_stmt->num_rows;


/*****************************
 * Initial calculation for graph
 ******************************/
$edge_padding       = 40;
$width              = 900;
$internal_width     = $width - $edge_padding;                  // total width of the image in pixels
$bar_height         = 60;
$bar_spacing        = $bar_height / 2;
$font_name          = '../Arial.ttf';
$title_size         = 30;                   // in points
$main_size          = 18;                   // in points
$small_size         = 15;                   // in points
$percentuage_box    = 35;
$title              = "Pool Result";
$x                  = $edge_padding;
$y                  = $edge_padding;

// Calculate total number of votes so far
$total_votes = 0;
$max_text_width = 0;
while ($r_stmt->fetch()){
    $total_votes += $num_votes;
    $title_prop = imagettfbbox($main_size, 0, $font_name, $candidate);

    $tmp_text_width = abs($title_prop[0]) + $title_prop[2];
    $max_text_width = ($max_text_width < $tmp_text_width) ? $tmp_text_width : $max_text_width;
}

$r_stmt->data_seek(0);


//Title Props
$title_prop = imagettfbbox($title_size, 0, $font_name, $title);
$title_x = ($width - $title_prop[2]) / 2.0;
$title_y = abs($title_prop[7]);

// Calculate the height of graph - bars plus gaps some margin
$candidates_height = ($num_candidates * ($bar_height + $bar_spacing) - $bar_spacing);
$height = $title_y + $bar_spacing + ($edge_padding * 2) + $candidates_height;

/*******************************************
  Set up base image
*******************************************/

$im = imagecreatetruecolor($width, $height);
$white = imagecolorallocate($im, 255, 255, 255);
$black = imagecolorallocate($im, 0, 0, 0);
$gray = imagecolorallocate($im, 183, 183, 183);
$orange = imagecolorallocate($im, 255, 157, 0);

imagefill($im, 0, 0, $white);
imagettftext ($im, $title_size, 0, $title_x, $y + $title_y, $black, $font_name, $title);
$y += $title_y + $bar_spacing;
$x_graph = $x + $max_text_width + 15;
$bar_width = $internal_width - $percentuage_box - 10;// - $left_margin - $right_margin;
$bar_unit = ($bar_width - $x_graph) / 100; // one "point on the graph"
$text_factor_adjust = 4;

while ($r_stmt->fetch()){
    
    $votes = $num_votes . '/' . $total_votes;
    $percentuage = round(($num_votes * 100) / $total_votes);
    $percentuage_str = $percentuage . '%';
    $bar_unit_width = $bar_unit * $percentuage;
    
    imagefilledrectangle($im, $x_graph, $y, $x_graph+$bar_unit_width, $y+$bar_height, $orange);
    imagerectangle($im,$x_graph,$y,$bar_width,$y + $bar_height,$black);
    imagettftext ($im, $main_size, 0, $x, $y + ($bar_height / 2) + $text_factor_adjust, $black, $font_name, $candidate);    
    $votes_prop = imagettfbbox($small_size, 0, $font_name, $votes);
    $votes_position = $bar_width - $votes_prop[2] - 15;
    imagettftext ($im, $small_size, 0, $votes_position, $y + ($bar_height / 2) + $text_factor_adjust, $gray, $font_name, $votes);    
    imagettftext ($im, $small_size, 0, $internal_width - $percentuage_box, $y + ($bar_height / 2) + $text_factor_adjust, $black, $font_name, $percentuage_str);    
    $y += $bar_height + $bar_spacing;
    
}

header('Content-type: image/png');
imagepng ($im);

$r_stmt->free_result();
$mysqli->close();

imagedestroy($im);