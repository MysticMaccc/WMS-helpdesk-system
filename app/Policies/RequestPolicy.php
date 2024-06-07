<?php

namespace App\Policies;

use App\Models\RequestTypeApprover;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class RequestPolicy
{
    public function authorizeRequest(User $user, $requestTypeId, $nextStatusId)
    {
        $requestTypeApproverData = RequestTypeApprover::where('request_type_id', $requestTypeId)
            ->where('user_id', $user->id)
            ->where('request_type_status_id', $nextStatusId)
            ->first();

        if ($requestTypeApproverData == null) {
            return Response::deny('You are not authorized to perform this action.');
        }

        return Response::allow();
    }
}
