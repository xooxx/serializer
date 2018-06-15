<?php

/**
 * Author: Xooxx <xooxx.dev@gmail.com>
 * Date: 8/29/15
 * Time: 2:48 PM.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Xooxx\Serializer\Transformer;

use Xooxx\Serializer\Serializer;
class ArrayTransformer extends AbstractTransformer
{
    public function __construct()
    {
        //overwriting default constructor.
    }
    /**
     * @param mixed $value
     *
     * @return array
     */
    public function serialize($value)
    {
        $this->recursiveSetValues($value);
        $this->recursiveUnset($value, [Serializer::CLASS_IDENTIFIER_KEY]);
        $this->recursiveFlattenOneElementObjectsToScalarType($value);
        return $value;
    }
}