<?php
namespace App\model;
use App\model\dBHandler;


class ProductRepo {
    protected $failed_conditions = array();
    protected $data_for_sql = array();
    // protected $form_data = $_GET;

    public static function validKey($key) {
        $valid_keys = array();
        if (array_key_exists($key, $valid_keys)) {
            return True;
        }
        throw new \Exception("key unset");
    }

    public static function new($request){
        // die($request->param("check_item"));
        try {
            $data_for_sql["item_vendor"] = $request->param("vendor");
            $data_for_sql["item_name"] = $request->param("item");
            $data_for_sql["item_skuid"] = intval($request->param("item_id"));
            $data_for_sql["item_price"] = floatval($request->param("price"));
            $data_for_sql["item_opend"] = $request->param("opend");
            if ($data_for_sql["item_opend"] == ""){
                $data_for_sql["item_opend"] = 0;
            }
            $data_for_sql["item_weight"] = $request->param("weight");
            $data_for_sql["item_qty"] = intval($request->param("qty"));
            $data_for_sql["item_date_add"] = $request->param("date_bought");
            $data_for_sql["item_date_expiry"] = $request->param("date_expiry");
            $data_for_sql["item_expiration_period"] = $request->param("shelf_life");
            $data_for_sql["item_img_url"] = $request->param("img_url");

        }
        catch(\Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }


        // test if failed array has contents, if so. Break the mysql insert and return failed parameters
        if (empty($failed_conditions)){
            

            $DB = new dBHandler;
            $response = $DB->insert($data_for_sql);  // inserts values if ALL have passed
            print_r($response);
            die();
        }
        else {
            die(implode(",", $failed_conditions));
        }

    }
    public function scrape($request){
        return $request;
    }
}


?>