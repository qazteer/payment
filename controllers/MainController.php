<?php

require_once "controllers/ApiController.php";
require_once "models/Validate.php";

/**
 * Class MainController
 */
class MainController extends ApiController
{
    /**
     * @return string
     */
    protected function getTitle()
    {
        return "Payment information";
    }

    /**
     * @param $data
     * @return mixed
     */
    protected function getMiddle($data)
    {
        $arr["title"] = $this->getTitle();
        $arr["message"] = $data["message"] ?? "";
        $arr["response"] = $data["response"] ?? "";
        $arr["list_error"] = $data["list_error"] ?? "";
        $arr["credit_card_number"] = $data["credit_card_number"] ?? "";
        $arr["expiration_date"] = $data["expiration_date"] ?? "";
        $arr["cvv"] = $data["cvv"] ?? "";
        $arr["email"] = $data["email"] ?? "";
        $arr["phone"] = $data["phone"] ?? "";

        return $this->getTemplate($arr, "home");
    }

    /**
     * @return string|string[]
     */
    public function indexAction()
    {
        return $this->response(null, 200);
    }

    /**
     * @return string|string[]
     */
    public function validateAction()
    {
        $validation = new Validate();
        $data = $validation->validation();

        if (!empty($data["list_error"])) {
            $data["message"] = "error-message";
            $data["response"] = "Payment information is not validate";
            return $this->response($data, 500);
        }

        $data["message"] = "success-message";
        $data["response"] = "Payment information is validate.";
        return $this->response($data, 200);
    }


}