<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(route('dashboard', absolute: false) . '?verified=1');
        }

        if ($request->user() && $request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        } else {
            return redirect()->route('verify.email')->with("error", "User should have logged in first to verify the email");
        }
        return redirect()->intended(route('dashboard', absolute: false) . '?verified=1')->with("success", "Email has verified successfully!");
    }
}
