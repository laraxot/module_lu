<?php

namespace Modules\LU\Traits;

use Throwable;
use Modules\LU\Models\User;
use Fouladgar\OTP\OTPBroker;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Fouladgar\OTP\Exceptions\InvalidOTPTokenException;

trait HasOTP
{
    public function __construct(private OTPBroker $OTPService)
    {
    }

    public function sendOTP(Request $request): JsonResponse
    {
        try {
            /** @var User $user */
            $user = $this->OTPService->send($request->get('mobile'));
        } catch (Throwable $ex) {
          // or prepare and return a view.
           return response()->json(['message'=>'An unexpected error occurred.'], 500);
        }

        return response()->json(['message'=>'A token has been sent to:'. $user->mobile]);
    }

    public function verifyOTPAndLogin(Request $request): JsonResponse
    {
        try {
            /** @var User $user */
            $user = $this->OTPService->validate($request->get('mobile'), $request->get('token'));

            // and do login actions...

        } catch (InvalidOTPTokenException $exception){
             return response()->json(['error'=>$exception->getMessage()],$exception->getCode());
        } catch (Throwable $ex) {
            return response()->json(['message'=>'An unexpected error occurred.'], 500);
        }

         return response()->json(['message'=>'Logged in successfully.']);
    }
}