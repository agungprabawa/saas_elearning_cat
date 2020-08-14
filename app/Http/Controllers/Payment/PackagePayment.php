<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use XenditClient\XenditPHPClient;

class PackagePayment extends Controller
{
    private $XGateway;
    public function __construct()
    {
        $option['secret_api_key'] = "xnd_development_7aF9gEqqHqtw48M6QrvwMWkCel1eZ9QvAq2mzFghzKbfms4a4jJ4AzBXHhfdCQLm";
        $this->XGateway = new XenditPHPClient($option);
    }

    public function processPaymentData($packageId, $elearning = 0, $cat = 0, $member = 0)
    { }

    public function subscribe(Request $request)
    { }

    public function subscribtionEdit()
    { }

    public function subscribtionPause()
    { }
}
