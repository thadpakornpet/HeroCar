<?php
//include "../gateway/tesco.php";

use DpMerchant\Helper\Classes\Security;

loadconfig("config_db.php");

class BPaymentUtil
{
    const CDMA_FIXEDREF2 = '1108';
    const CDMA_TYPE = 'CDMA';

    const CHN_KTB = "ktb";
    const CHN_BBL = "bbl";
    const CHN_KBANK = "kbank";
    const CHN_KBANK_SCG = "kbank_scg";
    const CHN_SCB = "scb";
    const CHN_KRUNGSRI = "bay";
    const CHN_CENTRAL = "cenpay";
    const CHN_FAMILY_WEB = "family";
    const CHN_TESCO = "tesco";
    const CHN_BIGC = "bigc";
    const CHN_CREDIT = "credit";
    const CHN_UTOPUP = "utopup";
    const CHN_TNC = "tnc";

    //USE BY SILKSPAN DIRIECT API
    const CHN_FAMILY_API = "FM";
    const CHN_CENTRAL_API = "CN";

    public static function urlGenerator($url = '', $add_query = '')
    {
        $url = rtrim($url, '&');
        $url = rtrim($url, '?');
        $parse_url = parse_url($url);

        // $add_query = 'ReturnCode=1&Chn=offline';

        // $url.='?';
        if (isset($parse_url['query'])) {
            $url = rtrim($url, '/');
            $url .= '&';
        } else {
            $url .= '?';
        }
        $url .= $add_query;
        return $url;
    }

    public static function isBillPayment($ref1)
    {
        if (strlen($ref1) > 2) {
            $ref1 = substr($ref1, 0, 2);
            if ($ref1 == "31" || $ref1 == "32" || $ref1 == "33" || $ref1 == "34" || $ref1 == "35") {
                return true;
            }
        }
        return false;
    }

    public static function getCreditCardPayment($logInvoiceID, $invoice, $ref1, $ref2, $amount, $memberID, $chnnel, $isBypass = false, $front_url = null, $gatewaySource)
    {
        $bill = new BPayment();
        $bank = "";
        switch ($gatewaySource) {
                //tnc
            case '18':
                $bank = CURRENT_CONFIG == PRODUCTION ? $bill->getCreditTNCForm($logInvoiceID, $ref1, $ref2, $amount, $memberID) : $bill->getCreditTNCForm($logInvoiceID, $ref1, $ref2, $amount, $memberID, true);
                break;
                //credit_kbank
            case '29':
                $bank = CURRENT_CONFIG == PRODUCTION ? $bill->getCreditForm_SCG($logInvoiceID, $ref1, $ref2, $amount, $memberID, $gatewaySource) : $bill->getCreditForm_SCG($logInvoiceID, $ref1, $ref2, $amount, $memberID, $gatewaySource, true);
                break;
                //credit_bbl
            case '30':
                $bank = CURRENT_CONFIG == PRODUCTION ? $bill->getBBLCreditFrom() : $bill->getCreditForm($logInvoiceID, $ref1, $ref2, $amount, $memberID, true);
                break;
                // credit_scb
            case '31':
                $bank = CURRENT_CONFIG == PRODUCTION ? $bill->getSCBCreditFrom($logInvoiceID, $ref1, $ref2, $amount, $memberID) : $bill->getSCBCreditFrom($logInvoiceID, $ref1, $ref2, $amount, $memberID, true);
                break;
                // credit_bay
            case '32':
                $bank = CURRENT_CONFIG == PRODUCTION ? $bill->getBAYCreditFrom() : $bill->getCreditForm($logInvoiceID, $ref1, $ref2, $amount, $memberID, true);
                break;
                // credit_oth
            case '33':
                $bank = CURRENT_CONFIG == PRODUCTION ? $bill->getOTHCreditFrom() : $bill->getCreditForm($logInvoiceID, $ref1, $ref2, $amount, $memberID, true);
                break;
            case '34':
                $bank = CURRENT_CONFIG == PRODUCTION ? $bill->getOTHCreditFrom() : $bill->getCreditForm($logInvoiceID, $ref1, $ref2, $amount, $memberID, true);
                break;
            case '35':
                $bank = CURRENT_CONFIG == PRODUCTION ? $bill->getOTHCreditFrom() : $bill->getCreditForm($logInvoiceID, $ref1, $ref2, $amount, $memberID, true);
                break;
        }
        $bill->closeDb();
        return $bank;
    }
    public static function getOnlinePayment($logInvoiceID, $invoice, $ref1, $ref2, $amount, $memberID, $chnnel, $isBypass = false, $front_url = null)
    {
        $bill = new BPayment();
        $bank = "";
        switch ($chnnel) {
            case "ktb":
                $bank = CURRENT_CONFIG == PRODUCTION ? $bill->getKTBBankForm($logInvoiceID) : $bill->getKTBBankForm($logInvoiceID, true);
                break;
            case "bbl":
                $bank = CURRENT_CONFIG == PRODUCTION ? $bill->getBBLBankForm($logInvoiceID) : $bill->getBBLBankForm($logInvoiceID, true);
                break;
            case "credit":
                $bank = CURRENT_CONFIG == PRODUCTION ? $bill->getCreditTNCForm($logInvoiceID, $ref1, $ref2, $amount, $memberID) : $bill->getCreditTNCForm($logInvoiceID, $ref1, $ref2, $amount, $memberID, true);
                break;
            case "scb":
                $bank = CURRENT_CONFIG == PRODUCTION ? $bill->getSCBBankForm($logInvoiceID) : $bill->getSCBBankForm($logInvoiceID, true);
                break;
            case "bay":
                // if(\Util::ipCheck() === '61.91.64.238'){
                $bank = $bill->getKrungsriAtTopUpServerForm($logInvoiceID, $ref1, $ref2, $amount, $memberID, CURRENT_CONFIG != PRODUCTION, $front_url);
                // }else{
                // $bank = CURRENT_CONFIG == PRODUCTION ? $bill->getKrungsriForm($logInvoiceID, $ref1, $ref2, $amount, $memberID) : $bill->getKrungsriForm($logInvoiceID, $ref1, $ref2, $amount, $memberID, true);
                // }
                break;
            case "kbank":
                $bank = CURRENT_CONFIG == PRODUCTION ? $bill->getKasikornURL() : $bill->getKasikornURL(true);
                break;
            case "credit_tnc":
                $bank = CURRENT_CONFIG == PRODUCTION ? $bill->getCreditTNCForm($logInvoiceID, $ref1, $ref2, $amount, $memberID) : $bill->getCreditTNCForm($logInvoiceID, $ref1, $ref2, $amount, $memberID, true);
                break;
            case "scb_cd_scg":
                $bank = CURRENT_CONFIG == PRODUCTION ? $bill->getSCBBankCDForm($logInvoiceID) : $bill->getSCBBankCDForm($logInvoiceID, true);
                break;
            default:
                break;
        }
        $bill->updatePaymentForm($logInvoiceID, $bank);
        $bill->closeDb();
        return $bank;
    }

    public static function getEDCPayment($logInvoiceID, $invoice, $ref1, $ref2, $amount, $memberID, $refCode, $isBypass = false, $front_url = null)
    {
        $bill = new BPayment();
        $bank = "";
        $bank = CURRENT_CONFIG == PRODUCTION ? $bill->getEDCURL($logInvoiceID, $front_url, $refCode) : $bill->getEDCURL($logInvoiceID, $front_url, $refCode, true);
        $bill->closeDb();
        return $bank;
    }

    public static function getOfflinePayment($logInvoiceID, $invoice, $ref1, $ref2, $amount, $memberID, $chnnel, $isBypass = false, $front_url = null, &$password, $smsPhoneNo, $email, $gatewaySource)
    {
        // Util::LogFile('BillDEBUG',json_encode([$logInvoiceID, $invoice, $ref1, $ref2, $amount, $memberID, $chnnel, $isBypass, $front_url, $password]) );
        $bill = new BPayment();
        $bank = "";
        switch ($chnnel) {
            case "ktb":
                $bank = CURRENT_CONFIG == PRODUCTION ? $bill->getKTBBankForm($logInvoiceID) : $bill->getKTBBankForm($logInvoiceID, true);
                break;
            case "bbl":
                $bank = CURRENT_CONFIG == PRODUCTION ? $bill->getBBLBankForm($logInvoiceID) : $bill->getBBLBankForm($logInvoiceID, true);
                break;
            case "credit":
                $bank = CURRENT_CONFIG == PRODUCTION ? $bill->getCreditTNCForm($logInvoiceID, $ref1, $ref2, $amount, $memberID) : $bill->getCreditTNCForm($logInvoiceID, $ref1, $ref2, $amount, $memberID, true);
                break;
            case strpos($chnnel, "credit_") === 0:
                if ($gatewaySource == "18") $bank = CURRENT_CONFIG == PRODUCTION ? $bill->getCreditTNCForm($logInvoiceID, $ref1, $ref2, $amount, $memberID) : $bill->getCreditTNCForm($logInvoiceID, $ref1, $ref2, $amount, $memberID, true);
                else if ($gatewaySource == "29") $bank = CURRENT_CONFIG == PRODUCTION ? $bill->getCreditForm_SCG($logInvoiceID, $ref1, $ref2, $amount, $memberID, $gatewaySource) : $bill->getCreditForm_SCG($logInvoiceID, $ref1, $ref2, $amount, $memberID, $gatewaySource, true);
                else if ($gatewaySource == "30") $bank = CURRENT_CONFIG == PRODUCTION ? $bill->getBBLCreditFrom() : $bill->getCreditForm($logInvoiceID, $ref1, $ref2, $amount, $memberID, true);
                else if ($gatewaySource == "31") $bank = CURRENT_CONFIG == PRODUCTION ? $bill->getSCBCreditFrom($logInvoiceID, $ref1, $ref2, $amount, $memberID) : $bill->getSCBCreditFrom($logInvoiceID, $ref1, $ref2, $amount, $memberID, true);
                else if ($gatewaySource == "32") $bank = CURRENT_CONFIG == PRODUCTION ? $bill->getBAYCreditFrom() : $bill->getCreditForm($logInvoiceID, $ref1, $ref2, $amount, $memberID, true);
                else if ($gatewaySource == "33") $bank = CURRENT_CONFIG == PRODUCTION ? $bill->getOTHCreditFrom() : $bill->getCreditForm($logInvoiceID, $ref1, $ref2, $amount, $memberID, true);
                else if ($gatewaySource == "34") $bank = CURRENT_CONFIG == PRODUCTION ? $bill->getOTHCreditFrom() : $bill->getCreditForm($logInvoiceID, $ref1, $ref2, $amount, $memberID, true);
                else if ($gatewaySource == "35") $bank = CURRENT_CONFIG == PRODUCTION ? $bill->getOTHCreditFrom() : $bill->getCreditForm($logInvoiceID, $ref1, $ref2, $amount, $memberID, true);
                break;
            case "scb":
                $bank = CURRENT_CONFIG == PRODUCTION ? $bill->getSCBBankForm($logInvoiceID) : $bill->getSCBBankForm($logInvoiceID, true);
                break;
            case "bay":
                $bank = $bill->getKrungsriAtTopUpServerForm($logInvoiceID, $ref1, $ref2, $amount, $memberID, CURRENT_CONFIG != PRODUCTION, $front_url);
                break;
            case "kbank":
                $bank = CURRENT_CONFIG == PRODUCTION ? $bill->getKasikornURL() : $bill->getKasikornURL(true);

            default:
                break;
        }
        $password = self::generatePasswordRandomString(6);
        // Util::LogFile('BillDEBUG',json_encode(['logInvoiceID:'.$logInvoiceID, 'form:'.$bank,'password:'.$password]) );
        $bill->updateLogInvoiceSubmitForm($logInvoiceID, $bank, $password, $smsPhoneNo, $email);
        $bill->closeDb();
        $paymentFrm = '<form name="offline" id="bill_form" method="post" action="' . $front_url . 'ReturnCode=0&Channel=offline"></form>';
        return $paymentFrm;
    }

    public static function generatePasswordRandomString($length = 10)
    {
        // Util::LogFile('BillDEBUG',json_encode(['passwordlength:'.$length]) );
        $characters = '123456789abcdefghijkmnpqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public static function GetBankCode($chnnel, &$bank, &$compcode)
    {
        switch ($chnnel) {
            case "ktb":
                $bank = "ธนาคารกรุงไทย";
                $compcode = "2921";
                break;
            case "bbl":
                $bank = "ธ.กรุงเทพ";
                $compcode = "IBAHT"; //00008
                break;
            case "kbank":
                $bank = "ธ.กสิกรไทย";
                $compcode = "98002";
                break;
            case "scb":
                $bank = "ธ.ไทยพาณิชย์";
                $compcode = "3329";
                break;
            case "bay":
                $bank = "ธ.กรุงศรีอยุธยา";
                $compcode = "10008";
                break;
            case "CounterService":
                $bank = "CounterService";
                $compcode = null;
                break;
            case "tesco":
                $bank = "TESCOLOTUS";
                $compcode = null;
                break;
            case "bigc":
                $bank = "Big C";
                $compcode = null;
                break;
            case "family":
                $bank = "FamilyMart";
                $compcode = null;
                break;
            case "utopup":
                $bank = "U Top Up";
                $compcode = null;
                break;
            case "cenpay":
                $bank = "Central";
                $compcode = null;
                break;
            case "MyPay":
                $bank = "MyPay";
                $compcode = null;
                break;
            case "mPay":
                $bank = "mPay";
                $compcode = null;
                break;
            case "FM":
                $bank = "FamilyMart";
                $compcode = null;
                break;
            case "credit":
                $bank = "CreditCard";
                $compcode = null;
                break;
            default:
                break;
        }
    }

    public static function getPaymentLink($InvID, $type)
    {
        $link = "https://www.t2p.co.th/bill/$type?qr=" . $InvID;
        switch (CURRENT_CONFIG) {
            case PRODUCTION:
            case PRODUCTION_DEEP:
                $link = "https://www.t2p.co.th/bill/$type?qr=" . $InvID;
                break;
            case TEST:
                $link = "https://test-www.t2p.co.th/bill/$type?qr=" . $InvID;
                break;
            case DEVELOP:
                $link = "http://dev-www.t2p.co.th/bill/$type?qr=" . $InvID;
                break;
            case LOCAL:
                $link = "http://localhost/data/t2p/bill/$type?qr=" . $InvID;
                break;
        }
        return $link;
    }

    public static function getSMSPaymentDirect($InvID, $invoice, $ref1, $ref2, $amount, $mobile, $chnnel, $mileage, $expire, $db, $isbyPass = false)
    {
        $bank = "";
        $compcode = "";
        self::GetBankCode($chnnel, $bank, $compcode);

        $strSMS = '';

        $objResult = new stdClass();
        $objResult->Ref1 = "";
        $objResult->Ref2 = "";
        $objResult->Amount = number_format($amount, 2, '.', ',');
        $objResult->ChannelCode = $chnnel;
        $objResult->Channel = "$bank";
        $objResult->CompCode = $compcode;
        $objResult->Expire = "";
        $objResult->Success = "N";
        $objResult->Detail = "";

        if ($chnnel == "CounterService") {
            $success = false;
            $message = "ไม่สามารถทำรายการสั่งซื้อได้";

            $response = self::requestPaycodeCs($InvID, $amount);
            Util::LogFile('BillPM', 'BZB-getSMSPaymentDirect: inv:' . $InvID . ' | response:' . print_r($response, true));
            $barcodeID = '';
            if ($response['code'] == 1) {
                $paycode = $response['paycode'];
                $barcodeID = $paycode['barcodeID'];
                $base64Image = $paycode['base64Image'];
                $service = $paycode['service'];
                if ($barcodeID != null) {
                    $success = true;
                    $objResult->Ref1 = $barcodeID;
                    $objResult->Ref2 = (CURRENT_CONFIG == PRODUCTION ? "" : "INV:$invoice(Test Only)");
                    $objResult->Expire = date('d/m/Y', strtotime($expire));
                    $objResult->Success = "Y";
                    $objResult->Detail = "แจ้งชำระผ่านบริการ: {$service}";
                } else {
                    $message = 'ไม่สามารถรับรหัสชำระได้กรุณาลองใหม่';
                }
            }
            if (!$success) {
                $objResult->Success = "N";
                $objResult->Detail = $message . ' ' . @$response['msg'];
            }
        } else if ($chnnel == "MyPay") {
            $fixbarcode = 312214030000;
            $paycode = $fixbarcode + $InvID;

            $objResult->Ref1 = $paycode;
            $objResult->Ref2 = "";
            $objResult->Expire = date('d/m/Y', strtotime($expire));
            $objResult->Success = "Y";
            $objResult->Detail = "";

            if (!$isbyPass) {
                $strSMS = "\nรหัสการชำระเงิน: " . $paycode . "\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                    . "\nช่องทางชำระ: My Pay\nชำระก่อน:" . date('d/m/Y', strtotime($expire));
                Util::LogFile('BillPM', $chnnel . ":Direct:" . $InvID . "::" . $strSMS . ":" . $mobile);
            } else {
                Util::LogFile('BillPM', $chnnel . ":Direct:" . $InvID . ":::" . $isbyPass);
            }
        } else if ($chnnel == "mPay") {
            $paycode = "31" . $mobile;

            $objResult->Ref1 = $paycode;
            $objResult->Ref2 = "";
            $objResult->Expire = date('d/m/Y', strtotime($expire));
            $objResult->Success = "Y";
            $objResult->Detail = "";

            if (!$isbyPass) {
                $strSMS = "\nRef1: " . $paycode . "\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                    . "\nช่องทางชำระ: $bank\nชำระก่อน:" . date('d/m/Y', strtotime($expire));

                Util::LogFile('BillPM', $chnnel . ":Direct:" . $InvID . "::" . $strSMS . ":" . $mobile);
                $sms = new sms();
                $sms->sendSMSDi_T2P($strSMS, $mobile);
            } else {
                Util::LogFile('BillPM', $chnnel . ":Direct:" . $InvID . ":::" . $isbyPass);
            }
        } else {
            if ($chnnel == "tesco") {
                $tescoLINK = self::getPaymentLink($InvID, '');
                $objResult->Ref2 = "";
                $objResult->Expire = date('d/m/Y', strtotime($expire));
                $objResult->Success = "Y";
                $objResult->Detail = "";

                if (!$isbyPass) {
                    $objResult->Ref1 = $tescoLINK;
                    $strSMS = "ยอดชำระ: " . number_format($amount, 2, '.', ',')
                        . "\nช่องทางชำระ: Tesco Lotus\nชำระก่อน:" . date('d/m/Y', strtotime($expire)) . "\n" . $tescoLINK;
                } else {
                    $objResult->Ref1 = "http://www.silkspan.com/qr/tesco/?qr=" . $InvID;
                }
            } else if ($chnnel == "bigc") {
                $tescoLINK = self::getPaymentLink($InvID, '');
                $objResult->Ref2 = "";
                $objResult->Expire = date('d/m/Y', strtotime($expire));
                $objResult->Success = "Y";
                $objResult->Detail = "";

                if (!$isbyPass) {
                    $objResult->Ref1 = $tescoLINK;
                    $strSMS = "ยอดชำระ: " . number_format($amount, 2, '.', ',')
                        . "\nช่องทางชำระ: Big C\nชำระก่อน:" . date('d/m/Y', strtotime($expire)) . "\n" . $tescoLINK;
                } else {
                    $objResult->Ref1 = "http://www.silkspan.com/qr/tesco/?qr=" . $InvID;
                }
            } else if ($chnnel == "family") {
                $tescoLINK = self::getPaymentLink($InvID, '');
                $objResult->Ref2 = "";
                $objResult->Expire = date('d/m/Y', strtotime($expire));
                $objResult->Success = "Y";
                $objResult->Detail = "";

                if (!$isbyPass) {
                    $objResult->Ref1 = $tescoLINK;
                    $strSMS = "ยอดชำระ: " . number_format($amount, 2, '.', ',')
                        . "\nช่องทางชำระ: FamilyMart\nชำระก่อน:" . date('d/m/Y', strtotime($expire)) . "\n" . $tescoLINK;
                } else {
                    $objResult->Ref1 = "http://www.silkspan.com/qr/tesco/?qr=" . $InvID;
                }
            } else if ($chnnel == "utopup") {
                $refLink = self::getPaymentLink($InvID, '');
                $objResult->Ref2 = "";
                $objResult->Expire = date('d/m/Y', strtotime($expire));
                $objResult->Success = "Y";
                $objResult->Detail = "";

                if (!$isbyPass) {
                    $objResult->Ref1 = $refLink;
                    $strSMS = "ยอดชำระ: " . number_format($amount, 2, '.', ',')
                        . "\nช่องทางชำระ: U Top Up\nชำระก่อน:" . date('d/m/Y', strtotime($expire)) . "\n" . $refLink;
                } else {
                    $objResult->Ref1 = "http://www.silkspan.com/qr/tesco/?qr=" . $InvID;
                }
            } else if ($chnnel == "cenpay") {
                $tescoLINK = self::getPaymentLink($InvID, '');
                $objResult->Ref2 = "";
                $objResult->Expire = date('d/m/Y', strtotime($expire));
                $objResult->Success = "Y";
                $objResult->Detail = "";

                if (!$isbyPass) {
                    $objResult->Ref1 = $tescoLINK;
                    $strSMS = "ยอดชำระ: " . number_format($amount, 2, '.', ',')
                        . "\nช่องทางชำระ: Central\nชำระก่อน:" . date('d/m/Y', strtotime($expire)) . "\n" . $tescoLINK;
                } else {
                    $objResult->Ref1 = "http://www.silkspan.com/qr/Central/?qr=" . $InvID;
                }
            } else if ($chnnel == "FM") {
                $objResult->Ref1 = $ref1;
                $objResult->Ref2 = $ref2;
                $objResult->Expire = date('d/m/Y', strtotime($expire));
                $objResult->Success = "Y";
                $objResult->Detail = "";

                if (!$isbyPass) {

                    $strSMS = "\nRef1: $ref1\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                        . "\nช่องทางชำระ: $bank\nCompCode: $compcode\nชำระก่อน:" . date('d/m/Y', strtotime($expire));
                }
            } else {
                $objResult->Ref1 = $ref1;
                $objResult->Ref2 = $ref2;
                $objResult->Expire = date('d/m/Y', strtotime($expire));
                $objResult->Success = "Y";
                $objResult->Detail = "";

                if (!$isbyPass) {

                    $strSMS = "\nRef1: $ref1\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                        . "\nช่องทางชำระ: $bank\n" . ($chnnel == "bbl" ? "ServiceCode" : "CompCode") . ": $compcode\nชำระก่อน:" . date('d/m/Y', strtotime($expire));
                }
            }

            Util::LogFile('BillPM', $chnnel . ":Direct:" . $InvID . "::" . $strSMS . ":" . $mobile);
            if (!$isbyPass) {

                $sms = new sms();
                $sms->sendSMSDi_T2P($strSMS, $mobile);
            }
        }

        return $objResult;
    }

    public static function getSMSPayment($InvID, $invoice, $ref1, $ref2, $amount, $mobile, $chnnel, $mileage, $expire, $db, $isbyPass = false, $isDuplicate = false)
    {
        $bank = "";
        $compcode = "";
        self::GetBankCode(trim($chnnel), $bank, $compcode);

        Util::LogFile('BillPM', "GETBANK:ch:" . $chnnel . " :" . $bank . " :" . $compcode);

        if (trim($chnnel) == "CounterService") {
            $success = false;
            $message = "ไม่สามารถทำรายการสั่งซื้อได้";
            $img = "";

            $response = self::requestPaycodeCs($InvID, $amount);
            Util::LogFile('BillPM', "BZB-getSMSPayment: inv:" . $InvID . " | response:" . print_r($response, true));
            if ($response['code'] == 1) {
                $paycode = $response['paycode'];
                $barcodeID = $paycode['barcodeID'];
                $base64Image = $paycode['base64Image'];
                $service = $paycode['service'];
                if ($barcodeID != null) {
                    $success = true;
                    if (!$isbyPass) {
                        $str = "<div class='print_wrap'>";
                        $str .= "<div style='margin:3px auto;text-align:left'>";
                        $str .= "ข้อมูลการชำระค่าสินค้า จะถูกส่งไปยังมือถือ <br/><br/>Paycode: " . $barcodeID
                            . "<br/>ยอดชำระ: " . number_format($amount, 2, '.', ',') . (CURRENT_CONFIG == PRODUCTION ? "" : "<br/>INV:$invoice(Test Only)") . "<br/>ช่องทางชำระ $bank";
                        $str .= "<br/>แจ้งชำระผ่านบริการ: {$service}";
                        $str .= "<br/><br/>กรุณาดำเนินการชำระต่อไปค่ะ";
                        $str .= "</div>";
                        $str .= "</div>";

                        $strSMS = "\nรหัสการชำระเงิน: " . $barcodeID . "\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                            . "\nช่องทางชำระ: $bank\nแจ้งชำระผ่านบริการ: {$service}\nชำระก่อน:" . date('d/m/Y', strtotime($expire));
                        $sms = new sms();
                        $sms->sendSMSDi_T2P($strSMS, $mobile);
                    } else {
                        $serviceArr = explode(' ', $service);
                        if (strtolower($serviceArr[0]) == 'pay') {
                            $serviceArr[0] = $service;
                        }

                        $str = "\n{$serviceArr[0]} (T2PCO) by Silkspan\nรหัสการชำระเงิน: " . $barcodeID . "\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                            . "\nช่องทางชำระ: $bank\nชำระก่อน:" . date('d/m/Y', strtotime($expire));
                    }
                } else {
                    $message = "ไม่สามารถรับรหัสชำระได้กรุณาลองใหม่";
                }
            }

            if (!$success) {
                if (!$isbyPass) {
                    $str = "<div class='print_wrap'>";
                    $str .= "<div style='margin:3px auto;text-align:left;color:red'>";
                    $str .= "ข้อมูลการชำระค่าสินค้า ไม่ถูกต้อง<br/>" . $message . ' ' . @$response['msg'];
                    $str .= "<br/><br/>กรุณาดำเนินการชำระใหม่ค่ะ";
                    $str .= "</div>";
                    $str .= "</div>";
                } else {
                    $str = $success . ' ' . @$response['msg'];
                }
            }
        } else if ($chnnel == "MyPay") {
            $fixbarcode = 312214030000;
            $paycode = $fixbarcode + $InvID;

            if (!$isbyPass) {
                $str = "<div class='print_wrap'>";
                $str .= "<div style='margin:3px auto;text-align:left'>";
                $str .= "ข้อมูลการชำระค่าสินค้า จะถูกส่งไปยังมือถือ <br/><br/>Paycode: " . $paycode . "<br/>ยอดชำระ: " . number_format($amount, 2, '.', ',')
                    . "<br/>ช่องทางชำระ My Pay";
                $str .= "<br/><br/>กรุณาดำเนินการชำระต่อไปค่ะ";
                $str .= "</div>";
                $str .= "</div>";

                $strSMS = "\nรหัสการชำระเงิน: " . $paycode . "\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                    . "\nช่องทางชำระ: My Pay\nชำระก่อน:" . date('d/m/Y', strtotime($expire));
                $sms = new sms();
                $sms->sendSMSDi_T2P($strSMS, $mobile);
            } else {
                $str = "\niBaht by Silkspan\nรหัสการชำระเงิน: " . $paycode . "\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                    . "\nช่องทางชำระ: My Pay\nชำระก่อน:" . date('d/m/Y', strtotime($expire));
            }
        } else if ($chnnel == "mPay") {
            $paycode = "31" . $mobile;

            if (!$isbyPass) {
                $str = "<div class='print_wrap'>";
                $str .= "<div style='margin:3px auto;text-align:left'>";
                $str .= "ข้อมูลการชำระค่าสินค้า จะถูกส่งไปยังมือถือ <br/><br/>Ref1: " . $paycode . "<br/>Ref2: $ref2<br/>ยอดชำระ: " . number_format($amount, 2, '.', ',')
                    . "<br/>ช่องทางชำระ $bank";
                $str .= "<br/><br/>กรุณาดำเนินการชำระต่อไปค่ะ";
                $str .= "</div>";
                $str .= "</div>";

                $strSMS = "\nRef1: " . $paycode . "\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                    . "\nช่องทางชำระ: $bank\nชำระก่อน:" . date('d/m/Y', strtotime($expire));

                $sms = new sms();
                $sms->sendSMSDi_T2P($strSMS, $mobile);
            } else {
                $str = "\niBaht by Silkspan\nRef1: " . $paycode . "\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                    . "\nช่องทางชำระ: $bank\nชำระก่อน:" . date('d/m/Y', strtotime($expire));
            }
        } else {
            if ($chnnel == "tesco") {
                $tescoLINK = self::getPaymentLink($InvID, '');
                if (!$isbyPass) {
                    $strSMS = "ยอดชำระ: " . number_format($amount, 2, '.', ',')
                        . "\nช่องทางชำระ: Tesco Lotus\nชำระก่อน:" . date('d/m/Y', strtotime($expire)) . "\n" . $tescoLINK;
                    $str = "ยอดชำระ: " . number_format($amount, 2, '.', ',') //\nRef1: $ref1\nRef2: $ref2\n
                        . "\nช่องทางชำระ: Tesco Lotus\nชำระก่อน:" . date('d/m/Y', strtotime($expire)) . "\n" . $tescoLINK;
                } else {
                    // ByPassSMS Now Only

                    $sqlMC = "CALL Log_Invoice_GetSingle_QRCode ($InvID,@code,@desc);SELECT @code,@desc;";
                    $rs = $db->sqli_callProc($sqlMC, $Mcode);
                    $MCID = 0;

                    if ($Mcode && count($rs) > 0) {
                        $MCID = $rs[0]->MerchantID;
                    }

                    if ($MCID == 3) {
                        //Silkspan
                        $strSMS = "\nT2P by Silkspan\nRef1: $ref1\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                            . "\nช่องทางชำระ: Tesco Lotus\nชำระก่อน:" . date('d/m/Y', strtotime($expire)) . "\nhttp://www.silkspan.com/qr/tesco/?qr=" . $InvID;
                        $str = "\nT2P by Silkspan\nRef1: $ref1\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                            . "\nช่องทางชำระ: Tesco Lotus\nชำระก่อน:" . date('d/m/Y', strtotime($expire)) . "\nhttp://www.silkspan.com/qr/tesco/?qr=" . $InvID;
                    } else {
                        $strSMS = "ยอดชำระ: " . number_format($amount, 2, '.', ',')
                            . "\nช่องทางชำระ: Tesco Lotus\nชำระก่อน:" . date('d/m/Y', strtotime($expire)) . "\n" . $tescoLINK;
                        $str = "ยอดชำระ: " . number_format($amount, 2, '.', ',')
                            . "\nช่องทางชำระ: Tesco Lotus\nชำระก่อน:" . date('d/m/Y', strtotime($expire)) . "\n" . $tescoLINK;
                    }
                }
            } else if ($chnnel == "bigc") {
                $tescoLINK = self::getPaymentLink($InvID, '');
                if (!$isbyPass) {
                    $strSMS = "Ref1: $ref1\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                        . "\nช่องทางชำระ: Big C\nชำระก่อน:" . date('d/m/Y', strtotime($expire)) . "\n" . $tescoLINK;
                    $str = "Ref1: $ref1\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',') //\nRef1: $ref1\nRef2: $ref2\n
                        . "\nช่องทางชำระ: Big C\nชำระก่อน:" . date('d/m/Y', strtotime($expire)) . "\n" . $tescoLINK;
                } else {
                    // ByPassSMS Now Only

                    $sqlMC = "CALL Log_Invoice_GetSingle_QRCode ($InvID,@code,@desc);SELECT @code,@desc;";
                    $rs = $db->sqli_callProc($sqlMC, $Mcode);
                    $MCID = 0;

                    if ($Mcode && count($rs) > 0) {
                        $MCID = $rs[0]->MerchantID;
                    }

                    if ($MCID == 3) {
                        //Silkspan
                        $strSMS = "\nT2P by Silkspan\nRef1: $ref1\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                            . "\nช่องทางชำระ: Big C\nชำระก่อน:" . date('d/m/Y', strtotime($expire)) . "\nhttp://www.silkspan.com/qr/BigC/?qr=" . $InvID;
                        $str = "\nT2P by Silkspan\nRef1: $ref1\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                            . "\nช่องทางชำระ: Big C\nชำระก่อน:" . date('d/m/Y', strtotime($expire)) . "\nhttp://www.silkspan.com/qr/BigC/?qr=" . $InvID;
                    } else {
                        $strSMS = "Ref1: $ref1\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                            . "\nช่องทางชำระ: Big C\nชำระก่อน:" . date('d/m/Y', strtotime($expire)) . "\n" . $tescoLINK;
                        $str = "Ref1: $ref1\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                            . "\nช่องทางชำระ: Big C\nชำระก่อน:" . date('d/m/Y', strtotime($expire)) . "\n" . $tescoLINK;
                    }
                }
            } else if ($chnnel == "family") {
                $tescoLINK = self::getPaymentLink($InvID, '');
                if (!$isbyPass) {
                    $strSMS = "Ref1: $ref1\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                        . "\nช่องทางชำระ: FamilyMart\nชำระก่อน:" . date('d/m/Y', strtotime($expire)) . "\n" . $tescoLINK;
                    $str = "Ref1: $ref1\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',') //\nRef1: $ref1\nRef2: $ref2\n
                        . "\nช่องทางชำระ: FamilyMart\nชำระก่อน:" . date('d/m/Y', strtotime($expire)) . "\n" . $tescoLINK;
                } else {
                    // ByPassSMS Now Only

                    $sqlMC = "CALL Log_Invoice_GetSingle_QRCode ($InvID,@code,@desc);SELECT @code,@desc;";
                    $rs = $db->sqli_callProc($sqlMC, $Mcode);
                    $MCID = 0;

                    if ($Mcode && count($rs) > 0) {
                        $MCID = $rs[0]->MerchantID;
                    }

                    if ($MCID == 3) {
                        //Silkspan
                        $strSMS = "\nT2P by Silkspan\nRef1: $ref1\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                            . "\nช่องทางชำระ: FamilyMart\nชำระก่อน:" . date('d/m/Y', strtotime($expire)) . "\nhttp://www.silkspan.com/qr/Family/?qr=" . $InvID;
                        $str = "\nT2P by Silkspan\nRef1: $ref1\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                            . "\nช่องทางชำระ: FamilyMart\nชำระก่อน:" . date('d/m/Y', strtotime($expire)) . "\nhttp://www.silkspan.com/qr/Family/?qr=" . $InvID;
                    } else {
                        $strSMS = "Ref1: $ref1\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                            . "\nช่องทางชำระ: FamilyMart\nชำระก่อน:" . date('d/m/Y', strtotime($expire)) . "\n" . $tescoLINK;
                        $str = "Ref1: $ref1\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                            . "\nช่องทางชำระ: FamilyMart\nชำระก่อน:" . date('d/m/Y', strtotime($expire)) . "\n" . $tescoLINK;
                    }
                }
            } else if ($chnnel == "utopup") {
                $tescoLINK = self::getPaymentLink($InvID, '');
                if (!$isbyPass) {
                    $strSMS = "Ref1: $ref1\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                        . "\nช่องทางชำระ: U Top Up\nชำระก่อน:" . date('d/m/Y', strtotime($expire)) . "\n" . $tescoLINK;
                    $str = "Ref1: $ref1\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',') //\nRef1: $ref1\nRef2: $ref2\n
                        . "\nช่องทางชำระ: U Top Up\nชำระก่อน:" . date('d/m/Y', strtotime($expire)) . "\n" . $tescoLINK;
                } else {
                    // ByPassSMS Now Only

                    $sqlMC = "CALL Log_Invoice_GetSingle_QRCode ($InvID,@code,@desc);SELECT @code,@desc;";
                    $rs = $db->sqli_callProc($sqlMC, $Mcode);
                    $MCID = 0;

                    if ($Mcode && count($rs) > 0) {
                        $MCID = $rs[0]->MerchantID;
                    }

                    if ($MCID == 3) {
                        //Silkspan
                        $strSMS = "\nT2P by Silkspan\nRef1: $ref1\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                            . "\nช่องทางชำระ: U Top Up\nชำระก่อน:" . date('d/m/Y', strtotime($expire)) . "\nhttp://www.silkspan.com/qr/Family/?qr=" . $InvID;
                        $str = "\nT2P by Silkspan\nRef1: $ref1\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                            . "\nช่องทางชำระ: U Top Up\nชำระก่อน:" . date('d/m/Y', strtotime($expire)) . "\nhttp://www.silkspan.com/qr/Family/?qr=" . $InvID;
                    } else {
                        $strSMS = "Ref1: $ref1\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                            . "\nช่องทางชำระ: U Top Up\nชำระก่อน:" . date('d/m/Y', strtotime($expire)) . "\n" . $tescoLINK;
                        $str = "Ref1: $ref1\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                            . "\nช่องทางชำระ: U Top Up\nชำระก่อน:" . date('d/m/Y', strtotime($expire)) . "\n" . $tescoLINK;
                    }
                }
            } else if ($chnnel == "cenpay") {
                $tescoLINK = self::getPaymentLink($InvID, '');
                if (!$isbyPass) {
                    $strSMS = "Ref1: $ref1\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                        . "\nช่องทางชำระ: Central\nชำระก่อน:" . date('d/m/Y', strtotime($expire)) . "\n" . $tescoLINK;
                    $str = "Ref1: $ref1\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',') //\nRef1: $ref1\nRef2: $ref2\n
                        . "\nช่องทางชำระ: Central\nชำระก่อน:" . date('d/m/Y', strtotime($expire)) . "\n" . $tescoLINK;
                } else {
                    // ByPassSMS Now Only

                    $sqlMC = "CALL Log_Invoice_GetSingle_QRCode ($InvID,@code,@desc);SELECT @code,@desc;";
                    $rs = $db->sqli_callProc($sqlMC, $Mcode);
                    $MCID = 0;

                    if ($Mcode && count($rs) > 0) {
                        $MCID = $rs[0]->MerchantID;
                    }

                    if ($MCID == 3) {
                        //Silkspan
                        $strSMS = "\nT2P by Silkspan\nRef1: $ref1\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                            . "\nช่องทางชำระ: Central\nชำระก่อน:" . date('d/m/Y', strtotime($expire)) . "\nhttp://www.silkspan.com/qr/Central/?qr=" . $InvID;
                        $str = "\nT2P by Silkspan\nRef1: $ref1\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                            . "\nช่องทางชำระ: Central\nชำระก่อน:" . date('d/m/Y', strtotime($expire)) . "\nhttp://www.silkspan.com/qr/Central/?qr=" . $InvID;
                    } else {
                        $strSMS = "Ref1: $ref1\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                            . "\nช่องทางชำระ: Central\nชำระก่อน:" . date('d/m/Y', strtotime($expire)) . "\n" . $tescoLINK;
                        $str = "Ref1: $ref1\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                            . "\nช่องทางชำระ: Central\nชำระก่อน:" . date('d/m/Y', strtotime($expire)) . "\n" . $tescoLINK;
                    }
                }
            } else if ($chnnel == "FM") {
                if (!$isbyPass) {
                    $str = "\nT2P \nRef1: $ref1\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                        . "\nช่องทางชำระ: $bank\nCompCode: $compcode\nชำระก่อน:" . date('d/m/Y', strtotime($expire));

                    $strSMS = "\nRef1: $ref1\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                        . "\nช่องทางชำระ: $bank\nCompCode: $compcode\nชำระก่อน:" . date('d/m/Y', strtotime($expire));
                } else {
                    //Silk Span
                    $str = "\nT2P by Silkspan\nRef1: $ref1\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                        . "\nช่องทางชำระ: $bank\nCompCode: $compcode\nชำระก่อน:" . date('d/m/Y', strtotime($expire));

                    $strSMS = "\nRef1: $ref1\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                        . "\nช่องทางชำระ: $bank\nCompCode: $compcode\nชำระก่อน:" . date('d/m/Y', strtotime($expire));
                }
            } else {
                if (!$isbyPass) {
                    $str = "\n$bank \nRef1: $ref1\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                        . "\nช่องทางชำระ: $bank\n" . ($chnnel == "bbl" ? "ServiceCode" : "CompCode") . ": $compcode\nชำระก่อน:" . date('d/m/Y', strtotime($expire));

                    $strSMS = "\nRef1: $ref1\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                        . "\nช่องทางชำระ: $bank\n" . ($chnnel == "bbl" ? "ServiceCode" : "CompCode") . ": $compcode\nชำระก่อน:" . date('d/m/Y', strtotime($expire));
                } else {
                    //Silk Span
                    $str = "\n$bank by Silkspan\nRef1: $ref1\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                        . "\nช่องทางชำระ: $bank\n" . ($chnnel == "bbl" ? "ServiceCode" : "CompCode") . ": $compcode\nชำระก่อน:" . date('d/m/Y', strtotime($expire));

                    $strSMS = "\nRef1: $ref1\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                        . "\nช่องทางชำระ: $bank\n" . ($chnnel == "bbl" ? "ServiceCode" : "CompCode") . ": $compcode\nชำระก่อน:" . date('d/m/Y', strtotime($expire));
                }
            }

            if (!$isbyPass) {
                $str1 = "<div class='print_wrap'>";
                $str1 .= "<div style='margin:3px auto;text-align:left'>";
                $str1 .= "ข้อมูลการชำระค่าสินค้า จะถูกส่งไปยังมือถือ <br/><br/>" . preg_replace('/\n/', '<br/>', $str);
                $str1 .= "<br/><br/>กรุณาดำเนินการชำระต่อไปค่ะ";
                $str1 .= "</div>";
                $str1 .= "</div>";

                $str = $str1;

                $sms = new sms();
                $sms->sendSMSDi_T2P($strSMS, $mobile);
            }
        }
        return $str;
    }

    public static function getPrintPayment($InvID, $invoice, $ref1, $ref2, $amount, $mileage, $expire, $chanel, $db)
    {
        $barcodeLinkFormat = "http%s://%swww.ibaht.com/barcode/barcodeBill.php";
        $barcodeTescoLinkFormat = "http%s://%swww.ibaht.com/barcode/barcodeBillTesco.php";
        if (CURRENT_CONFIG == PRODUCTION) {
            $protocol = 's';
            $subDomain = '';
        }
        if (CURRENT_CONFIG == TEST) {
            $protocol = 's';
            $subDomain = 'test-';
        }
        if (CURRENT_CONFIG == DEVELOP) {
            $protocol = '';
            $subDomain = 'dev-';
        }
        $barcodeLink = sprintf($barcodeLinkFormat, $protocol, $subDomain);
        $barcodeTescoLink = sprintf($barcodeTescoLinkFormat, $protocol, $subDomain);
        $str = '';
        if ($chanel == "CounterService") {
            $status = false;
            $message = "ไม่สามารถทำรายการสั่งซื้อได้";

            $response = self::requestPaycodeCs($InvID, $amount);
            Util::LogFile('BillPM', "BZB-getPrintPayment: inv:" . $InvID . " | response:" . print_r($response, true));
            if ($response['code'] == 1) {
                $paycode = $response['paycode'];
                $barcodeID = $paycode['barcodeID'];
                $base64Image = $paycode['base64Image'];
                $service = $paycode['service'];
                if ($barcodeID != null) {
                    $status = true;
                    $point = $mileage;
                    $str = "<div class='print_wrap'>";
                    $str .= "<div class='print_info'>ท่านจะได้รับ $point คะแนนจาก ทีทูพี เมื่อท่านทำการชำระเรียบร้อยแล้วท่านสามารถ ";
                    $str .= "log in ที่ www.t2p.co.th ด้วยหมายเลขโทรศัพท์ที่ท่านให้ไว้เพื่อขอพิมพ์ Slip ";
                    $str .= "หรือตรวจสอบประวัติการชำระของท่าน ท่านสามารถใช้ข้อมูลนี้ชำระค่าสินค้าได้ภายในเวลา 7 วัน";
                    $str .= "หากมีคำถามหรือไม่ได้รับข้อความยืนยันหลังชำระค่าสินค้า กรุณาติดต่อ 02-259-1400 ";
                    $str .= "เพื่อตรวจสอบต่อไป</div><br/>";

                    $str .= "<div class='bill_barcode_wrapper'>";
                    $str .= "<div class='bill_row'>";
                    $str .= "<div class='bill-left'>";
                    $str .= "<div class='left-wrap'>";
                    $str .= "<span><label>Paycode</label>" . $barcodeID . "</span>";
                    $str .= (CURRENT_CONFIG == PRODUCTION ? "" : "<span><label>INV</label>$invoice(Test Only)</span>");
                    $str .= "<span><label>Amount </label>" . number_format($amount, 2, '.', ',') . " บาท</span>";

                    $str .= "</div>";
                    $str .= "</div>";
                    $str .= "<div class='bill-right'>";
                    $str .= "<div class='payment'>";
                    $str .= "<img src='images/ibaht_card_payment.png' class='img-fluid-xs'>";
                    $str .= "<label class='gateway'>";
                    $str .= " <span class='bank' style='width:100%'>Couter Service (7-11)</span> ";
                    $str .= "</label>";
                    $str .= "<label class='gateway hidden-mobile'>";
                    $str .= "<span class='bank'>&nbsp;</span>";
                    $str .= "</label>";
                    $str .= "<label class='gateway hidden-mobile'>";
                    $str .= "<span class='bank'>&nbsp;</span>";
                    $str .= "</label>";
                    $str .= "<label class='gateway hidden-mobile'>";
                    $str .= "<span class='bank'>&nbsp;</span>";
                    $str .= "</label>";
                    $str .= "<label class='gateway hidden-mobile'>";
                    $str .= "<span class='bank'>&nbsp;</span>";
                    $str .= "</label>";

                    $str .= " </div>";

                    $str .= "</div>";
                    $str .= "</div>";
                    $str .= "<div class='bill_row'>";

                    $str .= "<img class='img-fluid-xs' src='data:image/png;base64," . $base64Image . "' />";
                    $str .= "<br/><br/><span><label>แจ้งชำระผ่านบริการ</label> " . $service . "</span>";
                    $str .= '<br/><br/>ชำระก่อน:' . date('d/m/Y', strtotime($expire));
                    $str .= "</div>";
                    $str .= "</div>";
                    $str .= "</div>";
                } else {
                    $message = "ไม่สามารถรับรหัสชำระได้กรุณาลองใหม่";
                }
            }
            if (!$status) {
                $errMsg = @$response['msg'];
                $str .= "<div class='print_wrap'><div class='print_info'>{$message} {$errMsg}</div><br/></div>";
            }
        } else if ($chanel == "tesco") {
            $tescoLINK = self::getPaymentLink($InvID, 'paycode.php');
            $point = $mileage;
            $str = "<div class='print_wrap'>";
            $str .= "<div class='print_info'>ท่านจะได้รับ $point คะแนนจาก ทีทูพี เมื่อท่านทำการชำระเรียบร้อยแล้วท่านสามารถ ";
            $str .= "       log in ที่ www.t2p.co.th ด้วยหมายเลขโทรศัพท์ที่ท่านให้ไว้เพื่อขอพิมพ์ Slip ";
            $str .= "       หรือตรวจสอบประวัติการชำระของท่าน ท่านสามารถใช้ข้อมูลนี้ชำระค่าสินค้าได้ภายในเวลา 7 วัน";
            $str .= "       หากมีคำถามหรือไม่ได้รับข้อความยืนยันหลังชำระค่าสินค้า กรุณาติดต่อ 02-259-1400 ";
            $str .= "       เพื่อตรวจสอบต่อไป</div><br/>";

            $str .= "<div class='bill_barcode_wrapper'>";
            $str .= "<div class='bill_row'>";
            $str .= "<div class='bill-left'>";
            $str .= "<div class='left-wrap'>";
            $str .= "<span><label>Ref.1</label>" . $ref1 . "</span>";
            $str .= "<span><label>Ref.2  </label>" . $ref2 . "</span>";
            $str .= "<span><label>Amount </label>" . number_format($amount, 2, '.', ',') . " บาท</span>";
            $str .= "</div>";
            $str .= "</div>";
            $str .= "<div class='bill-right'>";
            $str .= "<div class='payment'>";
            $str .= "     <img style='position:absolute;float:right' src='$tescoLINK'";
            $str .= " </div>";

            $str .= "</div>";
            $str .= "</div>"; //End Row1
            $str .= "<div class='bill_row'><br/><br/><br/><br><br><br><br>";

            $str .= '<img class=\'img-fluid-xs\' src=\'' . $barcodeTescoLink . '?barcode=' . $ref1 . '&ref2=' . $ref2 . '&amount=' . number_format($amount, 2, '.', ',') . '\' width=500 height=50 /><br/>ชำระก่อน:' . date('d/m/Y', strtotime($expire));
            //            $str .='<img class=\'img-fluid-xs\' src=\'' . BASE_URL_APIROOT . 'barcode/barcodeBillTesco.php?barcode=' . $ref1 . '&ref2=' . $ref2 . '&amount=' . number_format($amount, 2, '.', ',') . '\' width=500 height=50 /><br/>ชำระก่อน:' . date('d/m/Y', strtotime($expire));

            $str .= "</div>"; //End Row2
            $str .= "</div>"; //End wrap
            $str .= "</div>";
        } else if ($chanel == "bigc") {
            $tescoLINK = self::getPaymentLink($InvID, 'paycode.php');
            $point = $mileage;
            $str = "<div class='print_wrap'>";
            $str .= "<div class='print_info'>ท่านจะได้รับ $point คะแนนจาก ทีทูพี เมื่อท่านทำการชำระเรียบร้อยแล้วท่านสามารถ ";
            $str .= "       log in ที่ www.t2p.co.th ด้วยหมายเลขโทรศัพท์ที่ท่านให้ไว้เพื่อขอพิมพ์ Slip ";
            $str .= "       หรือตรวจสอบประวัติการชำระของท่าน ท่านสามารถใช้ข้อมูลนี้ชำระค่าสินค้าได้ภายในเวลา 7 วัน";
            $str .= "       หากมีคำถามหรือไม่ได้รับข้อความยืนยันหลังชำระค่าสินค้า กรุณาติดต่อ 02-259-1400 ";
            $str .= "       เพื่อตรวจสอบต่อไป</div><br/>";

            $str .= "<div class='bill_barcode_wrapper'>";
            $str .= "<div class='bill_row'>";
            $str .= "<div class='bill-left'>";
            $str .= "<div class='left-wrap'>";
            $str .= "<span><label>Ref.1</label>" . $ref1 . "</span>";
            $str .= "<span><label>Ref.2  </label>" . $ref2 . "</span>";
            $str .= "<span><label>Amount </label>" . number_format($amount, 2, '.', ',') . " บาท</span>";
            $str .= "</div>";
            $str .= "</div>";
            $str .= "<div class='bill-right'>";
            $str .= "<div class='payment'>";
            $str .= "     <img style='position:absolute;float:right' src='$tescoLINK'";
            $str .= " </div>";

            $str .= "</div>";
            $str .= "</div>"; //End Row1
            $str .= "<div class='bill_row'><br/><br/><br/><br><br><br><br>";

            $str .= '<img class=\'img-fluid-xs\' src=\'' . $barcodeLink . '?barcode=' . $ref1 . '&ref2=' . $ref2 . '&amount=' . number_format($amount, 2, '.', ',') . '\' width=500 height=50 /><br/>ชำระก่อน:' . date('d/m/Y', strtotime($expire));

            $str .= "</div>"; //End Row2
            $str .= "</div>"; //End wrap
            $str .= "</div>";
        } else if ($chanel == "family") {
            $tescoLINK = self::getPaymentLink($InvID, 'paycode.php');
            $point = $mileage;
            $str = "<div class='print_wrap'>";
            $str .= "<div class='print_info'>ท่านจะได้รับ $point คะแนนจาก ทีทูพี เมื่อท่านทำการชำระเรียบร้อยแล้วท่านสามารถ ";
            $str .= "       log in ที่ www.t2p.co.th ด้วยหมายเลขโทรศัพท์ที่ท่านให้ไว้เพื่อขอพิมพ์ Slip ";
            $str .= "       หรือตรวจสอบประวัติการชำระของท่าน ท่านสามารถใช้ข้อมูลนี้ชำระค่าสินค้าได้ภายในเวลา 7 วัน";
            $str .= "       หากมีคำถามหรือไม่ได้รับข้อความยืนยันหลังชำระค่าสินค้า กรุณาติดต่อ 02-259-1400 ";
            $str .= "       เพื่อตรวจสอบต่อไป</div><br/>";

            $str .= "<div class='bill_barcode_wrapper'>";
            $str .= "<div class='bill_row'>";
            $str .= "<div class='bill-left'>";
            $str .= "<div class='left-wrap'>";
            $str .= "<span><label>Ref.1</label>" . $ref1 . "</span>";
            $str .= "<span><label>Ref.2  </label>" . $ref2 . "</span>";
            $str .= "<span><label>Amount </label>" . number_format($amount, 2, '.', ',') . " บาท</span>";
            $str .= "</div>";
            $str .= "</div>";
            $str .= "<div class='bill-right'>";
            $str .= "<div class='payment'>";
            $str .= "     <img style='position:absolute;float:right' src='$tescoLINK'";
            $str .= " </div>";

            $str .= "</div>";
            $str .= "</div>"; //End Row1
            $str .= "<div class='bill_row'><br/><br/><br/><br><br><br><br>";
            $str .= '<img class=\'img-fluid-xs\' src=\'' . $barcodeLink . '?barcode=' . $ref1 . '&ref2=' . $ref2 . '&amount=' . number_format($amount, 2, '.', ',') . '\' width=500 height=50 /><br/>ชำระก่อน:' . date('d/m/Y', strtotime($expire));

            $str .= "</div>"; //End Row2
            $str .= "</div>"; //End wrap
            $str .= "</div>";
        } else if ($chanel == "utopup") {
            $refLink = self::getPaymentLink($InvID, 'paycode.php');
            $point = $mileage;
            $str = "<div class='print_wrap'>";
            $str .= "<div class='print_info'>ท่านจะได้รับ $point คะแนนจาก ทีทูพี เมื่อท่านทำการชำระเรียบร้อยแล้วท่านสามารถ ";
            $str .= "       log in ที่ www.t2p.co.th ด้วยหมายเลขโทรศัพท์ที่ท่านให้ไว้เพื่อขอพิมพ์ Slip ";
            $str .= "       หรือตรวจสอบประวัติการชำระของท่าน ท่านสามารถใช้ข้อมูลนี้ชำระค่าสินค้าได้ภายในเวลา 7 วัน";
            $str .= "       หากมีคำถามหรือไม่ได้รับข้อความยืนยันหลังชำระค่าสินค้า กรุณาติดต่อ 02-259-1400 ";
            $str .= "       เพื่อตรวจสอบต่อไป</div><br/>";

            $str .= "<div class='bill_barcode_wrapper'>";
            $str .= "<div class='bill_row'>";
            $str .= "<div class='bill-left'>";
            $str .= "<div class='left-wrap'>";
            $str .= "<span><label>Ref.1</label>" . $ref1 . "</span>";
            $str .= "<span><label>Ref.2  </label>" . $ref2 . "</span>";
            $str .= "<span><label>Amount </label>" . number_format($amount, 2, '.', ',') . " บาท</span>";
            $str .= "</div>";
            $str .= "</div>";
            $str .= "<div class='bill-right'>";
            $str .= "<div class='payment'>";
            $str .= "     <img style='position:absolute;float:right' src='$refLink'";
            $str .= " </div>";

            $str .= "</div>";
            $str .= "</div>"; //End Row1
            $str .= "<div class='bill_row'><br/><br/><br/><br><br><br><br>";
            $str .= '<img class=\'img-fluid-xs\' src=\'' . $barcodeLink . '?barcode=' . $ref1 . '&ref2=' . $ref2 . '&amount=' . number_format($amount, 2, '.', ',') . '\' width=500 height=50 /><br/>ชำระก่อน:' . date('d/m/Y', strtotime($expire));

            $str .= "</div>"; //End Row2
            $str .= "</div>"; //End wrap
            $str .= "</div>";
        } else if ($chanel == "cenpay") {
            $tescoLINK = self::getPaymentLink($InvID, 'paycode.php');
            $point = $mileage;
            $str = "<div class='print_wrap'>";
            $str .= "<div class='print_info'>ท่านจะได้รับ $point คะแนนจาก ทีทูพี เมื่อท่านทำการชำระเรียบร้อยแล้วท่านสามารถ ";
            $str .= "       log in ที่ www.t2p.co.th ด้วยหมายเลขโทรศัพท์ที่ท่านให้ไว้เพื่อขอพิมพ์ Slip ";
            $str .= "       หรือตรวจสอบประวัติการชำระของท่าน ท่านสามารถใช้ข้อมูลนี้ชำระค่าสินค้าได้ภายในเวลา 7 วัน";
            $str .= "       หากมีคำถามหรือไม่ได้รับข้อความยืนยันหลังชำระค่าสินค้า กรุณาติดต่อ 02-259-1400 ";
            $str .= "       เพื่อตรวจสอบต่อไป</div><br/>";

            $str .= "<div class='bill_barcode_wrapper'>";
            $str .= "<div class='bill_row'>";
            $str .= "<div class='bill-left'>";
            $str .= "<div class='left-wrap'>";
            $str .= "<span><label>Ref.1</label>" . $ref1 . "</span>";
            $str .= "<span><label>Ref.2  </label>" . $ref2 . "</span>";
            $str .= "<span><label>Amount </label>" . number_format($amount, 2, '.', ',') . " บาท</span>";
            $str .= "</div>";
            $str .= "</div>";
            $str .= "<div class='bill-right'>";
            $str .= "<div class='payment'>";
            $str .= "     <img style='position:absolute;float:right' src='$tescoLINK'";
            $str .= " </div>";

            $str .= "</div>";
            $str .= "</div>"; //End Row1
            $str .= "<div class='bill_row'><br/><br/><br/><br><br><br><br>";
            $str .= '<img class=\'img-fluid-xs\' src=\'' . $barcodeLink . '?barcode=' . $ref1 . '&ref2=' . $ref2 . '&amount=' . number_format($amount, 2, '.', ',') . '\' width=500 height=50 /><br/>ชำระก่อน:' . date('d/m/Y', strtotime($expire));

            $str .= "</div>"; //End Row2
            $str .= "</div>"; //End wrap
            $str .= "</div>";
        } else {
            $point = $mileage;
            $str = "<div class='print_wrap'>";
            $str .= "<div class='print_info'>ท่านจะได้รับ $point คะแนนจาก ทีทูพี เมื่อท่านทำการชำระเรียบร้อยแล้วท่านสามารถ ";
            $str .= "       log in ที่ www.t2p.co.th ด้วยหมายเลขโทรศัพท์ที่ท่านให้ไว้เพื่อขอพิมพ์ Slip ";
            $str .= "       หรือตรวจสอบประวัติการชำระของท่าน ท่านสามารถใช้ข้อมูลนี้ชำระค่าสินค้าได้ภายในเวลา 7 วัน";
            $str .= "       หากมีคำถามหรือไม่ได้รับข้อความยืนยันหลังชำระค่าสินค้า กรุณาติดต่อ 02-259-1400 ";
            $str .= "       เพื่อตรวจสอบต่อไป</div><br/>";

            $str .= "<div class='bill_barcode_wrapper'>";
            $str .= "<div class='bill_row'>";
            $str .= "<div class='bill-left'>";
            $str .= "<div class='left-wrap'>";
            $str .= "<span><label>Ref.1</label>" . $ref1 . "</span>";
            $str .= "<span><label>Ref.2  </label>" . $ref2 . "</span>";
            $str .= "<span><label>Amount </label>" . number_format($amount, 2, '.', ',') . " บาท</span>";
            $str .= "</div>";
            $str .= "</div>";
            $str .= "<div class='bill-right'>";
            $str .= "<div class='payment'>";
            $str .= "     <img src='images/ibaht_card_payment.png' class='img-fluid-xs'>";
            $str .= "     <label class='gateway'>";
            $str .= "         <span class='bank'>ธนาคารกรุงเทพ</span><span class='code'>IBAHT </span> ";
            $str .= "     </label>"; // bangkok bank
            $str .= "     <label class='gateway'>";
            $str .= "         <span class='bank'>ธนาคารกรุงศรีอยุธยา</span><span class='code'>10008 </span>";
            $str .= "     </label>"; // BAY
            $str .= "     <label class='gateway'>";
            $str .= "         <span class='bank'>ธนาคารไทยพาณิชย์</span><span class='code'>3329 </span>";
            $str .= "     </label>"; //SCB
            $str .= "     <label class='gateway'>";
            $str .= "         <span class='bank'>ธนาคารกสิกรไทย</span><span class='code'>98002 </span>";
            $str .= "     </label>"; //KBANK
            $str .= "     <label class='gateway'>";
            $str .= "         <span class='bank'>ธนาคารกรุงไทย</span><span class='code'>2921 </span>";
            $str .= "     </label>"; //KTB
            /*$str .= "     <label class='gateway'>";
            $str .= "         <span class='bank'>แฟมิลี่มาร์ท</span><span class='code'>3329 </span>";
            $str .= "     </label>"; //FAMILY
            $str .= "     <label class='gateway'>";
            $str .= "         <span class='bank'>เทสโก้โลตัส</span><span class='code'>-</span>";
            $str .= "     </label> "; //TESCO
            $str .= "     <label class='gateway'>";
            $str .= "         <span class='bank'>ศูนย์บริการดีแทค</span><span class='code'>-</span>";
            $str .= "     </label> "; //NOT AVAILABLE */
            $str .= " </div>";

            $str .= "</div>";
            $str .= "</div>"; //End Row1
            $str .= "<div class='bill_row'>";
            $str .= '<img class=\'img-fluid-xs\' src=\'' . $barcodeLink . '?barcode=' . $ref1 . '&ref2=' . $ref2 . '&amount=' . number_format($amount, 2, '.', ',') . '\' width=500 height=50 /><br/>ชำระก่อน:' . date('d/m/Y', strtotime($expire));

            $str .= "</div>"; //End Row2
            $str .= "</div>"; //End wrap
            $str .= "</div>";
        }
        return $str;
    }

    public static function getPrintPaymentApi($InvID, $invoice, $ref1, $ref2, $amount, $mileage, $expire, $chanel, $db)
    {
        $str = "";

        $jsonreturn = array();
        $jsonreturn['invId'] = $InvID;
        $jsonreturn['invoiceNo'] = $invoice;

        $barcodeLinkFormat = "http%s://%sservice.ibaht.com/t2p_checkout/barcodeBill.php";
        $barcodeTescoLinkFormat = "http%s://%sservice.ibaht.com/t2p_checkout/barcodeBillTesco.php";
        $protocol = '';
        $subDomain = 'local-';
        // if (CURRENT_CONFIG == PRODUCTION) {
        //     $protocol = 's';
        //     $subDomain = '';
        // }
        // if (CURRENT_CONFIG == TEST) {
        //     $protocol = 's';
        //     $subDomain = 'test-';
        // }
        // if (CURRENT_CONFIG == DEVELOP) {
        //     $protocol = '';
        //     $subDomain = 'dev-';
        // }
        // if (CURRENT_CONFIG == LOCAL) {
        //     $protocol = '';
        //     $subDomain = 'local-';
        // }
        $protocol = T2PCHECKOUT_PROTOCOL;
        if (CURRENT_CONFIG == TEST || CURRENT_PC == _SERVER_DEVELOP_SIT) {
            $protocol = '';
        }
        $subDomain = T2PCHECKOUT_SUBDOMAIN;
        $barcodeLink = sprintf($barcodeLinkFormat, $protocol, $subDomain);
        $barcodeTescoLink = sprintf($barcodeTescoLinkFormat, $protocol, $subDomain);

        if ($chanel == "CounterService") {
            $response = self::requestPaycodeCs($InvID, $amount);
            Util::LogFile('BillPM', 'BZB-getPrintPaymentApi inv:' . $InvID . ' | response:' . print_r($response, true));
            $barcodeID = '';
            if ($response['code'] == 1) {
                $paycode = $response['paycode'];
                $barcodeID = $paycode['barcodeID'];
                $base64Image = $paycode['base64Image'];
                $service = $paycode['service'];
            } else {
                $message = "รายการสั่งซื้อไม่ถูกต้อง กรุณา Reresh หน้าเว็บ";
            }
            $jsonreturn['ref1'] = $barcodeID;
            $jsonreturn['ref2'] = "";
            $jsonreturn['amount'] = number_format($amount, 2, '.', ',');
            $jsonreturn['payexpire'] = date('d/m/Y H:i:s', strtotime($expire));
            $str = json_encode($jsonreturn, JSON_UNESCAPED_UNICODE);
        } else if ($chanel == "tesco") {
            $jsonreturn['ref1'] = $ref1;
            $jsonreturn['ref2'] = $ref2;
            $jsonreturn['amount'] = number_format($amount, 2, '.', ',');
            $jsonreturn['payexpire'] = date('d/m/Y  H:i:s', strtotime($expire));
            $jsonreturn['barcode'] = $barcodeTescoLink . '?barcode=' . $ref1 . '&ref2=' . $ref2 . '&amount=' . number_format($amount, 2, '.', ',');
            $str = json_encode($jsonreturn, JSON_UNESCAPED_UNICODE);
        } else if ($chanel == "bigc") {
            $jsonreturn['ref1'] = $ref1;
            $jsonreturn['ref2'] = $ref2;
            $jsonreturn['amount'] = number_format($amount, 2, '.', ',');
            $jsonreturn['payexpire'] = date('d/m/Y  H:i:s', strtotime($expire));
            $jsonreturn['barcode'] = $barcodeLink . '?barcode=' . $ref1 . '&ref2=' . $ref2 . '&amount=' . number_format($amount, 2, '.', ',');
            $str = json_encode($jsonreturn, JSON_UNESCAPED_UNICODE);
        } else if ($chanel == "family") {
            $jsonreturn['ref1'] = $ref1;
            $jsonreturn['ref2'] = $ref2;
            $jsonreturn['amount'] = number_format($amount, 2, '.', ',');
            $jsonreturn['payexpire'] = date('d/m/Y  H:i:s', strtotime($expire));
            $jsonreturn['barcode'] = $barcodeLink . '?barcode=' . $ref1 . '&ref2=' . $ref2 . '&amount=' . number_format($amount, 2, '.', ',');
            $str = json_encode($jsonreturn, JSON_UNESCAPED_UNICODE);
        } else if ($chanel == "utopup") {
            $jsonreturn['ref1'] = $ref1;
            $jsonreturn['ref2'] = $ref2;
            $jsonreturn['amount'] = number_format($amount, 2, '.', ',');
            $jsonreturn['payexpire'] = date('d/m/Y  H:i:s', strtotime($expire));
            $jsonreturn['barcode'] = $barcodeLink . '?barcode=' . $ref1 . '&ref2=' . $ref2 . '&amount=' . number_format($amount, 2, '.', ',');
            $str = json_encode($jsonreturn, JSON_UNESCAPED_UNICODE);
        } else if ($chanel == "cenpay") {
            $jsonreturn['ref1'] = $ref1;
            $jsonreturn['ref2'] = $ref2;
            $jsonreturn['amount'] = number_format($amount, 2, '.', ',');
            $jsonreturn['payexpire'] = date('d/m/Y  H:i:s', strtotime($expire));
            $jsonreturn['barcode'] = $barcodeLink . '?barcode=' . $ref1 . '&ref2=' . $ref2 . '&amount=' . number_format($amount, 2, '.', ',');
            $str = json_encode($jsonreturn, JSON_UNESCAPED_UNICODE);
        } else {
            $jsonreturn['ref1'] = $ref1;
            $jsonreturn['ref2'] = $ref2;
            $jsonreturn['amount'] = number_format($amount, 2, '.', ',');
            $jsonreturn['payexpire'] = date('d/m/Y  H:i:s', strtotime($expire));
            $jsonreturn['barcode'] = $barcodeLink . '?barcode=' . $ref1 . '&ref2=' . $ref2 . '&amount=' . number_format($amount, 2, '.', ',');
            $jsonreturn['no_show_qr'] = true;

            //ค้นหา comp code จาก DB
            $conn = new mysqli(_sqlhostbill, _sqlusernamebill, _sqlpassbill, _sqldatabasebill);
            $sqlvAppCode  = "SELECT vAppCode FROM BillPayment.Log_Invoice AS li INNER JOIN BillPayment.Merchant AS m ON m.iMerchantID = li.iMerchantID  WHERE li.iLogInvoiceID='" . $InvID . "'";

            $resultvAppCode = $conn->query($sqlvAppCode);
            while ($rowvAppCode = $resultvAppCode->fetch_assoc()) {
                $vAppCode = $rowvAppCode["vAppCode"];
            }

            $sqlcompcode = "SELECT * FROM BillPayment.Merchant_Comp_Code WHERE vAppCode = '" . $vAppCode . "' AND iChannelID = '12'";
            $resultcompcode = $conn->query($sqlcompcode);
            while ($rowcompcode = $resultcompcode->fetch_assoc()) {
                $kbankcompcode = $rowcompcode["CompCode"];
            }
            $conn->close();

            $jsonreturn['pay_via'] = [
                [
                    'name' => 'ธนาคารกรุงเทพ',
                    'code' => 'IBAHT'
                ],
                [
                    'name' => 'ธนาคารกรุงศรีอยุธยา',
                    'code' => '10008'
                ],
                [
                    'name' => 'ธนาคารไทยพาณิชย์',
                    'code' => '3329'
                ],
                [
                    'name' => 'ธนาคารกสิกรไทย',
                    'code' => $kbankcompcode
                ],
                [
                    'name' => 'ธนาคารกรุงไทย',
                    'code' => '2921'
                ],
                /*[
                    'name' => 'แฟมิลี่มาร์ท',
                    'code' => '3329'
                ],
                [
                    'name' => 'เทสโก้โลตัส',
                ],
                [
                    'name' => 'ศูนย์บริการดีแทค',
                ]*/
            ];
            $str = json_encode($jsonreturn, JSON_UNESCAPED_UNICODE);
        }
        return $str;
    }

    public static function getSMSPaymentApi($InvID, $invoice, $ref1, $ref2, $amount, $mobile, $chnnel, $mileage, $expire, $db, $isbyPass = false, $isDuplicate = false)
    {
        $bank = "";
        $compcode = "";

        switch ($chnnel) {
            case "ktb":
                $bank = "ธนาคารกรุงไทย";
                $compcode = "2921";
                break;
            case "bbl":
                $bank = "ธ.กรุงเทพ";
                $compcode = "IBAHT"; //00008
                break;
            case "kbank":
                $bank = "ธ.กสิกรไทย";
                $compcode = "98002";
                break;
            case "scb":
                $bank = "ธ.ไทยพาณิชย์";
                $compcode = "3329";
                break;
            case "bay":
                $bank = "ธ.กรุงศรีอยุธยา";
                $compcode = "10008";
                break;
            case "CounterService":
                $bank = "CounterService";
                $compcode = null;
                break;
            case "tesco":
                $bank = "TESCOLOTUS";
                $compcode = null;
                break;
            case "bigc":
                $bank = "Big C";
                $compcode = null;
                break;
            case "family":
                $bank = "FamilyMart";
                $compcode = null;
                break;
            case "utopup":
                $bank = "U Top Up";
                $compcode = null;
                break;
            case "cenpay":
                $bank = "Central";
                $compcode = null;
                break;
            case "MyPay":
                $bank = "MyPay";
                $compcode = null;
                break;
            case "mPay":
                $bank = "mPay";
                $compcode = null;
                break;
            case "FM":
                $bank = "Family";
                $compcode = "3329";
                break;
            default:
                break;
        }
        if ($chnnel == "CounterService") {
            $success = false;
            $message = "ไม่สามารถทำรายการสั่งซื้อได้";

            $response = self::requestPaycodeCs($InvID, $amount);
            Util::LogFile('BillPM', 'BZB-getSMSPaymentApi: inv:' . $InvID . ' | response:' . print_r($response, true));
            $barcodeID = '';
            if ($response['code'] == 1) {
                $paycode = $response['paycode'];
                $barcodeID = $paycode['barcodeID'];
                $base64Image = $paycode['base64Image'];
                $service = $paycode['service'];

                if ($barcodeID != null) {
                    $success = true;
                    if (!$isbyPass) {
                        $smsjson = "ข้อมูลการชำระค่าสินค้า จะถูกส่งไปยังมือถือ " . $barcodeID . "ยอดชำระ: " . number_format($amount, 2, '.', ',') . (CURRENT_CONFIG == PRODUCTION ? "" : "<br/>INV:$invoice(Test Only)") . "ช่องทางชำระ $bank กรุณาดำเนินการชำระต่อไปค่ะ";
                        $str = array();
                        $str['sms'] = $smsjson;
                        $str = json_encode($str, JSON_UNESCAPED_UNICODE);

                        $strSMS = "\nรหัสการชำระเงิน: " . $barcodeID . "\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                            . "\nช่องทางชำระ: $bank\nแจ้งชำระผ่านบริการ: {$service}\nชำระก่อน:" . date('d/m/Y', strtotime($expire));
                        $sms = new sms();
                        $sms->sendSMSDi_T2P($strSMS, $mobile);
                    } else {
                        $smsjson = "ข้อมูลการชำระค่าสินค้า จะถูกส่งไปยังมือถือ " . $barcodeID . "ยอดชำระ: " . number_format($amount, 2, '.', ',') . (CURRENT_CONFIG == PRODUCTION ? "" : "<br/>INV:$invoice(Test Only)") . "ช่องทางชำระ $bank กรุณาดำเนินการชำระต่อไปค่ะ";
                        $str = array();
                        $str['sms'] = $smsjson;
                        $str = json_encode($str, JSON_UNESCAPED_UNICODE);
                    }

                    $str['payexpire'] = date('d/m/Y', strtotime($expire));
                    $str['amount'] = number_format($amount, 2, '.', ',');
                    $str['ref1'] = $barcodeID;
                    $str['ref2'] = null;
                    $str['channel'] = $bank;
                } else {
                    $message = 'ไม่สามารถรับรหัสชำระได้กรุณาลองใหม่';
                }
            }
            if (!$success) {
                if (!$isbyPass) {
                    $smsjson = "ข้อมูลการชำระค่าสินค้า ไม่ถูกต้อง" . $message . ' ' . @$response['msg'];
                    $str = array();
                    $str['sms'] = $smsjson;
                    $str = json_encode($str, JSON_UNESCAPED_UNICODE);
                } else {
                    $str = $message . ' ' . @$response['msg'];
                }
            }
        } else if ($chnnel == "MyPay") {
            $fixbarcode = 312214030000;
            $paycode = $fixbarcode + $InvID;

            //$sms = new sms();
            //$sms->sendSMSDi_T2P($str,$mobile);

            if (!$isbyPass) {
                $smsjson = "ข้อมูลการชำระค่าสินค้า จะถูกส่งไปยังมือถือ " . $paycode . "ยอดชำระ: " . number_format($amount, 2, '.', ',') . (CURRENT_CONFIG == PRODUCTION ? "" : "<br/>INV:$invoice(Test Only)") . "ช่องทางชำระ $bank กรุณาดำเนินการชำระต่อไปค่ะ";
                $str = array();
                $str['sms'] = $smsjson;
                $str = json_encode($str, JSON_UNESCAPED_UNICODE);
                $strSMS = "\nรหัสการชำระเงิน: " . $paycode . "\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                    . "\nช่องทางชำระ: My Pay\nชำระก่อน:" . date('d/m/Y', strtotime($expire));
                $sms = new sms();
                $sms->sendSMSDi_T2P($strSMS, $mobile);
            } else {
                $smsjson = "ข้อมูลการชำระค่าสินค้า จะถูกส่งไปยังมือถือ " . $paycode . "ยอดชำระ: " . number_format($amount, 2, '.', ',') . (CURRENT_CONFIG == PRODUCTION ? "" : "<br/>INV:$invoice(Test Only)") . "ช่องทางชำระ $bank กรุณาดำเนินการชำระต่อไปค่ะ";
                $str = array();
                $str['sms'] = $smsjson;
                $str = json_encode($str, JSON_UNESCAPED_UNICODE);
            }

            $str['payexpire'] = date('d/m/Y', strtotime($expire));
            $str['amount'] = number_format($amount, 2, '.', ',');
            $str['ref1'] = $paycode;
            $str['ref2'] = null;
            $str['channel'] = 'My Pay';
        } else if ($chnnel == "mPay") {
            $paycode = "31" . $mobile;

            // $sms = new sms();
            // $sms->sendSMSDi_T2P($str,$mobile);

            if (!$isbyPass) {
                $smsjson = "ข้อมูลการชำระค่าสินค้า จะถูกส่งไปยังมือถือ Ref1:" . $paycode . "Ref2:" . $ref2 . "ยอดชำระ: " . number_format($amount, 2, '.', ',') . (CURRENT_CONFIG == PRODUCTION ? "" : "<br/>INV:$invoice(Test Only)") . "ช่องทางชำระ $bank กรุณาดำเนินการชำระต่อไปค่ะ";
                $str = array();
                $str['sms'] = $smsjson;
                $str = json_encode($str, JSON_UNESCAPED_UNICODE);

                $strSMS = "\nRef1: " . $paycode . "\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                    . "\nช่องทางชำระ: $bank\nชำระก่อน:" . date('d/m/Y', strtotime($expire));

                $sms = new sms();
                $sms->sendSMSDi_T2P($strSMS, $mobile);
            } else {
                $smsjson = "ข้อมูลการชำระค่าสินค้า จะถูกส่งไปยังมือถือ Ref1:" . $paycode . "Ref2:" . $ref2 . "ยอดชำระ: " . number_format($amount, 2, '.', ',') . (CURRENT_CONFIG == PRODUCTION ? "" : "<br/>INV:$invoice(Test Only)") . "ช่องทางชำระ $bank กรุณาดำเนินการชำระต่อไปค่ะ";
                $str = array();
                $str['sms'] = $smsjson;
                $str = json_encode($str, JSON_UNESCAPED_UNICODE);
            }

            $str['payexpire'] = date('d/m/Y', strtotime($expire));
            $str['amount'] = number_format($amount, 2, '.', ',');
            $str['ref1'] = $paycode;
            $str['ref2'] = $ref2;
            $str['channel'] = $bank;
        } else {
            if ($chnnel == "tesco") {
                $tescoLINK = self::getPaymentLink($InvID, '');
                if (!$isbyPass) {
                    $strSMS = "\nRef1: $ref1\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                        . "\nช่องทางชำระ: Tesco Lotus\nชำระก่อน:" . date('d/m/Y', strtotime($expire));
                    $smsjson = "ยอดชำระ: " . number_format($amount, 2, '.', ',') . "ช่องทางชำระ: Tesco Lotus ชำระก่อน:" . date('d/m/Y', strtotime($expire));
                    $str = array();
                    $str['sms'] = $smsjson;
                    $str = json_encode($str, JSON_UNESCAPED_UNICODE);
                }
            } else if ($chnnel == "bigc") {
                $tescoLINK = self::getPaymentLink($InvID, '');
                if (!$isbyPass) {
                    $strSMS = "\nRef1: $ref1\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                        . "\nช่องทางชำระ: Big C\nชำระก่อน:" . date('d/m/Y', strtotime($expire));
                    $smsjson = "ยอดชำระ: " . number_format($amount, 2, '.', ',') . "ช่องทางชำระ: Big C ชำระก่อน:" . date('d/m/Y', strtotime($expire));
                    $str = array();
                    $str['sms'] = $smsjson;
                    $str = json_encode($str, JSON_UNESCAPED_UNICODE);
                }

                $str['payexpire'] = date('d/m/Y', strtotime($expire));
                $str['amount'] = number_format($amount, 2, '.', ',');
                $str['ref1'] = $ref1;
                $str['ref2'] = $ref2;
                $str['channel'] = 'Big C';
            } else if ($chnnel == "family") {
                $tescoLINK = self::getPaymentLink($InvID, '');
                if (!$isbyPass) {
                    $strSMS = "\nRef1: $ref1\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                        . "\nช่องทางชำระ: FamilyMart\nชำระก่อน:" . date('d/m/Y', strtotime($expire));
                    $smsjson = "ยอดชำระ: " . number_format($amount, 2, '.', ',') . "ช่องทางชำระ: FamilyMart ชำระก่อน:" . date('d/m/Y', strtotime($expire));
                    $str = array();
                    $str['sms'] = $smsjson;
                    $str = json_encode($str, JSON_UNESCAPED_UNICODE);
                }

                $str['payexpire'] = date('d/m/Y', strtotime($expire));
                $str['amount'] = number_format($amount, 2, '.', ',');
                $str['ref1'] = $ref1;
                $str['ref2'] = $ref2;
                $str['channel'] = 'FamilyMart';
            } else if ($chnnel == "utopup") {
                $tescoLINK = self::getPaymentLink($InvID, '');
                if (!$isbyPass) {
                    $strSMS = "\nRef1: $ref1\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                        . "\nช่องทางชำระ: U Top up\nชำระก่อน:" . date('d/m/Y', strtotime($expire));
                    $smsjson = "ยอดชำระ: " . number_format($amount, 2, '.', ',') . "ช่องทางชำระ: U Top up ชำระก่อน:" . date('d/m/Y', strtotime($expire));
                    $str = array();
                    $str['sms'] = $smsjson;
                    $str = json_encode($str, JSON_UNESCAPED_UNICODE);
                }

                $str['payexpire'] = date('d/m/Y', strtotime($expire));
                $str['amount'] = number_format($amount, 2, '.', ',');
                $str['ref1'] = $ref1;
                $str['ref2'] = $ref2;
                $str['channel'] = 'U Top up';
            } else if ($chnnel == "cenpay") {
                $tescoLINK = self::getPaymentLink($InvID, '');
                if (!$isbyPass) {
                    $strSMS = "\nRef1: $ref1\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                        . "\nช่องทางชำระ: Central\nชำระก่อน:" . date('d/m/Y', strtotime($expire));
                    $smsjson = "ยอดชำระ: " . number_format($amount, 2, '.', ',') . "ช่องทางชำระ: Central ชำระก่อน:" . date('d/m/Y', strtotime($expire));
                    $str = array();
                    $str['sms'] = $smsjson;
                    $str = json_encode($str, JSON_UNESCAPED_UNICODE);
                }

                $str['payexpire'] = date('d/m/Y', strtotime($expire));
                $str['amount'] = number_format($amount, 2, '.', ',');
                $str['ref1'] = $ref1;
                $str['ref2'] = $ref2;
                $str['channel'] = 'Central';
            } else if ($chnnel == "FM") {
                $smsjson = "Ref1: $ref1 Ref2: $ref2 ยอดชำระ: " . number_format($amount, 2, '.', ',')
                    . "ช่องทางชำระ: $bank CompCode: $compcode ชำระก่อน:" . date('d/m/Y', strtotime($expire));
                $str = array();
                $str['sms'] = $smsjson;
                $str = json_encode($str, JSON_UNESCAPED_UNICODE);

                $strSMS = "\nRef1: $ref1\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                    . "\nช่องทางชำระ: $bank\nCompCode: $compcode\nชำระก่อน:" . date('d/m/Y', strtotime($expire));

                $str['payexpire'] = date('d/m/Y', strtotime($expire));
                $str['amount'] = number_format($amount, 2, '.', ',');
                $str['ref1'] = $ref1;
                $str['ref2'] = $ref2;
                $str['channel'] = $bank;
                $str['compcode'] = $compcode;
            } else {
                $smsjson = "$bank Ref1: $ref1 Ref2: $ref2 ยอดชำระ: " . number_format($amount, 2, '.', ',')
                    . "ช่องทางชำระ:  $bank " . ($chnnel == "bbl" ? "ServiceCode" : "CompCode") . ": $compcode ชำระก่อน:" . date('d/m/Y', strtotime($expire));
                $str = array();
                $str['sms'] = $smsjson;

                $strSMS = "\nRef1: $ref1\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                    . "\nช่องทางชำระ: $bank\n" . ($chnnel == "bbl" ? "ServiceCode" : "CompCode") . ": $compcode\nชำระก่อน:" . date('d/m/Y', strtotime($expire));

                $str['payexpire'] = date('d/m/Y', strtotime($expire));
                $str['amount'] = number_format($amount, 2, '.', ',');
                $str['ref1'] = $ref1;
                $str['ref2'] = $ref2;
                $str['channel'] = $bank;
                $str['compcode'] = $compcode;
            }

            if (!$isbyPass) {
                $strreturn = "ข้อมูลการชำระค่าสินค้า จะถูกส่งไปยังมือถือ";
                $str1 = array();
                $str1['sms'] = $strreturn;
                $str1 = json_encode($str1, JSON_UNESCAPED_UNICODE);
                $str = $str1;

                $sms = new sms();
                $sms->sendSMSDi_T2P($strSMS, $mobile);
            }
        }
        return $str;
    }

    /**
     * @param $InvID
     * @param $invoice
     * @param $ref1
     * @param $ref2
     * @param $amount
     * @param $mobile
     * @param $chnnel
     * @param $mileage
     * @param $expire
     * @param $db
     * @param bool $isbyPass
     * @param bool $isDuplicate
     * @return array|string
     */
    public static function getSMSPaymentJson($InvID, $invoice, $ref1, $ref2, $amount, $mobile, $chnnel, $mileage, $expire, $db, $isbyPass = false, $isDuplicate = false)
    {
        $bank = "";
        $compcode = "";
        $str = array();
        $str['status'] = 'success';
        $str['no_show_qr'] = true;

        switch ($chnnel) {
            case "ktb":
                $bank = "ธนาคารกรุงไทย";
                $compcode = "2921";
                break;
            case "bbl":
                $bank = "ธ.กรุงเทพ";
                $compcode = "IBAHT"; //00008
                break;
            case "kbank":
                $bank = "ธ.กสิกรไทย";
                $compcode = "98002";
                break;
            case "scb":
                $bank = "ธ.ไทยพาณิชย์";
                $compcode = "3329";
                break;
            case "bay":
                $bank = "ธ.กรุงศรีอยุธยา";
                $compcode = "10008";
                break;
            case "CounterService":
                $bank = "CounterService";
                $compcode = null;
                break;
            case "tesco":
                $bank = "TESCOLOTUS";
                $compcode = null;
                break;
            case "bigc":
                $bank = "Big C";
                $compcode = null;
                break;
            case "family":
                $bank = "FamilyMart";
                $compcode = null;
                break;
            case "utopup":
                $bank = "U Top Up";
                $compcode = null;
                break;
            case "cenpay":
                $bank = "Central";
                $compcode = null;
                break;
            case "MyPay":
                $bank = "MyPay";
                $compcode = null;
                break;
            case "mPay":
                $bank = "mPay";
                $compcode = null;
                break;
            case "FM":
                $bank = "Family";
                $compcode = "3329";
                break;
            default:
                break;
        }
        $bill = new BPayment();
        $merchantInfo = $bill->getMerchantInfoFromInvoice($InvID);
        if (isset($merchantInfo)) {
            $smsHeaderMessage = "ขอบคุณสำหรับการสั่งซื้อสินค้าและบริการจาก " . $merchantInfo->vSiteName;
        } else {
            $smsHeaderMessage = "ขอบคุณสำหรับการสั่งซื้อสินค้าและบริการจาก T2PCheckout";
        }
        if ($chnnel == "CounterService") {
            $success = false;
            $message = "ไม่สามารถทำรายการสั่งซื้อได้";

            $response = self::requestPaycodeCs($InvID, $amount);
            Util::LogFile('BillPM', 'BZB-getSMSPaymentJson: inv:' . $InvID . ' | response:' . print_r($response, true));
            $barcodeID = '';
            if ($response['code'] == 1) {
                $paycode = $response['paycode'];
                $barcodeID = $paycode['barcodeID'];
                $base64Image = $paycode['base64Image'];
                $service = $paycode['service'];

                if ($barcodeID != null) {
                    $success = true;
                    $smsjson = "ข้อมูลการชำระค่าสินค้า จะถูกส่งไปยังมือถือ " . $barcodeID . "ยอดชำระ: " . number_format($amount, 2, '.', ',') . (CURRENT_CONFIG == PRODUCTION ? "" : "<br/>INV:$invoice(Test Only)") . "ช่องทางชำระ $bank กรุณาดำเนินการชำระต่อไปค่ะ";
                    $str['sms'] = $smsjson;
                    $str['payexpire'] = date('d/m/Y', strtotime($expire));
                    $str['amount'] = number_format($amount, 2, '.', ',');
                    $str['ref1'] = $barcodeID;
                    $str['ref2'] = null;
                    $str['channel'] = $bank;

                    if (!$isbyPass) {
                        $strSMS = "\nรหัสการชำระเงิน: " . $barcodeID . "\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                            . "\nช่องทางชำระ: $bank\nแจ้งชำระผ่านบริการ: {$service}\nชำระก่อน:" . date('d/m/Y', strtotime($expire));
                        $sms = new sms();
                        $sms->sendSMSDi_T2P($smsHeaderMessage . $strSMS, $mobile);
                    }
                } else {
                    $str['status'] = 'invalid';
                    $message = 'ไม่สามารถรับรหัสชำระได้กรุณาลองใหม่';
                }
            }
            if (!$success) {
                $smsjson = "ข้อมูลการชำระค่าสินค้า ไม่ถูกต้อง" . $message . ' ' . @$response['msg'];
                $str['sms'] = $smsjson;
                $str['status'] = 'invalid';
            }
        } else if ($chnnel == "MyPay") {
            $fixbarcode = 312214030000;
            $paycode = $fixbarcode + $InvID;
            if (!$isbyPass) {
                $strSMS = "\nรหัสการชำระเงิน: " . $paycode . "\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                    . "\nช่องทางชำระ: My Pay\nชำระก่อน:" . date('d/m/Y', strtotime($expire));
                $sms = new sms();
                $sms->sendSMSDi_T2P($smsHeaderMessage . $strSMS, $mobile);
            }

            $smsjson = "ข้อมูลการชำระค่าสินค้า จะถูกส่งไปยังมือถือ " . $paycode . "ยอดชำระ: " . number_format($amount, 2, '.', ',') . (CURRENT_CONFIG == PRODUCTION ? "" : "<br/>INV:$invoice(Test Only)") . "ช่องทางชำระ $bank กรุณาดำเนินการชำระต่อไปค่ะ";
            $str['sms'] = $smsjson;
            $str['payexpire'] = date('d/m/Y', strtotime($expire));
            $str['amount'] = number_format($amount, 2, '.', ',');
            $str['ref1'] = $paycode;
            $str['ref2'] = null;
            $str['channel'] = 'My Pay';
        } else if ($chnnel == "mPay") {
            $paycode = "31" . $mobile;
            if (!$isbyPass) {
                $strSMS = "\nRef1: " . $paycode . "\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                    . "\nช่องทางชำระ: $bank\nชำระก่อน:" . date('d/m/Y', strtotime($expire));
                $sms = new sms();
                $sms->sendSMSDi_T2P($smsHeaderMessage . $strSMS, $mobile);
            }
            $smsjson = "ข้อมูลการชำระค่าสินค้า จะถูกส่งไปยังมือถือ Ref1:" . $paycode . "Ref2:" . $ref2 . "ยอดชำระ: " . number_format($amount, 2, '.', ',') . (CURRENT_CONFIG == PRODUCTION ? "" : "<br/>INV:$invoice(Test Only)") . "ช่องทางชำระ $bank กรุณาดำเนินการชำระต่อไปค่ะ";
            $str['sms'] = $smsjson;
            $str['payexpire'] = date('d/m/Y', strtotime($expire));
            $str['amount'] = number_format($amount, 2, '.', ',');
            $str['ref1'] = $paycode;
            $str['ref2'] = $ref2;
            $str['channel'] = $bank;
        } else {

            $str['payexpire'] = date('d/m/Y', strtotime($expire));
            $str['amount'] = number_format($amount, 2, '.', ',');
            $str['ref1'] = $ref1;
            $str['ref2'] = $ref2;

            if ($chnnel == "tesco") {
                $str['detailLink'] = self::getPaymentLink($InvID, '');
                if (!$isbyPass) {
                    $strSMS = "\nRef1: $ref1\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                        . "\nช่องทางชำระ: Tesco Lotus\nชำระก่อน:" . date('d/m/Y', strtotime($expire));
                }
                $smsjson = "ยอดชำระ: " . number_format($amount, 2, '.', ',') . "ช่องทางชำระ: Tesco Lotus ชำระก่อน:" . date('d/m/Y', strtotime($expire));
                $str['sms'] = $smsjson;
                $str['channel'] = 'Tesco Lotus';
            } else if ($chnnel == "bigc") {
                $str['detailLink'] = self::getPaymentLink($InvID, '');
                if (!$isbyPass) {
                    $strSMS = "\nRef1: $ref1\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                        . "\nช่องทางชำระ: Big C\nชำระก่อน:" . date('d/m/Y', strtotime($expire));
                }
                $smsjson = "ยอดชำระ: " . number_format($amount, 2, '.', ',') . "ช่องทางชำระ: Big C ชำระก่อน:" . date('d/m/Y', strtotime($expire));
                $str['sms'] = $smsjson;
                $str['channel'] = 'Big C';
            } else if ($chnnel == "family") {
                $str['detailLink'] = self::getPaymentLink($InvID, '');
                if (!$isbyPass) {
                    $strSMS = "\nRef1: $ref1\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                        . "\nช่องทางชำระ: FamilyMart\nชำระก่อน:" . date('d/m/Y', strtotime($expire));
                }
                $smsjson = "ยอดชำระ: " . number_format($amount, 2, '.', ',') . "ช่องทางชำระ: FamilyMart ชำระก่อน:" . date('d/m/Y', strtotime($expire));
                $str['sms'] = $smsjson;
                $str['channel'] = 'FamilyMart';
            } else if ($chnnel == "utopup") {
                $str['detailLink'] = self::getPaymentLink($InvID, '');
                if (!$isbyPass) {
                    $strSMS = "\nRef1: $ref1\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                        . "\nช่องทางชำระ: U Top up\nชำระก่อน:" . date('d/m/Y', strtotime($expire));
                }
                $smsjson = "ยอดชำระ: " . number_format($amount, 2, '.', ',') . "ช่องทางชำระ: U Top up ชำระก่อน:" . date('d/m/Y', strtotime($expire));
                $str['sms'] = $smsjson;
                $str['channel'] = 'U Top up';
            } else if ($chnnel == "cenpay") {
                $str['detailLink'] = self::getPaymentLink($InvID, '');
                if (!$isbyPass) {
                    $strSMS = "\nRef1: $ref1\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                        . "\nช่องทางชำระ: Central\nชำระก่อน:" . date('d/m/Y', strtotime($expire));
                }
                $smsjson = "ยอดชำระ: " . number_format($amount, 2, '.', ',') . "ช่องทางชำระ: Central ชำระก่อน:" . date('d/m/Y', strtotime($expire));
                $str['sms'] = $smsjson;
                $str['channel'] = 'Central';
            } else if ($chnnel == "FM") {
                $strSMS = "\nRef1: $ref1\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                    . "\nช่องทางชำระ: $bank\nCompCode: $compcode\nชำระก่อน:" . date('d/m/Y', strtotime($expire));

                $smsjson = "Ref1: $ref1 Ref2: $ref2 ยอดชำระ: " . number_format($amount, 2, '.', ',')
                    . "ช่องทางชำระ: $bank CompCode: $compcode ชำระก่อน:" . date('d/m/Y', strtotime($expire));
                $str['sms'] = $smsjson;
                $str['channel'] = $bank;
                $str['compcode'] = $compcode;
                $str['no_show_qr'] = true;
            } else {
                $strSMS = "\nRef1: $ref1\nRef2: $ref2\nยอดชำระ: " . number_format($amount, 2, '.', ',')
                    . "\nช่องทางชำระ: $bank\n" . ($chnnel == "bbl" ? "ServiceCode" : "CompCode") . ": $compcode\nชำระก่อน:" . date('d/m/Y', strtotime($expire));

                $smsjson = "$bank Ref1: $ref1 Ref2: $ref2 ยอดชำระ: " . number_format($amount, 2, '.', ',')
                    . "ช่องทางชำระ:  $bank " . ($chnnel == "bbl" ? "ServiceCode" : "CompCode") . ": $compcode ชำระก่อน:" . date('d/m/Y', strtotime($expire));
                $str['sms'] = $smsjson;
                $str['channel'] = $bank;
                $str['compcode'] = $compcode;
                $str['no_show_qr'] = true;
            }

            if (!$isbyPass) {
                $strreturn = "ข้อมูลการชำระค่าสินค้า จะถูกส่งไปยังมือถือ";
                $str['sms'] = $strreturn;
                $sms = new sms();
                $sms->sendSMSDi_T2P($smsHeaderMessage . $strSMS, $mobile);
            }
        }
        $str['invId'] = $InvID;
        return json_encode($str);
    }

    public static function getOnlinePaymentApi($logInvoiceID, $invoice, $ref1, $ref2, $amount, $memberID, $chnnel, $isBypass = false)
    {
        $bill = new BPayment();
        $bank = "";
        switch ($chnnel) {
            case "ktb":
                $bank = CURRENT_CONFIG == PRODUCTION ? $bill->getKTBBankForm($logInvoiceID) : $bill->getKTBBankForm($logInvoiceID, true);
                break;
            case "bbl":
                $bank = CURRENT_CONFIG == PRODUCTION ? $bill->getBBLBankForm($logInvoiceID) : $bill->getBBLBankForm($logInvoiceID, true);
                break;
            case "credit":
                $bank = CURRENT_CONFIG == PRODUCTION ? $bill->getCreditForm($ref1, $ref2, $amount, $memberID) : $bill->getCreditForm($logInvoiceID, $ref1, $ref2, $amount, $memberID, true);
                break;
            case "scb":
                $bank = CURRENT_CONFIG == PRODUCTION ? $bill->getSCBBankForm($logInvoiceID) : $bill->getSCBBankForm($logInvoiceID, true);
                break;
            case "bay":
                $bank = CURRENT_CONFIG == PRODUCTION ? $bill->getKrungsriAtTopUpServerForm($logInvoiceID, $ref1, $ref2, $amount, $memberID) : $bill->getKrungsriAtTopUpServerForm($logInvoiceID, $ref1, $ref2, $amount, $memberID, true);
                break;
            default:
                break;
        }
        $bill->closeDb();
        return $bank;
    }

    public static function getQrPaymentByT2PMerchant($logInvoiceID, $merchantInvoiceID, $ref1, $ref2, $amount, $mobile, $chnnel, $mileage, $expire, $db, $isbyPass = false, $isDuplicate = false)
    {
        return (new BPayment())->getQrPaymentByT2PMerchant($logInvoiceID, $amount);
    }

    public static function requestPaycodeCs($InvID = null, $amount = 0)
    {
        $mainternance = false;
        if ($mainternance) {
            return ['code' => -99, 'msg' => 'ช่องทางการชำระเงินผ่านเคาน์เตอร์เซอร์วิส ปิดให้บริการชั่วคราว. ขออภัยในความไม่สะดวกค่ะ'];
        }

        $timeout = 180;
        ini_set('max_execution_time', $timeout);

        $ch = curl_init();
        $url = BASE_URL_APIROOT_DEEPPOCKET . 'counterService/requestPaycode.php';

        // Util::LogFile('TEST-BILL', 'URL=>'.$url);

        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(['source' => 'bill', 'invoice' => $InvID, 'amount' => $amount, 'service' => 'bzb']));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $postResult = curl_exec($ch);
        // $curlInfo = @curl_getinfo($ch);
        // $errorNo    = curl_errno($ch);
        // $error      = curl_error($ch);

        curl_close($ch);
        $response = json_decode($postResult, true);

        return $response;
    }
}
