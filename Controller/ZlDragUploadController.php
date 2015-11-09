<?php

namespace zer0latency\ZlDragUploadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * ZlDragUploadController class
 */
class ZlDragUploadController extends Controller
{
    /**
     * @Route("zl_dragupload/file", name="zl_dragupload_file")
     * @Method({"POST"})
     * @Template()
     */
    public function fileAction(Request $request)
    {
        $response = new JsonResponse();
        $response->setData($request->files->get('file'));

        return $response;
    }

    protected function getUploadDir()
    {
        return '/tmp/';
    }
}
