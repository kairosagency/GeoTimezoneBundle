<?php
namespace Kairos\Bundle\GeoTimezoneBundle\Entity\Manager;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityNotFoundException;
use Kairos\Bundle\GeoTimezoneBundle\Model\GeoNameCityInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class GeoNameCityManager
{
    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * @var \Doctrine\ORM\EntityRepository
     */
    protected $repository;

    /**
     * @var string
     */
    protected $class;

    /**
     * @var \Symfony\Component\EventDispatcher\EventDispatcherInterface
     */
    protected $dispatcher;

    /**
     * Constructor.
     *
     * @param \Symfony\Component\EventDispatcher\EventDispatcherInterface $dispatcher
     * @param \Doctrine\ORM\EntityManager                                 $em
     * @param string                                                      $class
     */
    public function __construct(EventDispatcherInterface $dispatcher, EntityManager $em, $class)
    {
        $this->dispatcher = $dispatcher;
        $this->em = $em;
        $this->repository = $em->getRepository($class);

        $metadata = $em->getClassMetadata($class);
        $this->class = $metadata->name;
    }

    /**
     * @param $id
     * @return mixed
     * @throws \Doctrine\ORM\EntityNotFoundException
     */
    public function findAndCheck($id)
    {
        $entity = $this->getRepository()->find($id);
        if(!$entity) {
            throw new EntityNotFoundException('Could not find entity ' . $this->getClass());
        }
        return $entity;
    }

    /**
     * Returns the repository of the object
     *
     * @return \Doctrine\ORM\EntityRepository
     */
    public function getRepository()
    {
        return $this->repository;
    }

    /**
     * Returns the fully qualified comment thread class name
     *
     * @return string
     **/
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @param \Kairos\Bundle\GeoTimezoneBundle\Model\GeoNameCityInterface $geoNameCity
     */
    public function save(GeoNameCityInterface $geoNameCity)
    {
        $this->em->persist($geoNameCity);
        $this->em->flush();
    }

    /**
     * @param \Kairos\Bundle\GeoTimezoneBundle\Model\GeoNameCityInterface $geoNameCity
     */
    public function remove(GeoNameCityInterface $geoNameCity)
    {
        $this->em->remove($geoNameCity);
        $this->em->flush();
    }

    /**
     * Get the geo name city object closest from the longitude and latitude given
     *
     * @param $lat
     * @param $lng
     * @return mixed
     */
    public function getClosestGeoTimezone($lat, $lng)
    {
        return $this->getRepository()->getClosestGeoTimezone($lat, $lng);
    }
}