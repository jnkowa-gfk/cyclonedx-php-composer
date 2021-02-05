<?php


use CycloneDX\Spdx\XmlLicenses;
use PHPUnit\Framework\TestCase;


class ShippedXmlSpdxLicensesTest extends TestCase
{
    /**
     * @var string
     */
    private $file;

    /**
     * @retrun void
     */
    public function setUp()
    {
        $this->file = XmlLicenses::getResourcesFile();
    }

    /**
     * @return void
     */
    public function test ()
    {
        $this->assertFileExists($this->file);


        $json = file_get_contents($this->file);
        $this->assertJson($json);

        $options = 0;

        if (defined('JSON_THROW_ON_ERROR')) {
            $options |= JSON_THROW_ON_ERROR;
        }

        $licenses = json_decode($json, false, 512, $options);
        $this->assertInternalType('array', $licenses);
        $this->assertNotEmpty($licenses);

        foreach ($licenses as &$license) {
            $this->assertInternalType('string', $license);
        }
    }

}
