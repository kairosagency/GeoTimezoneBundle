<?php
/*namespace Kairos\Bundle\GeoTimezoneBundle\Tests\ORM\Query\AST\Functions\MySql;

class PowTest extends OrmTest
{
    protected function setUp()
    {
        $this->useEntity('polygon');
        parent::setUp();
    }

    /**
     * @group geometry
     *
    public function testSelectArea()
    {
        $entity1 = new PolygonEntity();
        $rings1 = array(
            new LineString(array(
                new Point(0, 0),
                new Point(10, 0),
                new Point(10, 10),
                new Point(0, 10),
                new Point(0, 0)
            ))
        );

        $entity1->setPolygon(new Polygon($rings1));
        $this->_em->persist($entity1);

        $entity2 = new PolygonEntity();
        $rings2 = array(
            new LineString(array(
                new Point(0, 0),
                new Point(10, 0),
                new Point(10, 10),
                new Point(0, 10),
                new Point(0, 0)
            )),
            new LineString(array(
                new Point(5, 5),
                new Point(7, 5),
                new Point(7, 7),
                new Point(5, 7),
                new Point(5, 5)
            ))
        );

        $entity2->setPolygon(new Polygon($rings2));
        $this->_em->persist($entity2);

        $entity3 = new PolygonEntity();
        $rings3 = array(
            new LineString(array(
                new Point(0, 0),
                new Point(10, 0),
                new Point(10, 20),
                new Point(0, 20),
                new Point(10, 10),
                new Point(0, 0)
            ))
        );

        $entity3->setPolygon(new Polygon($rings3));
        $this->_em->persist($entity3);

        $entity4 = new PolygonEntity();
        $rings4 = array(
            new LineString(array(
                new Point(5, 5),
                new Point(7, 5),
                new Point(7, 7),
                new Point(5, 7),
                new Point(5, 5)
            ))
        );

        $entity4->setPolygon(new Polygon($rings4));
        $this->_em->persist($entity4);
        $this->_em->flush();
        $this->_em->clear();

        $query  = $this->_em->createQuery('SELECT Area(p.polygon) FROM CrEOF\Spatial\Tests\Fixtures\PolygonEntity p');
        $result = $query->getResult();

        $this->assertEquals(100, $result[0][1]);
        $this->assertEquals(96, $result[1][1]);
        $this->assertEquals(100, $result[2][1]);
        $this->assertEquals(4, $result[3][1]);
    }

    /**
     * @group geometry
     *
    public function testAreaWhereParameter()
    {
        $entity1 = new PolygonEntity();
        $rings1 = array(
            new LineString(array(
                new Point(0, 0),
                new Point(10, 0),
                new Point(10, 10),
                new Point(0, 10),
                new Point(0, 0)
            ))
        );

        $entity1->setPolygon(new Polygon($rings1));
        $this->_em->persist($entity1);

        $entity2 = new PolygonEntity();
        $rings2 = array(
            new LineString(array(
                new Point(0, 0),
                new Point(10, 0),
                new Point(10, 10),
                new Point(0, 10),
                new Point(0, 0)
            )),
            new LineString(array(
                new Point(5, 5),
                new Point(7, 5),
                new Point(7, 7),
                new Point(5, 7),
                new Point(5, 5)
            ))
        );

        $entity2->setPolygon(new Polygon($rings2));
        $this->_em->persist($entity2);

        $entity3 = new PolygonEntity();
        $rings3 = array(
            new LineString(array(
                new Point(0, 0),
                new Point(10, 0),
                new Point(10, 20),
                new Point(0, 20),
                new Point(10, 10),
                new Point(0, 0)
            ))
        );

        $entity3->setPolygon(new Polygon($rings3));
        $this->_em->persist($entity3);

        $entity4 = new PolygonEntity();
        $rings4 = array(
            new LineString(array(
                new Point(5, 5),
                new Point(7, 5),
                new Point(7, 7),
                new Point(5, 7),
                new Point(5, 5)
            ))
        );

        $entity4->setPolygon(new Polygon($rings4));
        $this->_em->persist($entity4);
        $this->_em->flush();
        $this->_em->clear();

        $query  = $this->_em->createQuery('SELECT p FROM CrEOF\Spatial\Tests\Fixtures\PolygonEntity p WHERE Area(p.polygon) < 50');
        $result = $query->getResult();

        $this->assertCount(1, $result);
        $this->assertEquals($entity4, $result[0]);
    }
}*/
