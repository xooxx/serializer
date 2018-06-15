<?php

/**
 * Author: Xooxx <xooxx.dev@gmail.com>
 * Date: 7/3/15
 * Time: 6:00 PM.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Xooxx\Serializer\Serializer\HHVM;

use Xooxx\Serializer\Serializer;
use Xooxx\Serializer\Serializer\InternalClasses\DateTimeZoneSerializer;
use ReflectionClass;
final class DateTimeImmutableSerializer
{
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
        $dateTimeZone = DateTimeZoneSerializer::unserialize($serializer, 'DateTimeZone', array($serializer->unserialize($value['data']['timezone'])));
        $ref = new ReflectionClass($className);
        return $ref->newInstanceArgs(array($serializer->unserialize($value['data']['date']), $dateTimeZone));
    }
}