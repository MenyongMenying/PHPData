<?php


namespace MenyongMenying\MenyongMenyingLibrary\PHP\Data;

use ArrayAccess;
use Exception;

/**
 * @author MenyongMenying <menyongmenying.main@email.com>
 * 
 * @version 0.0.1
 * 
 * @since 2025-05-28
 * 
 * @method void __construct(array $data = [])
 * @method void __set(string $name, mixed $value)
 * @method mixed __get(string $name)
 * 
 * @method bool offsetExists(mixed $offset)
 * @method void offsetSet(mixed $offset, mixed $value)
 * @method mixed offsetGet(mixed $offset)
 * @method void offsetUnset(mixed $offset)
 */
final class Data implements ArrayAccess
{
    /**
     * __construct(array $data = [])
     *
     * @param array $data
     * 
     * @return void
     */
    public function __construct(array $data = [])
    {
        foreach ($data as $i => $v) {
            if (!is_string($i)) {
                throw new Exception("Data yang dikelola harus array asosiatif.");
            }
            $this->{$i} = $v;
        }
        return;
    }

    /**
     * __set(string $name, mixed $value)
     *
     * @param  string $name
     * @param  mixed  $value
     * @return void
     */
    public function __set(string $name, mixed $value) :void
    {
        $this->{$name} = $value;
        return;
    }

    /**
     * __get(string $name)
     *
     * @param  string $name
     * @return mixed
     */
    public function __get(string $name) :mixed
    {
        return $this->{$name} ?? null;
    }

    /**
     * offsetExists(mixed $offset)
     *
     * @param  mixed   $offset
     * @return boolean
     */
    public function offsetExists(mixed $offset): bool
    {
        return isset($this->{$offset});
    }

    /**
     * offsetSet(mixed $offset, mixed $value)
     *
     * @param  mixed $offset
     * @param  mixed $value
     * @return void
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        $this->{$offset} = $value;
        return;
    }

    /**
     * offsetGet(mixed $offset)
     *
     * @param  mixed $offset
     * @return mixed
     */
    public function offsetGet(mixed $offset): mixed
    {
        return $this->{$offset} ?? null;
    }

    /**
     * offsetUnset(mxied $offset)
     *
     * @param  mixed $offset
     * @return void
     */
    public function offsetUnset(mixed $offset): void
    {
        unset($this->{$offset});
        return;
    }
}
