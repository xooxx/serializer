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

class FlatArrayTransformer extends ArrayTransformer
{
    /**
     * @param string $value
     *
     * @return array
     */
    public function serialize($value)
    {
        return $this->flatten(parent::serialize($value));
    }
    /**
     * @param array  $array
     * @param string $prefix
     *
     * @return array
     */
    private function flatten(array $array, $prefix = '')
    {
        $result = [];
        foreach ($array as $key => $value) {
            if (\is_array($value)) {
                $result = $result + $this->flatten($value, $prefix . $key . '.');
            } else {
                $result[$prefix . $key] = $value;
            }
        }
        return $result;
    }
}