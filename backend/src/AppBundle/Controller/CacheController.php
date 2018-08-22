<?php
/**
 * Created by PhpStorm.
 * User: TOSHIBA
 * Date: 20/08/2018
 * Time: 21:43
 */

namespace AppBundle\Controller;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Trait CacheController
 * @package AppBundle\Controller
 */
trait CacheController
{

    /**
     * Main function to return sphere volume
     *
     * @param $rayon
     * @return array
     */
    public function volumeCalculateAction($rayon)
    {

        $fileSystem = new Filesystem();

        $path = $this->container->getParameter('tmp_directory').'/data.json';

        if ($fileSystem->exists($path)) {
            $loadCacheContent = json_decode(file_get_contents($path), true);

            $result = $this->volumeCalculateContentAction($path, $rayon, $loadCacheContent);

            if ($result === true) {
                return new JsonResponse(['radius' => $rayon, 'volume' => $this->calcul($rayon)]);
            } else {
                return new JsonResponse(['radius' => $rayon, 'volume' => $result]);
            }
        }else{
            $fileSystem->dumpFile($path, '');
            $loadCacheContent = json_decode(file_get_contents($path), true);

            $result = $this->volumeCalculateContentAction($path, $rayon, $loadCacheContent);

            if ($result === true) {
                return new JsonResponse(['radius' => $rayon, 'volume' => $this->calcul($rayon)]);
            } else {
                return new JsonResponse(['radius' => $rayon, 'volume' => $result]);
            }
        }
    }


    /**
     * @param $path
     * @param $rayon
     * @param $loadCache
     * @return bool
     */
    public function volumeCalculateContentAction($path, $rayon, $loadCache) {

        $isCacheExist = $this->checkValueInCache($loadCache, $rayon);

        if (!$isCacheExist) {
            $newValue = ['radius' => $rayon, 'volume' => $this->calcul($rayon)];
            $this->updateCacheContent($loadCache, $newValue, $path);
            $response = true;
        } else {
            $response = $isCacheExist[1];
        }

        return $response;
    }



    /**
     * Function to update cache content
     *
     * @param $file
     * @param $newValue
     * @param $path
     */
    public function updateCacheContent($file, $newValue, $path) {
        if ($file != null) {
            array_push($file, $newValue);
            file_put_contents($path, json_encode($file));
        } else {
            $data = [];
            array_push($data, $newValue);
            file_put_contents($path, json_encode($data));
        }
    }



    /**
     * function to check if value exist in cache
     *
     * @param $file
     * @param $rayon
     * @return array|bool
     */
    public function checkValueInCache($file, $rayon) {
        $volume = null; $tab = [];
        if ($file != null) {
            foreach ($file as $key => $entry) {
                $tab[] = $entry['radius'];
            }
            if (in_array($rayon, $tab)) {
                foreach ($file as $key => $value) {
                    if ($value['radius'] == $rayon) {
                        $volume = $value['volume'];
                    }
                }
                return [$rayon, $volume];
            } else {
                return false;
            }
        }
    }



    /**
     * Function to delete cache
     *
     * @param $fileOrdirectory
     */
    public function clearCache($fileOrdirectory) {
        $fileSystem = new Filesystem();
        $fileSystem->remove(array($fileOrdirectory));
    }


    /**
     * function to get list of volumes
     *
     * @return JsonResponse
     */
    public function getListOfVolume($path) {

        if (file_exists($path)) {
            $loadCacheContent = json_decode(file_get_contents($path), true);

            if ($path != null) {
                return new JsonResponse($loadCacheContent);
            }

            return new JsonResponse(['message' => 'Le fichier est vide entrez des valeurs SVP']);
        }

        return new JsonResponse(['message' => 'Le fichier n\'existe pas']);
    }


    /**
     * function to calculate sphere volume
     *
     * @param $rayon
     * @return float
     */
    public function calcul($rayon) {
        return (4/3) * pi() * $rayon;
    }
}