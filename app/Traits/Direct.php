<?php
namespace App\Traits;

trait Direct
{
    protected function backWithMessage($key, $val): \Illuminate\Http\RedirectResponse
    {
        return back()->with($key, $val);
    }

    protected function redirectRouteWithMessage($routeName, $key, $val): \Illuminate\Http\RedirectResponse
    {
        return redirect()->route($routeName)->with($key, $val);
    }

    protected function redirectRoute($routeName)
    {
        return redirect()->route($routeName);
    }

    protected function backRoute()
    {
        return back();
    }
}
