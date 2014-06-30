<?php
/**
 * This file is part of the "LitGroupHttpClientBundle" package.
 *
 * (c) Roman Shamritskiy <roman@litgroup.ru>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace LitGroup\Bundle\HttpClientBundle\Tests\DependencyInjection;


use LitGroup\Bundle\HttpClientBundle\DependencyInjection\LitGroupHttpClientExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class LitGroupHttpClientExtensionTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function testClientFactory()
    {
        $container = new ContainerBuilder();
        $extension = new LitGroupHttpClientExtension();
        $extension->load([], $container);

        $this->assertTrue($container->hasParameter('litgroup_http_client.factory.class'));
        $this->assertSame('React\HttpClient\Factory', $container->getParameter('litgroup_http_client.factory.class'));

        $this->assertTrue($container->hasDefinition('litgroup_http_client.factory'));
        $definition = $container->getDefinition('litgroup_http_client.factory');
        $this->assertSame('%litgroup_http_client.factory.class%', $definition->getClass());
        $this->assertTrue($definition->isPublic());
    }

    /** @test */
    public function tesClient()
    {
        $container = new ContainerBuilder();
        $extension = new LitGroupHttpClientExtension();
        $extension->load([], $container);

        $this->assertTrue($container->hasDefinition('litgroup_http_client.client'));
        $definition =  $container->getDefinition('litgroup_http_client.client');
        $this->assertTrue($definition->isPublic());
        $this->assertSame('React\HttpClient\Client', $definition->getClass());
        $this->assertSame('litgroup_http_client.factory', $definition->getFactoryService());
        $this->assertSame('create', $definition->getFactoryMethod());
        $arguments = $definition->getArguments();
        $this->assertCount(2, $arguments);
        $this->assertReference('litgroup_event_loop', $arguments[0]);
        $this->assertReference('litgroup_dns.resolver', $arguments[1]);
    }

    private function assertReference($expectedId, $reference)
    {
        $this->assertInstanceOf('Symfony\Component\DependencyInjection\Reference', $reference);
        $this->assertSame($expectedId, (string) $reference);
    }
}
 