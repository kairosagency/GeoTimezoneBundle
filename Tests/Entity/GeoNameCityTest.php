<?php
namespace Kairos\Bundle\GeoTimezoneBundle\Tests\Entity;

use Kairos\Bundle\GeoTimezoneBundle\Entity\GeoNameCity;

class GeoNameCityTest extends \PHPUnit_Framework_TestCase
{
    protected $object;

    /**
     * Init the object
     */
    protected function setUp()
    {
        $this->object = new GeoNameCity();
    }

    /**
     * Check the geo name id
     */
    public function testGeoNameId()
    {
        $this->assertNull($this->object->getGeoNameId());

        $this->object->setGeoNameId(23332);
        $this->assertEquals(23332, $this->object->getGeoNameId());
    }

    /**
     * Check the name
     */
    public function testName()
    {
        $this->assertNull($this->object->getName());

        $this->object->setName('testName');
        $this->assertEquals('testName', $this->object->getName());
    }

    /**
     * Check the ascii name
     */
    public function testAsciiName()
    {
        $this->assertNull($this->object->getAsciiName());

        $this->object->setAsciiName('testAsciiName');
        $this->assertEquals('testAsciiName', $this->object->getAsciiName());
    }

    /**
     * Check the ascii name
     */
    public function testAlternateNames()
    {
        $this->assertNull($this->object->getAlternateNames());

        $this->object->setAlternateNames('testAlternateNames');
        $this->assertEquals('testAlternateNames', $this->object->getAlternateNames());
    }

    /**
     *
     */
    public function testLatitude()
    {
        $this->assertNull($this->object->getLatitude());

        $this->object->setLatitude(3.5800);
        $this->assertEquals(3.5800, $this->object->getLatitude());
    }

    /**
     *
     */
    public function testLongitude()
    {
        $this->assertNull($this->object->getLongitude());

        $this->object->setLongitude(53.900);
        $this->assertEquals(53.900, $this->object->getLongitude());
    }

    /**
     *
     */
    public function testCoordinates()
    {
        $this->assertNull($this->object->getCoordinates());

        $point = $this
            ->getMockBuilder('CrEOF\Spatial\PHP\Types\Geometry\Point')
            ->disableOriginalConstructor()
            ->getMock();

        $this->object->setCoordinates($point);

        $this->assertInstanceOf('CrEOF\Spatial\PHP\Types\Geometry\Point', $this->object->getCoordinates());
        $this->assertEquals($point, $this->object->getCoordinates());
    }

    /**
     *
     */
    public function testFeatureClass()
    {
        $this->assertNull($this->object->getFeatureClass());

        $this->object->setFeatureClass('testFeatureClass');
        $this->assertEquals('testFeatureClass', $this->object->getFeatureClass());
    }

    /**
     *
     */
    public function testFeatureCode()
    {
        $this->assertNull($this->object->getFeatureCode());

        $this->object->setFeatureCode('testFeatureCode');
        $this->assertEquals('testFeatureCode', $this->object->getFeatureCode());
    }

    /**
     *
     */
    public function testCountryCode()
    {
        $this->assertNull($this->object->getCountryCode());

        $this->object->setCountryCode('FR');
        $this->assertEquals('FR', $this->object->getCountryCode());
    }

    /**
     *
     */
    public function testCc2()
    {
        $this->assertNull($this->object->getCc2());

        $this->object->setCc2('D');
        $this->assertEquals('D', $this->object->getCc2());
    }

    /**
     *
     */
    public function testAdmin1Code()
    {
        $this->assertNull($this->object->getAdmin1Code());

        $this->object->setAdmin1Code('testAdmin1Code');
        $this->assertEquals('testAdmin1Code', $this->object->getAdmin1Code());
    }

    /**
     *
     */
    public function testAdmin2Code()
    {
        $this->assertNull($this->object->getAdmin2Code());

        $this->object->setAdmin2Code('testAdmin2Code');
        $this->assertEquals('testAdmin2Code', $this->object->getAdmin2Code());
    }

    /**
     *
     */
    public function testAdmin3Code()
    {
        $this->assertNull($this->object->getAdmin3Code());

        $this->object->setAdmin3Code('testAdmin3Code');
        $this->assertEquals('testAdmin3Code', $this->object->getAdmin3Code());
    }

    /**
     *
     */
    public function testAdmin4Code()
    {
        $this->assertNull($this->object->getAdmin4Code());

        $this->object->setAdmin4Code('testAdmin4Code');
        $this->assertEquals('testAdmin4Code', $this->object->getAdmin4Code());
    }

    /**
     *
     */
    public function testPopulation()
    {
        $this->assertNull($this->object->getPopulation());

        $this->object->setPopulation('testPopulation');
        $this->assertEquals('testPopulation', $this->object->getPopulation());
    }

    /**
     *
     */
    public function testElevation()
    {
        $this->assertNull($this->object->getElevation());

        $this->object->setElevation('testElevation');
        $this->assertEquals('testElevation', $this->object->getElevation());
    }

    /**
     *
     */
    public function testDem()
    {
        $this->assertNull($this->object->getDem());

        $this->object->setDem('testDem');
        $this->assertEquals('testDem', $this->object->getDem());
    }

    /**
     *
     */
    public function testTimezone()
    {
        $this->assertNull($this->object->getTimezone());

        $this->object->setTimezone('testTimezone');
        $this->assertEquals('testTimezone', $this->object->getTimezone());
    }
}