<?php
namespace Kairos\Bundle\GeoTimezoneBundle\Tests\Repository;

use Kairos\Bundle\GeoTimezoneBundle\Tests\DoctrineTestCase;

/**
 * Test the country repository
 */
class GeoNameCityRepositoryTest extends DoctrineTestCase
{
    /**
     * Set up repository test
     */
    public function setUp()
    {
        $this->loadFixturesFromDirectory(__DIR__ . '/DataFixtures');
    }

    /**
     * Returns repository
     *
     * @return \Kairos\Bundle\GeoTimezoneBundle\Entity\Repository\GeoNameCityRepository
     */
    protected function getRepository()
    {
        return $this->em->getRepository('\Kairos\Bundle\GeoTimezoneBundle\Entity\GeoNameCity');
    }

    public function testGetClosestGeoTimezone()
    {
        $geoNameCityClosest = $this->getRepository()->getClosestGeoTimezone(47.3220470, 5.0414800);
    }
}