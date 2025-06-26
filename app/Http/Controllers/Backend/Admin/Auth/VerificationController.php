<?php

namespace App\Http\Controllers\Backend\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;


    public function verify($id, $hash)
    {
        $admin = Admin::findOrFail($id);

        // Check if the hash matches the email address hash
        if (sha1($admin->getEmailForVerification()) === $hash) {
            $admin->markEmailAsVerified();

            // Trigger the Verified event
            event(new Verified($admin));

            // Redirect the admin to the dashboard
            return redirect()->route('admin.dashboard');
        }

        // If the verification fails, redirect back with an error
        return redirect()->route('admin.verification.notice')->withErrors(['message' => 'Invalid verification link.']);
    }

    // Resend Verification Email
    public function resend()
    {
        $admin = Auth::guard('admin')->user();

        // Ensure the admin's email isn't already verified
        if ($admin->hasVerifiedEmail()) {
            return redirect()->route('admin.dashboard');
        }

        // Resend the verification email
        $admin->sendEmailVerificationNotification();

        // Redirect back with success message
        return back()->with('message', 'A new verification link has been sent to your email.');
    }
    public function show(Request $request)
    {
        return $request->user()->hasVerifiedEmail()
            ? redirect($this->redirectPath())
            : view('frontend.auth.admin.verify');
    }

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected function redirectTo()
    {
        return route('admin.dashboard');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }
}
