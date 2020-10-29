<?php


namespace Zhange\HelloWord;

use Zhange\HelloWord\Interfaces\Say as SayInterface;

class Say implements SayInterface
{

    /**
     * @var SayInterface
     */
    private $locale;

    public function hello()
    {
        return $this->locale->hello();
    }

    public function setLocale(SayInterface $language)
    {
        $this->locale = $language;
    }

}