<?php

namespace App\Http\Controllers;

use App\Http\Requests\Question8Request;
use App\Jobs\Q11Jop;
use App\Jobs\SendEmail;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class GeneralController extends Controller
{

    public function Q1()
    {
        echo 'I will change from echo $this->string; to echo parentClass::$string';
    }

    public function Q2()
    {
        echo 'I will add a keyword before public for greet() function inside the Parent Class final';
    }

    public function Q3()
    {
        // 
    }

    public function Q4()
    {
        $products = [
            [
                "id" => 123,
                "unit_price" => 100,
                "quantity" => 2
            ],
            [
                "id" => 456,
                "unit_price" => 120,
                "quantity" => 3
            ],
            [
                "id" => 789,
                "unit_price" => 200,
                "quantity" => 1
            ]
        ];
        $discounted = 50;
        $totalDiscounted = 0;
        foreach ($products as $key) {
            // dump($key['unit_price']);
            ($key['unit_price'] <= 150)
                ?
                // الخصم كدا 50 % على الكميه كلها 
                $totalDiscounted += ($key['unit_price'] * $key['quantity']) * $discounted / 100
                :
                $totalDiscounted += $key['unit_price'] * $key['quantity'];
        }

        return $totalDiscounted;
    }

    public function Q5()
    {
        // SELECT * FROM orders 
        // INNER JOIN order_items ON orders.id = order_items.order_id
        // GROUP BY orders.id HAVING COUNT(order_items.id) > 1;
    }

    public function Q6()
    {
        // SELECT CONCAT(first_name , ' ', last_name) as full_name
        //    FROM users WHERE first_name LIKE 'A%';

        // $users = DB::table('users')
        //     ->select(DB::raw("CONCAT(first_name, ' ', last_name) as full_name"))
        //     ->where('first_name', 'LIKE', 'A%')
        //     ->get();

        // return $users;
    }

    public function Q7()
    {
        $offer_start =  Carbon::createFromFormat('Y-m-d H', '2023-05-27 22')->toDateTimeString();
        $offer_end = Carbon::createFromFormat('Y-m-d H', '2023-05-30 22')->toDateTimeString();
        $price = 500;
        $discount = 50;
        $now = now()->format('Y-m-d H:00:00');

        if ($offer_start <= $now && $now <= $offer_end) {
            // dd($offer_start,$offer_end,$price,$discount,$now);
            // discount: float (representing the percentage % of discount)
            $price -= ($price * ($discount / 100));
        }

        echo 'The Price: ' . number_format($price, 2);
    }

    public function Q8(Question8Request $request)
    {
        echo 'pass validation';
    }

    public function Q9()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');

        $posts = $response->json();

        $resultOfFilter = collect($posts)->filter(function ($value, $key) {
            return Str::startsWith($value['title'], 'd');
        });

        return array_values($resultOfFilter->all());
    }

    public function Q10()
    {
        SendEmail::dispatch('test');
    }

    public function Q11()
    {
        // not completed
        for ($i = 0; $i < 1000; $i++) {
            dispatch(new Q11Jop());
        }
    }
}
