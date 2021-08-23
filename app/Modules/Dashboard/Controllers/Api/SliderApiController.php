<?php

namespace App\Modules\Slider\Controllers\Api;

use App\Modules\BaseApp\Enums\ResourceTypes;
use App\Modules\Slider\Transformers\SliderTransformer;
use Swis\JsonApi\Client\Interfaces\ParserInterface;
use App\Modules\BaseApp\Controllers\BaseApiController;
use App\Modules\Slider\Models\Slider;
use Tymon\JWTAuth\Exceptions\JWTException;

class SliderApiController extends BaseApiController
{
    public $parserInterface;
    private $model;

    public function __construct(ParserInterface $parserInterface , Slider $news)
    {
        $this->parserInterface = $parserInterface;
        $this->model = $news;
    }

    public function index()
    {
        $news = $this->model->getData()
            ->active()
            ->orderBy('index' , 'asc')
            ->paginate();

        return $this->transformDataModInclude($news , '' , new SliderTransformer() , ResourceTypes::SLIDER);
    }
}
