<?php

namespace Xooxx\Serializer\Serializer\InternalClasses;

use Xooxx\Serializer\Serializer;
use ReflectionClass;
use SplFixedArray;
class SplFixedArraySerializer
{
    /**
     * @param Serializer $serializer
     * @param SplFixedArray $splFixedArray
     *
     * @return array
     * @throws \ReflectionException
     */
    public static function serialize(Serializer $serializer, SplFixedArray $splFixedArray)
    {
        $toArray = [Serializer::CLASS_IDENTIFIER_KEY => get_class($splFixedArray), Serializer::CLASS_PARENT_KEY => 'SplFixedArray', Serializer::SCALAR_VALUE => []];
        foreach ($splFixedArray->toArray() as $key => $field) {
            $toArray[Serializer::SCALAR_VALUE][$key] = $serializer->serialize($field);
        }
        return $toArray;
    }

    /**
     * @param Serializer $serializer
     * @param string $className
     * @param array $value
     *
     * @return mixed
     * @throws \ReflectionException
     */
    public static function unserialize(Serializer $serializer, $className, array $value)
    {
        $data = $serializer->unserialize($value[Serializer::SCALAR_VALUE]);
        /* @var SplFixedArray $instance */
        $ref = new ReflectionClass($className);
        $instance = $ref->newInstanceWithoutConstructor();
        $instance->setSize(count($data));
        foreach ($data as $k => $v) {
            $instance[$k] = $v;
        }
        return $instance;
    }
}