<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\CustomException;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegistrationRequest;
use App\Services\Api\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserController extends Controller
{
    /**
     * @var UserService
     */
    private $_userService;

    public function __construct(UserService $userService)
    {
        $this->middleware('guest:web')->except('logoutUser');
        $this->_userService = $userService;
    }

    /**
     * Register a new user
     *
     * This endpoint lets you add a new user into the storage
     * @param UserRegistrationRequest $request
     * @return JsonResponse
     */
    public function registerUser(UserRegistrationRequest $request)
    {
        return $this->_userService->registerUser($request->validated());
    }

    /**
     * Login user into the system
     *
     * This endpoint lets you sign in a user into the system
     * Throws an error if the login credentials are incorrect
     * @param UserLoginRequest $loginRequest
     * @return JsonResponse
     */
    public function loginUser(UserLoginRequest $loginRequest)
    {
        return $this->_userService->loginUser($loginRequest->validated());
    }

    /**
     * Logout a user
     *
     * This endpoint lets you sign out a user from the system
     * @return JsonResponse
     */
    public function logoutUser()
    {
        return $this->_userService->logoutUser();
    }
}
