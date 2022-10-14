<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Jobs\SendMaterialJob;
use App\Mail\Category\MaterialCreatedMail;
use App\Models\User;
use App\Models\Category;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class MaterialCreateNotification
{
    public function handle($event): void
    {
        $subscriptions = User::with('subscriptions')->get();
        $category = Category::findOrFail($event->material->category_id);

        foreach ($subscriptions as $subscription)
        {
            if ($subscription->hasSubscribed($category))
            {
                SendMaterialJob::dispatch($subscription->email, $event->material);
            }
        }
    }
}
