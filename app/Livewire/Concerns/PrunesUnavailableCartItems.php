<?php

namespace App\Livewire\Concerns;

use App\Models\Product;
use Cart;

/**
 * Убирает из указанного инстанса корзины (cart/wishlist) товары,
 * которые стали недоступны: удалены из БД, скрыты (status != 0)
 * или закончились на складе (qty <= 0).
 *
 * Проверка делается ОДНИМ запросом к БД через whereIn — независимо
 * от того, сколько товаров лежит в корзине.
 */
trait PrunesUnavailableCartItems
{
    /**
     * @param  string  $instance  'cart' или 'wishlist'
     * @return array<int, string>  Названия удалённых товаров (для flash-сообщений)
     */
    protected function pruneUnavailable(string $instance): array
    {
        $items = Cart::instance($instance)->content();

        if ($items->isEmpty()) {
            return [];
        }

        // Собираем ID всех товаров в корзине (могут повторяться при разных опциях,
        // unique() схлопывает)
        $productIds = $items->pluck('id')->unique()->all();

        // Одним запросом получаем ID тех товаров, которые ЕЩЁ доступны
        $validIds = Product::whereIn('id', $productIds)
            ->where('status', 0)      // активен
            ->where('qty', '>', 0)     // в наличии
            ->pluck('id')
            ->map(fn ($id) => (int) $id)
            ->all();

        $removed = [];

        foreach ($items as $item) {
            // Если товара нет в списке валидных — выкидываем из корзины/избранного
            if (! in_array((int) $item->id, $validIds, true)) {
                Cart::instance($instance)->remove($item->rowId);
                $removed[] = $item->name;
            }
        }

        return $removed;
    }
}
