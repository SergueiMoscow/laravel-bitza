<?php

namespace App\Http\Middleware;

use App\Models\UserAccessToken;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use App\Http\Controllers\Api\OutputController;

class ApiAuth extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public function handle($request, Closure $next, ...$guards)
    {
        //return $next($request);
        $api_token = $this->getTokenFromRequest($request);
        if ($this->getUserByToken($request, $api_token)) {
            return $next($request);
        } else {
            Log::channel('catched')->warning(date("Y-m-d H:i:s") . " - User not found for token $api_token from ip: " . $request->getClientIp());
            OutputController::setError(['999' => 'User not found for token passed']);
// Пока так
            return $next($request);
            //throw new \ErrorException('User not found for token passed(1)', 99);
        }
    }


    public function getUserByToken(Request $request, string $api_token): ?User
    {
        try {
            $token = UserAccessToken::where('token', $api_token)->get()[0];
        } catch (\Exception $e) {
            Log::channel('catched')->warning(date("Y-m-d H:i:s") . " - Trying login with token $api_token from ip: " . $request->getClientIp());
            OutputController::setError(['999' => 'Login attempt with false token']);
            return null;
            //throw new \ErrorException('Login attempt with false token', 99);
        }
        $user = User::find($token->tokenable_id);
        User::$currentUser = $user;
        UserAccessToken::$currentToken = $token;
        if (!$user) {
            Log::channel('catched')->warning(date("Y-m-d H:i:s") . " - User not found for token $api_token from ip: " . $request->getClientIp());
            OutputController::setError(['999' => 'User not found for token passed']);
            //throw new \ErrorException('User not found for token passed(2)', 99);
        }
        return $user;
    }

    public function checkValidDevice(Request $request, UserAccessToken $token): bool
    {
        $userAgent = $request->server('HTTP_USER_AGENT');
        if (empty($token->http_user_agent)) {
            $token->http_user_agent = $userAgent;
        }
        if ($token->http_user_agent !== $userAgent) {
            Log::channel('catched')->warning(date("Y-m-d H:i:s") . " - User {$token->user()->email} trying to login with token from other device:" . $userAgent);
            $token->delete();
            OutputController::setError(['999' => 'Login attempt with expired token']);
            //throw new \ErrorException("Login attempt with expired token", 99);
        }
        $token->last_used_at = now();
        $token->save();
        return true;
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

    public function checkUserDevice($request, $guards)
    {
        return $this->unauthenticated($request, $guards);
    }
}
