<?php


namespace Alevel\RandomNumber\Provider;

use Magento\Framework\App\Config\ScopeConfigInterface;

class RandomNumberProvider implements RandomInterface
{
    const CONFIG_PATH = 'alevel/field_masks/default';
    const CONFIG_PATH_ENABLE = 'alevel/field_masks/enable';
    private $scopeConfig;

    /**
     * RandomNumberProvider constructor.
     * @param ScopeConfigInterface $scopeConfig
     */
public function __construct(ScopeConfigInterface $scopeConfig)
{
    $this->scopeConfig = $scopeConfig;
}

    public function getNumber(): int
{
    return mt_rand(1,10000);
}

public function getValueForBlock(): string
{
$enable = $this->scopeConfig->getValue(
    static::CONFIG_PATH_ENABLE,
    ScopeConfigInterface::SCOPE_TYPE_DEFAULT
);
if($enable){
    $html = 'all works';
}else{
    $html = 'dosnot works';
}
return $html;
}

}
