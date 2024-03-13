<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\ProductModel;

class Products extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    use ResponseTrait;
    public function index()
    {
        $main = new ProductModel();
        $data = $main->findAll();
        return $this->respond($data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $main = new ProductModel();
        $data = $main->find(['id' => $id]);
        if(!$data) return $this->failNotFound('No record found');
        return $this->respond($data[0]);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        helper(['form']);
        $rules = [
            'itemname' => 'required',
            'category' => 'required',
            'partnumber' => 'required',
            'compatibility' => 'required',
            'marketprice' => 'required',
            'boughtprice' => 'required',
            'sellingprice' => 'required',
            'initialquantity' => 'required',
            'currentquantity' => 'required',
            'branch' => 'required',
            'lastdateupdated' => 'required',
            'supplier' => 'required',
        ];

        $data = [
            'itemname' => $this->request->getVar('itemname'),
            'category' => $this->request->getVar('category'),
            'partnumber' => $this->request->getVar('partnumber'),
            'compatibility' => $this->request->getVar('compatibility'),
            'marketprice' => $this->request->getVar('marketprice'),
            'boughtprice' => $this->request->getVar('boughtprice'),
            'sellingprice' => $this->request->getVar('sellingprice'),
            'initialquantity' => $this->request->getVar('initialquantity'),
            'currentquantity' => $this->request->getVar('currentquantity'),
            'branch' => $this->request->getVar('branch'),
            'lastdateupdated' => $this->request->getVar('lastdateupdated'),
            'supplier' => $this->request->getVar('supplier'),
        ];
        if(!$this->validate($rules)) return $this->fail($this->validator->getErrors());
        $main = new ProductModel();
        $main->save($data);
        $response = [
            'status' => 201,
            'error' => null,
            'messsages' => [
                'success' => 'Data Inserted'
            ]
        ];
        return $this->respondCreated($response);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        helper(['form']);
        $rules = [
            'itemname' => 'required',
            'category' => 'required',
            'partnumber' => 'required',
            'compatibility' => 'required',
            'marketprice' => 'required',
            'boughtprice' => 'required',
            'sellingprice' => 'required',
            'initialquantity' => 'required',
            'currentquantity' => 'required',
            'branch' => 'required',
            'lastdateupdated' => 'required',
            'supplier' => 'required',
        ];

        $data = [
            'itemname' => $this->request->getVar('itemname'),
            'category' => $this->request->getVar('category'),
            'partnumber' => $this->request->getVar('partnumber'),
            'compatibility' => $this->request->getVar('compatibility'),
            'marketprice' => $this->request->getVar('marketprice'),
            'boughtprice' => $this->request->getVar('boughtprice'),
            'sellingprice' => $this->request->getVar('sellingprice'),
            'initialquantity' => $this->request->getVar('initialquantity'),
            'currentquantity' => $this->request->getVar('currentquantity'),
            'branch' => $this->request->getVar('branch'),
            'lastdateupdated' => $this->request->getVar('lastdateupdated'),
            'supplier' => $this->request->getVar('supplier'),
        ];
        if(!$this->validate($rules)) return $this->fail($this->validator->getErrors());
        $main = new ProductModel();
        $findById = $main->find(['id' => $id]);
        if(!$findById) return $this->failNotFound('No record found');
        $main = new ProductModel();
        $main->update($id, $data);
        $response = [
            'status' => 201,
            'error' => null,
            'messsages' => [
                'success' => 'Data Updated'
            ]
        ];
        return $this->respondCreated($response);
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $main = new ProductModel();
        $findById = $main->find(['id' => $id]);
        if(!$findById) return $this->failNotFound('No record found');
        $main = new ProductModel();
        $main->delete($id);
        $response = [
            'status' => 201,
            'error' => null,
            'messsages' => [
                'success' => 'Data Deleted'
            ]
        ];
        return $this->respondCreated($response);
    }
}
