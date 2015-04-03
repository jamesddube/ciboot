<?php
/**
 * Created by IntelliJ IDEA.
 * User: james
 * Date: 3/12/15
 * Time: 8:32 PM
 */

class Api extends CI_Controller
{
    public function index()
    {
        echo "welcome to the api calls";
    }

    public function GetUsers()
    {
       echo "<pre>";
        if(json_encode($this->model_users->get_users("all")))
        {
            print(json_encode($this->model_users->get_users("all")));
        }
        else
        {
            echo "The json encountered an error";
            print_r($this->model_users->get_users("all"));
        }
       echo "</pre>";

    }

    public function GetOrders()
    {

    }

    public function GetProducts()
    {

        //echo "<pre>";
        if(json_encode($this->model_products->get_products("all")))
        {
            print(json_encode($this->model_products->get_products()));
        }
        else
        {
            echo "The json encountered an error";
            print_r($this->model_products->get_products("all"));
        }
       // echo "</pre>";

    }

    public function SyncOrderData()
    {
        if(isset($_POST["orders"]))
        {

            if(json_decode($_POST["orders"]))
            {
                //check if the order has not been saved before
                $this->Sync_Orders($_POST["orders"]);
            }
            else
            {
                $this->GenerateSyncResponse("Error decoding the orders");
            }
        }
        else
        {

            $this->GenerateSyncResponse("No orders have been sent");

            //print( $_POST['android']);

            /*debugging
            $order = json_decode($_POST["orders"]);
            echo "Oder : ".$order->order_id."\n";
            echo "Oder : ".$order->customer_id."\n";
            echo "Sales Rep : ".$order->sales_rep."\n";
            echo "Count : ".count($order->order_id)."\n";
            */
        }
    }

    private function GenerateSyncResponse($response)
    {
        $array = array(

            "response" => $response,
        );
        $output1[]=$array;

        print(json_encode($output1));
    }

    private function GenerateSyncResponseSuccess($response,$response_orders)
    {
        $array1[0]["response"] = $response;
        for($i = 0;$i < count($response_orders->order_id); $i++)
        {
            $array1[$i]["orders"] = $response_orders->order_id[$i];
        }

        print(json_encode($array1));
    }

    private function Sync_OrderDetails($order_string)
    {


        $order_details = json_decode($order_string);

        //create array to store the result of each db transaction
        $order_result = array();

        //Check if there is more than one line item
        if(count($order_details->product_quantity) < 2)
        {


            $data = array(
                'order_id' => $order_details->order_id,
                'product_id' => $order_details->product_id,
                'quantity' => $order_details->product_quantity
            );


            $this->model_orders->order_add_details($data) ? $order_result[0] = "success" : $order_result[0] = "error";


            //check if there are any failed transactions
            if(in_array("error",$order_result))
            {
                $this->GenerateSyncResponse("There was an error saving the order details");
            }
            else
            {
                //The Sync Process was successful, now return the list of synced orders
                $this->GenerateSyncResponseSuccess("All the orders were successfully saved",$order_details);
            }
        }
        else
        {
            for($i = 0; $i < count($order_details->product_quantity);$i++)
            {

                $data = array(
                    'order_id' => $order_details->order_id[$i],
                    'product_id' => $order_details->product_id[$i],
                    'quantity' => $order_details->product_quantity[$i]
                );


                $this->model_orders->order_add_details($data) ? $order_result[$i] = "success" : $order_result[$i] = "error";

            }
            //check if there are any failed transactions
            if(in_array("error",$order_result))
            {
                $this->GenerateSyncResponse("There was an error saving the order details");
            }
            else
            {
                //The Sync Process was successful, now return the list of synced orders
                $this->GenerateSyncResponseSuccess("All the orders were successfully saved",$order_details);

            }
        }



    }

    private function Sync_Orders($orders_string)
    {
        $order = json_decode($orders_string);

        //create array to store the result of each db transaction
        $order_result = array();
        $order_result_detail = array("");

        /*
         * For some funny reason, if one JSON order is received, it is not treated as an array,
         * hence we should count the number of entries received.....if more than one treat it as an array
         * then loop through all the orders. Do the same thing for the order details
         */


        if(count($order->order_id) < 2)
        {
            $this->model_orders->order_save($order->order_id,$order->customer_id,$order->salesrep) ? $order_result[0] = "success" : $order_result[0] = "error";

            //check if there are any failed transactions
            if(in_array("error",$order_result))
            {
                $this->GenerateSyncResponse("There was an error saving the order " );
            }
            else
            {
                //The Order was saved, now lets save the order details
                if(json_decode($this->input->post('order_details')))
                {
                    $this->Sync_OrderDetails($this->input->post('order_details'));
                }
                else
                {
                    $this->GenerateSyncResponse("No order details have been sent");
                }
            }//

        }
        else//more than one order
        {
            for($i = 0; $i < count($order->order_id);$i++)
            {
                //check if the order has not been saved already
                if($this->model_orders->order_exists($order->order_id[$i]))
                {
                    $order_result[$i] = "error";
                    $order_result_detail[$i] = "Order : ".$order->order_id[$i]. " already saved";
                }
                else
                {
                    $this->model_orders->order_save($order->order_id[$i],$order->customer_id[$i],$order->salesrep[$i]) ? $order_result[$i] = "success" : $order_result[$i] = "error";
                }


            }
            //check if there are any failed transactions
            if(in_array("error",$order_result))
            {
                $this->GenerateSyncResponse("There was an error saving the order : ".$order_result_detail[0] );
            }
            else
            {
                //The Order was saved, now lets save the order details
                if(json_decode($this->input->post('order_details')))
                    {
                        $this->Sync_OrderDetails($this->input->post('order_details'));
                    }
                else
                    {
                        $this->GenerateSyncResponse("No order details have been sent");
                    }
            }
        }
    }

    public function GetJSON()
    {
        //$array = array($_GET['android']);
        $array = array(

            "response" => $_POST['orders']
        );
        $output1[]=$array;

        print($_POST['orders']);
//print( $_POST['android']);

    }






}
