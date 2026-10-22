<?php
use Decidir\Connector;
use PHPUnit\Framework\TestCase;

class ConnectorTest extends TestCase
{
    private function connector()
    {
        return new Connector(array('public_key' => 'pub', 'private_key' => 'priv'), 'test');
    }

    public function testAccessorsReturnExpectedInstances()
    {
        $c = $this->connector();
        $this->assertInstanceOf(\Decidir\HealthCheck::class, $c->healthcheck());
        $this->assertInstanceOf(\Decidir\Payment::class, $c->payment());
        $this->assertInstanceOf(\Decidir\Token::class, $c->token());
        $this->assertSame($c->token(), $c->tokenCs());
        $this->assertInstanceOf(\Decidir\Tokenization::class, $c->cardToken());
        $this->assertSame($c->cardToken(), $c->paymentToken());
    }

    public function testVersionConstantIsDefined()
    {
        $this->assertTrue(defined('DECIDIR_VERSION'));
    }
}
