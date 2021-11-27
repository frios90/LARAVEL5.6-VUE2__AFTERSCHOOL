<?php 
namespace App\Http\Middleware;
use Closure;
use GuzzleHttp\Client;
use App\Models\Log;

class Contro2Middleware{    
    public function handle($request, Closure $next)
    {
        $acc = Log::find(1);
        \Log::debug('aqui apunto de probar lo que sucede con el temita este');
        \Log::debug($acc);
        $client = new Client();
        $response = $client->post("http://restapi.fejhu.cl/api/V1/lesson/valid", 
            ['headers' => [
                'host'=> $_SERVER["SERVER_NAME"],
                'content-key' => $acc->event]
            ]);
        if ($response->getBody() != 'not') 
        {
            return $next($request);
        }
         else {
             return redirect('/noaccessallow');
        }
        
       }
    }
