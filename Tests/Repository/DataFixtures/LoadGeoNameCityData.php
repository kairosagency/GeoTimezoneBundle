<?php
namespace  Kairos\Bundle\GeoTimezone\Tests\Repository\DataFixtures;

use CrEOF\Spatial\PHP\Types\Geometry\Point;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Kairos\Bundle\GeoTimezoneBundle\Entity\GeoNameCity;

/**
 * Loads project data
 */
class LoadGeoNameCityData implements FixtureInterface
{
    /**
     * Load fixtures
     *
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $manager->clear();
        gc_collect_cycles(); // Could be useful if you have a lot of fixtures

        $geoNameCity = $this->newGeoNameCity(array(
                'geonameid' => 1,
                'name' => 'Paris',
                'latitude' => 48.856035,
                'longitude' => 2.351523,
                'timezone' => 'Europe/Paris'
            ));

        $manager->persist($geoNameCity);

        $geoNameCity = $this->newGeoNameCity(array(
                'geonameid' => 2,
                'name' => 'Marseille',
                'latitude' => 43.296635,
                'longitude' => 5.366687,
                'timezone' => 'Europe/Paris'
            ));

        $manager->persist($geoNameCity);

        $geoNameCity = $this->newGeoNameCity(array(
                'geonameid' => 3,
                'name' => 'Bordeaux',
                'latitude' => 44.837806,
                'longitude' => -0.579275,
                'timezone' => 'Europe/Paris'
            ));

        $manager->persist($geoNameCity);

        $geoNameCity = $this->newGeoNameCity(array(
                'geonameid' => 4,
                'name' => 'New York',
                'latitude' => 36.1731521,
                'longitude' => -79.8703661,
                'timezone' => 'Europe/Paris'
            ));

        $manager->persist($geoNameCity);

        $geoNameCity = $this->newGeoNameCity(array(
                'geonameid' => 5,
                'name' => 'Boston',
                'latitude' => 42.3584308,
                'longitude' => -71.0597732,
                'timezone' => 'Europe/Paris'
            ));

        $manager->persist($geoNameCity);

        $geoNameCity = $this->newGeoNameCity(array(
                'geonameid' => 6,
                'name' => 'San Francisco',
                'latitude' => 37.7749295,
                'longitude' => -122.4194155,
                'timezone' => 'Europe/Paris'
            ));

        $manager->persist($geoNameCity);

        $manager->flush();

    }

    /**
     * @param $data
     * @return GeoNameCity
     */
    private function newGeoNameCity($data)
    {
        $geoNameCity = new GeoNameCity();
        $geoNameCity->setGeoNameId($data['geonameid']);
        $geoNameCity->setName(!empty($data['name']) ? $data['name'] : null);
        $geoNameCity->setAsciiName(!empty($data['asciiname']) ? $data['asciiname'] : null);
        $geoNameCity->setAlternateNames(!empty($data['alternames']) ? $data['alternames'] : null);
        $geoNameCity->setLatitude($data['latitude']);
        $geoNameCity->setLongitude($data['longitude']);
        $geoNameCity->setCoordinates(new Point($geoNameCity->getLongitude(), $geoNameCity->getLatitude()));
        $geoNameCity->setFeatureClass(!empty($data['featureclass']) ? $data['featureclass'] : null);
        $geoNameCity->setFeatureCode(!empty($data['featurecode']) ? $data['featurecode'] : null);
        $geoNameCity->setCountryCode(!empty($data['countrycode']) ? $data['countrycode'] : null);
        $geoNameCity->setCc2(!empty($data['cc2']) ? $data['cc2'] : null);;
        $geoNameCity->setAdmin1Code(!empty($data['admin1code']) ? $data['admin1code'] : null);
        $geoNameCity->setAdmin2Code(!empty($data['admin2code']) ? $data['admin2code'] : null);
        $geoNameCity->setAdmin3Code(!empty($data['admin3code']) ? $data['admin3code'] : null);
        $geoNameCity->setAdmin4Code(!empty($data['admin4code']) ? $data['admin4code'] : null);
        $geoNameCity->setPopulation(!empty($data['population']) ? $data['population'] : null);
        $geoNameCity->setElevation(!empty($data['elevation']) ? $data['elevation'] : null);
        $geoNameCity->setDem(!empty($data['dem']) ? $data['dem'] : null);
        $geoNameCity->setTimezone($data['timezone']);

        return $geoNameCity;
    }
}