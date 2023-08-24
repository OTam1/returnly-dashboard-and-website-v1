<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (!auth()->check()) {
            return redirect('login');
        }
    
        $user = $request->user();
    
        if (in_array($user->role_id, $roles)) {
            return $next($request);
        }
    
        // Redirect the user to their role-specific dashboard
        switch ($user->role_id) {
            case 1:
                return redirect()->route('admin.dashboard');
            case 2:
                return redirect()->route('corprator.dashboard');
            case 3:
                return redirect()->route('dashboard');
            // Add more cases for other roles if needed
            default:
                abort(403, 'Unauthorized.');
        }
    }    
}
