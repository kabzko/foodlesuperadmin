<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Chat;
use App\Models\Fare;
use App\Models\Order;
use App\Models\Product;
use App\Models\Rider;
use App\Models\RiderOrder;
use App\Models\Store;
use App\Models\Ticket;

class ApiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function hashpassword()
    {
        return Hash::make(1234);
    }

    public function load_riders()
    {
        return Rider::all();
    }

    public function load_stores()
    {
        return Store::all();
    }

    public function all_fares(Request $request)
    {
        return Fare::all();
    }

    public function save_new_store(Request $request)
    {
        $name = $request->input("name");
        $streets = $request->input("streets");
        $preparingtime = $request->input("preparingtime");
        $deliverytype = $request->input("deliverytype");
        $latitude = $request->input("latitude");
        $longitude = $request->input("longitude");
        $closeday = $request->input("closeday");
        $opentimea = $request->input("opentimea");
        $opentimeb = $request->input("opentimeb");
        $storebanner = $request->file("storebanner");
        $orderbanner = $request->file("orderbanner");
        $storethumbnail = $request->file("storethumbnail");
        $tinnumber = $request->input("tinnumber");
        $username = $request->input("username");
        $password = $request->input("password");
        $storebannername = $name."storebanner.".$storebannername->getClientOriginalExtension();
        $storebannerpath = "C:/xampp/htdocs/foodleimages/store_image/";
        $storebanner->move($storebannerpath, $storebannername);
        $storebannerurl = "http://localhost/foodleimages/store_image/".$storebannername;
        $orderbannername = $name."orderbanner.".$orderbannername->getClientOriginalExtension();
        $orderbannerpath = "C:/xampp/htdocs/foodleimages/store_image/";
        $orderbanner->move($orderbannerpath, $orderbannername);
        $orderbannerurl = "http://localhost/foodleimages/store_image/".$orderbannername;
        $storethumbnailname = $name."storethumbnail.".$storethumbnailname->getClientOriginalExtension();
        $storethumbnailpath = "C:/xampp/htdocs/foodleimages/store_image/";
        $storethumbnail->move($storethumbnailpath, $storethumbnailname);
        $storethumbnailurl = "http://localhost/foodleimages/store_image/".$storethumbnailname;
        Store::create(["username" => $username, "password" => Hash::make($password), "name" => $name, "streets" => $streets, "preparing_time" => $preparingtime, "delivery_type" => $deliverytype, "latitude" => $latitude, "longitude" => $longitude, "close_day" => $closeday, "open_time_a" => $opentimea, "open_time_b" => $opentimeb, "tin" => $tinnumber, "storebanner" => $storebannerurl, "orderbanner" => $orderbannerurl, "storethumbnail" => $storethumbnailurl, "status_id" => 1]);
        return 1;
    }

    public function load_store_detail(Request $request)
    {
        $storeid = $request->input("storeid");
        return Store::where("id", $storeid)->get();
    }

    public function update_store_detail(Request $request)
    {
        $storeid = $request->input("storeid");
        $name = $request->input("name");
        $streets = $request->input("streets");
        $preparingtime = $request->input("preparingtime");
        $deliverytype = $request->input("deliverytype");
        $latitude = $request->input("latitude");
        $longitude = $request->input("longitude");
        $closeday = $request->input("closeday");
        $opentimea = $request->input("opentimea");
        $opentimeb = $request->input("opentimeb");
        $storebanner = $request->file("storebanner");
        $orderbanner = $request->file("orderbanner");
        $storethumbnail = $request->file("storethumbnail");
        $tinnumber = $request->input("tinnumber");
        if ($storebanner != null) {
            $storebannername = $name."storebanner.".$storebanner->getClientOriginalExtension();
            $storebannerpath = "C:/xampp/htdocs/foodleimages/store_image/";
            $storebanner->move($storebannerpath, $storebannername);
            $storebannerurl = "http://localhost/foodleimages/store_image/".$storebannername;
            Store::where("id", $storeid)->update(["storebanner" => $storebannerurl]);
        }
        if ($orderbanner != null) {
            $orderbannername = $name."orderbanner.".$orderbanner->getClientOriginalExtension();
            $orderbannerpath = "C:/xampp/htdocs/foodleimages/store_image/";
            $orderbanner->move($orderbannerpath, $orderbannername);
            $orderbannerurl = "http://localhost/foodleimages/store_image/".$orderbannername;
            Store::where("id", $storeid)->update(["orderbanner" => $orderbannerurl]);
        }
        if ($storethumbnail != null) {
            $storethumbnailname = $name."storethumbnail.".$storethumbnail->getClientOriginalExtension();
            $storethumbnailpath = "C:/xampp/htdocs/foodleimages/store_image/";
            $storethumbnail->move($storethumbnailpath, $storethumbnailname);
            $storethumbnailurl = "http://localhost/foodleimages/store_image/".$storethumbnailname;
            Store::where("id", $storeid)->update(["storethumbnail" => $storethumbnailurl]);
        }
        Store::where("id", $storeid)->update(["name" => $name, "streets" => $streets, "preparing_time" => $preparingtime, "delivery_type" => $deliverytype, "latitude" => $latitude, "longitude" => $longitude, "close_day" => $closeday, "open_time_a" => $opentimea, "open_time_b" => $opentimeb, "tin" => $tinnumber]);
        return 1;
    }

    public function save_new_rider(Request $request)
    {
        $firstname = $request->input("firstname");
        $middlename = $request->input("middlename");
        $lastname = $request->input("lastname");
        $gender = $request->input("gender");
        $dateofbirth = $request->input("dateofbirth");
        $email = $request->input("email");
        $cellphone = $request->input("cellphone");
        $birthofplace = $request->input("birthofplace");
        $civilstatus = $request->input("civilstatus");
        $citizenship = $request->input("citizenship");
        $height = $request->input("height");
        $weight = $request->input("weight");
        $religion = $request->input("religion");
        $cityaddress = $request->input("cityaddress");
        $provincialaddress = $request->input("provincialaddress");
        $elementary = $request->input("elementary");
        $highschool = $request->input("highschool");
        $college = $request->input("college");
        $tinnumber = $request->input("tinumber");
        $ridercode = $request->input("ridercode");
        $username = $request->input("username");
        $password = $request->input("password");
        $nbiclearance = $request->file("nbiclearance");
        $nbiclearancename = $firstname." ".$lastname.".".$nbiclearance->getClientOriginalExtension();
        $nbiclearancepath = "C:/xampp/htdocs/foodleimages/rider_image/";
        $nbiclearance->move($nbiclearancepath, $nbiclearancename);
        $nbiclearanceurl = "http://localhost/foodleimages/rider_image/".$nbiclearancename;
        $resume = $request->file("resume");
        $resumename = $firstname." ".$lastname.".".$resume->getClientOriginalExtension();
        $resumepath = "C:/xampp/htdocs/foodleimages/rider_image/";
        $resume->move($resumepath, $resumename);
        $resumeurl = "http://localhost/foodleimages/rider_image/".$resumename;
        Rider::create(["firstname" => $firstname, "middlename" => $middlename, "lastname" => $lastname, "gender" => $gender, "dateofbirth" => $dateofbirth, "email" => $email, "cellphone" => $cellphone, "birthofplace" => $birthofplace, "civilstatus" => $civilstatus, "citizenship" => $citizenship, "height" => $height, "weight" => $weight, "religion" => $religion, "cityaddress" => $cityaddress, "provincialaddress" => $provincialaddress, "elementary" => $elementary, "highschool" => $highschool, "college" => $college, "tin" => $tinnumber, "nbiclearance" => $nbiclearanceurl, "resume" => $resumeurl, "rider_code" => $ridercode, "username" => $username, "password" => Hash::make($password), "status_id" => 1]);
        return 1;
    }

    public function load_rider_detail(Request $request)
    {
        $riderid = $request->input("riderid");
        return Rider::where("id", $riderid)->get();
    }

    public function update_rider_detail(Request $request)
    {
        $riderid = $request->input("riderid");
        $firstname = $request->input("firstname");
        $middlename = $request->input("middlename");
        $lastname = $request->input("lastname");
        $gender = $request->input("gender");
        $dateofbirth = $request->input("dateofbirth");
        $email = $request->input("email");
        $cellphone = $request->input("cellphone");
        $birthofplace = $request->input("birthofplace");
        $civilstatus = $request->input("civilstatus");
        $citizenship = $request->input("citizenship");
        $height = $request->input("height");
        $weight = $request->input("weight");
        $religion = $request->input("religion");
        $cityaddress = $request->input("cityaddress");
        $provincialaddress = $request->input("provincialaddress");
        $elementary = $request->input("elementary");
        $highschool = $request->input("highschool");
        $college = $request->input("college");
        $tinnumber = $request->input("tinumber");
        $ridercode = $request->input("ridercode");
        $username = $request->input("username");
        $password = $request->input("password");
        $nbiclearance = $request->file("nbiclearance");
        if ($nbiclearance != null) {
            $nbiclearancename = $firstname." ".$lastname."nbiclearance.".$nbiclearance->getClientOriginalExtension();
            $nbiclearancepath = "C:/xampp/htdocs/foodleimages/rider_image/";
            $nbiclearance->move($nbiclearancepath, $nbiclearancename);
            $nbiclearanceurl = "http://localhost/foodleimages/rider_image/".$nbiclearancename;
            Rider::where("id", $riderid)->update(["nbiclearance" => $nbiclearanceurl]);
        }
        $resume = $request->file("resume");
        if ($resume != null) {
            $resumename = $firstname." ".$lastname."resume.".$resume->getClientOriginalExtension();
            $resumepath = "C:/xampp/htdocs/foodleimages/rider_image/";
            $resume->move($resumepath, $resumename);
            $resumeurl = "http://localhost/foodleimages/rider_image/".$resumename;
            Rider::where("id", $riderid)->update(["resume" => $resumeurl]);
        }
        Rider::where("id", $riderid)->update(["firstname" => $firstname, "middlename" => $middlename, "lastname" => $lastname, "gender" => $gender, "dateofbirth" => $dateofbirth, "email" => $email, "cellphone" => $cellphone, "birthofplace" => $birthofplace, "civilstatus" => $civilstatus, "citizenship" => $citizenship, "height" => $height, "weight" => $weight, "religion" => $religion, "cityaddress" => $cityaddress, "provincialaddress" => $provincialaddress, "elementary" => $elementary, "highschool" => $highschool, "college" => $college, "tin" => $tinnumber, "rider_code" => $ridercode]);
        return 1;
    }

    public function update_fares(Request $request)
    {
        $fareid =  $request->input("fareid");
        $price =  $request->input("price");
        Fare::where("id", $fareid)->update(["price" => $price]);
        return 1;
    }

    public function load_tickets(Request $request)
    {
        return response()->json([
            "users" => Ticket::join("users", "tickets.user_id", "=", "users.id")->join("ticket_status", "tickets.status_id", "=", "ticket_status.id")->select("tickets.id", "tickets.ticket_number", "tickets.title", "ticket_status.name", "users.firstname")->get(),
            "stores" => Ticket::join("stores", "tickets.store_id", "=", "stores.id")->join("ticket_status", "tickets.status_id", "=", "ticket_status.id")->select("tickets.id", "tickets.ticket_number", "tickets.title", "ticket_status.name", "stores.name")->get(),
            "riders" => Ticket::join("riders", "tickets.rider_id", "=", "riders.id")->join("ticket_status", "tickets.status_id", "=", "ticket_status.id")->select("tickets.id", "tickets.ticket_number", "tickets.title", "ticket_status.name", "riders.firstname")->get(),
        ]);
    }

    public function load_chatbox(Request $request)
    {
        $ticketid = $request->input("ticketid");
        return response()->json([
            "user" => Chat::join("tickets", "chats.ticket_id", "=","tickets.id")->select("tickets.ticket_number", "tickets.title", "tickets.status_id", "chats.user_id", "chats.message", "chats.created_at")->where("ticket_id", $ticketid)->get(),
            "store" => Chat::join("tickets", "chats.ticket_id", "=","tickets.id")->select("tickets.ticket_number", "tickets.title", "tickets.status_id", "chats.store_id", "chats.message", "chats.created_at")->where("ticket_id", $ticketid)->get(),
            "rider" => Chat::join("tickets", "chats.ticket_id", "=","tickets.id")->select("tickets.ticket_number", "tickets.title", "tickets.status_id", "chats.rider_id", "chats.message", "chats.created_at")->where("ticket_id", $ticketid)->get(),
        ]);
    }

    public function send_message(Request $request)
    {
        $ticketid = $request->input("ticketid");
        $message = $request->input("message");
        Chat::create(["ticket_id" => $ticketid, "message" => $message]);
        return 1;
    }

    public function close_ticket(Request $request)
    {
        $ticketid = $request->input("ticketid");
        Ticket::where("id", $ticketid)->update(["status_id" => 2]);
        return 1;
    }

    public function load_active_orders(Request $request)
    {
        $orderlist = [];
        $orders = Order::join("order_status", "orders.status_id", "=", "order_status.id")->select("orders.id", "order_status.name", "orders.token", "orders.ship_from", "orders.ship_to", "orders.when")->selectRaw('CONCAT(SUBSTRING(DAYNAME(orders.created_at), 1, 3), ", ", SUBSTRING(MONTHNAME(orders.created_at), 1, 3), " ", DAY(orders.created_at), ", ", YEAR(orders.created_at), " ", TIME_FORMAT(TIME(orders.created_at), "%h:%i:%s %p")) as datetime')->where(function($query){$query->where("orders.status_id", 1)->orWhere("orders.status_id", 2)->orWhere("orders.status_id", 3)->orWhere("orders.status_id", 4);})->get();
        $riderorders = RiderOrder::join("riders", "rider_orders.rider_id", "=", "riders.id")->join("rider_order_status", "rider_orders.status_id", "=", "rider_order_status.id")->where(function($query){$query->where("rider_orders.status_id", 1)->orWhere("rider_orders.status_id", 2);})->get();
        foreach ($orders as $x) {
            foreach ($riderorders as $y) {
                if ($x->id == $y->order_id) {
                    array_push($orderlist, ["id" => $x->id, "orderstatus" => $x->name, "token" => $x->token, "ship_from" => $x->ship_from, "ship_to" => $x->ship_to, "when" => $x->when, "datetime" => $x->datetime, "riderstatus" => $y->name, "riderfirstname" => $y->firstname, "riderlastname" => $y->lastname, "ridercode" => $y->rider_code]);
                } else {
                    array_push($orderlist, ["id" => $x->id, "orderstatus" => $x->name, "token" => $x->token, "ship_from" => $x->ship_from, "ship_to" => $x->ship_to, "when" => $x->when, "datetime" => $x->datetime, "riderstatus" => "N/A", "riderfirstname" => "N/A", "riderlastname" => "N/A", "ridercode" => "N/A"]);
                }
            }
        }
        return $orderlist;
    }

    public function reset_rider_password(Request $request)
    {
        $riderid = $request->input("riderid");
        Rider::where("id", $riderid)->update(["password" => Hash::make("12345")]);
        return 1;
    }

    public function reset_store_password(Request $request)
    {
        $storeid = $request->input("storeid");
        Store::where("id", $storeid)->update(["password" => Hash::make("12345")]);
        return 1;
    }
}
