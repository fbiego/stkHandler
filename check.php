<?php
function search($query)
{
    $file = file("daraja.txt");
    $file = array_reverse($file);

    $merchant = '"merchantID":"' . $query . '"';
    $checkout = '"checkoutID":"' . $query . '"';
    $transaction = '"txID":"' . $query . '"';
    foreach ($file as $line)
    {
        if (strpos($line, $merchant) !== false)
        {
            return $line;
        }
        if (strpos($line, $checkout) !== false)
        {
            return $line;
        }
        if (strpos($line, $transaction) !== false)
        {
            return $line;
        }

    }
    return '{"success":false,"message":"Transaction not found"}';
}

header('Content-type: application/json');
if (isset($_GET['query']))
{
    $q = $_GET['query'];
    echo search($q);
}
else
{
    echo '{"success":false,"message":"Specify a merchant or checkout code using \'?query=\'"}';
}

?>
