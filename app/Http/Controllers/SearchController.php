<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request)
{
    $query = $request->query('query');

    // Define the tables and fields to search
    $tables = [
        'news',
        'announcements',
        'sports',
        'entertainements',
        'events',
        'lifestyles',
    ];

    $results = collect();

    // Check if the query is a month, day, or year
    $months = [
        'january' => 1, 'february' => 2, 'march' => 3, 'april' => 4,
        'may' => 5, 'june' => 6, 'july' => 7, 'august' => 8,
        'september' => 9, 'october' => 10, 'november' => 11, 'december' => 12
    ];

    $isMonthQuery = isset($months[strtolower($query)]);
    $monthNumber = $isMonthQuery ? $months[strtolower($query)] : null;

    $isYearQuery = is_numeric($query) && strlen($query) === 4; // Check if query is a 4-digit year
    $isDayQuery = is_numeric($query) && $query > 0 && $query <= 31; // Check if query is a valid day

    foreach ($tables as $table) {
        $tableResults = DB::table($table)
            ->when($isMonthQuery, function ($q) use ($monthNumber) {
                // If the query is a month, filter by created_at month
                return $q->whereMonth('created_at', $monthNumber);
            })
            ->when($isYearQuery, function ($q) use ($query) {
                // If the query is a year, filter by created_at year
                return $q->whereYear('created_at', $query);
            })
            ->when($isDayQuery, function ($q) use ($query) {
                // If the query is a day, filter by created_at day
                return $q->whereDay('created_at', $query);
            })
            ->when(!$isMonthQuery && !$isYearQuery && !$isDayQuery, function ($q) use ($query) {
                // Otherwise, filter by name or hashtag
                return $q->where('name', 'LIKE', "%{$query}%")
                             ->orWhere('hashtag', 'LIKE', "%{$query}%");
            })
            ->select(
                'id',
                'name',
                'description',
                'image_path',
                'status',
                'hashtag',
                'type',
                'created_at',
                DB::raw("'$table' as source") // To identify the table of origin
            )
            ->get();

        $results = $results->merge($tableResults);
    }

    return response()->json(['results' => $results]);
}
}
