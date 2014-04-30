<?php
namespace Kairos\Bundle\GeoNameBundle\Model;

use CrEOF\Spatial\PHP\Types\Geometry\Point;

abstract class GeoNameCity implements GeoNameCityInterface
{
    /**
     * Set geoNameId
     *
     * @param integer $geoNameId
     * @return GeoNameCity
     */
    public function setGeoNameId($geoNameId)
    {
        $this->geoNameId = $geoNameId;

        return $this;
    }

    /**
     * Get geoNameId
     *
     * @return integer
     */
    public function getGeoNameId()
    {
        return $this->geoNameId;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return GeoNameCity
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set asciiName
     *
     * @param string $asciiName
     * @return GeoNameCity
     */
    public function setAsciiName($asciiName)
    {
        $this->asciiName = $asciiName;

        return $this;
    }

    /**
     * Get asciiName
     *
     * @return string
     */
    public function getAsciiName()
    {
        return $this->asciiName;
    }

    /**
     * Set alternateNames
     *
     * @param string $alternateNames
     * @return GeoNameCity
     */
    public function setAlternateNames($alternateNames)
    {
        $this->alternateNames = $alternateNames;

        return $this;
    }

    /**
     * Get alternateNames
     *
     * @return string
     */
    public function getAlternateNames()
    {
        return $this->alternateNames;
    }

    /**
     * Set latitude
     *
     * @param string $latitude
     * @return GeoNameCity
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param string $longitude
     * @return GeoNameCity
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set Coordinates
     *
     * @param Point $coordinates
     * @return GeoNameCity
     */
    public function setCoordinates(Point $coordinates)
    {
        $this->coordinates = $coordinates;
    }

    /**
     * Get Coordinates
     *
     * @return Point
     */
    public function getCoordinates()
    {
        return $this->coordinates;
    }

    /**
     * Set featureClass
     *
     * @param string $featureClass
     * @return GeoNameCity
     */
    public function setFeatureClass($featureClass)
    {
        $this->featureClass = $featureClass;

        return $this;
    }

    /**
     * Get featureClass
     *
     * @return string
     */
    public function getFeatureClass()
    {
        return $this->featureClass;
    }

    /**
     * Set featureCode
     *
     * @param string $featureCode
     * @return GeoNameCity
     */
    public function setFeatureCode($featureCode)
    {
        $this->featureCode = $featureCode;

        return $this;
    }

    /**
     * Get featureCode
     *
     * @return string
     */
    public function getFeatureCode()
    {
        return $this->featureCode;
    }

    /**
     * Set countryCode
     *
     * @param string $countryCode
     * @return GeoNameCity
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    /**
     * Get countryCode
     *
     * @return string
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * Set cc2
     *
     * @param string $cc2
     * @return GeoNameCity
     */
    public function setCc2($cc2)
    {
        $this->cc2 = $cc2;

        return $this;
    }

    /**
     * Get cc2
     *
     * @return string
     */
    public function getCc2()
    {
        return $this->cc2;
    }

    /**
     * Set admin1Code
     *
     * @param string $admin1Code
     * @return GeoNameCity
     */
    public function setAdmin1Code($admin1Code)
    {
        $this->admin1Code = $admin1Code;

        return $this;
    }

    /**
     * Get admin1Code
     *
     * @return string
     */
    public function getAdmin1Code()
    {
        return $this->admin1Code;
    }

    /**
     * Set admin2Code
     *
     * @param string $admin2Code
     * @return GeoNameCity
     */
    public function setAdmin2Code($admin2Code)
    {
        $this->admin2Code = $admin2Code;

        return $this;
    }

    /**
     * Get admin2Code
     *
     * @return string
     */
    public function getAdmin2Code()
    {
        return $this->admin2Code;
    }

    /**
     * Set admin3Code
     *
     * @param string $admin3Code
     * @return GeoNameCity
     */
    public function setAdmin3Code($admin3Code)
    {
        $this->admin3Code = $admin3Code;

        return $this;
    }

    /**
     * Get admin3Code
     *
     * @return string
     */
    public function getAdmin3Code()
    {
        return $this->admin3Code;
    }

    /**
     * Set admin4Code
     *
     * @param string $admin4Code
     * @return GeoNameCity
     */
    public function setAdmin4Code($admin4Code)
    {
        $this->admin4Code = $admin4Code;

        return $this;
    }

    /**
     * Get admin4Code
     *
     * @return string
     */
    public function getAdmin4Code()
    {
        return $this->admin4Code;
    }

    /**
     * Set population
     *
     * @param integer $population
     * @return GeoNameCity
     */
    public function setPopulation($population)
    {
        $this->population = $population;

        return $this;
    }

    /**
     * Get population
     *
     * @return integer
     */
    public function getPopulation()
    {
        return $this->population;
    }

    /**
     * Set elevation
     *
     * @param integer $elevation
     * @return GeoNameCity
     */
    public function setElevation($elevation)
    {
        $this->elevation = $elevation;

        return $this;
    }

    /**
     * Get elevation
     *
     * @return integer
     */
    public function getElevation()
    {
        return $this->elevation;
    }

    /**
     * Set dem
     *
     * @param integer $dem
     * @return GeoNameCity
     */
    public function setDem($dem)
    {
        $this->dem = $dem;

        return $this;
    }

    /**
     * Get dem
     *
     * @return integer
     */
    public function getDem()
    {
        return $this->dem;
    }

    /**
     * Set timezone
     *
     * @param string $timezone
     * @return GeoNameCity
     */
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;

        return $this;
    }

    /**
     * Get timezone
     *
     * @return string
     */
    public function getTimezone()
    {
        return $this->timezone;
    }
}