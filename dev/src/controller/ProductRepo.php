<?php
namespace App\controller;
use App\controller\dBHandler;
use App\controller\Query;

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
        if ($request->param("check_item")){ // if checking item, Query
            $query = new Query($request->param("vendor"), $request->param("barcode"));
            // redirect back to newitem page with array from Query
            header("location: ./newitem/".$query->get());
            die();
            
        }
        else {
            die("unpass");
        }

        try {
            $data_for_sql["item_vendor"] = $request->param("vendor");
            $data_for_sql["item_name"] = $request->param("item");
            $data_for_sql["item_skuid"] = $request->param("item_id");
            $data_for_sql["item_price"] = $request->param("price");
            $data_for_sql["item_opend"] = $request->param("opend");
            $data_for_sql["item_weight"] = $request->param("weight");
            $data_for_sql["item_qty"] = $request->param("qty");
            $data_for_sql["item_date_add"] = date('Y/m/d');
            $data_for_sql["item_date_expiry"] = $request->param("date_expiry");
            $data_for_sql["item_expiration_period"] = $request->param("shelf_life");
            $data_for_sql["item_img_url"] = "@FIXME";

        }
        catch(\Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }


        // test if failed array has contents, if so. Break the mysql insert and return failed parameters
        if (empty($failed_conditions)){
            $keys = implode(',', array_keys($data_for_sql));  // use keys as columns header
            $values = "'".implode("', '", array_values($data_for_sql))."'";

            $DB = new dBHandler;
            $DB->insert($keys, $values);

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