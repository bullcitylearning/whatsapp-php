<?php

namespace Sawirricardo\Whatsapp\Data;

use Sawirricardo\Whatsapp\Interfaces\HasMessageData;

class TemplateMessageData implements HasMessageData
{
    private $template;
    private $languageCode;
    private $parameters;

    public function __construct($template, $parameters)
    {
        $this->template = $template;
        $this->parameters = $parameters;
    }

    public function getType()
    {
        return 'template';
    }

    public function toArray()
    {
        [
            'name' => $this->template,
            'language' => [
                'code' => 'en',
                'policy'=> 'deterministic'
            ],
            'components' =>[
                [
                    'type' => 'body',
                    'parameters' => $this->parameters,
                ]
            ]
        ]
    }

    public function toJson($options = 0)
    {
        return json_encode($this->toArray(), $options);
    }
}
