<?php

declare(strict_types=1);

namespace Kumwe\Content\Domain;

use InvalidArgumentException;

/**
 * Bounded JSON value snapshot that detaches PHP references without changing number or key types.
 *
 * @internal
 */
final class JsonValueSnapshot
{
    /**
     * @param mixed $value Source JSON-compatible value.
     * @return mixed Detached value; arrays retain their original key and iteration order.
     * @throws InvalidArgumentException For invalid UTF-8, objects, recursion or exceeded bounds.
     */
    public static function copy(mixed $value): mixed
    {
        $nodes = 0;
        $bytes = 0;
        return self::walk($value, 0, $nodes, $bytes);
    }

    /**
     * @param mixed $value Current node.
     * @param int $depth Root is level zero; at most 64 nested levels.
     * @param int $nodes Shared budget of 100000 nodes.
     * @param int $bytes Shared budget of four mebibytes of strings and keys.
     * @return mixed Reference-free scalar or array.
     */
    private static function walk(mixed $value, int $depth, int &$nodes, int &$bytes): mixed
    {
        if ($depth > 64 || ++$nodes > 100_000) {
            throw new InvalidArgumentException('Content JSON exceeds its nesting or node budget.');
        }
        if (is_string($value)) {
            $bytes += strlen($value);
            if ($bytes > 4_194_304 || !mb_check_encoding($value, 'UTF-8')) {
                throw new InvalidArgumentException('Content JSON strings must be bounded valid UTF-8.');
            }
            return $value;
        }
        if ($value === null || is_bool($value) || is_int($value)) {
            return $value;
        }
        if (is_float($value)) {
            if (!is_finite($value)) {
                throw new InvalidArgumentException('Content JSON numbers must be finite.');
            }
            return $value;
        }
        if (!is_array($value)) {
            throw new InvalidArgumentException('Content JSON cannot contain objects or resources.');
        }
        $copy = [];
        foreach ($value as $key => $child) {
            if (is_string($key)) {
                $bytes += strlen($key);
                if ($bytes > 4_194_304 || !mb_check_encoding($key, 'UTF-8')) {
                    throw new InvalidArgumentException('Content JSON keys must be bounded valid UTF-8.');
                }
            }
            $copy[$key] = self::walk($child, $depth + 1, $nodes, $bytes);
        }
        return $copy;
    }
}
