<?php

namespace Intranet\Models\Traits;

trait LastUpdatedTrait
{
    /**
     * Get last updated records
     * @param  Builder $query
     * @param  Datetime $from
     * @return Builder
     */
    public function scopeLastUpdated($query, $from)
    {
        return $query->where(function($query) use($from) {
            $query->where('updated_at', '>', $from);
            $query->orWhereNull('updated_at');
        });
    }
}