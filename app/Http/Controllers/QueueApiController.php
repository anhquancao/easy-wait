<?php

/**
 * Created by PhpStorm.
 * User: quan
 * Date: 6/22/18
 * Time: 4:27 PM
 */

namespace App\Http\Controllers;

use App\Http\Resources\Queue as QueueResource;
use App\Http\Resources\CustomerQueue as CustomerQueueResource;
use App\QueueUser;
use App\Repositories\QueueRepositoryInterface;
use App\Repositories\QueueUserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class QueueApiController extends ApiController
{
    protected $queueRepository;
    protected $queueUserRepository;

    public function __construct(
        QueueRepositoryInterface $queueRepository,
        QueueUserRepositoryInterface $queueUserRepository
    )
    {
        parent::__construct();
        $this->queueRepository = $queueRepository;
        $this->queueUserRepository = $queueUserRepository;
    }

    public function getQueuesByCustomerId($userId)
    {
        $queues = $this->queueRepository->findQueuesByCustomerId($userId);
        return CustomerQueueResource::collection($queues);
    }

    public function getQueues(Request $request)
    {
        $queues = $this->queueRepository->getQueues($request->search, $request->status);
        return QueueResource::collection($queues);
    }

    public function getQueue($id)
    {
        if (!$this->queueRepository->checkExist($id))
            return $this->badRequest(["message" => "Queue doesn't exist"]);

        $queue = $this->queueRepository->find($id);

        return $this->success([
            "queue" => new CustomerQueueResource($queue)
        ]);
    }

    public function createQueue(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'tini' => 'required|numeric|min:0',
            'tmoy' => 'required|numeric|min:0',
            'trev' => 'required|numeric|min:0'
        ]);

        if ($validator->fails()) {
            return $this->badRequest([
                "messages" => $validator->messages()
            ]);
        }

        $this->queueRepository->create([
            "name" => $request->name,
            "status" => $request->status,
            'tini' => $request->tini,
            'tmoy' => $request->tmoy,
            'trev' => $request->trev,
            "user_id" => JWTAuth::authenticate()->id
        ]);

        return $this->success(["message" => "Success"]);
    }

    public function updateQueue($id, Request $request)
    {
        $queue = $this->queueRepository->find($id);

        if ($queue == null)
            return $this->badRequest("Queue doesn't exist");

        if ($queue->user_id != JWTAuth::authenticate()->id) {
            return $this->unauthorized([
                "message" => "you cannot update this resource"
            ]);
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'status' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return $this->badRequest([
                "messages" => $validator->messages()
            ]);
        }

        $this->queueRepository->update($id, [
            "name" => $request->name,
            "status" => $request->status,
        ]);

        return $this->success(["message" => "Success"]);
    }

    public function deleteQueue($id)
    {
        $queue = $this->queueRepository->find($id);
        if ($queue == null)
            return $this->badRequest("Queue doesn't exist");

        if ($queue->user_id != JWTAuth::authenticate()->id) {
            return $this->unauthorized([
                "message" => "you cannot delete this resource"
            ]);
        }
        $this->queueRepository->delete($id);
        return $this->success(["message" => "Success"]);
    }

    public function register($queueId)
    {
        $userId = JWTAuth::authenticate()->id;
        $queue = $this->queueRepository->find($queueId);

        if ($queue == null)
            return $this->badRequest(["message" => "Queue doesn't exist"]);

        $queueUser = $this->queueUserRepository->findByUserIdAndQueueIdAnhStatus($userId, $queueId, QueueUser::REGISTERED);

        if ($queueUser != null) {
            return $this->badRequest([
                "message" => "User already in queue"
            ]);
        }

        $this->queueRepository->increment($queueId, "number_waiting_people");

        $this->queueUserRepository->create([
            "queue_id" => $queueId,
            "user_id" => $userId,
            "status" => QueueUser::REGISTERED
        ]);

        return $this->success(["status" => "registered"]);
    }

    public function unregister($queueId)
    {
        $userId = JWTAuth::authenticate()->id;
        $queue = $this->queueRepository->find($queueId);

        if ($queue == null)
            return $this->badRequest(["message" => "Queue doesn't exist"]);

        $queueUser = $this->queueUserRepository->findByUserIdAndQueueIdAnhStatus($userId, $queueId, QueueUser::REGISTERED);

        if ($queueUser == null) {
            return $this->badRequest([
                "message" => "User not in queue"
            ]);
        }

        $this->queueUserRepository->update($queueUser->id, [
            "status" => QueueUser::UNREGISTERED
        ]);

        $this->queueRepository->decrement($queueId, "number_waiting_people");


        return $this->success(["status" => "unregistered"]);
    }

}