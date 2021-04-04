<?php

namespace App\Modules\BaseApp\Requests;
use Swis\JsonApi\Client\Interfaces\ParserInterface;

class BaseApiParserRequest extends BaseApiTokenDataRequest
{
    private $parserInterface;
    public function __construct(ParserInterface $parserInterface){
        parent::__construct();
        $this->parserInterface = $parserInterface;
    }

    public function validationData()
    {
        if($this->getContent() != ""){
            $data = $this->parserInterface->deserialize($this->getContent());
            return $data->getData()->toJsonApiArray();
        }
        return  [];
    }


}
