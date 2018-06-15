<?php

/**
 * Author: Xooxx <xooxx.dev@gmail.com>
 * Date: 7/3/15
 * Time: 6:00 PM.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Xooxx\Serializer\Serializer\InternalClasses;

use DateTimeZone;
use Xooxx\Serializer\Serializer;
use ReflectionClass;
class DateTimeZoneSerializer
{
    /**
     * @param DateTimeZone $dateTimeZone
     *
     * @return mixed
     */
    public static function serialize( DateTimeZone $dateTimeZone)
    {
        return array(Serializer::CLASS_IDENTIFIER_KEY => 'DateTimeZone', 'timezone' => array(Serializer::SCALAR_TYPE => 'string', Serializer::SCALAR_VALUE => $dateTimeZone->getName()));
    }

    /**
     * @param Serializer $serializer
     * @param string $className
     * @param array $value
     *
     * @return object
     * @throws \ReflectionException
     */
    public static function unserialize(Serializer $serializer, $className, array $value)
    {
        $ref = new ReflectionClass($className);
        foreach ($value as &$v) {
            if (\is_array($v)) {
                $v = $serializer->unserialize($v);
            }
        }
        return $ref->newInstanceArgs($value);
    }
}