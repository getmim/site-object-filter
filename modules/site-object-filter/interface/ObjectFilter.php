<?php
/**
 * ObjectFilter
 * @package site-object-filter
 * @version 0.0.1
 */

namespace SiteObjectFilter\Iface;

interface ObjectFilter
{
	static function filter(array $cond): ?array;

    static function lastError(): ?string;
}