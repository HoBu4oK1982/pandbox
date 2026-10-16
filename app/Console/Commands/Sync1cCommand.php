<?php

namespace App\Console\Commands;

use App\Services\OneCSyncService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class Sync1cCommand extends Command
{
    /**
     * Использование:
     *   php artisan 1c:sync                    # категории + товары
     *   php artisan 1c:sync --only=categories  # только категории
     *   php artisan 1c:sync --only=products    # только товары
     */
    protected $signature = '1c:sync {--only= : categories | products}';

    protected $description = 'Синхронизация категорий и товаров с 1С';

    public function handle(OneCSyncService $service): int
    {
        $only = $this->option('only');
        $doCategories = in_array($only, [null, 'categories'], true);
        $doProducts   = in_array($only, [null, 'products'], true);

        $this->info(now()->format('Y-m-d H:i:s') . ' — старт синхронизации');
        Log::info('[1C] Cron sync started');

        $hasError = false;

        if ($doCategories) {
            $this->line('› Категории...');
            $r = $service->syncCategories();
            if ($r['error']) {
                $this->error("  ✗ ошибка: {$r['error']}");
                $hasError = true;
            } else {
                $this->info("  ✓ получено: {$r['fetched']}, обновлено: {$r['saved']}, скрыто: {$r['hidden']}, показано: {$r['shown']}, пропущено: {$r['skipped']}");
            }
        }

        if ($doProducts) {
            $this->line('› Товары...');
            $r = $service->syncProducts();
            if ($r['error']) {
                $this->error("  ✗ ошибка: {$r['error']}");
                $hasError = true;
            } else {
                $this->info("  ✓ получено: {$r['fetched']}, обновлено: {$r['saved']}, скрыто: {$r['hidden']}, пропущено: {$r['skipped']}");
            }
        }

        $this->info(now()->format('Y-m-d H:i:s') . ' — готово');
        Log::info('[1C] Cron sync finished' . ($hasError ? ' with errors' : ''));

        return $hasError ? self::FAILURE : self::SUCCESS;
    }
}
