<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Resources\UserResource;
use App\Jobs\SendEmailJob;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{

    public function __construct(private UserService $userService)
    {
    }

    /**
     * Display a specific resource.
     */
    public function show($id): JsonResponse
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
        ], 200);
    }

    /**
     * Display resources created last week.
     */
    public function usersCreatedLastWeek(): JsonResponse
    {
        $lastWeekStart = now()->subWeek()->startOfWeek();
        $lastWeekEnd = now()->subWeek()->endOfWeek();

        $users = User::whereBetween('created_at', [$lastWeekStart, $lastWeekEnd])->get();

        $userDetails = $users->map(function ($user) {
            return [
                'name' => $user->name,
                'email' => $user->email,
            ];
        });

        return response()->json($userDetails, 200);
    }

    /**
     * Display a specific resource using UserResource
     */
    public function showWithResource(User $user): UserResource
    {
        return new UserResource($user);
    }

    /**
     * Display a specific resource using UserResource
     */
    public function sendMail(User $user)
    {
        // Dispatch the job to send the email asynchronously
        SendEmailJob::dispatch($user)->onQueue('emails');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $request): JsonResponse
    {
        $user = $this->userService->store($request->validated());

        return response()->json($user, 200);
    }
}
