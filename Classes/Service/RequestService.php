<?php
declare(strict_types=1);

namespace TRAW\PowermailSalesforce\Service;

use TYPO3\CMS\Core\Http\RequestFactory;

class RequestService
{
    public function __construct(private readonly RequestFactory $requestFactory)
    {
    }

    public function sendDataToSalesforce(string $targetUrl, array $data)
    {
        $response = $this->requestFactory->request(
            $targetUrl,
            'POST',
            [
                'form_params' => $data,
            ]
        );

        if ($response->getStatusCode() !== 200) {

        }
    }
}
