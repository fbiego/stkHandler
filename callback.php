<?php
$json = file_get_contents('php://input');
$data = json_decode($json, true);

$result['success'] = true;

if ($data['Body']['stkCallback']['ResultCode']; == 0)
{
    $result['paid'] = true;
    $result['message'] = "Payment successful";

    //successful transaction
    $result['amount'] = $data['Body']['stkCallback']['CallbackMetadata']['Item'][0]['Value'];
    $result['txID'] = $data['Body']['stkCallback']['CallbackMetadata']['Item'][1]['Value'];
    $result['balance'] = $data['Body']['stkCallback']['CallbackMetadata']['Item'][2]['Value'];
    $result['date'] = $data['Body']['stkCallback']['CallbackMetadata']['Item'][3]['Value'];
    $result['number'] = $data['Body']['stkCallback']['CallbackMetadata']['Item'][4]['Value'];

}
else
{
    $result['paid'] = false;
    $result['message'] = "Payment cancelled";
}

$result['merchantID'] = $data['Body']['stkCallback']['MerchantRequestID'];
$result['checkoutID'] = $data['Body']['stkCallback']['CheckoutRequestID'];
$result['resultCode'] = $data['Body']['stkCallback']['ResultCode'];
$result['resultDesc'] = $data['Body']['stkCallback']['ResultDesc'];

$encoded = json_encode($result);
file_put_contents("daraja.txt", $encoded . "\n", FILE_APPEND);
?>
