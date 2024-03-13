<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;

class Users extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    use ResponseTrait;
    public function index()
    {
        //
    }
    /**
     * Authenticate a user based on provided credentials
     *
     * @return mixed
     */
    public function authenticate()
    {
        helper(['form']);

        $rules = [
            'userName' => 'required',
            'userPassword' => 'required',
        ];

        if (!$this->validate($rules)) {
            return $this->fail($this->validator->getErrors());
        }

        $userName = $this->request->getVar('userName');
        $userPassword = $this->request->getVar('userPassword');

        $userModel = new UserModel();
        $user = $userModel->where('userName', $userName)->first();

        if ($user && password_verify($userPassword, $user['userPassword'])) {
            // Authentication successful
            $response = [
                'status' => 200,
                'error' => null,
                'messages' => [
                    'success' => 'Login successful',
                ]
            ];
            return $this->respondCreated($response);
        } else {
            // Authentication failed
            $response = [
                'status' => 401,
                'error' => 'Invalid credentials',
                'messages' => [
                    'error' => 'Invalid username or password',
                ],
            ];
            return $this->respondCreated($response);
        }
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
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
            'userName' => 'required',
            'userPassword' => 'required',
            'userRole' => 'required',
            'userAccess' => 'required',
        ];

        $data = [
            'userName' => $this->request->getVar('userName'),
            'userPassword' => password_hash($this->request->getVar('userPassword'), PASSWORD_DEFAULT), // Hash the password
            'userRole' => $this->request->getVar('userRole'),
            'userAccess' => $this->request->getVar('userAccess'),
        ];

        if (!$this->validate($rules)) {
            return $this->fail($this->validator->getErrors());
        }

        $userModel = new UserModel();
        $userModel->save($data);

        $response = [
            'status' => 201,
            'error' => null,
            'messages' => [
                'success' => 'User Registered',
            ],
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
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
