<?php

namespace Tests;

use Behavioral\Strategy\Base64Encrypt;
use Behavioral\Strategy\EncryptContext;
use Behavioral\Strategy\HashEncrypt;
use Behavioral\Strategy\Md5Encrypt;
use PHPUnit\Framework\TestCase;

class StrategyTest extends TestCase
{
    private EncryptContext $encryptedContext;
    private string $encryptedData;
    const TEXT = 'Encrypt Me';
    protected function setUp(): void
    {
        $this->encryptedContext = new EncryptContext(new HashEncrypt());
        $this->encryptedData = $this->encryptedContext->encryptString(self::TEXT)[0];
    }

    public function testCanUseHashEncrypt(): void
    {
        [$data, $type] = $this->encryptedContext->encryptString(self::TEXT);
        $this->assertEquals($this->encryptedData, $data);
        $this->assertEquals(HashEncrypt::TYPE, $type);
    }

    public function testCanUseMd5Encrypt(): void
    {
        $this->encryptedContext->setStrategy(new Md5Encrypt());
        [$data, $type] = $this->encryptedContext->encryptString(self::TEXT);
        $this->assertNotEquals($this->encryptedData, $data);
        $this->assertEquals(Md5Encrypt::TYPE, $type);
    }

    public function testCanUseBase64Encrypt(): void
    {
        $this->encryptedContext->setStrategy(new Base64Encrypt);
        [$data, $type] = $this->encryptedContext->encryptString(self::TEXT);
        $this->assertNotEquals($this->encryptedData, $data);
        $this->assertEquals(Base64Encrypt::TYPE, $type);
    }
}
