<?php
/**
 * ChoiceAuth test class.
 *
 * PHP version 5
 *
 * Copyright (C) Villanova University 2018.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License version 2,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category VuFind
 * @package  Tests
 * @author   Demian Katz <demian.katz@villanova.edu>
 * @license  http://opensource.org/licenses/gpl-2.0.php GNU General Public License
 * @link     https://vufind.org Main Page
 */
namespace VuFindTest\AjaxHandler;

use VuFind\AjaxHandler\KeepAlive;
use VuFind\AjaxHandler\KeepAliveFactory;

/**
 * ChoiceAuth test class.
 *
 * @category VuFind
 * @package  Tests
 * @author   Demian Katz <demian.katz@villanova.edu>
 * @license  http://opensource.org/licenses/gpl-2.0.php GNU General Public License
 * @link     https://vufind.org Main Page
 */
class KeepAliveTest extends \VuFindTest\Unit\AjaxHandlerTest
{
    /**
     * Test the AJAX handler's basic response.
     *
     * @return void
     */
    public function testResponse()
    {
        $sm = $this->getMockService('Zend\Session\SessionManager', ['getId']);
        $sm->expects($this->once())->method('getId');
        $container = new \Zend\ServiceManager\ServiceManager();
        $container->setService('Zend\Session\SessionManager', $sm);
        $factory = new KeepAliveFactory();
        $handler = $factory($container, KeepAlive::class);
        $params = new \Zend\Mvc\Controller\Plugin\Params();
        $this->assertEquals([true, 'OK'], $handler->handleRequest($params));
    }
}