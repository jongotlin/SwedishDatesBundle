<?php

namespace JGI\SwedishDatesBundle\Twig;

use JGI\SwedishDates\Manager\DateManager;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class TwigExtensions extends AbstractExtension
{
    /**
     * @var DateManager
     */
    private $dateManager;

    /**
     * @param DateManager $dateManager
     */
    public function __construct(DateManager $dateManager)
    {
        $this->dateManager = $dateManager;
    }

    /**
     * @return TwigFilter[]
     */
    public function getFilters()
    {
        return [
            new TwigFilter('date_name', [$this, 'dateName']),
            new TwigFilter('holiday', [$this, 'holiday']),
        ];
    }

    /**
     * @param \DateTimeInterface $date
     *
     * @return null|string
     */
    public function dateName(\DateTimeInterface $date)
    {
        return $this->dateManager->getDate($date)->getName();
    }

    /**
     * @param \DateTimeInterface $date
     *
     * @return bool
     */
    public function holiday(\DateTimeInterface $date)
    {
        return $this->dateManager->getDate($date)->isRedDay();
    }
}
