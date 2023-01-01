<?php
if (!function_exists('isRoute')) {
    function isRoute(string $route_name): bool{
        return request()->routeIs($route_name);
    }
}
?>