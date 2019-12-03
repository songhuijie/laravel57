<?php
/**
 * Created by PhpStorm.
 * User: shj
 * Date: 2018/9/27
 * Time: 下午1:56
 */
namespace App\Http\Controllers;




use App\Services\paypallogin;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;
use \Anouar\Paypalpayment\Facades\PaypalPayment;
use App\Libraries\Lib_base;
use App\Libraries\Lib_const_status;
use App\Libraries\Lib_make;
use App\Models\Coin;
use App\Models\Guest;
use App\Services\CaptchaVerifier;


use Braintree\Exception;
use hmphu\payoneer\PayoneerApi;
use hmphu\payoneer\PayoneerConfig;
use hmphu\payoneer\request\PayeeSignupRequest;
use Illuminate\Foundation\Auth\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redis;


use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use InstagramAPI\Exception\InstagramException;
use Laravel\Cashier\Cashier;

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;



class IndexController extends Controller{


    //测试instagram 登录
    public function ins_login(){
        \InstagramAPI\Instagram::$allowDangerousWebUsageAtMyOwnRisk = true;

        $ig=new \InstagramAPI\Instagram();
        try{
            $user_name = 'jiedage1627';
            $password = 'qqzxc159';
            $ig->login($user_name,$password,1800);
            dd($ig);
        }catch (InstagramException $e){
//            dd($e);
            dd($e,$e->getResponse()->exportObjectDataCopy()['challenge']['url']);
        }

    }
    public function tests(){

        if(Auth::user() == null){
            return redirect('login');
        }
        $user = Auth::user();
        $config = [
            'environment'=>config('app.brainTree')['environment'],
            'merchantId'=>config('app.brainTree')['merchantId'],
            'publicKey'=>config('app.brainTree')['publicKey'],
            'privateKey'=>config('app.brainTree')['privateKey']
        ];
        $gateway = new \Braintree\Gateway($config);


//        $plans = $gateway->plan()->all();
//        $gateway = app(\Braintree\Gateway::class);
//        $plans = $gateway->plan()->all();



//        dd($gateway->clientToken()->generate());
//        dd($gateway->plan()->all());
        // Then, create a transaction:
        $paymentMethodNoce = 'tokencc_bf_wq222f_42krd4_hscvdq_p5fpc6_b37';



//        dd($gateway->plan()->all());


//        $result = $gateway->customer()->create([
//            'firstName' => $user->name,
//            'lastName' => $user->name,
//            'company' => '',
//            'email' => $user->email,
//            'phone' => '',
//            'fax' => '',
//            'website' => ''
//        ]);

        $result = $gateway->paymentMethod()->create([
            'customerId' => 2459668312,
            'paymentMethodNonce' => $paymentMethodNoce
        ]);
        dd($result->success,$result);
        try{

            $user_own = $gateway->customer()->find(2459668312);
            dd($user_own);
        }catch (Exception $e){
            dd($e);
        }


//        $id = 245966831;
//
//
//        $result = $gateway->paymentMethod()->create([
//            'customerId' => $id,
//            'paymentMethodNonce' => $paymentMethodNoce
//        ]);

//        $gateway->subscription()->cancel();

        $subscriptions = [
            'paymentMethodToken' => '4nymsn',
            'planId' => 'one_day'
        ];

        $result = $gateway->subscription()->create($subscriptions);
        dd($result);
        $gateway->subscription()->create([

        ]);
        $result = $gateway->transaction()->sale([
            'amount' => '1000.00',
            'paymentMethodNonce' => $paymentMethodNoce,
            'options' => [ 'submitForSettlement' => true ]
        ]);

        dd($result);
//        $apiUser= 'Fmghlma47@gmail.com';
//        $apiPassword= '39kcbdr18!';
//        $partnerId= '30941831';
//
//        $config = new PayoneerConfig($apiUser,$apiPassword,$partnerId,true);
//        $payonner = new PayoneerApi($config);
//
//        $version = $payonner->getTokenXML();

//        dd($version);

//        $payeeId = '30941831';
//        $redirectUrl = 'www.laravel57.com:8888';
//        $sessionId = '123';
//        $redirectTime = '10';
//        $testAccount = 'false'; //Auto approve account or not
//        $xmlResponse = 'true';
//        $payoutMethods = ['PrepaidCard','iACH'];
//        $achMode = 'Regular';
//        $signup = new PayeeSignupRequest($payeeId,$redirectUrl,$sessionId,$redirectTime,$testAccount,$xmlResponse,$payoutMethods,$achMode);
//        $status = $payonner->getToken($signup);
//        dd($payonner,$status);


        return view('index.test');

        $a= [
            26,
            27,
            28,
            26101,
            26102,
            26103,
            26104,
            26105,
            26106,
            26107,
            26108,
            26109,
            26110,
            26111,
            27102,
            27103,
            27104,
            27106,
            27107,
            27108,
            27109,
            27111,
            27113,
            27114,
            27115,
            27116,
            27117,
            27118,
            27119,
            27120,
            27121,
            27122,
            27123,
            27124,
            27125,
            27126,
            27127,
            27128,
            28101,
            28105,
            28106,
            28107,
            28108,
            28109,
            28110,
            28111
        ];
        foreach($a as $k=>$v){
            if($v == 26 || $v == 27 || $v == 28){
                echo $v.'=>'.'"大阪",'.'</br>';
            }else{
                if(substr($v , 0 , 2) == '26'){
                    echo $v.'=>'.'"京都",'.'</br>';
                }elseif(substr($v , 0 , 2) == '27'){
                    echo $v.'=>'.'"大阪",'.'</br>';
                }elseif(substr($v , 0 , 2) == '28'){
                    echo $v.'=>'.'"神户",'.'</br>';
                }
            }

        }
        dd($a);
        $coinList = Coin::getCoinIcon();
        $arr =[] ;
        $path = '';
        $names = [];
        foreach($coinList as $k=>$v){
            $result = explode('/',$v->coin_icon);
            $filename = end($result);
            ksort($result);
            end($result);
            unset($result[key( $result )]);

            $path = implode('/',$result);

            $arr[]=$filename;
            $names[]=$v->coin_symbol;
        }
        $coin = new \stdClass();
        $coin->files = $arr;
        $coin->names = $names;
        $coin->url = $path.'/';

        dd($coin);
        return view('blog.tests');
    }
    public function testss(Request $request){
        if($request->method() == 'GET'){

            return view('index.test');
        }else{

            $plan_id = $request->get('plan_id');
            $paymentMethodNonce = $request->get('paymentMethodNonce');
            $gateway = app(\Braintree\Gateway::class);

            $user = Auth::user();

        }
    }
    public function testsss(Request $request){
        require '/Applications/MAMP/htdocs/htdocs/laravel57/public/PHP-SDK-master/wepay.php';

        $client_id = '34740';
        $client_secret = 'a597c80332';
        $access_token = 'STAGE_97a06e0679dd67d0a238fb5109306b024e77f61b73f52a929c94a40dfd64a11a';

        $account_id = 1021763133;
        $account_id = 441978298;
        $account_id = 148661532;
//        $code = '412ea9d3658c929169fd11139b35f40fc96050e64db5e0651c';
//        $redirect_uri = 'http://pay.followerstagmanager.xyz/pay/test';
        \WePay::useStaging($client_id,$client_secret);
//        $response = \WePay::getToken($code,$redirect_uri);

        $wepay = new \WePay($access_token);
// register new merchant
//        $response = $wepay->request('account/create/', array(
//            'name'         => '2677060927@qq.com',
//            'description'  => 'A description for your account.'
//        ));
//        $response = $wepay->request('checkout/create', array(
//            'account_id'        => $account_id,
//            'amount'            => '10',
//            'short_description' => 'one Month Vip',
//            'type'              => 'service',
//            'currency'          => 'USD',
//        ));
        $response = $wepay->request('/account', array(
            'account_id'        => $account_id,
        ));
        // display the response
        dd($response);
    }
    public function tt(Request $request){
        if($request->method() == 'GET'){


//            $apiContext = new \PayPal\Rest\ApiContext(
//                new \PayPal\Auth\OAuthTokenCredential(
//                    'AUScFI58k8cNfEGe3cbyPpdtOvYlr3bw1ZZaBGtQaxkyxuOH_Qw5RgAvBKjUg93iLDewNuhcKC2k42Z1',
//                    'ENyrNCwCVwvMpL8yJqBbW1SZuXXFdnz3dVQ3PAWmp1RdawC1lsblazbJMGfJM3jBSjo1xzlY_3h5-ue5'
//                )
//            );
//            $apiContext->setConfig(
//                array(
////                    'mode' => 'live',
//                    'mode' => 'sandbox',
//                    'log.LogEnabled' => true,
//                    'log.FileName' => '../PayPal.log',
//                    'log.LogLevel' => 'DEBUG', // PLEASE USE `INFO` LEVEL FOR LOGGING IN LIVE ENVIRONMENTS
//                    'cache.enabled' => true,
//                )
//            );
//
////            $paymentId = $_GET['paymentId'];
//            $paymentId = 'PAYID-LSHS77Q1LX99010V2854692W';
//            $payment = Payment::get($paymentId, $apiContext);
////            $payerId = $_GET['PayerID'];
//            $payerId = '55NH46QBEEYWJ';
//
//            $execution = new PaymentExecution();
//            $execution->setPayerId($payerId);
//
//            try {
//                // Execute payment
//                $result = $payment->execute($execution, $apiContext);
//                dd($result);
//            } catch (\Exception $ex) {
//                dd($ex,$ex->getCode(),$ex->getData());
//            } catch (Exception $ex) {
//                dd($ex);
//            }

            return view('index.tests');
        }else{

            $data = $request->all();
            \Stripe\Stripe::setApiKey('sk_test_vLIyDd6j0Hw6KXwB3buSMa73');

            $plan = $data['plan'];
            $stripeToken = $data['stripeToken'];

            $amount = 0;
            if($plan == 1){
                $amount = 1000;
            }elseif($plan  == 2){
                $amount = 2000;
            }elseif($plan  == 3){
                $amount = 3000;
            }else{
                $amount = 1000;
            }
            \Stripe\Charge::create([
                "amount" => $amount,
                "currency" => "jpy",
                "source" => $stripeToken, // obtained with Stripe.js
                "description" => "1 month"
            ]);
            dd('success');
        }
    }

    public function shop(){


//        return view('index.testss');
//        return view('index.testsss');


        $url = 'https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=EC-2BV65514H5816854M';
        $token = trim(strrchr($url, '='),'=');
        dd($url,$token);

        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'AUScFI58k8cNfEGe3cbyPpdtOvYlr3bw1ZZaBGtQaxkyxuOH_Qw5RgAvBKjUg93iLDewNuhcKC2k42Z1',
                'ENyrNCwCVwvMpL8yJqBbW1SZuXXFdnz3dVQ3PAWmp1RdawC1lsblazbJMGfJM3jBSjo1xzlY_3h5-ue5'
            )
//            new \PayPal\Auth\OAuthTokenCredential(
//                'AXZi1cE-8D7OyObAOjyfowOm3m4kxsGQX8jYtP0sxLjnICVzdbhm1Newxkb8bu5F3mfTEN8RoXj7knHk',
//                'EBupsfIxLw_sWubBSvPdXIfw2tEZ4XJ8jqTyku_MZVpxHw4hG94Y95mNtwFzWf5S29twos9gFUF8KdlI'
//            )
        );
        $apiContext->setConfig(
            array(
                'mode' => 'sandbox',
                'log.LogEnabled' => true,
                'log.FileName' => '../PayPal.log',
                'log.LogLevel' => 'DEBUG', // PLEASE USE `INFO` LEVEL FOR LOGGING IN LIVE ENVIRONMENTS
                'cache.enabled' => true,
            )
        );

        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

// Set redirect URLs
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl('https://www.buyzachary.xyz/user.php/mall/pay_pal_handle')
            ->setCancelUrl('https://www.buyzachary.xyz/user.php/mall/pay_pal_handle');

// Set payment amount
        $amount = new Amount();
        $amount->setCurrency("JPY")
            ->setTotal(2200);

// Set transaction object
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setDescription("one year vip");

// Create the full payment object
        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));


        try {
            $payment->create($apiContext);

            // Get PayPal redirect URL and redirect the customer
            $approvalUrl = $payment->getApprovalLink();

            dd($approvalUrl);
            // Redirect the customer to $approvalUrl
        } catch (PayPal\Exception\PayPalConnectionException $ex) {
            echo $ex->getCode();
            echo $ex->getData();
            dd($ex);
        } catch (Exception $ex) {
            dd($ex);
        }


        $redirect_uri = 'http://pay.followerstagmanager.xyz/pay/test';
        $client_id = config('paypal_payment.account.client_id');
        $client_secret = config('paypal_payment.account.client_secret');
        $scope = 'openid email phone profile address https://uri.paypal.com/services/paypalattributes';
        $state = '';
        $paypal = new paypallogin($redirect_uri,$client_id,$client_secret,$scope,$state);

        $json = $paypal->getOauthToken();

        $data = json_decode($json,true);
        $access_token = $data['access_token'];

        $name = 'one Month';
        $desciption = 'one Month Vip';
        $type = 'INFINITE';
        $data = "{\n  \'name\': \'Plan with Regular and Trial Payment Definitions\',\n  \'description\': \'Plan with regular and trial payment definitions.\',\n  \'type\': \'FIXED\',\n  \'payment_definitions\': [\n  {\n    \'name\': \'Regular payment definition\',\n    \'type\': \'REGULAR\',\n    \'frequency\': \'MONTH\',\n    \'frequency_interval\': \'2\',\n    \'amount\': {\n    \'value\': \'100\',\n    \'currency\': \'USD\'\n    },\n    \'cycles\': \'12\',\n    \'charge_models\': [\n    {\n      \'type\': \'SHIPPING\',\n      \'amount\': {\n      \'value\': \'10\',\n      \'currency\': \'USD\'\n      }\n    },\n    {\n      \'type\': \'TAX\',\n      \'amount\': {\n      \'value\': \'12\',\n      \'currency\': \'USD\'\n      }\n    }\n    ]\n  }\n  ],\n  \'merchant_preferences\': {\n  \'setup_fee\': {\n    \'value\': \'1\',\n    \'currency\': \'USD\'\n  },\n  \'return_url\': \'https://example.com\',\n  \'cancel_url\': \'https://example.com/cancel\',\n  \'auto_bill_amount\': \'YES\',\n  \'initial_fail_amount_action\': \'CONTINUE\',\n  \'max_fail_attempts\': \'0\'\n  }\n}
";

        $plan = $paypal->billing_plans($access_token,$data);

        dd($access_token,$plan);

        dd($paypal);


//        $redirect_uri = 'http://pay.followerstagmanager.xyz/pay/test';
//        $client_id = config('paypal_payment.account')['client_id'];
//        $client_secret = config('paypal_payment.account')['client_secret'];
//        $scope = 'openid email phone profile address https://uri.paypal.com/services/paypalattributes';
//        $state = '';
//
//        $paypal = new paypallogin($redirect_uri,$client_id,$client_secret,$scope,$state);
//
//        $accesstoken = $paypal->getOauthToken();
//        dd($accesstoken);

        // ### Address
        // Base Address object used as shipping or billing
        // address in a payment. [Optional]
        $shippingAddress = Paypalpayment::shippingAddress();
        $shippingAddress->setLine1("3909 Witmer Road")
            ->setLine2("Niagara Falls")
            ->setCity("Niagara Falls")
            ->setState("NY")
            ->setPostalCode("14305")
            ->setCountryCode("US")
            ->setPhone("716-298-1822")
            ->setRecipientName("Jhone");

        // ### CreditCard
        $card = Paypalpayment::creditCard();
        $card->setType("visa")
            ->setNumber("4524794563721825")
            ->setExpireMonth("09")
            ->setExpireYear("2027")
            ->setCvv2("029")
            ->setFirstName("Joe")
            ->setLastName("Shopper");

        // ### FundingInstrument
        // A resource representing a Payer's funding instrument.
        // Use a Payer ID (A unique identifier of the payer generated
        // and provided by the facilitator. This is required when
        // creating or using a tokenized funding instrument)
        // and the `CreditCardDetails`
        $fi = Paypalpayment::fundingInstrument();
        $fi->setCreditCard($card);

        // ### Payer
        // A resource representing a Payer that funds a payment
        // Use the List of `FundingInstrument` and the Payment Method
        // as 'credit_card'
        $payer = Paypalpayment::payer();
        $payer->setPaymentMethod("credit_card")
            ->setFundingInstruments([$fi]);

        $item1 = Paypalpayment::item();
        $item1->setName('Ground Coffee 40 oz')
            ->setDescription('Ground Coffee 40 oz')
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setTax(0.3)
            ->setPrice(7.50);

        $item2 = Paypalpayment::item();
        $item2->setName('Granola bars')
            ->setDescription('Granola Bars with Peanuts')
            ->setCurrency('USD')
            ->setQuantity(5)
            ->setTax(0.2)
            ->setPrice(2);


        $itemList = Paypalpayment::itemList();
        $itemList->setItems([$item1,$item2])
            ->setShippingAddress($shippingAddress);


        $details = Paypalpayment::details();
        $details->setShipping("1.2")
            ->setTax("1.3")
            //total of items prices
            ->setSubtotal("17.5");

        //Payment Amount
        $amount = Paypalpayment::amount();
        $amount->setCurrency("USD")
            // the total is $17.8 = (16 + 0.6) * 1 ( of quantity) + 1.2 ( of Shipping).
            ->setTotal("20")
            ->setDetails($details);

        // ### Transaction
        // A transaction defines the contract of a
        // payment - what is the payment for and who
        // is fulfilling it. Transaction is created with
        // a `Payee` and `Amount` types

        $transaction = Paypalpayment::transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Payment description")
            ->setInvoiceNumber(uniqid());

        // ### Payment
        // A Payment Resource; create one using
        // the above types and intent as 'sale'

        $payment = Paypalpayment::payment();

        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setTransactions([$transaction]);

        try {
            // ### Create Payment
            // Create a payment by posting to the APIService
            // using a valid ApiContext
            // The return object contains the status;
            $payment->create(Paypalpayment::apiContext());
        } catch (\Exception $ex) {
            return response()->json(["error" => $ex->getMessage()], 400);
        }

        return response()->json([$payment->toArray()], 200);

        dd($shippingAddress,$card,$fi);
    }


    public function index(User $user){
        $guest = Guest::where(['email'=>'2677060927@qq.com'])->first();

        return view('blog.test');
        dd($guest,Cookie::get('id'),Session::all(),Lib_make::Guests());

        $array = ['foo' => 'bar','foo2'=>'bar2'];

        list($keys, $values) = array_divide($array);

        $array = ['foo' => 'bar'];
        $array = array_add($array, 'key', 'value');


        $array = ['foo' => ['bar' => 'baz']];
        $array = array_dot($array);

        $array = ['keys'=>'values', 'to'=>'foo', 'remove'=>'foo2','foo'=>'foo3'];
        $array = array_except($array, ['keys', 'to', 'remove']);

//        $array = [
//            ['developer' => ['name' => 'Taylor']],
//            ['developer' => ['name' => 'Dayle']]
//        ];
//
//        $array = array_fetch($array, 'developer.name');
        // ['Taylor', 'Dayle'];

        $array = [150, 150, 200, 300];

        $value = array_first($array, function($key, $value)
        {
            return $value >= 150;
        });

        $bool = str_is('fob*', 'foobar');
        $plural = str_plural('fy');
        $url = action('IndexController@index', ['id'=>'jiedage']);
        $token = csrf_token();

        dd($bool,$plural,$url,$token);

        return view('index.index');
    }


    public function postLogin(Request $request){

        if($request->method() == 'GET'){

            return view('index.postlogin');
        }else{
            $result = app(CaptchaVerifier::class)->verify($request->get('NECaptchaValidate'),'');
            dd($result,app(CaptchaVerifier::class));
        }

    }


    //首页
    public function blog(){

//        $collection = collect([1, 2, 3, 4, 5]);

//        $collection->prepend(6);

        //上个月  下个月

//        var_dump(date("Y-m-d", strtotime("last day of -1 year", strtotime("2018-10-9"))));
//        var_dump(date("Y-m-d", strtotime("first day of +1 year", strtotime("2017-02-29"))));
//
//        dd($collection,$collection->all());


        return view('blog.index');

    }

    //登录
    public function sign(Request $request){


        if($request->method() == 'GET'){
            return view('blog.login');
        }else{

            $requests = $request->all();

            $validator = Validator::make(
                $requests,
                [
                    'email' => 'required|email',
                    'password' => 'required|min:8|regex:/^(?=\S*[A-Z])(?=\S*[\d])\S*$/',
                ]
            );
            $result = $validator->errors()->getMessages();
            $response_json = Lib_make::initResponse();

            if(empty($result)){

                $status = Lib_make::GuestLogin($requests['email'],$requests['password'],$request->get('remember'));
                if($status == Lib_const_status::SUCCESS){
                    $response_json->code  = Lib_const_status::CORRECT;
                    $response_json->status = Lib_const_status::SUCCESS;
                }else{
                    $response_json->code  = Lib_const_status::ERROR;
                    $response_json->msg  = trans("error_message.$status");
                    $response_json->status = $status;
                }
                return response()->json($response_json);
            }else{
                $response_json->code  = Lib_const_status::ERROR;
                $response_json->status = Lib_const_status::SERVICE_ERROR;
                $response_json->msg = current($result)[0];
                return response()->json($response_json);
            }


        }


    }

    //注册
    public function signUp(Request $request){

        if($request->method() == 'GET'){
            return view('blog.register');
        }else{
            $data = $request->all();
            $validator = Validator::make(
                $data,
                [
                    'name' => 'required',
                    'email' => 'required|email|unique:guest',
                    'password' => 'required|min:8|regex:/^(?=\S*[A-Z])(?=\S*[\d])\S*$/',
                    're-password' => 'required|min:8|same:password'
                ]
            );

            $result = $validator->errors()->getMessages();
            $response_json = Lib_make::initResponse();
            if(empty($result)){

                $array = [
                    'name'=>$data['name'],
                    'email'=>$data['email'],
                    'password'=>md5($data['password']),
                    'portrait'=>$data['portrait']==null?'1.png':$data['portrait'],
                ];
                Guest::create($array);

                $code = rand(100000,999999);
                Lib_make::SendMail($array['email'],$array['name'],$code);
                $event = Lib_base::SEND_CODE;
                $events = sprintf($event,$data['email']);
                Redis::setex($events,600,$code);

                Session::put('email',$data['email']);

                $response_json->code  = Lib_const_status::CORRECT;
                $response_json->status = Lib_const_status::SUCCESS;
                return response()->json($response_json);

            }else{

                $response_json->code  = Lib_const_status::ERROR;
                $response_json->status = Lib_const_status::SERVICE_ERROR;
                $response_json->msg = current($result)[0];
                return response()->json($response_json);
            }

        }


    }





    //上传头像
    public function portrait(Request $request){


        $config = [
            'ext'=>['jpg','jpeg','png'],
            'size'=>2000000,
            'w'=>128,
            'h'=>128
        ];
        $response_json = Lib_make::initResponse();

        $file_info = $request->file('file');
        if(! $file_info || ! $file_info->isValid()){
            $response_json->status = Lib_const_status::FILE_ERROR_UPLOAD;
            return response()->json($response_json);
        }

        try{
            $file_ext = $file_info->getClientOriginalExtension() == null?$file_info->extension():$file_info->extension();

        }catch (\Exception $e){
            $response_json->status = Lib_const_status::FILE_ERROR_DENY_EXT;
            $response_json->data->ext = 1;
            return response()->json($response_json);
        }

        if(! in_array($file_ext, $config['ext'])){
            $response_json->status = Lib_const_status::FILE_ERROR_DENY_EXT;
            $response_json->data->ext = $file_ext;
            return response()->json($response_json);
        }
        $file_size = $file_info->getSize();
        if($file_size <= 0 || $file_size >$config['size']){
            $response_json->status = Lib_const_status::FILE_ERROR_DENY_SIZE;
            return response()->json($response_json);
        }
        //处理圆形图片



            $imgpath = $file_info;
            $src_img = null;
            switch ($file_ext) {
                case 'jpg':
                    $src_img = imagecreatefromjpeg($imgpath);
                    break;
                case 'jpeg':
                    $src_img = imagecreatefromjpeg($imgpath);
                    break;
                case 'png':
                    $src_img = imagecreatefrompng($imgpath);
                    break;
            }
            if($src_img == null){
                $response_json->status = Lib_const_status::FILE_ERROR_UPLOAD;
                return response()->json($response_json);
            }

            $wh  = getimagesize($imgpath);
            $w   = $wh[0];
            $h   = $wh[1];
            $w   = min($w, $h);
            if($w != $config['h'] && $h != $config['w']){
                $response_json->status = Lib_const_status::FILE_ERROR_DENY_W_H;
                $response_json->message = '文件宽高限制';
                return response()->json($response_json);
            }
            $h   = $w = $config['h'];
            $img = imagecreatetruecolor($w, $h);
            //这一句一定要有
            imagesavealpha($img, true);
            //拾取一个完全透明的颜色,最后一个参数127为全透明
            $bg = imagecolorallocatealpha($img, 255, 255, 255, 127);
            imagefill($img, 0, 0, $bg);
            $r   = $w /2; //圆半径
            $y_x = $r; //圆心X坐标
            $y_y = $r; //圆心Y坐标
            for ($x = 0; $x < $w; $x++) {
                for ($y = 0; $y < $h; $y++) {
                    $rgbColor = imagecolorat($src_img, $x, $y);
                    if (((($x - $r) * ($x - $r) + ($y - $r) * ($y - $r)) < ($r * $r))) {
                        imagesetpixel($img, $x, $y, $rgbColor);
                    }
                }
            }
            $filename = date('Ymd').uniqid().'.png';
            imagepng($img,storage_path().'/app/public/upcoins/'.$filename);
            $response_json->code = Lib_const_status::CORRECT;
            $response_json->status = Lib_const_status::SUCCESS;
            $response_json->data->path = Storage::url('upcoins/'.$filename);
            return response()->json($response_json);


    }

    //验证注册码
    public function verifySignUp(Request $request){

        if($request->method() == 'GET'){

            return view('blog.verify_register');
        }else{

            $code = $request->input('code');

            $response_json = Lib_make::initResponse();
            if(empty($code)){
                $response_json->status = Lib_const_status::ERROR_REQUEST_PARAMETER;
                return response()->json($response_json);
            }
            $email = Session::get('email');
            $event = Lib_base::SEND_CODE;
            $redis_key = sprintf($event,$email);

            $int = Lib_make::VerifyCode($redis_key,$code);

            if($int < 0){
                $response_json->status = Lib_const_status::MAIL_ERROR_VERIFICATION_CODE_TIME;
                return response()->json($response_json);
            }elseif($int > 0){
                $response_json->status = Lib_const_status::MAIL_ERROR_VERIFICATION_CODE;
                return response()->json($response_json);
            }else{

                $guest = Guest::where(['email'=>$email])->first();
                if(!empty($guest)){
                    Guest::where(['email'=>$email])->update(['status'=>1]);
                }
                $response_json->code = Lib_const_status::CORRECT;
                $response_json->status = Lib_const_status::SUCCESS;
                return response()->json($response_json);
            }

        }

    }

    //单独调用发送邮件验证码
    public function SendMailCode(Request $request){

        $email = $request->get('email');
        $code = rand(100000,999999);
        Lib_make::SendMail($email,'',$code);
        $response_json = Lib_make::initResponse();
        $response_json->code = Lib_const_status::CORRECT;
        $response_json->status = Lib_const_status::SUCCESS;
        return response()->json($response_json);
    }

    //获取redis
    public function redis(){
        dd(Redis::get('key'));
    }

    //发送短信
    public function sendPhone(){

        return view('blog.sendphone');

    }



    public function test2(){

        dd(json_decode('{content:Helloworld!}'));
        $data = [
            'purchase_token' => 'liaaehkekejnbejnoncheadn.AO-J1OwIduuH2Q-7LJaZme9MUoKvOE9n8VZjE6RU8xlEPrxOIKWr8OmzUTj9hbq71EFk6s2ii3mVICn7DXWU3k6P5jiHVJB4KFqazKEO7RuFNtr2uyg1BqT-X3n_o2HmdiVQ1A4QgsbGFst7dswIi2gVxMSy3Inv9o-FzeVSsr3j4aePS4MDGgY',
            'package_name' => 'com.unfollowers.tracker.insight',
            'product_id' => 'com.unfollowers.tracker.insight.oneyear',
            'uuid' => 'jiedage',
        ];

        $url = 'http://followersmanagertool.xyz/registerpush';
        $url = 'http://followersmanagertool.xyz/addpush';
        $url = 'http://followersmanagertool.xyz/addvpush';
        $url = 'http://followersmanagertool.xyz/fmsub';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        $response = curl_exec($ch);
        curl_close($ch);
        dd($response);

    }

    //

}
