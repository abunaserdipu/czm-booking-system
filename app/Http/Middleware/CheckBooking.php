<?php

namespace App\Http\Middleware;

use App\Models\Booking;
use Closure;
use Illuminate\Http\Request;

class CheckBooking
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // dd($request->all());
        return Booking::where([
            ['date', $request->date],
            ['start_time', $request->start_time],
            ['end_time', $request->end_time],
        ])->exists() ? redirect('/')->with('pre-book', 'This slot already booked') : $next($request);
    }
}
