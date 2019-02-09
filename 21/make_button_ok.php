<?php

$button_text = "Our Company";

// Create an image using the right color of button, and check the size
$im = imagecreatefrompng('button/button_red.png');


$width_image = imagesx($im); // Estraggo la larghezza dell'immagine
$height_image = imagesy($im); // Estraggo l'altezza dell'immagine

// Our images need an 18 pixel margin in from the edge of the image
$width_image_wo_margins = $width_image - (2 * 18);
$height_image_wo_margins = $height_image - (2 * 18);

// Tell GD2 where the font you want to use resides

// For Windows, use:
// putenv('GDFONTPATH=C:\WINDOWS\Fonts');


// For UNIX, use the full path to the font folder.
// In this example we're using the DejaVu font family:
//putenv('GDFONTPATH=/Library/Fonts/Arial.ttf');

$font = './Zapfino.ttf';

//$font_name = 'Arial';

// Work out if the font size will fit and make it smaller until it does
// Start out with the biggest size that will reasonably fit on our buttons
$font_size = 70;


do
{
    $font_size--;

    // Find out the size of the text at that font size
    // Defiisco il riquadro di delimitazione del testo
    $bbox = imagettfbbox($font_size, 0, $font, $button_text);

    $right_text = $bbox[2]; // right co-ordinate
    $left_text = $bbox[0];  // left co-ordinate
    $width_text = $right_text - $left_text;   // how wide is it?
    $height_text = abs($bbox[7] - $bbox[1]);  // how tall is it?

} while ($font_size > 8 &&
    ($height_text >= $height_image_wo_margins ||
        $width_text >= $width_image_wo_margins)
    );

if ($height_text > $height_image_wo_margins ||
    $width_text > $width_image_wo_margins){
    // no readable font size will fit on button
    echo '<p>Text given will not fit on button.</p>';
}else{
    // We have found a font size that will fit.
    // Now work out where to put it.

    // calcolo il centro dell'immagine per posizonare il testo
    $text_x = $width_image / 2.0 - $width_text / 2.0;
    
    if ($left_text < 0){
        $text_x += abs($left_text);     // add factor for left overhang
    }else{
        $text_x -= $left_text;     // add factor for left overhang
    }

    $text_y = $height_image / 2.0 - $height_text / 2.0 ;
    
    $text_y += (($height_text - (abs($bbox[1])) / 2)); // non centro il testo in base al baseline ma calcolo approssimativamente il centro del testo

    $percentage = 50;
    $totalWidth = 350;

    //$new_width = ($percentage / 100) * $totalWidth;

    $text_y -= (10/100) * abs($bbox[1]);  // adjustment factor for shape of our template
    
    $white = imagecolorallocate ($im, 255, 255, 255);

    imagettftext ($im, $font_size, 0, $text_x, $text_y, $white,
                    $font, $button_text);
    
    header('Content-type: image/png');
    imagepng ($im);
}

// Clean up the resources
imagedestroy ($im);

?>