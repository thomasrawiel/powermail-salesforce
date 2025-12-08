<?php
declare(strict_types=1);

namespace TRAW\PowermailSalesforce\Finisher;

use http\Url;
use In2code\Powermail\Domain\Model\Mail;
use TRAW\PowermailSalesforce\Domain\Model\Field;
use TRAW\PowermailSalesforce\Service\DataCollectionService;
use TRAW\PowermailSalesforce\Service\RequestService;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

class SalesforceFinisher extends \In2code\Powermail\Finisher\AbstractFinisher
{
    protected RequestService $salesforceRequestService;
    protected DataCollectionService $dataCollectionService;

    public function __construct(
        Mail                  $mail,
        array                 $configuration,
        array                 $settings,
        bool                  $formSubmitted,
        string                $actionMethodName,
        ContentObjectRenderer $contentObject,)
    {
        parent::__construct($mail, $configuration, $settings, $formSubmitted, $actionMethodName, $contentObject);

        $this->salesforceRequestService = GeneralUtility::makeInstance(RequestService::class);
        $this->dataCollectionService = GeneralUtility::makeInstance(DataCollectionService::class, $mail, $configuration);
    }

    public function salesforceDataFinisher(): void
    {
        if (empty($this->configuration['targetUrl'])) {
            return;
        }
        // Check if the relevant form properties are set
        $formProperties = $this->dataCollectionService->getSalesforceFormProperties($this->getMail()->getForm());
        if ($formProperties['enable'] === false || empty($formProperties['oid']) || !$this->getMail()->getAnswers()->count()) {
            return;
        }

        // @extensionScannerIgnoreLine
        $contentObjectData = $this->contentObject->data;
        $returnPageUid = $this->contentObject->data['pid'];
        if (!empty($this->settings['main']['returnPageUid'])) {
            $returnPageUid = $this->settings['main']['returnPageUid'];
        }
        if(isset($this->settings['thx']['redirect'])) {
           $returnPageUid = $this->settings['thx']['redirect'];
        }

        $returnUrl = $this->contentObject->typoLink_URL([
            'parameter' => $returnPageUid,
            'additionalParams' => '&L=' . $this->contentObject->data['sys_language_uid'] ?? 0,
            'section' => empty($this->settings['main']['returnPageUid']) ? $this->contentObject->data['uid'] : '',
            'forceAbsoluteUrl' => true,
        ]);


        $leadSource = ['Web-to-Lead'];
        if ($formProperties['doubleoptin'] === false) {
            $leadSource[] = 'Single-Opt-in';
        }

        $data = $this->dataCollectionService->collectDataFromPowermailAnswers([
            'oid' => $formProperties['oid'],
            'lead_source' => implode(' ', $leadSource),
            'retURL' => $returnUrl,
        ]);

        $requestURl = $this->configuration['debug']['enable'] ? $this->configuration['debug']['targetUrl'] : $this->configuration['targetUrl'];
        if (str_starts_with($requestURl, 'https://webto.salesforce.com') === true) {
            $requestURl = $this->dataCollectionService->ensureOrgIdInUrl($requestURl, $data['oid']);
        }


        $this->salesforceRequestService->sendDataToSalesforce($requestURl, $data);
    }
}
