<?php

namespace App\Http\Middleware;

use App\Exceptions\PermissionDeniedException;
use Closure;
use Illuminate\Contracts\Auth\Guard;

class VerifyPermission
{
    /**
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  \Closure  $next
     * @param  int|string  $permission
     *
     * @return mixed
     * @throws \App\Exceptions\PermissionDeniedException
     *
     */
    public function handle($request, Closure $next, $permission)
    {
        if ($this->auth->check() && in_array('admin', $this->auth->user()->roles->pluck('slug')->toArray()) || $this->auth->user()->hasPermission($permission)) {
            return $next($request);
        }

        throw new PermissionDeniedException($permission);
    }
}
