<?php

require_once "config/config.php";

/**
 * Class User
 */
class Validate
{
    private $config;
    private $digits;

    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->config = new Config();
        $this->digits = $this->config->digits;
    }

    /**
     * @return array
     */
    public function validation()
    {
        $error = [];
        $data["list_error"] = "";
        $data["credit_card_number"] = $_POST['credit_card_number'] ?? '';
        $data["expiration_date"] = $_POST['expiration_date'] ?? '';
        $data["cvv"] = $_POST['cvv'] ?? '';
        $data["email"] = $_POST['email'] ?? '';
        $data["phone"] = $_POST['phone'] ?? '';

        if (empty($data["credit_card_number"])) {
            $error[] = "Credit card number is required";
        }

        if (!empty($data["credit_card_number"]) && !is_numeric($data["credit_card_number"])) {
            $error[] = "Credit card number '".$data["credit_card_number"]."' is not number";
        }

        if (!$this->isValidVuhn($data["credit_card_number"])) {
            $error[] = "Credit card number '".$data["credit_card_number"]."' is not valid based on Luhn's algorithm";
        }

        if (empty($data["expiration_date"])) {
            $error[] = "Expiration date is required";
        }

        if (!$this->validateCCExpDate($data["expiration_date"])) {
            $error[] = "Expiration date '".$data["expiration_date"]."' is not valid";
        }

        if (empty($data["cvv"])) {
            $error[] = "CVV2 is required";
        }

        if (
            !empty($data["cvv"]) &&
            strlen($data["cvv"]) != $this->digits &&
            strspn($data["cvv"], '0123456789') != $this->digits
        ) {
            $error[] = "CVV2 '".$data["cvv"]."' is not valid";
        }

        if (empty($data["email"])) {
            $error[] = "Email is required";
        }

        if (!empty($data["email"]) && !filter_var($data["email"], FILTER_VALIDATE_EMAIL)) {
            $error[] = "E-mail '" . $data["email"] . "' is not valid.";
        }

        if (empty($data["phone"])) {
            $error[] = "Phone number is required";
        }

        if (!empty($data["phone"]) && !$this->validatePhoneNumber($data["phone"])) {
            $error[] = "Phone number '" . $data["phone"] . "' is not valid.";
        }

        $data["list_error"] = !empty($error) ? implode("<br>", $error) : "";


        return $data;
    }

    /**
     * @param int $number
     * @return bool
     */
    private function isValidVuhn($number)
    {
        settype($number, 'string');
        $sumTable = array(
            array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9),
            array(0, 2, 4, 6, 8, 1, 3, 5, 7, 9)
        );
        $sum = 0;
        $flip = 0;
        for ($i = strlen($number) - 1; $i >= 0; $i--) {
            $sum += $sumTable[$flip++ & 0x1][$number[$i]];
        }
        return ($sum % 10 === 0) ? true : false;
    }

    /**
     * @param string $phone
     * @return bool
     */
    private function validatePhoneNumber($phone)
    {
        $valid_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
        $valid_number = str_replace("-", "", $valid_number);
        if (strlen($valid_number) < 10 || strlen($valid_number) > 14) {
            return false;
        }
        return true;
    }

    /**
     * @param string $str
     * @return false|int
     */
    private function validateCCExpDate($str)
    {
        return preg_match("/(0[1-9]|1[0-2])\/[0-9]{2}$/", $str);
    }
}
