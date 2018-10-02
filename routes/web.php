<?php

use Illuminate\Http\Request;
use App\Helpers\Utils;

/**
 * Here is a sample loan application that has the NovaConnect widget added.
 * NovaConnect is a preconfigured modal pop up that gets attached with a single line of Javascript
 * More details: https://www.novacredit.com/quickstart-guide#clientside
 */
Route::get('/', function () {
    /**
    * IMPORTANT! Your credentials should NOT be left unencrypted in your production integration
    * We recommend placing them in a hidden environment variable / file.
    * The variable file here is left unencrypted for demonstration purposes only
    */

    $novaPublicId = env('NOVA_PUBLIC_ID');
    $novaEnv = env('NOVA_ENV');
    $novaProductId = env('NOVA_PRODUCT_ID');

    /**
    * Pass our Nova configs to the template so the widget can render
    * We can also pass a string of data to `userArgs` of NovaConnect, and this string will be returned in our webhook
    * Example userArgs: unique identifiers from your system, unique nonces for security
    */

    $novaUserArgs = 'borrow_loan_id_12345';
    return view('loan_application', [
        'novaPublicId' => $novaPublicId,
        'novaEnv' => $novaEnv,
        'novaProductId' => $novaProductId,
        'novaUserArgs' => $novaUserArgs,
    ]);
});

/**
 * Here is a sample internal dashboard, where your loan officer might view applicant profiles
 */
Route::get('/dashboard', function () {
    // Pass the Nova Credit Passport data, if we've received it, to the dashboard view
    return view('dashboard', [
        'receivedReportData' => Utils::retrievePassportData()
    ]);
});

/**
 * Route to handle Nova callback webhook, which you should specify on the dashboard as "https://your_domain_here.com/nova"
 * This route is POST'd to after an applicant completes NovaConnect, and we have updated the status of their NovaCredit Passport
 * When running this locally, you'll need a tunnel service like ngrok to expose your localhost: https://ngrok.com/
 * See our docs for a list of potential responses: https://docs.neednova.com/#error-codes-amp-responses
 */
Route::post('/nova', function (Request $request) {
    // Pass the Nova Credit Passport data, if we've received it, to the dashboard view
    $status = $request['status'];
    $publicToken = $request['publicToken'];
    $userArgs = $request['userArgs'];

    Log::info ('Received a callback to our webhook! Navigate your web browser to /dashboard to see the results');

    if ($status === 'SUCCESS') {
        Utils::handleNovaWebhook($publicToken, $userArgs, $status);
    } else {
        /**
         * Handle unsuccessful statuses here, such as applicant NOT_FOUND and NOT_AUTHENTICATED
         * For example, you might finalize your loan decision
         */
        Log::error("Report status $status received for Nova public token $publicToken");
    }

    return response('', 200);
});
