<?php
declare(strict_types=1);

namespace TRAW\PowermailSalesforce\Domain\Model;

class Form extends \In2code\Powermail\Domain\Model\Form
{
    protected string $sfOid = '';

    protected int $sfEnable = 0;

    protected int $sfDoubleoptin = 0;

    public function getSfOid(): string
    {
        return $this->sfOid;
    }

    public function setSfOid(string $sfOid): void
    {
        $this->sfOid = $sfOid;
    }

    public function getSfEnable(): int
    {
        return $this->sfEnable;
    }

    public function setSfEnable(int $sfEnable): void
    {
        $this->sfEnable = $sfEnable;
    }

    public function getSfDoubleoptin(): int
    {
        return $this->sfDoubleoptin;
    }

    public function setSfDoubleoptin(int $sfDoubleoptin): void
    {
        $this->sfDoubleoptin = $sfDoubleoptin;
    }

    public function getSfFormProperties(): array
    {
        return [
            'enable' => $this->sfEnable,
            'oid' => $this->sfOid,
            'doubleoptin' => $this->sfDoubleoptin,
        ];
    }
}
