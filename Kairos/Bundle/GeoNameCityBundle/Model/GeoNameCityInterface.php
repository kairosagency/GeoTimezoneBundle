<?php
namespace Kairos\Bundle\GeoNameBundle\Model;

use CrEOF\Spatial\PHP\Types\Geometry\Point;

interface GeoNameCityInterface
{
    /**
     * Set geoNameId
     *
     * @param integer $geoNameId
     * @return GeoNameCity
     */
    public function setGeoNameId($geoNameId);

    /**
     * Get geoNameId
     *
     * @return integer
     */
    public function getGeoNameId();

    /**
     * Set name
     *
     * @param string $name
     * @return GeoNameCity
     */
    public function setName($name);

    /**
     * Get name
     *
     * @return string
     */
    public function getName();

    /**
     * Set asciiName
     *
     * @param string $asciiName
     * @return GeoNameCity
     */
    public function setAsciiName($asciiName);

    /**
     * Get asciiName
     *
     * @return string
     */
    public function getAsciiName();

    /**
     * Set alternateNames
     *
     * @param string $alternateNames
     * @return GeoNameCity
     */
    public function setAlternateNames($alternateNames);

    /**
     * Get alternateNames
     *
     * @return string
     */
    public function getAlternateNames();

    /**
     * Set latitude
     *
     * @param string $latitude
     * @return GeoNameCity
     */
    public function setLatitude($latitude);

    /**
     * Get latitude
     *
     * @return string
     */
    public function getLatitude();

    /**
     * Set longitude
     *
     * @param string $longitude
     * @return GeoNameCity
     */
    public function setLongitude($longitude);

    /**
     * Get longitude
     *
     * @return string
     */
    public function getLongitude();

    /**
     * Set Coordinates
     *
     * @param Point $coordinates
     * @return GeoNameCity
     */
    public function setCoordinates(Point $coordinates);

    /**
     * Get Coordinates
     *
     * @return Point
     */
    public function getCoordinates();

    /**
     * Set featureClass
     *
     * @param string $featureClass
     * @return GeoNameCity
     */
    public function setFeatureClass($featureClass);

    /**
     * Get featureClass
     *
     * @return string
     */
    public function getFeatureClass();

    /**
     * Set featureCode
     *
     * @param string $featureCode
     * @return GeoNameCity
     */
    public function setFeatureCode($featureCode);

    /**
     * Get featureCode
     *
     * @return string
     */
    public function getFeatureCode();

    /**
     * Set countryCode
     *
     * @param string $countryCode
     * @return GeoNameCity
     */
    public function setCountryCode($countryCode);

    /**
     * Get countryCode
     *
     * @return string
     */
    public function getCountryCode();

    /**
     * Set cc2
     *
     * @param string $cc2
     * @return GeoNameCity
     */
    public function setCc2($cc2);

    /**
     * Get cc2
     *
     * @return string
     */
    public function getCc2();

    /**
     * Set admin1Code
     *
     * @param string $admin1Code
     * @return GeoNameCity
     */
    public function setAdmin1Code($admin1Code);

    /**
     * Get admin1Code
     *
     * @return string
     */
    public function getAdmin1Code();

    /**
     * Set admin2Code
     *
     * @param string $admin2Code
     * @return GeoNameCity
     */
    public function setAdmin2Code($admin2Code);

    /**
     * Get admin2Code
     *
     * @return string
     */
    public function getAdmin2Code();

    /**
     * Set admin3Code
     *
     * @param string $admin3Code
     * @return GeoNameCity
     */
    public function setAdmin3Code($admin3Code);

    /**
     * Get admin3Code
     *
     * @return string
     */
    public function getAdmin3Code();

    /**
     * Set admin4Code
     *
     * @param string $admin4Code
     * @return GeoNameCity
     */
    public function setAdmin4Code($admin4Code);

    /**
     * Get admin4Code
     *
     * @return string
     */
    public function getAdmin4Code();

    /**
     * Set population
     *
     * @param integer $population
     * @return GeoNameCity
     */
    public function setPopulation($population);

    /**
     * Get population
     *
     * @return integer
     */
    public function getPopulation();

    /**
     * Set elevation
     *
     * @param integer $elevation
     * @return GeoNameCity
     */
    public function setElevation($elevation);

    /**
     * Get elevation
     *
     * @return integer
     */
    public function getElevation();

    /**
     * Set dem
     *
     * @param integer $dem
     * @return GeoNameCity
     */
    public function setDem($dem);

    /**
     * Get dem
     *
     * @return integer
     */
    public function getDem();

    /**
     * Set timezone
     *
     * @param string $timezone
     * @return GeoNameCity
     */
    public function setTimezone($timezone);

    /**
     * Get timezone
     *
     * @return string
     */
    public function getTimezone();
}