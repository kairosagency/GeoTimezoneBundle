<?php
/**
 * This work is licensed under a Creative Commons Attribution 3.0 License,
 * see http://creativecommons.org/licenses/by/3.0/
 * The Data is provided "as is" without warranty or any representation of accuracy, timeliness or completeness.
 *
 * {@source http://download.geonames.org/export/dump/readme.txt}
 *
 * If you find errors or miss important places, please do use the wiki-style edit interface on our website
 * http://www.geonames.org to correct inaccuracies and to add new records.
 * Thanks in the name of the geonames community for your valuable contribution.
 *
 * Data Sources : http://www.geonames.org/data-sources.html
 * More Information is also available in the geonames faq : http://forum.geonames.org/gforum/forums/show/6.page
 * The forum : http://forum.geonames.org
 * Google group : http://groups.google.com/group/geonames
 *
 */
namespace Kairos\Bundle\GeoTimezoneBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Kairos\Bundle\GeoTimezoneBundle\Model\GeoNameCity as AbstractGeoNameCity;

/**
 * @ORM\Table(name="geo_name_city", indexes={@ORM\Index(name="search_idx", columns={"coordinates"})})
 * @ORM\Entity(repositoryClass="Kairos\Bundle\GeoTimezoneBundle\Entity\Repository\GeoNameCityRepository")
 */
class GeoNameCity extends AbstractGeoNameCity
{
    /**
     * Integer id of record in geonames database
     * @var integer $geoNameId
     *
     * @ORM\Id
     * @ORM\Column(name="geo_name_id", type="integer")
     */
    protected $geoNameId;

    /**
     * name of geographical point (utf8)
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    protected $name;

    /**
     * Name of geographical point in plain ascii characters
     *
     * @var string $asciiName
     *
     * @ORM\Column(name="ascii_name", type="string", length=255, nullable=true)
     */
    protected $asciiName;

    /**
     * Alternate names, comma separated,
     * Ascii names automatically transliterated,
     * convenience attribute from alternatename table
     *
     * @var text $alternateNames
     *
     * @ORM\Column(name="alternate_names", type="text", nullable=true)
     */
    protected $alternateNames;

    /**
     * Latitude in decimal degrees (wgs84)
     *
     * @var string $latitude
     *
     * @ORM\Column(name="latitude", type="float")
     */
    protected $latitude;

    /**
     * Longitude in decimal degrees (wgs84)
     *
     * @var string $longitude
     *
     * @ORM\Column(name="longitude", type="float")
     */
    protected $longitude;

    /**
     * A PostGIS POINT value that combine lat/lng
     *
     * @var point $coordinates
     *
     * @ORM\Column(name="coordinates", type="point", nullable=true)
     */
    protected $coordinates;

    /**
     * {@link http://www.geonames.org/export/codes.html}
     *
     * @var string $featureClass
     *
     * @ORM\Column(name="feature_class", type="string", length=255, nullable=true)
     */
    protected $featureClass;

    /**
     * {@link http://www.geonames.org/export/codes.html}
     *
     * @var string $featureCode
     *
     * @ORM\Column(name="feature_code", type="string", length=255, nullable=true)
     */
    protected $featureCode;

    /**
     * ISO-3166 2-letter country code
     *
     * @var string $countryCode
     *
     * @ORM\Column(name="country_code", type="string", length=255, nullable=true)
     */
    protected $countryCode;

    /**
     * Alternate country codes, comma separated, ISO-3166 2-letter country code
     *
     * @var string $cc2
     *
     * @ORM\Column(name="cc2", type="string", length=255, nullable=true)
     */
    protected $cc2;

    /**
     * Fipscode (subject to change to iso code), see exceptions below
     *
     * @var string $admin1Code
     *
     * @ORM\Column(name="admin1_code", type="string", length=255, nullable=true)
     */
    protected $admin1Code;

    /**
     * Code for the second administrative division, a country in the US
     *
     * @var string $admin2Code
     *
     * @ORM\Column(name="admin2_code", type="string", length=255, nullable=true)
     */
    protected $admin2Code;

    /**
     * Code for third level administrative division
     *
     * @var string $admin3Code
     *
     * @ORM\Column(name="admin3_code", type="string", length=255, nullable=true)
     */
    protected $admin3Code;

    /**
     * Code for fourth level administrative division
     *
     * @var string $admin4Code
     *
     * @ORM\Column(name="admin4_code", type="string", length=255, nullable=true)
     */
    protected $admin4Code;

    /**
     * Population
     *
     * @var integer $population
     *
     * @ORM\Column(name="population", type="integer", nullable=true)
     */
    protected $population;

    /**
     * In meters
     *
     * @var integer $elevation
     *
     * @ORM\Column(name="elevation", type="integer", nullable=true)
     */
    protected $elevation;

    /**
     * digital elevation model, srtm3 or gtopo30,
     * average elevation of 3''x3'' (ca 90mx90m) or 30''x30'' (ca 900mx900m) area in meters, integer.
     * srtm processed by cgiar/ciat.
     *
     * @var integer $dem
     *
     * @ORM\Column(name="dem", type="integer", nullable=true)
     */
    protected $dem;

    /**
     * The timezone id
     *
     * @var string $timezone
     *
     * @ORM\Column(name="timezone", type="string", length=255, nullable=true)
     */
    protected $timezone;
}
