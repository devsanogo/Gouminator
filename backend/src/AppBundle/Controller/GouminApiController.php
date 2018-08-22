<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * Class GouminApiController
 * @package AppBundle\Controller
 */
class GouminApiController extends Controller
{

    use \AppBundle\Controller\CacheController;

    /**
     * @param $radius
     * @return JsonResponse
     *
     * @Route("/volume/{radius}", name="calcul_volume")
     * @Method("GET")
     */
    public function getSphereVolume($radius) {

        if (!is_numeric($radius)) {
            return new JsonResponse(['code' => 11, 'message' => 'Vous devez entrer un entier']);
        }

        if ($radius > 100) {
            return new JsonResponse(['code' => 12, 'message' => 'Le nombre doit etre inferie à 100']);
        }

        return $this->volumeCalculateAction($radius);
    }

    /**
     * @return JsonResponse
     *
     * @Route("/volumes", name="get_all_volume")
     * @Method("GET")
     */
    public function getAllVolume() {
        $path = $this->container->getParameter('tmp_directory').'/data.json';
        return $this->getListOfVolume($path);
    }

    /**
     * @return JsonResponse
     *
     * @Route("/remove-cache", name="remove_cache")
     * @Method("GET")
     */
    public function removeCache() {
        $path = $this->container->getParameter('tmp_directory');
        $this->clearCache($path);

        return new JsonResponse('Cache supprimé avec succes');
    }
}