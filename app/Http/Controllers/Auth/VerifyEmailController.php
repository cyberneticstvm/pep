<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        try {
            if ($request->user()->hasVerifiedEmail()) {
                return redirect()->intended(route('dashboard', absolute: false) . '?verified=1');
            }

            if ($request->user()->markEmailAsVerified()) {
                event(new Verified($request->user()));
            }
        } catch (Exception $e) {
            return redirect()->route('verify.email')->with("error", "You should have logged in first to verify your email id.");
        }
        return redirect()->intended(route('dashboard', absolute: false) . '?verified=1')->with("success", "Email has verified successfully!");
    }
}
