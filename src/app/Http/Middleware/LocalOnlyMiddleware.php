<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LocalOnlyMiddleware
{
    /**
     * Handle an incoming request.
     * Only allow access from localhost/local IPs
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $clientIp = $request->ip();
        
        // Allow localhost and local network IPs
        $allowedIps = [
            '127.0.0.1',
            '::1',
            'localhost',
            '192.168.0.0/16',    // Local network range
            '10.0.0.0/8',        // Private network range
            '172.16.0.0/12',     // Private network range
        ];
        
        // Check if IP is in allowed ranges
        foreach ($allowedIps as $allowedIp) {
            if ($this->ipInRange($clientIp, $allowedIp)) {
                return $next($request);
            }
        }
        
        // If not local, return 403 Forbidden
        return response()->json([
            'message' => 'Access denied. Documentation is only available locally.',
            'error' => 'Forbidden'
        ], 403);
    }
    
    /**
     * Check if an IP address is within a given range
     */
    private function ipInRange(string $ip, string $range): bool
    {
        if ($ip === $range) {
            return true;
        }
        
        // Handle CIDR notation
        if (strpos($range, '/') !== false) {
            list($subnet, $bits) = explode('/', $range);
            
            if ($bits === null) {
                $bits = 32;
            }
            
            $ip = ip2long($ip);
            $subnet = ip2long($subnet);
            $mask = -1 << (32 - $bits);
            $subnet &= $mask;
            
            return ($ip & $mask) === $subnet;
        }
        
        return false;
    }
}
