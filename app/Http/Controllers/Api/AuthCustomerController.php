<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\CustomerServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $customerService;
    public function __construct(CustomerServiceInterface $customerService)
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
        $this->customerService = $customerService;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (! $token = auth('api')->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->createNewToken($token);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'email' => 'required|string|email|max:100|unique:customers',
            'name' => 'required|string',
            'phone' => 'required',
            'password' => 'required|string|min:6',

        ]);

        if ($validator->fails()) {
            return response()->json([
                // 'errors' => $validator->errors()->toJson(),
                'message' => 'User failled registered',
                'status' => false,
            ], 400);
        }
        $data = array_merge(
            $validator->validated(),
            ['password' => bcrypt($request->password)]
        );
        $customer = $this->customerService->create($data);

        return response()->json([
            'status' => true,
            'message' => 'User successfully registered',
            'customer' => $customer
        ], 201);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        auth('api')->logout();

        return response()->json(['message' => 'User successfully signed out']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function userProfile()
    {
        return response()->json(auth('api')->user());
    }

}
