<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class CsrfTokenWithExclusion extends ValidateCsrfToken
{
    protected array $exceptPaths = [
        'copy-deal'
    ];

    /**
     * Check if the CSRF tokens match for the given request.
     *
     * @param  mixed  $request
     *
     * @return bool True if the CSRF tokens match, false otherwise.
     */
    protected function tokensMatch(mixed $request): bool
    {
        $componentPath = $this->getLivewireComponentPath($request);

        foreach ($this->exceptPaths as $path) {
            if (Str::is($path, $componentPath)) {
                return true;
            }
        }

        return parent::tokensMatch($request);
    }

    /**
     * Handle an incoming request.
     *
     */
    public function handle($request, Closure $next): Response
    {
        return $next($request);
    }

    /**
     * Get Livewire component path from the request.
     *
     * @param  mixed  $request
     *
     * @return string|null
     */
    protected function getLivewireComponentPath(mixed $request): ?string
    {
        $components = $request->input('components')[0] ?? [];
        $snapshot = json_decode($components['snapshot'] ?? '{}', true);
        $memo = $snapshot['memo'] ?? [];
        return $memo['name'] ?? null;
    }
}
