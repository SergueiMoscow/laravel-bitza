<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use App\Models\UserAccessToken;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Api\OutputController;
use Illuminate\Support\Facades\DB;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
//         $api_token = $this->getTokenFromRequest($request);
//         echo "Api_TOken: $api_token<br>";
//         if ($this->getUserByToken($request, $api_token)) {
//             return route('expectedpayments');
//         } else {
//             Log::channel('catched')->warning(date("Y-m-d H:i:s") . " - User not found for token $api_token from ip: " . $request->getClientIp());
//             OutputController::setError(['999' => 'User not found for token passed']);
// // Пока так
//             //return $next($request);
//             throw new \ErrorException('User not found for token passed(1)', 99);
//         }

        if (! $request->expectsJson()) {
            return route('login');
        }
    }

    private function getTokenFromRequest(Request $request): string
    {
        $token = $request->token;
        if (empty($token) && $request->hasHeader('x-api-key')) {
            $token = $request->header('x-api-key');
        }
        if ($token) {
            return $token;
        } else {
            return '';
        }
    }

    public function getUserByToken(Request $request, string $api_token): ?User
    {
        //try {
            Log::write('debug', "Api_token1: $api_token");
            $result = DB::table('personal_access_tokens')->
                select('tokenable_id')->
                where('token', $api_token)->
                get();
            if (count($result)>0) {
                $token = $result[0];
            } else {
                $token = $result[0];
            }
            //UserAccessToken::where('token', $api_token)->get()[0];
            print_r($token);
        // } catch (\Exception $e) {
        //     Log::channel('catched')->warning(date("Y-m-d H:i:s") . " - Trying login with token $api_token from ip: " . $request->getClientIp());
        //     OutputController::setError(['999' => 'Login attempt with false token']);
        //     return null;
        //     //throw new \ErrorException('Login attempt with false token', 99);
        // }
        $user = User::find($token->tokenable_id);
        Log::write('debug', "user found?: ". print_r($user, true));
        User::$currentUser = $user;
        UserAccessToken::$currentToken = $token;
        if (!$user) {
            Log::channel('catched')->warning(date("Y-m-d H:i:s") . " - User not found for token $api_token from ip: " . $request->getClientIp());
            OutputController::setError(['999' => 'User not found for token passed']);
            //throw new \ErrorException('User not found for token passed(2)', 99);
        }
        Log::write('debug', "user found!: ". print_r($user, true));
        return $user;
    }


}
