<?php

/**
 * Author: Xooxx <xooxx.dev@gmail.com>
 * Date: 8/29/15
 * Time: 12:47 PM.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Xooxx\Serializer;

use Xooxx\Serializer\Strategy\XmlStrategy;
class XmlSerializer extends Serializer
{
    /**
     *
     */
    public function __construct()
    {
        parent::__construct(new XmlStrategy());
    }
}