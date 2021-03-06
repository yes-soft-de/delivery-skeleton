<?php

namespace App\Controller;

use App\AutoMapping;
use App\Request\ProductCreateRequest;
use App\Service\ProductService;
use stdClass;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class ProductController extends BaseController
{
    private $autoMapping;
    private $productService;

    public function __construct(SerializerInterface $serializer, AutoMapping $autoMapping, ProductService $productService)
    {
        parent::__construct($serializer);
        $this->autoMapping = $autoMapping;
        $this->productService = $productService;
    }
    
    /**
     * @Route("/createproductbyadmin", name="createProductByAdmin", methods={"POST"})
     * @IsGranted("ROLE_ADMIN")
     * @param Request $request
     * @return JsonResponse
     */
    public function createProductByAdmin(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $request = $this->autoMapping->map(stdClass::class, ProductCreateRequest::class, (object)$data);
        $result = $this->productService->createProductByAdmin($request);

        return $this->response($result, self::CREATE);
    }
    
    /**
     * @Route("/createproductbystoreowner", name="createProductByStoreOwner", methods={"POST"})
     * @IsGranted("ROLE_OWNER")
     * @param Request $request
     * @return JsonResponse
     */
    public function createProductByStoreOwner(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $request = $this->autoMapping->map(stdClass::class, ProductCreateRequest::class, (object)$data);

        $result = $this->productService->createProductByStoreOwner($request, $this->getUserId());

        return $this->response($result, self::CREATE);
    }

    /**
     * @Route("/productsbystoreowner", name="productsbystoreowner", methods={"GET"})
     * @IsGranted("ROLE_OWNER")
     * @param Request $request
     * @return JsonResponse
     */
    public function getProductsByStoreOwner(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $request = $this->autoMapping->map(stdClass::class, ProductCreateRequest::class, (object)$data);

        $result = $this->productService->getProductsByStoreOwner($this->getUserId());

        return $this->response($result, self::FETCH);
    }

    /**
     * @Route("/productsstoreownerbyprofileid/{storeOwnerProfileId}", name="getProductsbyStoreOwnerProfileId  ", methods={"GET"})
     * @param Request $request
     * @return JsonResponse
     */
    public function getProductsByStoreOwnerProfile($storeOwnerProfileId)
    {
        $result = $this->productService->getProductsByStoreOwnerProfile($storeOwnerProfileId);

        return $this->response($result, self::FETCH);
    }

    /**
     * @Route("/productscategoryid/{productCategoryID}", name="getProductsByProductCategoryId  ", methods={"GET"})
     * @param Request $request
     * @return JsonResponse
     */
    public function getProductsByProductCategoryId($productCategoryID)
    {
        $result = $this->productService->getProductsByProductCategoryId($productCategoryID);

        return $this->response($result, self::FETCH);
    }

    /**
     * @Route("/productsbycategoryidandstoreownerprofileid/{productCategoryID}/{storeOwnerProfileId}", name="getProductsByProductCategoryIdAndStoreOwnerProfileId  ", methods={"GET"})
     * @param Request $request
     * @return JsonResponse
     */
    public function getProductsByCategoryIdAndStoreOwnerProfileId($productCategoryID, $storeOwnerProfileId)
    {
        $result = $this->productService->getProductsByCategoryIdAndStoreOwnerProfileId($productCategoryID, $storeOwnerProfileId);

        return $this->response($result, self::FETCH);
    }

    /**
     * @Route("/products", name="getProducts", methods={"GET"})
     * @return JsonResponse
     */
    public function getProducts()
    {
        $result = $this->productService->getProducts();

        return $this->response($result, self::FETCH);
    }

    /**
     * @Route("/product/{id}", name="getProductById", methods={"GET"})
     * @return JsonResponse
     */
    public function getProductByIdWithFullInfo($id)
    {
        $result = $this->productService->getProductByIdWithFullInfo($id);

        return $this->response($result, self::FETCH);
    }

    /**
     * @Route("/productstopwanted", name="productsTopWanted", methods={"GET"})
     * @return JsonResponse
     */
    public function getProductsTopWanted()
    {
        $result = $this->productService->getProductsTopWanted();

        return $this->response($result, self::FETCH);
    }

    /**
     * @Route("/productstopwantedofspecificstoreowner/{storeOwnerProfileId}", name="productsTopWantedOfSpecificStoreOwner", methods={"GET"})
     * @return JsonResponse
     */
    public function productsTopWantedOfSpecificStoreOwner($storeOwnerProfileId)
    {
        $result = $this->productService->productsTopWantedOfSpecificStoreOwner($storeOwnerProfileId);

        return $this->response($result, self::FETCH);
    }

}
