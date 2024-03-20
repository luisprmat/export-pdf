<?php

namespace App\Http\Controllers;

use App\Events\ExportPdfStatusUpdated;
use App\Jobs\ProcessPdfExport;
use Illuminate\Http\Request;

class ExportPdfController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        event(new ExportPdfStatusUpdated($request->user(), [
            'message' => __('Queing').'...',
        ]));

        ProcessPdfExport::dispatch($request->user());

        return response()->noContent();
    }
}
