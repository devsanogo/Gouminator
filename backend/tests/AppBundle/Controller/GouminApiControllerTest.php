<?php

namespace Tests\AppBundle\Controller;

use AppBundle\Controller\GouminApiController;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GouminApiControllerTest extends WebTestCase
{
    public function calculTest()
    {
        $calcul = new GouminApiController();
        $result = $calcul->calcul(3);

        $this->assertEquals(12.566370614359, $result);
    }

    public function removeCacheTest()
    {
        $path = $this->container->getParameter('test_tmp_directory');
        $rm = new GouminApiController();
        $result = $rm->removeCache();

        $this->assertEquals('Cache deleted successfully', $result);
    }
}
