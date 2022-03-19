# stkHandler
Receive transaction data after an MPESA STK push request

## Demo

- Set you callback url as `https://api.fbiego.com/v1/mpesa/callback`

- After the STK push, check you transaction status by passing the merchant or checkout code using '?query='

> [`https://api.fbiego.com/v1/mpesa/check?query=34030-114560969-1`](https://api.fbiego.com/v1/mpesa/check?query=34030-114560969-1)

> [`https://api.fbiego.com/v1/mpesa/check?query=64440-12873231-1`](https://api.fbiego.com/v1/mpesa/check?query=64440-12873231-1)

