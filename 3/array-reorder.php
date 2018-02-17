<?php

/*
 *  shuffle() - dato un array ritorna un array di elementi con ordine random
 *  array_reverse() - dato un array ritorna un array di elementi ordinati al contrario
 */

$number = range(0, 12);
shuffle($number);

echo var_dump($number);


$number_2 = range(0, 12);

echo var_dump( array_reverse($number_2) );

$image_range = range(1,4);
shuffle($image_range);


?>


<html>
    <head>
    </head>
    <body>
        <h1>Bob auto parts</h1>
        <div align="centet">
            <table>
                <tr>
                    <?php foreach ($image_range as $item){ ?>
                        <td>
                            <img src="img/<?php echo $item; ?>.jpg" width="200">
                        </td>
                    <?php }?>
                </tr>
            </table>
        </div>
    </body>
</html>
