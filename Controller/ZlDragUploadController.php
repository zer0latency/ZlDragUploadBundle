<?php

namespace zer0latency\ZlDragUploadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
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
     * @var string
     */
    protected $sessionId = '';

    /**
     * @var string
     */
    protected $resultPath = '';

    /**
     * @Route("zl_dragupload/file", name="zl_dragupload_file")
     * @Method({"POST"})
     * @Template()
     */
    public function fileAction(Request $request)
    {
        $this->sessionId = $request->getSession()->getId();
        $response = new JsonResponse();
        $this->moveUploaded($request->files->get('file'));


        $this->get('logger')->info('File uploaded', array(
            'path' => $this->resultPath,
        ));

        return $response;
    }

    protected function getUploadDir()
    {
        return '/tmp/';
    }

    protected function moveUploaded(UploadedFile $file)
    {
        $newName = $this->sessionId.'_'.$file->getClientOriginalName();
        $newFile = $file->move($this->getUploadDir(), $newName);
        $this->resultPath = $newFile->getPathname();
    }
}
