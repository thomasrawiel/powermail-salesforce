<?php

declare(strict_types=1);

namespace TRAW\PowermailSalesforce\Domain\Model;

class Field extends \In2code\Powermail\Domain\Model\Field
{
    protected string $sfFieldname = '';

    public function getSfFieldname(): string
    {
        return $this->sfFieldname;
    }

    public function setSfFieldname(string $sfFieldname): void
    {
        $this->sfFieldname = $sfFieldname;
    }
}
