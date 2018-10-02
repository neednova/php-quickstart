<?php

namespace App\Helpers;

use GuzzleHttp\Client;
use Cache;

class Utils {

    private const BORROW_LOAN_DECISION_THRESHOLD = 650;

    private static function parseNovaPassport ($userArgs, $publicToken, $creditPassport = []) {
        // See https://docs.neednova.com/ for a full explanation of the Nova Credit Passport
        $scores = $creditPassport['scores'];
        $personal = $creditPassport['personal'];

        /**
         * Now that we have this data, you can easily add Nova to your existing underwriting engine.
         * In this example, our underwriting decision is: accept applicants whose NOVA_SCORE_BETA is greater than BORROW_LOAN_DECISION_THRESHOLD
         */
        $novaScoreObj = current(array_filter($scores, function($score) {
            return $score['score_type'] === 'NOVA_SCORE_BETA';
        }));

        /**
         * Make our decision:
         */
        $borrowLoanDecision = !empty($novaScoreObj['value']) && $novaScoreObj['value'] > self::BORROW_LOAN_DECISION_THRESHOLD ? 'APPROVE' : 'DENY';

        /**
         * Finally, store applicant report data - refresh the page at localhost:3000/dashboard to see the results
         *
         * For demo purposes, we'll store the results of a Nova Credit Passport in a cache store
         * Note that production usage should store received data in a database, associated to its respective applicant
         */
        Cache::forever('RECEIVED_REPORT_DATA', [
            'userArgs' => $userArgs,
            'publicToken' => $publicToken,
            'applicantName' => $personal['full_name'],
            'applicantEmail' => $personal['email'],
            'novaScore' => !empty($novaScoreObj) ? $novaScoreObj['value'] : 0,
            'borrowLoanDecision' => $borrowLoanDecision,
        ]);
    }

    public static function retrievePassportData() {
        return Cache::get('RECEIVED_REPORT_DATA', null);
    }

    public static function handleNovaWebhook($publicToken, $userArgs, $status) {
        $novaEnv = env('NOVA_ENV');
        $novaAccessTokenUrl = env('NOVA_ACCESS_TOKEN_URL');
        $novaPassportUrl = env('NOVA_PASSPORT_URL');
        $novaClientId = env('NOVA_CLIENT_ID');
        $novaSecretKey = env('NOVA_SECRET_KEY');
        $novaBasicAuthCreds = base64_encode("$novaClientId:$novaSecretKey");

        /**
         * Get an access token from Nova
         */
        $client = new Client();
        $res = $client->request('GET', $novaAccessTokenUrl, [
            'headers' => [
                'Authorization' => "Basic $novaBasicAuthCreds",
                'X-ENVIRONMENT' => $novaEnv,
            ]
        ]);

        /**
         * Now make a request to Nova to fetch the Credit Passport for the public token provided in the webhook (i.e., unique identifier for the credit file request in Nova's system)
         */
        $accessToken = json_decode($res->getBody(), true)['accessToken'];
        $passportRes = $client->request('GET', $novaPassportUrl, [
            'headers' => [
                'Authorization' => 'Bearer ' . base64_encode($accessToken),
                'X-ENVIRONMENT' => $novaEnv,
                'X-PUBLIC-TOKEN' => $publicToken,
            ]
        ]);

        return self::parseNovaPassport($userArgs, $publicToken, json_decode($passportRes->getBody(), true));
    }
}
