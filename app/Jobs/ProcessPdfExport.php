<?php

namespace App\Jobs;

use App\Events\ExportPdfStatusUpdated;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class ProcessPdfExport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(protected User $user)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        event(new ExportPdfStatusUpdated($this->user, [
            'message' => __('Exporting').'...',
        ]));

        try {
            $users = User::all();

            Pdf::loadView('pdf.users', compact('users'))
                ->save('users.pdf', 'public');

            event(new ExportPdfStatusUpdated($this->user, [
                'message' => __('Complete!'),
                'link' => Storage::disk('public')->url('users.pdf'),
            ]));

        } catch (\Throwable $th) {
            event(new ExportPdfStatusUpdated($this->user, [
                'message' => 'Error:'.__('Whoops! Something went wrong.'),
            ]));

            logger($th->getMessage());
        }
    }
}
